@extends('Layout.layout')
@section('Content')

{{-- 1. Contact Hero Banner with Background Image --}}
<section class="position-relative overflow-hidden text-white" id="contactBannerSparrow" style="margin-top: 80px; background-image: linear-gradient(rgba(15, 23, 42, 0.75), rgba(15, 23, 42, 0.75)), url('{{ asset('assets/images/about-us.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="container py-5 position-relative z-2 text-center" style="padding-top: 80px !important; padding-bottom: 80px !important;">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                <span class="badge px-3 py-2 rounded-pill fw-bold mb-3 shadow-sm" style="background-color: rgba(99, 141, 63, 0.2); color: var(--sparrow-green); border: 1px solid rgba(99, 141, 63, 0.3);">
                    <i class="fas fa-headset me-2"></i>SPARROWSHARP RECRUITMENT
                </span>
                <h1 class="display-4 fw-bold mb-3 text-shadow-sm">
                    About <span style="color: var(--sparrow-green);">Us</span>
                </h1>
                <p class="lead mx-auto text-shadow-sm" style="max-width: 700px; color: rgba(255, 255, 255, 0.85);">
                    Founded with a clear vision to make recruitment more effective, reliable, and people-focused.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="leadership-section py-5 bg-white overflow-hidden">
    <div class="container py-lg-5">
        <div class="row align-items-center g-5">


            <div class="col-lg-5 position-relative">
                <div class="leader-image-frame animate__animated animate__fadeInLeft">
                    <div class="frame-border"></div>
                    <img src="https://i.pravatar.cc/600?img=68" alt="General Manager" class="img-fluid rounded-4 shadow-2xl main-leader-img">


                    <div class="experience-tag bg-pink text-white p-3 rounded-4 shadow-lg animate__animated animate__bounceIn animate__delay-1s">
                        <span class="d-block h4 fw-bold mb-0">25+</span>
                        <small class="text-uppercase ls-1">Years Experience</small>
                    </div>
                </div>
            </div>


            <div class="col-lg-7 ps-lg-5 animate__animated animate__fadeInRight">
                <div class="leadership-content">
                    <span class="text-pink fw-bold text-uppercase ls-2 small mb-2 d-block">Leadership Message</span>


                    <h2 class="display-5 fw-bold text-dark-blue mb-1">Adrian <span class="text-pink">Roberts</span></h2>
                    <h5 class="text-muted fw-medium mb-4 italic-role">General Manager - JobPortal Pro</h5>

                    <div class="content-divider mb-4"></div>

                    <p class="lead text-dark-blue fw-medium mb-4">
                        "Recruitment is not just about filling roles; it's about building legacies for businesses and candidates alike."
                    </p>

                    <p class="text-muted lh-lg mb-5">
                        Adrian brings over two decades of international recruitment expertise to Australia. His vision for 2026 is to blend human empathy with AI efficiency, ensuring that every connection made through JobPortal Pro is meaningful, transparent, and long-lasting. He believes that honesty and deep industry knowledge are the keys to a successful placement.
                    </p>


                    <div class="d-flex align-items-center gap-4">
                        <div class="signature-box">
                            <img src="https://jobportal.weboctane.org/assets/images/signature.png" alt="Signature" class="img-fluid signature-img">
                        </div>
                        <div class="social-links-minimal">
                            <a href="https://www.linkedin.com/company/sparrowsharp/" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
{{-- 2. Main Narrative & Vision Section (Redesigned Modern Layout) --}}
<section class=" bg-white">
    <div class="container py-lg-5">
        <div class="row align-items-center g-5">
            {{-- Left Side: Title & Accent Box --}}
            <div class="col-lg-4">
                <div class="pe-lg-4">
                    <span class="badge px-3 py-2 rounded-pill fw-bold mb-3" style="background-color: rgba(99, 141, 63, 0.1); color: var(--sparrow-green);">
                        WHO WE ARE
                    </span>
                    <h2 class="fw-bold display-6 mb-3" style="color: var(--sparrow-dark);">
                        Our Vision & <span style="color: var(--sparrow-green);">Approach</span>
                    </h2>
                    <p class="text-muted mb-4">
                        Driving excellence in recruitment through dedication, personal touch, and long-term professional relationships.
                    </p>
                    <div class="p-4 rounded-4 shadow-sm border-start border-4" style="background-color: var(--sparrow-light); border-color: var(--sparrow-green) !important;">
                        <h6 class="fw-bold mb-1" style="color: var(--sparrow-dark);"><i class="fas fa-check-circle me-2" style="color: var(--sparrow-green);"></i> Trusted Standards</h6>
                        <p class="small text-muted mb-0">Committed to integrity, value delivery, and matching the right people with the right organizations.</p>
                    </div>
                </div>
            </div>

            {{-- Right Side: Exact Content Paragraphs with Clean Cards/Spacing --}}
            <div class="col-lg-8">
                <div class="bg-light p-4 p-md-5 rounded-4 shadow-sm border border-light">
                    <p class="mb-4 lh-lg" style="color: var(--sparrow-dark); font-size: 1.05rem;">
                        Founded with a clear vision to make recruitment more effective, reliable, and people-focused, <strong>SparrowSharp</strong> is dedicated to connecting exceptional talent with organisations that value the right people.
                    </p>

                    <p class="mb-4 lh-lg" style="color: var(--sparrow-muted);">
                        Our team of experienced recruitment consultants works closely with both clients and candidates to understand their individual needs, challenges, and goals. We take a thorough and personal approach to every search, ensuring we deliver the right talent for each organisation and the right opportunities for every candidate.
                    </p>

                    <p class="mb-4 lh-lg" style="color: var(--sparrow-muted);">
                        At SparrowSharp, we believe that successful recruitment is built on trust, integrity, and long-term relationships. Our commitment is to provide a professional service that consistently delivers value and stands out in a competitive market.
                    </p>

                    <p class="mb-0 lh-lg" style="color: var(--sparrow-dark); font-weight: 500;">
                        As we continue to grow year after year, our focus remains the same: building lasting partnerships, delivering exceptional talent, and maintaining the highest standards of integrity in everything we do.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 3. Core Values Grid (Aligned with SparrowSharp Theme) --}}
<section class="py-5" style="background-color: var(--sparrow-light);">
    <div class="container py-lg-4">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h6 class="fw-bold ls-3 mb-2" style="color: var(--sparrow-green);">CORE PRINCIPLES</h6>
                <h2 class="display-6 fw-bold" style="color: var(--sparrow-dark);">What Drives Our <span style="color: var(--sparrow-green);">Success</span></h2>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                    <div class="mb-3 fs-3" style="color: var(--sparrow-green);">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: var(--sparrow-dark);">Trust & Integrity</h4>
                    <p class="text-muted small mb-0">Building foundations based on honesty, transparency, and high ethical standards in every placement.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                    <div class="mb-3 fs-3" style="color: var(--sparrow-green);">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: var(--sparrow-dark);">People-Focused</h4>
                    <p class="text-muted small mb-0">Understanding individual needs and challenges to create meaningful, long-term professional matches.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 shadow-sm h-100 border-0">
                    <div class="mb-3 fs-3" style="color: var(--sparrow-green);">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: var(--sparrow-dark);">Continuous Growth</h4>
                    <p class="text-muted small mb-0">Expanding year after year by delivering exceptional value and standing out in a competitive market.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 4. Call To Action --}}
<section class="py-5 text-center text-white" style="background-color: var(--sparrow-dark);">
    <div class="container py-lg-3">
        <h2 class="fw-bold mb-3">Ready to Partner With Us?</h2>
        <p class="text-white-50 mb-4 mx-auto" style="max-width: 600px;">Experience a thorough and personal approach to recruitment that delivers the right results.</p>
        <a href="{{ url('/contact-us') }}" class="btn btn-lg rounded-pill px-5 fw-bold shadow" style="background-color: var(--sparrow-green); color: #ffffff;">
            Get In Touch <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>
</section>

@endsection
