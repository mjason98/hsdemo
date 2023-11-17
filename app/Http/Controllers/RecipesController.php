<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $recipes = Recipes::where('users_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('recipes.index', [
            'recipes' => $recipes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recepy_form = $request->validate([
            'title' => 'required',
            'instructions' => 'required',
        ]);

        $recepy_form['users_id'] = auth()->id();

        $recipe = new Recipes($recepy_form);
        $recipe->save();

        return redirect(route('recipes.show', compact('recipe')));
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipes $recipe)
    {
        $author_name = $recipe->author()->first()->name;
        $is_author = Auth::id() == $recipe->users_id;

        return view('recipes.show', [
            'recipe' => $recipe,
            'author_name' => $author_name,
            'is_author' => $is_author,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipes $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipes $recipes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipes $recipes)
    {
        //
    }
}
