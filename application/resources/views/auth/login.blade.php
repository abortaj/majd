@extends('layouts.auth')

@section('content')
    <section id="content">

        <div class="content-wrap nopadding">

            <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>

            <div class="section nobg full-screen nopadding nomargin">
                <div class="container-fluid vertical-middle divcenter clearfix">

                    <div class="center">
                        <a href="{{route('home')}}"><img src="{{asset('site/images/logo-dark.png')}}" alt="Canvas Logo"></a>
                    </div>

                    <div class="card divcenter noradius noborder" style="max-width: 400px;">
                        <div class="card-body" style="padding: 40px;">
                            {!! Form::open(['url'=>'login', 'class'=>'auto-form','on-success'=>'loginSuccess']) !!}

                                <h3>@lang('login.title')</h3>

                                <div class="col_full">
                                    <label>@lang('login.email')</label>
                                    <input type="text" name="email" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full">
                                    <label>@lang('login.password')</label>
                                    <input type="password" name="password" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
                                    <a href="#" class="fright">@lang('login.forget_password')</a>
                                </div>
                              {!! Form::close() !!}

                            <div class="line line-sm"></div>
                            <div>
                                <h4 style="margin-bottom: 15px;">@lang('login.alternative_login')</h4>
                                <a href="#" class="social-icon si-colored si-gplus" title="Google Plus">
                                    <i class="icon-gplus"></i>
                                    <i class="icon-gplus"></i>
                                </a>
                                <a href="#" class="social-icon si-colored si-facebook" title="Facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#" class="social-icon si-colored si-linkedin" title="Linked In">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-linkedin"></i>
                                </a>
                            </div>

                            <div class="line line-sm"></div>
                            <div class="col_full nobottommargin text-center">
                                <a href="{{ route('register') }}">@lang('login.no_account')</a>
                            </div>
                        </div>
                    </div>

                    <div class="center dark"><small>Copyrights &copy; All Rights Reserved by Canvas Inc.</small></div>

                </div>
            </div>

        </div>

    </section>
@endsection
