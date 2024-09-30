@extends('frontend.master')

{{-- @section('hero_section')
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Welcome to Your Travel Profile</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Manage your trips, bookings, and preferences all in one place</p>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@section('content')
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5" style="margin-top: 8%;">
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
               <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="position-relative text-center" >
                    @if(Auth::user()->photo == null)
                    <img src="{{ asset('uploads/profile_img/profile.png') }}" alt="Default Avatar" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                    <img class="rounded-circle" src="{{ asset('upload/user/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" style="width: 150px; height: 150px; object-fit: cover;">
                    @endif
                </div>
                <div class="text-center py-4">
                    <h4>{{ Auth::user()->name }}</h4>
                    <p class="text-muted">Traveler since {{ Auth::user()->created_at->format('F Y') }}</p>
                    <p class="text-muted">Referral Code: {{ $referralCode->ref_code }}</p>
                </div>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="{{ route('customer.profile')}}" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                    <a class="nav-link" id="v-pills-trips-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-trips" aria-selected="false">My Trips</a>
                    <a class="nav-link" id="v-pills-bookings-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-bookings" aria-selected="false">Bookings</a>
                    <a class="nav-link" id="v-pills-wishlist-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-wishlist" aria-selected="false">Wishlist</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="{{ route('customer.profile.settings') }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                    <a class="nav-link" id="v-pills-logout-tab" data-toggle="pill" href="{{ route('customer.logout') }}" role="tab" aria-controls="v-pills-logout" aria-selected="false">Logout</a>
                  </div>
               </div>
            </div>

            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row">
                    <div class="col-md-6 mb-4">
                       <div class="text-center shadow-lg p-3 bg-white rounded">
                        <h4>Travel Points</h4>
                        <h2 class="text-primary">
                            @if(isset($useRefPoint) && isset($totalPoint))
                                {{ $useRefPoint->point + $totalPoint }}
                            @elseif(isset($useRefPoint))
                                {{ $useRefPoint->point }}
                            @elseif(isset($totalPoint))
                                {{ $totalPoint }}
                            @else
                                0
                            @endif
                        </h2>
                        <p>Redeem for discounts on your next trip!</p>
                       </div>
                    </div>
                    <div class="col-md-6 mb-4">
                       <div class="text-center shadow-lg p-3 bg-white rounded">
                        <h4>Upcoming Trip</h4>
                        @if(isset($upcomingTrip))
                            <h5>{{ $upcomingTrip->destination }}</h5>
                            <p>{{ $upcomingTrip->start_date->format('M d, Y') }}</p>
                        @else
                            <p>No upcoming trips. Time to plan one!</p>
                        @endif
                       </div>
                    </div>
                </div>
                <div class="card shadow-lg p-4 bg-white rounded">
                    <h3 class="mb-4">Recent Activities</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Booked flight to Paris - 3 days ago</li>
                        <li class="list-group-item">Added Rome to wishlist - 1 week ago</li>
                        <li class="list-group-item">Reviewed Hotel Luxe in London - 2 weeks ago</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
