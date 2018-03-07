<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap-rtl.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}" type="text/css" />
{{--    <link rel="stylesheet" href="{{ asset('site/style-rtl.css') }}" type="text/css" />--}}
    <link rel="stylesheet" href="{{ asset('site/css/swiper.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/dark.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/dark-rtl.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/font-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/font-icons-rtl.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/magnific-popup.css') }}" type="text/css" />
    <!-- Star Rating CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/components/bs-rating.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/css/responsive-rtl.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site/custom.css') }}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Blank Page | Canvas</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container center clearfix">

                @yield('content')

            </div>

        </div>

    </section><!-- #content end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="{{ asset('site/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/js/plugins.js') }}"></script>
<!-- Star Rating Plugin -->
<script type="text/javascript" src="{{ asset('site/js/components/star-rating.js') }}"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ asset('site/js/functions.js') }}"></script>

</body>
</html>