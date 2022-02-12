<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-2 px-1 bg-dark position-fixed" id="sticky-sidebar">
                @include('sidebar')
            </div>
            <div class="col-10 offset-2" id="main">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
