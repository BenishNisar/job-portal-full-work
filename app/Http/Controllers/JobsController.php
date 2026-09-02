<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationSubmitted;
use Illuminate\Support\Facades\Log;
use App\Models\SavedJob;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{


    public function index(Request $request)
    {
        $query = Job::query()->where("status", 1);


        if ($request->filled("q")) {

            $q = trim($request->q);

            $query->where(function ($s) use ($q) {

                $s->where("position", "like", "%{$q}%")
                    ->orWhere("job_category", "like", "%{$q}%")
                    ->orWhere("job_type", "like", "%{$q}%")
                    ->orWhere("description", "like", "%{$q}%")
                    ->orWhere("city", "like", "%{$q}%")
                    ->orWhere("state", "like", "%{$q}%")
                    ->orWhere("country", "like", "%{$q}%");

            });
        }



        if ($request->filled("location")) {

            $location = trim($request->location);

            $query->where(function ($s) use ($location) {

                $s->where("city", "like", "%{$location}%")
                    ->orWhere("state", "like", "%{$location}%")
                    ->orWhere("country", "like", "%{$location}%");

            });
        }



        if ($request->filled("sector")) {

            $sector = trim($request->sector);

            $query->where("job_category", $sector);

        }



        $single = (clone $query)
            ->select("id", "slug", "status")
            ->first();



        $count = (clone $query)->count();



        if ($count === 1 && $single && !empty($single->slug)) {

            return redirect()->route(
                "Home.jobs-details",
                $single->slug
            );

        }



        $jobs = $query
            ->orderByDesc("posted_date")
            ->paginate(10)
            ->withQueryString();



        return view("Home.jobs", compact("jobs"));
    }





    public function store(Request $request, Job $job)
    {


        // Check application permission
        if ((int)$job->allow_application !== 1) {

            return response()->json([
                'success' => false,
                'message' => 'Applications are closed for this job.'
            ], 403);

        }



        $messages = [

            'full_name.required' => 'Please fill in your full name.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'phone.required' => 'Phone number is required.',
            'city.required' => 'City name is required.',
            'cv.required' => 'Please upload your CV.',
            'cv.mimes' => 'Only PDF, DOC, or DOCX files are allowed.',
            'cv.max' => 'File size cannot exceed 2MB.',

        ];



        $validated = $request->validate([

            'full_name' => 'required|string|max:255',

            'email' => 'required|email|max:255',

            'phone' => 'required|string|max:50',

            'city' => 'required|string|max:255',

            'message' => 'nullable|string',

            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',

        ], $messages);




        $cvPath = null;


        if ($request->hasFile('cv')) {

            $cvPath = $request->file('cv')
                ->store('job-cvs', 'public');

        }




        $application = JobApplication::create([

            'job_id' => $job->id,

            'full_name' => $validated['full_name'],

            'email' => $validated['email'],

            'phone' => $validated['phone'],

            'city' => $validated['city'],

            'message' => $validated['message'] ?? null,

            'cv' => $cvPath,

            'status' => 0,

        ]);




        // try {

        //     Mail::to('your-email@gmail.com')
        //         ->send(new JobApplicationSubmitted($application, $job));


        // } catch (\Exception $e) {

        //     Log::error(
        //         'Job application email failed: '.$e->getMessage()
        //     );

        // }

try {

    Mail::to('aapki-email@gmail.com')
        ->send(new JobApplicationSubmitted($application, $job));

} catch (\Exception $e) {

    Log::error(
        'Job application email failed: '.$e->getMessage()
    );

}


        return response()->json([

            'success' => true,

            'message' => 'Your application was submitted successfully!',

            'job_title' => $job->position,

        ]);

    }





    public function show(Job $job)
    {

        if ((int)$job->status !== 1) {

            abort(404);

        }


        return view(
            "Home.job-details",
            compact("job")
        );

    }





    public function toggleSave(Job $job)
    {

        if (!Auth::check()) {

            return response()->json([

                'success' => false,

                'message' => 'Please login first.'

            ],401);

        }



        $saved = SavedJob::where('user_id', Auth::id())
            ->where('job_id',$job->id)
            ->first();



        if ($saved) {

            $saved->delete();


            return response()->json([

                'success'=>true,

                'saved'=>false,

                'message'=>'Job removed from saved jobs.'

            ]);

        }



        SavedJob::create([

            'user_id'=>Auth::id(),

            'job_id'=>$job->id

        ]);



        return response()->json([

            'success'=>true,

            'saved'=>true,

            'message'=>'Job saved successfully.'

        ]);

    }


}
