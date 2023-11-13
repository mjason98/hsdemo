<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function showSignInForm()
    {
        return view('signup');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'email_verified_at' => null, // Set as null initially
            'verification_token' => \Illuminate\Support\Str::random(60), // Generate a verification token
        ]);

        // Send verification email
        //$user->sendEmailVerificationNotification();

        event(new Registered($user));

        return redirect()->route('verify.success')->with('success', 'Signup successful!');
    }
}
