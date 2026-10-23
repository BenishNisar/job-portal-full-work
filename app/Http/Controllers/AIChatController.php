<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobApplication;
use Carbon\Carbon;

class AIChatController extends Controller
{

    public function ask(Request $request)
    {

        $question = strtolower($request->message);


        /*
        Total Jobs
        */

        if(str_contains($question,'how many jobs') ||
           str_contains($question,'total jobs') ||
           str_contains($question,'available jobs'))
        {

            $jobs = Job::where('status',1)->count();

            return response()->json([
                'message'=>"Currently {$jobs} active jobs are available."
            ]);

        }



        /*
        Applications
        */

        if(str_contains($question,'application') ||
           str_contains($question,'candidate'))
        {

            $applications = JobApplication::count();


            return response()->json([
                'message'=>"Total candidates applied: {$applications}"
            ]);

        }




        /*
        Today's Applications
        */

        if(str_contains($question,'today'))
        {

            $today = JobApplication::whereDate(
                'created_at',
                Carbon::today()
            )->count();


            return response()->json([
                'message'=>"Today's applications received: {$today}"
            ]);

        }





        /*
        Views
        */

        if(str_contains($question,'view'))
        {

            $views = Job::sum('views');


            return response()->json([
                'message'=>"Total job views: {$views}"
            ]);

        }





        /*
        Top Job
        */

        if(str_contains($question,'top') ||
           str_contains($question,'best') ||
           str_contains($question,'perform'))
        {


            $job = Job::withCount('applications')
                ->orderByDesc('applications_count')
                ->first();



            if($job)
            {

                return response()->json([

                    'message'=>
                    "Top performing job is {$job->position} with {$job->applications_count} applications."

                ]);

            }



        }





        /*
        Pending Applications
        */

        if(str_contains($question,'pending'))
        {

            $pending = JobApplication::where(
                'status',
                'pending'
            )->count();



            return response()->json([

                'message'=>"Pending applications: {$pending}"

            ]);

        }




        /*
        List Jobs
        */


        if(str_contains($question,'list') ||
           str_contains($question,'show jobs'))
        {


            $jobs = Job::where('status',1)
                ->pluck('position')
                ->implode(', ');



            return response()->json([

                'message'=>"Available jobs: ".$jobs

            ]);

        }




        return response()->json([

            'message'=>"Sorry, I could not understand. Please ask about jobs, applications, views or recruitment data."

        ]);


    }

}
