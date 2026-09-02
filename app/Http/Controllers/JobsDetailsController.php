<?php

namespace App\Http\Controllers;

use App\Models\Job;
// use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobsDetailsController extends Controller
{
    // Display job details
    public function show(Job $job)
    {
        if ((int) $job->status !== 1) {
            abort(404);
        }

        return view("Home.job-details", compact("job"));
    }

    // Handle job application submission
    // public function apply(Request $request, Job $job)
    // {
    //     // Ensure job is active
    //     if ((int) $job->status !== 1) {
    //         abort(404);
    //     }

    //     // Validate form input
    //     $validated = $request->validate([
    //         "first_name" => "required|string|max:255",
    //         "last_name" => "required|string|max:255",
    //         "email" => "required|email|max:255",
    //         "phone" => "nullable|string|max:50",
    //         "city" => "nullable|string|max:255",
    //         "message" => "nullable|string",
    //         "cv" => "nullable|file|mimes:pdf,doc,docx|max:5120", // Ensure valid file upload
    //     ]);

    //     // Handle file upload (CV)
    //     $cvPath = null;
    //     if ($request->hasFile("cv")) {
    //         $cvPath = $request->file("cv")->store("job-cvs", "public");
    //     }

    //     // Store application data in the database
    //     JobApplication::create([
    //         "job_id" => $job->id,
    //         "full_name" => trim($validated["first_name"] . " " . $validated["last_name"]),
    //         "email" => $validated["email"],
    //         "phone" => $validated["phone"] ?? null,
    //         "city" => $validated["city"] ?? null,
    //         "message" => $validated["message"] ?? null,
    //         "cv" => $cvPath,
    //         "status" => 0, // Pending status
    //     ]);

    //     // Return success message
    //     return back()
    //         ->with("success", "Application submitted successfully.")
    //         ->with("applied_job", $job->position);
    // }
}
