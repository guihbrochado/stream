<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreTraderFormRequest;
use App\Models\StoreCompany;
use App\Models\StoreTrader;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use DateTime;

class StoreController extends Controller {

    public function index(Request $request) {

        $data = DB::table('store_traders as st')
                ->join('store_companies as sc', 'sc.id', '=', 'st.store_company_id')
                ->select('st.*', 'sc.company', 'sc.company_logo_path')
                ->orderBy('st.trader', 'asc')
                ->orderBy('sc.company', 'asc')
                ->get();

        $mediaOperacoes = $this->calcMediaOperacoes($request);

        foreach ($data as $item) {
            $item->mediaOperacoes = $mediaOperacoes;
        }

        $message = session('message');
        return view('apps.store.index')->with([
                    'data' => $data,
                    'message' => $message,
        ]);
    }

    public function checkout(Request $request) {
        $user = User::with('address')->find(Auth::user()->id);

        if ($user === null) {
            //return redirect()->route('some.route.name')->with('error', 'User not found');
        }

        $userAddress = $user->address;
        if ($userAddress === null) {
            //return redirect()->route('some.route.name')->with('error', 'User address not found');
        }

        $userStreet = $userAddress->street ?? '';
        $userDistrict = $userAddress->district ?? '';
        $userCity = $userAddress->city ?? '';
        $userState = $userAddress->state ?? '';

        $storeTraderId = $request->input('traderId');
        $storeTrader = StoreTrader::with('storeCompany')->find($storeTraderId);

        if ($storeTrader === null || $storeTrader->storeCompany === null) {
            //return redirect()->route('some.route.name')->with('error', 'Trader or company not found');
            dd($storeTrader);
        }

        $storeCompanyName = $storeTrader->storeCompany->company ?? '';
        $storeTraderName = $storeTrader->trader ?? '';
        $storeTraderImage = $storeTrader->trader_image_path ?? '';
        $storeTraderPrice = $storeTrader->price ?? '';

        $cart = session()->get('cart', []);
        $total = array_sum(array_map(function($item) {
        return $item['price'] * $item['quantity'];
    }, $cart));
    
        return view('apps.store.checkout')->with([
                    'user' => $user,
                    'userStreet' => $userStreet,
                    'userDistrict' => $userDistrict,
                    'userCity' => $userCity,
                    'userState' => $userState,
                    'storeTrader' => $storeTrader,
                    'storeCompanyName' => $storeCompanyName,
                    'storeTraderName' => $storeTraderName,
                    'storeTraderImage' => $storeTraderImage,
                    'storeTraderPrice' => $storeTraderPrice,
                    'cart' => $cart,
                    'total' => $total,
        ]);
    }

    public function payment(Request $request) {
        $data = [];

        return view('apps.store.payment', $data);
    }

    public function calcMediaOperacoes(Request $request) {

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



        $dados = DB::table('deals as d')
                ->join('accounts as c', 'c.account', '=', 'd.account')
                ->select(DB::raw('sum(d.deal_profit) as deal_profit'))
                ->whereBetween('d.deal_time', [$date_from, $date_to]);

        if (isset($request['client']) && !empty($request['client'])) {
            $dados = $dados->where('c.user_id', '=', $request['client']);
        } else {
            $dados = $dados->where('c.user_id', '=', Auth::user()->id);
        }

        if (isset($request['account']) && !empty($request['account'])) {
            $dados = $dados->where('d.account', '=', $request['account']);
        }

        if (isset($request['ea']) && !empty($request['ea'])) {
            $dados = $dados->where('d.deal_magic', '=', $request['ea']);
        }

        $result = $dados->first();

        $mediaOperacoes = 0;

        if ($result) {

            $contagemRegistros = $dados->count();
            if ($contagemRegistros > 0) {
                $mediaOperacoes = $result->deal_profit / $contagemRegistros;
            }
        }

        return $mediaOperacoes;
    }
}
