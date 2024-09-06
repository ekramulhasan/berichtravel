 <!-- core:css -->
 <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendors/core/core.css">
 <!-- endinject -->
 <!-- plugin css for this page -->
 <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
 <!-- end plugin css for this page -->
 <!-- inject:css -->
 <link rel="stylesheet" href="{{ asset('backend') }}/assets/fonts/feather-font/css/iconfont.css">
 <link rel="stylesheet" href="{{ asset('backend') }}/assets/vendors/flag-icon-css/css/flag-icon.min.css">
 <!-- endinject -->
 <!-- Layout styles -->
 <link rel="stylesheet" href="{{ asset('backend') }}/assets/css/demo_1/style.css">
 <!-- End layout styles -->
 <link rel="shortcut icon" href="{{ asset('frontend') }}/img/TravelAgencyLogo.png" />

  {{-- toaster css--}}
  <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

  {{-- fontawesome cdn--}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

@stack('backend_css')
