<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\apps\UserController;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LicenseController extends Controller
{
    public function validar(Request $request)
    {
        //Log::channel('license')->info($request);
        $apiResult["authorized"] = 0;
        $apiResult["msg"]        = "";
        $apiResult["error"]      = "";
        $apiResult["token"]      = "";

        if ($request->has('inAccountLogin') && $request->has('inAccountTradeMode') && $request->has('stCodEa')) {

            // id dos tipos de account na base do cockpit 1 = Real; 2 = Demo
            // tipos de account no MQL5: 0 = Demo; 1 = treinamento; 2 = real
            switch ($request->inAccountTradeMode) {
                case 2:
                    $tipo_conta = 1;
                    break;
                default:
                    $tipo_conta = 2;
                    break;
            }

            //DB::enableQueryLog();
            $dados = DB::table('licenses as l')
                ->join('expert_advisors as ea', 'ea.id', '=', 'l.expert_advisor_id')
                ->join('accounts as c', 'c.id', '=', 'l.account_id')
                ->join('users as u', 'u.id', '=', 'c.user_id')
                ->select('l.expert_advisor_id', 'l.account_id', 'l.lifetime', 'l.validity', 'c.account', 'c.account_type_id', 'c.user_id', 'ea.code')
                ->where('c.account', '=', $request->inAccountLogin)
                ->where('c.account_type_id', '=', $tipo_conta)
                ->where('ea.code', '=', $request->stCodEa)
                ->first();
            //Log::channel('license')->info(DB::getQueryLog());

            if ($dados) {
                // exclui tokens anteriores..
                UserController::deleteTokens($dados->user_id);

                if ($dados->lifetime) {
                    $apiResult["token"]      = UserController::createToken($dados->user_id, $request->inAccountLogin);
                    $apiResult["msg"]        = "Licença vitalícia";
                    $apiResult["authorized"] = true;
                    Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $apiResult["authorized"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                    return response()->json($apiResult, Response::HTTP_OK);
                } else {
                    // se não é assinatura vitalícia verifica a validity pela data/hora
                    $date = new DateTime($dados->validity);

                    if (date("Y-m-d H:i") < $dados->validity) {
                        $apiResult["token"]      = UserController::createToken($dados->user_id, $request->inAccountLogin);
                        $apiResult["msg"]        = "Licença válida até " . $date->format('d/m/Y');
                        $apiResult["authorized"] = true;
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $apiResult["authorized"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_OK);
                    } else {
                        $apiResult["error"] = "Licença expirada em: " . $date->format('d/m/Y') . ", uso do EA não autorizado";
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $apiResult["authorized"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
                    }
                }
            } else {
                $apiResult["error"] = "Não foi encontrado registro de licença para a account autenticada no Metatrader";
                Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $apiResult["authorized"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return response()->json(['erro' => 'Não autorizado'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function validar2(Request $request)
    {
        //Log::channel('license')->info($request);
        $apiResult["authorized"] = 0;
        $apiResult["msg"]        = "";
        $apiResult["error"]      = "";
        $apiResult["token"]      = "";

        if ($request->has('in_account_login') && $request->has('in_account_trade_mode') && $request->has('st_cod_ea') && $request->has('magic_number')) {

            // id dos tipos de account na base do cockpit 1 = Real; 2 = Demo
            // tipos de account no MQL5: 0 = Demo; 1 = treinamento; 2 = real
            switch ($request->in_account_trade_mode) {
                case 2:
                    $tipo_conta = 1;
                    break;
                default:
                    $tipo_conta = 2;
                    break;
            }

            //DB::enableQueryLog();
            $dados = DB::table('licenses as l')
                ->join('expert_advisors as ea', 'ea.id', '=', 'l.expert_advisor_id')
                ->join('accounts as c', 'c.id', '=', 'l.account_id')
                ->join('users as u', 'u.id', '=', 'c.user_id')
                ->select('l.expert_advisor_id', 'l.account_id', 'l.lifetime', 'l.validity', 'c.account', 'c.account_type_id', 'c.user_id', 'ea.code', 'ea.magic_number')
                ->where('c.account', '=', $request->in_account_login)
                ->where('c.account_type_id', '=', $tipo_conta)
                ->where('ea.code', '=', $request->st_cod_ea)
                ->where('ea.magic_number', '=', $request->magic_number)
                ->first();
            //Log::channel('license')->info(DB::getQueryLog());

            if ($dados) {
                // exclui tokens anteriores..
                UserController::deleteTokens($dados->user_id);

                if ($dados->lifetime) {
                    $apiResult["token"]      = UserController::createToken($dados->user_id, $request->in_account_login);
                    $apiResult["msg"]        = "Licença vitalícia";
                    $apiResult["authorized"] = true;
                    Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $apiResult["authorized"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                    return response()->json($apiResult, Response::HTTP_OK);
                } else {
                    // se não é assinatura vitalícia verifica a validity pela data/hora
                    $date = new DateTime($dados->validity);

                    if (date("Y-m-d H:i") < $dados->validity) {
                        $apiResult["token"]      = UserController::createToken($dados->user_id, $request->in_account_login);
                        $apiResult["msg"]        = "Licença válida até " . $date->format('d/m/Y');
                        $apiResult["authorized"] = true;
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $apiResult["authorized"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_OK);
                    } else {
                        $apiResult["error"] = "Licença expirada em: " . $date->format('d/m/Y') . ", uso do EA não autorizado";
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $apiResult["authorized"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
                    }
                }
            } else {
                $apiResult["error"] = "Não foi encontrado registro de licença para a account autenticada no Metatrader";
                Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $apiResult["authorized"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return response()->json(['erro' => 'Não autorizado'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function validar3(Request $request)
    {
        //Log::channel('license')->info($request);
        $apiResult["authorized"] = 0;
        $apiResult["msg"]        = "";
        $apiResult["error"]      = "";
        $apiResult["token"]      = "";
        $apiResult["volume"]     = 0;
        $apiResult["paused"]     = 0;

        if ($request->has('in_account_login') && $request->has('in_account_trade_mode') && $request->has('st_cod_ea') && $request->has('magic_number') && $request->has('port')) {

            // id dos tipos de account na base do cockpit 1 = Real; 2 = Demo
            // tipos de account no MQL5: 0 = Demo; 1 = treinamento; 2 = real
            switch ($request->in_account_trade_mode) {
                case 2:
                    $tipo_conta = 1;
                    break;
                default:
                    $tipo_conta = 2;
                    break;
            }

            //DB::enableQueryLog();
            $dados = DB::table('licenses as l')
                ->join('expert_advisors as ea', 'ea.id', '=', 'l.expert_advisor_id')
                ->join('accounts as c', 'c.id', '=', 'l.account_id')
                ->join('users as u', 'u.id', '=', 'c.user_id')
                ->select('l.*', 'c.account', 'c.account_type_id', 'c.user_id', 'ea.code', 'ea.magic_number', 'ea.port')
                ->where('c.account', '=', $request->in_account_login)
                ->where('c.account_type_id', '=', $tipo_conta)
                ->where('ea.code', '=', $request->st_cod_ea)
                ->where('ea.magic_number', '=', $request->magic_number)
                ->where('ea.port', '=', $request->port)
                ->first();
            //Log::channel('license')->info(DB::getQueryLog());

            if ($dados) {
                // exclui tokens anteriores..
                UserController::deleteTokens($dados->user_id);

                $apiResult["token"]      = UserController::createToken($dados->user_id, $request->in_account_login);
                $apiResult["authorized"] = true;
                $apiResult["volume"]     = $dados->volume;
                $apiResult["paused"]     = $dados->paused;

                if ($dados->lifetime) {
                    $apiResult["msg"]        = "Licença vitalícia";
                    Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                    return response()->json($apiResult, Response::HTTP_OK);
                } else {
                    // se não é assinatura vitalícia verifica a validity pela data/hora
                    $date = new DateTime($dados->validity);

                    if (date("Y-m-d H:i") < $dados->validity) {
                        $apiResult["msg"]        = "Licença válida até " . $date->format('d/m/Y');
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_OK);
                    } else {
                        $apiResult["error"] = "Licença expirada em: " . $date->format('d/m/Y') . ", uso do EA não autorizado";
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
                    }
                }
            } else {
                $apiResult["error"] = "Não foi encontrado registro de licença para a conta/magic number/porta autenticada no Metatrader";
                Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return response()->json(['erro' => 'Não autorizado'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function copy_client(Request $request)
    {
        Log::channel('license')->info($request);
        $apiResult["authorized"] = 0;
        $apiResult["msg"]        = "";
        $apiResult["error"]      = "";
        $apiResult["token"]      = "";
        $apiResult["volume"]     = 0;
        $apiResult["paused"]     = 0;

        if ($request->has('in_account_login') && $request->has('in_account_trade_mode') && $request->has('st_cod_ea') && $request->has('magic_number') && $request->has('port')) {

            // id dos tipos de account na base do cockpit 1 = Real; 2 = Demo
            // tipos de account no MQL5: 0 = Demo; 1 = treinamento; 2 = real
            switch ($request->in_account_trade_mode) {
                case 2:
                    $tipo_conta = 1;
                    break;
                default:
                    $tipo_conta = 2;
                    break;
            }

            //DB::enableQueryLog();
            $dados = DB::table('licenses as l')
                ->join('expert_advisors as ea', 'ea.id', '=', 'l.expert_advisor_id')
                ->join('accounts as c', 'c.id', '=', 'l.account_id')
                ->join('users as u', 'u.id', '=', 'c.user_id')
                //->select('l.*', 'c.account', 'c.account_type_id', 'c.user_id', 'ea.code', 'ea.magic_number', 'ea.port', 'ea.allowed_symbols', 'ea.copy_orders')
                ->select('l.*', 'c.account', 'c.account_type_id', 'c.user_id', 'ea.code', 'ea.magic_number', 'ea.port', 'ea.copy_orders', 'ea.required_balance')
                ->where('c.account', '=', $request->in_account_login)
                ->where('c.account_type_id', '=', $tipo_conta)
                ->where('ea.code', '=', $request->st_cod_ea)
                ->where('ea.magic_number', '=', $request->magic_number)
                ->first();
            //Log::channel('license')->info(DB::getQueryLog());

            if ($dados) {
                // exclui tokens anteriores..
                UserController::deleteTokens($dados->user_id);

                $apiResult["token"]             = UserController::createToken($dados->user_id, $request->in_account_login);
                $apiResult["authorized"]        = true;
                $apiResult["port"]              = $dados->port;
                $apiResult["volume"]            = $dados->volume;
                $apiResult["paused"]            = $dados->paused;
                $apiResult["operation_type"]    = $dados->operation_type_id;
                $apiResult["leverage"]          = $dados->leverage;
                $apiResult["max_volume"]        = $dados->max_volume;
                $apiResult["copy_orders"]       = $dados->copy_orders;
                $apiResult["allowed_symbols"]   = $dados->allowed_symbols;
                $apiResult["max_daily_loss"]    = $dados->max_daily_loss;
                $apiResult["required_balance"]  = $dados->required_balance;

                if ($dados->lifetime) {
                    $apiResult["msg"]        = "Licença vitalícia";
                    Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                    return response()->json($apiResult, Response::HTTP_OK);
                } else {
                    // se não é assinatura vitalícia verifica a validity pela data/hora
                    $date = new DateTime($dados->validity);

                    if (date("Y-m-d H:i") < $dados->validity) {
                        $apiResult["msg"]        = "Licença válida até " . $date->format('d/m/Y');
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_OK);
                    } else {
                        $apiResult["error"] = "Licença expirada em: " . $date->format('d/m/Y') . ", uso do EA não autorizado";
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
                    }
                }
            } else {
                $apiResult["error"] = "Não foi encontrado registro de licença para a conta/magic number/porta autenticada no Metatrader";
                Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return response()->json(['erro' => 'Não autorizado'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function copy_master(Request $request)
    {
        Log::channel('license')->info($request);
        $apiResult["authorized"] = 0;
        $apiResult["msg"]        = "";
        $apiResult["error"]      = "";
        $apiResult["token"]      = "";
        $apiResult["volume"]     = 0;
        $apiResult["paused"]     = 0;

        if ($request->has('in_account_login') && $request->has('in_account_trade_mode') && $request->has('st_cod_ea') && $request->has('magic_number')) {

            // id dos tipos de account na base do cockpit 1 = Real; 2 = Demo
            // tipos de account no MQL5: 0 = Demo; 1 = treinamento; 2 = real
            switch ($request->in_account_trade_mode) {
                case 2:
                    $tipo_conta = 1;
                    break;
                default:
                    $tipo_conta = 2;
                    break;
            }

            //DB::enableQueryLog();
            $dados = DB::table('licenses as l')
                ->join('expert_advisors as ea', 'ea.id', '=', 'l.expert_advisor_id')
                ->join('accounts as c', 'c.id', '=', 'l.account_id')
                ->join('users as u', 'u.id', '=', 'c.user_id')
                //->select('l.*', 'c.account', 'c.account_type_id', 'c.user_id', 'ea.code', 'ea.magic_number', 'ea.port', 'ea.allowed_symbols', 'ea.copy_orders')
                ->select('l.*', 'c.account', 'c.account_type_id', 'c.user_id', 'ea.code', 'ea.magic_number', 'ea.port', 'ea.copy_orders')
                ->where('c.account', '=', $request->in_account_login)
                ->where('c.account_type_id', '=', $tipo_conta)
                ->where('ea.code', '=', $request->st_cod_ea)
                ->where('ea.magic_number', '=', $request->magic_number)
                ->first();
            //Log::channel('license')->info(DB::getQueryLog());

            if ($dados) {
                // exclui tokens anteriores..
                UserController::deleteTokens($dados->user_id);

                $apiResult["token"]             = UserController::createToken($dados->user_id, $request->in_account_login);
                $apiResult["authorized"]        = true;
                $apiResult["port"]              = $dados->port;
                $apiResult["copy_orders"]       = $dados->copy_orders;
                $apiResult["allowed_symbols"]   = $dados->allowed_symbols;

                if ($dados->lifetime) {
                    $apiResult["msg"]        = "Licença vitalícia";
                    Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                    return response()->json($apiResult, Response::HTTP_OK);
                } else {
                    // se não é assinatura vitalícia verifica a validity pela data/hora
                    $date = new DateTime($dados->validity);

                    if (date("Y-m-d H:i") < $dados->validity) {
                        $apiResult["msg"]        = "Licença válida até " . $date->format('d/m/Y');
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_OK);
                    } else {
                        $apiResult["error"] = "Licença expirada em: " . $date->format('d/m/Y') . ", uso do EA não autorizado";
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
                    }
                }
            } else {
                $apiResult["error"] = "Não foi encontrado registro de licença para a conta/magic number/porta autenticada no Metatrader";
                Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["volume"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return response()->json(['erro' => 'Não autorizado'], Response::HTTP_UNAUTHORIZED);
        }
    }

    public function ea(Request $request)
    {
        Log::channel('license')->info("OPAAA: " . __LINE__);
        Log::channel('license')->info($request);
        $apiResult["authorized"] = 0;
        $apiResult["msg"]        = "";
        $apiResult["error"]      = "";
        $apiResult["token"]      = "";
        $apiResult["volume"]     = 0;
        $apiResult["paused"]     = 0;

        Log::channel('license')->info($request->has('in_account_login') . ' && ' . $request->has('in_account_trade_mode') . ' && ' . $request->has('st_cod_ea') . ' && ' . $request->has('magic_number'));
        if ($request->has('in_account_login') && $request->has('in_account_trade_mode') && $request->has('st_cod_ea') && $request->has('magic_number')) {

            // id dos tipos de account na base do cockpit 1 = Real; 2 = Demo
            // tipos de account no MQL5: 0 = Demo; 1 = treinamento; 2 = real
            switch ($request->in_account_trade_mode) {
                case 2:
                    $tipo_conta = 1;
                    break;
                default:
                    $tipo_conta = 2;
                    break;
            }

            DB::enableQueryLog();
            $dados = DB::table('licenses as l')
                ->join('expert_advisors as ea', 'ea.id', '=', 'l.expert_advisor_id')
                ->join('accounts as c', 'c.id', '=', 'l.account_id')
                ->join('users as u', 'u.id', '=', 'c.user_id')
                //->select('l.*', 'c.account', 'c.account_type_id', 'c.user_id', 'ea.code', 'ea.magic_number', 'ea.port', 'ea.allowed_symbols', 'ea.copy_orders')
                ->select('l.*', 'c.account', 'c.account_type_id', 'c.user_id', 'ea.code', 'ea.magic_number', 'ea.port', 'ea.copy_orders', 'ea.required_balance')
                ->where('c.account', '=', $request->in_account_login)
                ->where('c.account_type_id', '=', $tipo_conta)
                ->where('ea.code', '=', $request->st_cod_ea)
                ->where('ea.magic_number', '=', $request->magic_number)
                ->first();
            Log::info(DB::getQueryLog());

            if ($dados) {
                // exclui tokens anteriores..
                UserController::deleteTokens($dados->user_id);

                $apiResult["token"]             = UserController::createToken($dados->user_id, $request->in_account_login);
                $apiResult["authorized"]        = true;
                $apiResult["paused"]            = $dados->paused;

                if ($dados->lifetime) {
                    $apiResult["msg"]        = "Licença vitalícia";
                    Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                    return response()->json($apiResult, Response::HTTP_OK);
                } else {
                    // se não é assinatura vitalícia verifica a validity pela data/hora
                    $date = new DateTime($dados->validity);

                    if (date("Y-m-d H:i") < $dados->validity) {
                        $apiResult["msg"]        = "Licença válida até " . $date->format('d/m/Y');
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_OK);
                    } else {
                        $apiResult["error"] = "Licença expirada em: " . $date->format('d/m/Y') . ", uso do EA não autorizado";
                        Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                        return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
                    }
                }
            } else {
                $apiResult["error"] = "Não foi encontrado registro de licença para a conta/magic number/porta autenticada no Metatrader";
                Log::channel('license')->info(__LINE__ . ") " . date("Y-m-d H:i:s") . " | " . $request->in_account_login . " | " . $request->st_cod_ea . " | " . $request->magic_number . " | " . $request->port . " | " . $apiResult["authorized"] . " | " . $apiResult["paused"] . " | " . $apiResult["msg"] . " | " . $apiResult["error"]);
                return response()->json($apiResult, Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return response()->json(['erro' => 'Não autorizado'], Response::HTTP_UNAUTHORIZED);
        }
    }
}
