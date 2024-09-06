<script>
    ClassicEditor.create(document.querySelector('#ckeybord'))
        .catch(error => {
            console.error(error);
        });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<!-- core:js -->
<script src="{{ asset('backend') }}/assets/vendors/core/core.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{ asset('backend') }}/assets/vendors/chartjs/Chart.min.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/jquery.flot/jquery.flot.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('backend') }}/assets/vendors/progressbar.js/progressbar.min.js"></script>
<!-- end plugin js for this page -->

<!-- inject:js -->
<script src="{{ asset('backend') }}/assets/vendors/feather-icons/feather.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/template.js"></script>
<!-- endinject -->
<!-- custom js for this page -->
<script src="{{ asset('backend') }}/assets/js/dashboard.js"></script>
<script src="{{ asset('backend') }}/assets/js/datepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- toaster --}}
<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@stack('backend_js')
