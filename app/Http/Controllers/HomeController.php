<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PgSql\Lob;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root(Request $request)
    {
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

        // obtem a quantidade de trades com saldo positivo
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit'))
            ->groupBy('d.deal_position_id')
            ->having('deal_profit', '>', 0)
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
        }
        $consolidado['qtd_profits'] = $dados->get()->count();

        // obtem o saldo de trades com saldo positivo
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit'))
            //->where('c.user_id', '=', Auth::user()->id)
            ->groupBy('d.deal_position_id')
            ->having('deal_profit', '>', 0)
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
        }
        $consolidado['valor_profits'] = $dados->sum('deal_profit');

        // obtem a quantidade de trades com saldo negativo
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit'))
            //->where('c.user_id', '=', Auth::user()->id)
            ->groupBy('d.deal_position_id')
            ->having('deal_profit', '<', 0)
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
        }
        $consolidado['qtd_loss'] = $dados->get()->count();

        // obtem o saldo de trades com saldo negativo
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit'))
            //->where('c.user_id', '=', Auth::user()->id)
            ->groupBy('d.deal_position_id')
            ->having('deal_profit', '<', 0)
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
        }
        $consolidado['valor_loss'] = $dados->sum('deal_profit');

        // obtem o saldo da operação mais lucrativa
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit'))
            //->where('c.user_id', '=', Auth::user()->id)
            ->groupBy('d.deal_position_id')
            ->having('deal_profit', '>', 0)
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
        }
        $consolidado['maior_profit'] = $dados->max('deal_profit');

        // obtem o saldo da operação com maior perda
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit'))
            //->where('c.user_id', '=', Auth::user()->id)
            ->groupBy('d.deal_position_id')
            ->having('deal_profit', '<', 0)
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
        }
        $consolidado['maior_perda'] = $dados->min('deal_profit');

        // obtem todas as  operações para calcular o drawdowns máximo do período, e a média...
        //DB::enableQueryLog();
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit, deal_time'))
            //->where('c.user_id', '=', Auth::user()->id)
            ->groupBy('d.deal_position_id')
            ->orderBy('d.deal_time')
            ->whereBetween('d.deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
        }
        $operacoes = $dados->get();
        //Log::info(DB::getQueryLog());

        $saldoMaximo    = 0;
        $saldo          = 0;
        $drawdownMaximo = 0;
        $drawdown       = 0;
        $qtd            = 0;
        foreach ($operacoes as $key => $value) {
            $qtd++;
            $saldo += $value->deal_profit;
            if ($saldo > $saldoMaximo) {
                $saldoMaximo = $saldo;
                $drawdown    = 0;
            } else {
                $drawdown += $value->deal_profit;
                if ($drawdown < $drawdownMaximo)
                    $drawdownMaximo = $drawdown;
            }
            //Log::info($value->deal_time . ' - ' . $value->deal_profit . ' -> ' . $saldo . ' -> ' . $saldoMaximo . ' -> ' . $drawdownMaximo . ' -> ' . $drawdown);
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

        //Log::info(DB::getQueryLog());

        // obtem os saldos diários
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit, DATE_FORMAT(DATE(d.deal_time), "%d/%m/%Y") as deal_date'))
            //->where('c.user_id', '=', Auth::user()->id)
            ->groupByRaw('DATE(d.deal_time)')
            ->orderBy('d.deal_time')
            ->whereBetween('d.deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
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
        //Log::info(DB::getQueryLog());

        // obtem as datas que foram realizadas operações com saldo diferente de 0
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit, DATE_FORMAT(DATE(d.deal_time), "%d/%m/%Y") as deal_date'))
            //->where('c.user_id', '=', Auth::user()->id)
            ->where('deal_profit', '!=', 0)
            ->groupByRaw('DATE(d.deal_time)')
            ->orderBy('d.deal_time')
            ->whereBetween('d.deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
        }
        $diasOperados = $dados->get();

        // saldo positivo diário
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit, DATE_FORMAT(DATE(d.deal_time), "%d/%m/%Y") as deal_date'))
            //->where('c.user_id', '=', Auth::user()->id)
            ->where('deal_profit', '>=', 0)
            ->groupByRaw('DATE(d.deal_time)')
            ->orderBy('d.deal_time')
            ->whereBetween('d.deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
        }
        $lucroDiario = $dados->get();

        // saldo negativo diário
        $dados = DB::table('deals as d')
            ->join('accounts as c', 'c.account', '=', 'd.account')
            ->select(DB::raw('sum(d.deal_profit) as deal_profit, DATE_FORMAT(DATE(d.deal_time), "%d/%m/%Y") as deal_date'))
            //->where('c.user_id', '=', Auth::user()->id)
            ->where('d.deal_profit', '<', 0)
            ->groupByRaw('DATE(d.deal_time)')
            ->orderBy('d.deal_time')
            ->whereBetween('d.deal_time', [$date_from, $date_to]);
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
            $dados  = $dados->where('d.account', '=', $request['account']);
        }
        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados  = $dados->where('d.deal_magic', '=', $request['ea']);
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
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        if (isset($request['account']) && !empty($request['account'])) {
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
        if (isset($request['client']) && !empty($request['client'])) {
            $dados  = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados  = $dados->where('c.user_id', '=', Auth::user()->id);
        }
        $accounts = $dados->orderBy('c.account')
            ->groupBy('c.account')
            ->get();

        //dd($consolidado);
        //Log::info($consolidado);
        $message = session('message');
        return view('apps.course.index');
    }

    /*Language Translation*/
    public function lang($locale)
    {
        Log::info($locale);
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }

    public function FormSubmit(Request $request)
    {
        return view('form-repeater');
    }
}
