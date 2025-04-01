<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_url' => 'nullable|url',
            'city' => 'nullable|string',
            'contact_name' => 'nullable|string',
            'website_url' => 'nullable|url',
            'description' => 'nullable|string',
            'attendance' => 'nullable|boolean',
            'user_id' => 'required|exists:users,id'
        ]);

        $company = new Company();
        $company->user_id = $request->auth()->user()->id;
        $company->website_url = $request->website_url;
        $company->description = $request->description;
        $company->linkedin_url = $request->linkedin_url;
        $company->save();

        return redirect()->route('companies.index');
    }

    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }
}
