  <div class="dlabnav">
            <div class="dlabnav-scroll">
				<div class="dropdown header-profile2 ">
					<a class="nav-link " href="javascript:void(0);"  role="button" data-bs-toggle="dropdown">
						{{-- <div class="header-info2 d-flex align-items-center">
							<img src="images/profile/pic1.jpg" alt="">
							<div class="d-flex align-items-center sidebar-info">
								<div>
									<span class="font-w400 d-block">Franklin Jr</span>
									<small class="text-end font-w400">Superadmin</small>
								</div>
								<i class="fas fa-chevron-down"></i>
							</div>

						</div> --}}
                        <div class="header-info2 d-flex align-items-center">
    <img src="{{ auth()->user()->profile_img ? asset(auth()->user()->profile_img) : asset('images/profile/pic1.jpg') }}" alt="">

    <div class="d-flex align-items-center sidebar-info">
        <div>
            <span class="font-w400 d-block">
                {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
            </span>

            <small class="text-end font-w400">
                {{ auth()->user()->role_id == 1 ? 'Superadmin' : 'User' }}
            </small>
        </div>

        <i class="fas fa-chevron-down"></i>
    </div>
</div>
					</a>
					<div class="dropdown-menu dropdown-menu-end">
						<a href="{{ route('Dashboard.admin.profile.index') }}" class="dropdown-item ai-icon ">
							<svg  xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
							<span class="ms-2">Profile </span>
						</a>
						<a href="{{ route('Dashboard.admin.email.index') }}" class="dropdown-item ai-icon">
							<svg  xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
							<span class="ms-2">Inbox </span>
						</a>
						{{-- <a href="{{ route('auth.logout') }}" class="dropdown-item ai-icon">
							<svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
							<span class="ms-2">Logout </span>
						</a> --}}

                        <form action="{{ route('auth.logout') }}" method="POST" class="m-0 p-0">
    @csrf
    <button type="submit" class="dropdown-item ai-icon border-0 bg-transparent w-100 text-start">
        <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
            <polyline points="16 17 21 12 16 7"></polyline>
            <line x1="21" y1="12" x2="9" y2="12"></line>
        </svg>
        <span class="ms-2">Logout </span>
    </button>
</form>
					</div>
				</div>
				<ul class="metismenu" id="menu">
                    <li ><a  class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">

							<li><a href="{{ route('Dashboard.admin.dashboard') }}">Dashboard Home</a></li>
</ul>

                    </li>
					<li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-093-waving"></i>
							<span class="nav-text">Jobs</span>
						</a>
                        <ul aria-expanded="false">
                           <li><a href="{{ route('Dashboard.admin.jobs.list') }}">Job Lists</a></li>
                            {{-- <li><a href="{{ route('Dashboard.admin.jobs.view', $job->id) }}">Job View</a></li>  --}}
                            {{-- <li><a href="{{ route('Dashboard.admin.jobs.application') }}">Job Application</a></li> --}}
                            <li><a href="{{ route('Dashboard.admin.jobs.apply') }}">Apply Job</a></li>
                            <li><a href="{{ route('Dashboard.admin.jobs.new-job') }}">New Job</a></li>
                            {{-- <li><a href="{{ route('Dashboard.admin.jobs.user_profile') }}">User Profile</a></li> --}}
                        </ul>
                    </li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<i class="flaticon-381-user-7"></i>
							<span class="nav-text">Profile</span>
						<span class="badge badge-xs style-1 new-badge">New</span>
					</a>
					<ul aria-expanded="false">
						 <li><a href="{{ route('Dashboard.admin.users.index') }}">Overview</a></li> <!-- List all users -->
    <li><a href="{{ route('Dashboard.admin.users.add') }}">Add New User</a></li> <!-- Add a new user -->
    {{-- <li><a href="{{ route('Dashboard.admin.users.edit', $item->id) }}">Edit User</a></li> <!-- Edit an existing user (if needed) --> --}}
    {{-- <li><a href="account/settings.html">Settings</a></li>
    <li><a href="account/activity.html">User Activity</a></li>
    <li><a href="account/security.html">Security</a></li> --}}
    <li><a href="{{ route('Dashboard.admin.roles.index') }}">User Roles</a></li>

    {{-- <li><a href="account/logs.html">Activity Logs</a></li> --}}
					</ul>
					</li>

					 {{-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<i class="flaticon-381-user-4"></i>
							<span class="nav-text">Companies</span>
						<span class="badge badge-xs style-1 new-badge">New</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="{{ route('Dashboard.admin.companies.index') }}">Overview</a></li>
                     <li><a href="{{ route('Dashboard.admin.companies.add') }}">Add New User</a></li>
					</ul>
					</li> --}}

					{{-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<i class="flaticon-381-internet"></i>
						<span class="nav-text">AIKit</span>
						<span class="badge badge-xs style-1 new-badge">New</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="aikit/auto-write.html">Auto Writer</a></li>
						<li><a href="aikit/scheduled.html">Scheduler</a></li>
						<li><a href="aikit/repurpose.html">Repurpose</a></li>
						<li><a href="aikit/rss.html">RSS</a></li>
						<li><a href="aikit/chatbot.html">Chatbot</a></li>
						<li><a href="aikit/fine-tune-models.html">Fine-tune Models</a></li>
						<li><a href="aikit/prompt.html">AI Menu Prompts</a></li>
						<li><a href="aikit/setting.html">Settings</a></li>
						<li><a href="aikit/import.html">Export/Import Settings</a></li>
					</ul>
					</li> --}}

				 <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">
						<i class="fa-solid fa-gear"></i>
						<span class="nav-text">Website Content

</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="{{ route("Dashboard.admin.disciplines.index") }}">Sectors</a></li>
						<li><a href="{{ route("Dashboard.admin.disciplines.add") }}">Add Sectors</a></li>

						<li><a href="{{ route("Dashboard.admin.blog.index") }}">Blog</a></li>
						<li><a href="{{ route('Dashboard.admin.blog.add') }}">Add Blog</a></li>
						<li><a href="{{ route('Dashboard.admin.category.index') }}">Blog Category</a></li>
					</ul>
					</li>
                   <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<i class="flaticon-050-info"></i>
							<span class="nav-text">Apps</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('Dashboard.admin.profile.index') }}">Profile</a></li>
							 {{-- <li><a href="edit-profile.html">Edit Profile </a></li>
							<li><a href="post-details.html">Post Details</a></li> --}}
                            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    {{-- <li><a href="email-compose.html">Compose</a></li> --}}
                                    <li><a href="{{ route('Dashboard.admin.email.index') }}">Inbox</a></li>
                                    {{-- <li><a href="email-read.html">Read</a></li> --}}
                                </ul>
                            </li>
                            {{-- <li><a href="app-calender.html">Calendar</a></li> --}}
							{{-- <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Shop</a>
                                <ul aria-expanded="false">
                                    <li><a href="ecom-product-grid.html">Product Grid</a></li>
									<li><a href="ecom-product-list.html">Product List</a></li>
									<li><a href="ecom-product-detail.html">Product Details</a></li>
									<li><a href="ecom-product-order.html">Order</a></li>
									<li><a href="ecom-checkout.html">Checkout</a></li>
									<li><a href="ecom-invoice.html">Invoice</a></li>
									<li><a href="ecom-customers.html">Customers</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </li>
                    {{-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-041-graph"></i>
							<span class="nav-text">Charts</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="chart-flot.html">Flot</a></li>
                            <li><a href="chart-morris.html">Morris</a></li>
                            <li><a href="chart-chartjs.html">Chartjs</a></li>
                            <li><a href="chart-chartist.html">Chartist</a></li>
                            <li><a href="chart-sparkline.html">Sparkline</a></li>
                            <li><a href="chart-peity.html">Peity</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-086-star"></i>
							<span class="nav-text">Bootstrap</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">Accordion</a></li>
                            <li><a href="./ui-alert.html">Alert</a></li>
                            <li><a href="./ui-badge.html">Badge</a></li>
                            <li><a href="./ui-button.html">Button</a></li>
                            <li><a href="./ui-button-group.html">Button Group</a></li>
                            <li><a href="./ui-modal.html">Modal</a></li>
							<li><a href="./ui-offcanvas.html">Offcanvas</a></li>
							<li><a href="./ui-placeholders.html">Placeholders</a></li>
							<li><a href="./ui-scrollspy.html">Scrollspy</a></li>
							<li><a href="./ui-spinners.html">Spinners</a></li>
							<li><a href="./ui-breadcrumb.html">Breadcrumb</a></li>
							<li><a href="./ui-colors.html">Colors</a></li>
							<li><a href="./ui-navbar.html">Navbar</a></li>
							<li><a href="./ui-object-fit.html">Object Fit</a></li>
							<li><a href="./ui-range-slider.html">Range Slider</a></li>
							<li><a href="./ui-toasts.html">Toasts</a></li>
                            <li><a href="./ui-list-group.html">List Group</a></li>
                            <li><a href="./ui-media-object.html">Media Object</a></li>
                            <li><a href="./ui-card.html">Cards</a></li>
                            <li><a href="./ui-carousel.html">Carousel</a></li>
                            <li><a href="./ui-dropdown.html">Dropdown</a></li>
                            <li><a href="./ui-popover.html">Popover</a></li>
                            <li><a href="./ui-progressbar.html">Progressbar</a></li>
                            <li><a href="./ui-tab.html">Tab</a></li>
                            <li><a href="./ui-typography.html">Typography</a></li>
                            <li><a href="./ui-pagination.html">Pagination</a></li>
                            <li><a href="./ui-grid.html">Grid</a></li>

                        </ul>
                    </li> --}}
                    {{-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-045-heart"></i>
							<span class="nav-text">Plugins</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="uc-select2.html">Select 2</a></li>
                            <li><a href="uc-nestable.html">Nestedable</a></li>
                            <li><a href="uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="uc-toastr.html">Toastr</a></li>
                            <li><a href="map-jqvmap.html">Jqv Map</a></li>
							<li><a href="uc-lightgallery.html">Light Gallery</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a href="widget-basic.html" class="" aria-expanded="false">
							<i class="flaticon-013-checkmark"></i>
							<span class="nav-text">Widget</span>
						</a>
					</li> --}}
                    {{-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-072-printer"></i>
							<span class="nav-text">Forms</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="form-element.html">Form Elements</a></li>
                            <li><a href="form-wizard.html">Wizard</a></li>
                            <li><a href="form-ckeditor.html">CkEditor</a></li>
                            <li><a href="form-pickers.html">Pickers</a></li>
                            <li><a href="form-validation.html">Form Validate</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-043-menu"></i>
							<span class="nav-text">Table</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                            <li><a href="table-datatable-basic.html">Datatable</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
							<i class="flaticon-022-copy"></i>
							<span class="nav-text">Pages</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="page-login.html">Login</a></li>
                            <li><a href="page-register.html">Register</a></li>
                            <li><a class="has-arrow" href="javascript:void(0);" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="page-error-400.html">Error 400</a></li>
                                    <li><a href="page-error-403.html">Error 403</a></li>
                                    <li><a href="page-error-404.html">Error 404</a></li>
                                    <li><a href="page-error-500.html">Error 500</a></li>
                                    <li><a href="page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                            <li><a href="page-lock-screen.html">Lock Screen</a></li>
                            <li><a href="empty-page.html">Empty Page</a></li>
                        </ul>
                    </li> --}}
                </ul>
				{{-- <div class="plus-box">
					<p class="fs-14 font-w600 mb-2">Job Portal<br>Your Resume Easily<br></p>
					<p class="plus-box-p">Lorem ipsum dolor sit amet</p>
				</div>
				<div class="copyright">
					<p><strong>Job Portal</strong> © <span class="current-year">2024</span> All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by DexignLab</p>
				</div> --}}
    {{-- <div class="plus-box">
    <p class="fs-14 font-w600 mb-2">
        Job Portal<br>
        Find Your Dream Job<br>
    </p>
    <p class="plus-box-p">
        Discover opportunities, connect with top companies, and build your professional future with ease.
    </p>
</div>

<div class="copyright">
    <p><strong><a href="https://weboctane.tech" target="_blank">WebOctane</a></strong> © <span class="current-year">2026</span> All Rights Reserved</p>
    <p class="fs-12">
        Connecting talent with the right opportunities worldwide.
    </p>
</div> --}}

<div class="plus-box">
    <p class="fs-14 font-w600 mb-2">
        Sparrow Sharp<br>
        Staffing & Recruitment Solutions<br>
    </p>
    <p class="plus-box-p">
        Connecting skilled professionals with the right career opportunities and helping businesses find the talent they need.
    </p>
</div>

<div class="copyright">
    <p>
        © <span class="current-year">2026</span> Sparrow Sharp. All Rights Reserved
    </p>

    <p class="fs-12">
        Developed by
        <a href="https://weboctane.tech" target="_blank">
            <img src="{{ asset('assets/images/logo.jpg') }}" alt="WebOctane Logo" style="height: 18px; width: auto; vertical-align: middle; margin-right: 5px;">
            <strong>WebOctane</strong>
        </a>
    </p>
</div>

			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
