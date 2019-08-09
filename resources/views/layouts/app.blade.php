<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIKOMIS | HMI Kom.Saintek</title>

    <!-- Styles -->
    <link href="{{ url('home/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ url('images/logo_hmi.png') }}" />

    <style type="text/css">
        @font-face {font-family: "Century725W01-Condensed";
            src: url("https://db.onlinewebfonts.com/t/2761ff5c1c9695ef26215d530201ad1c.eot");
            src: url("https://db.onlinewebfonts.com/t/2761ff5c1c9695ef26215d530201ad1c.eot?#iefix") format("embedded-opentype"),
            url("https://db.onlinewebfonts.com/t/2761ff5c1c9695ef26215d530201ad1c.woff2") format("woff2"),
            url("https://db.onlinewebfonts.com/t/2761ff5c1c9695ef26215d530201ad1c.woff") format("woff"),
            url("https://db.onlinewebfonts.com/t/2761ff5c1c9695ef26215d530201ad1c.ttf") format("truetype"),
            url("https://db.onlinewebfonts.com/t/2761ff5c1c9695ef26215d530201ad1c.svg#Century725W01-Condensed") format("svg");
        }

        body{
            font-size: 25px;
            font-family: 'Century725W01-Condensed', sans-serif;
        }
    </style>

    @yield('style')
</head>
<body>
    @include('sweetalert::alert')
    <div id="app" style="overflow-x: hidden;">
        @yield('navbar')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ url('home/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('home/js/bootstrap.js') }}"></script>

    @yield('script')
</body>
</html>
