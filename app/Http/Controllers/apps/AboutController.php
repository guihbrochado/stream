<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller {

    public function index() {
        // Listar todas as entradas
        $abouts = About::all();
 
        return view('apps.about.index', compact('abouts'));
    }

    public function all() {
        // Listar todas as entradas
        $abouts = About::all();
        return view('apps.about.all', compact('abouts'));
    }

    public function create() {
        $about = About::all();
        // Exibir o formulário de criação
        return view('apps.about.form')->with(['about' => $about, 'action' => 'create']);
    }

    public function store(Request $request) {
        // Validar e salvar os dados do formulário
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_email' => 'required|email|max:255',
        ]);

        About::create($validated);

        return redirect()->route('about.all')->with('success', 'About Us created successfully!');
    }

    public function edit($id) {
        // Buscar o item para edição
        $about = About::findOrFail($id);
        return view('apps.about.form', compact('about'));
    }

    public function update(Request $request, $id) {
        // Validar e atualizar os dados do formulário
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_email' => 'required|email|max:255',
        ]);

        $about = About::findOrFail($id);
        $about->update($validated);

        return redirect()->route('about.all')->with('success', 'About Us updated successfully!');
    }

    public function destroy($id) {
        // Excluir o item
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('about.all')->with('success', 'About Us deleted successfully!');
    }
}
