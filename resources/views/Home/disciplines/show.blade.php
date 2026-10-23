@extends('Layout.layout')
@section('Content')

<section class="sector-hero position-relative overflow-hidden"
style="
background-image:
linear-gradient(rgba(15,23,42,.88),rgba(15,23,42,.88)),
url('{{ !empty($discipline->hero_image) ? asset($discipline->hero_image) : asset('images/default-sector.jpg') }}');
background-size:cover;
background-position:center;
background-repeat:no-repeat;
">

<div class="sector-bg-glow"></div>

<!-- Added mt-4 and proper padding for clearance from navbar -->
<div class="container pt-5 pb-5 position-relative z-3" style="margin-top: 20px;">

<nav aria-label="breadcrumb" class="mb-4">
<ol class="breadcrumb mb-0">
<li class="breadcrumb-item">
<a href="{{ route('Home.disciplines.index') }}" class="text-pink">
Sectors
</a>
</li>
<li class="breadcrumb-item active text-white text-truncate" style="max-width: 200px;">
{{ $discipline->breadcrumb_title ?: $discipline->hero_title }}
</li>
</ol>
</nav>

<div class="row align-items-center">
<div class="col-lg-8">

<h1 class="fw-bold text-white mb-3 hero-main-title">
{{ $discipline->hero_title }}
@if($discipline->hero_highlight)
<br>
<span class="text-pink">
{{ $discipline->hero_highlight }}
</span>
@endif
</h1>

<p class="lead text-white-50 mb-4 hero-description" style="font-size: 0.95rem; line-height: 1.6;">
{{ $discipline->hero_description }}
</p>

<!-- Clean Balanced Buttons -->
<div class="d-flex flex-wrap gap-3 pt-2">
@if($discipline->hero_button_1_text)
<a href="{{ $discipline->hero_button_1_link ?: '#roles' }}"
class="btn btn-custom rounded-pill px-4 py-2 fw-semibold shadow-sm" style="font-size: 0.9rem;">
{{ $discipline->hero_button_1_text }}
</a>
@endif

@if($discipline->hero_button_2_text)
<a href="{{ $discipline->hero_button_2_link ?: '#' }}"
class="btn btn-contact-custom rounded-pill px-4 py-2 fw-semibold text-white" style="font-size: 0.9rem;">
{{ $discipline->hero_button_2_text }}
</a>
@endif
</div>

</div>
</div>

</div>
</section>

<section id="roles" class="roles-grid-section py-5 bg-white">
    <div class="container py-lg-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-dark-blue display-6 display-lg-5">
                {{ $discipline->expertise_title }}
                @if($discipline->expertise_highlight)
                    <span class="text-pink">{{ $discipline->expertise_highlight }}</span>
                @endif
            </h2>
            <p class="text-muted italic-role">{{ $discipline->expertise_description }}</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="bento-card p-4 rounded-5 h-100 shadow-sm border-0">
                    <div class="icon-header mb-4 bg-pink-light">
                        <i class="{{ $discipline->left_card_icon ?: 'fas fa-crown' }} text-pink"></i>
                    </div>
                    <h4 class="fw-bold text-dark-blue mb-3">{{ $discipline->left_card_title }}</h4>

                    <ul class="list-unstyled role-list">
                        @if($discipline->left_role_1)
                            <li class="mb-2"><i class="fas fa-check-circle me-2 text-pink"></i> {{ $discipline->left_role_1 }}</li>
                        @endif
                        @if($discipline->left_role_2)
                            <li class="mb-2"><i class="fas fa-check-circle me-2 text-pink"></i> {{ $discipline->left_role_2 }}</li>
                        @endif
                        @if($discipline->left_role_3)
                            <li class="mb-2"><i class="fas fa-check-circle me-2 text-pink"></i> {{ $discipline->left_role_3 }}</li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="bento-card-wide p-4 p-lg-5 rounded-5 shadow-sm border-0 h-100 position-relative overflow-hidden">
                    <div class="position-relative z-2">
                        <h4 class="fw-bold text-dark-blue mb-4">{{ $discipline->right_card_title }}</h4>
                        <div class="row g-3">
                            @if($discipline->right_role_1)
                                <div class="col-md-4 col-6"><div class="role-tag-modern">{{ $discipline->right_role_1 }}</div></div>
                            @endif
                            @if($discipline->right_role_2)
                                <div class="col-md-4 col-6"><div class="role-tag-modern">{{ $discipline->right_role_2 }}</div></div>
                            @endif
                            @if($discipline->right_role_3)
                                <div class="col-md-4 col-6"><div class="role-tag-modern">{{ $discipline->right_role_3 }}</div></div>
                            @endif
                            @if($discipline->right_role_4)
                                <div class="col-md-4 col-6"><div class="role-tag-modern">{{ $discipline->right_role_4 }}</div></div>
                            @endif
                            @if($discipline->right_role_5)
                                <div class="col-md-4 col-6"><div class="role-tag-modern">{{ $discipline->right_role_5 }}</div></div>
                            @endif
                            @if($discipline->right_role_6)
                                <div class="col-md-4 col-6"><div class="role-tag-modern">{{ $discipline->right_role_6 }}</div></div>
                            @endif
                            @if($discipline->right_role_7)
                                <div class="col-md-4 col-6"><div class="role-tag-modern">{{ $discipline->right_role_7 }}</div></div>
                            @endif
                            @if($discipline->right_role_8)
                                <div class="col-md-4 col-6"><div class="role-tag-modern">{{ $discipline->right_role_8 }}</div></div>
                            @endif
                        </div>
                    </div>
                    <div class="glass-decoration"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="discipline-cta py-5">
    <div class="container">
        <div class="cta-inner rounded-5 p-4 p-lg-5 text-center shadow-2xl position-relative">
            <h3 class="display-6 fw-bold text-white mb-3">{{ $discipline->cta_title }}</h3>
            <p class="text-white-50 mb-4 fs-6 fs-lg-5">
                {{ $discipline->cta_description }}
                <br><span class="text-white fw-bold">+1 424 426 7394</span>
            </p>
            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                <a href="{{ url('/contact-us') }}" class="btn btn-custom rounded-pill px-4 py-2 text-decoration-none">
                    Get In Touch
                </a>
                <a href="tel:+14244267394" class="btn btn-light rounded-pill px-4 py-2 text-decoration-none">
                    Call Us
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
