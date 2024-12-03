<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" lang="en" class="light-style layout-wide customizer-hide"
    dir="ltr" data-theme="theme-default" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- style -->
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/fontawesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/tabler-icons.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" rel="stylesheet" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" rel="stylesheet" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/node-waves/node-waves.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/typeahead-js/typeahead.css') }}" rel="stylesheet" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/@form-validation/form-validation.css') }}" / rel="stylesheet">

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-auth.css') }}" rel="stylesheet" />

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>

    @yield('customs_css')
</head>

<body>
    {{ $slot }}
</body>
<script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ asset('vendor/js/menu.js') }}"></script>

<!-- endbuild -->
<!-- Vendors JS -->
<script src="{{ asset('vendor/libs/@form-validation/popular.js') }}"></script>
<script src="{{ asset('vendor/libs/@form-validation/bootstrap5.js') }}"></script>
<script src="{{ asset('vendor/libs/@form-validation/auto-focus.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('js/main.js') }}"></script>
@yield('customs_js')

</html>
