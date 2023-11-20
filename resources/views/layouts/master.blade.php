<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        .login-background {
            background-image: url('/images/download.jfif');
            background-size: cover;
            background-position: center;
        }
    </style>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-xxxxxx" crossorigin="anonymous">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body  class="login-background">
    <div id="app">
        @include('layouts.masternavbar')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <!-- Sidebar content here -->

                </div>
                <div class="col-md-10">

                    <main class="pt-5">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="{{asset('app.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-xxxxxx" crossorigin="anonymous"></script>
</body>
</html>
