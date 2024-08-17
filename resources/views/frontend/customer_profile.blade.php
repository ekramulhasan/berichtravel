@extends('frontend.master')

@section('hero_section')
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            {{-- <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Tempor erat elitr rebum at clita diam amet diam et eos erat ipsum lorem sit</p>
                <div class="position-relative w-75 mx-auto animated slideInDown">
                    <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: Thailand">
                    <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                </div>
            </div> --}}
        </div>
    </div>
</div>

<!-- Navbar & Hero End -->
@endsection

@section('content')

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
               <div class="cart shadow p-3 mb-5 bg-white rounded">
                <div class="position-relative text-center" >
                    @if(Auth::guard('customer')->user()->photo ==null)
                    <img src="{{ Avatar::create(Auth::guard('customer')->user()->name)->toBase64() }}" />
                    @else
                    <img class="" src="{{asset('upload/user') }}/{{ Auth::guard('customer')->user()->photo }}" alt="{{ Auth('customer')->name }}" style="object-fit: cover;">
                    @endif

                </div>
                <div class="text-center py-4">
                    <p>{{ Auth::guard('customer')->user()->name }}</p>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="{{ route('customer.profile')}}" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="{{ route('customer.deposit') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Top-Up</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="{{ route('customer.profile.settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="{{ route('customer.logout') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Logout</a>
                  </div>
               </div>
            </div>


            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row">
                    <div class="col-6">
                       <div class="text-center shadow-lg p-3 mb-5 bg-white rounded">
                        <h4>My Balance: {{ Auth::guard('customer')->user()->balance }}</h4>
                       </div>
                    </div>
                    <div class="col-6">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
