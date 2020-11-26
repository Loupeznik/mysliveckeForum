<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'uzivatelske_jmeno' => ['required', 'string', 'max:255', 'unique:uzivatel'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'uzivatelske_jmeno' => $input['uzivatelske_jmeno'],
            'jmeno' => $input['jmeno'],
            'prijmeni' => $input['prijmeni'],
            'datum_registrace' => now(),
            'heslo' => Hash::make($input['password']),
        ]);
    }
}
