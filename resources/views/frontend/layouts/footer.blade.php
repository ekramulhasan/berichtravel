<div class="container-fluid bg-dark text-light footer pt-5  wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Company</h4>
                <a class="btn btn-link" href="{{ route('about.page') }}">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Privacy Policy</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">FAQs & Help</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ Setting('site_address') }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ Setting('site_phone') }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ Setting('site_email') }}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="{{ Setting('site_twitter_link') }}"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ Setting('site_facebook_link') }}"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ Setting('site_youtube_link') }}"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ Setting('site_linkeding_link') }}"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Gallery</h4>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('frontend') }}/img/package-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('frontend') }}/img/package-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('frontend') }}/img/package-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('frontend') }}/img/package-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('frontend') }}/img/package-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('frontend') }}/img/package-1.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-success w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn button-colors py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">berichtravel</a>, All Right Reserved.


                    Designed By <a class="border-bottom" href="#"></a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
