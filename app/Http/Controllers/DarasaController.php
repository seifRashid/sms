<?php

namespace App\Http\Controllers;

use App\Models\Darasa;
use Illuminate\Http\Request;

class DarasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        dd($request);

    }

    /**
     * Display the specified resource.
     */
    public function show(Darasa $darasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Darasa $darasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Darasa $darasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Darasa $darasa)
    {
        //
    }
}
