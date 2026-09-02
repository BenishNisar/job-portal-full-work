@extends('Layout.layout')
@section('Content')
{{--
<section class="sector-hero position-relative overflow-hidden">
    <div class="sector-bg-glow"></div>
    <div class="container py-lg-5 position-relative z-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item">
                    <a href="{{ route('Home.disciplines.index') }}" class="text-pink">Sectors</a>
                </li>
                <li class="breadcrumb-item active text-white" aria-current="page">
                    {{ $discipline->breadcrumb_title ?: $discipline->hero_title }}
                </li>
            </ol>
        </nav>

        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-3 fw-bold text-white mb-3 animate__animated animate__fadeInLeft">
                    {{ $discipline->hero_title }}
                    @if($discipline->hero_highlight)
                        <br><span class="text-pink">{{ $discipline->hero_highlight }}</span>
                    @endif
                </h1>

                <p class="lead text-white-50 mb-5 animate__animated animate__fadeInUp">
                    {{ $discipline->hero_description }}
                </p>

                <div class="d-flex gap-3 animate__animated animate__fadeInUp animate__delay-1s">
                    @if($discipline->hero_button_1_text)
                        <a href="{{ $discipline->hero_button_1_link ?: '#roles' }}" class="btn btn-custom btn-lg rounded-pill px-5">
                            {{ $discipline->hero_button_1_text }}
                        </a>
                    @endif

                    @if($discipline->hero_button_2_text)
                        <a href="{{ $discipline->hero_button_2_link ?: '#' }}" class="btn btn-outline-light btn-lg rounded-pill px-5">
                            {{ $discipline->hero_button_2_text }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-lg-5 d-none d-lg-block">
                <div class="floating-finance-card animate__animated animate__zoomIn">
                    <img src="{{ !empty($discipline->hero_image) ? asset($discipline->hero_image) : asset('images/default-sector.jpg') }}"
                         alt="{{ $discipline->hero_title }}"
                         class="img-fluid rounded-5 shadow-2xl">
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section class="sector-hero position-relative overflow-hidden"
style="
background-image:
linear-gradient(rgba(15,23,42,.80),rgba(15,23,42,.80)),
url('{{ !empty($discipline->hero_image) ? asset($discipline->hero_image) : asset('images/default-sector.jpg') }}');

background-size:cover;
background-position:center;
background-repeat:no-repeat;
">

<div class="sector-bg-glow"></div>

<div class="container py-lg-5 position-relative z-3">


<nav aria-label="breadcrumb">

<ol class="breadcrumb mb-4">

<li class="breadcrumb-item">
<a href="{{ route('Home.disciplines.index') }}" class="text-pink">
Sectors
</a>
</li>

<li class="breadcrumb-item active text-white">
{{ $discipline->breadcrumb_title ?: $discipline->hero_title }}
</li>

</ol>

</nav>



<div class="row align-items-center">

<div class="col-lg-8">


<h1 class="display-3 fw-bold text-white mb-3">

{{ $discipline->hero_title }}

@if($discipline->hero_highlight)

<br>
<span class="text-pink">
{{ $discipline->hero_highlight }}
</span>

@endif

</h1>



<p class="lead text-white-50 mb-5">

{{ $discipline->hero_description }}

</p>




<div class="d-flex gap-3">

@if($discipline->hero_button_1_text)

<a href="{{ $discipline->hero_button_1_link ?: '#roles' }}"
class="btn btn-custom btn-lg rounded-pill px-5">

{{ $discipline->hero_button_1_text }}

</a>

@endif



@if($discipline->hero_button_2_text)

<a href="{{ $discipline->hero_button_2_link ?: '#' }}"
class="btn btn-outline-light btn-lg rounded-pill px-5">

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
            <h2 class="fw-bold text-dark-blue display-5">
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
                            <li><i class="fas fa-check-circle me-2 text-pink"></i> {{ $discipline->left_role_1 }}</li>
                        @endif

                        @if($discipline->left_role_2)
                            <li><i class="fas fa-check-circle me-2 text-pink"></i> {{ $discipline->left_role_2 }}</li>
                        @endif

                        @if($discipline->left_role_3)
                            <li><i class="fas fa-check-circle me-2 text-pink"></i> {{ $discipline->left_role_3 }}</li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="bento-card-wide p-5 rounded-5 shadow-sm border-0 h-100 position-relative overflow-hidden">
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
        <div class="cta-inner rounded-5 p-5 text-center shadow-2xl position-relative">
            <h3 class="display-6 fw-bold text-white mb-4">{{ $discipline->cta_title }}</h3>
            <p class="text-white-50 mb-5 fs-5">
                {{ $discipline->cta_description }}
                @if($discipline->cta_phone)
                    <span class="text-white fw-bold">{{ $discipline->cta_phone }}</span>
                @endif
            </p>
            <div class="d-flex justify-content-center gap-3">
                @if($discipline->cta_button_1_text)
                    <button class="btn btn-custom btn-lg rounded-pill px-5">{{ $discipline->cta_button_1_text }}</button>
                @endif

                @if($discipline->cta_button_2_text)
                    <button class="btn btn-light btn-lg rounded-pill px-5">{{ $discipline->cta_button_2_text }}</button>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
