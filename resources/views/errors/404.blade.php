<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 Error Page</title>
    @vite('resources/js/admin-panel.js')
</head>
<body>
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-xl-8 text-center">
                    <img src="{{ asset('assets/img/error/404-error-page.png') }}" class="img-responsive" alt="Error Page Image">
                    <div class="justify-content-center">
                    <a href="/" class="btn btn-success btn-pill mt-3">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>