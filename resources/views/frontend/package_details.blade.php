@extends('frontend.master')

@section('hero_section')
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">


        </div>
    </div>
</div>

<!-- Navbar & Hero End -->
@endsection

@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('upload/package') }}/{{ $package_info->image }}" alt="{{ $package_info->title }}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start backg-colors pe-3 my-3">About this Package</h6>
                <h5 class="mb-2">{{ $package_info->title }}</h5>
                <h4 class="mb-2">Location: {{ $package_info->location }} <i class="fa fa-map-marker-alt backg-colors me-2"></i> </h4>
                <h4 class="mb-2">Time Line: <span class="backg-colors"> {{ $package_info->time }} </span> Days</h4>
                <h4 class="mb-2">Person: For <span class="backg-colors">{{ $package_info->person }} </span>People</h4>
                <h4 class="mb-2">Number of Room: For <span class="backg-colors">{{ $package_info->room }} </span>Room</h4>
                <h4 class="mb-2">Price: BDT <span class="backg-colors">{{ $package_info->price }} TK</span>Only</h4>
                <h4 class="mb-2">There are More Added :</h4>

                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right backg-colors me-2"></i>First Class Flights</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right backg-colors me-2"></i>Handpicked Hotels</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right backg-colors me-2"></i>5 Star Accommodations</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right backg-colors me-2"></i>Latest Model Vehicles</p>
                    </div>

                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right backg-colors me-2"></i>24/7 Service</p>
                    </div>
                </div>
                <a class="btn button-colors py-3 px-5 mt-2" href="{{ route('booking.now',$package_info->slug) }}">Book Now</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-11 wow fadeInUp shadow-none p-3 mb-5 bg-light rounded" data-wow-delay="0.1s" style="height:auto;">
                <h4 class="mb-2">Description :</h4>
               <p class="mb-4">{!! $package_info->description !!}</p>
            </div>
        </div>
    </div>
    </div>

@endsection
