<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class CopyClientPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //DB::enableQueryLog();
        /*
        select `u`.`name` as `username`, `u`.`email` as `useremail`, `ea`.`description` , `ccp`.* 
        from supervisors as s
        inner join supervisor_groups as sg on sg.id = s.supervisor_group_id
        inner join supervisor_group_experts as sge on sge.supervisor_group_id = s.supervisor_group_id
        inner join expert_advisors as ea on ea.id = sge.expert_advisor_id
        -- tendo os experts busca todos status de clientes destes EAS
        inner join copy_client_positions as ccp on ccp.expert_code = ea.code and ccp.position_magic = ea.magic_number
        -- com base na conta busca os ados do cliente para exebição no status
        inner join accounts as a on a.account = ccp.account
        inner join users as u on u.id = a.user_id
        where s.user_id = ID_DO_SUPERVISOR
        and ccp.updated_at > curdate()
        order by `ccp`.`symbol` 
        asc, `u`.`name` asc, 
        `ccp`.`account` asc;
        */
        $clients = DB::table('supervisors as s')
            ->join('supervisor_groups as sg', 'sg.id', '=', 's.supervisor_group_id')
            ->join('supervisor_group_experts as sge', 'sge.supervisor_group_id', '=', 's.supervisor_group_id')
            ->join('expert_advisors as ea', 'ea.id', '=', 'sge.expert_advisor_id')
            ->join("copy_client_positions as ccp",function($join){
                $join->on("ccp.expert_code","=","ea.code")
                    ->on("ccp.position_magic","=","ea.magic_number");
            })
            ->join('accounts as a', 'a.account', '=', 'ccp.account')
            ->join('users as u', 'u.id', '=', 'a.user_id')
            ->select('ccp.*', 'u.name as username', 'u.email as useremail', 'ea.name as ea_name')
            ->where('s.user_id', '=', Auth::user()->id)
            ->whereRaw('ccp.updated_at > curdate()')
            ->orderBy('ccp.symbol', 'asc')
            ->orderBy('u.name', 'asc')
            ->orderBy('ccp.account', 'asc')
            ->get();
        //Log::info(DB::getQueryLog());

        $return = array();
        $total_position_profit = 0;
        foreach ($clients as $obj) {
            $return[] = (array) $obj;
            $total_position_profit += $obj->position_profit;
        }
        return [
            'data' => $return,
            'total_position_profit' => $total_position_profit
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index_redis(Request $request)
    {
        $redis          = Redis::connection();

        $clients_array  = array();
        // para cada chave do supervisor obtém as informações dos clientes conectados        
        $client_keys    = $redis->keys('client:*:S-' . Auth::user()->id . ':*');
        if (count($client_keys) > 0) {
            foreach ($client_keys as $key => $client_key) {
                $clients_array[$key]    = $redis->hgetall($client_key);
            }
        }

        return [
            'data' => (count($clients_array) > 0) ? collect($clients_array) : ''
        ];
    }
}
