<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackendJobsController extends Controller
{

    public function index()
    {
        $jobs = Job::where('status', 1)
            ->latest()
            ->paginate(12);

        return view('Dashboard.admin.jobs.index', compact('jobs'));
    }


    public function list()
    {
        $jobs = Job::latest()
            ->paginate(10);

        return view('Dashboard.admin.jobs.list', compact('jobs'));
    }


    public function newJob()
    {
        return view('Dashboard.admin.jobs.new-job');
    }



    public function store(Request $request)
    {
        $validated = $request->validate([

            'position' => 'required|string|max:255',

            'job_category' => 'nullable|string|max:255',

            'job_type' => 'nullable|string|max:255',

            'vacancy' => 'nullable|string|max:50',

            'experience' => 'nullable|string|max:50',

            'posted_date' => 'nullable|date',

            'last_date_to_apply' => 'nullable|date',

            'close_date' => 'nullable|date',

            'gender' => 'nullable|string|max:50',

            'salary_from' => 'nullable|string|max:50',

            'salary_to' => 'nullable|string|max:50',

            'city' => 'nullable|string|max:255',

            'state' => 'nullable|string|max:255',

            'country' => 'nullable|string|max:255',

            'education_level' => 'nullable|string|max:255',

            'description' => 'required|string',

            'long_description' => 'required|string',

            'status' => 'required|in:0,1',

            'allow_application' => 'required|in:0,1',

        ]);


        $validated['approval_status'] = 'approved';


        Job::create($validated);


        return redirect()
            ->route('Dashboard.admin.jobs.list')
            ->with('success','Job added successfully.');
    }




    public function edit(Job $job)
    {
        return view(
            'Dashboard.admin.jobs.edit',
            compact('job')
        );
    }




    public function update(Request $request, Job $job)
    {

        $validated = $request->validate([

            'position' => 'required|string|max:255',

            'job_category' => 'nullable|string|max:255',

            'job_type' => 'nullable|string|max:255',

            'vacancy' => 'nullable|string|max:50',

            'experience' => 'nullable|string|max:50',

            'posted_date' => 'nullable|date',

            'last_date_to_apply' => 'nullable|date',

            'close_date' => 'nullable|date',

            'gender' => 'nullable|string|max:50',

            'salary_from' => 'nullable|string|max:50',

            'salary_to' => 'nullable|string|max:50',

            'city' => 'nullable|string|max:255',

            'state' => 'nullable|string|max:255',

            'country' => 'nullable|string|max:255',

            'education_level' => 'nullable|string|max:255',

            'description' => 'required|string',

            'long_description' => 'required|string',

            'status' => 'required|in:0,1',

            'allow_application' => 'required|in:0,1',

        ]);



        $job->update($validated);



        return redirect()
            ->route('Dashboard.admin.jobs.list')
            ->with('success','Job updated successfully.');

    }




    public function destroy(Job $job)
    {

        $job->delete();


        return redirect()
            ->route('Dashboard.admin.jobs.list')
            ->with('success','Job deleted successfully.');

    }





    public function viewJob(Job $job)
    {

        return view(
            'Dashboard.admin.jobs.view',
            compact('job')
        );

    }





    public function application()
    {

        $applications = JobApplication::with('job')
            ->latest()
            ->paginate(10);


        return view(
            'Dashboard.admin.jobs.application',
            compact('applications')
        );

    }





    public function deleteApplication(JobApplication $application)
    {

        if($application->cv)
        {
            Storage::disk('public')
                ->delete($application->cv);
        }


        $application->delete();


        return redirect()
            ->back()
            ->with('success','Application deleted successfully.');

    }





    public function applyJob()
    {

        $jobs = Job::latest()->get();


        return view(
            'Dashboard.admin.jobs.apply',
            compact('jobs')
        );

    }





    public function updateApprovalStatus(Request $request, Job $job)
    {

        $request->validate([

            'approval_status' =>
            'required|in:pending,approved,rejected'

        ]);



        $job->update([

            'approval_status' =>
            $request->approval_status

        ]);



        return redirect()
            ->back()
            ->with(
                'success',
                'Approval status updated successfully.'
            );

    }

}
