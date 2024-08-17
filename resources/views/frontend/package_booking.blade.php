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
            <div class="col-lg-7 wow fadeInUp shadow p-3 mb-5 bg-white rounded" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="text-center"><h4 class="my-3">Fill out the form below to Booking</h4></div>

                <div class="position-relative " style="width: 80%; margin:0px auto;">
                    <form lass="forms-sample" action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group my-2">
                          <label for="formGroupExampleInput" class="mb-2">Your Name</label>
                          <input type="text" name="customer_name" class="form-control" id="formGroupExampleInput" placeholder="Your Name">
                        </div>
                        <div class="form-group my-2">
                          <label for="formGroupExampleInput2" class="mb-2">Your Email</label>
                          <input type="email" name="customer_email" class="form-control" id="formGroupExampleInput2" placeholder="Your Email">
                        </div>
                        <div class="form-group my-2">
                          <label for="formGroupExampleInput2" class="mb-2">Your Address </label>
                          <input type="text" name="customer_address" class="form-control" id="formGroupExampleInput2" placeholder="Your Address">
                        </div>
                        <div class="form-group my-2">
                          <label for="formGroupExampleInput2" class="mb-2">Your Phone Number</label>
                          <input type="number" name="customer_phone" class="form-control" id="formGroupExampleInput2" placeholder="Your Phone Number">
                        </div>
                        <div class="form-group my-2">
                          <label for="formGroupExampleInput2" class="mb-2">Checkout Date</label>
                          <input type="date" name="checkout_date" class="form-control" id="formGroupExampleInput2" placeholder="Your Phone Number">
                        </div>
                        <input type="hidden" name="package_id" value="{{ $package_info->id }}">
                        <div class="form-group my-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Confirm Booking</button>
                        </div>
                      </form>
                </div>
            </div>
            <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3 my-3">Your Booking</h6>
                <h5 class="mb-2">{{ $package_info->title }}</h5>
                <h4 class="mb-2">Location: {{ $package_info->location }} <i class="fa fa-map-marker-alt text-primary me-2"></i> </h4>
                <h4 class="mb-2">Time Line: <span class="text-primary"> {{ $package_info->time }} </span> Days</h4>
                <h4 class="mb-2">Person: For <span class="text-primary">{{ $package_info->person }} </span>People</h4>
                <h4 class="mb-2">Number of Room: For <span class="text-primary">{{ $package_info->room }} </span>Room</h4>
                <h4 class="mb-2">Price: BDT <span class="text-primary">{{ $package_info->price }} TK</span>Only</h4>
                 <div class="image my-4">
                    <img src="{{ asset('upload/package') }}/{{ $package_info->image }}" alt="{{ $package_info->title }}" alt="" style="object-fit: cover;width:80%;height:200px;">
                 </div>
            </div>
        </div>


    </div>
    </div>

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
