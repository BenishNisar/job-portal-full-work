<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\CompanyRegistrationMail;

class CompanyController extends Controller
{
    public function index()
    {
        return view('Home.company.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'website' => 'nullable|string|max:255',
            'industry' => 'required|string|max:255',
            'company_size' => 'nullable|string|max:100',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'company_name',
            'email',
            'phone',
            'website',
            'industry',
            'company_size',
            'country',
            'city',
            'address',
            'description',
        ]);

        $data['user_id'] = auth()->id();
        $data['status'] = 'inactive';

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('companies', 'public');
        }

        $company = Company::create($data);

        try {
            Mail::to('admin@test.com')->send(new CompanyRegistrationMail($company->toArray()));
            Log::info('Company registration mail sent successfully.');
        } catch (\Exception $e) {
            Log::error('Company registration email failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Your company details have been submitted successfully. Our team will contact you shortly.'
        ]);
    }
}
