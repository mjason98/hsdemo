<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    public function showSignInForm()
    {
        return view('signin');
    }

    public function signIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('explore.index')); // redirect to home with auth
        }

        return back()->withInput()->withErrors(['email' => 'Invalid credentials']);
    }

    public function signOut()
    {
        Auth::logout();

        return redirect('/');
    }
}
