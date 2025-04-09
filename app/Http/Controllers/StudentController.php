<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        ###
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
            $imagePath = $request->file('image')->store('profile_images', 'public');
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

        return redirect()->route('student.index');
    }

    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function show()
    {

        $student = auth()->user()->student()->with('classModel')->first();
        $role = auth()->user()->role->name;

        return view('student.show', compact('student', 'role'));
    }


    public function edit()
    {
        $student = auth()->user()->student;

        return view('student.edit', compact('student'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string|max:240',
            'linkedin_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv' => 'nullable|mimes:pdf|max:2048',
            'competences' => 'nullable|array',
            'competences.*' => 'string',
        ]);

        $student = auth()->user()->student;

        $student->update($request->only([
            'name',
            'website_url',
            'description',
            'linkedin_url',
        ]));

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('student_images', 'public');
            $student->image_url = $path;
        }

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('student_cvs', 'public');
            $student->cv_url = $cvPath;
        }

        $student->save();

        if ($request->filled('competences')) {
            $competenceIds = \App\Models\Competence::whereIn('name', $request->input('competences'))->pluck('id');
            $student->competences()->sync($competenceIds);
        } else {
            $student->competences()->detach();
        }

        return redirect()->route('student.show')->with('success', 'Din profil har uppdaterats.');
    }
}
