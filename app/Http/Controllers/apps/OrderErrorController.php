<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class OrderErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ((isset($request['date_from']) & !empty($request['date_from']))) {
            $date_from = date_create_from_format('d/m/Y H:i', $request['date_from'] . ' 00:00');
            $date_from_filter = $request['date_from'];
        } else {
            $date_from = new DateTime(date("Y-m-d") . ' 00:00');
            $date_from_filter = date("d/m/Y");
        }
        if ((isset($request['date_to']) & !empty($request['date_to']))) {
            $date_to = date_create_from_format('d/m/Y H:i:s', $request['date_to'] . ' 23:59:59');
            $date_to_filter = $request['date_to'];
        } else {
            $date_to = new DateTime(date("Y-m-d") . ' 23:59:59');
            $date_to_filter = date("d/m/Y");
        }

        $dados = DB::table('order_errors as oe')
            ->join('accounts as a', 'a.account', '=', 'oe.account')
            ->join('users as u', 'u.id', '=', 'a.user_id')
            //->join('expert_advisors as e', 'e.code', '=', 'oe.ea_code')
            //->where('e.magic_number', '=', 'oe.magic_number')
            ->select('u.name', 'u.email', 'oe.*')
            //->where('c.user_id', '=', Auth::user()->id)
            ->orderBy('oe.id', 'desc')
            ->whereBetween('oe.created_at', [$date_from, $date_to]);
        if (isset($request['client']) & !empty($request['client'])) {
            $dados  = $dados->where('a.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('a.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) & !empty($request['account'])) {
            $dados  = $dados->where('oe.account', '=', $request['account']);
        }
        if (isset($request['ea']) & !empty($request['ea'])) {
            $dados  = $dados->where('oe.magic_number', '=', $request['ea']);
        }
        $dados = $dados->get();
        
        
        //$consolidado['order_errors'] = $dados->get();

        $errors_data = array();
        foreach ($dados as $obj) {
            $obj->runtime_error_code_description = $this->get_runtime_error_code_description($obj->runtime_error_code);
            $obj->trade_server_return_code_description = $this->get_trade_server_code_description($obj->trade_server_return_code);
            $errors_data[] = (array) $obj;
        }

        $consolidado['order_errors'] = collect($errors_data);
        
        //retorna a lista de membros de grupo de permissão caso o usuário seja supervisor        
        $users = $dados = DB::table('users as u')
            ->join('supervisor_group_members as sgm', 'sgm.user_id', '=', 'u.id')
            ->join('supervisor_groups as sg', 'sg.id', '=', 'sgm.supervisor_group_id')
            ->join('supervisors as s', 's.supervisor_group_id', '=', 'sg.id')
            ->select('u.*')
            ->where('s.user_id', '=', Auth::user()->id)
            ->orderBy('u.name', 'asc')
            ->orderBy('u.email', 'asc')
            ->get();

        //obtem a lisa de experts que estão vinculadas ao usuário logado
        $dados = DB::table('expert_advisors as ea')
            ->join('licenses as l', 'l.expert_advisor_id', '=', 'ea.id')
            ->join('accounts as c', 'c.id', '=', 'l.account_id')
            ->select('ea.id', 'ea.magic_number', 'ea.description');
        if (isset($request['client']) & !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) & !empty($request['account'])) {
            $dados  = $dados->where('c.account', '=', $request['account']);
        }
        $experts = $dados->where('ea.active', '=', '1')
            ->where('ea.visible', '=', '1')
            ->groupBy('ea.id')->get();

        //obtem a lista de accounts que estão vinculadas ao usuário logado com licença ativa
        $dados = DB::table('accounts as c')
            //->join('licenses as l', 'l.account_id', '=', 'c.id')
            ->select('c.*');
        //->whereRaw('(l.vitalicio = 1 OR l.validade >= curdate())');
        if (isset($request['client']) & !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        $accounts = $dados->orderBy('c.account')
            ->groupBy('c.account')
            ->get();

        $message = session('message');

        return view('apps.order_error.index')->with([
            'data' => $consolidado,
            'date_from' => $date_from_filter,
            'date_to' => $date_to_filter,
            'client' => $request['client'],
            'account' => $request['account'],
            'ea' => $request['ea'],
            'users' => $users,
            'experts' => $experts,
            'accounts' => $accounts,
            'message' => $message
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filtros(Request $request)
    {
        //Log::info($request);
        //DB::enableQueryLog();

        //retorna a lista de membros de grupo de permissão caso o usuário seja supervisor        
        $consolidado['users'] = array();
        $consolidado['users'] = $dados = DB::table('users as u')
            ->join('supervisor_group_members as sgm', 'sgm.user_id', '=', 'u.id')
            ->join('supervisor_groups as sg', 'sg.id', '=', 'sgm.supervisor_group_id')
            ->join('supervisors as s', 's.supervisor_group_id', '=', 'sg.id')
            ->select('u.*')
            ->where('s.user_id', '=', Auth::user()->id)
            ->orderBy('u.name', 'asc')
            ->orderBy('u.email', 'asc')
            ->get();
        //Log::info("users: " . $consolidado['users']);
        //Log::info(DB::getQueryLog());

        /*        
        if(isset($request['client']) & !empty($request['client'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        */

        //obtem a lisa de experts que estão vinculadas ao usuário logado
        $dados = DB::table('expert_advisors as ea')
            ->join('licenses as l', 'l.expert_advisor_id', '=', 'ea.id')
            ->join('accounts as c', 'c.id', '=', 'l.account_id')
            ->select('ea.id', 'ea.magic_number', 'ea.description');
        if (isset($request['client']) & !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) & !empty($request['account'])) {
            $dados  = $dados->where('c.account', '=', $request['account']);
        }
        $consolidado['eas'] = array();
        $consolidado['eas'] = $dados->where('ea.active', '=', '1')
            ->where('ea.visible', '=', '1')
            ->groupBy('ea.id')->get();
        //Log::info($consolidado['eas']);
        //Log::info(json_encode($consolidado['eas']));

        //DB::enableQueryLog();
        //obtem a lista de accounts que estão vinculadas ao usuário logado com licença ativa
        $dados = DB::table('accounts as c')
            //->join('licenses as l', 'l.account_id', '=', 'c.id')
            ->select('c.*');
        //->whereRaw('(l.vitalicio = 1 OR l.validade >= curdate())');
        if (isset($request['client']) & !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        $consolidado['accounts'] = array();
        $consolidado['accounts'] = $dados->orderBy('c.account')
            ->groupBy('c.account')
            ->get();
        //Log::info(DB::getQueryLog());

        return response()->json($consolidado, Response::HTTP_OK);
    }

    public function get_trade_server_code_description($in_error_code)
    {
        switch ($in_error_code) {
            case 10004:
                return "Nova Cotação";
            case 10006:
                return "Solicitação rejeitada";
            case 10007:
                return "Solicitação cancelada pelo negociador";
            case 10008:
                return "Ordem colocada";
            case 10009:
                return "Solicitação concluída";
            case 10010:
                return "Somente parte da solicitação foi concluída";
            case 10011:
                return "Erro de processamento de solicitação";
            case 10012:
                return "Solicitação cancelada por expiração de tempo (timeout)";
            case 10013:
                return "Solicitação inválida";
            case 10014:
                return "Volume inválido na solicitação";
            case 10015:
                return "Preço inválido na solicitação";
            case 10016:
                return "Stops inválidos na solicitação";
            case 10017:
                return "Negociação está desabilitada";
            case 10018:
                return "Mercado está fechado";
            case 10019:
                return "Não existe dinheiro suficiente para completar a solicitação";
            case 10020:
                return "Os preços se alteraram";
            case 10021:
                return "Não existem cotações para processar a solicitação";
            case 10022:
                return "Data de expiração da ordem inválida na solicitação";
            case 10023:
                return "Estado da ordem alterada";
            case 10024:
                return "Solicitações com freqüência em excesso";
            case 10025:
                return "Sem alterações na solicitação";
            case 10026:
                return "Autotrading desabilitado pelo servidor";
            case 10027:
                return "Autotrading desabilitado pelo terminal cliente";
            case 10028:
                return "Solicitação bloqueada para processamento";
            case 10029:
                return "Ordem ou posição congeladas";
            case 10030:
                return "Tipo de preenchimento de ordem inválido";
            case 10031:
                return "Sem conexão com o servidor de negociação";
            case 10032:
                return "Operação é permitida somente para contas reais";
            case 10033:
                return "O número de ordens pendentes atingiu o limite";
            case 10034:
                return "O volume de ordens e posições para o ativo atingiu o limite";
            case 10035:
                return "Incorreto ou proibida tipo de ordem";
            case 10036:
                return "Posição com a especificação POSITION_IDENTIFIER já foi fechado";
            case 10038:
                return "O volume que se pode fechar excede o volume da posição atual";
            case 10039:
                return "Para a posição indicada já existe uma ordem de fechamento. Pode aoontecer no trabalho no sistema de cobertura: \n - ao tentar fechar a posição oposta, se já existir uma ordem para fechamento desta posição \n - ao tentar fechar completa ou parcialmente, se o volume total de ordens existentes para fechamento e o volume total da ordem re-colocada excede o volume da posição atual";
            case 10040:
                return "O número de posições abertas, que pode estar simultaneamente na conta, pode ser limitado pelas definições do servidor. Quando é atingido o limite, em resposta à colocação de uma ordem, o servidor retorna o erro TRADE_RETCODE_LIMIT_POSITIONS. A restrição opera de forma diferente dependendo do tipo de cálculo para as posições da conta: \n - Sistema de compensação – considera o número de posições abertas. Ao atingir o limite, a plataforma não permite colocar novas ordens, cuja execução pode aumentar o número de posições abertas. Na verdade, a plataforma irá colocar ordens apenas para os símbolos que já têm posições abertas. No sistema de compensação, durante a verificação do limite, não são levadas em conta as ordens pendentes atuais, uma vez que sua execução pode conduzir a uma alteração nas posições atuais, em vez de um aumento do seu número.\n - Sistema de cobertura – além das posições abertas, são consideradas as ordens pendentes colocadas, uma vez que sua execução sempre conduz à apertura de uma nova posição. Ao atingir o limite, a plataforma não permite colocar tanto ordens de mercado para abrir posições quanto ordens pendentes.";
            case 10041:
                return "O pedido de ativação da ordem pendente foi rejeitado, e a ordem cancelada";
            case 10042:
                return "O pedido foi rejeitado, porque, no símbolo, foi definida a regra \"Somente são permitidas posições longas\" (POSITION_TYPE_BUY)";
            case 10043:
                return "O pedido foi rejeitado, porque, no símbolo, foi definida a regra \"Somente são permitidas posições curtas\" (POSITION_TYPE_SELL)";
            case 10044:
                return "O pedido foi rejeitado, porque, no símbolo, foi definida a regra \"Só é permitido o fechamento de posição\"";
            case 10045:
                return "O pedido foi rejeitado, porque, no símbolo, foi definida a regra \"Só é permitido o fechamento da posição existente segundo o princípio FIFO\" (ACCOUNT_FIFO_CLOSE=true)";
            case 10046:
                return "O pedido foi rejeitado, porque, no símbolo, foi definida a regra \"Proibido abrir posições opostas segundo um mesmo símbolo\". Por exemplo, se a conta tiver uma posição Buy, o usuário não poderá abrir uma posição Sell ou colocar uma ordem de venda pendente. A regra só pode ser aplicada em contas com sistema de cobertura (ACCOUNT_MARGIN_MODE=ACCOUNT_MARGIN_MODE_RETAIL_HEDGING).";
        }
        return "";
    }

    public function get_runtime_error_code_description($in_error_code)
    {
        switch ($in_error_code) {
            case  0:
                return "A operação concluída com sucesso";
            case  4001:
                return "Erro interno inesperado";
            case  4002:
                return "Parâmetro errado na chamada interna da função do terminal cliente";
            case  4003:
                return "Parâmetro errado ao chamar a função de sistema";
            case  4004:
                return "Sem memória suficiente para executar a função de sistema";
            case  4005:
                return "A estrutura contém objetos de strings e/ou arrays dinâmicos e/ou estrutura de tais objetos e/ou classes";
            case  4006:
                return "Array de um tipo errado, tamanho errado, ou um objeto defeituoso de um array dinâmico";
            case  4007:
                return "Sem memória suficiente para a realocação de um array, ou uma tentativa de alterar o tamanho de um array estático";
            case  4008:
                return "Sem memória suficiente para a realocação de string";
            case  4009:
                return "String não inicializada";
            case  4010:
                return "Data e/ou hora inválida";
            case  4011:
                return "Total amount of elements in the array cannot exceed 2147483647";
            case  4012:
                return "Ponteiro errado";
            case  4013:
                return "Tipo errado de ponteiro";
            case  4014:
                return "Função de sistema não é permitida para chamar";
            case  4015:
                return "Os nomes do recurso dinâmico e do estático equivalem";
            case  4016:
                return "Recurso com este nome não foi encontrado em EX5";
            case  4017:
                return "Tipo de recurso não suportado ou seu tamanho excede 16 Mb";
            case  4018:
                return "O nome do recurso excede 63 caracteres";
            case  4019:
                return "Durante cálculo de funções matemáticas ocorreu um estouro";
            case  4020:
                return "Excede a data de término do teste após chamar Sleep()";
            case  4022:
                return "Os testes foram interrompidos forçosamente de fora. Por exemplo, ao interromper a otimização, ao fechar a janela de teste visual ou ao parar o agente de teste";
            case  4023:
                return "Tipo inválido";
            case  4024:
                return "Manipulador inválido";
            case  4025:
                return "Pool de objetos cheio";
            case  4101:
                return "Identificador de gráfico (chart ID) errado";
            case  4102:
                return "Gráfico não responde";
            case  4103:
                return "Gráfico não encontrado";
            case  4104:
                return "Nenhum Expert Advisor no gráfico que pudesse manipular o evento";
            case  4105:
                return "Erro de abertura de gráfico";
            case  4106:
                return "Falha ao alterar ativo e período de um gráfico";
            case  4107:
                return "Valor de erro do parâmetro para a função que trabalha com gráficos";
            case  4108:
                return "Falha ao criar timer";
            case  4109:
                return "Identificador de propriedade (property ID) do gráfico errado";
            case  4110:
                return "Erro criando telas (screenshots)";
            case  4111:
                return "Erro navegando através de gráfico";
            case  4112:
                return "Erro aplicando template";
            case  4113:
                return "Sub-janela contendo o indicador não foi encontrada";
            case  4114:
                return "Erro adicionando um indicador no gráfico";
            case  4115:
                return "Erro excluindo um indicador do gráfico";
            case  4116:
                return "Indicador não encontrado no gráfico especificado";
            case  4201:
                return "Erro trabalhando com um objeto gráfico";
            case  4202:
                return "Objeto gráfico não foi encontrado";
            case  4203:
                return "Identificador (ID) de uma propriedade de objeto gráfico errado";
            case  4204:
                return "Não foi possível obter data correspondente ao valor";
            case  4205:
                return "Não foi possível obter valor correspondente à data";
            case  4301:
                return "Ativo desconhecido";
            case  4302:
                return "Ativo não está selecionado na janela Observação de Mercado";
            case  4303:
                return "Identificador de uma propriedade de ativo errado";
            case  4304:
                return "Hora do último tick não é conhecida (sem ticks)";
            case  4305:
                return "Erro adicionando ou excluindo um ativo na janela Observação de Marcado";
            case  4401:
                return "Histórico solicitado não encontrado";
            case  4402:
                return "Identificador (ID) da propriedade de histórico errado";
            case  4403:
                return "Esgotado o tempo de solicitação do histórico";
            case  4404:
                return "Número de barras restrito pelas configurações do terminal";
            case  4405:
                return "Erros múltiplos ao carregar o histórico";
            case  4407:
                return "A matriz de recebimento é muito pequena para armazenar todos os dados solicitados";
            case  4501:
                return "Variável global do terminal cliente não foi encontrada";
            case  4502:
                return "Variável global do terminal cliente com o mesmo nome já existe";
            case  4503:
                return "Não houve modificações de variáveis ​​globais";
            case  4504:
                return "Foi impossível abrir e ler o arquivo com os valores das variáveis ​​globais";
            case  4505:
                return "Foi impossível escrever o arquivo com os valores das variáveis ​​globais";
            case  4510:
                return "Envio de email falhou";
            case  4511:
                return "Reprodução de som falhou";
            case  4512:
                return "Identificador de propriedade do programa errado";
            case  4513:
                return "Identificador de propriedade do terminal errado";
            case  4514:
                return "Envio de arquivo via ftp falhou";
            case  4515:
                return "Falha ao enviar uma notificação";
            case  4516:
                return "Parâmetro inválido para enviar uma notificação — uma string vazia ou NULL foi passada para a função SendNotification()";
            case  4517:
                return "Configurações de notificações erradas no terminal (ID não está especificado ou permissão não está definida)";
            case  4518:
                return "Freqüência de envio de notificações em excesso";
            case  4519:
                return "O servidor FTP não está especificado nos atributos de configuração";
            case  4520:
                return "O login FTP não está especificado nos atributos de configuração";
            case  4521:
                return "O ficheiro não existe";
            case  4522:
                return "A ligação ao servidor FTP falhou";
            case  4523:
                return "Não foi encontrado o diretório no servidor FTP para o upload do ficheiro";
            case  4601:
                return "Sem memória suficiente para a distribuição de buffers de indicador";
            case  4602:
                return "Índice de buffer de indicador errado";
            case  4603:
                return "Identificador (ID) de propriedade do indicador customizado errado";
            case  4701:
                return "Identificador (ID) de propriedade da conta errado";
            case  4751:
                return "Identificador (ID) de propriedade da negociação (trade) errado";
            case  4752:
                return "Negociação via Expert Advisors proibida";
            case  4753:
                return "Posição não encontrada";
            case  4754:
                return "Ordem não encontrada";
            case  4755:
                return "Operação (deal) não encontrada";
            case  4756:
                return "Envio de solicitação de negociação falhou";
            case  4758:
                return "Impossível calcular o valor do índice de negociação";
            case  4801:
                return "Ativo desconhecido";
            case  4802:
                return "Indicador não pode ser criado";
            case  4803:
                return "Sem memória suficiente para adicionar o indicador";
            case  4804:
                return "O indicador não pode ser aplicado a um outro indicador";
            case  4805:
                return "Erro ao aplicar um indicador ao gráfico";
            case  4806:
                return "Dado solicitado não encontrado";
            case  4807:
                return "Manuseio de indicador errado";
            case  4808:
                return "Numero errado de parâmetros ao criar um indicador";
            case  4809:
                return "Sem parâmetros ao criar um indicador";
            case  4810:
                return "O primeiro parâmetro no array deve ser o nome do indicador customizado";
            case  4811:
                return "Tipo de parâmetro inválido no array ao criar um indicador";
            case  4812:
                return "Índice errado de buffer do indicador solicitado";
            case  4901:
                return "Profundidade de Mercado não pode ser adicionado";
            case  4902:
                return "Profundidade de Mercado não pode ser removido";
            case  4903:
                return "Os dados da Profundidade de Mercado não podem ser obtidos";
            case  4904:
                return "Erro em subscrever para receber novos dados da Profundidade de Mercado";
            case  5001:
                return "Mais que 64 arquivos não podem ser abertos ao mesmo tempo";
            case  5002:
                return "Nome de arquivo inválido";
            case  5003:
                return "Nome de arquivo longo demais";
            case  5004:
                return "Erro de abertura de arquivo";
            case  5005:
                return "Sem memória suficiente de cache para leitura";
            case  5006:
                return "Erro excluindo arquivo";
            case  5007:
                return "Um arquivo com este handle foi fechado, ou simplesmente não estava aberto";
            case  5008:
                return "Handle de arquivo errado";
            case  5009:
                return "O arquivo deve estar abertura para escrita";
            case  5010:
                return "O arquivo deve estar aberto para leitura";
            case  5011:
                return "O arquivo deve estar aberto como um arquivo binário";
            case  5012:
                return "O arquivo deve estar aberto como um texto";
            case  5013:
                return "O arquivo deve estar aberto como um texto ou CSV";
            case  5014:
                return "O arquivo deve estar aberto como CSV";
            case  5015:
                return "Erro de leitura de arquivo";
            case  5016:
                return "Tamanho da string deve estar especificado, porque o arquivo está aberto como binário";
            case  5017:
                return "Um arquivo de texto deve ser usado para arrays de strings, para outros arrays - binários";
            case  5018:
                return "Isto não é um arquivo, isto é um diretório";
            case  5019:
                return "Arquivo inexistente";
            case  5020:
                return "Arquivo não pode ser reescrito";
            case  5021:
                return "Nome de diretório errado";
            case  5022:
                return "Diretório inexistente";
            case  5023:
                return "Isto é um arquivo, não um diretório";
            case  5024:
                return "O diretório não pode ser removido";
            case  5025:
                return "Falha ao limpar o diretório (provavelmente um ou mais arquivos estão bloqueados e a operação de remoção falhou)";
            case  5026:
                return "Falha ao escrever um recurso para um arquivo";
            case  5027:
                return "Falha ao ler o próximo bloco de dados a partir do arquivo CSV (FileReadString, FileReadNumber, FileReadDatetime, FileReadBool), porque atingido o final do arquivo";
            case  5030:
                return "Sem data na string";
            case  5031:
                return "Data errada na string";
            case  5032:
                return "Hora errada na string";
            case  5033:
                return "Erro convertendo string em data";
            case  5034:
                return "Sem memória suficiente para a string";
            case  5035:
                return "O comprimento da string é menor que o esperado";
            case  5036:
                return "Número grande demais, maior que ULONG_MAX";
            case  5037:
                return "string de formato inválido";
            case  5038:
                return "Quantidade de especificadores de formato maior que de parâmetros";
            case  5039:
                return "Quantidade de parâmetros maior que de especificadores de formato";
            case  5040:
                return "Parâmetro de tipo string defeituoso";
            case  5041:
                return "Posição fora da string";
            case  5042:
                return "0 adicionado ao final da string, uma operação inútil";
            case  5043:
                return "Tipo de dado desconhecido ao converter para uma string";
            case  5044:
                return "Objeto de string defeituoso";
            case  5050:
                return "Copiando arrays incompatíveis. Array de string pode ser copiado somente para um array de string, e um array numérico - somente em um array numérico";
            case  5051:
                return "O array de recepção está declarado como AS_SERIES, e é de tamanho insuficiente.";
            case  5052:
                return "Array pequeno demais, a posição inicial está fora do array";
            case  5053:
                return "Um array de comprimento zero";
            case  5054:
                return "Deve ser um array numérico";
            case  5055:
                return "Deve ser um array unidimensional";
            case  5056:
                return "Série de tempo (timeseries) não pode ser usada";
            case  5057:
                return "Deve ser um array de tipo double";
            case  5058:
                return "Deve ser um array de tipo float";
            case  5059:
                return "Deve ser um array de tipo long";
            case  5060:
                return "Deve ser um array de tipo int";
            case  5061:
                return "Deve ser um array de tipo short";
            case  5062:
                return "Deve ser um array de tipo char";
            case  5063:
                return "Deve ser uma matriz do tipo cadeia de caracteres";
            case  5100:
                return "Funções OpenCL não são suportados neste computador";
            case  5101:
                return "Erro interno ocorreu ao executar OpenCL";
            case  5102:
                return "Handle de OpenCL inválido";
            case  5103:
                return "Erro criando o contexto de OpenCL";
            case  5104:
                return "Falha ao criar um fila de execução em OpenCL";
            case  5105:
                return "Erro ocorreu ao compilar um programa OpenCL";
            case  5106:
                return "Nome de kernel longo demais(kernel de OpenCL)";
            case  5107:
                return "Erro criando um kernel de OpenCL";
            case  5108:
                return "Erro ocorreu ao configurar parâmetrospara o kernel de OpenCL";
            case  5109:
                return "Erro em tempo de execução de programa de OpenCL";
            case  5110:
                return "Tamanho inválido do buffer de OpenCL";
            case  5111:
                return "Deslocamento (offset) inválido do buffer de OpenCL";
            case  5112:
                return "Falha ao criar um buffer de OpenCL";
            case  5113:
                return "Excedido o número máximo de objetos OpenCL";
            case  5114:
                return "Erro ao selecionar o dispositivo OpenCL";
            case  5120:
                return "Erro interno no banco de dados";
            case  5121:
                return "Identificador de banco de dados inválido";
            case  5122:
                return "Número máximo de objetos de banco de dados excedido";
            case  5123:
                return "Erro ao conectar ao banco de dados";
            case  5124:
                return "Erro de execução de consulta";
            case  5125:
                return "Erro ao criar consulta";
            case  5126:
                return "Não há mais dados de leitura";
            case  5127:
                return "Erro ao passar para o próximo registro da consulta";
            case  5128:
                return "Os dados para leitura dos resultados da consulta ainda não estão prontos";
            case  5129:
                return "Erro de substituição automática de parâmetro na consulta SQL";
            case  5200:
                return "URL inválido";
            case  5201:
                return "Falha ao conectar com o URL especificado";
            case  5202:
                return "Tempo limite excedido";
            case  5203:
                return "Falha na solicitação do HTTP";
            case  5270:
                return "Para a função foi passado um identificador de soquete inválido.";
            case  5271:
                return "Muitos soquetes abertos (máximo 128)";
            case  5272:
                return "Erro ao conectar-se ao host remoto";
            case  5273:
                return "Erro ao enviar/receber dados do soquete";
            case  5274:
                return "Erro ao estabelecer uma conexão segura (TLS Handshake)";
            case  5275:
                return "Não há dados sobre o certificado que protege a conexão.";
            case  5300:
                return "Deve ser especificado o símbolo personalizado";
            case  5301:
                return "Nome de símbolo personalizado incorreto. No nome do símbolo é possível utilizar apenas caracteres latinos sem pontuação, espaços e caracteres especiais (são permitidos \".\", \"_\", \"&\" e \"#\"). Não é recomendado usar os caracteres <, >, :, \", /,\\, |, ?, *.";
            case  5302:
                return "Nome demasiado longo para o símbolo personalizado. O nome não pode exceder 32 caracteres tendo em conta o 0 final";
            case  5303:
                return "Caminho demasiado longo para o símbolo personalizado. A caminho não deve exceder 128 caracteres, tendo em conta \"Custom\\\", o nome do símbolo, separadores de grupos e o 0 final";
            case  5304:
                return "Já existe um caráter personalizado com esse nome";
            case  5305:
                return "Erro ao criar, excluir ou modificar o símbolo personalizado";
            case  5306:
                return "Tentativa de excluir um símbolo personalizado selecionado na Observação do mercado (Market Watch)";
            case  5307:
                return "Propriedade de símbolo personalizado incorreto";
            case  5308:
                return "Parâmetro errado ao definir propriedade do símbolo personalizado";
            case  5309:
                return "Parâmetro de cadeia muito longo ao definir propriedade do símbolo personalizado";
            case  5310:
                return "Array de ticks não sequenciada por tempo";
            case  5400:
                return "Tamanho de array insuficiente para obter descrições de todos os valores";
            case  5401:
                return "Limite de tempo da solicitação excedido";
            case  5402:
                return "País não encontrado";
            case  5601:
                return "Generic error";
            case  5602:
                return "SQLite internal logic error";
            case  5603:
                return "Access denied";
            case  5604:
                return "Callback routine requested abort";
            case  5605:
                return "Database file locked";
            case  5606:
                return "Database table locked";
            case  5607:
                return "Insufficient memory for completing operation";
            case  5608:
                return "Attempt to write to readonly database";
            case  5609:
                return "Operation terminated by sqlite3_interrupt()";
            case  5610:
                return "Disk I/O error";
            case  5611:
                return "Database disk image corrupted";
            case  5612:
                return "Unknown operation code in sqlite3_file_control()";
            case  5613:
                return "Insertion failed because database is full";
            case  5614:
                return "Unable to open the database file";
            case  5615:
                return "Database lock protocol error";
            case  5616:
                return "Internal use only";
            case  5617:
                return "Database schema changed";
            case  5618:
                return "String or BLOB exceeds size limit";
            case  5619:
                return "Abort due to constraint violation";
            case  5620:
                return "Data type mismatch";
            case  5621:
                return "Library used incorrectly";
            case  5622:
                return "Uses OS features not supported on host";
            case  5623:
                return "Authorization denied";
            case  5624:
                return "Not used";
            case  5625:
                return "Bind parameter error, incorrect index";
            case  5626:
                return "File opened that is not database file";
            case  5700:
                return "Erro interno do subsistema de execução de matrizes/vetores";
            case  5701:
                return "Matriz/vetor não inicializado";
            case  5702:
                return "Tamanho de matrizes/vetores em operação inconsistente";
            case  5703:
                return "Tamanho da matriz/vetor incorreto";
            case  5704:
                return "Tipo de matriz/vetor inválido";
            case  5705:
                return "Função não disponível para esta matriz/vetor";
            case  5706:
                return "Matriz/vetor contém não-números (Nan/Inf)";
            case  5800:
                return "Erro interno do padrão ONNX";
            case  5801:
                return "Erro de inicialização ONNX Runtime API";
            case  5802:
                return "Propriedade ou valor não compatível com a linguagem MQL5";
            case  5803:
                return "Erro ao iniciar a ONNX runtime API";
            case  5804:
                return "Número inválido de parâmetros passados para OnnxRun";
            case  5805:
                return "Valor de parâmetro incorreto";
            case  5806:
                return "Tipo de parâmetro incorreto";
            case  5807:
                return "Tamanho de parâmetro incorreto";
            case  5808:
                return "Dimensão do tensor não definida ou especificada incorretamente";
            case  65536:
                return "Erros definidos pelo usuário começam com este código";
        }
        return "";
    }
}
