<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Company;
use App\Models\YrgoClass;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function showStep1()
    {
        $roles = Role::all();
        return view('auth.register-step1', compact('roles'));
    }

    public function storeStep1(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        Auth::login($user);

        // Determine next step based on role
        $role = Role::find($request->role_id);
        if ($role->name === 'Student') {
            return redirect()->route('register.student');
        } else {
            return redirect()->route('register.company');
        }
    }

    public function showStudentForm()
    {
        $classes = YrgoClass::all();
        return view('auth.register-student', compact('classes'));
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'image_url' => 'nullable|url',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'cv_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'class_id' => 'required|exists:classes,id',
        ]);

        $student = new Student();
        $student->user_id = $request->user()->id;
        $student->class_id = $request->class_id;
        $student->image_url = $request->image_url;
        $student->website_url = $request->website_url;
        $student->description = $request->description;
        $student->cv_url = $request->cv_url;
        $student->linkedin_url = $request->linkedin_url;
        $student->save();

        return redirect()->route('dashboard')->with('success', 'Registration completed successfully!');
    }

    public function showCompanyForm()
    {
        return view('auth.register-company');
    }

    public function storeCompany(Request $request)
    {
        $request->validate([
            'image_url' => 'nullable|url',
            'city' => 'nullable|string',
            'contact_name' => 'nullable|string',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'attendance' => 'nullable|boolean',
        ]);

        $company = new Company();
        $company->user_id = $request->user()->id;
        $company->image_url = $request->image_url;
        $company->city = $request->city;
        $company->contact_name = $request->contact_name;
        $company->website_url = $request->website_url;
        $company->description = $request->description;
        $company->linkedin_url = $request->linkedin_url;
        $company->attendance = $request->attendance ?? false;
        $company->save();

        return redirect()->route('dashboard')->with('success', 'Registration completed successfully!');
    }
}
