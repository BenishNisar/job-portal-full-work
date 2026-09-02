@extends('Layout.layout')

@section('Content')
<style>
    :root {
        --primary-color: #e91e63;
    }

    .registration-wrapper {
        padding: 90px 0;
    }

    .registration-wrapper .container {
        max-width: 1140px;
    }

    .modern-card {
        border: 1px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        background: #fff;
    }

    .form-header {
        background: transparent;
        padding: 48px 40px 12px;
        text-align: center;
    }

    .form-header h2 {
        color: #1a202c;
        font-weight: 800;
        letter-spacing: -0.5px;
        margin-bottom: 10px;
    }

    .form-header p {
        margin-bottom: 0;
        font-size: 1rem;
    }

    .card-body {
        padding: 22px 40px 48px !important;
    }

    .form-section-header {
        display: flex;
        align-items: center;
        margin: 30px 0 20px;
        color: var(--primary-color);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
    }

    .form-section-header::after {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
        margin-left: 15px;
    }

    .form-label {
        font-size: 0.9rem;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 8px;
    }

    .modern-input {
        background-color: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 16px;
        transition: all 0.3s ease;
        font-size: 0.95rem;
    }

    .modern-input:focus {
        background-color: #fff;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(233, 30, 99, 0.1);
        outline: none;
    }

    .is-invalid {
        border-color: #ff4d4d !important;
        background-color: #fffafa !important;
    }

    .error-feedback {
        color: #ff4d4d;
        font-size: 0.8rem;
        font-weight: 500;
        margin-top: 6px;
        display: block;
        min-height: 20px;
    }

    .submit-btn {
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 16px 40px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(233, 30, 99, 0.2);
        min-width: 220px;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 25px rgba(233, 30, 99, 0.3);
        background: #d81b60;
        color: white;
    }

    .submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }

    .form-submit-wrap {
        padding-top: 18px;
    }

    .file-upload-wrap {
        border: 2px dashed #e2e8f0;
        padding: 16px;
        border-radius: 12px;
        text-align: center;
        background: #fafafa;
    }

    @media (max-width: 991.98px) {
        .registration-wrapper {
            padding: 70px 0;
        }

        .form-header {
            padding: 38px 28px 10px;
        }

        .card-body {
            padding: 18px 28px 38px !important;
        }
    }

    @media (max-width: 767.98px) {
        .registration-wrapper {
            padding: 56px 0;
        }

        .modern-card {
            border-radius: 20px;
        }

        .form-header {
            padding: 32px 20px 8px;
        }

        .form-header h2 {
            font-size: 2rem;
            line-height: 1.2;
        }

        .form-header p {
            font-size: 0.95rem;
        }

        .card-body {
            padding: 16px 20px 32px !important;
        }

        .form-section-header {
            margin: 24px 0 16px;
            font-size: 0.78rem;
        }

        .modern-input {
            padding: 11px 14px;
            font-size: 0.92rem;
        }

        .submit-btn {
            width: 100%;
            min-width: 100%;
            padding: 15px 24px;
        }

        .form-submit-wrap {
            padding-top: 12px;
        }
    }
</style>

<div class="registration-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="modern-card">
                    <div class="form-header">
                        <h2>Register Your Business</h2>
                        <p class="text-muted">Fill in the details to start hiring the best talent.</p>
                    </div>

                    <div class="card-body p-4 p-md-5 pt-0">
                        <form id="companyForm" action="{{ route('Home.company.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-section-header">Company Identity</div>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Company Name *</label>
                                    <input type="text" name="company_name" class="form-control modern-input" placeholder="Enter full legal name">
                                    <div class="error-feedback company_name_error"></div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Industry *</label>
                                    <input type="text" name="industry" class="form-control modern-input" placeholder="e.g. Software, Real Estate">
                                    <div class="error-feedback industry_error"></div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Company Logo</label>
                                    <div class="file-upload-wrap">
                                        <input type="file" name="logo" class="form-control border-0 bg-transparent">
                                        <div class="small text-muted mt-2">Max Size: 2MB (PNG, JPG, WEBP)</div>
                                    </div>
                                    <div class="error-feedback logo_error"></div>
                                </div>
                            </div>

                            <div class="form-section-header">Contact & Reach</div>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">Official Email *</label>
                                    <input type="email" name="email" class="form-control modern-input" placeholder="contact@company.com">
                                    <div class="error-feedback email_error"></div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Phone *</label>
                                    <input type="text" name="phone" class="form-control modern-input" placeholder="+92 ...">
                                    <div class="error-feedback phone_error"></div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Website</label>
                                    <input type="text" name="website" class="form-control modern-input" placeholder="https://yourcompany.com">
                                    <div class="error-feedback website_error"></div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Company Size</label>
                                    <input type="text" name="company_size" class="form-control modern-input" placeholder="e.g. 10 to 50 Employees">
                                    <div class="error-feedback company_size_error"></div>
                                </div>
                            </div>

                            <div class="form-section-header">Location Details</div>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label">City *</label>
                                    <input type="text" name="city" class="form-control modern-input" placeholder="e.g. Karachi">
                                    <div class="error-feedback city_error"></div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Country *</label>
                                    <input type="text" name="country" class="form-control modern-input" placeholder="Pakistan">
                                    <div class="error-feedback country_error"></div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control modern-input" rows="2" placeholder="Enter your office address"></textarea>
                                    <div class="error-feedback address_error"></div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control modern-input" rows="4" placeholder="Tell us about your company culture..."></textarea>
                                    <div class="error-feedback description_error"></div>
                                </div>
                            </div>

                            <div class="text-center form-submit-wrap mt-4">
                                <button type="submit" id="submitBtn" class="submit-btn">
                                    Register Now <i class="fas fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="thankYouModal" tabindex="-1" aria-labelledby="thankYouModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">
            <div class="modal-body text-center p-5">
                <div class="mb-4">
                    <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                </div>
                <h2 class="fw-bold mb-3" id="thankYouModalLabel">Registration Sent!</h2>
                <p class="text-muted mb-4" id="successMessage">
                    Your company details have been submitted successfully.
                </p>
                <button type="button" class="btn btn-dark px-5 rounded-pill" data-bs-dismiss="modal">
                    Got it!
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const companyForm = document.getElementById('companyForm');
    const submitBtn = document.getElementById('submitBtn');
    const modalEl = document.getElementById('thankYouModal');

    if (!companyForm) return;

    companyForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(companyForm);

        document.querySelectorAll('.error-feedback').forEach(el => el.innerHTML = '');
        document.querySelectorAll('.modern-input').forEach(el => el.classList.remove('is-invalid'));
        document.querySelectorAll('input[type="file"]').forEach(el => el.classList.remove('is-invalid'));

        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Submitting...';

        fetch("{{ route('Home.company.store') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            }
        })
        .then(async response => {
            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422 && data.errors) {
                    Object.keys(data.errors).forEach(key => {
                        const field = document.querySelector('[name="' + key + '"]');
                        const errorBox = document.querySelector('.' + key + '_error');

                        if (field) field.classList.add('is-invalid');
                        if (errorBox) errorBox.innerHTML = data.errors[key][0];
                    });
                } else {
                    alert('Something went wrong. Please try again.');
                }
                throw new Error('Validation failed');
            }

            document.getElementById('successMessage').textContent = data.message || 'Your company details have been submitted successfully.';
            companyForm.reset();

            const thankYouModal = new bootstrap.Modal(modalEl);
            thankYouModal.show();
        })
        .catch(error => {
            console.error(error);
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Register Now <i class="fas fa-arrow-right ms-2"></i>';
        });
    });
});
</script>
@endsection
