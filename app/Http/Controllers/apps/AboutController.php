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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_email' => 'required|email|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $imageName = time() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('images'), $imageName);
            $validated['cover_image'] = 'images/' . $imageName;
        }

        $about = About::create($validated);

        // Processar dados de equipe, se fornecidos
        if ($request->has('team')) {
            $teamMembers = json_decode($request->team, true); // Supõe JSON
            foreach ($teamMembers as $member) {
                TeamMember::create([
                    'about_id' => $about->id,
                    'name' => $member['name'],
                    'role' => $member['role'],
                    'image_path' => $member['image_path'],
                    'description' => $member['description'] ?? null,
                ]);
            }
        }

        return redirect()->route('about.all')->with('success', 'About Us created successfully!');
    }

    public function edit($id) {
        // Buscar o item para edição
        $about = About::findOrFail($id);
        return view('apps.about.form')->with(['about' => $about, 'action' => 'edit']);;
    }

    public function update(Request $request, $id) {
        $about = About::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'contact_email' => 'required|email|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('cover_image')) {
            $filename = time() . '.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('images'), $filename);
            $validated['cover_image'] = 'images/' . $filename;
        }

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
