<!DOCTYPE html>
<html lang="en">
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Admin Register</title>

  <!-- FAVICON -->
  <link href="{{ asset('backend/assets/img/favicon.png') }}" rel="shortcut icon" />
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
                      <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                        height="33" viewBox="0 0 30 33">
                        <g fill="none" fill-rule="evenodd">
                          <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                          <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                        </g>
                      </svg>
                      <span class="brand-name">Dashboard</span>
                    </a>
                  </div>
                </div>
                <div class="card-body p-5">
                  <h4 class="text-dark mb-5">Email Verify</h4>
                  
                    <div class="row">
                      <div class="form-group col-md-12 mb-4">
                      {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                      </div>
                      @if (session('status') == 'verification-link-sent')
                        <div class="form-group col-md-12 mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                        </div>
                      @endif
                      <form method="POST" action="{{ route('admin.verification.send') }}">
                        @csrf
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Resend Verification Email</button>
                      </div>
                      </form>
                      <div class="form-group col-md-12 mb-4">
                        <a href="{{ route('admin.profile.show') }}" class="underline text-sm">Edit Profile</a>
                      </div>
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Log Out</button>
                      </div>
                      </form>
                    </div>
                  

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