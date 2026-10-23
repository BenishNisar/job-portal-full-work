@extends('Layout.layout')
@section('Content')

<style>
    .sms-consent-text {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 15px;
        border-radius: 12px;
        color: #64748b;
        font-size: 14px;
        line-height: 1.7;
    }

    .sms-consent-text p {
        margin-bottom: 10px;
    }

    .sms-consent-text a {
        color: var(--sparrow-green);
        font-weight: 600;
        text-decoration: underline;
    }

    /* Custom styling to ensure checkbox background turns green when checked */
    .custom-sparrow-checkbox:checked {
        background-color: var(--sparrow-green) !important;
        border-color: var(--sparrow-green) !important;
    }
</style>

{{-- 1. Contact Hero Banner with Background Image --}}
<section class="position-relative overflow-hidden text-white" id="contactBannerSparrow" style="margin-top: 80px; background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ asset('assets/images/contact-us.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container py-5 position-relative z-2 text-center" style="padding-top: 80px !important; padding-bottom: 80px !important;">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <span class="badge px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm" style="background-color: rgba(99, 141, 63, 0.2); color: var(--sparrow-green); border: 1px solid rgba(99, 141, 63, 0.3);">
                    <i class="fas fa-headset me-2"></i>SPARROWSHARP SUPPORT
                </span>
                <h1 class="display-4 fw-bold mb-3 text-shadow-sm">
                    Contact <span style="color: var(--sparrow-green);">Us</span>
                </h1>
                <p class="lead mx-auto text-shadow-sm" style="max-width: 700px; color: rgba(255, 255, 255, 0.85);">
                    Need help with hiring, applying, or partnerships? Send us a message and our team will get back to you promptly.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- 2. Contact Main Section --}}
<section class="contact-main py-5" style="background-color: var(--sparrow-light);">
    <div class="container py-lg-4">
        <div class="row g-4 align-items-stretch">
            {{-- Left Side: Info Cards (Fixed Padding & Alignment) --}}
            <div class="col-lg-4">
                <div class="contact-sidebar h-100 d-flex flex-column p-4 bg-white rounded-4 shadow-sm">
                    <h3 class="fw-bold mb-4" style="color: var(--sparrow-dark);">Get In Touch</h3>
                    {{-- Office Address --}}
                    <div class="info-card-premium d-flex align-items-start mb-4">
                        <div class="icon-wrap fs-4 me-3 mt-1 flex-shrink-0" style="color: var(--sparrow-green);"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="text-wrap">
                            <h6 class="fw-bold mb-1" style="color: var(--sparrow-dark);">Office Address</h6>
                            <p class="text-muted small mb-0">453 S. Spring Street, Suite 1212<br>Los Angeles, CA 90013</p>
                        </div>
                    </div>
                    {{-- Phone --}}
                    <div class="info-card-premium d-flex align-items-start mb-4">
                        <div class="icon-wrap fs-4 me-3 mt-1 flex-shrink-0" style="color: var(--sparrow-green);"><i class="fa-solid fa-phone"></i></div>
                        <div class="text-wrap">
                            <h6 class="fw-bold mb-1" style="color: var(--sparrow-dark);">Call Us</h6>
                            <p class="text-muted small mb-0">+1 424 426 7394</p>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="info-card-premium d-flex align-items-start mb-4">
                        <div class="icon-wrap fs-4 me-3 mt-1 flex-shrink-0" style="color: var(--sparrow-green);"><i class="fas fa-envelope"></i></div>
                        <div class="text-wrap" style="word-break: break-all;">
                            <h6 class="fw-bold mb-1" style="color: var(--sparrow-dark);">Email Us</h6>
                            <p class="text-muted small mb-1">info@sparrowsharp.com</p>
                            <p class="text-muted small mb-1">contact@sparrowsharp.com</p>
                            <p class="text-muted small mb-0">syed.hussain@sparrowsharp.com</p>
                        </div>
                    </div>
                    {{-- Social Links --}}
                    <div class="social-wrapper mt-auto pt-4 border-top">
                        <p class="small fw-bold text-uppercase ls-2 mb-3" style="color: var(--sparrow-muted);">Connect With Us</p>
                        <div class="d-flex gap-3">
                            <a href="https://www.linkedin.com/company/sparrowsharp/" target="_blank" class="social-btn linkedin btn btn-outline-dark rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" title="Connect on LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Right Side: Modern AJAX Form --}}
            <div class="col-lg-8">
                <div class="contact-form-card p-4 p-md-5 bg-white rounded-4 shadow-sm h-100">
                    <h3 class="fw-bold mb-4" style="color: var(--sparrow-dark);">Send a Message</h3>
                    <form id="contactForm" action="{{ route('Home.contact-us.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Full Name">
                                <div class="text-danger small mt-1 name_error" style="display:none;"></div>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Email Address">
                                <div class="text-danger small mt-1 email_error" style="display:none;"></div>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="country" class="form-control" placeholder="Country">
                                <div class="text-danger small mt-1 country_error" style="display:none;"></div>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                <div class="text-danger small mt-1 phone_error" style="display:none;"></div>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control" rows="5" placeholder="Your Message"></textarea>
                                <div class="text-danger small mt-1 message_error" style="display:none;"></div>
                            </div>

                            <div class="col-12">
                                {{-- Professional SMS Consent Box Styling matching theme standards --}}
                                <div class="p-4 rounded-3 border bg-light mb-3">
                                    <div class="form-check ps-0 d-flex align-items-start gap-3">
                                        <input
                                            type="checkbox"
                                            id="sms_consent"
                                            name="sms_consent"
                                            value="1"
                                            class="form-check-input mt-1 flex-shrink-0 ms-0 custom-sparrow-checkbox"
                                            style="width: 20px; height: 20px; cursor: pointer;"
                                        >
                                        <label class="form-check-label text-muted small lh-base cursor-pointer" for="sms_consent" style="text-align: left; font-size: 13.5px;">
                                            I agree to receive communications by text message regarding recruitment updates, job opportunities, application updates, interview scheduling, and other employment related communications from SparrowSharp.
                                        </label>
                                    </div>

                                    <div class="mt-3 text-muted" style="font-size: 11.5px; line-height: 1.6;">
                                        <p class="mb-1">You may opt out by replying stop or ask for more information by replying help. Message frequency varies. Message and data rates may apply.</p>
                                        <p class="mb-0">You may review our <a href="/privacy-policy" target="_blank" style="color: var(--sparrow-green); font-weight: 600; text-decoration: underline;">Privacy Policy</a> to learn how your data is used.</p>
                                    </div>

                                    <div id="sms_consent_error" class="text-danger small mt-2" style="display:none;"></div>
                                </div>
                            </div>
<div class="col-12">
    <div class="g-recaptcha"
         data-sitekey="{{ config('services.recaptcha.site_key') }}">
    </div>

    <div class="text-danger small mt-2 g-recaptcha-response_error"
         style="display:none;">
    </div>
</div>
                            <div class="col-12">
                                <button type="submit" class="btn w-100 rounded-pill py-3 fw-bold text-white shadow" style="background-color: var(--sparrow-green);" id="contactSubmitBtn">
                                    <span id="contactSubmitText">Send Message</span>
                                    <span id="contactLoadingSpinner" class="spinner-border spinner-border-sm ms-2" style="display:none;"></span>
                                </button>
                            </div>
                            <div class="col-12">
                                <div class="alert alert-success mt-3" id="contactSuccessMessage" style="display:none;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- jQuery Ajax Script --}}
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        $('.text-danger').hide().text('');
        $('.form-control').removeClass('is-invalid');
        $('#contactSuccessMessage').hide().text('');

        // Client-side validation check for required checkbox
        if (!$('#sms_consent').is(':checked')) {
            $('#sms_consent_error').text('Please check this box if you want to proceed.').show();
            return;
        }

        $('#contactSubmitBtn').prop('disabled', true);
        $('#contactSubmitText').text('Sending...');
        $('#contactLoadingSpinner').show();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.ok) {
                    $('#contactForm')[0].reset();
                    $('#contactSuccessMessage').text(response.message).show();
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        $('.' + field + '_error').text(messages[0]).show();
                        $('[name="' + field + '"]').addClass('is-invalid');
                    });
                }
            },
            complete: function() {
                $('#contactSubmitBtn').prop('disabled', false);
                $('#contactSubmitText').text('Send Message');
                $('#contactLoadingSpinner').hide();
            }
        });
    });
    $('.form-control').on('input', function() {
        $(this).removeClass('is-invalid');
        let fieldName = $(this).attr('name');
        $('.' + fieldName + '_error').hide().text('');
    });
    $('#sms_consent').on('change', function() {
        if ($(this).is(':checked')) {
            $('#sms_consent_error').hide().text('');
        }
    });
});
</script>
@endsection
