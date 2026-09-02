@extends("Layout.layout")

@section("Content")


{{-- Header Section --}}
<section class="py-5 text-white position-relative overflow-hidden"
style="background-image: linear-gradient(rgba(15,23,42,.75),rgba(15,23,42,.75)), url('{{ asset('assets/images/career.png') }}');
background-size:cover;
background-position:center;
background-repeat:no-repeat;
margin-top:80px;">

    <div class="container py-lg-4 text-center">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <span class="badge mt-5 rounded-pill fw-bold mb-3 shadow-sm"
                style="background-color:rgba(99,141,63,.2);
                color:var(--sparrow-green);
                border:1px solid rgba(99,141,63,.3);">

                    <i class="fas fa-newspaper me-2"></i>
                    LATEST INSIGHTS

                </span>


                <h1 class="fw-bold display-5 mb-3 text-white">
                    Career
                    <span style="color:var(--sparrow-green);">
                        Insights & Tips
                    </span>
                </h1>


                <p class="lead mx-auto"
                style="max-width:650px;color:rgba(255,255,255,.8);">

                    Stay ahead with the latest recruitment and career trends.

                </p>


            </div>

        </div>

    </div>

</section>




{{-- Blog Cards Section --}}
<section class="py-5" style="background-color:var(--sparrow-light);">

<div class="container py-4">


<div class="row g-4">


@forelse($blogs as $blog)


@php

$day = \Carbon\Carbon::parse($blog->date)->format('d');

$month = \Carbon\Carbon::parse($blog->date)->format('M');


$blogImage = $blog->featured_image

? asset($blog->featured_image)

: 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&q=80';


@endphp





<div class="col-lg-4 col-md-6">


<div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white d-flex flex-column">



{{-- Image --}}

<div class="position-relative"
style="height:220px;overflow:hidden;">


<img src="{{ $blogImage }}"
alt="{{ $blog->title }}"
class="w-100 h-100 object-fit-cover">



@if($blog->category)

<span class="position-absolute top-0 start-0 m-3 px-3 py-1 rounded-pill text-white fw-bold small shadow-sm"
style="background-color:var(--sparrow-green);">

{{ $blog->category->name }}

</span>

@endif





{{-- Date --}}

<div class="position-absolute top-0 end-0 m-3 bg-white text-dark text-center px-3 py-2 rounded-3 shadow-sm"
style="min-width:55px;">


<span class="fw-bold d-block lh-1 fs-5"
style="color:var(--sparrow-dark);">

{{ $day }}

</span>


<small class="text-uppercase text-muted fw-bold"
style="font-size:.65rem;">

{{ $month }}

</small>


</div>



</div>





{{-- Body --}}

<div class="card-body p-4 d-flex flex-column flex-grow-1">





<h4 class="fw-bold mb-3 fs-5">


<a href="{{ route('Home.blogs_details',['slug'=>$blog->slug]) }}"
class="text-decoration-none"
style="color:var(--sparrow-dark);">


{{ $blog->title }}


</a>


</h4>





<p class="text-muted small mb-4 flex-grow-1"
style="line-height:1.6;">


{{ \Illuminate\Support\Str::limit(strip_tags($blog->short_description),90) }}


</p>






{{-- Footer --}}

<div class="d-flex justify-content-end pt-3 border-top mt-auto">


<a href="{{ route('Home.blogs_details',['slug'=>$blog->slug]) }}"
class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center text-white shadow-sm"

style="width:38px;
height:38px;
background-color:var(--sparrow-green);">


<i class="fas fa-arrow-right"></i>


</a>


</div>



</div>


</div>


</div>




@empty



<div class="col-12 text-center">

<div class="py-5 bg-white rounded-4 shadow-sm">


<h4 class="fw-bold mb-2"
style="color:var(--sparrow-dark);">

No blogs found

</h4>


<p class="text-muted mb-0">

Blogs will appear here once you publish them from the dashboard.

</p>


</div>

</div>



@endforelse



</div>


</div>

</section>



@endsection
