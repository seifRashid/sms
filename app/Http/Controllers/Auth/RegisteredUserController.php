<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

use function Laravel\Prompts\alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'role' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            // dd($request->role)
        ]);

         // Depending on the role, create the associated record in the specific table
         switch ($request->input('role')) {
            case 'teacher':
                $teacher = Teacher::create([
                    'user_id' => $user->id,
                    // Add other teacher-specific fields here
                ]);
                $user->teacher_id = $teacher->id;
                break;

            case 'student':
                $student = Student::create([
                    'user_id' => $user->id,
                    // Add other student-specific fields here
                ]);
                $user->student_id = $student->id;
                break;

            case 'guardian':
                $guardian = Guardian::create([
                    'user_id' => $user->id,
                    // Add other guardian-specific fields here
                ]);
                $user->guardian_id = $guardian->id;
                break;
        }

        // Save the foreign key reference in the users table
        $user->save();

        // dd($user->role);
        event(new Registered($user));
        // dd($request->role);

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
