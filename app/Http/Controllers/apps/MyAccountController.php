<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Address;


class MyAccountController extends Controller {

    public function index() {
        $user = Auth::user(); // Pega o usuário autenticado
        $addresses = Address::where('user_id', $user->id)->get(); // Carrega os endereços do usuário

        return view('apps.myaccount.index', compact('user', 'addresses'));
    }

    public function update(Request $request) {
        $user = Auth::user(); // Obtem o usuário autenticado

        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'nullable',
            'new_password' => 'nullable|min:6',
            'confirm_new_password' => 'same:new_password',
            'profile_photo' => 'nullable|image|max:2048', // Validação da imagem
        ]);

        // Atualização de nome e e-mail
        $user->name = $data['first_name'];
        $user->email = $data['email'];

        // Atualização da senha, se necessário
        if (!empty($data['current_password']) && !empty($data['new_password'])) {
            if (Hash::check($data['current_password'], $user->password)) {
                $user->password = Hash::make($data['new_password']);
            } else {
                return back()->withErrors(['current_password' => 'A senha atual está incorreta']);
            }
        }

        // Tratamento do upload da imagem de perfil
        if ($request->hasFile('profile_photo') && $request->file('profile_photo')->isValid()) {
            $filename = time() . '_' . $request->file('profile_photo')->getClientOriginalName(); // Cria um nome baseado no tempo e nome original
            $path = $request->file('profile_photo')->move(public_path('assets/images/users'), $filename); // Move a imagem para o diretório público
            $user->profile_photo_path = str_replace(public_path(), '', $path); // Salva o caminho relativo no banco de dados
        }

        $user->save(); // Salva as alterações do usuário no banco de dados

        return back()->with('success', 'Conta atualizada com sucesso!');
    }
    
    public function updateAddress(Request $request, $id) {
        $address = Address::findOrFail($id); // Encontra o endereço ou falha se não existir

        $validated = $request->validate([
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'district' => 'required|string|max:255'
        ]);

        $address->update($validated);

        return back()->with('success', 'Endereço atualizado com sucesso!');
    }
}
