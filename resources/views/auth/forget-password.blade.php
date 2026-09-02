<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

  <style>
    :root{
      --mint:#bae0db;
      --teal:#7a958f;
      --tealDark:#5f7a74;
      --bg1:#f6fbfb;
      --bg2:#eef6f5;
      --ink:#0f172a;
      --muted:#64748b;
      --line:rgba(15,23,42,0.12);
      --shadow: 0 18px 50px rgba(15,23,42,0.12);
      --radius: 18px;
    }

    *{ box-sizing:border-box; }

    body{
      margin:0;
      min-height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      padding:18px;
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
      color:var(--ink);
           background-image:url('Dashboard_assets/img/psiotherapistbest.webp');

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
      background:
        radial-gradient(circle at 25% 35%, rgba(186,224,219,.20) 0%, transparent 42%),
        radial-gradient(circle at 80% 20%, rgba(255,255,255,.12) 0%, transparent 38%),
        radial-gradient(circle at 70% 80%, rgba(122,149,143,.18) 0%, transparent 45%);
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
    .login-container{
      width:100%;
      max-width: 420px;
      background: rgba(255,255,255,0.92);
      border: 1px solid var(--line);
      padding: 22px;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      text-align:center;
      position:relative;
      overflow:hidden;
    }

    .login-container::before{
      content:"";
      position:absolute;
      inset:-2px;
      background: linear-gradient(135deg, rgba(186,224,219,0.55), rgba(122,149,143,0.25), rgba(186,224,219,0.12));
      filter: blur(18px);
      opacity:0.45;
      z-index:0;
    }

    .inner{
      position:relative;
      z-index:1;
    }

    .logo{
      display:flex;
      justify-content:center;
      margin-bottom:10px;
    }

    .logo img{
      width: 100%;
      max-width: 280px;
      height:auto;
      display:block;
    }

    h3{
      margin: 8px 0 6px;
      font-size: 20px;
      letter-spacing: 0.2px;
    }

    .sub{
      margin: 0 0 16px;
      font-size: 13px;
      color: var(--muted);
      line-height: 1.6;
    }

    .input-group{
      margin: 12px 0;
      display:flex;
      align-items:center;
      gap:10px;
      border: 1px solid rgba(15,23,42,0.12);
      background: rgba(255,255,255,0.90);
      border-radius: 14px;
      padding: 12px 12px;
      transition: 0.18s ease;
    }

    .input-group:focus-within{
      border-color: rgba(122,149,143,0.55);
      box-shadow: 0 0 0 4px rgba(186,224,219,0.35);
      transform: translateY(-1px);
    }

    .input-group i{
      color: rgba(122,149,143,0.95);
      font-size: 16px;
      min-width: 18px;
    }

    .input-group input{
      border:none;
      outline:none;
      flex:1;
      background:transparent;
      font-size: 14px;
      color: var(--ink);
      padding: 6px 0;
    }

    .input-group input::placeholder{
      color: rgba(100,116,139,0.85);
    }

    .login-btn{
      width:100%;
      border:none;
      border-radius: 14px;
      cursor:pointer;
      font-size: 15px;
      font-weight: 800;
      letter-spacing: 0.2px;
      padding: 12px 14px;
      color:#fff;
      background: linear-gradient(135deg, var(--teal) 0%, var(--tealDark) 100%);
      box-shadow: 0 12px 26px rgba(122,149,143,0.30);
      transition: 0.18s ease;
      margin-top: 8px;
    }

    .login-btn:hover{
      transform: translateY(-1px);
      opacity: 0.98;
    }

    .login-btn:disabled{
      cursor:not-allowed;
      transform:none;
      opacity: 0.55;
      box-shadow:none;
    }

    .msg{
      margin-top: 12px;
      padding: 12px 12px;
      border-radius: 14px;
      border: 1px solid rgba(122,149,143,0.18);
      background: rgba(186,224,219,0.20);
      color:#0b2f2a;
      font-size: 13px;
      line-height: 1.55;
      text-align:center;
    }

    .resendWrap{
      margin-top: 10px;
      font-size: 13px;
      color: var(--muted);
      line-height: 1.5;
    }

    .timer{
      font-weight: 900;
      color: var(--tealDark);
    }

    .footerLink{
      margin-top: 12px;
      font-size: 12px;
      color: var(--muted);
    }

    .footerLink a{
      color: var(--tealDark);
      font-weight: 800;
      text-decoration:none;
    }

    .footerLink a:hover{
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="inner">
      <div class="logo">
        <img src="{{ asset('Dashboard_assets/img/logo.png') }}" alt="logo">
      </div>

      <h3>Forgot Password</h3>
      <p class="sub">Enter your registered email. We will send you a secure reset link.</p>

      <form method="POST" action="{{ route('auth.forget-password') }}">
        @csrf

        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" placeholder="Enter your registered email" required>
        </div>

        <button type="submit" class="login-btn" id="sendBtn">Send Reset Link</button>

        @if(session('message'))
          <div class="msg">{{ session('message') }}</div>

          <div class="resendWrap" id="resendWrap">
            Please check your email. You can resend a link in
            <span class="timer" id="timer">30</span>
            seconds
          </div>

          <button type="submit" id="resendBtn" class="login-btn" disabled>Resend Reset Link</button>
        @endif

        <div class="footerLink">
          Back to <a href="{{ route('auth.accountlogin') }}">Sign in</a>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const timerEl = document.getElementById('timer');
      const resendBtn = document.getElementById('resendBtn');

      if (!timerEl || !resendBtn) return;

      let seconds = 30;
      resendBtn.disabled = true;

      const interval = setInterval(function () {
        seconds--;
        timerEl.textContent = seconds;

        if (seconds <= 0) {
          clearInterval(interval);
          resendBtn.disabled = false;
          timerEl.textContent = "0";
        }
      }, 1000);
    });
  </script>
</body>
</html>
