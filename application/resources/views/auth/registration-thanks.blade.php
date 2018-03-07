@extends('layouts.thanks')

@section('content')

    <div class="heading-block center">
        <h1>@lang('thanks.registration_title')</h1>
        <span>@lang('thanks.registration_subtitle')</span>
    </div>

    <div class="style-msg successmsg">
        <div class="sb-msg"><i class="icon-thumbs-up"></i> @lang('thanks.registration_text')</div>
    </div>

    <a href="{{ route('home') }}" class="button button-xlarge tright">
        @lang('thanks.back_to_home') <i class="icon-home"></i>
    </a>


    <a href="{{ route('login') }}" class="button button-xlarge tright">
        @lang('thanks.go_to_login') <i class="icon-lock"></i>
    </a>

@endsection
