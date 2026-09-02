@extends("Layout.layout")
@section("Content")

<style>
  :root{
    --rp:#7a958f;        /* primary teal */
    --rp2:#bae0db;       /* soft mint */
    --ink:#0f172a;       /* deep text */
    --muted:#64748b;     /* muted text */
    --card:#ffffff;
    --line:#e2e8f0;
  }

  .pp-wrap{
    background: linear-gradient(180deg,#f6fffd 0%, #ffffff 40%, #ffffff 100%);
  }

  .pp-container{
    width:100%;
    max-width: 980px;
    margin:0 auto;
    padding:0 18px;
    position: relative;
    z-index:2;
  }

  .pp-hero{
    position: relative;
    padding: 64px 0;
    overflow:hidden;
    background:
      radial-gradient(800px 300px at 20% 0%, rgba(186,224,219,.55), transparent 60%),
      radial-gradient(700px 280px at 80% 10%, rgba(122,149,143,.35), transparent 55%),
      linear-gradient(135deg, rgba(186,224,219,.35), rgba(255,255,255,1));
    border-bottom: 1px solid rgba(226,232,240,.8);
  }

  .pp-hero:before{
    content:"";
    position:absolute; inset:-40px;
    background-image: radial-gradient(rgba(122,149,143,.22) 1px, transparent 1px);
    background-size: 18px 18px;
    opacity:.14;
    pointer-events:none;
  }

  .pp-title{
    font-size: 44px;
    line-height: 1.1;
    margin:0 0 10px;
    color: var(--ink);
    font-weight: 800;
    letter-spacing: -0.02em;
    text-align:center;
        margin-top: 44px;
  }

  .pp-sub{
    text-align:center;
    color: var(--muted);
    margin:0;
    font-size: 15px;
  }

  .pp-main{
    padding: 34px 0 64px;
  }

  .pp-card{
    background: var(--card);
    border: 1px solid rgba(226,232,240,.95);
    border-radius: 18px;
    padding: 26px 22px;
    box-shadow: 0 10px 30px rgba(15,23,42,.06);
  }

  .pp-lead{
    color: #111827;
    /* font-size: 16px; */
    line-height: 1.75;
    margin: 0 0 14px;
  }

  .pp-muted{
    color: var(--muted);
    /* font-size: 15px; */
    line-height: 1.75;
    margin: 0 0 18px;
  }

  .pp-h2{
    margin: 26px 0 10px;
    font-size: 20px;
    font-weight: 800;
    color: #111827;
    display:flex;
    align-items:center;
    gap: 10px;
  }

  .pp-h2:before{
    content:"";
    width: 10px;
    height: 10px;
    border-radius: 999px;
    background: linear-gradient(135deg,#7a958f,#bae0db);
    box-shadow: 0 6px 16px rgba(122,149,143,.35);
  }

  .pp-h3{
    margin: 16px 0 8px;
    font-size: 16px;
    font-weight: 800;
    color: #7a958f;
  }

  .pp-divider{
    height:1px;
    background: linear-gradient(90deg, rgba(122,149,143,.35), rgba(226,232,240,1));
    border:0;
    margin: 18px 0 6px;
  }

  .pp-ul{
    margin: 0 0 14px;
    padding-left: 18px;
    color: #0f172a;
  }

  .pp-ul li{
    margin: 8px 0;
    line-height: 1.7;
    color:#111827;
  }

  .pp-contact{
    margin-top: 10px;
    padding: 16px;
    border-radius: 16px;
    border: 1px solid rgba(122,149,143,.35);
    background: linear-gradient(180deg, rgba(186,224,219,.45), rgba(255,255,255,1));
  }

  .pp-contact a{
    color: #7a958f;
    font-weight: 700;
    text-decoration: none;
  }

  .pp-contact a:hover{
    text-decoration: underline;
  }

  .pp-note{
    margin: 18px 0 0;
    padding: 14px;
    border-radius: 14px;
    border: 1px solid rgba(239,68,68,.25);
    background: rgba(239,68,68,.08);
    display:flex;
    gap: 10px;
    align-items:flex-start;
  }

  .pp-note strong{
    color:#b91c1c;
  }

  .pp-note p{
    margin:0;
    color:#7f1d1d;
    line-height: 1.7;
    font-size: 14px;
  }

  .pp-footer{
    margin-top: 18px;
    padding-top: 14px;
    border-top: 1px solid var(--line);
    color: var(--muted);
    font-size: 13px;
    line-height: 1.7;
  }

  @media(max-width:576px){
    .pp-title{ font-size: 34px; }
    .pp-hero{ padding: 46px 0; }
    .pp-card{ padding: 20px 16px; border-radius: 16px; }
  }
</style>

<div class="pp-wrap">

  <section class="pp-hero">
    <div class="pp-container">
      <h1 class="pp-title">Privacy Policy</h1>
      <p class="pp-sub">Last updated: {{ date('F d, Y') }}</p>
    </div>
  </section>

  <section class="pp-main">
    <div class="pp-container">

      <div class="pp-card">

    <p class="pp-lead">
At <strong>SparrowSharp</strong>, your privacy and trust are important to us. This Privacy Policy explains how we collect, use, protect, and manage your personal information when you visit our website, contact us, apply for opportunities, or use our recruitment services.
</p>

<p class="pp-muted">
By using our website or providing your information to SparrowSharp, you agree to the practices described in this Privacy Policy.
</p>


<hr class="pp-divider">


<h2 class="pp-h2">1. Who We Are</h2>

<p class="pp-muted">
SparrowSharp is a professional recruitment company focused on connecting exceptional talent with organisations that value the right people. We work closely with clients and candidates to understand their goals, requirements, and career opportunities while maintaining confidentiality and professional standards.
</p>


<hr class="pp-divider">


<h2 class="pp-h2">2. Information We Collect</h2>

<p class="pp-muted">
We may collect personal information when you interact with our website, submit your details, apply for jobs, or communicate with our recruitment team.
</p>

<ul class="pp-ul">
<li>Name and contact information</li>
<li>Email address and phone number</li>
<li>CV, resume, and employment history</li>
<li>Education details, skills, and professional experience</li>
<li>Career preferences and job application information</li>
<li>Messages and enquiries submitted through our website</li>
</ul>


<hr class="pp-divider">


<h2 class="pp-h2">3. How We Use Your Information</h2>

<p class="pp-muted">
SparrowSharp uses your information to provide effective recruitment services and create meaningful connections between candidates and organisations.
</p>

<ul class="pp-ul">
<li>To match candidates with suitable job opportunities</li>
<li>To support organisations with recruitment requirements</li>
<li>To communicate regarding applications, interviews, and vacancies</li>
<li>To improve our recruitment services and website experience</li>
<li>To maintain professional relationships with clients and candidates</li>
<li>To comply with legal and business requirements</li>
</ul>


<hr class="pp-divider">


<h2 class="pp-h2">4. Candidate Information</h2>

<p class="pp-muted">
Candidates may provide information such as CVs, employment history, qualifications, and career preferences. SparrowSharp may share relevant candidate information with potential employers when suitable opportunities are identified.
</p>


<hr class="pp-divider">


<h2 class="pp-h2">5. Client Information</h2>

<p class="pp-muted">
For organisations using our recruitment services, we may collect company details, hiring requirements, and role specifications to deliver suitable recruitment solutions.
</p>


<hr class="pp-divider">


<h2 class="pp-h2">6. Sharing Your Information</h2>

<p class="pp-muted">
SparrowSharp does not sell, rent, or trade your personal information. Your information may only be shared when necessary for recruitment purposes or where required by law.
</p>

<ul class="pp-ul">
<li>With employers for relevant job opportunities</li>
<li>With trusted service providers supporting our operations</li>
<li>With legal authorities where required by applicable laws</li>
</ul>


<hr class="pp-divider">


<h2 class="pp-h2">7. Data Security</h2>

<p class="pp-muted">
We take reasonable measures to protect your personal information from unauthorised access, misuse, loss, or disclosure. While we work to keep your information secure, no online system can guarantee complete security.
</p>


<hr class="pp-divider">


<h2 class="pp-h2">8. Cookies and Website Usage</h2>

<p class="pp-muted">
Our website may use cookies and similar technologies to improve user experience, analyse website performance, and understand visitor interaction with our website.
</p>


<hr class="pp-divider">


<h2 class="pp-h2">9. Your Rights</h2>

<p class="pp-muted">
You may request access, correction, or deletion of your personal information where applicable. You may also contact us if you have concerns regarding how your information is handled.
</p>


<hr class="pp-divider">


<h2 class="pp-h2">10. Third Party Links</h2>

<p class="pp-muted">
Our website may contain links to third party websites, including professional platforms such as LinkedIn. SparrowSharp is not responsible for the privacy practices of external websites.
</p>


<hr class="pp-divider">


<h2 class="pp-h2">11. Changes To This Privacy Policy</h2>

<p class="pp-muted">
SparrowSharp may update this Privacy Policy from time to time to reflect changes in our services, business practices, or legal requirements. Any updates will be published on this page.
</p>


<hr class="pp-divider">


<h2 class="pp-h2">12. Contact Us</h2>

<div class="pp-contact">

<p class="pp-lead">
<strong>SparrowSharp</strong>
</p>

<p class="pp-muted">
453 S. Spring Street, Suite 1212<br>
Los Angeles, CA 90013
</p>

<p class="pp-muted">
Phone: +1 424 426 7394
</p>

<p class="pp-muted">
Email:<br>
syed.hussain@sparrowsharp.com<br>
info@sparrowsharp.com<br>
contact@sparrowsharp.com
</p>

<p class="pp-muted">
LinkedIn:
<a href="https://www.linkedin.com/company/sparrowsharp/" target="_blank">
SparrowSharp LinkedIn
</a>
</p>

</div>


<div class="pp-note">
<div style="font-size:18px; line-height:1;">⚠️</div>
<div>
<p>
<strong>Important Note:</strong> This Privacy Policy is provided for general informational purposes and does not constitute legal advice. Please consult a qualified legal professional to ensure compliance with applicable privacy laws.
</p>
</div>
</div>


<div class="pp-footer">
SparrowSharp is committed to maintaining trust, transparency, and confidentiality in every interaction with our clients and candidates.
</div>
          </div>
        </div>

  
      </div>

    </div>
  </section>

</div>

@endsection
