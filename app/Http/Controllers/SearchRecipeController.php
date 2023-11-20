<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchRecipeController extends Controller
{
    public function index(Request $request)
    {
        return view('search.index');
    }
}
