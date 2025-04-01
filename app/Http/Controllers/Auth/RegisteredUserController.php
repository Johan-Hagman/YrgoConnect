<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Student;
use App\Http\Controllers\Company;
use App\Http\Controllers\StudentController;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|in:student,company',
            'password' => 'required|string|confirmed|min:8',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role == 'student' ? 1 : 2,
            'password' => Hash::make($request->password),
        ]);


        if ($request->role == 'student') {
            return redirect()->route('student.create');
        } else {
            return redirect()->route('company.create');
        }

        event(new Registered($user));
        Auth::login($user);
        return redirect(route('dashboard', absolute: false));
    }
}
