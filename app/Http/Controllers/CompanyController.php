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

        return redirect()->route('companies.index');
    }

    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }
}
