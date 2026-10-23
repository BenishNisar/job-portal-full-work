<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index()
    {

        $user = Auth::user();


        $isAdmin = $user && (int)$user->role_id === 1;


        if(!$isAdmin)
        {
            abort(403,'Unauthorized');
        }



        /*
        |--------------------------------------------------------------------------
        | JOB COUNTS
        |--------------------------------------------------------------------------
        */


        $totalJobs = Job::count();


        $activeJobs = Job::where(
            'approval_status',
            'approved'
        )->count();



        $pendingJobs = Job::where(
            'approval_status',
            'pending'
        )->count();



        // Blade ke liye
        $pendingJobsCount = $pendingJobs;




        /*
        |--------------------------------------------------------------------------
        | APPLICATION COUNTS
        |--------------------------------------------------------------------------
        */


        $totalApplications = JobApplication::count();



        $pendingApplicationsCount = JobApplication::where(
            'status',
            0
        )->count();



        $shortlisted = JobApplication::where(
            'status',
            'shortlisted'
        )->count();



        $selected = JobApplication::where(
            'status',
            'selected'
        )->count();




        /*
        |--------------------------------------------------------------------------
        | SUCCESS RATE
        |--------------------------------------------------------------------------
        */


        $successRate = $totalApplications > 0
            ?
            round(($selected / $totalApplications) * 100)
            :
            0;




        /*
        |--------------------------------------------------------------------------
        | JOB VIEWS
        |--------------------------------------------------------------------------
        */


        $totalViews = Job::sum('views');




        /*
        |--------------------------------------------------------------------------
        | DASHBOARD STATS
        |--------------------------------------------------------------------------
        */


        $stats = [

            'totalJobs' => $totalJobs,

            'activeJobs' => $activeJobs,

            'pendingJobs' => $pendingJobs,

            'totalApplications' => $totalApplications,

            'shortlisted' => $shortlisted,

            'successRate' => $successRate,

            'jobViews' => $totalViews,

        ];






        /*
        |--------------------------------------------------------------------------
        | TOP JOBS
        |--------------------------------------------------------------------------
        */


        $topJobs = Job::withCount('applications')
            ->orderBy(
                'applications_count',
                'desc'
            )
            ->take(10)
            ->get();






        /*
        |--------------------------------------------------------------------------
        | AI RECOMMENDATIONS
        |--------------------------------------------------------------------------
        */


        $aiRecommendations = Job::withCount('applications')
            ->orderBy(
                'applications_count',
                'desc'
            )
            ->take(4)
            ->get();






        /*
        |--------------------------------------------------------------------------
        | ALERTS
        |--------------------------------------------------------------------------
        */


        $alerts = [

            [

                'type'=>'warning',

                'title'=>'Pending Jobs',

                'message'=>$pendingJobsCount.
                ' jobs waiting for approval.'

            ],


            [

                'type'=>'danger',

                'title'=>'Applications',

                'message'=>$pendingApplicationsCount.
                ' applications need review.'

            ]

        ];







        /*
        |--------------------------------------------------------------------------
        | CHART DATA
        |--------------------------------------------------------------------------
        */


        $chartData = JobApplication::select(

                DB::raw(
                    'DATE(created_at) as date'
                ),

                DB::raw(
                    'count(*) as total'
                )

            )
            ->where(
                'created_at',
                '>=',
                Carbon::now()->subDays(7)
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();



        $chartLabels = $chartData->pluck('date');


        $chartValues = $chartData->pluck('total');







        /*
        |--------------------------------------------------------------------------
        | TIMELINE
        |--------------------------------------------------------------------------
        */


        $latestApplications = JobApplication::with('job')
            ->latest()
            ->take(5)
            ->get();



        $latestJobs = Job::latest()
            ->take(5)
            ->get();







        return view(
            'Dashboard.admin.dashboard',
            compact(

                'user',

                'isAdmin',

                'stats',

                'totalJobs',

                'activeJobs',

                'pendingJobs',

                'pendingJobsCount',

                'totalApplications',

                'pendingApplicationsCount',

                'shortlisted',

                'selected',

                'successRate',

                'topJobs',

                'aiRecommendations',

                'alerts',

                'chartLabels',

                'chartValues',

                'latestApplications',

                'latestJobs'

            )
        );


    }

}
