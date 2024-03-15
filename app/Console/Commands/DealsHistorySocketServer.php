<?php

namespace App\Console\Commands;

use App\Models\CopyClientPosition;
use App\Models\Deal;
use SplObjectStorage;
use React\EventLoop\Factory;
use React\Socket\SocketServer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\CopySenderPosition;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\Print_;
use React\Socket\ConnectionInterface;

class DealsHistorySocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deals_history_socket_server:server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Servidor de sincronização de deals';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $loop = Factory::create();
        $socket = new SocketServer('0.0.0.0:8300');
        $pool = new ConnectionsPoolDeals();

        $socket->on('connection', function (ConnectionInterface $connection) use ($pool) {
            echo '[' . $connection->getRemoteAddress() . ' connected]' . PHP_EOL;
            $pool->add($connection);
        });

        echo "Listening on {$socket->getAddress()}\n";

        $loop->run();
    }
}

class ConnectionsPoolDeals
{

    /** @var SplObjectStorage */
    private SplObjectStorage $connections; // SplObjectStorage é um "set".. um "conjunt"

    public function __construct()
    {
        $this->connections = new SplObjectStorage();
    }

    public function add(ConnectionInterface $connection)
    {
        /*
        $connection->on('data', function ($data) use ($connection) {
            echo "data: " . $data . PHP_EOL;
        });
        */
        $this->initEvents($connection);
        $this->setConnectionData($connection, []);
    }

    /**
     * @param ConnectionInterface $connection
     */
    protected function initEvents(ConnectionInterface $connection)
    {
        // On receiving the data we loop through other connections
        // from the pool and write this data to them
        $connection->on('data', function ($data) use ($connection) {
            $this->updateData("$data", $connection);
        });

        // When connection closes detach it from the pool
        $connection->on('close', function () use ($connection) {
            echo '[' . $connection->getRemoteAddress() . ' connection close]' . PHP_EOL;
            $this->connections->offsetUnset($connection);
        });
    }

    protected function setConnectionData(ConnectionInterface $connection, $data)
    {
        $this->connections->offsetSet($connection, $data);
    }

    protected function getConnectionData(ConnectionInterface $connection)
    {
        return $this->connections->offsetGet($connection);
    }

    /**
     * @param mixed $data
     * @param ConnectionInterface $conn
     */
    protected function updateData($data, ConnectionInterface $conn)
    {
        //echo $conn->getRemoteAddress() . ' => ' . $data . PHP_EOL;
        //echo $conn->getRemoteAddress() . PHP_EOL;

        // pré tratamento dos dados recebidos
        $data       = trim($data);
        $all_data   = "";

        // obtem os dados da conexão
        $arrDadosConexao = $this->getConnectionData($conn);
        // se já existe o atributo "data" adiciona os dados recebidos, caso contrário trabalha apenas com os dados recebidos
        //if(array_key_exists('data',$arrDadosConexao)) {
        //    $all_data = $arrDadosConexao['data'] . $data;
        //} else {
        $all_data = $data;
        //}

        // enquanto houver caractere de separação de dados itera sobre os dados da conexão
        while (strpos($all_data, "|") !== false) {
            // separa a string de dados e trata a primeira parte
            $arr_pos = explode("|", $all_data, 2);
            if ($arr_pos !== false) {
                // obtem o array de dados
                $dealData = explode(';', $arr_pos[0]);
                // valida o tamanho do aray esperado
                if (count($dealData) == 21) {
                    // em caso de sucesso na estrutura array persiste os dados
                    $deal = new Deal();
                    $deal = $deal->updateOrCreate(
                        [
                            'deal_ticket' => $dealData[0],
                        ],
                        [
                            'ea_code' => $dealData[19],
                            'account' => $dealData[20],
                            'deal_order' => $dealData[1],
                            'deal_time' => $dealData[2],
                            'deal_time_msc' => $dealData[3],
                            'deal_type' => $dealData[4],
                            'deal_entry' => $dealData[5],
                            'deal_magic' => $dealData[6],
                            'deal_reason' => $dealData[7],
                            'deal_position_id' => $dealData[8],
                            'deal_volume' => $dealData[9],
                            'deal_price' => $dealData[10],
                            'deal_commission' => $dealData[11],
                            'deal_swap' => $dealData[12],
                            'deal_profit' => $dealData[13],
                            'deal_fee' => $dealData[14],
                            'deal_sl' => $dealData[15],
                            'deal_tp' => $dealData[16],
                            'deal_symbol' => $dealData[17],
                            'deal_comment' => $dealData[18]
                        ]
                    );

                    // em caso de sucesso na coversão do json armazena apenas eventual continuidade de dados na conexão
                    if (count($arr_pos) == 2)
                        $all_data = $arr_pos[1];
                } else {
                    Log::info($all_data);
                    break;
                }
                /*
                else {
                    // em caso de erro na estrutura do array preserva os dados na conexão
                    // $all_data = trim($all_data);
                }
                */
            } else {
                Log::info($all_data);
                break;
            }
        }

        // atualiza/define os dados da conexão iterada
        //$this->setConnectionData($conn, ['data' => $all_data]);
    }
}
