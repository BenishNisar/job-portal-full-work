<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparrow Sharp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: #fff;
            min-height: 100vh;
        }

        .main-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* Left Side: Form Section */
        .form-section {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px 80px;
            max-width: 600px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #638d3f;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 40px;
            text-decoration: none;
        }

        h2 {
            font-size: 32px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 12px;
        }

        .register-text {
            color: #6b7280;
            font-size: 16px;
            margin-bottom: 40px;
        }

        .register-text a {
            color: #638d3f;
            text-decoration: none;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            font-weight: 600;
            font-size: 14px;
            color: #111827;
            margin-bottom: 8px;
        }

        label span {
            color: #ef4444;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus {
            border-color: #638d3f;
        }

        /* Password Wrapper for Eye Icon */
        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 45px;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            cursor: pointer;
            font-size: 18px;
            background: none;
            border: none;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #374151;
            font-size: 14px;
            cursor: pointer;
        }

        .forgot-link {
            color: #638d3f;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .signin-btn {
            width: 100%;
            background: #638d3f;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .signin-btn:hover {
            background: #547935;
        }

        /* Right Side: Image Section */
        .image-section {
            flex: 1.2;
            background: url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');
            background-size: cover;
            background-position: center;
            display: block;
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 6px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .form-section {
                padding: 40px;
            }
        }

        @media (max-width: 768px) {
            .image-section {
                display: none;
            }
            .form-section {
                max-width: 100%;
                padding: 30px;
            }
        }
    </style>
</head>
<body>

<div class="main-container">
    <div class="form-section">
        <a href="/" class="logo">
            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="SparrowSharp" style="height: 55px; width: auto;">
        </a>

        <h2>Sign in to your account</h2>
        <div class="register-text">
            Not a member? <a href="{{ route('auth.register') }}">Register now</a>
        </div>

        <form action="{{ route('auth.accountlogin.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Email address <span>*</span></label>
                <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Password <span>*</span></label>
                <div class="password-wrapper">
                    <input type="password" id="passwordField" name="password" placeholder="Enter your password" required>
                    <button type="button" class="toggle-password" id="togglePasswordBtn">
                        <i class="fas fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="checkbox-row">
                <label class="checkbox-label">
                    <input type="checkbox" name="remember"> Remember me
                </label>
                <a href="{{ route('auth.forget-password') }}" class="forgot-link">Forgot password?</a>
            </div> --}}

            <button type="submit" class="signin-btn">Sign in</button>
        </form>
    </div>

    <div class="image-section"></div>
</div>

@if(session('success'))
    <div style="position: fixed; top: 20px; right: 20px; background: #10b981; color: white; padding: 15px 25px; border-radius: 8px; z-index: 1000;">
        {{ session('success') }}
    </div>
@endif

<!-- JavaScript to handle Toggle Eye Icon -->
<script>
    const toggleBtn = document.getElementById('togglePasswordBtn');
    const passwordField = document.getElementById('passwordField');
    const eyeIcon = document.getElementById('eyeIcon');

    toggleBtn.addEventListener('click', function () {
        // Toggle the type attribute
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);

        // Toggle the eye / eye-slash icon
        if (type === 'password') {
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    });
</script>

</body>
</html>
