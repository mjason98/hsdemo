<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipes;

class SearchRecipeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search_string == null) {
            $recipes = [];
            $search_string = '';
        } else {
            $search_string = $request->search_string;

            $recipes = Recipes::query()
                ->with(['ingredients', 'tags', 'media'])
                ->orderBy('created_at', 'desc')
                ->get();
        }
        
        ray($search_string);

        return view('search.index', compact(['recipes', 'search_string']));
    }
}
