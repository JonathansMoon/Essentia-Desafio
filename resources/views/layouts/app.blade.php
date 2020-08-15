<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Essentia Pharma') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('vendor/js/bootstrap.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons de validação -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/font-awesome.min.css') }}">
    <!-- icon eyes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css/material-design-iconic-font.min.css') }}">
    @stack('styles')
    <!-- Styles -->
    <link href="{{ asset('vendor/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('custom/css/styles.css') }}" rel="stylesheet">
    @toastr_css
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-purple shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{route('client.index')}}">
                    {{ config('app.name', 'Essentia King') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @jquery
    @toastr_js
    @toastr_render
    @stack('js')
</body>
</html>
