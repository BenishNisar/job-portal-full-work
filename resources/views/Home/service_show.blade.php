@extends('Layout.layout')
@section('Content')

<!-- Inner Banner -->
<!-- Inner Banner -->
<div class="inner_banner"
     style="
        background-image:url('{{ asset($service->image) }}');
        background-position:center;
        background-size:cover;
        background-repeat:no-repeat;">
  <div class="overlay">
    <div class="banner_tilte">
      <h2>{{ $service->title }}</h2>
      <span class="s_color_bg"></span>
    </div>
  </div>
</div>


<!-- Breadcrumb -->
<div class="page-breadcrumb p_color_bg">
  <div class="container clear_fix">
    <ul class="text-center">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li><i class="fa fa-caret-right" aria-hidden="true"></i></li>
      <li><a href="{{ route('Home.services') }}">Services</a></li>
      <li><i class="fa fa-caret-right" aria-hidden="true"></i></li>
      <li>{{ $service->title }}</li>
    </ul>
  </div>
</div>

<!-- Detail + Sidebar -->
<div class="services_innerPage svc-detail">
  <div class="container">
    <div class="row">

      <!-- MAIN -->
      <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 pull-right service_page_main_post">
        <div class="wrapper">

          <!-- Fancy header -->
          <div class="svc-hero p_color_bg s_color">
            <div class="svc-hero__icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
            <div class="svc-hero__text">
              <h3 class="mb-0">{{ $service->title }}</h3>
              @if(!empty($service->updated_at))
                <small class="svc-meta">Last updated: {{ $service->updated_at->format('d M Y') }}</small>
              @endif
            </div>
          </div>

          <!-- Content card -->
          <article class="svc-card svc-card--detail">
            <div class="svc-content">
              {!! $service->description !!}
            </div>

            <div class="svc-actions">
              <a href="{{ route('Home.services') }}" class="svc-cta">
                <i class="fa fa-angle-left"></i> Back to Services
              </a>
              <div class="svc-share">
                <span>Share:</span>
                <a target="_blank" rel="noopener" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"><i class="fa fa-facebook"></i></a>
                <a target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($service->title) }}"><i class="fa fa-twitter"></i></a>
                <a target="_blank" rel="noopener" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->fullUrl()) }}&title={{ urlencode($service->title) }}"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </article>

        </div>
      </div>

      <!-- SIDEBAR (Careers style + dynamic services) -->
      <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 pull-left side_bar">
        <div class="wrapper sticky-side">

          <!-- All Services (dynamic) -->
          <div class="theme_title"><h5>All Services</h5></div>
          <ul class="page_list service_page_list">
            @forelse(($servicesMenu ?? collect()) as $s)
              <li>
                <a class="tran3s {{ (isset($service) && $service->slug === $s->slug) ? 'active' : '' }}"
                   href="{{ route('Home.services.show', $s->slug) }}">
                  {{ $s->title }}
                </a>
              </li>
            @empty
              <li><a href="{{ route('Home.services') }}" class="tran3s">View all services</a></li>
            @endforelse
          </ul>

          <!-- Page List (your existing links) -->
          {{-- <ul class="page_list service_page_list mt-10">
            <li><a href="{{ asset('/business-sectors') }}" class="tran3s">Business Sectors</a></li>
            <li><a href="{{ asset('/administration') }}" class="tran3s">Administration</a></li>
            <li><a href="{{ asset('/softwares') }}" class="tran3s">Softwares</a></li>
            <li><a href="{{ asset('/clients') }}" class="tran3s">Clients</a></li>
            <li><a href="{{ asset('/downloads') }}" class="tran3s">Downloads</a></li>
            <li><a href="{{ asset('/careers') }}" class="tran3s">Jobs & Careers</a></li>
            <li><a href="{{ asset('/blogs') }}" class="tran3s">Blogs</a></li>
          </ul> --}}

          <!-- Brochures -->
          <div class="our_brochures">
            <div class="theme_title"><h5>Our Brochures</h5></div>
            <a href="#" class="tran3s s_color_bg">
              <span class="p_color_bg tran3s"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
              Download .PDF
            </a>
            <a href="#" class="tran3s s_color_bg">
              <span class="p_color_bg tran3s"><i class="fa fa-file-word-o" aria-hidden="true"></i></span>
              Download .DOC
            </a>
          </div>

          <!-- Testimonials (same widget) -->
          <div class="sidebar_testimonial testimonial sidebar_testimonial_style_two">
            <div class="theme_title"><h5>Testimonials</h5></div>
            <div class="slider_wrapper">
              <div class="owl-carousel owl-theme" id="testimonial-sidebar">
                <div class="item">
                  <div class="text p_color_bg"><i>They have got my project on time...</i></div>
                </div>
                <div class="item">
                  <div class="text p_color_bg"><i>ConsultPress over 20 years...</i></div>
                </div>
                <div class="item">
                  <div class="text p_color_bg"><i>They have got my project on time...</i></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Business Enquiry -->
          <div class="business_enquiry">
            <h6>For Business Enquiry</h6>
            <p>
              You can also send us an <a href="#" class="s_color">email</a> and we’ll get in touch shortly,
              or Toll Free Number <a href="#" class="p_color">-(+91)<br>00-700-6202.</a>
            </p>
            <span class="ficon flaticon-message"></span>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>

<!-- Optional: Request Quote footer -->
<div class="request_quote_footer s_color_bg">
  <div class="container clear_fix">
    <p class="float_left">ConsultPress over 20 years of experience we’ll ensure you always get the best guidance.</p>
    <a href="#" class="theme_button p_color_bg s_color float_right tran3s">Request Quote</a>
  </div>
</div>

{{-- Minimal scoped CSS to polish --}}
<style>
  .svc-detail .svc-hero{
    display:flex;align-items:center;gap:14px;border-radius:8px;padding:14px 16px;margin-bottom:16px
  }
  .svc-detail .svc-hero__icon{
    width:42px;height:42px;border-radius:50%;background:rgba(255,255,255,.15);
    display:flex;align-items:center;justify-content:center;font-size:18px
  }
  .svc-detail .svc-hero__text h3{color:#fff;margin:0;font-weight:600}
  .svc-detail .svc-meta{opacity:.9}

  .svc-card--detail{
    background:#fff;border:1px solid #eee;border-radius:10px;padding:20px;
    box-shadow:0 6px 20px rgba(0,0,0,.06)
  }
  .svc-content :where(h1,h2,h3,h4){margin-top:18px}
  .svc-content ul{padding-left:20px}
  .svc-actions{
    margin-top:18px;display:flex;justify-content:space-between;align-items:center;gap:10px
  }
  .svc-cta{display:inline-block;color:black}
  .svc-share{display:flex;align-items:center;gap:8px}
  .svc-share a{display:inline-flex;width:30px;height:30px;align-items:center;justify-content:center;border:1px solid #ddd;border-radius:50%}

  .sticky-side{position:sticky;top:20px}
  .mt-10{margin-top:10px}
  .service_page_list a.active{font-weight:600;color:#b10937}
</style>

@endsection
