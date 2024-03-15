<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\LicenseFormRequest;
use App\Models\Account;
use App\Models\ExpertAdvisor;
use App\Models\License;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LicenseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //DB::enableQueryLog();
        //Log::info($request->broker);

        $data = DB::table('licenses as l')
            ->join('expert_advisors as ea', 'ea.id', '=', 'l.expert_advisor_id')
            ->join('accounts as c', 'c.id', '=', 'l.account_id')
            ->join('users as u', 'u.id', '=', 'c.user_id')
            ->select('l.*', 'c.account', 'u.name as username', 'u.email as useremail', 'ea.name as expert')
            ->orderBy('ea.name', 'asc')
            ->orderBy('u.name', 'asc')
            ->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('apps.license.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $license = new License();
        $accounts = Account::select('u.name', 'accounts.*')->join('users as u', 'u.id', '=', 'user_id')->orderBy('u.name')->get();
        $eas = ExpertAdvisor::orderBy('name', 'asc')->get();
        $operation_types = DB::table('operation_types')
            ->orderBy('id')
            ->get();

        $licenseCreated = DB::table('licenses as l')->join('accounts as a', 'a.id', '=', 'l.account_id')->get();

        $license->volume = '';
        $license->max_volume = '';
        $license->leverage = '';
        $license->max_daily_loss = '';

        return view('apps.license.form')->with([
            'license' => $license,
            'operation_types' => $operation_types,
            'accounts' => $accounts,
            'eas' => $eas,
            'licenseCreated' => $licenseCreated,
            'action' => 'create'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $license = License::find($id);
        if ($license === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $accounts = Account::select('u.name', 'accounts.*')->join('users as u', 'u.id', '=', 'user_id')->orderBy('u.name')->get();
        $eas = ExpertAdvisor::orderBy('name', 'asc')->get();
        $operation_types = DB::table('operation_types')
            ->orderBy('id')
            ->get();

        // Obter as contas com licenças
        $licenseCreated = DB::table('licenses as l')->join('accounts as a', 'a.id', '=', 'l.account_id')->get();

        return view('apps.license.form')->with([
            'license' => $license,
            'operation_types' => $operation_types, 'accounts' => $accounts, 'eas' => $eas, 'licenseCreated' => $licenseCreated, 'action' => 'edit'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LicenseFormRequest $request)
    {
        $accountIds = $request->account_ids;

        if (!$accountIds || !is_array($accountIds)) {
            return redirect()->route('license.index')->with('message', 'No accounts selected.');
        }

        try {
            foreach ($accountIds as $accountId) {
                License::create([
                    'expert_advisor_id' => $request->expert_advisor_id,
                    'account_id' => $accountId,
                    'lifetime' => ($request->lifetime == 1) ? 1 : 0,
                    'validity' => $request->validity,
                    'volume' => $request->volume,
                    'paused' => ($request->paused == 1) ? 1 : 0,
                    'operation_type_id' => $request->operation_type_id,
                    'leverage' => $request->leverage,
                    'max_volume' => $request->max_volume,
                    'max_daily_loss' => $request->max_daily_loss,
                    'allowed_symbols' => $request->allowed_symbols
                ]);
            }
        } catch (Exception $e) {
            $errorInfo = $e->getMessage();
            return redirect()->route('license.index')->with('message', $errorInfo);
        }

        return redirect()->route('license.index')->with('message', "Licenses registered.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $license = License::find($id);
        if ($license === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $accounts = Account::select('u.name', 'accounts.*')->join('users as u', 'u.id', '=', 'user_id')->orderBy('u.name')->get();
        $eas = ExpertAdvisor::orderBy('name', 'asc')->get();
        $operation_types = DB::table('operation_types')
            ->orderBy('id')
            ->get();

        $licenseCreated = DB::table('licenses as l')->join('accounts as a', 'a.id', '=', 'l.account_id')->get();


        return view('apps.license.form')->with([
            'license' => $license,
            'operation_types' => $operation_types, 'accounts' => $accounts, 'eas' => $eas, 'licenseCreated' => $licenseCreated, 'action' => 'show'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LicenseFormRequest $request, $id)
    {
        //DB::enableQueryLog();
        $license = License::find($id);
        if ($license === null) {
            return to_route('license.index')
                ->with('message', "Invalid data");
        }

        $license->fill($request->all());
        if ($request->lifetime === null) {
            $license->lifetime = 0;
        }
        if ($request->paused === null) {
            $license->paused = 0;
        }
        $license->save();
        //Log::info(DB::getQueryLog());

        return to_route('license.index')
            ->with('message', "'{$license->id}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $license = License::find($id);
        if ($license === null) {
            return to_route('license.index')
                ->with('message', "Invalid data");
        }
        $license->delete();

        return to_route('license.index')
            ->with('message', "'{$license->id}' deleted");
    }
}
