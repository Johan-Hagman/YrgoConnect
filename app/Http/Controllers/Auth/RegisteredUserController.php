<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Student,Företag',
        ]);

        $roleId = Role::where('name', $request->role)->value('id');

        if (!$roleId) {
            return back()->withErrors(['role' => 'Den valda rollen är ogiltig.']);
        }

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $roleId,
        ]);

        event(new Registered($user));
        Auth::login($user);

        if ($request->role === 'Student') {
            $user->student()->create([]);
        } elseif ($request->role === 'Företag') {
            $user->company()->create([]);
        }

        return redirect()->route('dashboard');
    }
}
