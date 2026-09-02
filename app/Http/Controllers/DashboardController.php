<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $isAdmin = $user && (int) $user->role_id === 1;
        $isCompany = $user && (int) $user->role_id === 3;

        $company = null;
        $data = [];

        if ($isCompany) {
            $company = Company::where('user_id', $user->id)->first();
        }

        if ($isAdmin) {
            $data = [
                'totalCompanies' => Company::count(),
                'totalJobs' => Job::count(),
                'approvedJobs' => Job::where('approval_status', 'approved')->count(),
                'pendingJobs' => Job::where('approval_status', 'pending')->count(),
                'rejectedJobs' => Job::where('approval_status', 'rejected')->count(),
                'totalApplications' => JobApplication::count(),
                'recentJobs' => Job::latest()->take(5)->get(),
                'recentApplications' => JobApplication::latest()->take(5)->get(),
            ];
        } elseif ($isCompany) {
            if (!$company) {
                return redirect()->back()->with('error', 'Company profile not found.');
            }

            $companyJobIds = Job::where('company_id', $company->id)->pluck('id');

            $data = [
                'company' => $company,
                'myJobs' => Job::where('company_id', $company->id)->count(),
                'myApprovedJobs' => Job::where('company_id', $company->id)
                    ->where('approval_status', 'approved')
                    ->count(),
                'myPendingJobs' => Job::where('company_id', $company->id)
                    ->where('approval_status', 'pending')
                    ->count(),
                'myRejectedJobs' => Job::where('company_id', $company->id)
                    ->where('approval_status', 'rejected')
                    ->count(),
                'myApplications' => JobApplication::whereIn('job_id', $companyJobIds)->count(),
                'recentMyJobs' => Job::where('company_id', $company->id)
                    ->latest()
                    ->take(5)
                    ->get(),
                'recentMyApplications' => JobApplication::whereIn('job_id', $companyJobIds)
                    ->latest()
                    ->take(5)
                    ->get(),
            ];
        } else {
            return abort(403, 'Unauthorized');
        }

        return view('Dashboard.admin.dashboard', compact('user', 'isAdmin', 'isCompany') + $data);
    }
}
