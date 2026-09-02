@extends('Layout.layout')

@section('Content')

<section class="contact-section py-5 bg-light">

<div class="container py-5">

<div class="row align-items-center g-5">


<div class="col-lg-6">


<span class="badge px-3 py-2 rounded-pill mb-3"
style="background:rgba(99,141,63,.12); color:#638d3f;">
CONTACT US
</span>


<h1 class="fw-bold mb-4">
Let's Connect With <span style="color:#638d3f;">SparrowSharp</span>
</h1>


<p class="text-muted lead">
Whether you are looking for exceptional talent or the right career opportunity,
our recruitment specialists are here to help you build meaningful connections.
</p>



<div class="mt-5">


<div class="contact-item d-flex gap-3 mb-4">


<div class="icon-box">
<i class="fas fa-phone"></i>
</div>


<div>

<h6 class="fw-bold mb-1">
Phone
</h6>

<p class="text-muted mb-0">
+1 424 426 7394
</p>

</div>


</div>




<div class="contact-item d-flex gap-3 mb-4">


<div class="icon-box">
<i class="fas fa-envelope"></i>
</div>


<div>

<h6 class="fw-bold mb-1">
Email
</h6>

<p class="text-muted mb-1">
syed.hussain@sparrowsharp.com
</p>

<p class="text-muted mb-1">
info@sparrowsharp.com
</p>

<p class="text-muted mb-0">
contact@sparrowsharp.com
</p>

</div>


</div>





<div class="contact-item d-flex gap-3 mb-4">


<div class="icon-box">
<i class="fas fa-map-marker-alt"></i>
</div>


<div>

<h6 class="fw-bold mb-1">
Address
</h6>

<p class="text-muted mb-0">
453 S. Spring Street, Suite 1212<br>
Los Angeles, CA 90013
</p>

</div>


</div>



<div class="contact-item d-flex gap-3">


<div class="icon-box">
<i class="fab fa-linkedin-in"></i>
</div>


<div>

<h6 class="fw-bold mb-1">
LinkedIn
</h6>


<a href="https://www.linkedin.com/company/sparrowsharp/"
target="_blank"
class="text-decoration-none"
style="color:#638d3f;">
SparrowSharp LinkedIn
</a>


</div>


</div>



</div>


</div>





<div class="col-lg-6">


<div class="card border-0 rounded-4 shadow-sm p-4 p-md-5">


<h3 class="fw-bold mb-4">
Send Us A Message
</h3>


<form>


<div class="row g-3">


<div class="col-md-6">

<input type="text"
class="form-control rounded-3"
placeholder="Your Name">

</div>


<div class="col-md-6">

<input type="email"
class="form-control rounded-3"
placeholder="Email Address">

</div>



<div class="col-12">

<input type="text"
class="form-control rounded-3"
placeholder="Subject">

</div>



<div class="col-12">

<textarea class="form-control rounded-3"
rows="5"
placeholder="Your Message"></textarea>

</div>



<div class="col-12">

<button class="btn rounded-pill px-5 py-3 fw-bold text-white"
style="background:#638d3f;">

Send Message

</button>

</div>


</div>


</form>


</div>


</div>



</div>


</div>

</section>



<style>

.contact-section{

font-family:inherit;

}


.icon-box{

width:45px;
height:45px;
border-radius:50%;
background:rgba(99,141,63,.12);
color:#638d3f;
display:flex;
align-items:center;
justify-content:center;

}


.form-control{

padding:14px 18px;
border:1px solid #e5e5e5;

}


.form-control:focus{

box-shadow:none;
border-color:#638d3f;

}


</style>


@endsection
