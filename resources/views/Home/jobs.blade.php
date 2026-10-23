@extends('Layout.layout')
@section('Content')
<style>
    .text-danger {
        color: red;
        font-size: 0.875rem;
        margin-top: 5px;
    }

    .is-invalid {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25) !important;
    }

    .border-dashed {
        border: 2px dashed #dee2e6;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    /* Filter active state */
    .filter-active {
        background-color: #f8f9fa;
        border-left: 3px solid #ff69b4;
    }

    .job-card-item {
        transition: all 0.3s ease;
    }

    .job-card-item.hide {
        display: none !important;
    }

    .form-check-input:checked {
        background-color: #638D3F !important;
        border-color: #638D3F !important;
    }

    .form-check-input:focus {
        border-color: #638D3F !important;
    }

    /* Perfect Mobile Search Visibility Fix */
    @media (max-width: 991px) {
        .search-bar-wrapper {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            display: flex !important;
            flex-direction: column !important;
            gap: 10px !important;
        }
        .search-bar-wrapper input {
            background: #ffffff !important;
            color: #1f2933 !important; /* Text color visible karne ke liye */
            -webkit-text-fill-color: #1f2933 !important;
            border-radius: 12px !important;
            padding: 12px 16px !important;
            height: 50px;
            border: 1px solid #ced4da !important;
            font-size: 1rem;
        }
        .search-bar-wrapper input::placeholder {
            color: #94a3b8 !important;
            opacity: 1;
        }
        .search-bar-wrapper button {
            width: 100% !important;
            border-radius: 12px !important;
            height: 50px;
            margin-top: 0 !important;
        }
    }
</style>

<header class="page-header bg-dark-blue text-white py-5 position-relative overflow-hidden">
    <div class="header-pattern"></div>
    <div class="container position-relative z-2 py-4">
        <div class="row align-items-center g-4">
            <div class="col-lg-8 text-center text-lg-start">
                <span class="badge px-3 py-2 rounded-pill fw-bold mb-2" style="background-color: rgba(99, 141, 63, 0.15); color: var(--sparrow-green); font-size: 0.8rem; letter-spacing: 0.5px;">
                    <i class="fas fa-briefcase me-2"></i>CAREER PORTAL
                </span>
                <h1 class="fw-bold display-5 mb-2">Explore <span style="color: var(--sparrow-green);">Opportunities</span></h1>
                <p class="text-white-50 mb-0">Discover your next career move with professional insights.</p>
            </div>
            <div class="col-lg-4">
                <div class="input-group search-bar-wrapper bg-white rounded-pill p-1 shadow-sm border">
                    <input type="text" id="jobSearchInput" class="form-control border-0 rounded-pill ps-3" placeholder="Search by title, role...">
                    <button class="btn btn-custom rounded-pill px-4 fw-bold" id="searchBtn" style="background-color: var(--sparrow-green); color: white;">Search</button>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="vacancies-section py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3">
                <div class="filters-sidebar bg-white p-4 rounded-4 shadow-sm border border-light sticky-top" style="top: 100px; z-index: 90;">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0 text-dark-blue">Filters</h5>
                        <a href="javascript:void(0);" id="clearAllBtn" class="small fw-bold text-decoration-none" style="color: var(--sparrow-green);">Clear All</a>
                    </div>

                    <div class="filter-group mb-4">
                        <label class="fw-bold mb-2 small text-uppercase text-muted ls-1">Employment Type</label>
                        <div class="form-check mb-2">
                            <input class="form-check-input filter-checkbox" type="checkbox" value="full-time" id="ft" data-filter="type">
                            <label class="form-check-label" for="ft">Full Time</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input filter-checkbox" type="checkbox" value="part-time" id="pt" data-filter="type">
                            <label class="form-check-label" for="pt">Part Time</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-checkbox" type="checkbox" value="remote" id="rm" data-filter="type">
                            <label class="form-check-label" for="rm">Remote Work</label>
                        </div>
                    </div>

                    <hr class="my-4 opacity-25">

                    <div class="filter-group mb-4">
                        <label class="fw-bold mb-2 small text-uppercase text-muted ls-1">Expertise Level</label>
                        <div class="form-check mb-2">
                            <input class="form-check-input filter-checkbox" type="checkbox" value="entry" id="entry" data-filter="level">
                            <label class="form-check-label" for="entry">Entry / Graduate</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input filter-checkbox" type="checkbox" value="mid" id="mid" data-filter="level">
                            <label class="form-check-label" for="mid">Intermediate</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input filter-checkbox" type="checkbox" value="senior" id="senior" data-filter="level">
                            <label class="form-check-label" for="senior">Professional / Senior</label>
                        </div>
                    </div>

                    <hr class="my-4 opacity-25">

                    <div class="filter-group">
                        <label class="fw-bold mb-2 small text-uppercase text-muted ls-1">
                            Expected Salary: $ <span id="salaryValue">0</span>k+
                        </label>
                        <input type="range" class="form-range" min="0" max="500" value="0" id="salaryRange">
                        <div class="d-flex justify-content-between x-small fw-bold text-muted mt-1">
                            <span>$ 0</span><span>$ 500k+</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div id="jobsCount" class="mb-3 text-muted fw-semibold"></div>
                <div class="row g-4" id="jobContainer">
                    @php use Illuminate\Support\Str; @endphp
                    @forelse($jobs as $job)
                        @php
                            $salaryFrom = $job->salary_from ? (int)$job->salary_from : 0;
                            $salaryTo = $job->salary_to ? (int)$job->salary_to : 0;
                            $salaryText = $salaryFrom
                                ? "$" . number_format($salaryFrom) . ($salaryTo ? " - $" . number_format($salaryTo) : "")
                                : "Salary negotiable";
                            $location = trim(($job->city ?? "") . ($job->country ? ", {$job->country}" : ""));

                            $maxSalary = max($salaryFrom, $salaryTo);

                            $exp = Str::lower($job->experience ?? '');
                            $level = "mid";
                            if(Str::contains($exp, ['entry', 'fresh', '0 years', '0', 'intern'])) $level = "entry";
                            if(Str::contains($exp, ['senior', 'lead', 'manager', '5', '5+', '6', '7', '8', '9', '10'])) $level = "senior";

                            $jobTypeRaw = strtolower($job->job_type ?? 'full-time');
                            $jobTypeSlug = $jobTypeRaw;
                            if(str_contains($jobTypeRaw, 'part')) $jobTypeSlug = 'part-time';
                            if(str_contains($jobTypeRaw, 'remote')) $jobTypeSlug = 'remote';
                            if(str_contains($jobTypeRaw, 'full')) $jobTypeSlug = 'full-time';
                        @endphp

                        <div class="col-md-6 job-card-item mb-4"
                             data-type="{{ $jobTypeSlug }}"
                             data-level="{{ $level }}"
                             data-salary="{{ $maxSalary }}"
                             data-title="{{ strtolower($job->position) }}"
                             data-location="{{ strtolower($location) }}">

                           <div class="job-grid-card bg-white p-4 rounded-4 border-0 shadow-sm position-relative d-flex flex-column h-100"
                                data-location="{{ $location ?: 'Location not specified' }}"
                                data-desc="{{ strip_tags($job->description) }}"
                                data-salary-text="{{ $salaryText }}"
                                data-title="{{ $job->position }}"
                                data-id="{{ $job->id }}"
                                data-slug="{{ $job->slug }}">

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-light text-muted border rounded-pill px-3 py-1 small fw-normal">
                                        <i class="far fa-clock me-1"></i> {{ $job->created_at ? $job->created_at->diffForHumans() : 'Recently' }}
                                    </span>
                                    <button class="btn-save-job border-0 bg-transparent p-0" title="Save Job" type="button" data-job-id="{{ $job->id }}">
                                        <i class="far fa-heart fs-5 text-muted"></i>
                                    </button>
                                </div>

                                <h5 class="fw-bold text-dark mb-2">{{ $job->position }}</h5>

                                <div class="d-flex align-items-center gap-3 text-muted small mb-3">
                                    @if($location)
                                        <span><i class="fas fa-map-marker-alt me-1 text-danger"></i> {{ $location }}</span>
                                    @endif
                                    <span><i class="fas fa-briefcase me-1 text-secondary"></i> {{ ucfirst($level) }} Level</span>
                                </div>

                                <p class="text-muted small mb-4 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.5;">
                                    {{ strip_tags($job->description) }}
                                </p>

                                <div class="d-flex flex-wrap gap-2 mb-4">
                                    <span class="badge bg-light text-dark border rounded-pill px-3 py-2 fw-medium">
                                        {{ $job->job_type ?? 'Full Time' }}
                                    </span>
                                    <span class="badge bg-light text-dark border rounded-pill px-3 py-2 fw-medium">
                                        {{ $salaryText }}
                                    </span>
                                </div>

                                <div class="d-flex gap-2 mt-auto action-buttons-wrapper">
                                    <a href="{{ route('Home.jobs-details', ['job' => $job->slug]) }}"
                                       class="btn btn-outline-dark rounded-pill flex-grow-1 py-2 small fw-bold text-decoration-none text-center d-flex align-items-center justify-content-center">
                                        Read More
                                    </a>

                                    @if($job->allow_application)
                                    <button class="btn btn-custom rounded-pill flex-grow-1 btn-apply-trigger py-2 small fw-bold d-flex align-items-center justify-content-center" type="button" style="background-color: var(--sparrow-green); color: white;">
                                        Apply Now
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center p-5">
                            <h5>No jobs found.</h5>
                        </div>
                    @endforelse
                </div>

                @if($jobs->hasPages())
                    <nav class="mt-5 d-flex justify-content-center">
                        {{ $jobs->links() }}
                    </nav>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Apply Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg position-relative">
            <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close"
                style="top: 20px; right: 20px; z-index: 1050; background-color: white; border-radius: 50%; padding: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            </button>

            <div class="row g-0">
                <div class="col-lg-5 bg-light p-4 p-md-5 border-end">
                    <span class="badge px-3 py-1 rounded-pill fw-bold mb-3" style="background-color: rgba(99, 141, 63, 0.15); color: var(--sparrow-green);">Job Details</span>
                    <h2 id="modalJobTitle" class="fw-bold text-dark-blue mb-2">---</h2>
                    <h5 id="modalCompanyName" class="text-muted mb-4">---</h5>
                    <div class="d-flex gap-3 mb-4">
                        <div class="bg-white p-2 px-3 rounded-3 border shadow-sm">
                            <small class="text-muted d-block">Location</small>
                            <span id="modalLocation" class="fw-bold small">---</span>
                        </div>
                        <div class="bg-white p-2 px-3 rounded-3 border shadow-sm">
                            <small class="text-muted d-block">Compensation</small>
                            <span id="modalSalary" class="fw-bold small">---</span>
                        </div>
                    </div>
                    <h6 class="fw-bold text-dark-blue mb-2">Description</h6>
                    <p id="modalDesc" class="text-muted small lh-lg">---</p>
                </div>

                <div class="col-lg-7 p-4 p-md-5 bg-white">
                    <h3 class="fw-bold mb-4 text-dark-blue">Personal Details</h3>

                    <form id="applicationForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="job_id" id="jobIdField" value="">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Full Name *</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Enter full name" value="">
                                <div class="text-danger small mt-1 full_name_error" style="display: none;"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Email Address *</label>
                                <input type="email" name="email" class="form-control" placeholder="email@example.com" value="">
                                <div class="text-danger small mt-1 email_error" style="display: none;"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">Phone Number *</label>
                                <input type="tel" name="phone" class="form-control" placeholder="+92 --- -------" value="">
                                <div class="text-danger small mt-1 phone_error" style="display: none;"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold small text-muted">City *</label>
                                <input type="text" name="city" class="form-control" placeholder="Enter your city" value="">
                                <div class="text-danger small mt-1 city_error" style="display: none;"></div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small text-muted">Message (Optional)</label>
                                <textarea name="message" class="form-control" rows="3" placeholder="Any additional information..."></textarea>
                                <div class="text-danger small mt-1 message_error" style="display: none;"></div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold small text-muted">Upload CV (PDF Preferred) *</label>
                                <div class="upload-area text-center p-4 border-dashed rounded-4 bg-light">
                                    <input type="file" name="cv" id="cvFile" class="d-none" accept=".pdf,.doc,.docx">
                                    <label for="cvFile" class="w-100 cursor-pointer">
                                        <i class="fas fa-cloud-upload-alt fs-1 mb-2" style="color: var(--sparrow-green);"></i>
                                        <p class="mb-0 fw-bold small" id="fileNameDisplay">Click to Select Resume</p>
                                        <small class="text-muted d-block">Max file size: 2MB</small>
                                    </label>
                                </div>
                                <div class="text-danger small mt-1 cv_error" style="display: none;"></div>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn w-100 rounded-pill py-3 fw-bold text-white" id="submitBtn" style="background-color: var(--sparrow-green);">
                                    <span id="submitText">Submit My Application</span>
                                    <span id="loadingSpinner" style="display: none;" class="spinner-border spinner-border-sm"></span>
                                    <i class="fas fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login Required Modal -->
<div class="modal fade" id="loginRequiredModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
            <div class="modal-body p-0">
                <div class="text-center p-5">
                    <div class="mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle shadow-sm"
                         style="width: 85px; height: 85px; background: rgba(99, 141, 63, 0.12);">
                        <i class="fas fa-heart" style="font-size: 32px; color: var(--sparrow-green);"></i>
                    </div>

                    <h3 class="fw-bold text-dark-blue mb-2">Login Required</h3>
                    <p class="text-muted mb-4 px-md-4">
                        Please login or register first to save jobs and access them later from your account.
                    </p>

                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-2">
                        <a href="{{ route('auth.accountlogin') }}" class="btn rounded-pill px-4 py-2 fw-bold text-white" style="background-color: var(--sparrow-green);">
                            Login Now
                        </a>
                        <a href="{{ route('auth.register') }}" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold">
                            Register
                        </a>
                    </div>

                    <button type="button" class="btn btn-link text-muted text-decoration-none mt-3" data-bs-dismiss="modal">
                        Maybe Later
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow-lg text-center p-5">
            <i class="fas fa-check-circle text-success display-1 mb-4"></i>
            <h3 class="fw-bold text-dark-blue">Application Sent!</h3>
            <p class="text-muted">Your application for <strong id="successJobName" style="color: var(--sparrow-green);"></strong> was successful.</p>
            <button class="btn px-5 rounded-pill text-white" data-bs-dismiss="modal" style="background-color: var(--sparrow-green);">Close</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let currentJobSlug = '';
    let currentJobTitle = '';

    // ============== APPLY NOW MODAL CODE ==============
    $(document).on('click', '.btn-apply-trigger', function() {
        const card = $(this).closest('.job-card-item').find('.job-grid-card');
        currentJobSlug = card.data('slug');
        currentJobTitle = card.data('title');

        $('#jobIdField').val(card.data('id'));
        $('#modalJobTitle').text(card.data('title'));
        $('#modalLocation').text(card.data('location'));
        $('#modalSalary').text(card.data('salary-text'));
        $('#modalDesc').text(card.data('desc'));

        $('#applicationForm')[0].reset();
        $('.text-danger').hide();
        $('.form-control').removeClass('is-invalid');
        $('.upload-area').removeClass('is-invalid');
        $('#fileNameDisplay').text('Click to Select Resume');

        $('#applyModal').modal('show');
    });

    // CV File Name Display
    $('#cvFile').on('change', function() {
        if(this.files.length > 0) {
            $('#fileNameDisplay').text(this.files[0].name);
        } else {
            $('#fileNameDisplay').text('Click to Select Resume');
        }
    });

    // ============== AJAX FORM SUBMISSION ==============
    $('#applicationForm').on('submit', function(e) {
        e.preventDefault();

        $('.text-danger').hide();
        $('.form-control').removeClass('is-invalid');
        $('.upload-area').removeClass('is-invalid');

        $('#submitBtn').prop('disabled', true);
        $('#submitText').hide();
        $('#loadingSpinner').show();

        let hasError = false;

        const requiredFields = ['full_name', 'email', 'phone', 'city'];
        requiredFields.forEach(function(field) {
            const value = $(`[name="${field}"]`).val().trim();
            if (!value) {
                $(`.${field}_error`).text('This field is required').show();
                $(`[name="${field}"]`).addClass('is-invalid');
                hasError = true;
            }
        });

        const email = $('[name="email"]').val().trim();
        if (email && !isValidEmail(email)) {
            $('.email_error').text('Please enter a valid email address').show();
            $('[name="email"]').addClass('is-invalid');
            hasError = true;
        }

        if (!$('#cvFile')[0].files.length) {
            $('.cv_error').text('Please upload your CV').show();
            $('.upload-area').addClass('is-invalid');
            hasError = true;
        }

        if (hasError) {
            $('#submitBtn').prop('disabled', false);
            $('#submitText').show();
            $('#loadingSpinner').hide();
            return false;
        }

        let formData = new FormData(this);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        $.ajax({
            url: '/jobs/' + currentJobSlug,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#applyModal').modal('hide');
                $('#successJobName').text(currentJobTitle);
                $('#successModal').modal('show');
                $('#applicationForm')[0].reset();
                $('#fileNameDisplay').text('Click to Select Resume');
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        if (field === 'cv') {
                            $('.cv_error').text(messages[0]).show();
                            $('.upload-area').addClass('is-invalid');
                        } else {
                            $(`.${field}_error`).text(messages[0]).show();
                            $(`[name="${field}"]`).addClass('is-invalid');
                        }
                    });
                } else {
                    console.log(xhr.responseText);
                    alert(xhr.responseText);
                }
            },
            complete: function() {
                $('#submitBtn').prop('disabled', false);
                $('#submitText').show();
                $('#loadingSpinner').hide();
            }
        });
    });

    function isValidEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    $('.form-control').on('input', function() {
        $(this).removeClass('is-invalid');
        const fieldName = $(this).attr('name');
        $(`.${fieldName}_error`).hide();
    });

    // ============== FILTER AND SEARCH FUNCTIONALITY ==============
    function filterJobs() {
        let searchTerm = $('#jobSearchInput').val().toLowerCase().trim();

        let selectedTypes = [];
        $('input[data-filter="type"]:checked').each(function() {
            selectedTypes.push($(this).val());
        });

        let selectedLevels = [];
        $('input[data-filter="level"]:checked').each(function() {
            selectedLevels.push($(this).val());
        });

        let salaryFilter = parseInt($('#salaryRange').val()) || 0;
        let visibleCount = 0;

        $('.job-card-item').each(function() {
            let $job = $(this);
            let jobType = $job.data('type');
            let jobLevel = $job.data('level');
            let jobSalary = parseInt($job.data('salary')) || 0;
            let jobTitle = $job.data('title') || '';
            let jobCompany = $job.data('company') || '';
            let jobLocation = $job.data('location') || '';

            let searchMatch = true;
            if (searchTerm) {
                searchMatch = jobTitle.includes(searchTerm) ||
                           jobCompany.includes(searchTerm) ||
                           jobLocation.includes(searchTerm);
            }

            let typeMatch = selectedTypes.length === 0 || selectedTypes.includes(jobType);
            let levelMatch = selectedLevels.length === 0 || selectedLevels.includes(jobLevel);

            let salaryMatch = true;
            if (salaryFilter > 0) {
                if (jobSalary > 0 && jobSalary < salaryFilter) {
                    salaryMatch = false;
                }
            }

            if (searchMatch && typeMatch && levelMatch && salaryMatch) {
                $job.show();
                visibleCount++;
            } else {
                $job.hide();
            }
        });

        if (visibleCount === 0) {
            if ($('#noJobsMessage').length === 0) {
                $('#jobContainer').append('<div id="noJobsMessage" class="col-12 text-center p-5"><h5>No jobs match your filters.</h5><p class="text-muted">Try adjusting your search criteria.</p></div>');
            }
        } else {
            $('#noJobsMessage').remove();
        }

        $('#jobsCount').text(visibleCount + ' job' + (visibleCount !== 1 ? 's' : '') + ' found');
    }

    $('.filter-checkbox').on('change', filterJobs);

    $('#salaryRange').on('input', function() {
        let value = $(this).val();
        $('#salaryValue').text(value);
        filterJobs();
    });

    $('#clearAllBtn').on('click', function() {
        $('#jobSearchInput').val('');
        $('.filter-checkbox').prop('checked', false);
        $('#salaryRange').val(0);
        $('#salaryValue').text('0');
        filterJobs();
    });

    $('#searchBtn').on('click', function() {
        filterJobs();
    });

    $('#jobSearchInput').on('keyup', function(e) {
        if (e.key === 'Enter') {
            filterJobs();
        }
    });

    filterJobs();

    // ============== SAVE JOB FUNCTIONALITY ==============
    $(document).on('click', '.btn-save-job', function() {
        let button = $(this);
        let jobId = button.data('job-id');

        $.ajax({
            url: '/jobs/' + jobId + '/toggle-save',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.saved) {
                    button.find('i')
                        .removeClass('far')
                        .addClass('fas text-danger');
                } else {
                    button.find('i')
                        .removeClass('fas text-danger')
                        .addClass('far');
                }
            },
            error: function(xhr) {
                if (xhr.status === 401) {
                    let loginRequiredModal = new bootstrap.Modal(document.getElementById('loginRequiredModal'));
                    loginRequiredModal.show();
                } else {
                    alert('Something went wrong.');
                }
            }
        });
    });
});
</script>
@endsection
