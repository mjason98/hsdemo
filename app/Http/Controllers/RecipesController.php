<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
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
        $recipes = Recipes::query()
            ->with(['ingredients'])
            ->where('users_id', auth()->id())
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
            'ingredients' => 'required',
        ]);

        $recepy_form['users_id'] = auth()->id();

        $recipe = new Recipes($recepy_form);
        $recipe->save();

        $ingredients = array_map(function ($name) {
            $ingredient = Ingredients::firstOrCreate(['name' => $name]);

            return $ingredient->id;
        }, explode(PHP_EOL, $request->ingredients));

        $recipe->ingredients()->sync($ingredients);

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
        $recipe->ingredients = $recipe->ingredients
            ->pluck('name')
            ->implode(PHP_EOL);

        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipes $recipe)
    {
        $request->validate([
            'title' => 'required',
            'instructions' => 'required',
            'ingredients' => 'required',
        ]);

        if (auth()->id() != $recipe->users_id) {
            return back()->withInput()->withErrors(['error' => 'User is not the owner of the recipe']);
        }

        $recipe['title'] = $request->title;
        $recipe['instructions'] = $request->instructions;

        $recipe->save();

        $ingredients = array_map(function ($name) {
            $ingredient = Ingredients::firstOrCreate(['name' => $name]);

            return $ingredient->id;
        }, explode(PHP_EOL, $request->ingredients));

        $recipe->ingredients()->sync($ingredients);

        return redirect(route('recipes.show', compact('recipe')));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipes $recipe)
    {
        $user_id = auth()->id();

        //delete
        if ($user_id == $recipe->users_id) {
            $recipe->delete();

            return redirect(route('recipes.index'));
        }

        return back()->withInput()->withErrors(['delete' => 'User is not the owner of the recipe']);
    }
}
