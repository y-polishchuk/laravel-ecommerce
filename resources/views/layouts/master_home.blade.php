<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Company - AREY</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/web/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/web/apple-touch-icon.png') }}" rel="apple-touch-icon">

  @vite('resources/js/web-pages.js')
</head>

<body>

@include('layouts.body.header')



  <main id="main">

    @yield('home_content')

  </main><!-- End #main -->

@include('layouts.body.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script type="module">
@if(Session::has('message'))
var type = "{{ Session::get('alert-type', 'info') }}"
switch(type) {
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break;

}
@endif
</script>
</body>

</html>