<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Support\Facades\Cache;

class ExploreController extends Controller
{
    public function index()
    {
        $user_id = auth()->id();

        // 1h
        $recipes = Cache::remember('explore.recipes_uid'.$user_id, 3600, function(){
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
