<?php

namespace App\Http\Controllers;

use App\Models\Recepies;
use Illuminate\Http\Request;

class RecepiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('recepies.index');
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
    public function show(Recepies $recepies)
    {
        //
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
