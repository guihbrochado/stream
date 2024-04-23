<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        return view('apps.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('apps.subcategory.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        try {
            $subcategory = Subcategory::create($request->all());
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect()->route('subcategory.index')->with('error', $error);
        }
        return redirect()->route('subcategory.index')->with('success', "Subcategoria '{$subcategory->nome}'criada com sucesso");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subcategory = Subcategory::with('categoria')->findOrFail($id);
        return view('apps.subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $ccategory = Category::all();
        return view('apps.subcategory.form', compact('subcategory', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        try {
            $subcategory = Subcategory::findOrFail($id);
            $subcategory->update($request->all());
        } catch (Exception $e) {
            return redirect()->route('subcategory.index')->with('error', $e->getMessage());
        }
        return redirect()->route('subcategory.index')->with('success', "Subcategoria '{$subcategory->nome}' atualizada com sucesso");
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $subcategory = Subcategory::findOrFail($id);
            $subcategory->delete();
        } catch (Exception $e) {
            return redirect()->route('subcategory.index')->with('error', $e->getMessage());
        }
        return redirect()->route('subcategory.index')->with('success', 'Subcategoria removida com sucesso');
    }

}
