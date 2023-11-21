<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Support\Facades\Cache;

class ExploreController extends Controller
{
    public function index()
    {
        $recipes = Cache::remember('explore.recipes', 3600, function(){
            return Recipes::query()
            ->with(['ingredients', 'tags', 'media'])
            ->where('users_id', '<>', auth()->id())
            ->inRandomOrder()
            ->limit(2)
            ->get();
        });

        return view('explore', compact('recipes'));
    }
}
