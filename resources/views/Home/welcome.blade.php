@extends("Layout.layout")
@section("Content")

<header class="hero-modern-section">
    <div class="container position-relative z-2">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-md-10 col-12">

                <!-- Small Tagline Badge -->
                <div class="hero-badge mb-3">
                    <span class="badge-dot"></span> Exclusive Staffing Platform
                </div>

                <!-- Modern Typography Heading -->
                <h1 class="hero-main-title mb-3">
                    Finding the <span class="text-brand-green">Right Fit</span> for Your Future.
                </h1>

                <p class="hero-main-subtitle mb-5">
                    Browse direct, admin-curated vacancies designed for your professional journey.
                </p>

                <!-- Backend Form Unchanged & Responsive -->
                <form action="{{ route('Home.jobs') }}" method="GET" class="modern-search-bar shadow-lg">

                    <div class="search-input-group">
                        <i class="fas fa-search"></i>
                        <input type="text" name="q" class="form-control border-0 shadow-none bg-transparent"
                               placeholder="Job title, keyword..." value="{{ request('q') }}">
                    </div>

                    <div class="search-divider d-none d-md-block"></div>

                    <div class="search-input-group">
                        <i class="fas fa-map-marker-alt"></i>
                        <input type="text" name="location" class="form-control border-0 shadow-none bg-transparent"
                               placeholder="Location" value="{{ request('location') }}">
                    </div>

                    <button type="submit" class="btn btn-modern-submit">
                        Search Jobs
                    </button>
                </form>

                <!-- Trust Text -->
                <div class="mt-4 text-light small fw-medium">
                    <i class="fas fa-check-circle text-brand-green me-1"></i> Live active vacancies updated regularly by management
                </div>

            </div>
        </div>
    </div>
</header>
{{-- header finish --}}

{{-- section about us --}}
{{-- section about us (New Modern Design) --}}
<section class="about-modern-section py-5">
    <div class="container py-lg-4">
        <div class="row align-items-center g-5">

            <!-- Left Side: Sleek Image & Floating Badge Card -->
            <div class="col-lg-6">
                <div class="about-image-wrapper position-relative">
                    <div class="main-img-box rounded-4 overflow-hidden shadow-lg">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&q=80" alt="Direct Staffing Workspace" class="w-100 object-fit-cover" style="height: 420px;">
                    </div>
                    <!-- Floating Experience Card -->
                    <div class="floating-badge-card bg-white p-4 rounded-4 shadow-sm border border-slate-100">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-circle rounded-circle d-flex align-items-center justify-content-center text-white" style="width: 50px; height: 50px; background-color: var(--sparrow-green);">
                                <i class="fas fa-check fs-5"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-0 text-dark" style="color: var(--sparrow-dark);">100% Verified</h4>
                                <p class="text-muted small mb-0">Admin Curated Roles</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Content & Features -->
            <div class="col-lg-6">
                <div class="about-content-area ps-lg-4">

                    <span class="badge mb-3 px-3 py-2 rounded-pill fw-bold" style="background-color: rgba(99, 141, 63, 0.1); color: var(--sparrow-green); font-size: 0.85rem;">
                        Who We Are
                    </span>

                    <h2 class="fw-bold display-6 mb-4" style="color: var(--sparrow-dark); line-height: 1.25;">
                        Connecting Elite Talent with <span style="color: var(--sparrow-green);">Top Opportunities.</span>
                    </h2>

                    <p class="text-muted lead fs-6 mb-4" style="line-height: 1.7;">
                        Sparrow Sharp is a premier direct staffing platform. We bypass the noise to deliver curated, high-impact career opportunities managed strictly by professional administration.
                    </p>

                    <!-- Feature Bullet Points -->
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check-circle" style="color: var(--sparrow-green);"></i>
                                <span class="fw-semibold" style="color: var(--sparrow-dark); font-size: 0.95rem;">Direct Placement</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check-circle" style="color: var(--sparrow-green);"></i>
                                <span class="fw-semibold" style="color: var(--sparrow-dark); font-size: 0.95rem;">Verified Companies</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check-circle" style="color: var(--sparrow-green);"></i>
                                <span class="fw-semibold" style="color: var(--sparrow-dark); font-size: 0.95rem;">Secure & Transparent</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-check-circle" style="color: var(--sparrow-green);"></i>
                                <span class="fw-semibold" style="color: var(--sparrow-dark); font-size: 0.95rem;">Active Management</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <a href="{{ asset('/about') }}" class="btn btn-custom rounded-pill px-5 py-3 fw-bold shadow-sm">
                        Discover Our Agency <i class="fas fa-arrow-right ms-2"></i>
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>
{{-- end section about us --}}
{{-- section about us --}}


{{-- logo --}}
<section class="sectors-stream py-5 position-relative overflow-hidden">
    <div class="stream-glow"></div>

    <div class="container text-center mb-5 position-relative z-2">
        <span class="badge bg-white text-pink shadow-sm px-3 py-2 rounded-pill fw-bold ls-1 mb-3">
            <i class="fas fa-bolt me-2"></i>TRENDING INDUSTRIES
        </span>
        <h2 class="display-5 fw-bold text-dark-blue">
            Opportunities across <span class="text-pink text-gradient">Global Sectors</span>
        </h2>
    </div>

    <div class="stream-wrapper">
        <div class="stream-fade-left"></div>
        <div class="stream-fade-right"></div>

        <div class="stream-track">

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-laptop-code"></i></div>
                <div class="card-info">
                    <h5>Technology</h5>
                    <span>1,200+ Jobs</span>
                </div>
            </div>

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-chart-pie"></i></div>
                <div class="card-info">
                    <h5>Finance</h5>
                    <span>850+ Jobs</span>
                </div>
            </div>

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-heartbeat"></i></div>
                <div class="card-info">
                    <h5>Healthcare</h5>
                    <span>2,000+ Jobs</span>
                </div>
            </div>

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-hard-hat"></i></div>
                <div class="card-info">
                    <h5>Construction</h5>
                    <span>500+ Jobs</span>
                </div>
            </div>

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-bullhorn"></i></div>
                <div class="card-info">
                    <h5>Marketing</h5>
                    <span>340+ Jobs</span>
                </div>
            </div>

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-graduation-cap"></i></div>
                <div class="card-info">
                    <h5>Education</h5>
                    <span>600+ Jobs</span>
                </div>
            </div>

             <div class="stream-card">
                <div class="card-icon"><i class="fas fa-laptop-code"></i></div>
                <div class="card-info">
                    <h5>Technology</h5>
                    <span>1,200+ Jobs</span>
                </div>
            </div>

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-chart-pie"></i></div>
                <div class="card-info">
                    <h5>Finance</h5>
                    <span>850+ Jobs</span>
                </div>
            </div>

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-heartbeat"></i></div>
                <div class="card-info">
                    <h5>Healthcare</h5>
                    <span>2,000+ Jobs</span>
                </div>
            </div>

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-hard-hat"></i></div>
                <div class="card-info">
                    <h5>Construction</h5>
                    <span>500+ Jobs</span>
                </div>
            </div>

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-bullhorn"></i></div>
                <div class="card-info">
                    <h5>Marketing</h5>
                    <span>340+ Jobs</span>
                </div>
            </div>

            <div class="stream-card">
                <div class="card-icon"><i class="fas fa-graduation-cap"></i></div>
                <div class="card-info">
                    <h5>Education</h5>
                    <span>600+ Jobs</span>
                </div>
            </div>

        </div>
    </div>
</section>
{{-- logo --}}


{{-- featured jobs --}}
{{-- <section class="featured-jobs py-5 bg-white position-relative">
    <div class="container py-4">

        <div class="row align-items-end mb-5">
            <div class="col-lg-8">
                <span class="badge bg-pink-light text-pink px-3 py-2 rounded-pill fw-bold ls-1 mb-2">
                    <i class="fas fa-star me-2"></i>TOP OPPORTUNITIES
                </span>
                <h2 class="display-5 fw-bold text-dark-blue">
                    Latest <span class="text-pink">Featured Jobs</span>
                </h2>
                <p class="text-muted lead mb-0">Hand-picked jobs from top companies.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="#" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold">View All Jobs <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6">
                <div class="job-card h-100">
                    <div class="card-top">
                        <div class="d-flex align-items-center gap-3">
                            <div class="company-logo">
                                <i class="fab fa-google text-primary fs-3"></i>
                            </div>
                            <div>
                                <h5 class="job-title mb-1">Senior UI/UX Designer</h5>
                                <p class="company-name mb-0">Google Inc. <i class="fas fa-check-circle text-primary small"></i></p>
                            </div>
                        </div>
                        <button class="bookmark-btn"><i class="far fa-bookmark"></i></button>
                    </div>

                    <div class="card-body px-0 pt-3">
                        <div class="job-tags">
                            <span><i class="fas fa-map-marker-alt"></i> NY, USA</span>
                            <span><i class="fas fa-wallet"></i> $150k</span>
                            <span class="badge-tag tag-urgent"><i class="fas fa-bolt me-1"></i>Urgent</span>
                        </div>
                    </div>

                    <div class="card-footer-custom">
                        <div class="posted-time">
                            <i class="far fa-clock me-1"></i> 2 hours ago
                        </div>
                        <a href="#" class="btn btn-apply">Apply Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="job-card h-100 highlight-border">
                    <div class="card-top">
                        <div class="d-flex align-items-center gap-3">
                            <div class="company-logo">
                                <i class="fab fa-spotify text-success fs-3"></i>
                            </div>
                            <div>
                                <h5 class="job-title mb-1">Product Manager</h5>
                                <p class="company-name mb-0">Spotify <i class="fas fa-check-circle text-primary small"></i></p>
                            </div>
                        </div>
                        <button class="bookmark-btn"><i class="far fa-bookmark"></i></button>
                    </div>

                    <div class="card-body px-0 pt-3">
                        <div class="job-tags">
                            <span><i class="fas fa-clock"></i> Contract</span>
                            <span><i class="fas fa-wallet"></i> $110k</span>
                            <span class="badge-tag tag-remote"><i class="fas fa-wifi me-1"></i>Remote</span>
                        </div>
                    </div>

                    <div class="card-footer-custom">
                        <div class="posted-time">
                            <i class="far fa-clock me-1"></i> 5 hours ago
                        </div>
                        <a href="#" class="btn btn-apply">Apply Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="job-card h-100">
                    <div class="card-top">
                        <div class="d-flex align-items-center gap-3">
                            <div class="company-logo">
                                <i class="fab fa-amazon text-warning fs-3"></i>
                            </div>
                            <div>
                                <h5 class="job-title mb-1">Software Engineer</h5>
                                <p class="company-name mb-0">Amazon <i class="fas fa-check-circle text-primary small"></i></p>
                            </div>
                        </div>
                        <button class="bookmark-btn"><i class="far fa-bookmark"></i></button>
                    </div>

                    <div class="card-body px-0 pt-3">
                        <div class="job-tags">
                            <span><i class="fas fa-map-marker-alt"></i> Seattle</span>
                            <span><i class="fas fa-clock"></i> Full Time</span>
                            <span><i class="fas fa-wallet"></i> $180k</span>
                        </div>
                    </div>

                    <div class="card-footer-custom">
                        <div class="posted-time">
                            <i class="far fa-clock me-1"></i> 1 day ago
                        </div>
                        <a href="#" class="btn btn-apply">Apply Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="job-card h-100">
                    <div class="card-top">
                        <div class="d-flex align-items-center gap-3">
                            <div class="company-logo">
                                <i class="fab fa-apple text-dark fs-3"></i>
                            </div>
                            <div>
                                <h5 class="job-title mb-1">iOS Developer</h5>
                                <p class="company-name mb-0">Apple <i class="fas fa-check-circle text-primary small"></i></p>
                            </div>
                        </div>
                        <button class="bookmark-btn"><i class="far fa-bookmark"></i></button>
                    </div>

                    <div class="card-body px-0 pt-3">
                        <div class="job-tags">
                            <span><i class="fas fa-map-marker-alt"></i> California</span>
                            <span><i class="fas fa-clock"></i> Full Time</span>
                            <span><i class="fas fa-wallet"></i> $130k+</span>
                        </div>
                    </div>

                    <div class="card-footer-custom">
                        <div class="posted-time">
                            <i class="far fa-clock me-1"></i> 2 days ago
                        </div>
                        <a href="#" class="btn btn-apply">Apply Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="job-card h-100">
                    <div class="card-top">
                        <div class="d-flex align-items-center gap-3">
                            <div class="company-logo">
                                <i class="fab fa-figma text-danger fs-3"></i>
                            </div>
                            <div>
                                <h5 class="job-title mb-1">Brand Designer</h5>
                                <p class="company-name mb-0">Figma <i class="fas fa-check-circle text-primary small"></i></p>
                            </div>
                        </div>
                        <button class="bookmark-btn"><i class="far fa-bookmark"></i></button>
                    </div>

                    <div class="card-body px-0 pt-3">
                        <div class="job-tags">
                            <span><i class="fas fa-clock"></i> Part Time</span>
                            <span><i class="fas fa-wallet"></i> $60/hr</span>
                            <span class="badge-tag tag-hot"><i class="fas fa-fire me-1"></i>Hot</span>
                        </div>
                    </div>

                    <div class="card-footer-custom">
                        <div class="posted-time">
                            <i class="far fa-clock me-1"></i> 3 days ago
                        </div>
                        <a href="#" class="btn btn-apply">Apply Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="job-card h-100 bg-dark-blue text-white border-0 position-relative overflow-hidden d-flex flex-column justify-content-center align-items-center text-center">
                    <div class="position-relative z-2">
                        <div class="icon-box mb-3 bg-white text-pink rounded-circle mx-auto shadow-sm" style="width: 60px; height: 60px; display:grid; place-items:center; font-size:1.5rem;">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3 class="fw-bold mb-2">Hiring?</h3>
                        <p class="text-white-50 mb-4">Post a job and find top talent in minutes.</p>
                        <a href="#" class="btn btn-custom w-100 rounded-pill fw-bold">Post a Job</a>
                    </div>
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-blob-2" style="opacity: 0.1;"></div>
                </div>
            </div>

        </div>
    </div>
</section> --}}


{{-- featured jobs --}}

{{-- <section class="featured-jobs py-5 bg-white position-relative">
    <div class="container py-4">

        <div class="row align-items-end mb-5">
            <div class="col-lg-8">
                <span class="badge bg-pink-light text-pink px-3 py-2 rounded-pill fw-bold ls-1 mb-2">
                    <i class="fas fa-star me-2"></i>TOP OPPORTUNITIES
                </span>
                <h2 class="display-5 fw-bold text-dark-blue">
                    Latest <span class="text-pink">Featured Jobs</span>
                </h2>
                <p class="text-muted lead mb-0">Hand-picked jobs from top companies.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('Home.jobs') }}" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold">
                    View All Jobs <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>

        <div class="row g-4">

            @forelse($featuredJobs as $job)
                <div class="col-lg-4 col-md-6">
                    <div class="job-card h-100">
                        <div class="card-top">
                            <div class="d-flex align-items-center gap-3">
                                <div class="company-logo">
                                    <i class="fas fa-briefcase text-primary fs-3"></i>
                                </div>
                                <div>
                                    <h5 class="job-title mb-1">{{ $job->position }}</h5>
                                    <p class="company-name mb-0">
                                        {{ $job->company_name }}
                                        <i class="fas fa-check-circle text-primary small"></i>
                                    </p>
                                </div>
                            </div>

                            <button class="bookmark-btn">
                                <i class="far fa-bookmark"></i>
                            </button>
                        </div>

                        <div class="card-body px-0 pt-3">
                            <div class="job-tags">
                                @if($job->city || $job->country)
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ trim(($job->city ?? '') . ', ' . ($job->country ?? ''), ', ') }}
                                    </span>
                                @endif

                                @if($job->job_type)
                                    <span>
                                        <i class="fas fa-clock"></i>
                                        {{ $job->job_type }}
                                    </span>
                                @endif

                                @if($job->salary)
                                    <span>
                                        <i class="fas fa-wallet"></i>
                                        {{ $job->salary }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer-custom">
                            <div class="posted-time">
                                <i class="far fa-clock me-1"></i>
                                {{ \Carbon\Carbon::parse($job->posted_date)->diffForHumans() }}
                            </div>

                            <a href="{{ route('Home.jobs-details', $job->slug) }}" class="btn btn-apply">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-light border rounded-4 text-center py-4">
                        No jobs available right now.
                    </div>
                </div>
            @endforelse

            <div class="col-lg-4 col-md-6">
                <div class="job-card h-100 bg-dark-blue text-white border-0 position-relative overflow-hidden d-flex flex-column justify-content-center align-items-center text-center">
                    <div class="position-relative z-2">
                        <div class="icon-box mb-3 bg-white text-pink rounded-circle mx-auto shadow-sm" style="width: 60px; height: 60px; display:grid; place-items:center; font-size:1.5rem;">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3 class="fw-bold mb-2">Hiring?</h3>
                        <p class="text-white-50 mb-4">Post a job and find top talent in minutes.</p>
                        <a href="{{ route('Home.company.index') }}" class="btn btn-custom w-100 rounded-pill fw-bold">Post a Job</a>
                    </div>
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-blob-2" style="opacity: 0.1;"></div>
                </div>
            </div>

        </div>
    </div>
</section> --}}


{{-- featured jobs --}}
<section class="featured-jobs py-5 position-relative">
    <div class="container py-4">

        <!-- Section Header -->
        <div class="row align-items-end mb-5">
            <div class="col-lg-8">
                <span class="badge px-3 py-2 rounded-pill fw-bold mb-2" style="background-color: rgba(99, 141, 63, 0.1); color: var(--sparrow-green); font-size: 0.8rem; letter-spacing: 0.5px;">
                    <i class="fas fa-star me-2"></i>CURATED OPPORTUNITIES
                </span>
                <h2 class="display-5 fw-bold" style="color: var(--sparrow-dark);">
                    Latest <span style="color: var(--sparrow-green);">Featured Vacancies</span>
                </h2>
                <p class="text-muted lead mb-0 fs-6">Hand-picked open roles curated directly by our administration.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('Home.jobs') }}" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold text-sm">View All Vacancies <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>

        <!-- Cards Grid -->
        {{-- <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="job-card-sleek h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="company-logo-badge">
                                <i class="fab fa-google fs-5" style="color: var(--sparrow-dark);"></i>
                            </div>
                            <span class="badge-status urgency-badge">Urgent</span>
                        </div>

                        <h5 class="job-title-sleek mb-1">Senior UI/UX Designer</h5>
                        <p class="company-sub text-muted mb-3">Google Inc. <i class="fas fa-check-circle small ms-1" style="color: var(--sparrow-green);"></i></p>

                        <div class="job-meta-list mb-4">
                            <span><i class="fas fa-map-marker-alt"></i> NY, USA</span>
                            <span><i class="fas fa-wallet"></i> $150k</span>
                        </div>
                    </div>

                    <div class="job-card-bottom d-flex align-items-center justify-content-between pt-3">
                        <span class="time-ago"><i class="far fa-clock me-1"></i> 2h ago</span>
                        <a href="#" class="view-link-btn">View Details <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="job-card-sleek h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="company-logo-badge">
                                <i class="fab fa-spotify fs-5" style="color: var(--sparrow-dark);"></i>
                            </div>
                            <span class="badge-status remote-badge">Remote</span>
                        </div>

                        <h5 class="job-title-sleek mb-1">Product Manager</h5>
                        <p class="company-sub text-muted mb-3">Spotify <i class="fas fa-check-circle small ms-1" style="color: var(--sparrow-green);"></i></p>

                        <div class="job-meta-list mb-4">
                            <span><i class="fas fa-clock"></i> Contract</span>
                            <span><i class="fas fa-wallet"></i> $110k</span>
                        </div>
                    </div>

                    <div class="job-card-bottom d-flex align-items-center justify-content-between pt-3">
                        <span class="time-ago"><i class="far fa-clock me-1"></i> 5h ago</span>
                        <a href="#" class="view-link-btn">View Details <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="job-card-sleek h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="company-logo-badge">
                                <i class="fab fa-amazon fs-5" style="color: var(--sparrow-dark);"></i>
                            </div>
                            <span class="badge-status fulltime-badge">Full Time</span>
                        </div>

                        <h5 class="job-title-sleek mb-1">Software Engineer</h5>
                        <p class="company-sub text-muted mb-3">Amazon <i class="fas fa-check-circle small ms-1" style="color: var(--sparrow-green);"></i></p>

                        <div class="job-meta-list mb-4">
                            <span><i class="fas fa-map-marker-alt"></i> Seattle</span>
                            <span><i class="fas fa-wallet"></i> $180k</span>
                        </div>
                    </div>

                    <div class="job-card-bottom d-flex align-items-center justify-content-between pt-3">
                        <span class="time-ago"><i class="far fa-clock me-1"></i> 1d ago</span>
                        <a href="#" class="view-link-btn">View Details <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="job-card-sleek h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="company-logo-badge">
                                <i class="fab fa-apple fs-5" style="color: var(--sparrow-dark);"></i>
                            </div>
                            <span class="badge-status fulltime-badge">Full Time</span>
                        </div>

                        <h5 class="job-title-sleek mb-1">iOS Developer</h5>
                        <p class="company-sub text-muted mb-3">Apple <i class="fas fa-check-circle small ms-1" style="color: var(--sparrow-green);"></i></p>

                        <div class="job-meta-list mb-4">
                            <span><i class="fas fa-map-marker-alt"></i> California</span>
                            <span><i class="fas fa-wallet"></i> $130k+</span>
                        </div>
                    </div>

                    <div class="job-card-bottom d-flex align-items-center justify-content-between pt-3">
                        <span class="time-ago"><i class="far fa-clock me-1"></i> 2d ago</span>
                        <a href="#" class="view-link-btn">View Details <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="job-card-sleek h-100 d-flex flex-column justify-content-between">
                    <div>
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="company-logo-badge">
                                <i class="fab fa-figma fs-5" style="color: var(--sparrow-dark);"></i>
                            </div>
                            <span class="badge-status hot-badge">Hot Role</span>
                        </div>

                        <h5 class="job-title-sleek mb-1">Brand Designer</h5>
                        <p class="company-sub text-muted mb-3">Figma <i class="fas fa-check-circle small ms-1" style="color: var(--sparrow-green);"></i></p>

                        <div class="job-meta-list mb-4">
                            <span><i class="fas fa-clock"></i> Part Time</span>
                            <span><i class="fas fa-wallet"></i> $60/hr</span>
                        </div>
                    </div>

                    <div class="job-card-bottom d-flex align-items-center justify-content-between pt-3">
                        <span class="time-ago"><i class="far fa-clock me-1"></i> 3d ago</span>
                        <a href="#" class="view-link-btn">View Details <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>

            <!-- Promo Card 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="job-card-sleek h-100 text-white border-0 position-relative overflow-hidden d-flex flex-column justify-content-center align-items-center text-center p-4 rounded-4" style="background-color: var(--sparrow-dark);">
                    <div class="position-relative z-2">
                        <div class="mb-3 bg-white rounded-circle mx-auto shadow-sm d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; color: var(--sparrow-green);">
                            <i class="fas fa-rocket fs-5"></i>
                        </div>
                        <h4 class="fw-bold mb-2 text-white">Need Staffing Solutions?</h4>
                        <p class="text-white-50 mb-4 small">Connect with our administration to post direct opportunities.</p>
                        <a href="#" class="btn w-100 rounded-pill fw-bold text-white py-2" style="background-color: var(--sparrow-green);">Contact Admin</a>
                    </div>
                </div>
            </div>

        </div> --}}
        <div class="row g-4">

@forelse($featuredJobs as $job)

<div class="col-lg-4 col-md-6">

    <div class="job-card-sleek h-100 d-flex flex-column justify-content-between">

        <div>

            <div class="d-flex align-items-start justify-content-between mb-3">

                <div class="company-logo-badge">
                    <i class="fas fa-briefcase fs-5" style="color: var(--sparrow-dark);"></i>
                </div>

                @if($job->job_type)
                <span class="badge-status fulltime-badge">
                    {{ $job->job_type }}
                </span>
                @endif

            </div>


            <h5 class="job-title-sleek mb-1">
                {{ $job->position }}
            </h5>


            <p class="company-sub text-muted mb-3">
                {{ $job->company_name }}



            </p>


            <div class="job-meta-list mb-4">

                @if($job->city || $job->country)

                <span>
                    <i class="fas fa-map-marker-alt"></i>

                    {{ trim(($job->city ?? '') . ', ' . ($job->country ?? ''), ', ') }}

                </span>

                @endif


                @if($job->salary)

                <span>
                    <i class="fas fa-wallet"></i>
                    {{ $job->salary }}
                </span>

                @endif


            </div>

        </div>



        <div class="job-card-bottom d-flex align-items-center justify-content-between pt-3">


            <span class="time-ago">

                <i class="far fa-clock me-1"></i>

                {{ \Carbon\Carbon::parse($job->posted_date)->diffForHumans() }}

            </span>


            <a href="{{ route('Home.jobs-details',$job->slug) }}"
               class="view-link-btn">

                View Details

                <i class="fas fa-arrow-right ms-1"></i>

            </a>


        </div>


    </div>

</div>


@empty

<div class="col-12 text-center">

    <p>No vacancies available.</p>

</div>


@endforelse



<!-- Admin Contact Card -->
<div class="col-lg-4 col-md-6">

<div class="job-card-sleek h-100 text-white border-0 position-relative overflow-hidden d-flex flex-column justify-content-center align-items-center text-center p-4 rounded-4"
style="background-color: var(--sparrow-dark);">


<div>

<div class="mb-3 bg-white rounded-circle mx-auto shadow-sm d-flex align-items-center justify-content-center"
style="width:50px;height:50px;color:var(--sparrow-green);">

<i class="fas fa-users"></i>

</div>


<h4 class="fw-bold text-white">
Need Staffing Solutions?
</h4>


<p class="text-white-50 small">
Connect with our administration to post direct opportunities.
</p>


<a href="{{ asset('/contact-us') }}"
class="btn w-100 rounded-pill fw-bold text-white py-2"
style="background-color:var(--sparrow-green);">

Contact Admin

</a>


</div>

</div>

</div>


</div>
    </div>
</section>
{{-- featured jobs --}}
{{-- explore by sectors section --}}
<section class="explore-sectors-section py-5 position-relative">
    <div class="container py-4">

        <!-- Section Header -->
        <div class="row align-items-center mb-5">
            <div class="col-lg-7">
                <span class="badge px-3 py-2 rounded-pill fw-bold mb-2" style="background-color: rgba(99, 141, 63, 0.1); color: var(--sparrow-green); font-size: 0.8rem; letter-spacing: 0.5px;">
                    <i class="fas fa-th-large me-2"></i>INDUSTRY EXPERTISE
                </span>
                <h2 class="display-5 fw-bold" style="color: var(--sparrow-dark);">
                    Explore Roles by <span style="color: var(--sparrow-green);">Top Sectors</span>
                </h2>
                <p class="text-muted lead mb-0 fs-6">Find curated administrative and professional opportunities across major industries.</p>
            </div>

        </div>

        <!-- Sectors Grid -->
        <div class="row g-4">

            <!-- Sector 1 -->
            {{-- <div class="col-lg-3 col-md-6">
                <a href="#" class="sector-card-sleek d-block text-decoration-none h-100">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="sector-icon-box">
                            <i class="fas fa-laptop-code fs-4" style="color: var(--sparrow-green);"></i>
                        </div>
                        <span class="badge rounded-pill bg-light text-muted fw-semibold px-2.5 py-1" style="font-size: 0.75rem;">1,200+ Jobs</span>
                    </div>
                    <h5 class="sector-title mb-1">Technology & IT</h5>
                    <p class="sector-desc text-muted mb-0 small">Software engineering, UI/UX, data science & systems.</p>
                </a>
            </div> --}}

           @foreach($sectors as $sector)

<div class="col-lg-3 col-md-6">

    <a href="{{ url('/disciplines/'.$sector->slug) }}"
       class="sector-card-sleek d-block text-decoration-none h-100">

        <div class="d-flex align-items-center justify-content-between mb-4">

            <div class="sector-icon-box">

                <i class="{{ $sector->menu_icon ?? 'fas fa-briefcase' }} fs-4"
                   style="color: var(--sparrow-green);"></i>

            </div>


            {{-- <span class="badge rounded-pill bg-light text-muted fw-semibold px-2 py-1"
                  style="font-size:0.75rem;">

                {{ $sector->jobs_count ?? 0 }} Jobs

            </span> --}}

        </div>


        <h5 class="sector-title mb-1">
            {{ $sector->menu_title }}
        </h5>


        <p class="sector-desc text-muted mb-0 small">
            Explore opportunities in {{ $sector->menu_title }}
        </p>


    </a>

</div>

@endforeach

        </div>
    </div>
</section>
{{-- explore by sectors section --}}
{{-- testimonials --}}
<section class="reviews-section py-5 position-relative bg-light overflow-hidden">
    <div class="container py-4">
        <div class="row align-items-center">

            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="review-sticky-content pe-lg-5">
                    <span class="badge bg-white text-pink shadow-sm px-3 py-2 rounded-pill fw-bold ls-1 mb-3">
                        <i class="fas fa-heart me-2"></i>WALL OF LOVE
                    </span>
                    <h2 class="display-5 fw-bold text-dark-blue mb-3">
                        Trusted by <span class="text-pink">10,000+</span> Users
                    </h2>
                    <p class="text-muted lead mb-4">
                        See what job seekers and employers are saying about their success stories.
                    </p>

                    <div class="rating-box bg-white p-4 rounded-4 shadow-sm border border-light">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-bold text-dark small ms-2">Reviews</span>
                            </div>
                            <span class="badge bg-success-subtle text-success px-3 py-2 rounded fw-bold">Excellent</span>
                        </div>
                        <div class="d-flex align-items-end gap-3">
                            <h1 class="mb-0 fw-bold text-dark-blue display-3">4.9</h1>
                            <div class="mb-2">
                                <div class="mb-1 text-warning fs-5">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                </div>
                                <p class="mb-0 text-muted small">Based on 2,500+ global reviews</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="reviews-wrapper-mask">
                    <div class="row g-4 reviews-grid">

                        <div class="col-md-4 col-12">
                            <div class="marquee-vertical marquee-up">
                                <div class="review-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=1" alt="User"><div><h5>Sarah Jenkins</h5><small>Hired at Google</small></div></div>
                                    <p>"I applied on Monday and got hired by Friday. Best portal ever!"</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                                <div class="review-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=3" alt="User"><div><h5>Mike Ross</h5><small>Employer</small></div></div>
                                    <p>"Found the perfect developer in 24 hours. The AI matching is real."</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>

                                <div class="review-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=1" alt="User"><div><h5>Sarah Jenkins</h5><small>Hired at Google</small></div></div>
                                    <p>"I applied on Monday and got hired by Friday. Best portal ever!"</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                                <div class="review-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=3" alt="User"><div><h5>Mike Ross</h5><small>Employer</small></div></div>
                                    <p>"Found the perfect developer in 24 hours. The AI matching is real."</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 d-none d-md-block">
                            <div class="marquee-vertical marquee-down">
                                <div class="review-card highlight-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=8" alt="User"><div><h5>David Kim</h5><small>CTO, TechFlow</small></div></div>
                                    <p>"This platform saved us thousands in recruitment fees. Brilliant."</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                                <div class="review-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=9" alt="User"><div><h5>Anna Belle</h5><small>Hired at Amazon</small></div></div>
                                    <p>"Resume builder feature is a game changer. Got noticed instantly."</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>

                                <div class="review-card highlight-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=8" alt="User"><div><h5>David Kim</h5><small>CTO, TechFlow</small></div></div>
                                    <p>"This platform saved us thousands in recruitment fees. Brilliant."</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                                <div class="review-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=9" alt="User"><div><h5>Anna Belle</h5><small>Hired at Amazon</small></div></div>
                                    <p>"Resume builder feature is a game changer. Got noticed instantly."</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-12 d-none d-lg-block">
                            <div class="marquee-vertical marquee-up">
                                <div class="review-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=15" alt="User"><div><h5>Lucas M.</h5><small>Designer</small></div></div>
                                    <p>"Finally a job portal that focuses on UI/UX roles specifically."</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                                <div class="review-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=20" alt="User"><div><h5>Jessica</h5><small>HR Manager</small></div></div>
                                    <p>"Quality of candidates is far superior to LinkedIn. Great work."</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>

                                <div class="review-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=15" alt="User"><div><h5>Lucas M.</h5><small>Designer</small></div></div>
                                    <p>"Finally a job portal that focuses on UI/UX roles specifically."</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                                <div class="review-card">
                                    <div class="review-header"><img src="https://i.pravatar.cc/150?img=20" alt="User"><div><h5>Jessica</h5><small>HR Manager</small></div></div>
                                    <p>"Quality of candidates is far superior to LinkedIn. Great work."</p>
                                    <div class="stars-mini"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
{{-- testimonials --}}



{{-- blogs --}}
<section class="blog-section py-5 position-relative bg-white">
    <div class="container py-4">

        <!-- Section Header -->
        <div class="row align-items-end mb-5">
            <div class="col-lg-8">
                <span class="badge px-3 py-2 rounded-pill fw-bold mb-2" style="background-color: rgba(99, 141, 63, 0.1); color: var(--sparrow-green); font-size: 0.8rem; letter-spacing: 0.5px;">
                    <i class="fas fa-newspaper me-2" style="color: var(--sparrow-green);"></i>LATEST NEWS
                </span>
                <h2 class="display-5 fw-bold" style="color: var(--sparrow-dark);">
                    Career <span style="color: var(--sparrow-green);">Insights & Tips</span>
                </h2>
                <p class="text-muted lead mb-0 fs-6">Stay ahead with expert administrative guidance and recruitment trends.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ asset('/blogs') }}" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold text-sm">Read All Articles <i class="fas fa-arrow-right ms-2"></i></a>
            </div>
        </div>

        <!-- Blog Cards Grid -->
        {{-- <div class="row g-4">

            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
                <article class="blog-card-sleek h-100 d-flex flex-column bg-white rounded-4 overflow-hidden border border-slate-200">
                    <div class="blog-image-wrapper position-relative overflow-hidden" style="height: 220px;">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600&q=80" alt="Blog 1" class="w-100 h-100 object-fit-cover transition-zoom">
                        <span class="category-tag-badge position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill text-white small fw-semibold" style="background-color: var(--sparrow-dark);">Career Advice</span>
                        <div class="date-badge position-absolute bottom-0 end-0 m-3 bg-white text-center p-2 rounded-3 shadow-sm" style="min-width: 55px;">
                            <span class="fw-bold d-block fs-5 lh-1" style="color: var(--sparrow-dark);">24</span>
                            <small class="text-uppercase text-muted" style="font-size: 0.65rem; letter-spacing: 0.5px;">Jan</small>
                        </div>
                    </div>
                    <div class="blog-content p-4 d-flex flex-column justify-content-between flex-grow-1">
                        <div>
                            <div class="meta-info mb-2 text-muted small">
                                <span><i class="far fa-clock me-1 text-secondary"></i> 5 min read</span>
                            </div>
                            <h4 class="blog-title fs-5 fw-bold mb-2">
                                <a href="#" class="text-decoration-none" style="color: var(--sparrow-dark);">How to Stand Out in Direct Staffing Applications</a>
                            </h4>
                            <p class="blog-excerpt text-muted small mb-4" style="line-height: 1.5;">Discover how admin-curated recruitment platforms value quality over volume...</p>
                        </div>

                        <div class="blog-footer d-flex align-items-center justify-content-between pt-3 border-top border-slate-100 mt-auto">
                            <div class="author d-flex align-items-center gap-2">
                                <img src="https://i.pravatar.cc/150?img=60" alt="Author" class="rounded-circle object-fit-cover" width="38" height="38">
                                <div>
                                    <h6 class="mb-0 fw-bold small" style="color: var(--sparrow-dark);">Sarah J.</h6>
                                    <small class="text-muted" style="font-size: 0.75rem;">HR Specialist</small>
                                </div>
                            </div>
                            <a href="#" class="read-btn-sleek d-flex align-items-center justify-content-center rounded-circle text-white" style="width: 36px; height: 36px; background-color: var(--sparrow-green);"><i class="fas fa-arrow-right small"></i></a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
                <article class="blog-card-sleek h-100 d-flex flex-column bg-white rounded-4 overflow-hidden border border-slate-200">
                    <div class="blog-image-wrapper position-relative overflow-hidden" style="height: 220px;">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&q=80" alt="Blog 2" class="w-100 h-100 object-fit-cover transition-zoom">
                        <span class="category-tag-badge position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill text-white small fw-semibold" style="background-color: var(--sparrow-green);">Remote Work</span>
                        <div class="date-badge position-absolute bottom-0 end-0 m-3 bg-white text-center p-2 rounded-3 shadow-sm" style="min-width: 55px;">
                            <span class="fw-bold d-block fs-5 lh-1" style="color: var(--sparrow-dark);">22</span>
                            <small class="text-uppercase text-muted" style="font-size: 0.65rem; letter-spacing: 0.5px;">Jan</small>
                        </div>
                    </div>
                    <div class="blog-content p-4 d-flex flex-column justify-content-between flex-grow-1">
                        <div>
                            <div class="meta-info mb-2 text-muted small">
                                <span><i class="far fa-clock me-1 text-secondary"></i> 3 min read</span>
                            </div>
                            <h4 class="blog-title fs-5 fw-bold mb-2">
                                <a href="#" class="text-decoration-none" style="color: var(--sparrow-dark);">The Future of Remote Work: What Companies Expect</a>
                            </h4>
                            <p class="blog-excerpt text-muted small mb-4" style="line-height: 1.5;">Remote work is evolving. Learn about the hybrid models dominating the market...</p>
                        </div>

                        <div class="blog-footer d-flex align-items-center justify-content-between pt-3 border-top border-slate-100 mt-auto">
                            <div class="author d-flex align-items-center gap-2">
                                <img src="https://i.pravatar.cc/150?img=32" alt="Author" class="rounded-circle object-fit-cover" width="38" height="38">
                                <div>
                                    <h6 class="mb-0 fw-bold small" style="color: var(--sparrow-dark);">David Ross</h6>
                                    <small class="text-muted" style="font-size: 0.75rem;">Tech Recruiter</small>
                                </div>
                            </div>
                            <a href="#" class="read-btn-sleek d-flex align-items-center justify-content-center rounded-circle text-white" style="width: 36px; height: 36px; background-color: var(--sparrow-green);"><i class="fas fa-arrow-right small"></i></a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6">
                <article class="blog-card-sleek h-100 d-flex flex-column bg-white rounded-4 overflow-hidden border border-slate-200">
                    <div class="blog-image-wrapper position-relative overflow-hidden" style="height: 220px;">
                        <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=600&q=80" alt="Blog 3" class="w-100 h-100 object-fit-cover transition-zoom">
                        <span class="category-tag-badge position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill text-white small fw-semibold" style="background-color: #3b82f6;">Resume Tips</span>
                        <div class="date-badge position-absolute bottom-0 end-0 m-3 bg-white text-center p-2 rounded-3 shadow-sm" style="min-width: 55px;">
                            <span class="fw-bold d-block fs-5 lh-1" style="color: var(--sparrow-dark);">18</span>
                            <small class="text-uppercase text-muted" style="font-size: 0.65rem; letter-spacing: 0.5px;">Jan</small>
                        </div>
                    </div>
                    <div class="blog-content p-4 d-flex flex-column justify-content-between flex-grow-1">
                        <div>
                            <div class="meta-info mb-2 text-muted small">
                                <span><i class="far fa-clock me-1 text-secondary"></i> 7 min read</span>
                            </div>
                            <h4 class="blog-title fs-5 fw-bold mb-2">
                                <a href="#" class="text-decoration-none" style="color: var(--sparrow-dark);">10 Common Mistakes That Cost You Job Interviews</a>
                            </h4>
                            <p class="blog-excerpt text-muted small mb-4" style="line-height: 1.5;">Avoid these common pitfalls to ensure your applications stand out properly...</p>
                        </div>

                        <div class="blog-footer d-flex align-items-center justify-content-between pt-3 border-top border-slate-100 mt-auto">
                            <div class="author d-flex align-items-center gap-2">
                                <img src="https://i.pravatar.cc/150?img=11" alt="Author" class="rounded-circle object-fit-cover" width="38" height="38">
                                <div>
                                    <h6 class="mb-0 fw-bold small" style="color: var(--sparrow-dark);">Emma W.</h6>
                                    <small class="text-muted" style="font-size: 0.75rem;">Career Coach</small>
                                </div>
                            </div>
                            <a href="#" class="read-btn-sleek d-flex align-items-center justify-content-center rounded-circle text-white" style="width: 36px; height: 36px; background-color: var(--sparrow-green);"><i class="fas fa-arrow-right small"></i></a>
                        </div>
                    </div>
                </article>
            </div>

        </div> --}}
    <div class="row g-4">

@foreach($blogs as $blog)

<div class="col-lg-4 col-md-6">

    <article class="blog-card-sleek h-100 d-flex flex-column bg-white rounded-4 overflow-hidden border border-slate-200">

        <div class="blog-image-wrapper position-relative overflow-hidden" style="height:220px;">

            <img src="{{ $blog->featured_image ? asset($blog->featured_image) : asset('assets/images/blog-placeholder.jpg') }}"
                 alt="{{ $blog->title }}"
                 class="w-100 h-100 object-fit-cover">


            @if($blog->category)

            <span class="category-tag-badge position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill text-white small fw-semibold"
            style="background-color: var(--sparrow-green);">

                {{ $blog->category->name }}

            </span>

            @endif


            <div class="date-badge position-absolute bottom-0 end-0 m-3 bg-white text-center p-2 rounded-3 shadow-sm"
                 style="min-width:55px;">

                <span class="fw-bold d-block fs-5 lh-1" style="color:var(--sparrow-dark);">

                    {{ \Carbon\Carbon::parse($blog->created_at)->format('d') }}

                </span>

                <small class="text-uppercase text-muted" style="font-size:.65rem;">

                    {{ \Carbon\Carbon::parse($blog->created_at)->format('M') }}

                </small>

            </div>

        </div>



        <div class="blog-content p-4 d-flex flex-column justify-content-between flex-grow-1">


            <div>

                <div class="meta-info mb-2 text-muted small">

                    <span>
                        <i class="far fa-clock me-1 text-secondary"></i>
                        5 min read
                    </span>

                </div>



                <h4 class="blog-title fs-5 fw-bold mb-2">

                    <a href="{{ route('Home.blogs_details', ['slug'=>$blog->slug]) }}"
                       class="text-decoration-none"
                       style="color:var(--sparrow-dark);">

                        {{ $blog->title }}

                    </a>

                </h4>




                <p class="blog-excerpt text-muted small mb-4"
                   style="line-height:1.5;">

                    {{ Str::limit(strip_tags($blog->short_description),120) }}

                </p>


            </div>




            <div class="blog-footer d-flex justify-content-end pt-3 border-top border-slate-100 mt-auto">


                <a href="{{ route('Home.blogs_details', ['slug'=>$blog->slug]) }}"
                   class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center text-white shadow-sm"
                   style="width:38px;height:38px;background-color:var(--sparrow-green);">

                    <i class="fas fa-arrow-right"></i>

                </a>


            </div>


        </div>


    </article>


</div>


@endforeach


</div>
    </div>
</section>
{{-- blogs --}}
@endsection
