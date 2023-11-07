<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Wellcome extends Controller
{
    public function wellcome()
    {
        return view('welcome');
    }
}
