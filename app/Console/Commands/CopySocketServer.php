<?php

namespace App\Console\Commands;

use App\Models\CopyClientPosition;
use SplObjectStorage;
use React\EventLoop\Factory;
use React\Socket\SocketServer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\CopySenderPosition;
use Exception;
use Illuminate\Support\Facades\Log;
use React\Socket\ConnectionInterface;

class CopySocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'copy_socket_server:server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Servidor de copy';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $loop = Factory::create();
        $socket = new SocketServer('0.0.0.0:8100');
        $pool = new ConnectionsPool();

        $socket->on('connection', function (ConnectionInterface $connection) use ($pool) {
            echo __LINE__ . ') [INFO] ' . date("Y-m-d H:i:s") . ' [' . $connection->getRemoteAddress() . ' connected]' . PHP_EOL;
            $pool->add($connection);
        });

        echo __LINE__ . ') [INFO] ' . date("Y-m-d H:i:s") . " Listening on {$socket->getAddress()}\n";

        $loop->run();
    }
}

class ConnectionsPool
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
            $this->sendAll("$data", $connection);
        });

        // When connection closes detach it from the pool
        $connection->on('close', function () use ($connection) {
            echo __LINE__ . ') [INFO] ' . date("Y-m-d H:i:s") . '[' . $connection->getRemoteAddress() . ' connection close]' . PHP_EOL;
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
     * Send data to all connections from the pool except
     * the specified one.
     *
     * @param mixed $data
     * @param ConnectionInterface $except
     */
    protected function sendAll($data, ConnectionInterface $except)
    {
        try {
            //echo $except->getRemoteAddress() . ' => ' . $data . PHP_EOL;
            //var_dump($this->getConnectionData($except));
            $arrDados = explode('|', $data);
            //var_dump($data);
            //var_dump($arrDados[0]);

            for ($i = 0; $i < count($arrDados); $i++) {

                $arrCabecalho   = explode(';', $arrDados[$i]);
                if (count($arrCabecalho) < 6)
                    break;

                $codigoEa       = $arrCabecalho[0];
                //var_dump($codigoEa);

                //var_dump($arrCabecalho);

                // fluxo para dados oriundos do sender...
                //echo $codigoEa . PHP_EOL;
                if ($codigoEa == 'sender') {
                    //echo $except->getRemoteAddress() . ' => ' . $data . PHP_EOL;

                    // array com posições específicas e diferentes entre sender e client
                    $symbolo        = $arrCabecalho[1];
                    $magic_number   = $arrCabecalho[2];
                    $qtdPosicoes    = $arrCabecalho[3];
                    $conta          = $arrCabecalho[4];
                    $copyID         = $arrCabecalho[5];

                    // só envia os dados recebidos pelo copy... para clientes com o mesmo ID 
                    /*
                foreach ($this->connections as $conn) {
                    // só envia os dados do sender para clientes do mesmo copy ID
                    $arrDadosConexao = $this->getConnectionData($conn);
                    if (array_key_exists('copy_id', $arrDadosConexao)) {
                        if ($conn != $except && $arrDadosConexao['copy_id'] == $copyID) {
                            $conn->write("\t" . $data);
                        }
                    }
                }
                */

                    // se exitem posições deve atualizar o status no banco de dados
                    $copySenderPosition = new CopySenderPosition();
                    if ($qtdPosicoes > 0) {

                        try {

                            // deve iterar sobre cada posição...
                            $positionsIds       = array();
                            for ($j = 1; $j <= $qtdPosicoes; $j++) {

                                $dadosPosicao = explode(';', trim($arrDados[$j]));
                                if (count($dadosPosicao) < 9)
                                    break;

                                //Log::info($copyID);
                                //DB::enableQueryLog();
                                $copySenderPosition = $copySenderPosition->updateOrCreate(
                                    [
                                        'expert_code' => $copyID,
                                        'magic_number' => $magic_number,
                                        'account' => $conta,
                                        'position_symbol' => $dadosPosicao[7],
                                        'position_id' => $dadosPosicao[8]
                                    ],
                                    [
                                        'position_ticket' => $dadosPosicao[1],
                                        'position_time' => $dadosPosicao[2],
                                        'position_type' => $dadosPosicao[3],
                                        'position_volume' => $dadosPosicao[4],
                                        'position_price_open' => $dadosPosicao[5],
                                        'position_profit' => $dadosPosicao[6],
                                        'position_symbol' => $dadosPosicao[7]
                                    ]
                                );
                                array_push($positionsIds, $dadosPosicao[8]);
                                //Log::info(DB::getQueryLog());
                            }
                            //var_dump($positionsIds);

                            try {
                                $copySenderPosition = $copySenderPosition->where('expert_code', '=', $copyID)
                                    ->where('account', '=', $conta)
                                    ->get();
                                foreach ($copySenderPosition as $position) {
                                    if (!in_array($position->position_id, $positionsIds)) {
                                        //echo "excluir: " . $position->position_ticket . PHP_EOL;
                                        $deleted = DB::table('copy_sender_positions')->where('position_id', '=', $position->position_id)
                                            ->where('expert_code', '=', $copyID)
                                            ->where('account', '=', $conta)
                                            ->delete();
                                    }
                                }
                            } catch (Exception $e) {
                                Log::info(__LINE__ . ') [ERROR]' . date("Y-m-d H:i:s") . ['error' => $e->getMessage()]);
                            }
                        } catch (Exception $e) {
                            Log::info(__LINE__ . ') [ERROR]' . date("Y-m-d H:i:s") . ['error' => $e->getMessage()]);
                        }
                    } else {
                        // se não houver nenhuma posição no ativo, deve remover eventual registro do banco de dados;
                        //$deleted = DB::table('copy_sender_positions')->where('position_symbol', '=', $symbolo)->delete();
                        // se não houver nenhuma posição no ativo deve criar ou atualizar o regitro correspondente ao sender iterado
                        //DB::enableQueryLog();
                        try {
                            $copySenderPosition = $copySenderPosition->updateOrCreate(
                                [
                                    'expert_code' => $copyID,
                                    'magic_number' => $magic_number,
                                    'account' => $conta,
                                    'position_symbol' => $symbolo,
                                    'position_id' => '',
                                ],
                                [
                                    'position_ticket' => '',
                                    'position_time' => '',
                                    'position_type' => '-1',
                                    'position_volume' => '',
                                    'position_price_open' => '',
                                    'position_profit' => '',
                                    'position_id' => '',
                                ]
                            );
                        } catch (Exception $e) {
                            Log::info(__LINE__ . ') [ERROR]' . date("Y-m-d H:i:s") . ['error' => $e->getMessage()]);
                        }

                        try {
                            $deleted = DB::table('copy_sender_positions')
                                ->where('id', '!=', $copySenderPosition->id)
                                ->where('expert_code', '=', $copyID)
                                ->where('account', '=', $conta)->delete();
                            //Log::info(DB::getQueryLog());
                        } catch (Exception $e) {
                            Log::info(__LINE__ . ') [ERROR]' . date("Y-m-d H:i:s") . ['error' => $e->getMessage()]);
                        }
                    }
                } else if ($codigoEa == 'client') {
                    try {
                        // dados do client apenas devem ser persistidos em banco
                        //echo $data . PHP_EOL;
                        $liveData = explode('!', trim($arrDados[$i]));
                        if (count($liveData) < 1)
                            break;
                        $dadosCabecalho = explode(';', trim($liveData[0]));
                        if (count($dadosCabecalho) < 24)
                            break;

                        // se é um cliente precisa registrar na conexão de que sinal ele é cliente (ID)...
                        $arrDadosConexao = $this->getConnectionData($except);
                        if (!array_key_exists('copy_id', $arrDadosConexao)) {
                            $this->setConnectionData($except, ['copy_id' => $dadosCabecalho[21]]);
                        }

                        //var_dump($dadosCabecalho);
                        $symbol                 = $dadosCabecalho[1];
                        $qdtPosicoes            = $dadosCabecalho[2];
                        $conta                  = $dadosCabecalho[3];
                        $account_balance        = $dadosCabecalho[4];
                        $account_equity         = $dadosCabecalho[5];
                        $account_trade_mode     = $dadosCabecalho[6];
                        $account_trade_allowed  = $dadosCabecalho[7];
                        $terminal_trade_allowed = $dadosCabecalho[8];
                        $mql_trade_allowed      = $dadosCabecalho[9];
                        $account_trade_expert   = $dadosCabecalho[10];
                        $account_credit         = $dadosCabecalho[11];
                        $account_profit         = $dadosCabecalho[12];
                        $account_margin_mode    = $dadosCabecalho[13];
                        $account_margin         = $dadosCabecalho[14];
                        $account_margin_free    = $dadosCabecalho[15];
                        $account_margin_level   = $dadosCabecalho[16];
                        $account_name           = $dadosCabecalho[17];
                        $account_server         = $dadosCabecalho[18];
                        $account_currency       = $dadosCabecalho[19];
                        $account_company        = $dadosCabecalho[20];
                        $expert_code          = $dadosCabecalho[22];
                        $magic_number           = $dadosCabecalho[23];

                        //echo $magic_number . PHP_EOL;
                        //echo $dadosCabecalho[23] . PHP_EOL;

                        //echo $numeroConta . PHP_EOL;
                        if ($conta > 0) {
                            //echo $numeroConta . PHP_EOL;
                            $positionsIds = array();

                            $copyClientPosition = new CopyClientPosition();
                            if ($qdtPosicoes == 0) {

                                try {
                                    $copyClientPosition = $copyClientPosition->updateOrCreate(
                                        [
                                            'account' => $conta,
                                            'position_magic' => $magic_number,
                                            'position_ticket' => ''
                                        ],
                                        [
                                            'expert_code' => $expert_code,
                                            'account_balance' => $account_balance,
                                            'account_equity' => $account_equity,
                                            'account_trade_mode' => $account_trade_allowed,
                                            'account_trade_allowed' => $account_trade_allowed,
                                            'terminal_trade_allowed' => $terminal_trade_allowed,
                                            'mql_trade_allowed' => $mql_trade_allowed,
                                            'account_trade_expert' => $account_trade_expert,
                                            'account_credit' => $account_credit,
                                            'account_profit' => $account_profit,
                                            'account_margin_mode' => $account_margin_mode,
                                            'account_margin' => $account_margin,
                                            'account_margin_free' => $account_margin_free,
                                            'account_margin_level' => $account_margin_level,
                                            'account_name' => $account_name,
                                            'account_server' => $account_server,
                                            'account_currency' => $account_currency,
                                            'account_company' => $account_company,
                                            'remote_adress' => $except->getRemoteAddress(),
                                            'position_time' => '',
                                            'position_type' => '-1',
                                            'position_magic' => $magic_number,
                                            'position_reason' => '',
                                            'position_id' => '',
                                            'position_volume' => '',
                                            'position_price_open' => '',
                                            'position_swap' => '',
                                            'position_profit' => '',
                                            'position_sl' => '',
                                            'position_tp' => '',
                                            'symbol' => $symbol,
                                            'position_comment' => ''
                                        ]
                                    );
                                } catch (Exception $e) {
                                    Log::info(__LINE__ . ') [ERROR]' . date("Y-m-d H:i:s") . ['error' => $e->getMessage()]);
                                }
                                try {
                                    $deleted = DB::table('copy_client_positions')
                                        ->where('id', '!=', $copyClientPosition->id)
                                        ->where('position_magic', '=', $magic_number)
                                        ->where('account', '=', $conta)
                                        ->delete();
                                } catch (Exception $e) {
                                    Log::info(__LINE__ . ') [ERROR]' . date("Y-m-d H:i:s") . ['error' => $e->getMessage()]);
                                }
                            } else {
                                for ($j = 1; $j <= $qdtPosicoes; $j++) {
                                    try {
                                        if (!array_key_exists($j, $liveData))
                                            break;

                                        $dadosPosicao = explode(';', trim($liveData[$j]));
                                        if (count($dadosPosicao) < 15)
                                            break;
                                        //echo $liveData[$j] . PHP_EOL;

                                        // exclui possível registro de conexão sem posição aberta no ativo...
                                        //DB::enableQueryLog();
                                        $copyClientPosition->where('account', '=', $conta)->where('symbol', '=', $symbol)->where('position_ticket', '=', NULL)->delete();
                                        //Log::info(DB::getQueryLog());

                                        $copyClientPosition = $copyClientPosition->updateOrCreate(
                                            [
                                                'account' => $conta,
                                                'position_magic' => $dadosPosicao[4],
                                                'position_ticket' => $dadosPosicao[1]
                                            ],
                                            [
                                                'symbol' => $dadosPosicao[13],
                                                'expert_code' => $expert_code,
                                                'account_balance' => $account_balance,
                                                'account_equity' => $account_equity,
                                                'account_trade_mode' => $account_trade_allowed,
                                                'account_trade_allowed' => $account_trade_allowed,
                                                'terminal_trade_allowed' => $terminal_trade_allowed,
                                                'mql_trade_allowed' => $mql_trade_allowed,
                                                'account_trade_expert' => $account_trade_expert,
                                                'account_credit' => $account_credit,
                                                'account_profit' => $account_profit,
                                                'account_margin_mode' => $account_margin_mode,
                                                'account_margin' => $account_margin,
                                                'account_margin_free' => $account_margin_free,
                                                'account_margin_level' => $account_margin_level,
                                                'account_name' => $account_name,
                                                'account_server' => $account_server,
                                                'account_currency' => $account_currency,
                                                'account_company' => $account_company,
                                                'remote_adress' => $except->getRemoteAddress(),
                                                'position_time' => $dadosPosicao[2],
                                                'position_type' => $dadosPosicao[3],
                                                'position_magic' => $dadosPosicao[4],
                                                'position_reason' => $dadosPosicao[5],
                                                'position_id' => $dadosPosicao[6],
                                                'position_volume' => $dadosPosicao[7],
                                                'position_price_open' => $dadosPosicao[8],
                                                'position_swap' => $dadosPosicao[9],
                                                'position_profit' => $dadosPosicao[10],
                                                'position_sl' => $dadosPosicao[11],
                                                'position_tp' => $dadosPosicao[12],
                                                'position_symbol' => $dadosPosicao[13],
                                                'position_comment' => $dadosPosicao[14]
                                            ]
                                        );
                                        array_push($positionsIds, $dadosPosicao[1]);
                                    } catch (Exception $e) {
                                        Log::info(__LINE__ . ') [ERROR]' . date("Y-m-d H:i:s") . ['error' => $e->getMessage()]);
                                    }
                                }

                                try {
                                    $positionsLiveData = $copyClientPosition->where('account', '=', $conta)->where('position_magic', '=', $magic_number)->get();
                                    //Log::info($positionsLiveData);
                                    foreach ($positionsLiveData as $position) {
                                        if (!in_array($position->position_ticket, $positionsIds)) {
                                            //echo "excluir: " . $position->position_ticket . PHP_EOL;
                                            $deleted = DB::table('copy_client_positions')->where('account', '=', $conta)->where('position_ticket', '=', $position->position_ticket)->where('position_magic', '=', $magic_number)->delete();
                                        }
                                    }
                                } catch (Exception $e) {
                                    Log::info(__LINE__ . ') [ERROR]' . date("Y-m-d H:i:s") . ['error' => $e->getMessage()]);
                                }
                            }

                            //var_dump($positionsIds);
                        }
                    } catch (Exception $e) {
                        Log::info(__LINE__ . ') [ERROR]' . date("Y-m-d H:i:s") . ['error' => $e->getMessage()]);
                    }
                }
            }
        } catch (Exception $e) {
            Log::info(__LINE__ . ') [ERROR]' . date("Y-m-d H:i:s") . ['error' => $e->getMessage()]);
        }
    }
}
