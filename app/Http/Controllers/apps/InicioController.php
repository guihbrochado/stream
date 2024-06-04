<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inicio;

class InicioController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $inicios = Inicio::all();
        return view('apps.home.index')->with(["inicios" => $inicios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $inicios = Inicio::first();
        return view('apps.home.form')->with(['inicios' => $inicios, 'action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        try {
            $request->validate([
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $inicioData = $request->only(['logo', 'cover']); // Asumindo que há outros campos, ajuste conforme necessário

            if ($request->hasFile('logo')) {
                $logoName = time() . '_logo.' . $request->logo->extension();
                $request->logo->move(public_path('images/inicio'), $logoName);
                $inicioData['logo_path'] = 'images/inicio/' . $logoName;
            }

            if ($request->hasFile('cover')) {
                $coverName = time() . '_cover.' . $request->cover->extension();
                $request->cover->move(public_path('images/inicio'), $coverName);
                $inicioData['cover_path'] = 'images/inicio/' . $coverName;
            }

            $inicio = Inicio::updateOrCreate(['id' => 1], $inicioData);

            return redirect()->route('inicio.index')->with('success', 'Inicio updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Erro ao salvar as imagens: ' . $e->getMessage());
            return redirect()->route('inicio.index')->with('error', 'Erro ao salvar as imagens: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $inicio = Inicio::findOrFail($id); // Busca o registro para edição
        return view('apps.home.form')->with(['inicio' => $inicio, 'action' => 'edit']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $inicio = Inicio::findOrFail($id);

        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $inicioData = [];

        if ($request->hasFile('logo')) {
            $logoName = time() . '_logo.' . $request->logo->extension();
            $request->logo->move(public_path('images/inicio'), $logoName);
            $inicioData['logo_path'] = 'images/inicio/' . $logoName;
        }

        if ($request->hasFile('cover')) {
            $coverName = time() . '_cover.' . $request->cover->extension();
            $request->cover->move(public_path('images/inicio'), $coverName);
            $inicioData['cover_path'] = 'images/inicio/' . $coverName;
        }

        $inicio->update($inicioData);

        return redirect()->route('inicio.index')->with('success', 'Inicio updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $inicio = Inicio::findOrFail($id);
        $inicio->delete();
        return redirect()->route('inicio.index')->with('success', 'Registro deletado com sucesso!');
    }
}
