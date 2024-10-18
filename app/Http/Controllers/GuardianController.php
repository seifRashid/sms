<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuardianController extends Controller
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
        // Step 1: Validate the incoming request
        $validatedData = $request->validate([
            'guardian_name' => 'required|string|max:255',
            'guardian_email' => 'required|email|unique:users,email',
            'guardian_password' => 'required|string|min:8',
            'role' => 'required|in:student,guardian,parent'
            // Add any additional validation for user or guardian-specific data
        ]);
        // Step 2: Create the User record
        $user = User::create([
            'name' => $validatedData['guardian_name'],
            'email' => $validatedData['guardian_email'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['guardian_password']),
            // Other user fields if necessary
        ]);
        // dd($user);
        // Step 3: Create the guardian record and link it to the user
        Guardian::create([
            'user_id' => $user->id, // Link the guardian to the user using the user_id
            // Other guardian-specific fields
        ]);

        // Step 4: Redirect or respond with success message
        return redirect()->route('register')->with('success', 'guardian created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guardian $guardian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guardian $guardian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guardian $guardian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guardian $guardian)
    {
        //
    }
}
