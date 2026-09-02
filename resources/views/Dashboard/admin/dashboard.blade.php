@extends("Layout.layouttwo")

@section("AdminContent")

<style>
    :root {
        --brand-primary: #638d3f;
        --brand-primary-hover: #517533;
        --brand-primary-light: #7ca954;
        --brand-primary-soft: rgba(99, 141, 63, 0.12);
        --brand-primary-glow: rgba(99, 141, 63, 0.22);
        --dark-card: #181d19;
        --text-dark: #1e293b;
        --text-muted: #64748b;
    }

    /* Professional Header Styling */
    .dashboard-header-bg {
        background: linear-gradient(135deg, #192218 0%, #253324 100%);
        border-radius: 16px;
        color: #ffffff;
        padding: 32px;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(99, 141, 63, 0.25);
    }

    .dashboard-header-bg::before {
        content: "";
        position: absolute;
        top: -60px;
        right: -60px;
        width: 220px;
        height: 220px;
        background: radial-gradient(circle, var(--brand-primary-glow) 0%, rgba(99, 141, 63, 0) 70%);
        border-radius: 50%;
        z-index: 1;
    }

    .text-brand-accent {
        color: #8ac05d !important;
    }

    /* Stat Cards */
    .stat-card {
        border: 1px solid rgba(0, 0, 0, 0.05);
        border-radius: 16px;
        background: #ffffff;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px var(--brand-primary-glow);
        border-color: rgba(99, 141, 63, 0.3);
    }

    .stat-card .card-body {
        padding: 26px 24px;
        position: relative;
        z-index: 2;
    }

    .stat-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        position: absolute;
        right: 24px;
        top: 24px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-rendering: optimizeLegibility;
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.08);
    }

    /* Professional Icon Gradients */
    .icon-brand    { background: linear-gradient(135deg, #638d3f, #82b554); color: #ffffff !important; }
    .icon-teal     { background: linear-gradient(135deg, #2b7a78, #3aafa9); color: #ffffff !important; }
    .icon-amber    { background: linear-gradient(135deg, #d97706, #f59e0b); color: #ffffff !important; }
    .icon-emerald  { background: linear-gradient(135deg, #059669, #10b981); color: #ffffff !important; }

    .stat-value {
        font-size: 2.3rem;
        font-weight: 800;
        color: var(--text-dark);
        line-height: 1.1;
        margin-bottom: 6px;
    }

    .stat-title {
        color: var(--text-muted);
        font-weight: 600;
        font-size: 0.88rem;
        text-transform: uppercase;
        letter-spacing: 0.6px;
    }

    /* Custom Tables */
    .custom-table-card {
        border-radius: 16px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(0, 0, 0, 0.05);
        background: #ffffff;
    }

    .custom-table-card .card-header {
        background-color: transparent;
        border-bottom: 1px solid #f1f5f9;
        padding: 20px 24px;
    }

    .custom-table-card .card-title {
        font-weight: 700;
        color: var(--text-dark);
        font-size: 1.1rem;
        margin: 0;
    }

    .table th {
        border-top: none;
        color: var(--text-muted);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.78rem;
        letter-spacing: 0.5px;
        padding: 14px 18px;
    }

    .table td {
        vertical-align: middle;
        font-weight: 500;
        color: #334155;
        padding: 16px 18px;
        border-bottom: 1px solid #f8fafc;
    }

    /* Action Buttons */
    .btn-outline-brand {
        color: var(--brand-primary);
        border: 1.5px solid var(--brand-primary);
        background: transparent;
        font-weight: 600;
        font-size: 0.82rem;
        transition: all 0.2s ease;
    }

    .btn-outline-brand:hover {
        background-color: var(--brand-primary);
        color: #ffffff !important;
        box-shadow: 0 4px 12px var(--brand-primary-glow);
    }

    /* Avatar Pill */
    .avatar-circle {
        background: var(--brand-primary-soft);
        color: var(--brand-primary);
        font-weight: 700;
    }

    /* Badges */
    .badge-status-approved {
        background-color: rgba(16, 185, 129, 0.12);
        color: #059669;
        border: 1px solid rgba(16, 185, 129, 0.25);
    }
    .badge-status-pending {
        background-color: rgba(245, 158, 11, 0.12);
        color: #d97706;
        border: 1px solid rgba(245, 158, 11, 0.25);
    }
    .badge-status-rejected {
        background-color: rgba(239, 68, 68, 0.12);
        color: #dc2626;
        border: 1px solid rgba(239, 68, 68, 0.25);
    }
</style>

<div class="content-body">
    <div class="container-fluid">

        <!-- Dashboard Hero Header -->
        <div class="dashboard-header-bg mb-4 shadow-sm">
            <div class="position-relative z-index-2">
                <h2 class="mb-1 fw-bold text-white">
                    Welcome back,
                    <span class="text-brand-accent">
                        {{ $user->firstname }}{{ $isAdmin ? ' (Admin)' : '' }}
                    </span> 👋
                </h2>
                @if($isCompany && isset($company))
                    <p class="mb-0 text-white-50 fs-6 mt-2">
                        <i class="fas fa-briefcase me-2 text-brand-accent"></i>{{ $company->industry ?? 'Company Dashboard' }} |
                        <i class="fas fa-map-marker-alt ms-2 me-1 text-brand-accent"></i>{{ $company->city ?? 'Location not set' }}
                    </p>
                @else
                    <p class="mb-0 text-white-50 fs-6 mt-2">Here is what's happening on your platform today.</p>
                @endif
            </div>
        </div>

        <!-- Admin View -->
        @if($isAdmin)
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-icon icon-teal shadow-sm">
                                <i class="fas fa-building"></i>
                            </div>
                            <div class="stat-value">{{ $totalCompanies }}</div>
                            <div class="stat-title">Total Companies</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-icon icon-brand shadow-sm">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="stat-value">{{ $totalJobs }}</div>
                            <div class="stat-title">Total Jobs</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-icon icon-amber shadow-sm">
                                <i class="fas fa-hourglass-half"></i>
                            </div>
                            <div class="stat-value">{{ $pendingJobs }}</div>
                            <div class="stat-title">Pending Jobs</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-icon icon-emerald shadow-sm">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="stat-value">{{ $totalApplications }}</div>
                            <div class="stat-title">Total Applications</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-xl-6">
                    <div class="card custom-table-card h-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Recent Jobs Posted</h4>
                            <a href="#" class="btn btn-sm btn-outline-brand rounded-pill px-3">View All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">Position</th>
                                            <th>Company</th>
                                            <th class="text-end pe-4">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentJobs as $job)
                                            <tr>
                                                <td class="ps-4 fw-bold text-dark">{{ $job->position }}</td>
                                                <td><i class="fas fa-building text-muted me-2 small"></i>{{ $job->company_name }}</td>
                                                <td class="text-end pe-4">
                                                    @php
                                                        $badgeClass = 'badge-status-pending';
                                                        if(strtolower($job->approval_status) == 'approved') $badgeClass = 'badge-status-approved';
                                                        if(strtolower($job->approval_status) == 'rejected') $badgeClass = 'badge-status-rejected';
                                                    @endphp
                                                    <span class="badge rounded-pill {{ $badgeClass }} px-3 py-2">{{ ucfirst($job->approval_status) }}</span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center py-4 text-muted">No recent jobs found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card custom-table-card h-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Recent Applications</h4>
                            <a href="#" class="btn btn-sm btn-outline-brand rounded-pill px-3">View All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">Candidate Name</th>
                                            <th>Email</th>
                                            <th class="text-end pe-4">Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentApplications as $app)
                                            <tr>
                                                <td class="ps-4 fw-bold text-dark">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-circle me-2 d-flex align-items-center justify-content-center rounded-circle" style="width: 36px; height: 36px; font-size: 14px;">
                                                            {{ strtoupper(substr($app->full_name ?? 'N', 0, 1)) }}
                                                        </div>
                                                        {{ $app->full_name ?? 'N/A' }}
                                                    </div>
                                                </td>
                                                <td><a href="mailto:{{ $app->email }}" class="text-decoration-none text-muted">{{ $app->email }}</a></td>
                                                <td class="text-end pe-4"><i class="fas fa-map-marker-alt text-muted me-1 small"></i>{{ $app->city }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center py-4 text-muted">No applications found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Company View -->
        @if($isCompany)
            <div class="row g-4 mb-4">
                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-icon icon-teal shadow-sm">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="stat-value">{{ $myJobs }}</div>
                            <div class="stat-title">My Posted Jobs</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-icon icon-emerald shadow-sm">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="stat-value">{{ $myApprovedJobs }}</div>
                            <div class="stat-title">Active / Approved</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-icon icon-amber shadow-sm">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="stat-value">{{ $myPendingJobs }}</div>
                            <div class="stat-title">Pending Approval</div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card stat-card">
                        <div class="card-body">
                            <div class="stat-icon icon-brand shadow-sm">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="stat-value">{{ $myApplications }}</div>
                            <div class="stat-title">Total Applicants</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-xl-6">
                    <div class="card custom-table-card h-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">My Recent Postings</h4>
                            <a href="#" class="btn btn-sm btn-outline-brand rounded-pill px-3">Post New Job</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">Job Title</th>
                                            <th>Date Posted</th>
                                            <th class="text-end pe-4">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentMyJobs as $job)
                                            <tr>
                                                <td class="ps-4 fw-bold text-dark">{{ $job->position }}</td>
                                                <td><i class="far fa-calendar-alt text-muted me-2 small"></i>{{ \Carbon\Carbon::parse($job->created_at)->format('d M Y') }}</td>
                                                <td class="text-end pe-4">
                                                    @php
                                                        $badgeClass = 'badge-status-pending';
                                                        if(strtolower($job->approval_status) == 'approved') $badgeClass = 'badge-status-approved';
                                                        if(strtolower($job->approval_status) == 'rejected') $badgeClass = 'badge-status-rejected';
                                                    @endphp
                                                    <span class="badge rounded-pill {{ $badgeClass }} px-3 py-2">{{ ucfirst($job->approval_status) }}</span>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center py-4 text-muted">You haven't posted any jobs yet.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card custom-table-card h-100">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Newest Applicants</h4>
                            <a href="#" class="btn btn-sm btn-outline-brand rounded-pill px-3">View All</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">Applicant Info</th>
                                            <th>Email</th>
                                            <th class="text-end pe-4">City</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentMyApplications as $app)
                                            <tr>
                                                <td class="ps-4 fw-bold text-dark">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-circle me-2 d-flex align-items-center justify-content-center rounded-circle" style="width: 36px; height: 36px; font-size: 14px;">
                                                            {{ strtoupper(substr($app->full_name ?? 'N', 0, 1)) }}
                                                        </div>
                                                        {{ $app->full_name ?? 'N/A' }}
                                                    </div>
                                                </td>
                                                <td><a href="mailto:{{ $app->email }}" class="text-decoration-none text-muted">{{ $app->email }}</a></td>
                                                <td class="text-end pe-4">{{ $app->city }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center py-4 text-muted">No applications received yet.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>

@endsection
