<div class="container-xxl py-5 destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center backg-colors px-3">Destination</h6>
            <h1 class="mb-5">Popular Destination</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-12 col-md-12">

                <div class="row g-3">

                    {{-- <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                        <a class="position-relative d-block overflow-hidden" href="">
                            <img class="img-fluid" src="{{ asset('frontend') }}/img/destination-1.jpg" alt="">
                            <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">30%
                                OFF</div>
                            <div class="bg-white backg-colors fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                Thailand</div>
                        </a>
                    </div> --}}

                    @foreach ($destination as $value)

                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="#">
                                <img class="img-fluid" src="{{ asset('uploads/destination') }}/{{ $value->img }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{ $value->off_per }}%
                                    OFF</div>
                                <div class="bg-white backg-colors fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">
                                    {{ $value->country_name }}</div>
                            </a>
                        </div>
                    @endforeach





                </div>
            </div>

        </div>
    </div>
</div>
