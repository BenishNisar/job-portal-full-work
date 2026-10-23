@extends('Layout.layout')
@section('Content')

<style>
    .job-detail-header {
        background: linear-gradient(135deg, #1f2933, #34495e) !important;
        color: white !important;
    }

    .job-detail-header h1 {
        color: white !important;
    }

    .job-detail-header p {
        color: rgba(255,255,255,0.7) !important;
    }

    .job-detail-header .breadcrumb-item,
    .job-detail-header .breadcrumb-item.active {
        color: white !important;
    }

    /* Professional Mobile Header Optimization (Icon Removed) */
    @media (max-width: 991px) {
        .job-detail-header {
            text-align: center;
                 padding-top: 105px !important;
            padding-bottom: 40px !important;
        }
        .job-detail-header .d-flex-mobile {
            flex-direction: column !important;
            align-items: center !important;
            text-align: center !important;
        }
        .job-detail-header h1 {
            font-size: 1.75rem !important;
        }
        .job-detail-apply-btn {
            width: 100% !important;
        }
    }
</style>

@php
    use Illuminate\Support\Str;

    $location = trim(($job->city ?? "") . ($job->state ? ", {$job->state}" : "") . ($job->country ? ", {$job->country}" : ""));
    $location = $location ?: "Location not specified";

    $salaryText = "Salary negotiable";
    if ($job->salary_from && $job->salary_to) $salaryText = "PKR {$job->salary_from} to {$job->salary_to}";
    elseif ($job->salary_from) $salaryText = "PKR {$job->salary_from}";
    elseif ($job->salary_to) $salaryText = "PKR {$job->salary_to}";

    $posted = $job->posted_date ? \Carbon\Carbon::parse($job->posted_date)->format('M d, Y') : optional($job->created_at)->format('M d, Y');

    $descShort = Str::limit(strip_tags($job->description ?? ''), 200, "...");
@endphp

<!-- CSRF Token for AJAX -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="job-detail-header bg-dark-blue text-white py-5">
    <div class="container pt-3 pb-4">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0 justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item">
                    <a href="{{ route('Home.jobs') }}" class="text-white-50 text-decoration-none small">Vacancies</a>
                </li>
                <li class="breadcrumb-item active text-white small" aria-current="page">Job Details</li>
            </ol>
        </nav>

        <div class="row align-items-center pt-2">
            <div class="col-lg-8">
                <!-- Icon completely removed, clean typography layout -->
                <div class="d-flex d-flex-mobile align-items-start gap-3">
                    <div>
                        <h1 class="fw-bold display-6 mb-2">{{ $job->position }}</h1>
                        <p class="lead text-white-50 mb-0">{{ $job->company_name }} &bull; {{ $location }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                @if($job->allow_application == 1)
                    <button class="btn btn-custom px-5 py-3 rounded-pill fw-bold shadow-lg job-detail-apply-btn" type="button" style="background-color: var(--sparrow-green); color: white;">
                        Apply For This Position <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="job-body-section py-5 bg-light">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="card border-0 rounded-4 shadow-sm p-4 p-md-5">
                    <h4 class="fw-bold text-dark-blue mb-4">Job Description</h4>

                  @if(!empty($job->description))
    <p class="text-muted lh-lg">
        {{ strip_tags($job->description) }}
    </p>
@endif

                    @if(!empty($job->long_description))
                        <div class="text-muted lh-lg">
                            {!! $job->long_description !!}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px; z-index: 10;">
                    <div class="card border-0 rounded-4 shadow-sm p-4 mb-4">
                        <h5 class="fw-bold text-dark-blue mb-4">Job Overview</h5>

                        <div class="overview-item d-flex gap-3 mb-4">
                            <div class="icon-box rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: rgba(99, 141, 63, 0.12); color: var(--sparrow-green);">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Date Posted</small>
                                <span class="fw-bold small">{{ $posted }}</span>
                            </div>
                        </div>

                        <div class="overview-item d-flex gap-3 mb-4">
                            <div class="icon-box rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: rgba(99, 141, 63, 0.12); color: var(--sparrow-green);">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Monthly Salary</small>
                                <span class="fw-bold small">{{ $salaryText }}</span>
                            </div>
                        </div>

                        <div class="overview-item d-flex gap-3 mb-4">
                            <div class="icon-box rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: rgba(99, 141, 63, 0.12); color: var(--sparrow-green);">
                                <i class="fas fa-user-clock"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Job Type</small>
                                <span class="fw-bold small">{{ $job->job_type ?? "Not specified" }}</span>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <button class="btn btn-outline-dark w-100 rounded-pill fw-bold mb-3 btn-save-job-detail" type="button" data-job-id="{{ $job->id }}">
                            <i class="far fa-heart me-2"></i>
                            <span class="save-job-detail-text">Save This Job</span>
                        </button>

                        @if($job->allow_application == 1)
                        <button class="btn w-100 rounded-pill fw-bold py-3 shadow job-detail-apply-btn text-white" type="button" style="background-color: var(--sparrow-green);">
                            Apply Now
                        </button>
                        @endif
                    </div>

                    <div class="card border-0 rounded-4 shadow-sm p-4 text-center">
                        <h6 class="fw-bold text-dark-blue mb-3">Share This Vacancy</h6>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-btn"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-btn"><i class="fas fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hidden Job Data for JavaScript -->
<div id="jobDetailData"
     data-title="{{ $job->position }}"
     data-company="{{ $job->company_name }}"
     data-location="{{ $location }}"
     data-salary="{{ $salaryText }}"
     data-desc="{{ $descShort }}"
     data-slug="{{ $job->slug }}"
     data-job-id="{{ $job->id }}"
     data-is-saved="{{ auth()->check() && \App\Models\SavedJob::where('user_id', auth()->id())->where('job_id', $job->id)->exists() ? '1' : '0' }}"
     style="display: none;">
</div>

<!-- Apply Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg position-relative">
            <button type="button" class="btn-close position-absolute" data-bs-dismiss="modal" aria-label="Close"
                style="top: 20px; right: 20px; z-index: 1050; background-color: white; border-radius: 50%; padding: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            </button>

            <div class="row g-0">
                <div class="col-lg-5 bg-light p-4 p-md-5 border-end">
                    <span class="badge px-3 py-1 rounded-pill fw-bold mb-3" style="background-color: rgba(99, 141, 63, 0.12); color: var(--sparrow-green);">Job Details</span>
                    <h2 id="modalJobTitle" class="fw-bold text-dark-blue mb-2">{{ $job->position }}</h2>
                    <h5 id="modalCompanyName" class="text-muted mb-4">{{ $job->company_name }}</h5>
                    <div class="d-flex gap-3 mb-4">
                        <div class="bg-white p-2 px-3 rounded-3 border shadow-sm">
                            <small class="text-muted d-block">Location</small>
                            <span id="modalLocation" class="fw-bold small">{{ $location }}</span>
                        </div>
                        <div class="bg-white p-2 px-3 rounded-3 border shadow-sm">
                            <small class="text-muted d-block">Compensation</small>
                            <span id="modalSalary" class="fw-bold small">{{ $salaryText }}</span>
                        </div>
                    </div>
                    <h6 class="fw-bold text-dark-blue mb-2">Description</h6>
                    <p id="modalDesc" class="text-muted small lh-lg">{{ $descShort }}</p>
                </div>

                <div class="col-lg-7 p-4 p-md-5 bg-white">
                    <h3 class="fw-bold mb-4 text-dark-blue">Personal Details</h3>

                    <form id="applicationForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="job_id" id="jobIdField" value="{{ $job->slug }}">

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
            <p class="text-muted">Your application for <strong id="successJobName" style="color: var(--sparrow-green);">{{ $job->position }}</strong> was successful.</p>
            <button class="btn px-5 rounded-pill text-white" data-bs-dismiss="modal" style="background-color: var(--sparrow-green);">Close</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let jobSlug = $('#jobDetailData').data('slug');
    let jobTitle = $('#jobDetailData').data('title');
    let jobCompany = $('#jobDetailData').data('company');
    let jobLocation = $('#jobDetailData').data('location');
    let jobSalary = $('#jobDetailData').data('salary');
    let jobDesc = $('#jobDetailData').data('desc');

    $('.job-detail-apply-btn').on('click', function() {
        $('#jobIdField').val(jobSlug);
        $('#modalJobTitle').text(jobTitle);
        $('#modalCompanyName').text(jobCompany);
        $('#modalLocation').text(jobLocation);
        $('#modalSalary').text(jobSalary);
        $('#modalDesc').text(jobDesc);

        $('#applicationForm')[0].reset();
        $('.text-danger').hide();
        $('.form-control').removeClass('is-invalid');
        $('.upload-area').removeClass('is-invalid');
        $('#fileNameDisplay').text('Click to Select Resume');

        $('#applyModal').modal('show');
    });

    $('#cvFile').on('change', function() {
        if(this.files.length > 0) {
            $('#fileNameDisplay').text(this.files[0].name);
        }
    });

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
            url: '/jobs/' + jobSlug,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                $('#applyModal').modal('hide');
                $('#successJobName').text(jobTitle);
                $('#successModal').modal('show');
                $('#applicationForm')[0].reset();
                $('#fileNameDisplay').text('Click to Select Resume');
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $('.text-danger').hide();
                    $('.form-control').removeClass('is-invalid');
                    $('.upload-area').removeClass('is-invalid');

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
                    alert('Something went wrong. Please try again.');
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
});
</script>

<script>
$(document).ready(function() {
    let detailSaveButton = $('.btn-save-job-detail');
    let isSaved = $('#jobDetailData').data('is-saved');

    function updateDetailSaveButton(saved) {
        if (saved == 1 || saved === '1' || saved === true) {
            detailSaveButton
                .removeClass('btn-outline-dark')
                .addClass('btn-danger');

            detailSaveButton.find('i')
                .removeClass('far')
                .addClass('fas');

            detailSaveButton.find('.save-job-detail-text').text('Saved');
        } else {
            detailSaveButton
                .removeClass('btn-danger')
                .addClass('btn-outline-dark');

            detailSaveButton.find('i')
                .removeClass('fas')
                .addClass('far');

            detailSaveButton.find('.save-job-detail-text').text('Save This Job');
        }
    }

    updateDetailSaveButton(isSaved);

    $(document).on('click', '.btn-save-job-detail', function() {
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
                    updateDetailSaveButton(1);
                } else {
                    updateDetailSaveButton(0);
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
