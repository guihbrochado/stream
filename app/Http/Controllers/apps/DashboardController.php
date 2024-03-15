<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\ExpertAdvisor;
use App\Models\License;
use App\Models\Supervisor;
use App\Models\User;
use DateTime;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //DB::enableQueryLog();
        //Log::info(DB::getQueryLog());
        set_time_limit(0);

        // obtém os dados dos filtros
        $filtros = $this->filtros_data($request);

        if ((isset($request['date_from']) && !empty($request['date_from']))) {
            $date_from = date_create_from_format('d/m/Y H:i', $request['date_from'] . ' 00:00');
            $date_from_filter = $request['date_from'];
        } else {
            $date_from = new DateTime(date("Y-m-d") . ' 00:00');
            $date_from_filter = date("d/m/Y");
        }
        if ((isset($request['date_to']) && !empty($request['date_to']))) {
            $date_to = date_create_from_format('d/m/Y H:i:s', $request['date_to'] . ' 23:59:59');
            $date_to_filter = $request['date_to'];
        } else {
            $date_to = new DateTime(date("Y-m-d") . ' 23:59:59');
            $date_to_filter = date("d/m/Y");
        }

        $ea = new ExpertAdvisor();
        if ($filtros['ea_id'] > 0) {
            $ea = $ea::where('id', '=', $filtros['ea_id'])->select('id', 'magic_number')->first();
        }
        
        $dados = DB::table('deals as d')
            ->join('accounts as a', 'a.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit_total, d.*'))
            ->groupBy('d.deal_position_id')
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if ($filtros['client_id'] > 0) {
            $dados->where('a.user_id', '=', $filtros['client_id']);
        }
        if ($filtros['account'] > 0) {
            $dados->where('d.account', '=', $filtros['account']);
        }
        if (isset($ea->id)) {
            $dados->where('d.deal_magic', '=', $ea->magic_number)
                ->whereExists(function (Builder $query) use ($ea) {
                    $query->select(DB::raw(1))
                        ->from('licenses as l')
                        ->where('l.expert_advisor_id', '=', $ea->id)
                        ->whereColumn('l.account_id', 'a.id');
                });
        }
        if ($filtros['supervisor']) {
            // para o supervisor só pode retornar dados das contas nas quais exista licença em seus grupos de supervisão
            // a não ser para as contas do supevisor
            $dados->whereExists(function (Builder $query) {
                $query->select(DB::raw(1))
                    ->from('supervisors as s')
                    ->join('supervisor_group_experts as sge', 'sge.supervisor_group_id', '=', 's.supervisor_group_id')
                    ->join('licenses as lc', 'lc.expert_advisor_id', '=', 'sge.expert_advisor_id')
                    ->join('accounts as ac', 'ac.id', '=', 'lc.account_id')
                    ->where('s.user_id', '=', Auth::user()->id)
                    ->whereColumn('ac.id', '=', 'a.id');
            });
        }
        $dados = $dados->get();

        $consolidado['qtd_profits'] = 0;
        $consolidado['valor_profits']   = 0;
        $consolidado['qtd_loss']    = 0;
        $consolidado['valor_loss']  = 0;
        $consolidado['maior_profit'] = 0;
        $consolidado['maior_perda'] = 0;
        $saldoMaximo    = 0;
        $saldo          = 0;
        $drawdownMaximo = 0;
        $drawdown       = 0;
        $qtd            = 0;
        foreach ($dados as $key => $data) {
            if ($data->deal_profit_total > 0) {
                $consolidado['qtd_profits']++;
                $consolidado['valor_profits']  += $data->deal_profit_total;
            }
            if ($data->deal_profit_total < 0) {
                $consolidado['qtd_loss']++;
                $consolidado['valor_loss'] += $data->deal_profit_total;
            }
            $consolidado['maior_profit'] = ($data->deal_profit_total > $consolidado['maior_profit']) ? $data->deal_profit_total : $consolidado['maior_profit'];
            $consolidado['maior_perda'] = ($data->deal_profit_total < $consolidado['maior_perda']) ? $data->deal_profit_total : $consolidado['maior_perda'];


            $qtd++;
            $saldo += $data->deal_profit_total;
            if ($saldo > $saldoMaximo) {
                $saldoMaximo = $saldo;
                $drawdown    = 0;
            } else {
                $drawdown += $data->deal_profit_total;
                if ($drawdown < $drawdownMaximo)
                    $drawdownMaximo = $drawdown;
            }
        }
        $consolidado['drawdown_maximo'] = $drawdownMaximo;
        $consolidado['media_operacoes'] = ($qtd > 0) ? ($saldo / $qtd) : 0;

        // calcula o payoff
        //Payoff: Para iniciar é preciso entender o conceito de Payoff, nada mais é do que a média dos ganhos dividido pela média das perdas
        $consolidado['media_profit']    = ($consolidado['qtd_profits'] > 0) ? $consolidado['valor_profits'] / $consolidado['qtd_profits'] : 0;
        $consolidado['media_perdas']    = ($consolidado['qtd_loss'] > 0) ? (($consolidado['valor_loss']) / $consolidado['qtd_loss']) : 0;
        $consolidado['payoff']          = ($consolidado['media_perdas'] < 0) ? ($consolidado['media_profit'] / ($consolidado['media_perdas'] * -1)) : 0;
        $consolidado['saldo_total']     = $consolidado['valor_profits'] + $consolidado['valor_loss'];
        $consolidado['taxa_acerto']     = (($consolidado['qtd_profits'] + $consolidado['qtd_loss']) > 0) ? ($consolidado['qtd_profits'] / ($consolidado['qtd_profits'] + $consolidado['qtd_loss'])) * 100 : 0;

        //https://medium.com/devtrader/taxa-de-acerto-x-payoff-9ee8bc0cb481
        //Fator de Lucro = (Taxa de acerto / Taxa de erro) * Payoff
        //Fator de Lucro = (() / Taxa de erro) * Payoff
        $qtd_trades = $consolidado['qtd_profits'] + $consolidado['qtd_loss'];
        $consolidado['fator_lucro'] = ($qtd_trades > 0 && $consolidado['qtd_loss']) ? ((($consolidado['qtd_profits'] / $qtd_trades) * 100) / (($consolidado['qtd_loss'] / $qtd_trades) * 100)) * $consolidado['payoff'] : 0;

        // obtem os saldos diários
        $dados = DB::table('deals as d')
            ->join('accounts as a', 'a.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit, DATE_FORMAT(DATE(d.deal_time), "%d/%m/%Y") as deal_date'))
            ->groupByRaw('DATE(d.deal_time)')
            ->orderBy('d.deal_time')
            ->whereBetween('d.deal_time', [$date_from, $date_to]);
        if ($filtros['client_id'] > 0) {
            $dados->where('a.user_id', '=', $filtros['client_id']);
        }
        if ($filtros['account'] > 0) {
            $dados->where('d.account', '=', $filtros['account']);
        }
        if (isset($ea->id)) {
            $dados->where('d.deal_magic', '=', $ea->magic_number)
                ->whereExists(function (Builder $query) use ($ea) {
                    $query->select(DB::raw(1))
                        ->from('licenses as l')
                        ->where('l.expert_advisor_id', '=', $ea->id)
                        ->whereColumn('l.account_id', 'a.id');
                });
        }
        if ($filtros['supervisor']) {
            // para o supervisor só pode retornar dados das contas nas quais exista licença em seus grupos de supervisão
            // a não ser para as contas do supevisor
            $dados->whereExists(function (Builder $query) {
                $query->select(DB::raw(1))
                    ->from('supervisors as s')
                    ->join('supervisor_group_experts as sge', 'sge.supervisor_group_id', '=', 's.supervisor_group_id')
                    ->join('licenses as lc', 'lc.expert_advisor_id', '=', 'sge.expert_advisor_id')
                    ->join('accounts as ac', 'ac.id', '=', 'lc.account_id')
                    ->where('s.user_id', '=', Auth::user()->id)
                    ->whereColumn('ac.id', '=', 'a.id');
            });
        }
        $dados_curva = $dados->get();

        // estrutura os dados do gráfico curva de capital
        $consolidado['curva_datas'] = array();
        $consolidado['curva_valor'] = array();
        $saldoTotal = 0;
        $consolidado['qtd_dias_positivo'] = 0;
        $consolidado['qtd_dias_negativo'] = 0;
        foreach ($dados_curva as $key => $value) {
            if ($value->deal_profit > 0)
                $consolidado['qtd_dias_positivo']++;
            else if ($value->deal_profit < 0)
                $consolidado['qtd_dias_negativo']++;
            $saldoTotal += $value->deal_profit;
            $consolidado['curva_datas'][$key] = $value->deal_date;
            $consolidado['curva_valor'][$key] = $saldoTotal;
        }

        // obtem as datas que foram realizadas operações com saldo diferente de 0
        $dados = DB::table('deals as d')
            ->join('accounts as a', 'a.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit, DATE_FORMAT(DATE(d.deal_time), "%d/%m/%Y") as deal_date'))
            ->where('deal_profit', '!=', 0)
            ->groupByRaw('DATE(d.deal_time)')
            ->orderBy('d.deal_time')
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if ($filtros['client_id'] > 0) {
            $dados->where('a.user_id', '=', $filtros['client_id']);
        }
        if ($filtros['account'] > 0) {
            $dados->where('d.account', '=', $filtros['account']);
        }
        if (isset($ea->id)) {
            $dados->where('d.deal_magic', '=', $ea->magic_number)
                ->whereExists(function (Builder $query) use ($ea) {
                    $query->select(DB::raw(1))
                        ->from('licenses as l')
                        ->where('l.expert_advisor_id', '=', $ea->id)
                        ->whereColumn('l.account_id', 'a.id');
                });
        }
        if ($filtros['supervisor']) {
            // para o supervisor só pode retornar dados das contas nas quais exista licença em seus grupos de supervisão
            // a não ser para as contas do supevisor
            $dados->whereExists(function (Builder $query) {
                $query->select(DB::raw(1))
                    ->from('supervisors as s')
                    ->join('supervisor_group_experts as sge', 'sge.supervisor_group_id', '=', 's.supervisor_group_id')
                    ->join('licenses as lc', 'lc.expert_advisor_id', '=', 'sge.expert_advisor_id')
                    ->join('accounts as ac', 'ac.id', '=', 'lc.account_id')
                    ->where('s.user_id', '=', Auth::user()->id)
                    ->whereColumn('ac.id', '=', 'a.id');
            });
        }
        $diasOperados = $dados->get();

        // saldo positivo diário
        $dados = DB::table('deals as d')
            ->join('accounts as a', 'a.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit, DATE_FORMAT(DATE(d.deal_time), "%d/%m/%Y") as deal_date'))
            ->where('deal_profit', '>=', 0)
            ->groupByRaw('DATE(d.deal_time)')
            ->orderBy('d.deal_time')
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if ($filtros['client_id'] > 0) {
            $dados->where('a.user_id', '=', $filtros['client_id']);
        }
        if ($filtros['account'] > 0) {
            $dados->where('d.account', '=', $filtros['account']);
        }
        if (isset($ea->id)) {
            $dados->where('d.deal_magic', '=', $ea->magic_number)
                ->whereExists(function (Builder $query) use ($ea) {
                    $query->select(DB::raw(1))
                        ->from('licenses as l')
                        ->where('l.expert_advisor_id', '=', $ea->id)
                        ->whereColumn('l.account_id', 'a.id');
                });
        }
        if ($filtros['supervisor']) {
            // para o supervisor só pode retornar dados das contas nas quais exista licença em seus grupos de supervisão
            // a não ser para as contas do supevisor
            $dados->whereExists(function (Builder $query) {
                $query->select(DB::raw(1))
                    ->from('supervisors as s')
                    ->join('supervisor_group_experts as sge', 'sge.supervisor_group_id', '=', 's.supervisor_group_id')
                    ->join('licenses as lc', 'lc.expert_advisor_id', '=', 'sge.expert_advisor_id')
                    ->join('accounts as ac', 'ac.id', '=', 'lc.account_id')
                    ->where('s.user_id', '=', Auth::user()->id)
                    ->whereColumn('ac.id', '=', 'a.id');
            });
        }
        $lucroDiario = $dados->get();

        // saldo negativo diário
        $dados = DB::table('deals as d')
            ->join('accounts as a', 'a.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit, DATE_FORMAT(DATE(d.deal_time), "%d/%m/%Y") as deal_date'))
            ->where('d.deal_profit', '<', 0)
            ->groupByRaw('DATE(d.deal_time)')
            ->orderBy('d.deal_time')
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if ($filtros['client_id'] > 0) {
            $dados->where('a.user_id', '=', $filtros['client_id']);
        }
        if ($filtros['account'] > 0) {
            $dados->where('d.account', '=', $filtros['account']);
        }
        if (isset($ea->id)) {
            $dados->where('d.deal_magic', '=', $ea->magic_number)
                ->whereExists(function (Builder $query) use ($ea) {
                    $query->select(DB::raw(1))
                        ->from('licenses as l')
                        ->where('l.expert_advisor_id', '=', $ea->id)
                        ->whereColumn('l.account_id', 'a.id');
                });
        }
        if ($filtros['supervisor']) {
            // para o supervisor só pode retornar dados das contas nas quais exista licença em seus grupos de supervisão
            // a não ser para as contas do supevisor
            $dados->whereExists(function (Builder $query) {
                $query->select(DB::raw(1))
                    ->from('supervisors as s')
                    ->join('supervisor_group_experts as sge', 'sge.supervisor_group_id', '=', 's.supervisor_group_id')
                    ->join('licenses as lc', 'lc.expert_advisor_id', '=', 'sge.expert_advisor_id')
                    ->join('accounts as ac', 'ac.id', '=', 'lc.account_id')
                    ->where('s.user_id', '=', Auth::user()->id)
                    ->whereColumn('ac.id', '=', 'a.id');
            });
        }
        $perdaDiaria = $dados->get();

        // estrutura os dados do gráfico lucro/perda diária
        $arrLucroDiario = array();
        $arrPerdaDiaria = array();
        foreach ($lucroDiario as $obj) {
            $arrLucroDiario[$obj->deal_date] = $obj->deal_profit;
        }
        foreach ($perdaDiaria as $obj) {
            $arrPerdaDiaria[$obj->deal_date] = $obj->deal_profit;
        }
        $consolidado['datas_lucro_perda'] = array();
        $consolidado['lucro'] = array();
        $consolidado['perda'] = array();
        foreach ($diasOperados as $key => $obj) {
            $consolidado['datas_lucro_perda'][$key] = $obj->deal_date;
            $consolidado['lucro'][$key] = (array_key_exists($obj->deal_date, $arrLucroDiario)) ? $arrLucroDiario[$obj->deal_date] : 0;
            $consolidado['perda'][$key] = (array_key_exists($obj->deal_date, $arrPerdaDiaria)) ? $arrPerdaDiaria[$obj->deal_date] : 0;
        }

        $message = session('message');
        return view('apps.dashboard.index')->with([
            'data' => $consolidado,
            'date_from' => $date_from_filter,
            'date_to' => $date_to_filter,
            'client' => $filtros['client_id'],
            'account' => $filtros['account'],
            'ea' => $filtros['ea_id'],
            'show_clients' => (count($filtros['users']) > 0) ? true : false,
            'users' => $filtros['users'],
            'experts' => $filtros['eas'],
            'accounts' => $filtros['accounts'],
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
        return response()->json($this->filtros_data($request), Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filtros_data(Request $request)
    {
        $supervisor = DB::table('users as u')
            ->join('supervisors as s', 's.user_id', '=', 'u.id')
            ->where('u.id', '=', Auth::user()->id)
            ->select('u.*')
            ->first();

        $consolidado['client_id']   = (isset($request['client']) && !empty($request['client'])) ? $request['client'] : Auth::user()->id;
        $consolidado['account']     = (isset($request['account']) && !empty($request['account'])) ? $request['account'] : -1;
        $consolidado['ea_id']       = (isset($request['ea']) && !empty($request['ea'])) ? $request['ea'] : -1;
        $consolidado['supervisor']  = (isset($supervisor) && !Auth::user()->can('admin')) ? true : false;

        //retorna a lista de membros de grupo de supervisão caso o usuário seja supervisor, e todos em caso de administrador
        $dados = DB::table('users as u')
            ->select('u.*')
            ->orderBy('u.name', 'asc')
            ->orderBy('u.email', 'asc');
        if (!Auth::user()->can('admin')) {
            $dados->join('supervisor_group_members as sgm', 'sgm.user_id', '=', 'u.id')
                ->join('supervisor_groups as sg', 'sg.id', '=', 'sgm.supervisor_group_id')
                ->join('supervisors as s', 's.supervisor_group_id', '=', 'sg.id')
                ->where('s.user_id', '=', Auth::user()->id);
        }
        if ($consolidado['account'] > 0) {
            $dados->join('accounts as a', 'a.user_id', '=', 'u.id')
                ->where('a.account', '=', $consolidado['account']);
        }
        if ($consolidado['ea_id'] > 0) {
            $ea_id = $consolidado['ea_id'];
            $dados->whereExists(function (Builder $query) use ($ea_id) {
                $query->select(DB::raw(1))
                    ->from('licenses as l')
                    ->join('accounts as ac', 'ac.id', '=', 'l.account_id')
                    ->where('l.expert_advisor_id', '=', $ea_id)
                    ->whereColumn('ac.user_id', 'u.id');
            });
        }
        $consolidado['users'] = $dados->get();
        // se for supervisor é necessário adicionar os seus dados dados de clientes pois ele pode não ser membro dos grupos de supervisão
        if ($consolidado['supervisor']) {
            if ($consolidado['account'] == -1 && $consolidado['ea_id'] == -1) {
                $consolidado['users']->push($supervisor);
            } else {
                $account_owner  = Account::where('account', '=', $consolidado['account'])->where('user_id', '=', Auth::user()->id)->first();
                $has_ea_license = DB::table('licenses as l')
                    ->join('accounts as a', 'a.id', '=', 'l.account_id')
                    ->where('l.expert_advisor_id', '=', $consolidado['ea_id'])
                    ->where('a.user_id', '=', Auth::user()->id)
                    ->first();
                if (!empty($account_owner) || !empty($has_ea_license)) {
                    $consolidado['users']->push($supervisor);
                }
            }
        }

        //obtem a lista de experts que estão vinculadas ao usuário logado ou selecionado
        $dados = DB::table('expert_advisors as ea')
            ->select('ea.id', 'ea.magic_number', 'ea.name');
        if ($consolidado['client_id'] > 0) {
            $dados->join('licenses as l', 'l.expert_advisor_id', '=', 'ea.id')
                ->join('accounts as a', 'a.id', '=', 'l.account_id')
                ->where('a.user_id', '=', $consolidado['client_id']);
        }
        if ($consolidado['supervisor']) {
            $dados->join('supervisor_group_experts as sge', 'sge.expert_advisor_id', '=', 'ea.id')
                ->join('supervisors as s', 's.supervisor_group_id', '=', 'sge.supervisor_group_id')
                ->where('s.user_id', '=', Auth::user()->id);
        }
        if ($consolidado['account'] > 0) {
            $account = $consolidado['account'];
            $dados->whereExists(function (Builder $query) use ($account) {
                $query->select(DB::raw(1))
                    ->from('licenses as l')
                    ->join('accounts as ac', 'ac.id', '=', 'l.account_id')
                    ->whereColumn('l.expert_advisor_id', '=', 'ea.id')
                    ->where('ac.account', '=', $account);
            });
        }
        $consolidado['eas'] = $dados->where('ea.active', '=', '1')
            ->where('ea.visible', '=', '1')
            ->groupBy('ea.id')
            ->orderBy('ea.name')
            ->get();

        //obtem a lista de accounts que estão vinculadas ao usuário logado
        $dados = DB::table('accounts as a')
            ->join('licenses as l', 'l.account_id', '=', 'a.id')
            ->select('a.*');
        if ($consolidado['client_id'] > 0) {
            $dados->where('a.user_id', '=', $consolidado['client_id']);
        }
        if ($consolidado['ea_id'] > 0) {
            $dados->where('l.expert_advisor_id', '=', $consolidado['ea_id']);
        }
        if ($consolidado['supervisor']) {
            // para o supervisor só pode retornar contas nas quais exista licença em seus grupos de supervisão
            if ($consolidado['client_id'] != Auth::user()->id) {
                $dados->whereExists(function (Builder $query) {
                    $query->select(DB::raw(1))
                        ->from('supervisors as s')
                        ->join('supervisor_group_experts as sge', 'sge.supervisor_group_id', '=', 's.supervisor_group_id')
                        ->join('licenses as lc', 'lc.expert_advisor_id', '=', 'sge.expert_advisor_id')
                        ->where('s.user_id', '=', Auth::user()->id)
                        ->whereColumn('lc.id', '=', 'l.id');
                });
            }
        }
        $consolidado['accounts'] = $dados->orderBy('a.account', 'asc')
            ->where('a.account', '>', 0)
            ->groupBy('a.account')
            ->get();

        return $consolidado;
    }
}
