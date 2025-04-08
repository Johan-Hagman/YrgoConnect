<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'cv_url' => 'nullable|file|mimes:pdf|max:2048',
            'linkedin_url' => 'nullable|url',
            'user_id' => 'required|exists:users,id',
            'class_id' => 'required|exists:classes,id'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public'); // Spara bilden i 'public' disk
        }

        if ($request->hasFile('cv_url')) {
            $cvPath = $request->file('cv_url')->store('cv', 'public');
        }

        $student = new Student();
        $student->name = $request->name;
        $student->user_id = $request->user()->id;
        $student->class_id = $request->class_id;
        $student->image_url = $imagePath ?? null;
        $student->website_url = $request->website_url;
        $student->description = $request->description;
        $student->cv_url = $cvPath ?? null;
        $student->linkedin_url = $request->linkedin_url;
        $student->class_id = $request->class_id;
        $student->save();

        return redirect()->route('students.index');
    }

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function show()
    {

        $student = auth()->user()->student()->with('classModel')->first();
        $role = auth()->user()->role->name;

        return view('students.show', compact('student', 'role'));
    }


    public function edit()
    {
        $student = auth()->user()->student;

        return view('students.edit', compact('student'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'image_url' => 'nullable|url',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'cv_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        $student = auth()->user()->student;

        $student->update($request->only([
            'name',
            'website_url',
            'description',
            'cv_url',
            'linkedin_url',
        ]));

        return redirect()->route('profile.show.student')->with('success', 'Din profil har uppdaterats.');
    }
}
