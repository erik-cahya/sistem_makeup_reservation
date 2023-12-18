<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Haarino - Barber and Salon HTML Template - Home One</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Haarino - Barber and Salon HTML Template">
    <meta name="keywords" content="Haarino - Barber and Salon HTML Template" />
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--==============================
 All CSS File
 ============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Handlee&family=Open+Sans:wght@400;600&family=Syne:wght@600;700&display=swap"
        rel="stylesheet">


    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('vendor/landing_page') }}/assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('vendor/landing_page') }}/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
 All CSS File
 ============================== -->
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="{{ asset('vendor/landing_page') }}/assets/css/app.min.css"> -->
    <link rel="stylesheet" href="{{ asset('vendor/landing_page') }}/assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('vendor/landing_page') }}/assets/css/fontawesome.min.css">
    <!-- Layerslider -->
    <link rel="stylesheet" href="{{ asset('vendor/landing_page') }}/assets/css/layerslider.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('vendor/landing_page') }}/assets/css/magnific-popup.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('vendor/landing_page') }}/assets/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/landing_page') }}/assets/css/style.css">

</head>

<body>


    {{-- Header --}}
    @include('landing-page.section.header')
    {{-- Hero Area --}}
    @include('landing-page.section.hero-area')
    {{-- About Us --}}
    @include('landing-page.section.about')
    {{-- Services --}}
    @include('landing-page.section.service')
    {{-- Detail Service --}}
    @include('landing-page.section.detail-service')
    {{-- Teams --}}
    @include('landing-page.section.team-area')
    {{-- Testimonial --}}
    @include('landing-page.section.testimonial-area')
    {{-- Contact --}}
    @include('landing-page.section.contact-area')
    {{-- Footer --}}
    @include('landing-page.section.footer-area')




    <!-- Scroll To Top -->
    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>



    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="{{ asset('vendor/landing_page') }}/assets/js/vendor/jquery.min.js"></script>
    <!-- Slick Slider -->
    <!-- <script src="{{ asset('vendor/landing_page') }}/assets/js/app.min.js"></script> -->
    <script src="{{ asset('vendor/landing_page') }}/assets/js/slick.min.js"></script>
    <!-- Layerslider -->
    <script src="{{ asset('vendor/landing_page') }}/assets/js/layerslider.utils.js"></script>
    <script src="{{ asset('vendor/landing_page') }}/assets/js/layerslider.transitions.js"></script>
    <script src="{{ asset('vendor/landing_page') }}/assets/js/layerslider.kreaturamedia.jquery.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendor/landing_page') }}/assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('vendor/landing_page') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('vendor/landing_page') }}/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('vendor/landing_page') }}/assets/js/isotope.pkgd.min.js"></script>
    <!-- Custom Carousel -->
    <script src="{{ asset('vendor/landing_page') }}/assets/js/vscustom-carousel.min.js"></script>
    <!-- Form Js -->
    <script src="{{ asset('vendor/landing_page') }}/assets/js/ajax-mail.js"></script>
    <!-- Main Js File -->
    <script src="{{ asset('vendor/landing_page') }}/assets/js/main.js"></script>


</body>

</html>
