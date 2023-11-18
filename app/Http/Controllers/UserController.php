<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipes;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    public function show(User $user)
    {
        $recipes = Recipes::query()
            ->with(['ingredients', 'tags'])
            ->where('users_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();

        return view('user.show', compact(['user', 'recipes']));
    }

    public function edit(User $user)
    {
        if (auth()->id() != $user->id)
            return abort(403, 'Not allowed');

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if (auth()->id() != $user->id) {
            return back()->withInput()->withErrors(['error' => 'Not allowed']);
        }

        $user['name'] = $request->name;

        $user->save();

        return redirect(route('user.show', compact('user')));
    }
}
