<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsagePolicyCategoryFormRequest;
use App\Models\UsagePolicyCategory;
use Exception;
use Illuminate\Http\Request;

class UsagePolicyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UsagePolicyCategory::all();
        $message = session('message');

        return view('apps.usage-policy-category.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usage_policy_category = new UsagePolicyCategory;

        return view('apps.usage-policy-category.form')->with(['usage_policy_category' => $usage_policy_category, 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsagePolicyCategoryFormRequest  $request)
    {
        try {
            $usage_policy_category = UsagePolicyCategory::create(
                [
                    'icon' => $request->icon,
                    'order' => $request->order,
                    'title' => $request->title,
                    'description' => $request->description
                ]
            );
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('usage_policy_category.index')->with('message', $errorInfo);
        }

        return to_route('usage_policy_category.index')->with('message', "Registered '{$usage_policy_category->name}' usage_policy_category");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usage_policy_category = UsagePolicyCategory::find($id);
        if ($usage_policy_category === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.usage-policy-category.form')->with(['usage_policy_category' => $usage_policy_category, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $usage_policy_category = UsagePolicyCategory::find($id);
        if ($usage_policy_category === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.usage-policy-category.form')->with(['usage_policy_category' => $usage_policy_category, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsagePolicyCategoryFormRequest $request, $id)
    {
        $usage_policy_category = UsagePolicyCategory::find($id);
        if ($usage_policy_category === null) {
            return to_route('usage_policy_category.index')
                ->with('message', "Dados inválidos");
        }
        $usage_policy_category->fill($request->all());
        
        try {
            $usage_policy_category->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('usage_policy_category.index')->with('message', $errorInfo);
        }

        return to_route('usage_policy_category.index')
            ->with('message', "'{$usage_policy_category->title}' updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usage_policy_category = UsagePolicyCategory::find($id);
        if ($usage_policy_category === null) {
            return to_route('usage_policy_category.index')
                ->with('message', "Dados inválidos");
        }
        try {
            $usage_policy_category->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('usage_policy_category.index')->with('message', $errorInfo);
        }

        return to_route('usage_policy_category.index')
            ->with('message', "'{$usage_policy_category->name}' deleted");
    }
}
