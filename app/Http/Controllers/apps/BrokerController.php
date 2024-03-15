<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrokerFormRequest;
use App\Models\Broker;
use Exception;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Broker::all();
        $message = session('message');

        return view('apps.broker.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $broker = new Broker;
        return view('apps.broker.form')->with(['broker' => $broker, 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(BrokerFormRequest $request)
    {
        try {
            $broker = Broker::create(
                [
                    'broker' => $request->broker,
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('broker.index')->with('message', $errorInfo);
        }

        return to_route('broker.index')->with('message', "Registered '{$broker->broker}' broker");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $broker = Broker::find($id);
        if ($broker === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.broker.form')->with(['broker' => $broker, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $broker = Broker::find($id);
        if ($broker === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.broker.form')->with(['broker' => $broker, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrokerFormRequest $request, $id)
    {
        $broker = Broker::find($id);
        if ($broker === null) {
            return to_route('broker.index')
                ->with('message', "Invalid data");
        }

        $broker->fill($request->all());
        $broker->save();

        return to_route('broker.index')
            ->with('message', "'{$broker->broker}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $broker = Broker::find($id);
        if ($broker === null) {
            return to_route('broker.index')
                ->with('message', "Invalid data");
        }
        try {
            $broker->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('broker.index')->with('message', 'Unable to delete this record');
        }

        return to_route('broker.index')
            ->with('message', "'{$broker->broker}' deleted");
    }
}
