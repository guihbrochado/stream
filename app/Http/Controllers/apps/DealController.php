<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\ExpertAdvisor;
use DateTime;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        set_time_limit(0);

        // obtém os dados dos filtros
        $filtros = new DashboardController;
        $filtros = $filtros->filtros_data($request);

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

        $ea = new ExpertAdvisor();
        if ($filtros['ea_id'] > 0) {
            $ea = $ea::where('id', '=', $filtros['ea_id'])->select('id', 'magic_number')->first();
        }

        $dados = DB::table('deals as d')
            ->join('accounts as a', 'a.account', '=', 'd.account')
            ->join('users as u', 'u.id', '=', 'a.user_id')
            ->select('u.name', 'u.email', 'd.ea_code', 'd.account', 'd.deal_symbol', 'd.deal_position_id', 'd.deal_time', DB::raw('FORMAT(sum(d.deal_volume)/2,2) as deal_volume, FORMAT(sum(d.deal_profit),2) as deal_profit'), 'd.deal_magic', 'd.deal_comment')
            ->groupBy('d.deal_position_id')
            ->orderBy('d.deal_time', 'desc')
            ->whereBetween('deal_time', [$date_from, $date_to]);
        if ($filtros['client_id'] > 0) {
            $dados->where('u.id', '=', $filtros['client_id']);
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
        $consolidado['deals'] = $dados->get();

        $message = session('message');

        return view('apps.deal.index')->with([
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
}
