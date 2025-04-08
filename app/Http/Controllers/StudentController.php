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
            'image_url' => 'nullable|url',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'cv_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'user_id' => 'required|exists:users,id',
            'class_id' => 'required|exists:classes,id'
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->user_id = $request->user()->id;
        $student->class_id = $request->class_id;
        $student->image_url = $request->image_url;
        $student->cv_url = $request->cv_url;
        $student->linkedin_url = $request->linkedin_url;
        $student->description = $request->description;
        $student->save();

        return redirect()->route('students.index');
    }

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function showProfile()
    {
        $student = auth()->user()->student;
        return view('profile.student', compact('student'));
    }
}
