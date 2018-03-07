@extends('layouts.auth')

@section('content')
    <section id="content">

        <div class="content-wrap nopadding">

            <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>

            <div class="section nobg full-screen nopadding nomargin">
                <div class="container-fluid vertical-middle divcenter clearfix">

                    <div class="center">
                        <a href="index.html"><img src="{{asset('site/images/logo-dark.png')}}" alt="Canvas Logo"></a>
                    </div>

                    <div class="card divcenter noradius noborder" style="max-width: 800px;">
                        <div class="card-body" style="padding: 40px;">
                             {!! Form::open(['route'=>'register', 'class'=>'auto-form nobottommargin']) !!}
                            {{--<form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">--}}

                                <div class="col_half">
                                    <label for="register-form-first-name">@lang('register.first_name')</label>
                                    <input type="text"  name="first_name" value="{{old('first_name')}}" class="form-control" />
                                </div>
                                <div class="col_half col_last">
                                    <label for="register-form-last-name">@lang('register.last_name')</label>
                                    <input type="text"  name="last_name" value="{{old('last_name')}}" class="form-control" />
                                </div>
                                <div class="clear"></div>
                                <div class="col_full">
                                    <label for="register-form-email">@lang('register.email')</label>
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control" />
                                </div>

                                <div class="clear"></div>

                                <div class="col_half">
                                    <label for="register-form-password">@lang('register.password')</label>
                                    <input type="password"  name="password" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="register-form-repassword">@lang('register.reenter_password')</label>
                                    <input type="password" name="password_confirmation"  class="form-control" />
                                </div>
                                <div class="clear"></div>
                                <div class="col_half">
                                    <label for="register-form-location">Location</label>
                                    <input type="text" name="location" value="Riyadh" disabled  class="form-control" style="background-color: #ffffff" />
                                </div>

                                <div class="clear"></div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" type="submit">@lang('register.register')</button>
                                </div>
                            {{ Form::close() }}
                            {{--</form>--}}

                            <div class="line line-sm"></div>
                            <div>
                                <h4 style="margin-bottom: 15px;">@lang('register.alternative_register')</h4>
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
                                <a href="{{ route('login') }}">@lang('register.you_have_account')</a>
                            </div>
                        </div>
                    </div>

                    <div class="center dark"><small>Copyrights &copy; All Rights Reserved by Canvas Inc.</small></div>

                </div>
            </div>

        </div>

    </section>
@endsection
