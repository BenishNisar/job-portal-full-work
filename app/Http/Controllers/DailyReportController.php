<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Mail;

class DailyReportController extends Controller
{

    public function sendReport()
    {

        $todayApplications = JobApplication::whereDate(
            'created_at',
            today()
        )->count();


        $activeJobs = Job::where(
            'approval_status',
            'approved'
        )->count();


        $shortlisted = JobApplication::where(
            'status',
            'shortlisted'
        )->count();


        $topJob = Job::withCount('applications')
            ->orderBy(
                'applications_count',
                'desc'
            )
            ->first();



        $data = [
            'applications'=>$todayApplications,
            'jobs'=>$activeJobs,
            'shortlisted'=>$shortlisted,
            'topJob'=>$topJob
        ];


        Mail::send(
            'emails.daily-report',
            $data,
            function($mail){

                $mail->to('client@email.com')
                ->subject('Daily Recruitment Report');

            }
        );


    }

}
