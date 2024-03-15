<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTraderFormRequest;
use App\Models\StoreCompany;
use App\Models\StoreTrader;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreTraderController extends Controller
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

        $data = DB::table('store_traders as st')
            ->join('store_companies as sc', 'sc.id', '=', 'st.store_company_id')
            ->select('st.*', 'sc.company', 'sc.company_logo_path')
            ->orderBy('st.trader', 'asc')
            ->orderBy('sc.company', 'asc')
            ->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('apps.store-trader.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store_trader = new StoreTrader();
        $store_companies = StoreCompany::orderBy('company')->get();

        $price = 0;
        
        return view('apps.store-trader.form')->with([
            'store_trader' => $store_trader, 
            'store_companies' => $store_companies, 
            'action' => 'create', 
            'price' => $price,
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
        $store_trader = StoreTrader::find($id);
        if ($store_trader === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $store_companies = StoreCompany::orderBy('company')->get();

        $price = 0;
        
        return view('apps.store-trader.form')->with([
            'store_trader' => $store_trader,
            'store_companies' => $store_companies, 
            'action' => 'edit',
            'price' => $price,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTraderFormRequest $request)
    {
        //$request->validate($this->conta->rules(), $this->conta->feedback());

        $fileTraderName = '';
        $fileAuxName = '';
        $folder = env('APP_PUBLIC_DIR') . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'traders';

        if ($request->hasFile('trader_image_path') && $request->file('trader_image_path')->isValid()) {
            //Log::info($request->file('image')->getSize());
            //$path = $request->file('trader_image_path')->store('temp');
            $file = $request->file('trader_image_path');
            $extension = $file->extension();
            $fileTraderName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileTraderName);
        }

        if ($request->hasFile('aux_image_path') && $request->file('aux_image_path')->isValid()) {
            //$path = $request->file('aux_image_path')->store('temp');
            $file = $request->file('aux_image_path');
            $extension = $file->extension();
            $fileAuxName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileAuxName);
        }

        try {
            $store_trader = StoreTrader::create(
                [
                    'store_company_id' => $request->store_company_id,
                    'trader' => $request->trader,
                    'trader_image_path' => $fileTraderName,
                    'aux_image_path' => $fileAuxName,
                    'active' => ($request->active == 1) ? 1 : 0,
                    'price' => $request->price,
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('store_trader.index')->with('message', $errorInfo);
        }

        return to_route('store_trader.index')->with('message', "Registered '{$store_trader->id}' store_trader");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store_trader = StoreTrader::find($id);
        if ($store_trader === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $store_companies = StoreCompany::orderBy('company')->get();

        return view('apps.store-trader.form')->with(['store_trader' => $store_trader, 'store_companies' => $store_companies, 'action' => 'show']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTraderFormRequest $request, $id)
    {
        $store_trader = StoreTrader::find($id);
        if ($store_trader === null) {
            return to_route('store_company.index')
                ->with('message', "Invalid data");
        }

        $fileTraderName = '';
        $fileAuxName = '';
        $folder = env('APP_PUBLIC_DIR') . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . 'traders';

        if ($request->hasFile('trader_image_path') && $request->file('trader_image_path')->isValid()) {
            //Log::info($request->file('image')->getSize());
            $path = $request->file('trader_image_path')->store('temp');
            $file = $request->file('trader_image_path');
            $extension = $file->extension();
            $fileTraderName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileTraderName);

            $store_trader->trader_image_path = $fileTraderName;
        }

        if ($request->hasFile('aux_image_path') && $request->file('aux_image_path')->isValid()) {
            $path = $request->file('aux_image_path')->store('temp');
            $file = $request->file('aux_image_path');
            $extension = $file->extension();
            $fileAuxName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileAuxName);

            $store_trader->aux_image_path = $fileAuxName;
        }

        $store_trader->trader = $request->trader;
        $store_trader->active = ($request->active == 1) ? 1 : 0;
        $store_trader->save();

        return to_route('store_trader.index')
            ->with('message', "'{$store_trader->id}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store_trader = StoreTrader::find($id);
        if ($store_trader === null) {
            return to_route('store_trader.index')
                ->with('message', "Invalid data");
        }
        $store_trader->delete();

        return to_route('store_trader.index')
            ->with('message', "'{$store_trader->id}' deleted");
    }
}
