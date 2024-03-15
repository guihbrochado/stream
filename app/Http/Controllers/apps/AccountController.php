<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountClientFormRequest;
use App\Http\Requests\AccountFormRequest;
use App\Models\Account;
use App\Models\AccountType;
use App\Models\Broker;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
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

        $data = DB::table('accounts')
            ->join('users as u', 'u.id', '=', 'accounts.user_id')
            ->leftJoin('brokers', 'accounts.broker_id', '=', 'brokers.id')
            ->join('account_types', 'account_types.id', '=', 'accounts.account_type_id')
            ->select('accounts.*', 'u.name as username', 'u.email as useremail', 'brokers.broker', 'account_types.account_type')
            ->orderBy('u.name', 'asc')
            ->orderBy('accounts.account')
            ->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('apps.account.index')->with('data', $data)->with('message', $message);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_client(Request $request)
    {

        //DB::enableQueryLog();
        //Log::info($request->broker);

        $data = DB::table('accounts')
            ->join('users as u', 'u.id', '=', 'accounts.user_id')
            ->leftJoin('brokers', 'accounts.broker_id', '=', 'brokers.id')
            ->join('account_types', 'account_types.id', '=', 'accounts.account_type_id')
            ->select('accounts.*', 'u.name as username', 'u.email as useremail', 'brokers.broker', 'account_types.account_type')
            ->where('accounts.user_id', '=', Auth::user()->id)
            ->orderBy('u.name', 'asc')
            ->orderBy('accounts.account')
            ->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('apps.account.index-client')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account = new Account();
        $users = User::orderBy('name')->get();
        $account_types = AccountType::orderBy('account_type', 'asc')->get();
        $brokers = Broker::orderBy('broker', 'asc')->get();
        
        return view('apps.account.form')->with(['account' => $account, 'users' => $users, 'account_types' => $account_types, 'brokers' => $brokers, 'action' => 'create']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_client()
    {
        $account = new Account();
        $users = User::orderBy('name')->get();
        $account_types = AccountType::orderBy('account_type', 'asc')->get();
        $brokers = Broker::orderBy('broker', 'asc')->get();
        
        return view('apps.account.form-client')->with(['account' => $account, 'users' => $users, 'account_types' => $account_types, 'brokers' => $brokers, 'action' => 'create']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::find($id);
        if ($account === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $users = User::orderBy('name')->get();
        $account_types = AccountType::orderBy('account_type', 'asc')->get();
        $brokers = Broker::orderBy('broker', 'asc')->get();
        
        return view('apps.account.form')->with(['account' => $account, 'users' => $users, 'account_types' => $account_types, 'brokers' => $brokers, 'action' => 'edit']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountFormRequest $request)
    {
        //$request->validate($this->conta->rules(), $this->conta->feedback());
        try {            
            $account = Account::create(
                [
                    'user_id' => $request->user_id,
                    'account_type_id' => $request->account_type_id,
                    'broker_id' => $request->broker_id,
                    'server' => $request->server_name,
                    'account' => $request->account,
                    'password' => $request->password
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('account.index')->with('message', $errorInfo);
        }

        return to_route('account.index')->with('message', "Registered '{$account->account}' account");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_client(AccountClientFormRequest $request)
    {
        //Log::info($request);

        $fileName = '';
        $folder = env('APP_PUBLIC_DIR') . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR .'accounts';

        /*
        $request->validate([
            'file' => 'required|file|size:100',
          ]);
        */

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //Log::info($request->file('image')->getSize());
            $path = $request->file('image')->store('temp');
            $file = $request->file('image');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);
            //$file->move(public_path($folder), $fileName);
        }

        //$request->validate($this->conta->rules(), $this->conta->feedback());
        try {            
            $account = Account::create(
                [
                    'user_id' => Auth::user()->id,
                    'account_type_id' => 1,
                    'broker_id' => $request->broker_id,
                    'server' => $request->server_name,
                    'account' => $request->account,
                    'password' => $request->password,
                    'symbols' => $request->symbols,
                    'volume' => $request->volume,
                    'image' =>$fileName
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('account.index')->with('message', $errorInfo);
        }

        return to_route('conta_investimento.index')->with('message', "Registered '{$account->account}' account");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = Account::find($id);
        if ($account === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $users = User::orderBy('name')->get();
        $account_types = AccountType::orderBy('account_type', 'asc')->get();
        $brokers = Broker::orderBy('broker', 'asc')->get();
        
        return view('apps.account.form')->with(['account' => $account, 'users' => $users, 'account_types' => $account_types, 'brokers' => $brokers, 'action' => 'show']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_client($id)
    {
        $account = Account::find($id);
        if ($account === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $users = User::orderBy('name')->get();
        $account_types = AccountType::orderBy('account_type', 'asc')->get();
        $brokers = Broker::orderBy('broker', 'asc')->get();
        
        return view('apps.account.form-client')->with(['account' => $account, 'users' => $users, 'account_types' => $account_types, 'brokers' => $brokers, 'action' => 'show']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountFormRequest $request, $id)
    {
        $account = Account::find($id);
        if ($account === null) {
            return to_route('account.index')
                ->with('message', "Invalid data");
        }

        $account->fill($request->all());
        $account->save();

        return to_route('account.index')
            ->with('message', "'{$account->account}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::find($id);
        if ($account === null) {
            return to_route('account.index')
                ->with('message', "Invalid data");
        }
        $account->delete();

        return to_route('account.index')
            ->with('message', "'{$account->account}' deleted");
    }
}
