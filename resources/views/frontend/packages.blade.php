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
                    <button type="button" class="btn btn-success rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Navbar & Hero End -->

@endsection
@section('content')

<!-- Package Start -->
<div class="container-xxl py-5">
<div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-success px-3">Packages</h6>
        <h1 class="mb-5">Awesome Packages</h1>
    </div>
    <div class="row g-4 justify-content-center">
        @foreach ($packages as $package)

        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="package-item">
                <div class="overflow-hidden">
                    <img class="img-fluid" src="{{ asset('upload/package') }}/{{ $package->image }}" alt="{{ $package->title }}">
                </div>
                <div class="d-flex border-bottom">
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-success me-2"></i>{{ $package->location }}</small>
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-success me-2"></i>{{ $package->time }}</small>
                    <small class="flex-fill text-center py-2"><i class="fa fa-user text-success me-2"></i>{{ $package->person }}</small>
                </div>
                <div class="text-center p-4">
                    <h3 class="mb-0">BDT: {{ $package->selling_price }} TK</h3>
                    <div class="mb-3">
                        <small class="fa fa-star text-success"></small>
                        <small class="fa fa-star text-success"></small>
                        <small class="fa fa-star text-success"></small>
                        <small class="fa fa-star text-success"></small>
                        <small class="fa fa-star text-success"></small>
                    </div>
                    <p>{{ $package->title }}</p>
                    <div class="d-flex justify-content-center mb-2">
                        <a href="{{ route('package.deteals', $package->slug) }}" class="btn btn-sm btn-success px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                        <a href="#" class="btn btn-sm btn-success px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
</div>
<!-- Package End -->




<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
<div class="container">
    <div class="text-center">
        <h6 class="section-title bg-white text-center text-success px-3">Testimonial</h6>
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
