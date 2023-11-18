<?php

namespace App\Http\Controllers;

use App\Models\Recipes;

class ExploreController extends Controller
{
    public function index()
    {
        $recipes = Recipes::query()
            ->with(['ingredients', 'tags', 'media'])
            ->where('users_id', '<>', auth()->id())
            ->inRandomOrder()
            ->limit(2)
            ->get();

        return view('explore', compact('recipes'));
    }
}
