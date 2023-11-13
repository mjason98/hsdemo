<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class Welcome extends Controller
{
    public function welcome()
    {
        if (Auth::check()) {
            return redirect()->intended(route('explore.index'));
        }

        return view('welcome');
    }
}
