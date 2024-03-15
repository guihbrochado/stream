<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;

class CopySenderPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $senders = DB::table('copy_sender_positions as csp')
            ->join("expert_advisors", function ($join) {
                $join->on("expert_advisors.code", "=", "csp.expert_code")
                    ->on("expert_advisors.magic_number", "=", "csp.magic_number");
            })
            //->join('expert_advisors', 'expert_advisors.code', '=', 'csp.expert_code')
            //->join('expert_advisors', 'expert_advisors.magic_number', '=', 'csp.magic_number')
            ->join('supervisor_group_experts as sge', 'sge.expert_advisor_id', '=', 'expert_advisors.id')
            ->join('supervisor_groups as sg', 'sg.id', '=', 'sge.supervisor_group_id')
            ->join('supervisors as s', 's.supervisor_group_id', '=', 'sg.id')
            ->join('accounts as c', 'c.account', '=', 'csp.account')
            ->select('csp.id', 'csp.account', 'csp.expert_code', 'csp.position_ticket', 'csp.position_type', 'csp.position_volume', 'csp.position_price_open', 'csp.position_profit', 'csp.position_symbol', 'csp.position_id', 'csp.created_at', 'csp.updated_at', 'expert_advisors.name as ea_name')
            ->whereRaw('csp.updated_at > curdate()')
            ->where('s.user_id', '=', Auth::user()->id)
            //->where('c.user_id', '=', Auth::user()->id)
            ->groupBy('csp.id', 'csp.account', 'csp.expert_code', 'csp.position_ticket', 'csp.position_type', 'csp.position_volume', 'csp.position_price_open', 'csp.position_profit', 'csp.position_symbol', 'csp.position_id', 'csp.created_at', 'csp.updated_at')
            ->orderBy('csp.expert_code', 'asc')
            ->orderBy('csp.position_symbol', 'asc')
            ->get();
            
        $return = array();
        foreach ($senders as $obj) {
            $return[] = (array) $obj;
        }
        return ['data' => $return];
    }

    /**
     * Display a listing of the resource.
     */
    public function index_redis(Request $request)
    {
        $redis          = Redis::connection();

        $senders_array  = array();
        // para cada chave do supervisor obtém as informações dos clientes conectados
        $sender_keys    = $redis->keys('sender:*:S-' . Auth::user()->id . ':*');
        if (count($sender_keys) > 0) {
            foreach ($sender_keys as $key => $sender_key) {
                $senders_array[$key]    = $redis->hgetall($sender_key);
            }
        }

        return [
            'data' => (count($senders_array) > 0) ? $senders_array : ''
        ];
    }
}
