<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
            'city' => 'nullable|string',
            'contact_name' => 'nullable|string',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'attendance' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('logo_images', 'public');
        }

        $company = new Company();
        $company->name = $request->name;
        $company->user_id = $request->user()->id;
        $company->image_url = $imagePath ?? null;
        $company->city = $request->city;
        $company->contact_name = $request->contact_name;
        $company->website_url = $request->website_url;
        $company->description = $request->description;
        $company->attendance = $request->attendance ?? false;
        $company->save();

        return redirect()->route('company.index');
    }

    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    public function show()
    {
        $company = auth()->user()->company;

        $company = auth()->user()->company()->with('competences')->first();

        return view('company.show', compact('company'));
    }

    public function edit()
    {
        $company = auth()->user()->company;

        return view('company.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'city' => 'nullable|string',
            'contact_name' => 'nullable|string',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'attendance' => 'nullable|boolean',
        ]);

        $company = auth()->user()->company;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('company_images', 'public');
            $company->image_url = $imagePath;
        }

        $company->update($request->only([
            'name',
            'city',
            'contact_name',
            'website_url',
            'description',
            'attendance',
        ]));

        return redirect()->route('company.show')->with('success', 'Profilen har uppdaterats.');
    }
}
