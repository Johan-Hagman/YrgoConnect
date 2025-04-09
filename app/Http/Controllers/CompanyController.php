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
            'image_url' => 'nullable|url',
            'city' => 'nullable|string',
            'contact_name' => 'nullable|string',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'attendance' => 'nullable|boolean',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->user_id = $request->user()->id;
        $company->image_url = $request->image_url;
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

        return view('company.show', compact('company'));
    }

    public function edit()
    {
        $company = auth()->user()->company;

        return view('company.edit', compact('company'));
    }
}
