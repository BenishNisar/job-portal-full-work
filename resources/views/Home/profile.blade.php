@extends('Layout.layout')

@section('Content')
<style>
    :root {
        --primary-pink: #f43f5e;
        --light-pink: #fff1f2;
        --soft-gray: #f8fafc;
        --border-color: #e2e8f0;
        --text-muted-custom: #64748b;
    }

    body {
        background-color: var(--soft-gray);
        padding-top: 60px;
    }

    .profile-card {
        border: 1px solid #edf2f7;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        background: #fff;
        overflow: hidden;
    }

    .avatar-wrapper {
        position: relative;
        width: 120px;
        height: 120px;
        margin: 0 auto;
    }

    .avatar-large {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: linear-gradient(135deg, #3490dc, #6574cd);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 3rem;
        color: #fff;
        font-weight: bold;
        border: 4px solid #fff;
        box-shadow: 0 8px 20px rgba(0,0,0,0.10);
        object-fit: cover;
    }

    .avatar-edit-btn {
        position: absolute;
        bottom: 6px;
        right: 6px;
        background: #fff;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        color: var(--primary-pink);
        border: 1px solid #f1f5f9;
    }

    .stat-box {
        background: #fff;
        border-radius: 18px;
        padding: 18px;
        transition: 0.3s ease;
        border: 1px solid var(--border-color);
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.04);
        height: 100%;
    }

    .stat-box:hover {
        transform: translateY(-3px);
    }

    .icon-shape {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.15rem;
        flex-shrink: 0;
    }

    .nav-pills {
        gap: 10px;
        border-bottom: 1px solid #eef2f7;
        padding-bottom: 15px;
    }

    .nav-pills .nav-link {
        color: var(--text-muted-custom);
        font-weight: 600;
        border-radius: 12px;
        padding: 10px 18px;
        background: transparent !important;
        border: 1px solid transparent;
        transition: 0.2s ease;
    }

    .nav-pills .nav-link:hover {
        color: var(--primary-pink);
        border-color: #fbcfe8;
        background: #fff !important;
    }

    .nav-pills .nav-link.active {
        background: transparent !important;
        color: var(--primary-pink) !important;
        border: 1px solid #fda4af;
        box-shadow: none !important;
    }

    .btn-custom {
        background-color: var(--primary-pink);
        color: white;
        border-radius: 12px;
        padding: 10px 24px;
        border: none;
        font-weight: 600;
    }

    .btn-custom:hover {
        background-color: #e11d48;
        color: white;
    }

    .text-pink { color: var(--primary-pink); }
    .bg-pink-light { background-color: var(--light-pink); color: var(--primary-pink); }
    .bg-blue-light { background-color: #eff6ff; color: #3b82f6; }
    .bg-green-light { background-color: #f0fdf4; color: #22c55e; }

    .saved-job-card {
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        padding: 18px;
        background: #fff;
        transition: 0.3s ease;
        height: 100%;
    }

    .saved-job-card:hover {
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
        transform: translateY(-2px);
    }

    .saved-job-meta {
        font-size: 14px;
        color: #64748b;
    }

    .saved-job-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid #e2e8f0;
        color: #334155;
        background: #f8fafc;
    }

    .empty-state {
        border: 1px dashed #dbeafe;
        border-radius: 18px;
        background: #f8fbff;
    }
</style>

<section class="py-5">
    <div class="container">
        <div class="row g-4">

            <div class="col-lg-4">
                <div class="profile-card p-4 text-center">
                    <div class="avatar-wrapper mb-3">
                        @if($user && $user->profile_img)
                            <img src="{{ asset($user->profile_img) }}" class="avatar-large img-fluid">
                        @else
                            <div class="avatar-large">{{ strtoupper(substr($user->firstname ?? 'G', 0, 1)) }}</div>
                        @endif
                        <label class="avatar-edit-btn">
                            <i class="fas fa-camera"></i>
                        </label>
                    </div>

                    <h4 class="fw-bold mb-1">{{ $user->firstname ?? 'Guest' }} {{ $user->lastname ?? '' }}</h4>
                    <p class="text-muted small mb-3">
                        {{ $user->role->role_name ?? 'User' }}
                    </p>

                    <div class="my-4 text-start">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="small fw-bold">Profile Strength</span>
                            <span class="small fw-bold text-pink">85%</span>
                        </div>
                        <div class="progress" style="height: 7px;">
                            <div class="progress-bar bg-danger" style="width: 85%"></div>
                        </div>
                    </div>

                    {{-- <div class="d-grid mb-4">
                        <button class="btn btn-outline-dark rounded-pill">
                            <i class="fas fa-download me-2"></i>Download Resume
                        </button>
                    </div> --}}

                    <hr>

                    <div class="text-start">
                        <p class="small mb-2">
                            <i class="fas fa-envelope me-3 text-pink"></i>{{ $user->email ?? 'n/a' }}
                        </p>
                        <p class="small mb-2">
                            <i class="fas fa-phone-alt me-3 text-pink"></i>{{ $user->phone ?? 'N A' }}
                        </p>
                        <p class="small mb-0">
                            <i class="fas fa-map-marker-alt me-3 text-pink"></i>{{ $user->city ?? 'Karachi' }}, {{ $user->country ?? 'PK' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="stat-box d-flex align-items-center">
                            <div class="icon-shape bg-blue-light me-3">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">{{ $appliedJobsCount }}</h5>
                                <small class="text-muted">Applied Jobs</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stat-box d-flex align-items-center">
                            <div class="icon-shape bg-pink-light me-3">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">{{ $savedJobsCount }}</h5>
                                <small class="text-muted">Saved Jobs</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="stat-box d-flex align-items-center">
                            <div class="icon-shape bg-green-light me-3">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">{{ $interviewsCount }}</h5>
                                <small class="text-muted">Interviews</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-card p-4">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#overview" type="button">
                                Overview
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#saved-jobs" type="button">
                                Saved Jobs
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#edit-profile" type="button">
                                Edit Profile
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="overview">
                            <h5 class="fw-bold mb-3">Profile Summary</h5>
                            <p class="text-muted">
                                {{ $user->organization ?? 'Profile information not added yet.' }}
                            </p>

                            <h5 class="fw-bold mt-4 mb-3">Recent Activity</h5>

                            @if($savedJobs->count())
                                @php $latestSaved = $savedJobs->first(); @endphp
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center border-0 border-bottom">
                                        <div>
                                            <h6 class="mb-1 fw-bold">{{ $latestSaved->job->position ?? 'Saved Job' }}</h6>
                                            <small class="text-muted">
                                                {{ $latestSaved->job->company_name ?? 'Company' }} • Saved recently
                                            </small>
                                        </div>
                                        <span class="saved-job-badge">Saved</span>
                                    </div>
                                </div>
                            @else
                                <p class="text-muted mb-0">No recent activity yet.</p>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="saved-jobs">
                            <h5 class="fw-bold mb-3">Your Saved Jobs</h5>

                            @if($savedJobs->count())
                                <div class="row g-3">
                                    @foreach($savedJobs as $saved)
                                        @if($saved->job)
                                            <div class="col-md-6">
                                                <div class="saved-job-card">
                                                    <h6 class="fw-bold mb-2">{{ $saved->job->position }}</h6>
                                                    <p class="saved-job-meta mb-2">
                                                        <i class="fas fa-building me-2"></i>{{ $saved->job->company_name ?? 'Company' }}
                                                    </p>

                                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                                        <span class="saved-job-badge">{{ $saved->job->job_type ?? 'Full Time' }}</span>
                                                        <span class="saved-job-badge">
                                                            {{ $saved->job->city ?? 'Location not specified' }}
                                                        </span>
                                                    </div>

                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('Home.jobs-details', ['job' => $saved->job->slug]) }}"
                                                           class="btn btn-outline-dark rounded-pill btn-sm flex-grow-1">
                                                            View Job
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="empty-state p-5 text-center">
                                    <i class="fas fa-heart text-pink fa-3x mb-3"></i>
                                    <h6 class="fw-bold">No saved jobs yet</h6>
                                    <p class="text-muted mb-0">Jobs that you save from the vacancies page will appear here.</p>
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="edit-profile">
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">First Name</label>
                                        <input type="text" class="form-control" name="firstname" value="{{ $user->firstname ?? '' }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" value="{{ $user->lastname ?? '' }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email ?? '' }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone ?? '' }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">City</label>
                                        <input type="text" class="form-control" name="city" value="{{ $user->city ?? '' }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Country</label>
                                        <input type="text" class="form-control" name="country" value="{{ $user->country ?? '' }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label small fw-bold">Organization</label>
                                        <input type="text" class="form-control" name="organization" value="{{ $user->organization ?? '' }}">
                                    </div>

                                    <div class="col-12 mt-4">
                                        <button class="btn btn-custom">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
