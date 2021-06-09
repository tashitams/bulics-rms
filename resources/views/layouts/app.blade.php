<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="{{ mix('js/app.js') }}"></script> -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;700;800&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->
    @livewireStyles

</head>

<body>
    <div id="app">
        @include('inc.navbar.main')

        <main class="py-4">
            @yield('content')
        </main>

        @include('inc.footer')
    </div>
    <!-- Scripts -->
    @yield('custom-js')
    @livewireScripts

</body>
</html>