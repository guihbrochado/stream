<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
class CockpitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosAccount = DB::table('account_live_data')
        ->join('accounts', 'accounts.account', '=', 'account_live_data.conta')
        ->select('account_live_data.*')
        ->where('accounts.user_id', '=', Auth::user()->id)
        ->whereRaw('account_live_data.updated_at > curdate()')
        ->orderBy('account_live_data.conta')
        ->get();
        //Log::info($dados['contas']);
        //Log::info(DB::getQueryLog());

        $dadosPosition = DB::table('positions_live_data')
        ->join('accounts', 'accounts.account', '=', 'positions_live_data.conta')
        ->select('positions_live_data.*')
        ->where('accounts.user_id', '=', Auth::user()->id)
        ->whereRaw('positions_live_data.updated_at > curdate()')
        ->orderBy('positions_live_data.conta')
        ->orderBy('positions_live_data.position_ticket')
        ->get();

        //Log::info(DB::getQueryLog());
        return view('apps.cockpit.index', ['dadosAccount' => $dadosAccount, 'dadosPosition' => $dadosPosition]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
