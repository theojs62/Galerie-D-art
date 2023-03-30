<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Visitor;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name_user' => $input['firstname'] . $input['lastname'],
            'admin_user' => false,
            'mail_user' => $input['email'],
            'password_user' => Hash::make($input['password']),
        ]);
        Visitor::create([
            'firstname_visitor' => $input['firstname'],
            'lastname_visitor' => $input['lastname'],
            'link_avatar' => 'https://forum.pcastuces.com/img/efa5cf51c0711fafc61e73f90e05bc12.png',
            'id_user' => $user->id,
        ]);
        return $user;
    }
}
