<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/magnific-popup.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>{{config('app.name','Majd')}}</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->
   @yield('content')
    <!-- #content end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="{{ asset('site/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/js/plugins.js') }}"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{ asset('site/js/functions.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/js/helpers/actions.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/js/pages/login.js') }}"></script>

</body>
</html>