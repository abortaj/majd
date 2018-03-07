<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! SEOMeta::generate() !!}
        {!! OpenGraph::generate() !!}
        {!! Twitter::generate() !!}

        <link rel="stylesheet" href="{{ asset('adm/css/app.css') }}?ver=@if(app()->environment()=="local"){{rand(99999,9999999)}}@else 0.3 @endif">
    </head>
    <body class="aside-collapsed-text">
        <div id="app"></div>
       <script src="{{ asset('adm/js/main.js') }}?ver=@if(app()->environment()=="local"){{rand(99999,9999999)}}@else 0.6 @endif"></script>
    </body>
</html>
