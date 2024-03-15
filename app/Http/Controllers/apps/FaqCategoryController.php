<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqCategoryFormRequest;
use App\Models\FaqCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = FaqCategory::all();
        $message = session('message');

        return view('apps.faq-category.index')->with('data', $data)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faq_category = new FaqCategory;

        return view('apps.faq-category.form')->with(['faq_category' => $faq_category, 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqCategoryFormRequest  $request)
    {
        try {
            $faq_category = FaqCategory::create(
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
            return to_route('faq_category.index')->with('message', $errorInfo);
        }

        return to_route('faq_category.index')->with('message', "Registered '{$faq_category->name}' faq_category");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $faq_category = FaqCategory::find($id);
        if ($faq_category === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.faq-category.form')->with(['faq_category' => $faq_category, 'action' => 'show']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faq_category = FaqCategory::find($id);
        if ($faq_category === null) {
            //return response()->json(['erro' => 'Impossível realizar a atualização, registro pesquisado não existe'], Response::HTTP_NOT_FOUND);
        }

        return view('apps.faq-category.form')->with(['faq_category' => $faq_category, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqCategoryFormRequest $request, $id)
    {
        $faq_category = FaqCategory::find($id);
        if ($faq_category === null) {
            return to_route('faq_category.index')
                ->with('message', "Dados inválidos");
        }
        $faq_category->fill($request->all());
        
        try {
            $faq_category->save();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('faq_category.index')->with('message', $errorInfo);
        }

        return to_route('faq_category.index')
            ->with('message', "'{$faq_category->title}' updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faq_category = FaqCategory::find($id);
        if ($faq_category === null) {
            return to_route('faq_category.index')
                ->with('message', "Dados inválidos");
        }
        try {
            $faq_category->delete();
        } catch (Exception $e) {
            // You can check get the details of the error using `errorInfo`:
            $errorInfo = $e->getMessage();
            return to_route('faq_category.index')->with('message', $errorInfo);
        }

        return to_route('faq_category.index')
            ->with('message', "'{$faq_category->name}' deleted");
    }
}
