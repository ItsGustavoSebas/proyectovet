<?php

namespace App\Actions\Fortify;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'ci' => ['required', 'integer', 'unique:users'],
            'telefono' => ['required', 'integer', 'unique:users'],
            'direccion' => ['string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'ci' => $input['ci'],
            'telefono' => $input['telefono'],
            'direccion' => $input['direccion'],
            'password' => Hash::make($input['password']),
            'cliente' => true,
            'empleado' => false,
        ]);

        $cliente = new Cliente();
        $user->cliente()->save($cliente);
        return $user;
    }
}
