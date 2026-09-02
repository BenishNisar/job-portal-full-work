<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::with('user')->latest()->get();
        return view('Dashboard.admin.companies.index', compact('companies'));
    }

    public function add()
    {
            $users = User::with('role')->get();
return view('Dashboard.admin.companies.add', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id|unique:companies,user_id',
            'company_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $logoName = null;

        if ($request->hasFile('logo')) {
            $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('uploads/companies'), $logoName);
        }

        Company::create([
            'user_id' => $request->user_id,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'industry' => $request->industry,
            'company_size' => $request->company_size,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'description' => $request->description,
            'status' => $request->status,
            'logo' => $logoName,
        ]);

        return redirect()->route('Dashboard.admin.companies.index')->with('success', 'Company added successfully.');
    }

  public function edit($id)
{
    $company = Company::findOrFail($id);
    $users = User::with('role')->get();

    return view('Dashboard.admin.companies.edit', compact('company', 'users'));
}

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id|unique:companies,user_id,' . $company->id,
            'company_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $logoName = $company->logo;

        if ($request->hasFile('logo')) {
            if ($company->logo && file_exists(public_path('uploads/companies/' . $company->logo))) {
                unlink(public_path('uploads/companies/' . $company->logo));
            }

            $logoName = time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path('uploads/companies'), $logoName);
        }

        $company->update([
            'user_id' => $request->user_id,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'industry' => $request->industry,
            'company_size' => $request->company_size,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'description' => $request->description,
            'status' => $request->status,
            'logo' => $logoName,
        ]);

        return redirect()->route('Dashboard.admin.companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        if ($company->logo && file_exists(public_path('uploads/companies/' . $company->logo))) {
            unlink(public_path('uploads/companies/' . $company->logo));
        }

        $company->delete();

        return redirect()->route('Dashboard.admin.companies.index')->with('success', 'Company deleted successfully.');
    }
}
