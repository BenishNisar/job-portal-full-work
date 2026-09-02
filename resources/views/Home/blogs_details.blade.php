@extends("Layout.layout")
@section("meta_title", $blog->meta_title ?? $blog->title)
@section("meta_description", $blog->meta_description ?? Str::limit(strip_tags($blog->content), 160))

@section("Content")

<style>
  :root{
    --brand-primary:#bae0db;
    --brand-secondary:#7a958f;
    --brand-dark:#1f2d2a;
    --brand-soft:#f5fbfa;
    --line: rgba(122,149,143,.22);
    --shadow: 0 14px 40px rgba(31,45,42,.10);
  }

  /* Page spacing */
  .blog-details-wrap{ padding-top: 20px; padding-bottom: 40px; }

  /* Top image */
  .blog-hero-img{
    width: 100%;
    max-height: 420px;
    object-fit: cover;
    border-radius: 18px;
    border: 1px solid var(--line);
    box-shadow: var(--shadow);
    cursor: zoom-in;
    transition: transform .25s ease;
        margin-top: 78px;
  }
  .blog-hero-img:hover{ transform: scale(1.01); }

  /* Title and meta */
  .blog-title{
    color: var(--brand-dark);
    font-weight: 800;
    letter-spacing: .2px;
    line-height: 1.15;
  }
  .blog-meta{
    margin-top: 6px;
    color: rgba(31,45,42,.70);
    font-weight: 600;
    font-size: 14px;
  }
  .blog-meta b{ color: var(--brand-dark); }

  /* Content body */
  .blog-content-body{
    font-family: 'Poppins', sans-serif;
    color: rgba(31,45,42,.88);
    font-size: 17px;
    line-height: 1.9;
  }

  .blog-content-body p{ margin-bottom: 14px; }

  .blog-content-body h1,
  .blog-content-body h2,
  .blog-content-body h3,
  .blog-content-body h4,
  .blog-content-body h5,
  .blog-content-body h6{
    font-family: 'Poppins', sans-serif;
    color: var(--brand-dark);
    font-weight: 800 !important;
    margin-top: 26px !important;
    margin-bottom: 12px !important;
    line-height: 1.25;
  }

  .blog-content-body a{
    color: var(--brand-secondary);
    font-weight: 700;
    text-decoration: none;
    border-bottom: 1px solid rgba(122,149,143,.35);
  }
  .blog-content-body a:hover{
    color: var(--brand-dark);
    border-bottom-color: rgba(31,45,42,.35);
  }

  .blog-content-body img{
    max-width: 100%;
    height: auto;
    border-radius: 16px;
    border: 1px solid var(--line);
    box-shadow: 0 10px 28px rgba(31,45,42,.10);
    margin: 12px 0;
  }

  .blog-content-body blockquote{
    margin: 18px 0;
    padding: 14px 16px;
    border-left: 6px solid var(--brand-secondary);
    background: var(--brand-soft);
    border-radius: 14px;
    color: rgba(31,45,42,.90);
    font-weight: 600;
  }

  /* Share box */
  .share-box{
    margin-top: 28px;
    border-top: 1px solid var(--line);
    padding-top: 16px;
  }
  .share-box h6{
    color: var(--brand-dark);
    font-weight: 800;
    margin-bottom: 10px;
  }
  .share-btn{
    border: 1px solid rgba(122,149,143,.35);
    background: #fff;
    color: var(--brand-dark);
    font-weight: 700;
    border-radius: 999px;
    padding: 9px 14px;
    transition: all .2s ease;
  }
  .share-btn:hover{
    background: var(--brand-secondary);
    border-color: var(--brand-secondary);
    color: #fff;
    transform: translateY(-1px);
  }

  /* Sidebar */
  .recent-sticky{
    position: sticky;
    top: 140px;
  }

  .recent-card{
    background: #fff;
    border: 1px solid var(--line);
    border-radius: 18px;
    box-shadow: var(--shadow);
    padding: 16px;
  }

  .recent-head{
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 14px;
  }

  .recent-dot{
    width: 12px;
    height: 12px;
    border-radius: 99px;
    background: linear-gradient(90deg, var(--brand-primary), var(--brand-secondary));
  }

  .recent-title{
    margin: 0;
    color: var(--brand-dark);
    font-weight: 900;
    letter-spacing: .2px;
  }

  .recent-item{
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px;
    border-radius: 14px;
    border: 1px solid rgba(122,149,143,.18);
    background: #fff;
    text-decoration: none;
    transition: all .2s ease;
    margin-bottom: 12px;
  }
  .recent-item:hover{
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(31,45,42,.12);
    border-color: rgba(122,149,143,.35);
  }

  .recent-thumb{
    width: 74px;
    height: 74px;
    border-radius: 14px;
    object-fit: cover;
    border: 1px solid rgba(122,149,143,.22);
  }

  .recent-date{
    display: block;
    font-size: 12px;
    font-weight: 700;
    color: rgba(31,45,42,.60);
    margin-bottom: 2px;
  }

  .recent-post-title{
    margin: 0;
    color: var(--brand-dark);
    font-weight: 800;
    font-size: 14px;
    line-height: 1.25;
  }

  /* Modal image */
  .modal-content img{
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,.25);
    transition: transform 0.3s ease;
  }
  .modal-content img:hover{ transform: scale(1.01); }

  @media (max-width: 991.98px){
    .recent-sticky{ position: static; top: auto; }
  }
</style>

<!-- Image Zoom Modal -->
<div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body p-0 text-center">
        <img id="zoomImage" src="{{ asset($blog->featured_image) }}" class="img-fluid shadow" alt="Zoomed Image">
      </div>
    </div>
  </div>
</div>

<section class="responsive-mt blog-details-wrap">
  <div class="container">
    <div class="row g-5">

      <!-- Blog Content -->
      <div class="col-lg-8">

        <!-- Blog Image with Zoom -->
        <img
          src="{{ asset($blog->featured_image) }}"
          class="blog-hero-img mb-4 blog-zoom-trigger"
          alt="{{ $blog->title }}"
          data-bs-toggle="modal"
          data-bs-target="#zoomModal"
        >

        <!-- Blog Meta -->
        <div class="mb-3">
          <h3 class="blog-title mb-0">{{ $blog->title }}</h3>
          <div class="blog-meta">
            By <b>{{ $blog->author }}</b> |
            {{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}
          </div>
        </div>

        <!-- Blog Content -->
        <div class="blog-content-body">
          <div>{!! $blog->content !!}</div>
        </div>

        <!-- Share -->
        {{-- <div class="share-box">
          <h6>Share this article</h6>

          @php
            $shareUrl = urlencode(url()->current());
            $shareText = urlencode($blog->title);
          @endphp

          <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" class="btn share-btn me-2 mb-2">
            <i class="fa-brands fa-facebook-f me-1"></i> Facebook
          </a>

          <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareText }}" target="_blank" class="btn share-btn me-2 mb-2">
            <i class="fa-brands fa-twitter me-1"></i> Twitter
          </a>

          <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&title={{ $shareText }}" target="_blank" class="btn share-btn mb-2">
            <i class="fa-brands fa-linkedin-in me-1"></i> LinkedIn
          </a>
        </div> --}}

      </div>

      <!-- Recent Posts -->
      <div class="col-lg-4">
        <div class="recent-sticky">
          <div class="recent-card">
            <div class="recent-head">
              <span class="recent-dot"></span>
              <h5 class="recent-title">Recent Posts</h5>
            </div>

            @foreach($recent_posts as $recent)
              <a href="{{ route('Home.blogs_details', ['slug' => $recent->slug]) }}" class="recent-item">
                <img src="{{ asset($recent->featured_image) }}" class="recent-thumb" alt="{{ $recent->title }}">
                <div>
                  <span class="recent-date">{{ \Carbon\Carbon::parse($recent->date)->format('d M, Y') }}</span>
                  <p class="recent-post-title">{{ $recent->title }}</p>
                </div>
              </a>
            @endforeach

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var trigger = document.querySelector('.blog-zoom-trigger');
    var zoomImg = document.getElementById('zoomImage');
    if (!trigger || !zoomImg) return;

    trigger.addEventListener('click', function(){
      zoomImg.src = trigger.getAttribute('src');
      zoomImg.alt = trigger.getAttribute('alt') || 'Zoomed Image';
    });
  });
</script>

@endsection
