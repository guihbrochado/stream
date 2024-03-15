<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupervisorGroupExpertFormRequest;
use App\Models\ExpertAdvisor;
use App\Models\SupervisorGroup;
use App\Models\SupervisorGroupExpert;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupervisorGroupExpertController extends Controller
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

        $data = DB::table('supervisor_group_experts as sge')
            ->join('expert_advisors as e', 'e.id', '=', 'sge.expert_advisor_id')
            ->join('supervisor_groups as sg', 'sg.id', '=', 'sge.supervisor_group_id')
            ->select('sge.*', 'e.code', 'e.description', 'e.magic_number', 'e.name', 'e.active', 'e.visible', 'sg.group')
            ->orderBy('sg.group', 'asc')
            ->orderBy('e.code', 'asc')
            ->get();

        //Log::info(DB::getQueryLog());
        $message = session('message');

        return view('apps.supervisor-group-expert.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisor_group_expert = new SupervisorGroupExpert();
        $supervisor_groups = SupervisorGroup::orderBy('group')->get();
        $expert_advisors = ExpertAdvisor::orderBy('name')->get();

        return view('apps.supervisor-group-expert.form')->with(['supervisor_group_expert' => $supervisor_group_expert, 'supervisor_groups' => $supervisor_groups, 'expert_advisors' => $expert_advisors, 'action' => 'create']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supervisor_group_expert = SupervisorGroupExpert::find($id);
        if ($supervisor_group_expert === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $supervisor_groups = SupervisorGroup::orderBy('group')->get();
        $expert_advisors = ExpertAdvisor::orderBy('name')->get();

        return view('apps.supervisor-group-expert.form')->with(['supervisor_group_expert' => $supervisor_group_expert, 'supervisor_groups' => $supervisor_groups, 'expert_advisors' => $expert_advisors, 'action' => 'edit']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisorGroupExpertFormRequest $request)
    {
        //$request->validate($this->conta->rules(), $this->conta->feedback());
        try {
            $supervisor_group_expert = SupervisorGroupExpert::create(
                [
                    'supervisor_group_id' => $request->supervisor_group_id,
                    'expert_advisor_id' => $request->expert_advisor_id
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('supervisor_group_expert.index')->with('message', $errorInfo);
        }

        return to_route('supervisor_group_expert.index')->with('message', "Registered '{$supervisor_group_expert->id}' supervisor_group_expert");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supervisor_group_expert = SupervisorGroupExpert::find($id);
        if ($supervisor_group_expert === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }
        $supervisor_groups = SupervisorGroup::orderBy('group')->get();
        $expert_advisors = ExpertAdvisor::orderBy('name')->get();

        return view('apps.supervisor-group-expert.form')->with(['supervisor_group_expert' => $supervisor_group_expert, 'supervisor_groups' => $supervisor_groups, 'expert_advisors' => $expert_advisors, 'action' => 'show']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupervisorGroupExpertFormRequest $request, $id)
    {
        $supervisor_group_expert = SupervisorGroupExpert::find($id);
        if ($supervisor_group_expert === null) {
            return to_route('supervisor_group_expert.index')
                ->with('message', "Invalid data");
        }

        $supervisor_group_expert->fill($request->all());
        $supervisor_group_expert->save();

        return to_route('supervisor_group_expert.index')
            ->with('message', "'{$supervisor_group_expert->id}' updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supervisor_group_expert = SupervisorGroupExpert::find($id);
        if ($supervisor_group_expert === null) {
            return to_route('supervisor_group_expert.index')
                ->with('message', "Invalid data");
        }
        $supervisor_group_expert->delete();

        return to_route('supervisor_group_expert.index')
            ->with('message', "'{$supervisor_group_expert->id}' deleted");
    }
}
