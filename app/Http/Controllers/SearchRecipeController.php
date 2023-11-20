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

            $patterns = explode(' ', str_replace(['.', ';', ','], ' ', $search_string));
            
            ray($patterns);

            $recipes = Recipes::query()
                ->with(['ingredients', 'tags', 'media'])
                ->where(function ($query) use ($patterns) {
                    foreach ($patterns as $pattern) {
                        $pattern = trim($pattern);

                        if (empty($pattern))
                            continue;
                        
                        $query->orWhere(function ($subquery) use ($pattern) {
                            $subquery->whereHas('ingredients', function ($subsubquery) use ($pattern) {
                                $subsubquery->where('name', 'like', '%' . $pattern . '%');
                            })
                                ->orWhereHas('tags', function ($subsubquery) use ($pattern) {
                                    $subsubquery->where('name', 'like', '%' . $pattern . '%');
                                })
                                ->orWhere('title', 'like', '%' . $pattern . '%');
                        });
                    }
                })
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('search.index', compact(['recipes', 'search_string']));
    }
}
