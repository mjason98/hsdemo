<?php

namespace App\Http\Controllers;

use App\Models\Ingredients;
use App\Models\Recipes;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = 10;

        $recipes = Recipes::query()
            ->with(['ingredients', 'tags', 'media'])
            ->where('users_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        $page = $request->input('page', 1);

        $recipes->appends(['page' => $page]);

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
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $recepy_form['users_id'] = auth()->id();

        $recipe = new Recipes($recepy_form);
        $recipe->save();

        $recipe->ingredients()->sync($this->parceIngredients($request->ingredients));

        $recipe->tags()->sync($this->parceTags($request->tags));
        
        if ($request->hasFile('image')) {
            $recipe->addMediaFromRequest('image')->toMediaCollection();
        }

        return redirect(route('recipes.show', compact('recipe')));
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipes $recipe)
    {
        $author = $recipe->author()->first();
        $is_author = Auth::id() == $recipe->users_id;

        return view('recipes.show', [
            'recipe' => $recipe,
            'author' => $author,
            'is_author' => $is_author,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipes $recipe)
    {
        if (auth()->id() != $recipe->users_id) {
            abort(403, 'Unauthorized.');
        }

        $recipe->ingredients = $recipe->ingredients
            ->pluck('name')
            ->implode(PHP_EOL);

        $recipe->tags = $recipe->tags
            ->pluck('name')
            ->implode(' ');

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
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if (auth()->id() != $recipe->users_id) {
            return back()->withInput()->withErrors(['error' => 'User is not the owner of the recipe']);
        }

        $recipe['title'] = $request->title;
        $recipe['instructions'] = $request->instructions;

        $recipe->save();

        $recipe->ingredients()->sync($this->parceIngredients($request->ingredients));

        $recipe->tags()->sync($this->parceTags($request->tags));

        //image
        if ($request->hasFile('image')) {
            $recipe->clearMediaCollection();
            $recipe->addMediaFromRequest('image')->toMediaCollection();
        }

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

    //------------------------------------------------
    
    private function parceIngredients($raw_ingredients)
    {
        $ingredients = array_map(function ($name) {
            $ingredient = Ingredients::firstOrCreate(['name' => $name]);

            return $ingredient->id;
        }, explode(PHP_EOL, $raw_ingredients));

        return $ingredients;
    }

    private function parceTags($raw_tags)
    {
        $tags = array_filter(array_map(function ($name) {
            $name = str_replace('#', '', trim($name));
            if (!empty($name)) {
                $tag = Tags::firstOrCreate(['name' => $name]);

                return $tag->id;
            }

            return null;
        }, explode(' ', str_replace(PHP_EOL, ' ', $raw_tags))));

        return $tags;
    }
}
