<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use App\Models\Job;
use App\Models\JobApplication;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {


            // Total Jobs
            $totalJobs = Job::count();


            // Today's New Jobs
            $todayJobs = Job::whereDate(
                'created_at',
                Carbon::today()
            )->count();



            // Today's Applications
            $todayApplications = JobApplication::whereDate(
                'created_at',
                Carbon::today()
            )->count();



            // Total Shortlisted Candidates
            $shortlisted = JobApplication::where(
                'status',
                'shortlisted'
            )->count();



            // Top Performing Job
            $topJob = Job::withCount('applications')
                ->orderByDesc('applications_count')
                ->first();



            $topJobName = $topJob
                ? $topJob->position
                : 'No Job Available';


            $topJobApplications = $topJob
                ? $topJob->applications_count
                : 0;




            // Email Report
            $report = "

Daily Recruitment Report

Date: "
. Carbon::now()->format('d M Y') . "


Total Jobs:
{$totalJobs}


New Jobs Today:
{$todayJobs}


New Applications Today:
{$todayApplications}


Shortlisted Candidates:
{$shortlisted}



Top Performing Job:

{$topJobName}


Applications Received:

{$topJobApplications}



Report Generated Automatically by Sparrow Portal.

";




            Mail::raw($report, function ($mail) {


                $mail->to('benishk800@gmail.com')
                     ->subject('Daily Recruitment Report');


            });



        })->daily();


    }




    /**
     * Register the commands for the application.
     */
    protected function commands()
    {

        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');

    }

}
