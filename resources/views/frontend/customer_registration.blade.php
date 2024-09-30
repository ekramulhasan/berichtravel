@extends('frontend.master')

@push('frontend_css')
    <style>
        .gradient-custom-3 {
            /* fallback for old browsers */
            background: #84fab0;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
        }

        .gradient-custom-4 {
            /* fallback for old browsers */
            background: #84fab0;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
        }
    </style>
@endpush

@section('content')
   <div class="row">
        <div class="col-12">
            <section class="bg-image"
            style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
            <div class="mask d-flex align-items-center gradient-custom-3" style="margin-bottom: -10%;">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center mt-4">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6 " style="margin-top: 10%;margin-bottom: 10%;">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                    <form action="{{ route('customer.registration') }}" method="POST">
                                        @csrf

                                        <div data-mdb-input-init class="form-outline mb-3">
                                            <label class="form-label" for="name">Your Name</label>
                                            <input type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-3">
                                            <label class="form-label" for="mobile">Your Mobile Number</label>
                                            <input type="text" id="mobile" class="form-control form-control-lg @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" />
                                            @error('mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-3">
                                            <label class="form-label" for="email">Your Email</label>
                                            <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" />
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-3">
                                            <label class="form-label" for="password_confirmation">Repeat your password</label>
                                            <input type="password" id="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" />
                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="has_referral" id="has_referral" {{ old('has_referral') ? 'checked' : '' }}>
                                                <label class="form-check-label fw-bold text-primary" for="has_referral">
                                                    I have a referral code
                                                </label>
                                            </div>
                                        </div>

                                        <div id="referral_code_field" style="display: {{ old('has_referral') ? 'block' : 'none' }};">
                                            <div data-mdb-input-init class="form-outline mb-3">
                                                <label class="form-label" for="referral_code">Referral Code</label>
                                                <input type="number" id="referral_code" class="form-control form-control-lg @error('referral_code') is-invalid @enderror" name="referral_code" value="{{ old('referral_code') }}" />
                                                @error('referral_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-check mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="terms" required {{ old('terms') ? 'checked' : '' }} />
                                            <label class="form-check-label" for="terms">
                                                I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                        </div>

                                        <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{ route('customer.login') }}"
                                                class="fw-bold text-body"><u>Login here</u></a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
   </div>
@endsection


@push('frontend_js')
    <script>
        document.getElementById('has_referral').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('referral_code_field').style.display = 'block';
            } else {
                document.getElementById('referral_code_field').style.display = 'none';
            }
        });
    </script>
@endpush
