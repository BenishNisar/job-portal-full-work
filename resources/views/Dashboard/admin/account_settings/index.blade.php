@extends("Layout.layouttwo")
@section("AdminContent")

@php
    $user = auth()->user();
@endphp

<style>
    :root{
        --rehab-primary:#6b8f86;
        --rehab-primary-soft:#e3f0ec;
        --rehab-accent:#b10937;
        --rehab-dark:#111827;
        --rehab-muted:#6b7280;
        --rehab-border:#e5e7eb;
        --rehab-bg:#f3f4f6;
    }

    .settings-page-wrapper{
        min-height: calc(100vh - 70px);
        padding: 32px 12px 40px;
        background:
            radial-gradient(circle at top left, #e3f0ec 0, #f5f7fa 40%, #ffffff 100%);
        font-family: "Poppins", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .settings-container {
        max-width: 980px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 22px;
        padding: 26px 26px 28px;
        box-shadow: 0 20px 45px rgba(15,23,42,0.12);
        border:1px solid rgba(148,163,184,0.35);
        position:relative;
        overflow:hidden;
    }

    .settings-container::before{
        content:"";
        position:absolute;
        inset:-40%;
        background:
            radial-gradient(circle at 0 0, rgba(107,143,134,0.10), transparent 55%),
            radial-gradient(circle at 100% 0, rgba(177,9,55,0.08), transparent 60%);
        opacity:.9;
        z-index:-1;
    }

    .settings-header{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:16px;
        margin-bottom:20px;
    }
    .settings-header-left{
        display:flex;
        align-items:center;
        gap:14px;
    }

    .settings-avatar-wrap{
        width:60px;
        height:60px;
        border-radius:999px;
        padding:2px;
        background:linear-gradient(135deg,var(--rehab-primary),var(--rehab-primary-soft));
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .settings-avatar-inner{
        width:100%;
        height:100%;
        border-radius:inherit;
        background:#fff;
        overflow:hidden;
        display:flex;
        align-items:center;
        justify-content:center;
        position:relative;
    }
    .settings-avatar-inner img{
        width:100%;
        height:100%;
        object-fit:cover;
    }
    .settings-avatar-initials{
        font-weight:700;
        font-size:22px;
        color:var(--rehab-primary);
    }

    .settings-heading-main{
        font-size:20px;
        font-weight:700;
        color:var(--rehab-dark);
        margin:0;
    }
    .settings-heading-sub{
        font-size:13px;
        color:var(--rehab-muted);
    }
    .settings-badge{
        font-size:11px;
        text-transform:uppercase;
        letter-spacing:.08em;
        padding:4px 10px;
        border-radius:999px;
        background:rgba(236,253,245,0.9);
        color:#047857;
        border:1px solid rgba(16,185,129,0.4);
        display:inline-flex;
        align-items:center;
        gap:6px;
    }
    .settings-badge i{font-size:11px;}

    .settings-header-right{
        text-align:right;
        font-size:12px;
        color:var(--rehab-muted);
    }
    .settings-header-right .label{
        text-transform:uppercase;
        letter-spacing:.08em;
        font-size:11px;
    }
    .settings-header-right .value{
        font-weight:600;
        color:var(--rehab-dark);
    }

    .settings-section-wrapper{
        margin-top:18px;
        display:grid;
        grid-template-columns:minmax(0,2fr) minmax(0,1.4fr);
        gap:18px;
    }
    @media(max-width: 900px){
        .settings-section-wrapper{
            grid-template-columns:1fr;
        }
    }

    .settings-section{
        background:rgba(248,250,252,0.98);
        border-radius:18px;
        padding:18px 18px 14px;
        border:1px solid rgba(209,213,219,0.9);
    }
    .settings-section + .settings-section{
        margin-top:12px;
    }

    .section-title {
        font-size:14px;
        font-weight:600;
        color:var(--rehab-dark);
        margin-bottom:12px;
        display:flex;
        align-items:center;
        gap:8px;
        text-transform:uppercase;
        letter-spacing:.08em;
    }
    .section-title i{
        font-size:15px;
        color:var(--rehab-primary);
    }

    .form-group label {
        font-weight:500;
        margin-bottom:4px;
        display:block;
        font-size:13px;
        color:var(--rehab-dark);
    }
    .form-control {
        border-radius:9px;
        padding:9px 12px;
        border:1px solid var(--rehab-border);
        font-size:14px;
        background:#ffffff;
        transition:border-color .2s, box-shadow .2s, background .2s;
    }
    .form-control:focus {
        outline:none;
        border-color:var(--rehab-primary);
        box-shadow:0 0 0 2px rgba(107,143,134,0.2);
        background:#ffffff;
    }

    .text-danger {
        font-size:12px;
        color:#dc2626;
        margin-top:2px;
        display:block;
    }

    .settings-hint{
        font-size:11px;
        color:var(--rehab-muted);
        margin-top:2px;
    }

    .btn-save {
        background:var(--rehab-accent);
        color:white;
        border:none;
        padding:9px 22px;
        border-radius:999px;
        font-weight:500;
        font-size:14px;
        display:inline-flex;
        align-items:center;
        gap:6px;
        box-shadow:0 10px 22px rgba(177,9,55,0.35);
        transition:.25s ease;
    }
    .btn-save:hover {
        background:#8e072c;
        transform:translateY(-1px);
        box-shadow:0 14px 28px rgba(148,27,74,0.4);
    }

    .settings-meta-card{
        background:#ffffff;
        border-radius:16px;
        padding:14px 14px 10px;
        border:1px solid rgba(226,232,240,0.95);
        font-size:12px;
        color:var(--rehab-muted);
    }
    .settings-meta-card strong{
        color:var(--rehab-dark);
    }
.password-field{
    position: relative;
}

.password-field input{
    padding-right: 42px;
}

.toggle-password{
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6b7280;
    font-size: 14px;
    transition: 0.2s ease;
}

.toggle-password:hover{
    color: #b10937;
}

</style>

<div class="settings-page-wrapper">
    <div class="settings-container">
        @if($user)
            @php
                $initials = ($user->firstname[0] ?? 'R') . ($user->lastname[0] ?? '');
            @endphp

            <div class="settings-header">
                <div class="settings-header-left">
                    <div class="settings-avatar-wrap">
                        <div class="settings-avatar-inner">
                            @if($user->profile_img)
                                <img src="{{ asset($user->profile_img) }}" alt="Profile image">
                            @else
                                <span class="settings-avatar-initials">{{ strtoupper($initials) }}</span>
                            @endif
                        </div>
                    </div>
                    <div>
                        <h1 class="settings-heading-main">Account Settings</h1>
                        <div class="settings-heading-sub">
                            Manage your profile and login for the Rehabrion   doctor panel.
                        </div>
                        <div class="mt-2">
                            <span class="settings-badge">
                                <i class="fas fa-user-md"></i> Doctor / Admin
                            </span>
                        </div>
                    </div>
                </div>

                <div class="settings-header-right d-none d-md-block">
                    <div class="label">Signed in as</div>
                    <div class="value">{{ $user->email }}</div>
                </div>
            </div>

            <form method="POST"
                  action="{{ route('Dashboard.admin.account_settings.update', $user->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="settings-section-wrapper">
                    {{-- LEFT: profile & password --}}
                    <div>
                        <!-- Profile Information -->
                        <div class="settings-section">
                            <div class="section-title">
                                <i class="fas fa-id-card"></i>
                                Profile Information
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="firstname" class="form-control"
                                               value="{{ old('firstname', $user->firstname) }}">
                                        @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="lastname" class="form-control"
                                               value="{{ old('lastname', $user->lastname) }}">
                                        @error('lastname') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Email (login)</label>
                                        <input type="email" name="email" class="form-control"
                                               value="{{ old('email', $user->email) }}" readonly>
                                        <div class="settings-hint">Email is used for secure login and cannot be changed here.</div>
                                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Organization / Clinic</label>
                                        <input type="text" name="organization" class="form-control"
                                               value="{{ old('organization', $user->organization) }}">
                                        @error('organization') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control"
                                               value="{{ old('city', $user->city) }}">
                                        @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" name="country" class="form-control"
                                               value="{{ old('country', $user->country) }}">
                                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label>Profile Image</label>
                                        <input type="file" name="profile_img" class="form-control">
                                        <div class="settings-hint">Square image (min 300x300) looks best in the dashboard.</div>
                                        @error('profile_img') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Password Change -->
                        <div class="settings-section mt-3">
                            <div class="section-title">
                                <i class="fas fa-lock"></i>
                                Change Password
                            </div>
                     <div class="row">
    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label>New Password</label>
            <div class="password-field">
                <input type="password" name="password" id="password" class="form-control">
                <span class="toggle-password" onclick="togglePassword('password', this)">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
            <div class="settings-hint">
                Leave blank if you don’t want to change your password.
            </div>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="form-group">
            <label>Confirm New Password</label>
            <div class="password-field">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                <span class="toggle-password" onclick="togglePassword('password_confirmation', this)">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
        </div>
    </div>
</div>

                        </div>
                    </div>

                    {{-- RIGHT: small info card --}}
                    <div>
                        <div class="settings-meta-card mb-3">
                            <div class="mb-2">
                                <strong>Account summary</strong>
                            </div>
                            <div class="mb-1">
                                <span class="text-muted">Role:</span>
                                <strong>{{ $user->role->name ?? 'Doctor / Admin' }}</strong>
                            </div>
                            <div class="mb-1">
                                <span class="text-muted">Created at:</span>
                                <strong>{{ $user->created_at?->format('d M Y') ?? '—' }}</strong>
                            </div>
                            <div class="mb-1">
                                <span class="text-muted">Last updated:</span>
                                <strong>{{ $user->updated_at?->format('d M Y') ?? '—' }}</strong>
                            </div>
                        </div>

                        <div class="settings-meta-card">
                            <div class="mb-2">
                                <strong>Security tip</strong>
                            </div>
                            <p class="mb-1">
                                Use a strong password that you don’t reuse on other websites.
                            </p>
                            <p class="mb-0">
                                If you suspect any unusual activity, contact the system administrator immediately.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save"></i>
                        Save changes
                    </button>
                </div>
            </form>
        @else
            <div class="alert alert-danger mt-3">
                Please login to access your account settings.
            </div>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Thanks',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK',
        confirmButtonColor: '#3085d6'
    });
</script>
@endif
<script>
function togglePassword(fieldId, icon){
    let input = document.getElementById(fieldId);

    if(input.type === "password"){
        input.type = "text";
        icon.innerHTML = '<i class="fas fa-eye-slash"></i>';
    } else {
        input.type = "password";
        icon.innerHTML = '<i class="fas fa-eye"></i>';
    }
}
</script>

@endsection
