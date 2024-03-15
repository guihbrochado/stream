<?php

namespace app\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Validator;

class CreateNewUserWithTermsAcceptance implements CreatesNewUsers {

    public function create(array $input) {

        Validator::make($input, [
            'terms' => ['required', 'accepted'],
        ])->validate();

        $user = User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'password' => Hash::make($input['password']),
        ]);

        DB::table('terms_acceptances')->insert([
            'user_id' => $user->id,
            'terms_version' => 'v1.0',
            'accepted_at' => now(),
        ]);

        return $user;
    }
}
