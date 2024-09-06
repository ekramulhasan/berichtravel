<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend') }}/lib/wow/wow.min.js"></script>
<script src="{{ asset('frontend') }}/lib/easing/easing.min.js"></script>
<script src="{{ asset('frontend') }}/lib/waypoints/waypoints.min.js"></script>
<script src="{{ asset('frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ asset('frontend') }}/lib/tempusdominus/js/moment.min.js"></script>
<script src="{{ asset('frontend') }}/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="{{ asset('frontend') }}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('frontend') }}/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            items: 1
        });
    });
    </script>

@stack('frontend_js')
