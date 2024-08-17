<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/login') }}/style.css" rel="stylesheet">
    <link href="{{ asset('frontend/login') }}/font-awesome.min.css" rel="stylesheet">

<title>{{ env('APP_NAME') }}</title>
  </head>
  <body>
    <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                  <img src="{{ asset('frontend') }}/img/TravelAgencyLogo.png">
                </div>
                <form method="POST" action="{{ route('customer.login_post') }}">
                    @csrf
                    @if (session('email'))
                    <div class="alert alert-success">
                     {{ session('email') }}
                    </div>
                   @endif
                <div class="form-group">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                  <input type="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
                </div>
                @if (session('password'))
                <div class="alert alert-success">
                 {{ session('password') }}
                </div>
               @endif
                <div class="form-group">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
                  <input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Enter Password" required="" aria-required="true">
                </div>

                <div class="checkbox form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="">
                      Remember me
                    </label>
                  </div>
                  <a href="#">Forgot Password</a>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Login</button>
                  </div>
              </form>

                <div class="form-group nm_lk"><p>Or <a href="{{ route('customer.register') }}">Registration</a> </p></div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
