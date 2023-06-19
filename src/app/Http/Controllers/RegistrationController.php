<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        $email = $request->input('email');
        $existingUser = User::where('email', $email)->first();
        if ($existingUser !== null) {
            return response(['error' => 'Email is taken'], 400);
        }

        $plaintextPassword = $request->input('password');
        $hashedPassword = Hash::make($plaintextPassword);

        $user = new User($request->all());
        $user->password = $hashedPassword;
        $user->save();
    }
}
