@extends('frontend.master')

@section('hero_section')
<div class="container-fluid bg-success py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Tempor erat elitr rebum at clita diam amet diam et eos erat ipsum lorem sit</p>
                <div class="position-relative w-75 mx-auto animated slideInDown">
                    <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: Thailand">
                    <button type="button" class="btn button-colors rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Navbar & Hero End -->

@endsection
@section('content')




<!-- About Start -->
<div class="container-xxl py-5">
<div class="container">
    <div class="row g-5">
        @foreach ($about_section as $about)
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
            <div class="position-relative h-100">
                <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('upload/guide/') }}/{{ $about->image }}" alt="{{ $about->title }}" style="object-fit: cover;">
            </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
            <h6 class="section-title bg-white text-start backg-colors pe-3">About Us</h6>
            <h1 class="mb-4">Welcome to <span class="backg-colors">BRTT</span></h1>
            <!--<p class="mb-4">{{ $about->title }}</p>-->

            <div class="row gy-2 gx-4 mb-4">
                {!! $about->description !!}
            </div>
            <a class="btn button-colors py-3 px-5 mt-2" href="{{ route('about.page') }}">Read More</a>
        </div>
        @endforeach
    </div>
</div>
</div>
<!-- About End -->








<!-- Team Start -->
<div class="container-xxl py-5">
<div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center backg-colors px-3">Travel Guide</h6>
        <h1 class="mb-5">Meet Our Guide</h1>
    </div>
    <div class="row g-4">
        @foreach ( $all_guide as $guide )

        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="team-item">
                <div class="overflow-hidden">
                    <img class="img-fluid" src="{{ asset('upload/guide') }}/{{ $guide->photo }}" alt="{{ $guide->name }}">
                </div>
                <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                    <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                </div>
                <div class="text-center p-4">
                    <h5 class="mb-0">{{ $guide->name }}</h5>
                    <small>{{ $guide->designation }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
<div class="container">
    <div class="text-center">
        <h6 class="section-title bg-white text-center backg-colors px-3">Testimonial</h6>
        <h1 class="mb-5">Our Clients Say!!!</h1>
    </div>
    <div class="owl-carousel testimonial-carousel position-relative">
        <div class="testimonial-item bg-white text-center border p-4">
            <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('frontend') }}/img/testimonial-1.jpg" style="width: 80px; height: 80px;">
            <h5 class="mb-0">John Doe</h5>
            <p>New York, USA</p>
            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
        </div>
        <div class="testimonial-item bg-white text-center border p-4">
            <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('frontend') }}/img/testimonial-2.jpg" style="width: 80px; height: 80px;">
            <h5 class="mb-0">John Doe</h5>
            <p>New York, USA</p>
            <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
        </div>
        <div class="testimonial-item bg-white text-center border p-4">
            <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('frontend') }}/img/testimonial-3.jpg" style="width: 80px; height: 80px;">
            <h5 class="mb-0">John Doe</h5>
            <p>New York, USA</p>
            <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
        </div>
        <div class="testimonial-item bg-white text-center border p-4">
            <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="{{ asset('frontend') }}/img/testimonial-4.jpg" style="width: 80px; height: 80px;">
            <h5 class="mb-0">John Doe</h5>
            <p>New York, USA</p>
            <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
        </div>
    </div>
</div>
</div>
<!-- Testimonial End -->

@endsection
