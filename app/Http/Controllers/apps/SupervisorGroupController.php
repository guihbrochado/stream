<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupervisorGroupFormRequest;
use App\Models\SupervisorGroup;
use Exception;
use Illuminate\Http\Request;

class SupervisorGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SupervisorGroup::all();
        $message = session('message');

        return view('apps.supervisor-group.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisor_group = new SupervisorGroup;
        return view('apps.supervisor-group.form')->with(['supervisor_group' => $supervisor_group, 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(Request $request)
    public function store(SupervisorGroupFormRequest $request)
    {
        try {
            $supervisor_group = SupervisorGroup::create(
                [
                    'group' => $request->group,
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('supervisor_group.index')->with('message', $errorInfo);
        }

        return to_route('supervisor_group.index')->with('message', "Registered '{$supervisor_group->group}' supervisor_group");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supervisor_group = SupervisorGroup::find($id);
        if ($supervisor_group === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.supervisor-group.form')->with(['supervisor_group' => $supervisor_group, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supervisor_group = SupervisorGroup::find($id);
        if ($supervisor_group === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.supervisor-group.form')->with(['supervisor_group' => $supervisor_group, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisorGroupFormRequest $request, $id)
    {
        $supervisor_group = SupervisorGroup::find($id);
        if ($supervisor_group === null) {
            return to_route('supervisor_group.index')
                ->with('message', "Invalid data");
        }

        $supervisor_group->fill($request->all());
        $supervisor_group->save();

        return to_route('supervisor_group.index')
            ->with('message', "'{$supervisor_group->group}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supervisor_group = SupervisorGroup::find($id);
        if ($supervisor_group === null) {
            return to_route('supervisor_group.index')
                ->with('message', "Invalid data");
        }
        try {
            $supervisor_group->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('supervisor_group.index')->with('message', 'Unable to delete this record');
        }

        return to_route('supervisor_group.index')
            ->with('message', "'{$supervisor_group->group}' deleted");
    }
}
