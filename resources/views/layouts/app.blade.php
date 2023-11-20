<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Project pro</title>
    <style>
    .login-background {
            background-image: url('/images/download.jfif');
            background-size: cover;
            background-position: center;
        }
        </style>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.3/font/bootstrap-icons.css">

     {{-- <link href="{{asset('app.css')}}" rel="stylesheet"> --}}
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color:LightGray;color:white ">
    <div id="app">
        @include('layouts.navbar')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2  text-white " style="background-color:rgb(240, 240, 240)">
                    <!-- Sidebar content here -->
                    @include('layouts.sidebar')
                </div>

                <div class="col-md-10">

                    <main class="pt-5" style="background-color:white;color: black;">
                        @yield('content')
                    </main>
                </div>

            </div>
        </div>
    </div>
    {{-- <script src="{{asset('app.js')}}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
