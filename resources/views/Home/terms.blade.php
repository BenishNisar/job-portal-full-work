@extends('Layout.layout')
@section('Content')

<style>
  :root{
    --brand:#7a958f;
    --brandSoft:#bae0db;
    --ink:#0f172a;
    --muted:#64748b;
    --line:#e2e8f0;
    --card:#ffffff;
  }

  .terms-wrap{
    background: linear-gradient(180deg,#f6fffd 0%, #ffffff 45%, #ffffff 100%);
  }

  .terms-container{
    width:100%;
    max-width: 980px;
    margin:0 auto;
    padding:0 18px;
    position:relative;
    z-index:2;
  }

  .terms-hero{
    position:relative;
    padding: 64px 0;
    overflow:hidden;
    background:
      radial-gradient(800px 300px at 20% 0%, rgba(186,224,219,.55), transparent 60%),
      radial-gradient(700px 280px at 80% 10%, rgba(122,149,143,.35), transparent 55%),
      linear-gradient(135deg, rgba(186,224,219,.35), rgba(255,255,255,1));
    border-bottom: 1px solid rgba(226,232,240,.85);
  }

  .terms-hero:before{
    content:"";
    position:absolute; inset:-40px;
    background-image: radial-gradient(rgba(122,149,143,.22) 1px, transparent 1px);
    background-size: 18px 18px;
    opacity:.14;
    pointer-events:none;
  }

  .terms-title{
    font-size: 44px;
    line-height: 1.1;
    margin:0 0 10px;
    color: var(--ink);
    font-weight: 800;
    letter-spacing: -0.02em;
    text-align:center;
  }

  .terms-sub{
    text-align:center;
    color: var(--muted);
    margin:0;
    font-size: 15px;
  }

  .terms-main{
    padding: 34px 0 64px;
  }

  .terms-card{
    background: var(--card);
    border: 1px solid rgba(226,232,240,.95);
    border-radius: 18px;
    padding: 26px 22px;
    box-shadow: 0 10px 30px rgba(15,23,42,.06);
  }

  .t-lead{
    color:#111827;
    font-size: 16px;
    line-height: 1.75;
    margin: 0 0 14px;
  }

  .t-muted{
    color: var(--muted);
    font-size: 15px;
    line-height: 1.75;
    margin: 0 0 18px;
  }

  .t-h2{
    margin: 26px 0 10px;
    font-size: 20px;
    font-weight: 800;
    color:#111827;
    display:flex;
    align-items:center;
    gap: 10px;
  }

  .t-h2:before{
    content:"";
    width: 10px;
    height: 10px;
    border-radius: 999px;
    background: linear-gradient(135deg,#7a958f,#bae0db);
    box-shadow: 0 6px 16px rgba(122,149,143,.35);
  }

  .t-h3{
    margin: 16px 0 8px;
    font-size: 16px;
    font-weight: 800;
    color: var(--brand);
  }

  .t-divider{
    height:1px;
    background: linear-gradient(90deg, rgba(122,149,143,.35), rgba(226,232,240,1));
    border:0;
    margin: 18px 0 6px;
  }

  .t-ul{
    margin: 0 0 14px;
    padding-left: 18px;
  }

  .t-ul li{
    margin: 8px 0;
    line-height: 1.7;
    color:#111827;
  }

  .t-callout{
    margin: 16px 0;
    padding: 14px;
    border-radius: 14px;
    border: 1px solid rgba(122,149,143,.28);
    background: linear-gradient(180deg, rgba(186,224,219,.30), rgba(255,255,255,1));
  }

  .t-callout p{
    margin:0;
    color:#0f172a;
    line-height: 1.7;
    font-size: 14px;
  }

  .t-note{
    margin: 18px 0 0;
    padding: 14px;
    border-radius: 14px;
    border: 1px solid rgba(239,68,68,.25);
    background: rgba(239,68,68,.08);
    display:flex;
    gap: 10px;
    align-items:flex-start;
  }

  .t-note strong{ color:#b91c1c; }
  .t-note p{
    margin:0;
    color:#7f1d1d;
    line-height: 1.7;
    font-size: 14px;
  }

  .t-contact{
    margin-top: 10px;
    padding: 16px;
    border-radius: 16px;
    border: 1px solid rgba(122,149,143,.35);
    background: linear-gradient(180deg, rgba(186,224,219,.45), rgba(255,255,255,1));
  }

  .t-contact a{
    color:#0f766e;
    font-weight:700;
    text-decoration:none;
  }

  .t-contact a:hover{ text-decoration:underline; }

  .t-footer{
    margin-top: 18px;
    padding-top: 14px;
    border-top: 1px solid var(--line);
    color: var(--muted);
    font-size: 13px;
    line-height: 1.7;
  }

  @media(max-width:576px){
    .terms-title{ font-size: 34px; }
    .terms-hero{ padding: 46px 0; }
    .terms-card{ padding: 20px 16px; border-radius: 16px; }
  }
</style>

<div class="terms-wrap">

  <section class="terms-hero">
    <div class="terms-container">
      <h1 class="terms-title">Terms of Service</h1>
      <p class="terms-sub">Last updated: {{ date('F d, Y') }}</p>
    </div>
  </section>

  <section class="terms-main">
    <div class="terms-container">
      <div class="terms-card">

        <p class="t-lead">
          Welcome to <strong>Rehabrion</strong>. These Terms of Service explain the rules and conditions for using our website
          and accessing our rehabilitation and physiotherapy services. By using our website or booking a service, you agree to these terms.
        </p>

        <div class="t-callout">
          <p>
            <strong style="color:#0f172a;">Important:</strong> Rehabrion provides rehabilitation and physiotherapy support.
            Our content is educational and does not replace emergency care. If you have severe symptoms, chest pain, sudden weakness,
            or any emergency, contact emergency services immediately.
          </p>
        </div>

        <hr class="t-divider">

        <h2 class="t-h2">About Rehabrion</h2>
        <p class="t-muted">
          Rehabrion offers physiotherapy and rehabilitation services including clinic based, home visit, and online sessions
          depending on availability. Service availability may vary by location, therapist schedule, and clinical suitability.
        </p>

        <hr class="t-divider">

        <h2 class="t-h2">Eligibility and Use of Website</h2>
        <ul class="t-ul">
          <li>You must provide accurate information when using our forms, booking requests, or contacting us.</li>
          <li>You agree not to misuse the website, attempt unauthorized access, or interfere with site performance.</li>
          <li>We may update, suspend, or discontinue any part of the website at any time.</li>
        </ul>

        <hr class="t-divider">

        <h2 class="t-h2">Appointments and Bookings</h2>
        <ul class="t-ul">
          <li>Booking requests are subject to confirmation by our team.</li>
          <li>We may request additional information to confirm your appointment and clinical suitability.</li>
          <li>Appointment times may change due to therapist availability, travel constraints, or safety reasons.</li>
        </ul>

        <hr class="t-divider">

        <h2 class="t-h2">Cancellations and Rescheduling</h2>
        <p class="t-muted">
          If you need to cancel or reschedule, please inform us as early as possible. Late cancellations may impact therapist scheduling.
          We may apply a cancellation policy depending on your service type and location.
        </p>

        <hr class="t-divider">

        <h2 class="t-h2">Payments and Charges</h2>
        <ul class="t-ul">
          <li>Prices may vary based on service type, session duration, location, and therapist availability.</li>
          <li>Payment terms will be shared at the time of booking confirmation.</li>
          <li>Any third party payment provider fees, if applicable, are governed by that provider.</li>
        </ul>

        <hr class="t-divider">

        <h2 class="t-h2">Medical Disclaimer</h2>
        <p class="t-muted">
          Rehabrion services are provided by qualified professionals, but outcomes vary by individual. Treatment plans are based on assessment and progress.
          We do not guarantee specific results.
        </p>

        <div class="t-note">
          <div style="font-size:18px; line-height:1;">⚠️</div>
          <div>
            <p>
              <strong>Emergency care:</strong> If you experience severe pain, sudden weakness, breathing difficulty, loss of consciousness,
              or any urgent symptoms, seek immediate emergency medical help.
            </p>
          </div>
        </div>

        <hr class="t-divider">

        <h2 class="t-h2">User Responsibilities</h2>
        <ul class="t-ul">
          <li>Follow therapist instructions during sessions and share accurate medical history.</li>
          <li>Inform us about allergies, major conditions, recent surgeries, or red flag symptoms.</li>
          <li>Maintain a safe environment for home visits, including adequate space and basic hygiene.</li>
        </ul>

        <hr class="t-divider">

        <h2 class="t-h2">Privacy and Data Protection</h2>
        <p class="t-muted">
          Your privacy matters. Please review our Privacy Policy to understand how we collect, store, and protect your data.
          By using our services, you agree to our Privacy Policy.
        </p>

        <hr class="t-divider">

        <h2 class="t-h2">Intellectual Property</h2>
        <p class="t-muted">
          All content on this website including text, graphics, branding, and design is owned by Rehabrion or licensed to us.
          You may not copy, reuse, or distribute content without written permission.
        </p>

        <hr class="t-divider">

        <h2 class="t-h2">Limitation of Liability</h2>
        <p class="t-muted">
          To the maximum extent permitted by law, Rehabrion will not be liable for indirect damages, lost profits, or any loss arising from the use of this website
          or services, except where liability cannot be excluded by law.
        </p>

        <hr class="t-divider">

        <h2 class="t-h2">Changes to These Terms</h2>
        <p class="t-muted">
          We may update these Terms from time to time. Updates will be effective when posted on this page, and the last updated date will change.
          Continued use means you accept the updated terms.
        </p>

        <hr class="t-divider">

        <h2 class="t-h2">Contact Us</h2>
        <p class="t-muted">
          If you have questions about these Terms, contact us using the details below.
        </p>

        <div class="t-contact">
          <p class="t-lead" style="margin-bottom:10px;"><strong>Rehabrion</strong></p>
          <p class="t-muted" style="margin-bottom:8px;">
            Email: <a href="mailto:info@rehabrion.com">info@rehabrion.com</a>
          </p>
          <p class="t-muted" style="margin-bottom:8px;">
            Phone or WhatsApp: +971 50 565 3483
          </p>
          <p class="t-muted" style="margin-bottom:0;">
            Address: Add your clinic or office address here
          </p>
        </div>

        <div class="t-footer">
          These Terms are general guidance and may need legal review for your jurisdiction. If you want, I can tailor them to Pakistan or UAE compliance based on your operating location.
        </div>

      </div>
    </div>
  </section>

</div>

@endsection
