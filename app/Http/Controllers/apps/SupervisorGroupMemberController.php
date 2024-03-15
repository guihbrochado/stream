<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupervisorGroupMemberFormRequest;
use App\Models\SupervisorGroup;
use App\Models\SupervisorGroupMember;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupervisorGroupMemberController extends Controller
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

        $data = DB::table('supervisor_group_members as sgm')
            ->join('users as u', 'u.id', '=', 'sgm.user_id')
            ->join('supervisor_groups as sg', 'sg.id', '=', 'sgm.supervisor_group_id')
            ->select('sgm.*', 'u.name as username', 'u.email as useremail', 'sg.group')
            ->orderBy('sg.group', 'asc')
            ->orderBy('u.name', 'asc')
            ->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('apps.supervisor-group-member.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisor_group_member = new SupervisorGroupMember();
        $supervisor_groups = SupervisorGroup::orderBy('group')->get();
        $users = User::orderBy('name')->get();

        // Identifique os IDs dos supervisores que já estão associados a um grupo.
        $supervisorsWithGroups = SupervisorGroupMember::pluck('user_id')->unique()->toArray();

        return view('apps.supervisor-group-member.form')->with([
            'supervisor_group_member' => $supervisor_group_member,
            'supervisor_groups' => $supervisor_groups,
            'users' => $users,
            'action' => 'create',
            'supervisorsWithGroups' => $supervisorsWithGroups
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
        $supervisor_group_member = SupervisorGroupMember::find($id);
        if ($supervisor_group_member === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $supervisor_groups = SupervisorGroup::orderBy('group')->get();
        $users = User::orderBy('name')->get();

        // Identifique os IDs dos supervisores que já estão associados a um grupo.
        $supervisorsWithGroups = SupervisorGroupMember::pluck('user_id')->unique()->toArray();

        return view('apps.supervisor-group-member.form')->with([
            'supervisor_group_member' => $supervisor_group_member, 'supervisor_groups' => $supervisor_groups, 'users' => $users, 'action' => 'edit',
            'supervisorsWithGroups' => $supervisorsWithGroups
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisorGroupMemberFormRequest $request)
    {
        $user_ids = $request->user_ids;

        if (!$user_ids || !is_array($user_ids)) {
            return redirect()->route('supervisor_group_member.index')->with('message', 'No users selected.');
        }

        try {
            foreach ($user_ids as $user_id) {
                SupervisorGroupMember::create([
                    'supervisor_group_id' => $request->supervisor_group_id,
                    'user_id' => $user_id
                ]);
            }
        } catch (Exception $e) {
            $errorInfo = $e->getMessage();
            return redirect()->route('supervisor_group_member.index')->with('message', $errorInfo);
        }

        return redirect()->route('supervisor_group_member.index')->with('message', "Registered users.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supervisor_group_member = SupervisorGroupMember::find($id);
        if ($supervisor_group_member === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $supervisor_groups = SupervisorGroup::orderBy('group')->get();
        $users = User::orderBy('name')->get();

        // Identifique os IDs dos supervisores que já estão associados a um grupo.
        $supervisorsWithGroups = SupervisorGroupMember::pluck('user_id')->unique()->toArray();

        return view('apps.supervisor-group-member.form')->with([
            'supervisor_group_member' => $supervisor_group_member, 'supervisor_groups' => $supervisor_groups, 'users' => $users, 'action' => 'show',
            'supervisorsWithGroups' => $supervisorsWithGroups
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisorGroupMemberFormRequest $request, $id)
    {
        $supervisor_group_member = SupervisorGroupMember::find($id);
        if ($supervisor_group_member === null) {
            return to_route('supervisor_group_member.index')
                ->with('message', "Invalid data");
        }

        $supervisor_group_member->fill($request->all());
        $supervisor_group_member->save();

        return to_route('supervisor_group_member.index')
            ->with('message', "'{$supervisor_group_member->id}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supervisor_group_member = SupervisorGroupMember::find($id);
        if ($supervisor_group_member === null) {
            return to_route('supervisor_group_member.index')
                ->with('message', "Invalid data");
        }
        $supervisor_group_member->delete();

        return to_route('supervisor_group_member.index')
            ->with('message', "'{$supervisor_group_member->id}' deleted");
    }
}
