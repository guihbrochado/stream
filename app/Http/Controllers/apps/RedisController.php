<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function update_supervisor_members()
    {
        /*
        $redis  = Redis::connection();

        // SUPERVISORES
        $data = DB::table('supervisor_group_experts as sge')
            ->join('expert_advisors as ea', 'ea.id', '=', 'sge.expert_advisor_id')
            ->select('ea.magic_number', 'ea.code', 'ea.name as ea_name', 'sge.supervisor_group_id')
            ->addSelect(DB::raw("(select GROUP_CONCAT(concat_ws('-','S',user_id) SEPARATOR ':') from supervisors as s where s.supervisor_group_id = sge.supervisor_group_id) as sg_id"))
            ->where('ea.magic_number', '!=', 0)
            ->distinct()
            ->get();

        // insere/atualiza os registros atualizados
        $valid_keys = array();
        foreach ($data as $key => $value) {
            $redis_key = 's:' . $value->magic_number . ":" . $value->code . ":" . $value->supervisor_group_id;
            $redis->hmset($redis_key, [
                "sg_id" => $value->sg_id,
                "magic_number" => $value->magic_number,
                "code" => $value->code,
                "ea_name" => $value->ea_name
            ]);
            $valid_keys[$key] = $redis_key;
        }
        $valid_keys = collect($valid_keys);

        // remove registros inválidos (eventuais exclusões da base)
        $redis_keys = $redis->keys('s:*');
        foreach ($redis_keys as $key => $redis_key) {
            if (!$valid_keys->contains($redis_key)) {
                $redis->del($redis_key);
            }
        }

        // MEMBROS
        $data = DB::table('licenses as l')
            ->join('accounts as a', 'a.id', '=', 'l.account_id')
            ->join('users as u', 'u.id', '=', 'a.user_id')
            ->join('expert_advisors as ea', 'ea.id', '=', 'l.expert_advisor_id')
            ->select('u.name as client_name', 'a.account', 'ea.magic_number', 'ea.code', 'ea.name as ea_name')
            ->addSelect(DB::raw("(select GROUP_CONCAT(concat_ws('-','S',s.user_id) SEPARATOR ':')
                                    from supervisor_group_members as sgm
                                    inner join supervisors as s on s.supervisor_group_id = sgm.supervisor_group_id            
                                    where sgm.user_id = u.id) as sg_id"))
            ->where('ea.magic_number', '!=', 0)
            ->distinct()
            ->get();

        // insere/atualiza os registros atualizados
        $valid_keys = array();
        foreach ($data as $key => $value) {
            if (!is_null($value->sg_id)) {
                $redis_key = 'sg:' . $value->account . ":" . $value->magic_number . ":" . $value->code;
                $redis->hmset($redis_key, [
                    "sg_id" => $value->sg_id,
                    "client_name" => $value->client_name,
                    "account" => $value->account,
                    "magic_number" => $value->magic_number,
                    "ea_name" => $value->ea_name,
                    "code" => $value->code,
                ]);
                $valid_keys[$key] = $redis_key;
            }
        }

        $valid_keys = collect($valid_keys);

        // remove registros inválidos (eventuais exclusões da base)
        $redis_keys = $redis->keys('sg:*');
        foreach ($redis_keys as $key => $redis_key) {
            if (!$valid_keys->contains($redis_key)) {
                $redis->del($redis_key);
            }
        }
        */
    }
}
