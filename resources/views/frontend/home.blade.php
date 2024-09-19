@extends('frontend.master')

@section('hero_section')
    {{-- slider --}}
    @include('frontend.layouts.slider')
@endsection

@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                @foreach ($about_section as $about)
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="img-fluid position-absolute w-100 h-100"
                                src="{{ asset('upload/guide/') }}/{{ $about->image }}" alt="{{ $about->title }}"
                                style="object-fit: cover;">
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

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center button-colors px-3">Services</h6>
                <h1 class="mb-5">Our Services</h1>
            </div>
            <div class="row g-4">
                @foreach ($our_service as $value)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="{{ $value->icon_link }} backg-colors mb-4" style="font-size:48px;"></i>

                                <h5>{{ $value->title }}</h5>
                                <p>{{ $value->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Destination Start -->
    @include('frontend.layouts.destination')
    <!-- Destination Start -->

    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center backg-colors px-3">Packages</h6>
                <h1 class="mb-5">Awesome Packages</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($packages as $package)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="package-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('upload/package') }}/{{ $package->image }}"
                                    alt="{{ $package->title }}">
                            </div>
                            <div class="d-flex border-bottom">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-map-marker-alt backg-colors me-2"></i>{{ $package->location }}</small>
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-calendar-alt backg-colors me-2"></i>{{ $package->time }}</small>
                                <small class="flex-fill text-center py-2"><i
                                        class="fa fa-user backg-colors me-2"></i>{{ $package->person }}</small>
                            </div>
                            <div class="text-center p-4">
                                <h3 class="mb-0">BDT: {{ $package->selling_price }} TK</h3>
                                <div class="mb-3">
                                    <small class="fa fa-star backg-colors"></small>
                                    <small class="fa fa-star backg-colors"></small>
                                    <small class="fa fa-star backg-colors"></small>
                                    <small class="fa fa-star backg-colors"></small>
                                    <small class="fa fa-star backg-colors"></small>
                                </div>
                                <p>{{ $package->title }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="{{ route('package.deteals', $package->slug) }}"
                                        class="btn btn-sm button-colors px-3 border-end"
                                        style="border-radius: 30px 0 0 30px;">Read More</a>
                                    <a href="{{ route('package.deteals', $package->slug) }}"
                                        class="btn btn-sm button-colors px-3" style="border-radius: 0 30px 30px 0;">Book
                                        Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Package End -->

    <!-- Booking Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h6 class="text-white text-uppercase">Booking</h6>
                        <h1 class="text-white mb-4">Online Booking</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam
                            et eos. Clita erat ipsum et lorem et sit.</p>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam
                            et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat
                            amet</p>
                        <a class="btn btn-outline-light py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Book A Tour</h1>
                        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="customer_name" class="form-control bg-transparent"
                                            id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="customer_email" class="form-control bg-transparent"
                                            id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="phone" name="customer_phone" class="form-control bg-transparent"
                                            id="email" placeholder="Your Phone">
                                        <label for="email">Your Phone</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="date" name="checkout_date"
                                            class="form-control bg-transparent datetimepicker-input" id="datetime"
                                            placeholder="Date & Time" data-target="#date3"
                                            data-toggle="datetimepicker" />
                                        <label for="datetime">Date & Time</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="address" name="customer_address" class="form-control bg-transparent"
                                            id="email" placeholder="Your Address">
                                        <label for="email">Your Address</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        @foreach ($packages as $package)
                                            <select name="package_id" class="form-select bg-transparent" id="select1">
                                                <option value="{{ $package->id }}">{{ $package->title }}</option>
                                            </select>
                                        @endforeach
                                        <label for="select1">Select Package</label>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control bg-transparent" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                <label for="message">Special Request</label>
                            </div>
                        </div> --}}
                                <div class="col-12">
                                    <button class="btn btn-outline-light w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->


    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center backg-colors px-3">Process</h6>
                <h1 class="mb-5">Easy Steps</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">

                @foreach ($our_process as $value)
                    <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="position-relative border border-success pt-5 pb-4 px-4">
                            <div class="d-inline-flex align-items-center justify-content-center button-colors rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                                style="width: 100px; height: 100px;">
                                <i class="{{ $value->icon_link }} fa-3x text-white"></i>
                            </div>
                            <h5 class="mt-4">{{ $value->title }}</h5>
                            <hr class="w-25 mx-auto button-colors mb-1">
                            <hr class="w-50 mx-auto button-colors mt-0">
                            <p class="mb-0">{{ $value->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Process Start -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center backg-colors px-3">Travel Guide</h6>
                <h1 class="mb-5">Meet Our Guide</h1>
            </div>
            <div class="row g-4">
                @foreach ($all_guide as $guide)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ asset('upload/guide') }}/{{ $guide->photo }}"
                                    alt="{{ $guide->name }}">
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

                @foreach ($testimonial as $value)
                    <div class="testimonial-item bg-white text-center border p-4">
                        <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3"
                            src="{{ asset('uploads/testimonial') }}/{{ $value->client_img }}"
                            style="width: 80px; height: 80px;">
                        <h5 class="mb-0">{{ $value->client_name }}</h5>
                        <p>New York, USA</p>
                        <p class="mb-0">{{ $value->client_msg }}</p>
                    </div>
                @endforeach


                {{-- <div class="testimonial-item bg-white text-center border p-4">
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
        </div> --}}
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection

@section('footer_script')
    @if (session('booking_done'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Your booking has been successfully confirmed and you will be updated by phone Call very Soon",
                showConfirmButton: false,
                timer: 8500
            });
        </script>
    @endif
@endsection
