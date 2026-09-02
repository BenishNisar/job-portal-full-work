<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Password</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

  <style>
    :root{
      --mint:#bae0db;
      --teal:#7a958f;
      --tealDark:#5f7a74;
      --ink:#0f172a;
      --muted:#64748b;
      --card:#ffffff;
      --line:rgba(15,23,42,0.10);
      --shadow: 0 18px 50px rgba(15,23,42,0.12);
      --radius: 18px;
    }

    *{ box-sizing:border-box; }
    body{
      margin:0;
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:18px;
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
      color:var(--ink);
      background:
        radial-gradient(900px 520px at 20% 15%, rgba(186,224,219,0.55) 0%, rgba(186,224,219,0.0) 55%),
        radial-gradient(900px 520px at 80% 85%, rgba(122,149,143,0.35) 0%, rgba(122,149,143,0.0) 60%),
        linear-gradient(135deg, #f8fbfb 0%, #f3f7f7 55%, #f8fbfb 100%);
    }
    /* Background overlay (clean, premium, readable) */
    body::before{
      content:"";
      position:fixed;
      inset:0;
      background:
        linear-gradient(135deg, rgba(10,15,25,.68) 0%, rgba(10,15,25,.35) 45%, rgba(10,15,25,.64) 100%),
        radial-gradient(circle at 20% 10%, rgba(186,224,219,.22) 0%, transparent 55%),
        radial-gradient(circle at 80% 90%, rgba(122,149,143,.18) 0%, transparent 55%);
      z-index:0;
      pointer-events:none;
    }

    /* Soft animated blobs for depth */
    body::after{
      content:"";
      position:fixed;
      inset:-120px;
         background-image:url('Dashboard_assets/img/psiotherapistbest.webp');

      filter: blur(18px);
      opacity:.95;
      z-index:0;
      pointer-events:none;
      animation: floaty 10s ease-in-out infinite;
    }

    @keyframes floaty{
      0%{ transform: translate3d(0,0,0) scale(1); }
      50%{ transform: translate3d(10px,-10px,0) scale(1.02); }
      100%{ transform: translate3d(0,0,0) scale(1); }
    }
    .card{
      width:100%;
      max-width:460px;
      border-radius: var(--radius);
      border: 1px solid var(--line);
      background: rgba(255,255,255,0.95);
      box-shadow: var(--shadow);
      padding:22px;
      position:relative;
      overflow:hidden;
    }

    .card::before{
      content:"";
      position:absolute;
      inset:-2px;
      background: linear-gradient(135deg, rgba(186,224,219,0.65), rgba(122,149,143,0.30), rgba(186,224,219,0.15));
      opacity:0.45;
      filter: blur(18px);
      z-index:0;
    }

    .inner{ position:relative; z-index:1; }

    .logo{
      display:flex;
      justify-content:center;
      margin-bottom:12px;
    }
    .logo img{ max-width:270px; height:auto; }

    h3{
      margin:10px 0 6px;
      text-align:center;
      font-size:20px;
      letter-spacing:0.2px;
    }
    p{
      margin:0 0 16px;
      text-align:center;
      color:var(--muted);
      font-size:13px;
      line-height:1.6;
    }

    .field{ margin:12px 0; }

    .control{
      width:100%;
      display:flex;
      gap:10px;
      align-items:center;
      border: 1px solid rgba(15,23,42,0.12);
      background: rgba(255,255,255,0.9);
      padding:12px 12px;
      border-radius: 14px;
      transition: 0.18s ease;
    }
    .control:focus-within{
      border-color: rgba(122,149,143,0.55);
      box-shadow: 0 0 0 4px rgba(186,224,219,0.35);
      transform: translateY(-1px);
    }

    .control i.icon{
      color: rgba(122,149,143,0.95);
      font-size:16px;
      min-width:18px;
    }

    .control input{
      width:100%;
      border:none;
      outline:none;
      background:transparent;
      font-size:14px;
      color: var(--ink);
    }

    .toggle{
      color:#6b7280;
      cursor:pointer;
      font-size:16px;
      padding:4px 6px;
      user-select:none;
    }
    .toggle:hover{ color:#111827; }

    .btn{
      width:100%;
      border:none;
      cursor:pointer;
      border-radius: 14px;
      padding:12px 14px;
      font-weight:800;
      letter-spacing:0.2px;
      font-size:15px;
      background: linear-gradient(135deg, var(--teal) 0%, var(--tealDark) 100%);
      color:#ffffff;
      box-shadow: 0 12px 26px rgba(122,149,143,0.30);
      transition: 0.18s ease;
      margin-top:10px;
    }
    .btn:hover{ transform: translateY(-1px); opacity:0.98; }

    .error{
      margin-top:12px;
      padding:12px;
      border-radius:14px;
      background: rgba(239,68,68,0.08);
      border: 1px solid rgba(239,68,68,0.22);
      color:#991b1b;
      font-size:13px;
      line-height:1.55;
      text-align:center;
    }

    .success{
      margin-top:12px;
      padding:12px;
      border-radius:14px;
      background: rgba(34,197,94,0.10);
      border: 1px solid rgba(34,197,94,0.22);
      color:#14532d;
      font-size:13px;
      line-height:1.55;
      text-align:center;
    }

    .tiny{
      margin:12px 0 0;
      text-align:center;
      font-size:12px;
      color:var(--muted);
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="inner">
      <div class="logo">
        <img src="{{ asset('Dashboard_assets/img/logo.png') }}" alt="logo">
      </div>

      <h3>Reset Password</h3>
      <p>Create a strong password to keep your account protected.</p>

      <form method="POST" action="{{ route('auth.reset-password') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="field">
          <div class="control">
            <i class="fa-solid fa-lock icon"></i>
            <input id="password" type="password" name="password" placeholder="New Password" required>
            <i id="togglePassword" class="fa-solid fa-eye toggle" title="Show password"></i>
          </div>
        </div>

        <div class="field">
          <div class="control">
            <i class="fa-solid fa-shield icon"></i>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required>
            <i id="toggleConfirmPassword" class="fa-solid fa-eye toggle" title="Show password"></i>
          </div>
        </div>

        <button type="submit" class="btn">Update Password</button>

        @if($errors->any())
          <div class="error">{{ $errors->first() }}</div>
        @endif

        @if(session('message'))
          <div class="success">{{ session('message') }}</div>
        @endif

        <div class="tiny">If you did not request this, you can close this page.</div>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      function setupToggle(toggleId, inputId) {
        const toggle = document.getElementById(toggleId);
        const input = document.getElementById(inputId);
        if (!toggle || !input) return;

        toggle.addEventListener('click', function () {
          const isHidden = input.getAttribute('type') === 'password';
          input.setAttribute('type', isHidden ? 'text' : 'password');

          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');

          this.setAttribute('title', isHidden ? 'Hide password' : 'Show password');
        });
      }

      setupToggle('togglePassword', 'password');
      setupToggle('toggleConfirmPassword', 'password_confirmation');
    });
  </script>
</body>
</html>
