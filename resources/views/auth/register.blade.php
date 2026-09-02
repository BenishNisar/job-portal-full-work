<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparrow Sharp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        :root {
            --primary: #638d3f;
            --primary-hover: #638d3f;
            --text-main: #111827;
            --text-muted: #6b7280;
            --border: #d1d5db;
        }

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
            padding: 40px 8%;
            max-width: 700px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary);
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            text-decoration: none;
        }

        h2 {
            font-size: 30px;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 8px;
        }

        .login-text {
            color: var(--text-muted);
            font-size: 15px;
            margin-bottom: 30px;
        }

        .login-text a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        /* Grid for Inputs */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .full { grid-column: 1 / -1; }

        .form-group {
            margin-bottom: 18px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        label {
            font-weight: 600;
            font-size: 14px;
            color: var(--text-main);
        }

        input {
            width: 100%;
            padding: 11px 16px;
            font-size: 15px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            background: #fff;
            transition: all 0.2s;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        /* Password Wrapper */
        .pw-wrap { position: relative; }
        .pw-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: none;
            cursor: pointer;
            color: var(--text-muted);
        }

        .signup-btn {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }

        .signup-btn:hover { background: var(--primary-hover); }

        .error {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
        }

        /* Right Side: Image Section */
        .image-section {
            flex: 1.2;
            background: url('https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
        }

        @media (max-width: 992px) {
            .image-section { display: none; }
            .form-section { max-width: 100%; padding: 40px 10%; }
        }
    </style>
</head>
<body>

<div class="main-container">
    <div class="form-section">
        {{-- <a href="/" class="logo">
                        <img src="{{ asset('assets/images/logo.jpeg') }}" alt="SparrowSharp" style="height: 40px; width: auto;">

        </a> --}}

        <h2>Create your account</h2>
        <div class="login-text">
            Already have an account? <a href="{{ route('auth.accountlogin') }}">Sign in instead</a>
        </div>

        <form method="POST" action="{{ route('auth.register.store') }}">
            @csrf

            <div class="grid">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="firstname" value="{{ old('firstname') }}" required>
                    @error('firstname') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lastname" value="{{ old('lastname') }}" required>
                    @error('lastname') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group full">
                    <label>Email address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" required>
                    @error('phone') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Mobile (Optional)</label>
                    <input type="tel" name="mobile_phone" value="{{ old('mobile_phone') }}">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div class="pw-wrap">
                        <input type="password" id="password" name="password" required>
                        <button type="button" class="pw-toggle" data-target="password">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                    @error('password') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <div class="pw-wrap">
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                        <button type="button" class="pw-toggle" data-target="password_confirmation">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <button type="submit" class="signup-btn">Create Account</button>
        </form>
    </div>

    <div class="image-section"></div>
</div>

<script>
    document.querySelectorAll('.pw-toggle').forEach(function(btn){
        btn.addEventListener('click', function(){
            const targetId = btn.getAttribute('data-target');
            const input = document.getElementById(targetId);
            const icon = btn.querySelector('i');

            if(input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });
</script>

</body>
</html>
