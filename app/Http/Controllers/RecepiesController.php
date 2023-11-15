<?php

namespace App\Http\Controllers;

use App\Models\Recepies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecepiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $recepies = Recepies::where('users_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('recepies.index', [
            'recepies' => $recepies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Recepies $recepy)
    {
        $author_name = $recepy->author()->first()->name;
        $is_author = Auth::id() == $recepy->users_id;

        return view('recepies.show', [
            'recepy' => $recepy,
            'author_name' => $author_name,
            'is_author' => $is_author,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recepies $recepies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recepies $recepies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recepies $recepies)
    {
        //
    }
}
