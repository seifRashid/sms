<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Student/Index', [
            //get data from teachers table in the database
            'students' => Student::with('user:id,name,email')->latest()->paginate(3),

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
        // Step 1: Validate the incoming request
        $validatedData = $request->validate([
            'student_name' => 'required|string|max:255',
            'student_password' => 'required|string|min:8',
            'role' => 'required|in:student,student,parent'
            // Add any additional validation for user or student-specific data
        ]);
        // Step 2: Create the User record
        $user = User::create([
            'name' => $validatedData['student_name'],
            'role' => $validatedData['role'],
            'password' => Hash::make($validatedData['student_password']),
            // Other user fields if necessary
        ]);
        // dd($user);
        // Step 3: Create the student record and link it to the user
        Student::create([
            'user_id' => $user->id, // Link the student to the user using the user_id
            // Other student-specific fields
        ]);

        // Step 4: Redirect or respond with success message
        return redirect()->route('register')->with('success', 'student created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
