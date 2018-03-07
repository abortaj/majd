@guest
    {{--<div class="section nobottommargin">--}}
        {{--<div class="container clearfix">--}}

            {{--<div class="heading-block center">--}}
                {{--<h3><span>@lang('footer.subscribe_title')</span></h3>--}}
            {{--</div>--}}

            {{--<div class="subscribe-widget">--}}
                {{--<div class="widget-subscribe-form-result"></div>--}}
                {{--<form id="widget-subscribe-form2" action="include/subscribe.php" role="form" method="post" class="nobottommargin" novalidate="novalidate">--}}
                    {{--<div class="input-group input-group-lg divcenter" style="max-width:600px;">--}}
                        {{--<span class="input-group-addon"><i class="icon-email2"></i></span>--}}
                        {{--<input type="email" name="widget-subscribe-form-email" class="form-control required email" placeholder="@lang('footer.enter_email')" aria-required="true">--}}
                        {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-default" type="submit">@lang('footer.subscribe_now')</button>--}}
                        {{--</span>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
@endguest

<footer id="footer" class="dark">

    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">

        <div class="container clearfix">

            <div class="col_half">
                @lang('footer.copyrights')<br>
                <div class="copyright-links">
                    <a href="{{ route('terms') }}">@lang('footer.terms')</a> /
                    <a href="{{ route('privacy') }}">@lang('footer.privacy')</a> /
                    <a href="{{ route('faq') }}"> @lang('footer.faq')</a>
                </div>
            </div>

            <div class="col_half col_last fleft text-center">
                <div class="fleft clearfix">
                    <a href="{{ config('settings.facebook_account') }}" target="_blank" class="social-icon si-small si-borderless si-facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>

                    <a href="{{ config('settings.twitter_account') }}" target="_blank" class="social-icon si-small si-borderless si-twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>

                </div>

            </div>

        </div>

    </div><!-- #copyrights end -->

</footer>