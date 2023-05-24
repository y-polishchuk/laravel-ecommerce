<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Admin Forgot Password</title>
  <!-- FAVICON -->
  <link href="{{ asset('assets/img/admin/favicon.png') }}" rel="shortcut icon" />
  @vite('resources/js/admin-panel.js')
</head>

</head>
  <body class="bg-light-gray" id="body">
      <div class="container d-flex flex-column justify-content-between vh-100">
      <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="/">
                  <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                    viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                      <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                      <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                  </svg>
                  <span class="brand-name">Admin Dashboard</span>
                </a>
              </div>
            </div>

            <div class="card-body p-5">

              <h4 class="text-dark mb-5">Get Password Reset Link</h4>
              <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf
                <div class="row">
                <div class="form-group col-md-12 mb-4 text-dark">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>
                @if (session('status'))
                <div class="form-group col-md-12 mb-4 text-success">
                {{ session('status') }}
                </div>
                 @endif
                    <x-jet-validation-errors class="form-group col-md-12 mb-4 text-danger" />
                  <div class="form-group col-md-12 mb-4">
                    <input type="email" name="email" class="form-control input-lg" aria-describedby="emailHelp" placeholder="Email" :value="old('email')" required autofocus>
                  </div>
                  <div class="col-md-12"> 
                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Email Password Reset Link</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright pl-0">
        <p class="text-center">&copy; 2018 Copyright Dashboard by
          <a class="text-primary" href="https://www.google.com/" target="_blank">Google</a>.
        </p>
      </div>
    </div>
</body>
</html>