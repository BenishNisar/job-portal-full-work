<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class EmailController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->get('search', ''));

        $query = JobApplication::with('job')->latest();

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%")
                  ->orWhereHas('job', function ($jobQuery) use ($search) {
                      $jobQuery->where('position', 'like', "%{$search}%")
                               ->orWhere('company_name', 'like', "%{$search}%");
                  });
            });
        }

        $applications = $query->paginate(12)->withQueryString();

        $inboxCount = JobApplication::count();
        $newCount = JobApplication::where('status', 0)->count();
        $reviewedCount = JobApplication::where('status', 1)->count();

        return view('Dashboard.admin.email.index', [
            'applications' => $applications,
            'search' => $search,
            'inboxCount' => $inboxCount,
            'newCount' => $newCount,
            'reviewedCount' => $reviewedCount,
        ]);
    }
}
