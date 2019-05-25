<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js?ver=2') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            padding-bottom: 100px;
        }

        .level {
            display: flex;
            align-items: right;
        }

        .flex {
            flex: 1;
        }
    </style>
</head>

<body>
    <div id="app">
        @include ('layouts.nav')

        @yield('content')

        {{-- <example-component></example-component> --}}
        {{-- <flash></flash> --}}
        <flash message="{{ session('flash') }}"></flash>
        {{-- <flash message="temp"></flash> --}}

    </div>
</body>

</html>
