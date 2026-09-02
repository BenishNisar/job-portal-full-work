<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparrow Sharp</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset("assets/css/styles.css") }}">
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top bg-white navbar-light shadow-sm" id="mainNav">
    <div class="container">
        {{-- <a class="navbar-brand d-flex align-items-center" href="{{ asset('/') }}">
            <span class="brand-text">Job<span class="text-pink">Portal</span>Pro</span>
        </a> --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ asset('/') }}">
            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="SparrowSharp" style="height: 50px; width: auto;">
        </a>

        <button class="navbar-toggler border-0 shadow-none p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
            <div class="hamburger-box">
                <i class="fas fa-bars text-dark fs-2"></i> </div>
        </button>

        <div class="collapse navbar-collapse d-none d-lg-block">
            <ul class="navbar-nav mx-auto">
                {{-- <li class="nav-item"><a class="nav-link active" href="#">Home</a></li> --}}
             <li class="nav-item"><a class="nav-link" href="{{ asset("/about") }}">About Us</a></li>
            {{-- <li class="nav-item"><a class="nav-link" href="{{ asset("/disciplines") }}">Our Sectors</a></li> --}}
{{-- <li class="nav-item dropdown dropdown-mega">
  <a class="nav-link dropdown-toggle d-flex align-items-center" href="{{ route('Home.disciplines.index') }}" id="sectorsDropdown">
        Our Sectors <i class="fas fa-chevron-down ms-1 toggle-icon-mobile"></i>
    </a>
    <div class="dropdown-menu mega-menu-custom animate__animated animate__fadeIn">
        <div class="mega-menu-body">
            <div class="row g-0 w-100">
                <div class="col-lg-4 menu-col border-end-light">
                    <span class="menu-heading">Technology</span>
                    <a class="mega-item" href="{{ route('Home.disciplines.show', 'it-software') }}">
                        <div class="icon-circle-sm"><i class="fas fa-laptop-code"></i></div>
                        <div class="item-text"><b>IT & Software</b><small>Dev, Cloud & Cyber</small></div>
                    </a>
                    <a class="mega-item" href="#">
                        <div class="icon-circle-sm"><i class="fas fa-brain"></i></div>
                        <div class="item-text"><b>AI & Data</b><small>Machine Learning</small></div>
                    </a>
                </div>
                <div class="col-lg-4 menu-col border-end-light">
                    <span class="menu-heading">Healthcare</span>
                    <a class="mega-item" href="#">
                        <div class="icon-circle-sm"><i class="fas fa-user-md"></i></div>
                        <div class="item-text"><b>Medical</b><small>Doctors & Nursing</small></div>
                    </a>
                    <a class="mega-item" href="#">
                        <div class="icon-circle-sm"><i class="fas fa-microscope"></i></div>
                        <div class="item-text"><b>Research</b><small>Clinical Trials</small></div>
                    </a>
                </div>
                <div class="col-lg-4 menu-col">
                    <span class="menu-heading">Corporate</span>
                    <a class="mega-item" href="#">
                        <div class="icon-circle-sm"><i class="fas fa-chart-line"></i></div>
                        <div class="item-text"><b>Finance</b><small>Banking & Assets</small></div>
                    </a>
                    <a class="mega-item" href="#">
                        <div class="icon-circle-sm"><i class="fas fa-balance-scale"></i></div>
                        <div class="item-text"><b>Legal</b><small>Corporate Law</small></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</li> --}}

<li class="nav-item dropdown dropdown-mega">
    <a class="nav-link dropdown-toggle d-flex align-items-center"
       href="#"
       id="sectorsDropdown">
        Our Sectors <i class="fas fa-chevron-down ms-1 toggle-icon-mobile"></i>
    </a>

    <div class="dropdown-menu mega-menu-custom animate__animated animate__fadeIn">
        <div class="mega-menu-body">
            <div class="row g-0 w-100">

                @foreach($sectorMenuGroups as $group => $items)
                    <div class="col-lg menu-col {{ !$loop->last ? 'border-end-light' : '' }}">
                        <span class="menu-heading">{{ $group }}</span>

                        @foreach($items as $item)
                            <a class="mega-item" href="{{ route('Home.disciplines.show', $item->slug) }}">
                                <div class="icon-circle-sm">
                                    <i class="{{ !empty($item->menu_icon) ? $item->menu_icon : 'fas fa-briefcase' }}"></i>
                                </div>

                                <div class="item-text">
                                    <b>{{ !empty($item->menu_title) ? $item->menu_title : $item->hero_title }}</b>

                                    @if(!empty($item->hero_highlight))
                                        <small>{{ $item->hero_highlight }}</small>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</li>
             <li class="nav-item"><a class="nav-link" href="{{ asset("/jobs") }}">Vacancies</a></li>
               <li class="nav-item"><a class="nav-link" href="{{ asset("/blogs") }}">Insights</a></li>
{{-- <li class="nav-item"><a class="nav-link" href="#">Companies</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ asset("/contact-us") }}">Contact Us</a></li>
            </ul>

            <div class="d-flex align-items-center gap-3">
@if(Auth::check())
    <form action="{{ route('auth.logout') }}" method="POST" class="m-0">
        @csrf
        <button type="submit" class="btn btn-custom rounded-pill px-4">
            Logout
        </button>
    </form>
@else
    <a href="{{ route('auth.accountlogin') }}" class="btn btn-custom rounded-pill px-4">
        Login | Register
    </a>
@endif
                <div class="dropdown">
    <a href="#" class="user-avatar-btn text-decoration-none d-flex align-items-center gap-2 px-3 py-2 rounded-pill bg-light border shadow-sm" data-bs-toggle="dropdown">
        @if(Auth::check())
            <span class="avatar-name fw-semibold text-dark">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>
        @else
            <div class="rounded-circle text-white d-flex align-items-center justify-content-center" style="width: 28px; height: 28px; background-color: #6c757d;">
                <i class="fas fa-user fs-6"></i>
            </div>
            <span class="avatar-name fw-semibold text-dark">Guest</span>
            <i class="fas fa-chevron-down ms-1 text-muted" style="font-size: 0.75rem;"></i>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-3 p-2 rounded-3">
        @if(Auth::check())
            <li><a class="dropdown-item py-2" href="{{ asset('/profile') }}"><i class="fas fa-user me-2 text-pink"></i> My Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('auth.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="dropdown-item py-2 text-danger">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </button>
                </form>
            </li>
        @else
            <li><a class="dropdown-item py-2 fw-semibold" href="{{ route('auth.accountlogin') }}"><i class="fas fa-sign-in-alt me-2 text-success"></i> Login / Register</a></li>
        @endif
    </ul>
</div>
            </div>
        </div>
    </div>
</nav>
{{--
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold">Job<span class="text-pink">Portal</span>Pro</h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">

        <div class="d-flex align-items-center mb-4 p-3 bg-light rounded">
            <div class="avatar-circle me-3">AS</div>
            <div>
                <h6 class="mb-0 fw-bold">Amit Sharma</h6>
                <small class="text-muted">Job Seeker</small>
            </div>
        </div>

<ul class="navbar-nav flex-grow-1 pe-3">
<li class="nav-item"><a class="nav-link py-3 fw-bold" href="{{ asset("/about") }}">About Us</a></li>

<li class="nav-item">
    <a class="nav-link py-3 fw-bold d-flex justify-content-between align-items-center"
       data-bs-toggle="collapse" href="#mobileSectorsCollapse" role="button" aria-expanded="false">
        Our Sectors <i class="fas fa-chevron-down toggle-icon-mobile"></i>
    </a>

    <div class="collapse" id="mobileSectorsCollapse">
        <div class="mobile-mega-content ps-3 pe-2 pb-3">

            @foreach($sectorMenuGroups as $group => $items)
                <div class="mb-4">
                    <span class="text-pink fw-bold small text-uppercase ls-1 d-block mb-2" style="font-size: 0.7rem;">
                        {{ $group }}
                    </span>

                    @foreach($items as $item)
                        <a class="nav-link py-2 d-flex align-items-center border-0"
                           href="{{ route('Home.disciplines.show', $item->slug) }}">
                            <div class="icon-circle-sm me-2">
                                <i class="{{ $item->menu_icon ?: 'fas fa-briefcase' }}"></i>
                            </div>
                            <span>{{ $item->menu_title ?: $item->hero_title }}</span>
                        </a>
                    @endforeach
                </div>
            @endforeach


        </div>
    </div>
</li>
            <li class="nav-item"><a class="nav-link py-3 fw-bold" href="{{ asset("/jobs") }}">Vacancies</a></li>
             <li class="nav-item"><a class="nav-link py-3 fw-bold" href="{{ asset("/blogs") }}">Insights</a></li>

            <li class="nav-item"><a class="nav-link py-3 fw-bold" href="#">Companies</a></li>
            <li class="nav-item"><a class="nav-link py-3 fw-bold" href="#">Career Advice</a></li>

            <li class="nav-item"><hr class="dropdown-divider my-3"></li>

            <li class="nav-item"><a class="nav-link py-2" href="#"><i class="fas fa-user me-2 text-pink"></i> My Profile</a></li>
            <li class="nav-item"><a class="nav-link py-2" href="#"><i class="fas fa-bell me-2 text-pink"></i> Notifications</a></li>
            <li class="nav-item"><a class="nav-link py-2" href="#"><i class="fas fa-heart me-2 text-pink"></i> Saved Jobs</a></li>
        </ul>

        <div class="mt-auto pb-4">
            <a href="#" class="btn btn-custom w-100 rounded-pill py-3">Post a Job</a>
            <a href="#" class="btn btn-outline-danger w-100 rounded-pill py-3 mt-3">Logout</a>
        </div>
    </div>
</div> --}}

{{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title fw-bold">Job<span class="text-pink">Portal</span>Pro</h5>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">

        @if(Auth::check())
            <div class="d-flex align-items-center mb-4 p-3 bg-light rounded">
                <div class="avatar-circle me-3 text-white fw-bold d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background-color: #e83e8c; border-radius: 50%;">
                    {{ strtoupper(substr(Auth::user()->firstname, 0, 1) . substr(Auth::user()->lastname, 0, 1)) }}
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h6>
                    <small class="text-muted">Job Seeker</small>
                </div>
            </div>
        @else
            <div class="d-flex align-items-center mb-4 p-3 bg-light rounded">
                <div class="avatar-circle me-3 text-white d-flex align-items-center justify-content-center bg-secondary" style="width: 45px; height: 45px; border-radius: 50%;">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">Guest User</h6>
                    <a href="{{ asset('/accountlogin') }}" class="text-pink small text-decoration-none fw-bold">Login / Register</a>
                </div>
            </div>
        @endif

        <ul class="navbar-nav flex-grow-1 pe-3">
            <li class="nav-item"><a class="nav-link py-3 fw-bold" href="{{ asset('/about') }}">About Us</a></li>

            <li class="nav-item">
                <a class="nav-link py-3 fw-bold d-flex justify-content-between align-items-center"
                   data-bs-toggle="collapse" href="#mobileSectorsCollapse" role="button" aria-expanded="false">
                    Our Sectors <i class="fas fa-chevron-down toggle-icon-mobile"></i>
                </a>

                <div class="collapse" id="mobileSectorsCollapse">
                    <div class="mobile-mega-content px-3 py-3 bg-light rounded-3 mb-3 mx-2 mt-2">
                        @foreach($sectorMenuGroups as $group => $items)
                            <div class="{{ !$loop->last ? 'mb-4' : 'mb-1' }}">
                                <span class="text-pink fw-bold small text-uppercase ls-1 d-block mb-2" style="font-size: 0.75rem;">
                                    {{ $group }}
                                </span>

                                @foreach($items as $item)
                                    <a class="nav-link py-2 px-2 d-flex align-items-center border-0 rounded"
                                       href="{{ route('Home.disciplines.show', $item->slug) }}">
                                        <div class="icon-circle-sm me-2 text-secondary">
                                            <i class="{{ !empty($item->menu_icon) ? $item->menu_icon : 'fas fa-briefcase' }}"></i>
                                        </div>
                                        <span style="font-size: 0.95rem;">{{ !empty($item->menu_title) ? $item->menu_title : $item->hero_title }}</span>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </li>

            <li class="nav-item"><a class="nav-link py-3 fw-bold" href="{{ asset('/jobs') }}">Vacancies</a></li>
            <li class="nav-item"><a class="nav-link py-3 fw-bold" href="{{ asset('/blogs') }}">Insights</a></li>
                <li class="nav-item"><a class="nav-link py-3 fw-bold" href="{{ asset('/contact-us') }}">Contact Us</a></li>
            <li class="nav-item"><hr class="dropdown-divider my-3"></li>

            @if(Auth::check())
                <li class="nav-item"><a class="nav-link py-2" href="{{ asset('/profile') }}"><i class="fas fa-user me-2 text-pink"></i> My Profile</a></li>
                <li class="nav-item"><a class="nav-link py-2" href="#"><i class="fas fa-bell me-2 text-pink"></i> Notifications</a></li>
                <li class="nav-item"><a class="nav-link py-2" href="#"><i class="fas fa-heart me-2 text-pink"></i> Saved Jobs</a></li>
            @endif
        </ul>

        <div class="mt-auto pb-4">
            <a href="{{ route('Home.company.index') }}" class="btn btn-custom w-100 rounded-pill py-3">Post a Job</a>

            @if(Auth::check())
                <form action="{{ route('auth.logout') }}" method="POST" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 rounded-pill py-3">Logout</button>
                </form>
            @endif
        </div>
    </div>
</div> --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
    <div class="offcanvas-header border-bottom">
        <a class="navbar-brand d-flex align-items-center" href="{{ asset('/') }}">
            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="SparrowSharp" style="height: 40px; width: auto;">
        </a>
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">

        @if(Auth::check())
            <div class="d-flex align-items-center mb-4 p-3 bg-light rounded">
                <div class="avatar-circle me-3 text-white fw-bold d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background-color: #e83e8c; border-radius: 50%;">
                    {{ strtoupper(substr(Auth::user()->firstname, 0, 1) . substr(Auth::user()->lastname, 0, 1)) }}
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h6>
                    <small class="text-muted">Job Seeker</small>
                </div>
            </div>
        @else
            <div class="d-flex align-items-center mb-4 p-3 bg-light rounded">
                <div class="avatar-circle me-3 text-white d-flex align-items-center justify-content-center bg-secondary" style="width: 45px; height: 45px; border-radius: 50%;">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold">Guest User</h6>
                    <a href="{{ route('auth.accountlogin') }}" class="text-pink small text-decoration-none fw-bold">Login / Register</a>
                </div>
            </div>
        @endif

        <ul class="navbar-nav flex-grow-1 pe-3">
            <li class="nav-item"><a class="nav-link py-2 fw-bold" href="{{ asset('/about') }}">About Us</a></li>

            <li class="nav-item">
                <a class="nav-link py-2 fw-bold d-flex justify-content-between align-items-center"
                   data-bs-toggle="collapse" href="#mobileSectorsCollapse" role="button" aria-expanded="false">
                    Our Sectors <i class="fas fa-chevron-down toggle-icon-mobile"></i>
                </a>

                <div class="collapse" id="mobileSectorsCollapse">
                    <div class="mobile-mega-content px-3 py-3 bg-light rounded-3 mb-2 mx-1 mt-1">
                        @foreach($sectorMenuGroups as $group => $items)
                            <div class="{{ !$loop->last ? 'mb-3' : 'mb-1' }}">
                                <span class="text-pink fw-bold small text-uppercase ls-1 d-block mb-2" style="font-size: 0.75rem;">
                                    {{ $group }}
                                </span>

                                @foreach($items as $item)
                                    <a class="nav-link py-2 px-2 d-flex align-items-center border-0 rounded"
                                       href="{{ route('Home.disciplines.show', $item->slug) }}">
                                        <div class="icon-circle-sm me-2 text-secondary">
                                            <i class="{{ !empty($item->menu_icon) ? $item->menu_icon : 'fas fa-briefcase' }}"></i>
                                        </div>
                                        <span style="font-size: 0.95rem;">{{ !empty($item->menu_title) ? $item->menu_title : $item->hero_title }}</span>
                                    </a>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </li>

            <li class="nav-item"><a class="nav-link py-2 fw-bold" href="{{ asset('/jobs') }}">Vacancies</a></li>
            <li class="nav-item"><a class="nav-link py-2 fw-bold" href="{{ asset('/blogs') }}">Insights</a></li>
            <li class="nav-item"><a class="nav-link py-2 fw-bold" href="{{ asset('/contact-us') }}">Contact Us</a></li>

            <li class="nav-item"><hr class="dropdown-divider my-3"></li>

            @if(Auth::check())
                <li class="nav-item"><a class="nav-link py-2" href="{{ asset('/profile') }}"><i class="fas fa-user me-2 text-pink"></i> My Profile</a></li>
                {{-- <li class="nav-item"><a class="nav-link py-2" href="#"><i class="fas fa-bell me-2 text-pink"></i> Notifications</a></li> --}}
                <li class="nav-item"><a class="nav-link py-2" href="#"><i class="fas fa-heart me-2 text-pink"></i> Saved Jobs</a></li>
            @endif
        </ul>

        <div class="mt-auto pb-4 pt-3">
            @if(Auth::check())
                <form action="{{ route('auth.logout') }}" method="POST" class="w-100">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 rounded-pill py-2 fw-bold">Logout</button>
                </form>
            @else
                <a href="{{ route('auth.accountlogin') }}" class="btn btn-custom w-100 rounded-pill py-2 fw-bold text-center">
                    Login | Register
                </a>
            @endif
        </div>
    </div>
</div>

{{-- job portal website  --}}

@yield('Content')



{{-- sparrow sharp modern dark footer --}}
{{-- sparrow sharp modern dark footer --}}
<footer class="sparrow-footer position-relative text-white overflow-hidden">
    <!-- Background Glow Effect -->
    <div class="footer-glow-shape"></div>

    <div class="container position-relative z-2 pt-5 pb-4">

        <!-- Top Newsletter / Action Row -->
        {{-- <div class="footer-top-row p-4 p-lg-5 rounded-4 mb-5 border border-dark-subtle" style="background-color: #121212;">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <span class="badge px-3 py-1.5 rounded-pill fw-bold mb-2" style="background-color: rgba(99, 141, 63, 0.15); color: var(--sparrow-green); font-size: 0.75rem; letter-spacing: 0.5px;">
                        <i class="fas fa-paper-plane me-1"></i> DIRECT ACCESS
                    </span>
                    <h3 class="fw-bold mb-1 fs-3">Never miss a curated opportunity.</h3>
                    <p class="small mb-0">Get elite recruitment roles delivered directly to your inbox weekly.</p>
                </div>
                <div class="col-lg-6">
                    <form action="#" class="footer-subscribe-box d-flex gap-2">
                        <input type="email" placeholder="Enter your work email address..." class="form-control bg-dark text-white border-secondary rounded-pill px-4 py-3 fs-6">
                        <button type="submit" class="btn rounded-pill px-4 py-3 fw-bold text-white flex-shrink-0" style="background-color: var(--sparrow-green);">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div> --}}

        <!-- Main Links Grid -->
        <div class="row g-5 mb-5">
            <!-- Col 1: Brand Info & Client Details -->
            <div class="col-lg-5">
                <div class="pe-lg-4">
                    <div class="footer-brand-wrap mb-3">
                        <span class="fs-3 fw-bold text-white">Sparrow<span style="color: var(--sparrow-green);">Sharp</span></span>
                    </div>
                    <p class="small mb-3" style="line-height: 1.7; color: rgba(255,255,255,0.7);">
                        Connecting exceptional talent with organisations that value the right people. Building long-term professional relationships with trust and integrity.
                    </p>
                    <div class="mb-3 small" style="color: rgba(255,255,255,0.8);">
                        <p class="mb-1"><i class="fas fa-phone-alt me-2" style="color: var(--sparrow-green);"></i> +1 424 426 7394</p>
                        <p class="mb-0"><i class="fas fa-envelope me-2" style="color: var(--sparrow-green);"></i> info@sparrowsharp.com</p>
                    </div>
                    <div class="footer-socials d-flex gap-2">
                        <a href="https://www.linkedin.com/company/sparrowsharp/" target="_blank" class="social-icon-pill btn btn-outline-light rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Col 2: Candidates -->
            <div class="col-lg-3 col-md-6 col-6">
                <h6 class="text-uppercase fw-bold text-white mb-4 fs-6" style="letter-spacing: 1px;">Candidates</h6>
                <ul class="list-unstyled d-flex flex-column gap-2 mb-0">
                    <li><a href="{{ asset('/jobs') }}" class="footer-nav-link text-decoration-none" style="color: rgba(255,255,255,0.7);">Vacancies</a></li>
                    <li><a href="{{ asset('/about') }}" class="footer-nav-link text-decoration-none" style="color: rgba(255,255,255,0.7);">About Us</a></li>
                    <li><a href="{{ asset('/blogs') }}" class="footer-nav-link text-decoration-none" style="color: rgba(255,255,255,0.7);">Insights</a></li>
                    <li><a href="{{ asset('/contact-us') }}" class="footer-nav-link text-decoration-none" style="color: rgba(255,255,255,0.7);">Contact Support</a></li>
                </ul>
            </div>

            <!-- Col 3: Global Office Address -->
            <div class="col-lg-4 col-md-6">
                <h6 class="text-uppercase fw-bold text-white mb-4 fs-6" style="letter-spacing: 1px;">Global Office</h6>
                <p class="small mb-2" style="color: rgba(255,255,255,0.8); line-height: 1.6;">
                    <i class="fas fa-map-marker-alt me-2" style="color: var(--sparrow-green);"></i> 453 S. Spring Street, Suite 1212, Los Angeles, CA 90013
                </p>
                <div class="mt-3">
                    <a href="{{ asset('/contact-us') }}" class="btn btn-outline-light btn-sm rounded-pill px-4 fw-bold">Get In Touch</a>
                </div>
            </div>
        </div>

        <!-- Bottom Copyright Row -->
        <div class="pt-4 border-top border-dark d-flex flex-column flex-md-row align-items-center justify-content-between gap-3" style="border-color: rgba(255,255,255,0.1) !important;">
<p class="small mb-0" style="color: rgba(255,255,255,0.6);">
    &copy; 2026 SparrowSharp. All rights reserved. Developed by
    <a href="https://weboctane.tech/"
       target="_blank"
       class="text-decoration-none"
       style="color: var(--sparrow-green); font-weight:600;">
        WebOctane
    </a>
</p>           <div class="d-flex gap-4">
                <a href="{{ asset('/privacy-policy') }}" class="footer-bottom-link small text-decoration-none" style="color: rgba(255,255,255,0.6);">Privacy Policy</a>
                <a href="{{ asset('/terms-of-service') }}" class="footer-bottom-link small text-decoration-none" style="color: rgba(255,255,255,0.6);">Terms of Service</a>
                <a href="#" class="footer-bottom-link small text-decoration-none" style="color: rgba(255,255,255,0.6);">Security</a>
            </div>
        </div>

    </div>
</footer>
{{-- sparrow sharp modern dark footer --}}
{{-- sparrow sharp modern dark footer --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>







