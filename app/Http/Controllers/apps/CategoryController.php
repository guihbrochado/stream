<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        return view('apps.category.index', compact('category'));
    }

    public function create() {
        $category = new Category();
        return view('apps.category.form')->with([
            'category' => $category,
            'action' => 'create' 
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'nome' => 'required|unique:categorias|max:255',
        ]);

        try {
            $category = Category::create($request->all());
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect()->route('category.index')->with('error', $error);
        }
        return redirect()->route('category.index')->with('success', "Categoria '{$category->nome}' Registrada com suscesso");

    }

    public function show($id) {
        $category = Category::findOrFail($id);
        return view('apps.category.show', compact('category'));
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('apps.category.form')->with([
            'category' => $category,
            'action' => 'edit'
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nome' => 'required|unique:categorias,nome,'.$id.'|max:255',
        ]);

        try {
            $category = Category::findOrFail($id);
            $category->update($request->all());
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect()->route('category.index')->with('error', $error);
        }
        return redirect()->route('category.index')->with('success', "Categoria atualizada com sucesso");
    }

    public function destroy($id) {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
        } catch (Exception $e) {
            $error = $e->getMessage();
            return redirect()->route('category.index')->with('error', $error);
        }
        return redirect()->route('category.index')->with('success',"Categoria '{$category->nome}' removida com sucesso!");
    }

}
