<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Berichtravel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @include('frontend.css.css')
</head>

<body>

    <!-- Spinner Start -->
    {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> --}}
    <!-- Spinner End -->


    <!-- Topbar Start -->
    {{-- <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>0133 250 9 708</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="{{ route('home') }}" class="navbar-brand p-0">
                {{-- <h1 class="text-success m-0"><i class="fa fa-map-marker-alt me-3"></i>Tourist</h1> --}}
                <img src="{{ asset('uploads/system_img') }}/{{ Setting('logo_img') }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ route('about.page') }}" class="nav-item nav-link">Blog</a>
                    {{-- <a href="service.html" class="nav-item nav-link">Services</a> --}}
                    <a href="{{ route('all_packagesss') }}" class="nav-item nav-link">Our Service</a>
                    @auth('customer')
                    <a href="{{ route('customer.profile') }}" class="nav-item nav-link">Profile</a>
                    @else
                    <a href="{{ route('customer.login') }}" class="nav-item nav-link">Login</a>
                    @endauth
                </div>


            </div>
        </nav>

        @yield('hero_section')
    </div>

     @yield('content')


    <!-- Footer Start -->
    @include('frontend.layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg button-colors btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    @include('frontend.js.javascript')

    @yield('footer_script')


</body>

</html>
