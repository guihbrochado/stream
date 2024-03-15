<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EfiPayService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ChargesController extends Controller {

    protected $efiPayService;

    public function __construct(EfiPayService $efiPayService) {
        $this->efiPayService = $efiPayService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {
        $txid = $this->efiPayService->generateTxid();

        $userStreet = "";
        $userDistrict = "";
        $userState = "";
        $userCity = "";

        $user = auth()->user();
        $cpf = $user->cpf ?? '12345678909';
        $nome = $user->name ?? 'Francisco da Silva';

        $valorOriginal = $request->input('valorOriginal', '0.01');
        $solicitacaoPagador = $request->input('solicitacaoPagador', 'Enter the order number or identifier.');
        $infoAdicionais = $request->input('infoAdicionais', [
            [
                'nome' => 'Field 1',
                'valor' => 'Additional information1'
            ],
            [
                'nome' => 'Field 2',
                'valor' => 'Additional information2'
            ]
        ]);

        $params = [
            'txid' => $txid
        ];

        $body = [
            'calendario' => [
                'expiracao' => 3600
            ],
            'devedor' => [
                'cpf' => $cpf,
                'nome' => $nome
            ],
            'valor' => [
                'original' => $valorOriginal
            ],
            'chave' => '44224886000122',
            'solicitacaoPagador' => $solicitacaoPagador,
            'infoAdicionais' => $infoAdicionais
        ];

        $response = $this->efiPayService->createCharge($params, $body);
        $cart = session()->get('cart', []);
        Log::info('API Response:', (array) $response);

        if ($request->ajax()) {
            return response()->json(['response' => $response]);
        } else {
            return view('apps.store.checkout', ['response' => $response, 'cart' => $cart, 'user' => $user, "userStreet" => $userStreet, 'userDistrict' => $userDistrict, 'userState' => $userState, "userCity" => $userCity]);
        }
    }

    public function getCharges($inicio = null, $fim = null, $cpf = null, $nome = null) {
        if ($inicio === null || $fim === null) {
            $inicio = Carbon::now()->subDays(31)->toIso8601ZuluString();
            $fim = Carbon::now()->toIso8601ZuluString();
        }

        $response = $this->efiPayService->getCharge($inicio, $fim);

        if (isset($response['cobs'])) {
            $charges = $response['cobs'];

            if ($cpf) {
                $charges = array_filter($charges, function ($charge) use ($cpf) {
                    return $charge['devedor']['cpf'] == $cpf;
                });
            }

            if ($nome) {
                $charges = array_filter($charges, function ($charge) use ($nome) {
                    return strpos(strtolower($charge['devedor']['nome']), strtolower($nome)) !== false;
                });
            }

            return response()->json(['message' => 'Sucesso', 'data' => array_values($charges)], 200);
        } else {
            return response()->json(['message' => 'Erro', 'error' => $response['error']], 400);
        }
    }

    public function showPayments(Request $request) {
        $inicioRequest = $request->query('inicio');
        $fimRequest = $request->query('fim');
        $cpf = $request->query('cpf');
        $nome = $request->query('nome');

        $user = Auth::user();
        if ($cpf && $user) {
            $user->cpf = $cpf;
            $user->save();
        }

        $inicio = $inicioRequest ? Carbon::parse($inicioRequest)->toIso8601ZuluString() : Carbon::now()->subDays(31)->toIso8601ZuluString();
        $fim = $fimRequest ? Carbon::parse($fimRequest)->toIso8601ZuluString() : Carbon::now()->toIso8601ZuluString();

        $charges = $this->getCharges($inicio, $fim, $cpf, $nome);

        if ($charges->status() === 200) {
            $data = json_decode($charges->getContent(), true);
            return view('apps.payment.index', ['charges' => $data['data']]);
        } else {
            return view('apps.payment.index', ['error' => 'Não foi possível recuperar os pagamentos']);
        }
    }

    /* public function getCharges() {
      $inicio = "2023-09-10T00:00:00Z";
      $fim = "2023-09-23T23:59:59Z";

      if ($inicio && $fim) {
      $response = $this->efiPayService->getCharge($inicio, $fim);
      if (isset($response['cobs'])) {
      return response()->json(['message' => 'Sucesso', 'data' => $response['cobs']], 200);
      } else {
      return response()->json(['message' => 'Erro', 'error' => $response['error']], 400);
      }
      } else {
      $response = ['error' => 'Os parâmetros inicio e fim são obrigatórios'];
      return response()->json($response, 400);
      }
      //dd($response);
      return response()->json($response);
      }

      public function showPayments() {
      $charges = $this->getCharges(); // Chama o método getCharges
      if ($charges->status() === 200) {
      $data = json_decode($charges->getContent(), true);
      return view('apps.payment.index', ['charges' => $data['data']]);
      }
      return view('apps.payment.index', ['error' => 'Não foi possível recuperar os pagamentos']);
      } */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
