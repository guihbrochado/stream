<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupervisorFormRequest;
use App\Models\Supervisor;
use App\Models\SupervisorGroup;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupervisorController extends Controller
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

        $data = DB::table('supervisors as s')
            ->join('users as u', 'u.id', '=', 's.user_id')
            ->join('supervisor_groups as sg', 'sg.id', '=', 's.supervisor_group_id')
            ->select('s.*', 'u.name as username', 'u.email as useremail', 'sg.group')
            ->orderBy('sg.group', 'asc')
            ->orderBy('u.name', 'asc')
            ->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('apps.supervisor.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisor = new Supervisor();
        $supervisor_groups = SupervisorGroup::orderBy('group')->get();
        $users = User::orderBy('name')->get();

        return view('apps.supervisor.form')->with(['supervisor' => $supervisor, 'supervisor_groups' => $supervisor_groups, 'users' => $users, 'action' => 'create']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supervisor = Supervisor::find($id);
        if ($supervisor === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $supervisor_groups = SupervisorGroup::orderBy('group')->get();
        $users = User::orderBy('name')->get();

        return view('apps.supervisor.form')->with(['supervisor' => $supervisor, 'supervisor_groups' => $supervisor_groups, 'users' => $users, 'action' => 'edit']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisorFormRequest $request)
    {
        //$request->validate($this->conta->rules(), $this->conta->feedback());
        try {
            $supervisor = Supervisor::create(
                [
                    'supervisor_group_id' => $request->supervisor_group_id,
                    'user_id' => $request->user_id
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('supervisor.index')->with('message', $errorInfo);
        }

        return to_route('supervisor.index')->with('message', "Registered '{$supervisor->id}' supervisor");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supervisor = Supervisor::find($id);
        if ($supervisor === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $supervisor_groups = SupervisorGroup::orderBy('group')->get();
        $users = User::orderBy('name')->get();

        return view('apps.supervisor.form')->with(['supervisor' => $supervisor, 'supervisor_groups' => $supervisor_groups, 'users' => $users, 'action' => 'show']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisorFormRequest $request, $id)
    {
        $supervisor = Supervisor::find($id);
        if ($supervisor === null) {
            return to_route('supervisor.index')
                ->with('message', "Invalid data");
        }

        $supervisor->fill($request->all());
        $supervisor->save();

        return to_route('supervisor.index')
            ->with('message', "'{$supervisor->id}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supervisor = Supervisor::find($id);
        if ($supervisor === null) {
            return to_route('supervisor.index')
                ->with('message', "Invalid data");
        }
        $supervisor->delete();

        return to_route('supervisor.index')
            ->with('message', "'{$supervisor->id}' deleted");
    }
}
