<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="../assets/img/stisla-fill.svg" alt="logo" width="80"
              class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Asset Management
                System</span></h4>
            <p class="text-muted">Before you get started, you must login or register if you don't already have an
              account.</p>

            <form method="POST" action="{{ route('login')}}" class="needs-validation" novalidate="">
              @csrf
              <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" placeholder="Enter your email" required autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">{{ __('Password') }}</label>
                </div>

                <div class="input-group">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Enter your password">

                  <div class="input-group-append">
                    <span class="input-group-text" style="cursor:pointer;" id="togglePassword">
                      <i class="fas fa-eye"></i>
                    </span>
                  </div>
                </div>
                @error('password')
                  <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                @enderror
              </div>


              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="remember-me">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>

              @if (Route::has('password.request'))
                <div class="form-group text-right">
                  <a href="{{ route('password.request')}}" class="float-left mt-3">
                    {{ __('Forgot Your Password ?') }}
                  </a>
              @endif
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  {{ __('Login') }}
                </button>
              </div>

              <div class="mt-5 text-center">
                Don't have an account? <a href="{{ route('register')}}">Create new one</a>
              </div>
            </form>
            <a href="auth/redirect"
              class="btn btn-light btn-block mt-3 d-flex align-items-center justify-content-center shadow-sm"
              style="border: 1px solid #dadce0; height: 45px; font-weight: 500;">

              <img src="{{ asset('assets/img/unsplash/Google__G__logo.svg') }}" width="18" class="me-2 mr-2">

              Continue with Google
            </a>


            <div class="text-center mt-5 text-small">
              Copyright &copy; Management System. Made with 💙 by <a href="#">Isa</a>.
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>
        <div
          class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
          data-background="{{ asset('assets/img/unsplash/Takanashi.Hoshino.full.3831903.png') }}">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">
                  Good Morning
                </h1>
                <h5 class="font-weight-normal text-muted-transparent ml-2">Jakarta, Indonesia</h5>
              </div>
              <span class="ml-2"> Photo by <a class="text-light bb" target="_blank" href="#">Syphilis</a> on <a
                  class="text-light bb" target="_blank" href="#">Zerochan</a></span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>

</html>