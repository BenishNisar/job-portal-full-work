@extends("Layout.layouttwo")
@section("AdminContent")

<div class="content-body">
    <div class="container-fluid">

        <div class="d-flex align-items-stretch flex-wrap search-job mb-4 g-3">
            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <select class="form-control border-0 default-select dashboard-select-1 wide h-auto">
                    <option>Australia</option>
                </select>
            </div>

            <div class="col-12 col-md-6 col-lg-3 mb-3">
                <select class="form-control border-0 default-select dashboard-select-1 wide h-auto">
                    <option>Salary Range</option>
                    <option>0 to 5,000</option>
                    <option>5,000 to 10,000</option>
                    <option>10,000+</option>
                </select>
            </div>

            <div class="col-12 col-lg-6 mb-3">
                <div class="input-group search-box">
                    <input type="text" class="form-control" placeholder="Search job title here...">
                    <a href="javascript:void(0);" class="btn btn-primary btn-rounded">
                        Search <i class="flaticon-381-search-2 ms-2 d-inline-block"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-9">
                <div class="mt-3 d-flex justify-content-between align-items-center flex-wrap">
                    <div class="mb-4">
                        <h6 class="mb-2">Showing {{ $jobs->count() }} of {{ $jobs->total() }} Jobs Results</h6>
                        <p class="mb-0">Based on your preferences</p>
                    </div>

                    <div class="d-flex align-items-center mb-4 flex-wrap gap-2">
                        <div class="default-tab job-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#Boxed">
                                        <i class="fas fa-th-large"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#List1">
                                        <i class="fas fa-list"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <select class="default-select dashboard-select border-0">
                                <option data-display="Newest">Newest</option>
                                <option value="2">Oldest</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="tab-content">

                    <!-- Boxed View -->
                    <div class="tab-pane fade show active" id="Boxed" role="tabpanel">
                        <div class="row">
                            @forelse($jobs as $job)
                                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                                    <div class="card jobs2 h-100">
                                        <div class="card-body d-flex flex-column">
                                            <div class="text-center">
                                                <div class="icon-img-bx">
                                                    <svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="71" height="71" viewBox="0 0 71 71">
                                                        <rect width="71" height="71" rx="12" fill="#2769ee"></rect>
                                                        <circle cx="18" cy="18" r="18" transform="translate(15 20)" fill="#fff"></circle>
                                                        <circle cx="11" cy="11" r="11" transform="translate(36 15)" fill="#ffe70c" style="mix-blend-mode:multiply; isolation:isolate"></circle>
                                                    </svg>
                                                </div>

                                                <h5 class="mb-1">
                                                    <a href="{{ route('Dashboard.admin.jobs.view', $job->id) }}">
                                                        {{ $job->position }}
                                                    </a>
                                                </h5>
                                                <p class="text-primary mb-2 fs-13">{{ $job->company_name }}</p>
                                            </div>

                                            <div class="bottom-info pt-1 mt-auto">
                                                <p class="mb-0">
                                                    <i class="fas fa-map-marker-alt me-2"></i>
                                                    {{ $job->city ?? 'Australia' }}, {{ $job->country ?? 'Australia' }}
                                                </p>
                                                <p class="mb-0">
                                                    <i class="fas fa-comments-dollar me-2"></i>
                                                    $ {{ $job->salary_from ?? '0' }} - $ {{ $job->salary_to ?? '0' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-info">No jobs found.</div>
                                </div>
                            @endforelse
                        </div>

                        <div class="d-flex align-items-center justify-content-between flex-wrap mt-3">
                            <div class="mb-3 mb-sm-0">
                                <p class="mb-0 text-dark">
                                    Showing {{ $jobs->firstItem() ?? 0 }} to {{ $jobs->lastItem() ?? 0 }} of {{ $jobs->total() }} Data
                                </p>
                            </div>
                            <div>
                                {{ $jobs->links() }}
                            </div>
                        </div>
                    </div>

                    <!-- List View -->
                    <div class="tab-pane fade" id="List1">
                        <div class="row">
                            <div class="col-12">
                                @forelse($jobs as $job)
                                    <div class="d-flex flex-wrap search-row p-3 mb-3 rounded justify-content-between align-items-center">
                                        <div class="d-flex col-12 col-md-6 col-lg-3 align-items-center mb-3 mb-lg-0">
                                            <div class="icon-img-bx me-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 71 71">
                                                    <rect width="71" height="71" rx="12" fill="#2769ee"></rect>
                                                    <ellipse cx="17.75" cy="18" rx="17.75" ry="18" transform="translate(14.947 20)" fill="#fff"></ellipse>
                                                    <ellipse cx="10.743" cy="11" rx="10.743" ry="11" transform="translate(36.434 15)" fill="#ffe70c" style="mix-blend-mode:multiply; isolation:isolate"></ellipse>
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="title mb-1">
                                                    <a href="{{ route('Dashboard.admin.jobs.view', $job->id) }}" class="text-dark">
                                                        {{ $job->position }}
                                                    </a>
                                                </h2>
                                                <span class="text-primary fs-13">{{ $job->company_name }}</span>
                                            </div>
                                        </div>

                                        <div class="d-flex col-12 col-md-6 col-lg-3 align-items-center mb-3 mb-lg-0">
                                            <svg class="me-3 svg-ico" width="48" height="48" viewBox="0 0 54 54" fill="none">
                                                <rect width="54" height="54" rx="12" fill="#2BC155"></rect>
                                            </svg>
                                            <div>
                                                <h6 class="sub-title mb-1">$ {{ $job->salary_from ?? '0' }} - $ {{ $job->salary_to ?? '0' }}</h6>
                                                <span>Monthly Salary</span>
                                            </div>
                                        </div>

                                        <div class="d-flex col-12 col-md-6 col-lg-3 align-items-center mb-3 mb-lg-0">
                                            <svg class="me-3 svg-ico" width="48" height="48" viewBox="0 0 54 54" fill="none">
                                                <rect width="54" height="54" rx="12" fill="#FBA556"></rect>
                                            </svg>
                                            <div>
                                                <h6 class="sub-title mb-1">{{ $job->city ?? 'Australia' }}, {{ $job->country ?? 'Australia' }}</h6>
                                                <span>Location</span>
                                            </div>
                                        </div>

                                        <div class="text-lg-end text-start col-12 col-md-6 col-lg-2 mt-2 mt-lg-0">
                                            <a href="{{ route('Dashboard.admin.jobs.apply', $job->id) }}" class="btn btn-sm btn-outline-primary rounded me-2">
                                                Apply Now
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-info">No jobs found.</div>
                                @endforelse
                            </div>
                        </div>

                        <div class="mt-3">
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Preview -->
            <div class="col-12 col-xl-3 mt-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Job Preview</h4>
                </div>

                @if($featuredJob)
                    <div class="card">
                        <div class="card-header bg-blue"></div>
                        <div class="card-body">
                            <span class="text-center d-block block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="141" height="141" viewBox="0 0 141 141">
                                    <rect width="125" height="125" rx="12" fill="#2769ee"></rect>
                                    <ellipse cx="31.25" cy="31.69" rx="31.25" ry="31.69" transform="translate(34 43)" fill="#fff"></ellipse>
                                    <ellipse cx="18.914" cy="19.366" rx="18.914" ry="19.366" transform="translate(72 34)" fill="#ffe70c" style="mix-blend-mode:multiply; isolation:isolate"></ellipse>
                                </svg>
                            </span>

                            <h4 class="mb-1 mt-2 text-center">{{ $featuredJob->position }}</h4>
                            <span class="text-primary mb-3 d-block text-center">{{ $featuredJob->company_name }}</span>

                            {{-- <p class="fs-14">
                                {{ \Illuminate\Support\Str::limit(strip_tags($featuredJob->description), 120) }}
                            </p> --}}

                            <div class="location">
                                <span class="fs-14 font-w500 d-flex align-items-center mb-3">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    {{ $featuredJob->city ?? 'Australia' }}, {{ $featuredJob->country ?? 'Australia' }}
                                </span>
                                <span class="fs-14 font-w500 d-flex align-items-center">
                                    <i class="fas fa-comment-dollar me-2"></i>
                                    ${{ $featuredJob->salary_from ?? '0' }} - ${{ $featuredJob->salary_to ?? '0' }}
                                </span>
                            </div>
                        </div>

                        <div class="card-footer border-0 pt-0">
                            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                                <a href="{{ route('Dashboard.admin.jobs.apply', $featuredJob->id) }}" class="btn btn-primary btn-rounded">
                                    APPLY JOB
                                </a>
                                <a href="javascript:void(0);" class="btn btn-secondary btn-sm btn-rounded light">
                                    <i class="far fa-bookmark fs-20"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
