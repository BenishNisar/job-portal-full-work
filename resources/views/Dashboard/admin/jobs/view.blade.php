@extends("Layout.layouttwo")
@section("AdminContent")
            <div class="content-body">

<div class="container-fluid">
    <div class="d-flex align-items-center mb-4 flex-wrap">
        <h3 class="me-auto">Job View</h3>
        <div>
            <a href="{{ route('Dashboard.admin.jobs.new-job') }}" class="btn btn-primary me-3">
                <i class="fas fa-plus me-2"></i>Add New Job
            </a>
            <a href="javascript:void(0);" class="icon-btn me-3"> <i class="fas fa-envelope"></i></a>
            <a href="javascript:void(0);" class="icon-btn me-3"><i class="fas fa-phone-alt"></i></a>
            <a href="javascript:void(0);" class="icon-btn"><i class="fas fa-info"></i></a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-xxl-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h4 class="card-title mb-0">Overview</h4>
                        </div>

                        <div class="card-body pt-3">
                            <ul class="list-style-1">
                                <li>
                                    <label class="form-label mb-0 custom-label">Job Title:</label>
                                    <p class="mb-0">{{ $job->position ?? 'N A' }}</p>
                                </li>
                                <li>
                                    <label class="form-label mb-0 custom-label">Experience:</label>
                                    <p class="mb-0">{{ $job->experience ?? 'N A' }}</p>
                                </li>
                                <li>
                                    <label class="form-label mb-0 custom-label">Vacancy:</label>
                                    <p class="mb-0">{{ $job->vacancy ?? 'N A' }}</p>
                                </li>
                                <li>
                                    <label class="form-label mb-0 custom-label">Job Type:</label>
                                    <p class="mb-0">{{ $job->job_type ?? 'N A' }}</p>
                                </li>
                                <li>
                                    <label class="form-label mb-0 custom-label">Posted Date:</label>
                                    <p class="mb-0">
                                        {{ $job->posted_date ? \Carbon\Carbon::parse($job->posted_date)->format('d-m-Y') : 'N A' }}
                                    </p>
                                </li>
                                <li>
                                    <label class="form-label mb-0 custom-label">Last Apply Date:</label>
                                    <p class="mb-0">
                                        {{ $job->last_date_to_apply ? \Carbon\Carbon::parse($job->last_date_to_apply)->format('d-m-Y') : 'N A' }}
                                    </p>
                                </li>
                                <li>
                                    <label class="form-label mb-0 custom-label">Closed Date:</label>
                                    <p class="mb-0">
                                        {{ $job->close_date ? \Carbon\Carbon::parse($job->close_date)->format('d-m-Y') : 'N A' }}
                                    </p>
                                </li>
                                <li>
                                    <label class="form-label mb-0 custom-label">Status:</label>
                                    <p class="mb-0">
                                        @if($job->status == 1)
                                            <span class="badge badge-success badge-lg light">Active</span>
                                        @else
                                            <span class="badge badge-danger badge-lg light">In Active</span>
                                        @endif
                                    </p>
                                </li>
                            </ul>
                        </div>

                        <div class="card-footer border-0 pt-0 ">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('Dashboard.admin.jobs.apply') }}" class="btn btn-primary btn-sm btn-block mb-3 me-3">
                                    <i class="fas fa-check me-2"></i>Apply Now
                                </a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary btn-sm btn-block mb-3">
                                    <i class="fas fa-phone-volume me-2"></i>Contact Now
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-xxl-8">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-block">
                            <h4 class="card-title mb-2">{{ $job->position ?? 'N A' }}</h4>
                            <div class="d-block">
                                {{-- <span class="me-2 d-inline-block">
                                    <a href="javascript:void(0);">
                                        <i class="text-primary fas fa-briefcase me-2"></i>{{ $job->company_name ?? 'N A' }}
                                    </a>
                                </span> --}}
                                <span class="me-2 d-inline-block">
                                    <a href="javascript:void(0);">
                                        <i class="text-primary fas fa-map-marker-alt me-2"></i>{{ $job->country ?? 'N A' }}
                                    </a>
                                </span>
                                <span class="d-inline-block">
                                    <a href="javascript:void(0);">
                                        <i class="text-primary fas fa-eye me-2"></i>View
                                    </a>
                                </span>
                            </div>
                        </div>

                        <div class="card-body pb-0">
                            <h4 class="card-title mb-3">Short Description</h4>
                            <div>
                                {!! $job->description ? $job->description : 'N A' !!}
                            </div>

                            <hr>

                            <h4 class="card-title mb-3">Long Description</h4>
                            <div>
                                {!! $job->long_description ? $job->long_description : 'N A' !!}
                            </div>

                            <hr>

                            <h4 class="card-title mb-3">Job Details</h4>
                            <div class="row mb-3">
                                <div class="col-xl-6">
                                    <ul class="list-style-1">
                                        <li><label class="form-label mb-0 custom-label">Job Role :</label><p class="mb-0">{{ $job->position ?? 'N A' }}</p></li>
                                        <li><label class="form-label mb-0 custom-label">Job Category:</label><p class="mb-0">{{ $job->job_category ?? 'N A' }}</p></li>
                                        <li><label class="form-label mb-0 custom-label">Min Salary:</label><p class="mb-0">{{ $job->salary_from ? '$'.$job->salary_from : 'N A' }}</p></li>
                                        <li><label class="form-label mb-0 custom-label">Max Salary:</label><p class="mb-0">{{ $job->salary_to ? '$'.$job->salary_to : 'N A' }}</p></li>
                                        <li><label class="form-label mb-0 custom-label">Gender:</label><p class="mb-0">{{ $job->gender ?? 'N A' }}</p></li>
                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    <ul class="list-style-1">
                                        <li><label class="form-label mb-0 custom-label">Job Experience:</label><p class="mb-0">{{ $job->experience ?? 'N A' }}</p></li>
                                        <li><label class="form-label mb-0 custom-label">City:</label><p class="mb-0">{{ $job->city ?? 'N A' }}</p></li>
                                        <li><label class="form-label mb-0 custom-label">State:</label><p class="mb-0">{{ $job->state ?? 'N A' }}</p></li>
                                        <li><label class="form-label mb-0 custom-label">Eligibility:</label><p class="mb-0">{{ $job->education_level ?? 'N A' }}</p></li>
                                        <li><label class="form-label mb-0 custom-label">Company :</label><p class="mb-0">{{ $job->company_name ?? 'N A' }}</p></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between py-4 border-bottom flex-wrap">
                                <span>Job ID: #{{ $job->id }}</span>
                                <span>
                                    Posted By <strong>{{ $job->company_name ?? 'Company' }}</strong>
                                    {{ $job->created_at ? '/ '.$job->created_at->format('d-m-Y') : '' }}
                                </span>
                            </div>
                        </div>

                        <div class="card-footer border-0">
                            <div>
  <a href="{{ route('Dashboard.admin.jobs.apply') }}" class="btn btn-primary me-2 mb-1">
    <i class="far fa-check-circle me-2"></i>Apply
</a>


                                <a href="javascript:void(0);" class="btn btn-warning me-2 mb-1">
                                    <i class="fas fa-share-alt me-2"></i>Share Job
                                </a>
                                <a href="javascript:void(0);" class="btn btn-secondary mb-1" onclick="window.print()">
                                    <i class="fas fa-print me-2"></i>Print
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
