<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- PAGE TITLE HERE -->
    <title>Sparrow Sharp</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('Dashboard_assets/images/favicon.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="{{ asset('Dashboard_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Dashboard_assets/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Dashboard_assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Dashboard_assets/css/style.css') }}">

    <style>
        .application-inbox-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .application-mail-item {
            transition: all 0.3s ease;
            background: #fff;
        }
        .application-mail-item:hover {
            background: #f8fafc;
        }
        .mail-avatar {
            min-width: 46px;
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: linear-gradient(135deg, #638d3f, #82b554);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 8px 18px rgba(99, 141, 63, 0.18);
        }
        .chat-list-header h6 {
            font-size: 18px;
            font-weight: 700;
        }
        .chat-list-header p {
            font-size: 12px;
            color: #8c8c8c;
        }
        .application-mail-item .badge {
            font-size: 11px;
            padding: 6px 10px;
            border-radius: 20px;
        }
    </style>
    @stack('styles')
</head>

<body>

    <!-- Preloader start -->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- Preloader end -->

    <div id="main-wrapper" class="show">

        <!-- Nav Header -->
        <div class="nav-header">
            <a href="{{ url('/') }}" class="brand-logo" style="display: flex; align-items: center; gap: 10px; text-decoration: none;">
                <span class="brand-title" style="font-size: 24px; font-weight: 700; color: #638D3F; white-space: nowrap; font-family: 'Poppins', sans-serif;">
                    <img src="{{ asset('assets/images/logo.jpeg') }}" alt="SparrowSharp" style="height: 50px; width: auto;">
                </span>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
        </div>

        @php
            $recentApplications = \App\Models\JobApplication::with('job')
                ->latest()
                ->take(12)
                ->get();
        @endphp

        <!-- Chatbox / Application Inbox -->
        <div class="chatbox">
            <div class="chatbox-close"></div>
            <div class="card mb-0 border-0 h-100 rounded-0">
                <div class="card-header chat-list-header text-center border-0" style="background:#f1f5f9;">
                    <a href="javascript:void(0);" class="text-dark">
                        <i class="fas fa-envelope-open-text"></i>
                    </a>
                    <div>
                        <h6 class="mb-1">Application Inbox</h6>
                        <p class="mb-0">Recent candidate messages</p>
                    </div>
                    <a href="javascript:void(0);" class="text-dark">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                </div>

                <div class="card-body contacts_body p-0 dlab-scroll" id="DLAB_W_Contacts_Body" style="height: calc(100vh - 180px);">
                    @if($recentApplications->count())
                        <ul class="contacts application-inbox-list">
                            @foreach($recentApplications as $application)
                                <li class="application-mail-item">
                                    <a href="javascript:void(0);" class="d-block text-decoration-none text-dark">
                                        <div class="d-flex align-items-start gap-3 p-3 border-bottom">
                                            <div class="mail-avatar">
                                                {{ strtoupper(substr($application->full_name ?? 'U', 0, 1)) }}
                                            </div>
                                            <div class="flex-grow-1 overflow-hidden">
                                                <div class="d-flex justify-content-between align-items-start mb-1">
                                                    <h6 class="mb-0 fw-semibold text-truncate">
                                                        {{ $application->full_name ?? 'Unknown Applicant' }}
                                                    </h6>
                                                    <small class="text-muted ms-2">
                                                        {{ optional($application->created_at)->format('d M') }}
                                                    </small>
                                                </div>
                                                <div class="small text-primary fw-medium text-truncate mb-1">
                                                    {{ $application->email }}
                                                </div>
                                                <div class="small text-muted text-truncate mb-1">
                                                    Applied for:
                                                    <span class="fw-semibold text-dark">
                                                        {{ optional($application->job)->position ?? 'Job Application' }}
                                                    </span>
                                                </div>
                                                <div class="small text-muted text-truncate">
                                                    {{ !empty($application->message) ? \Illuminate\Support\Str::limit($application->message, 70) : 'No message provided by applicant.' }}
                                                </div>
                                                <div class="mt-2 d-flex align-items-center justify-content-between">
                                                    <span class="badge light badge-primary">
                                                        {{ $application->city ?? 'No City' }}
                                                    </span>
                                                    @if((int) $application->status === 0)
                                                        <span class="badge light badge-warning">New</span>
                                                    @else
                                                        <span class="badge light badge-success">Reviewed</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="d-flex align-items-center justify-content-center h-100 p-4 text-center">
                            <div>
                                <div class="mb-3" style="font-size: 40px; color: #d1d5db;">
                                    <i class="fas fa-inbox"></i>
                                </div>
                                <h6 class="mb-2">No messages yet</h6>
                                <p class="text-muted mb-0">New application messages will appear here.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Header Start -->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                Sparrow Portal
                            </div>
                            <div class="nav-item d-flex align-items-center">
                                <!-- DYNAMIC SEARCH FORM -->
                                <form action="{{ route('Dashboard.admin.profile.index') }}" method="GET">
                                    <div class="input-group search-area">
                                        <input type="text" name="search" class="form-control" placeholder="Search records..." value="{{ request('search') }}">
                                        <span class="input-group-text">
                                            <button type="submit" class="btn p-0 border-0 bg-transparent">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                                <!-- Plus icon removed from here -->
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dlab-theme-mode p-0" href="javascript:void(0);">
                                    <i id="icon-light" class="fas fa-sun"></i>
                                    <i id="icon-dark" class="fas fa-moon"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ auth()->user()->profile_img ? asset(auth()->user()->profile_img) : asset('images/profile/pic1.jpg') }}" width="20" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ route('Dashboard.admin.profile.index') }}" class="dropdown-item ai-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile</span>
                                    </a>
                                    <a href="{{ route('Dashboard.admin.email.index') }}" class="dropdown-item ai-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ms-2">Inbox</span>
                                    </a>
                                    <form action="{{ route('auth.logout') }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item ai-icon border-0 bg-transparent w-100 text-start">
                                            <svg id="icon-logout1" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            <span class="ms-2">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Header end -->

        <!-- Sidebar Inclusion -->
        @if (Auth::check() && Auth::user()->role_id == 1)
            @include('Layout.menus.admin')
        @elseif (Auth::check() && Auth::user()->role_id == 3)
            @include('Layout.menus.company')
        @endif

        <!-- Main Content Area -->
        @yield('AdminContent')

        <!-- Footer -->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by
                    <a href="#" target="_blank">WebOctane</a>
                    <span class="current-year">2026</span>
                </p>
            </div>
        </div>

    </div>
    <!-- Main wrapper end -->

    <!-- Scripts -->
    <script src="{{ asset('Dashboard_assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/vendor/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/vendor/datatables/js/jszip.min.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/js/dashboard/profile.js') }}"></script>
    <script src="{{ asset('Dashboard_assets/js/styleSwitcher.js') }}"></script>

    <script>
        $('.btn-select-text').on('click', function(){
            var temp = $("<input>");
            $("body").append(temp);
            temp.val($(this).parent(".select-text-wrap").find('.text-select-copy').text()).select();
            document.execCommand("copy");
            temp.remove();

            var $span = $(this).find('span');
            var originalText = $span.text();
            $span.text("Copied!");

            setTimeout(function() {
                $span.text(originalText);
            }, 2000);
        });
    </script>
    @stack('scripts')
</body>
</html>
