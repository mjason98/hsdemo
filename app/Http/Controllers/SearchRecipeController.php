<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchRecipeController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10;

        if ($request->search_string == null) {
            $recipes = new LengthAwarePaginator([], 0, $perPage);
            $search_string = '';
        } else {
            $search_string = $request->search_string;

            $patterns = explode(' ', str_replace(['.', ';', ','], ' ', $search_string));

            $recipes = Recipes::query()
                ->with(['ingredients', 'tags', 'media'])
                ->where(function ($query) use ($patterns) {
                    foreach ($patterns as $pattern) {
                        $pattern = trim($pattern);

                        if (empty($pattern)) {
                            continue;
                        }

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
                ->paginate($perPage);

            $page = $request->input('page', 1);

            $recipes->appends(['page' => $page, 'search_string' => $search_string]);
        }

        return view('search.index', compact(['recipes', 'search_string']));
    }
}
