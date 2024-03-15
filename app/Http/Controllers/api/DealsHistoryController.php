<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DealsHistoryController extends Controller
{
    public function history(Request $request)
    {
        //Log::channel('deals')->info($request);
        if ($request->has('0') && $request->has('1') && $request->has('2')) {
            // em caso de sucesso na estrutura array persiste os dados
            $apiResult["error"] = "";
            $apiResult["success"] = false;
            try {
                $deal = new Deal();
                if (is_array($request[2])) {
                    for ($i = 0; $i < sizeof($request[2]); $i++) {
                        $deal = $deal->updateOrCreate(
                            [
                                'deal_ticket' => $request[2][$i][0],
                            ],
                            [
                                'ea_code' => $request[1],
                                'account' => $request[0],
                                'deal_order' => $request[2][$i][1],
                                'deal_time' => $request[2][$i][2],
                                'deal_time_msc' => $request[2][$i][3],
                                'deal_type' => $request[2][$i][4],
                                'deal_entry' => $request[2][$i][5],
                                'deal_magic' => $request[2][$i][6],
                                'deal_reason' => $request[2][$i][7],
                                'deal_position_id' => $request[2][$i][8],
                                'deal_volume' => $request[2][$i][9],
                                'deal_price' => $request[2][$i][10],
                                'deal_commission' => $request[2][$i][11],
                                'deal_swap' => $request[2][$i][12],
                                'deal_profit' => $request[2][$i][13],
                                'deal_fee' => $request[2][$i][15],
                                'deal_sl' => $request[2][$i][16],
                                'deal_tp' => $request[2][$i][17],
                                'deal_symbol' => $request[2][$i][18],
                                'deal_comment' => $request[2][$i][19]
                            ]
                        );
                    }
                    Log::channel('deals')->info(__LINE__ . ") [INFO] " . date("Y-m-d H:i:s") . " [" . $request->ip() . "] Conta: " . $request[0] . " Registros: " . (is_array($request[2]) ? sizeof($request[2]) : ""));
                    $apiResult["success"] = true;
                    return response()->json($apiResult, Response::HTTP_OK);
                } else  {
                    Log::channel('deals')->info(__LINE__ . ") [ERROR] " . date("Y-m-d H:i:s") . " [" . $request->ip() . "] Conta: " . $request[0] . " Registros: " . (is_array($request[2]) ? sizeof($request[2]) : ""));
                    $apiResult["error"] = "Não foram recebidos dados de Deals.";
                    return response()->json($apiResult, Response::HTTP_BAD_REQUEST);
                }
            } catch (Exception $e) {
                // You can check get the details of the error using `errorInfo`:
                $apiResult["error"] = $e->getMessage();
                return response()->json($apiResult, Response::HTTP_BAD_REQUEST);
            }
        } else {
            Log::channel('deals')->info(__LINE__ . ') [ERRO] Estrutura de dados inválida. ' . date("Y-m-d H:i:s") . " [" . $request->ip() . "] Conta: " . $request[0] . " Registros: " . (is_array($request[2]) ? sizeof($request[2]) : ""));
        }
    }
}
