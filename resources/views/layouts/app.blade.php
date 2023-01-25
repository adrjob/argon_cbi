<?php
use \App\Models\Programs;

$residency = Programs::where('type', 0)->get();
$citisenship = Programs::where('type', 1)->get();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/vancis_logo.png">
    <link rel="icon" type="image/png" href="/assets/img/vancis_logo.png">
    <title>Vancis Capital</title>
    
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">

    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.11.5/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/argon-dashboard.css" rel="stylesheet" />

    <style>
        .gold_bg {
            background: -webkit-linear-gradient(left, #936a0b, #936a0b, #936a0b);    
            color: white;
        }
        .bg-gradient-dark {
            background: -webkit-linear-gradient(left, #936a0b, #936a0b, #936a0b);    
        }
        .form-switch .form-check-input:checked {
            border-color: #936a0b;
            background-color: #936a0b;;
        }
        .center {
            display: block; 
            margin-left: auto; 
            margin-right: auto;
        }
        .card {
            border-radius: 0px;
        }

        .dataTable-wrapper .dataTable-bottom .dataTable-pagination .dataTable-pagination-list .active a {
    background: transparent;
    background-color: #936a0b;
    box-shadow: 0 7px 14px rgb(50 50 93 / 10%), 0 3px 6px rgb(0 0 0 / 8%);
    color: #fff;
    border: none;
    border-radius: 50% !important;
}

    </style>

    @stack('css')

</head>

<body class="g-sidenav-show bg-gray-200 {{ $class ?? '' }}">
    @guest
        @yield('content')
    @endguest

    @auth
        @if (str_contains(request()->url(), 'rtl') ||
            str_contains(request()->url(), 'pricing-page') ||
            in_array(
                request()->route()->getName(),
                ['signins', 'signups', 'resets', 'locks', 'verifications', 'errors']))
            @yield('content')
        @else
            @if (str_contains(request()->url(), 'landing'))
                @include('components.headers.hero', ['height' => 'h-100'])
                @include('layouts.navbars.auth.sidenav', [
                    'box' => 'box-shadow-none',
                    'logo' => '/assets/img/logo-ct.png',
                ])
            @elseif (!str_contains(request()->url(), 'vr'))
                @if (Route::currentRouteName() == 'profiles' || str_contains(request()->url(), 'new-product'))
                    @include('components.headers.image-hero')
                @else
                    @include('components.headers.hero')
                @endif
                @include('layouts.navbars.auth.sidenav', ['bg' => 'bg-white'])
            @endif

            <main class="main-content position-relative border-radius-lg">
                @yield('content')                
            </main>
        @endif
    @endauth

    <!--   Core JS Files   -->
    @stack('js')

    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    {{-- <script src="/assets/js/core/bootstrap.bundle.min.js"></script> --}}
    <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/fullcalendar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/assets/js/argon-dashboard.js"></script>
</body>

</html>
