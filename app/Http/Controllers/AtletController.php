<?php

namespace App\Http\Controllers;

use App\Models\Atlet;
use Illuminate\Http\Request;

class AtletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atlet = Atlet::get();
        return view('official-kejurnas.atlet.index')->with('atlet', $atlet);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
