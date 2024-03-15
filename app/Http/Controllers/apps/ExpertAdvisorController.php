<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExpertAdvisorFormRequest;
use App\Models\ExpertAdvisor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExpertAdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ExpertAdvisor::all();
        $message = session('message');

        return view('apps.expert-advisor.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Display a listing of the resource.
     */
    public function index_config()
    {
        $supervisor = DB::table('users as u')
            ->join('supervisors as s', 's.user_id', '=', 'u.id')
            ->where('u.id', '=', Auth::user()->id)
            ->select('u.*')
            ->first();

        $is_supervisor  = (isset($supervisor) && !Auth::user()->can('admin')) ? true : false;

        if ($is_supervisor) {
            $data = DB::table('expert_advisors as ea')
                ->join('supervisor_group_experts as sge', 'sge.expert_advisor_id', '=', 'ea.id')
                ->join('supervisors as s', 's.supervisor_group_id', '=', 'sge.supervisor_group_id')
                ->where('s.user_id', '=', Auth::user()->id)
                ->select('ea.*')
                ->get();
        } else {
            // admin...
            $data = ExpertAdvisor::all();
        }
        $message = session('message');

        return view('apps.expert-advisor.index_config')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $expert_advisor = new ExpertAdvisor;
        $operation_types = DB::table('operation_types')
            ->orderBy('id')
            ->get();

        return view('apps.expert-advisor.form')->with([
            'expert_advisor' => $expert_advisor,
            'operation_types' => $operation_types,
            'action' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExpertAdvisorFormRequest $request)
    {
        try {
            $expert_advisor = ExpertAdvisor::create(
                [
                    'code' => $request->code,
                    'description' => $request->description,
                    'magic_number' => $request->magic_number,
                    'name' => $request->name,
                    'active' => ($request->active == 1) ? 1 : 0,
                    'visible' => ($request->visible == 1) ? 1 : 0,
                    'port' => $request->port,
                    'allowed_symbols' =>  $request->allowed_symbols,
                    'operation_type_id' =>  $request->operation_type_id,
                    'default_volume' =>  $request->default_volume,
                    'default_leverage' =>  $request->default_leverage,
                    'default_max_volume' =>  $request->default_max_volume,
                    'default_max_daily_loss' =>  $request->default_max_daily_loss,
                    'copy_orders' => ($request->copy_orders == 1) ? 1 : 0,
                    'required_balance' => $request->required_balance,
                    'trades_paused' => ($request->trades_paused == 1) ? 1 : 0,
                    'close_positions' => ($request->close_positions == 1) ? 1 : 0,
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('expert_advisor.index')->with('message', $errorInfo);
        }

        return to_route('expert_advisor.index')->with('message', "Registered '{$expert_advisor->name}' expert_advisor");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $expert_advisor = ExpertAdvisor::find($id);
        $operation_types = DB::table('operation_types')
            ->orderBy('id')
            ->get();
        if ($expert_advisor === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.expert-advisor.form')->with([
            'expert_advisor' => $expert_advisor,
            'operation_types' => $operation_types,
            'action' => 'show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $expert_advisor = ExpertAdvisor::find($id);
        $operation_types = DB::table('operation_types')
            ->orderBy('id')
            ->get();
        if ($expert_advisor === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.expert-advisor.form')->with([
            'expert_advisor' => $expert_advisor,
            'operation_types' => $operation_types, 'action' => 'edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExpertAdvisorFormRequest $request, $id)
    {
        $expert_advisor = ExpertAdvisor::find($id);
        if ($expert_advisor === null) {
            return to_route('expert_advisor.index')
                ->with('message', "Dados inválidos");
        }

        $expert_advisor->fill($request->all());

        if ($request->copy_orders === null) {
            $expert_advisor->copy_orders = 0;
        }
        if ($request->active === null) {
            $expert_advisor->active = 0;
        }
        if ($request->visible === null) {
            $expert_advisor->visible = 0;
        }
        if ($request->trades_paused === null) {
            $expert_advisor->trades_paused = 0;
        }
        if ($request->close_positions === null) {
            $expert_advisor->close_positions = 0;
        }
        try {
            $expert_advisor->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('expert_advisor.index')->with('message', $errorInfo);
        }

        return to_route('expert_advisor.index')
            ->with('message', "'{$expert_advisor->name}' updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $expert_advisor = ExpertAdvisor::find($id);
        if ($expert_advisor === null) {
            return to_route('expert_advisor.index')
                ->with('message', "Dados inválidos");
        }
        try {
            $expert_advisor->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('expert_advisor.index')->with('message', $errorInfo);
        }

        return to_route('expert_advisor.index')
            ->with('message', "'{$expert_advisor->name}' deleted");
    }

    /**
     * Update the specified resource in storage.
     */
    public function close($id)
    {
        $expert_advisor = ExpertAdvisor::find($id);
        if ($expert_advisor === null) {
            return to_route('expert_advisor.index_config')
                ->with('message', "Não foi localizado o cadastro do EA para realizar a zeragem");
        }
        $expert_advisor->close_positions = 1;
        try {
            $expert_advisor->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('expert_advisor.index_config')->with('message', $errorInfo);
        }

        return to_route('expert_advisor.index_config')
            ->with('message', "'{$expert_advisor->name}' zerar");
    }

    /**
     * Update the specified resource in storage.
     */
    public function close_cancel($id)
    {
        $expert_advisor = ExpertAdvisor::find($id);
        if ($expert_advisor === null) {
            return to_route('expert_advisor.index_config')
                ->with('message', "Não foi localizado o cadastro do EA para cancelar a zeragem");
        }
        $expert_advisor->close_positions = 0;
        try {
            $expert_advisor->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('expert_advisor.index_config')->with('message', $errorInfo);
        }

        return to_route('expert_advisor.index_config')
            ->with('message', "'{$expert_advisor->name}' zeragem cancelada");
    }

    /**
     * Update the specified resource in storage.
     */
    public function pause($id)
    {
        $expert_advisor = ExpertAdvisor::find($id);
        if ($expert_advisor === null) {
            return to_route('expert_advisor.index_config')
                ->with('message', "Não foi localizado o cadastro do EA para realizar a pausa");
        }
        $expert_advisor->trades_paused = 1;
        try {
            $expert_advisor->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('expert_advisor.index_config')->with('message', $errorInfo);
        }

        return to_route('expert_advisor.index_config')
            ->with('message', "'{$expert_advisor->name}' pausado");
    }

    /**
     * Update the specified resource in storage.
     */
    public function pause_cancel($id)
    {
        $expert_advisor = ExpertAdvisor::find($id);
        if ($expert_advisor === null) {
            return to_route('expert_advisor.index_config')
                ->with('message', "Não foi localizado o cadastro do EA para cancelar a pausa");
        }
        $expert_advisor->trades_paused = 0;
        try {
            $expert_advisor->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('expert_advisor.index_config')->with('message', $errorInfo);
        }

        return to_route('expert_advisor.index_config')
            ->with('message', "'{$expert_advisor->name}' pausa removida");
    }
}
