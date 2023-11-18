<?php

namespace App\Http\Controllers;

use App\Models\Recipes;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $recipes = Recipes::query()
            ->with(['ingredients', 'tags', 'media'])
            ->where('users_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();

        return view('user.show', compact(['user', 'recipes']));
    }

    public function edit(User $user)
    {
        if (auth()->id() != $user->id) {
            return abort(403, 'Not allowed');
        }

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif', //|max:2048',
        ]);

        if (auth()->id() != $user->id) {
            return back()->withInput()->withErrors(['error' => 'Not allowed']);
        }

        $user['name'] = $request->name;

        $user->save();

        if ($request->hasFile('image')) {
            $user->clearMediaCollection();
            $user->addMediaFromRequest('image')->toMediaCollection();
        }

        return redirect(route('user.show', compact('user')));
    }
}
