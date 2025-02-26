<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="freefcw"/>
    <meta name="keywords" content="华中科技大学, ACM, freefcw, sempr, online judge, 计算机竞赛, 编程, ICPC"/>
    <meta name="robots" content="index,follow"/>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>@section('title') {{ config('app.name', 'HUSTOJ') }} @show</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('assets/site/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('assets/site/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('assets/site/ico/favicon.ico') }}">
    @yield('styles')
</head>
<body>
@section('navbar')
    @include('web.partials.nav')
@show
<div id="app">
    <div class="container">
        @include('web.partials.notifications')
        <main class="py-4">
        @yield('content')
        </main>
    </div>
</div>
@include('web.partials.footer')
<!-- Scripts -->
<script src="{{ asset('js/manifest.js')}}"></script>
<script src="{{ asset('js/vendor.js')}}"></script>
<script src="{{ asset('js/app.js')}}"></script>
@yield('scripts')
<div class="text-center pb-5 pt-3">
    © 2025. Todos los derechos reservados.
</div>
</body>
</html>
