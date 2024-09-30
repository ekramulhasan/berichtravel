<!-- SEO Meta Tags -->
<meta name="description" content="{{ Setting('meta_des') }}">
<meta name="keywords" content="{{ Setting('meta_key') }}">
<meta name="author" content="{{ Setting('meta_auth') }}">
<meta name="robots" content="index, follow">

<!-- Open Graph Meta Tags for social media sharing -->
<meta property="og:title" content="{{ Setting('meta_page_title') }}">
<meta property="og:description" content="{{ Setting('meta_page_des') }}">
<meta property="og:image" content="{{ Setting('meta_img_url') }}">
<meta property="og:url" content="{{ Setting('meta_page_url') }}">
<meta property="og:type" content="website">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ Setting('meta_twi_page_title') }}">
<meta name="twitter:description" content="{{ Setting('meta_twi_page_des') }}">
<meta name="twitter:image" content="{{ Setting('meta_twi_img_url') }}">

<!-- Facebook Meta Pixel Code -->
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '{{ Setting('meta_fb_id') }}');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id={{ Setting('meta_fb_id') }}&ev=PageView&noscript=1" />
</noscript>

<!-- Google Tag Manager -->
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', '{{ Setting('meta_gtm_id') }}');
</script>


<!-- Favicon -->
<link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('frontend') }}/lib/animate/animate.min.css" rel="stylesheet">
<link href="{{ asset('frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="{{ asset('frontend') }}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('frontend') }}/img/TravelAgencyLogo.png" />
<!-- Template Stylesheet -->
<link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">

{{-- toaster css --}}
<link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

{{-- fontawesome cdn --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />



@stack('frontend_css')
