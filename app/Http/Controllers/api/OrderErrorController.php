<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\OrderError;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class OrderErrorController extends Controller
{
    public function store(Request $request)
    {
        //Log::channel('order_error')->info($request);
        //Log::channel('order_error')->info(date("Y-m-d H:i:s") . " Conta: " . $request[0] . " - " . $request[1] . " - " . $request[2] . " - " . $request[3] . " - " . $request[4] . " - " . $request[5]);
        // em caso de sucesso na estrutura array persiste os dados
        $apiResult["error"] = "";
        $apiResult["success"] = false;
        try {
            $order_error = OrderError::create(
                [
                    'account' => $request[0],
                    'ea_code' => $request[1],
                    'ea_port' => $request[2],
                    'magic_number' => $request[3],
                    'runtime_error_code' => $request[4],
                    'trade_server_return_code' => $request[5],
                    'symbol' => $request[6],
                ]
            );
            $apiResult["success"] = true;
            return response()->json($apiResult, Response::HTTP_OK);
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            Log::channel('order_error')->info($request);
            $apiResult["error"] = $e->getMessage();
            return response()->json($apiResult, Response::HTTP_BAD_REQUEST);
        }
    }
}
