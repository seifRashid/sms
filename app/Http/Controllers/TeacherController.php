<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
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
            'teacher_name' => 'required|string|max:255',
            'teacher_email' => 'required|email|unique:users,email',
            'teacher_password' => 'required|string|min:8',
            'role' => 'required|in:student,teacher,parent'
            // Add any additional validation for user or teacher-specific data
        ]);
        // Step 2: Create the User record
        $user = User::create([
            'name' => $validatedData['teacher_name'],
            'email' => $validatedData['teacher_email'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['teacher_password']),
            // Other user fields if necessary
        ]);
        // dd($user);
        // Step 3: Create the Teacher record and link it to the user
        Teacher::create([
            'user_id' => $user->id, // Link the teacher to the user using the user_id
            // Other teacher-specific fields
        ]);

        // Step 4: Redirect or respond with success message
        return redirect()->route('register')->with('success', 'Teacher created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
