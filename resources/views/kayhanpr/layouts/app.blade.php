<!DOCTYPE html>
<html lang="tr" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('kayhanpr.partials.seo')
    <link rel="icon" href="{{ asset('kayhan/images/favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('kayhan/css/kayhan.css') }}?v=4">
    <link rel="stylesheet" href="{{ asset('kayhan/css/kayhan-pro.css') }}?v=4">
    <link rel="stylesheet" href="{{ asset('kayhan/css/kayhan-site.css') }}?v=6">
    @stack('styles')
</head>
<body class="kp-body top-offset-fix{{ request()->routeIs('home') ? ' kp-body--home' : '' }}">
    @include('kayhanpr.partials.header')
    <main id="main-content">
        @yield('content')
    </main>
    @include('kayhanpr.partials.footer')
    @include('kayhanpr.partials.whatsapp')
    <button type="button" class="kp-back-top" aria-label="Yukarı"><i class="fa-solid fa-chevron-up"></i></button>
    <div id="google_translate_element2" aria-hidden="true"></div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('kayhan/js/kayhan.js') }}?v=8"></script>
    <script src="{{ asset('kayhan/js/kayhan-hero.js') }}?v=1"></script>
    @include('kayhanpr.partials.translate')
    @stack('scripts')
</body>
</html>
