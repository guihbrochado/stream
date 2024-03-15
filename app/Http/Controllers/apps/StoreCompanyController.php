<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyFormRequest;
use App\Models\StoreCompany;
use Exception;
use Illuminate\Http\Request;

class StoreCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StoreCompany::all();
        $message = session('message');

        return view('apps.store-company.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store_company = new StoreCompany;
        return view('apps.store-company.form')->with(['store_company' => $store_company, 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(StoreCompanyFormRequest $request)
    {
        $fileName = '';
        $folder = env('APP_PUBLIC_DIR') . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR .'companies';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //Log::info($request->file('image')->getSize());
            $path = $request->file('image')->store('temp');
            $file = $request->file('image');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);
            //$file->move(public_path($folder), $fileName);
        }

        try {
            $store_company = StoreCompany::create(
                [
                    'company' => $request->company,
                    'company_logo_path' => $fileName
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('store_company.index')->with('message', $errorInfo);
        }

        return to_route('store_company.index')->with('message', "Registered '{$store_company->company}' store_company");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store_company = StoreCompany::find($id);
        if ($store_company === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.store-company.form')->with(['store_company' => $store_company, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store_company = StoreCompany::find($id);
        if ($store_company === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.store-company.form')->with(['store_company' => $store_company, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyFormRequest $request, $id)
    {
        $fileName = '';
        $folder = env('APP_PUBLIC_DIR') . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR .'companies';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('temp');
            $file = $request->file('image');
            $extension = $file->extension();
            $fileName = md5($file->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $file->move($folder, $fileName);
        }

        $store_company = StoreCompany::find($id);
        if ($store_company === null) {
            return to_route('store_company.index')
                ->with('message', "Invalid data");
        }

        $store_company->company = $request->company;
        $store_company->company_logo_path = $fileName;
        $store_company->save();

        return to_route('store_company.index')
            ->with('message', "'{$store_company->company}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store_company = StoreCompany::find($id);
        if ($store_company === null) {
            return to_route('store_company.index')
                ->with('message', "Invalid data");
        }
        try {
            $store_company->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('store_company.index')->with('message', 'Unable to delete this record');
        }

        return to_route('store_company.index')
            ->with('message', "'{$store_company->company}' deleted");
    }
}
