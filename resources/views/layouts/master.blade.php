<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}

    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/et-line.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('site/css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/slider.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/components/bs-switches.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/components/bs-rating.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('site/css/components/pricing-table.css')}}" type="text/css" />

    {{--<link rel="stylesheet" href="{{asset('site/css/components/dark-components.css')}}" type="text/css" />--}}
    {{--<link rel="stylesheet" href="{{asset('site/css/components/radio-checkbox.css')}}" type="text/css" />--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .checked {
            color: orange;
        }
    </style>
    <style>

        .pricing-tenure-switcher { position: relative; }

        .pricing-tenure-switcher .pts-left,
        .pricing-tenure-switcher .pts-right,
        .pricing-tenure-switcher .pts-switcher {
            display: inline-block;
            margin: 0 10px;
            height: 30px;
            overflow: hidden;
        }

        .pricing-tenure-switcher .pts-left,
        .pricing-tenure-switcher .pts-right {
            font-size: 16px;
            font-weight: 600;
            color: #AAA;
            line-height: 30px;
        }

        .pricing-tenure-switcher .pts-switch-active { color: #333; }

        .pricing-tenure-switcher .pts-switcher label { margin-bottom: 0; }

    </style>

    <link rel="stylesheet" href="{{asset('site/css/responsive.css')}}" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>

    <![endif]-->

    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('site/include/rs-plugin/css/settings.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{asset('site/include/rs-plugin/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site/include/rs-plugin/css/navigation.css')}}">
{{--<link rel="stylesheet" type="text/css" href="{{asset('site/cat-main.css')}}">--}}
{{--<link rel="stylesheet" type="text/css" href="{{asset('site/cat-style.css')}}">--}}

<!-- Document Title
    ============================================= -->
    <title>Home - Shop | Canvas</title>


</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Top Bar
    ============================================= -->
    <div id="top-bar" class="hidden-xs">

        <div class="container clearfix">



            <div class="col_half col_last fright nobottommargin">

                <!-- Top Links
                ============================================= -->
                <div class="top-links">
                    <ul>

                        {{--@can('admin-panel')--}}
                            {{--<li>--}}
                                {{--<a href="{{ route('admin').'#/home' }}">--}}
                                    {{--@lang('header.admin')--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--@endcan--}}
                        {{--@author--}}
                        {{--<li>--}}
                            {{--<a href="{{ route('author') }}">--}}
                                {{--@lang('header.author')--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--<li><a href="{{ route('post.create') }}">@lang('header.new_post')</a></li>--}}
                        {{--@endauthor--}}

                        @guest
                        <li style="border-right:1px solid #eee"><a href="{{ route('login') }}">@lang('header.login')</a></li>
                        <li><a href="{{ route('register') }}">@lang('header.register')</a></li>
                        @endguest

                        @auth

                        <li>
                            <a href="#">about1</a>
                        </li>
                        <li>
                            <a href="#">about1</a>
                        </li>
                        <li><a href="#"><div>about1 <i class="icon-angle-down"></i> </div></a>
                            
                        </li>
                        <li style="border-left:1px solid #eee">
                            <a href="#">
                                <i class="icon-bell icon-2x"></i>
                                <span class="top-notification">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class=" icon-mail icon-2x"></i>
                                <span class="top-notification">4</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" style="border-left:1px solid #eee ; color:black">
                                <img src="{{asset('storage/users/avatar.jpg')}}" class="user-image img-circle img-thumbnail nomargin" alt="Avatar" style="max-width: 35px;">
                            </a>
                            <ul style="display: none;">
                                @include('user.components.top-menu')

                            </ul>
                        </li>

                        @endauth


                    </ul>

                </div>
            </div>

        </div>

    </div><!-- #top-bar end -->

    <!-- Header
    ============================================= -->
    <header id="header">

        <div id="header-wrap_1">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="index.html" class="standard-logo" data-dark-logo="{{asset('site/images/logo-dark.png')}}"><img src="{{asset('site/images/logo.png')}}" alt="Canvas Logo"></a>
                    <a href="index.html" class="retina-logo" data-dark-logo="{{asset('site/images/logo-dark@2x.png')}}"><img src="{{asset('site/images/logo@2x.png')}}" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul>

                        <li><a href="#"><div>Company1</div></a>
                            <ul>
                                <li><a href="index-portfolio.html"><div>about1</div></a>

                                </li>

                                <li><a href="index-corporate.html"><div>about2</div></a>

                                </li>

                            </ul>
                        </li>
                        <li><a href="#"><div>Company1</div></a>
                            <ul>
                                <li><a href="index-corporate.html"><div>1</div></a>

                                </li>
                                <li><a href="{{route('sendEmail')}}"><div>2</div></a>

                                </li>
                            </ul>
                        </li>

                        <li><a href="" style="padding-bottom:0;"><div  class="button button-mini" style="margin: -2px;">about1</div></a></li>
                        {{--<li><a href=""><div style="color: #EB9C4D; border: solid 1px #e0a800; margin-top: -2px; padding-right: 3px; padding-left: 3px; text-align: center">Post Job</div></a></li>--}}

                    </ul>

                    <!-- Top Cart
                    ============================================= -->


                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        <form action="search.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                        </form>
                    </div><!-- #top-search end -->

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->



    <!-- Content
    ============================================= -->
  @yield('content')

   <!-- #content end -->

    <!-- Footer
    ============================================= -->
    <footer id="footer" class="dark">

        <div class="container">

            <!-- Footer Widgets
            ============================================= -->
            <div class="footer-widgets-wrap clearfix">

                <div class="col_two_third">

                    <div class="col_one_third">

                        <div class="widget clearfix">

                            <img src="{{asset('site/images/footer-widget-logo.png')}}" alt="" class="footer-logo">

                            <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>

                            <div style="background: url('/public/site/images/world-map.png') no-repeat center center; background-size: 100%;">
                                <address>
                                    <strong>Headquarters:</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                </address>
                                <abbr title="Phone Number"><strong>Phone:</strong></abbr> (91) 8547 632521<br>
                                <abbr title="Fax"><strong>Fax:</strong></abbr> (91) 11 4752 1433<br>
                                <abbr title="Email Address"><strong>Email:</strong></abbr> info@canvas.com
                            </div>

                        </div>

                    </div>

                    <div class="col_one_third">

                        <div class="widget widget_links clearfix">

                            <h4>Blogroll</h4>

                            <ul>
                                <li><a href="http://codex.wordpress.org/">Documentation</a></li>
                                <li><a href="http://wordpress.org/support/forum/requests-and-feedback">Feedback</a></li>
                                <li><a href="http://wordpress.org/extend/plugins/">Plugins</a></li>
                                <li><a href="http://wordpress.org/support/">Support Forums</a></li>
                                <li><a href="http://wordpress.org/extend/themes/">Themes</a></li>
                                <li><a href="http://wordpress.org/news/">WordPress Blog</a></li>
                                <li><a href="http://planet.wordpress.org/">WordPress Planet</a></li>
                            </ul>

                        </div>

                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget clearfix">
                            <h4>Recent Posts</h4>

                            <div id="post-list-footer">
                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Lorem ipsum dolor sit amet, consectetur</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Elit Assumenda vel amet dolorum quasi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Debitis nihil placeat, illum est nisi</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li>10th July 2014</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col_one_third col_last">

                    <div class="widget clearfix" style="margin-bottom: -20px;">

                        <div class="row">

                            <div class="col-md-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Total Downloads</h5>
                            </div>

                            <div class="col-md-6 bottommargin-sm">
                                <div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
                                <h5 class="nobottommargin">Clients</h5>
                            </div>

                        </div>

                    </div>

                    <div class="widget subscribe-widget clearfix">
                        <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                        <div class="widget-subscribe-form-result"></div>
                        <form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
                            <div class="input-group divcenter">
                                <span class="input-group-addon"><i class="icon-email2"></i></span>
                                <input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                                <span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</span>
                            </div>
                        </form>
                    </div>

                    <div class="widget clearfix" style="margin-bottom: -20px;">

                        <div class="row">

                            <div class="col-md-6 clearfix bottommargin-sm">
                                <a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                            </div>
                            <div class="col-md-6 clearfix">
                                <a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-rss"></i>
                                    <i class="icon-rss"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
                            </div>

                        </div>

                    </div>

                </div>

            </div><!-- .footer-widgets-wrap end -->

        </div>

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-gplus">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-pinterest">
                            <i class="icon-pinterest"></i>
                            <i class="icon-pinterest"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-vimeo">
                            <i class="icon-vimeo"></i>
                            <i class="icon-vimeo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-github">
                            <i class="icon-github"></i>
                            <i class="icon-github"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-yahoo">
                            <i class="icon-yahoo"></i>
                            <i class="icon-yahoo"></i>
                        </a>

                        <a href="#" class="social-icon si-small si-borderless si-linkedin">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>
                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +91-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="{{asset('site/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('site/js/plugins.js')}}"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="{{asset('site/js/functions.js')}}"></script>

<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
<script type="text/javascript" src="{{asset('site/include/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site/include/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>



<script type="text/javascript" src="{{asset('site/include/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site/include/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site/include/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('site/js/components/bs-switches.js')}}"></script>
<script type="text/javascript" src="{{asset('site/js/components/star-rating.js')}}"></script>
<script>

    jQuery(".bt-switch").bootstrapSwitch();

</script>

@stack('scripts')
<script type="text/javascript">

    var tpj=jQuery;
    tpj.noConflict();

    tpj(document).ready(function() {

        var apiRevoSlider = tpj('#rev_slider_ishop').show().revolution(
            {
                sliderType:"standard",
                jsFileLocation:"include/rs-plugin/js/",
                sliderLayout:"fullwidth",
                dottedOverlay:"none",
                delay:9000,
                navigation: {},
                responsiveLevels:[1200,992,768,480,320],
                gridwidth:1140,
                gridheight:500,
                lazyType:"none",
                shadow:0,
                spinner:"off",
                autoHeight:"off",
                disableProgressBar:"on",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    disableFocusListener:false,
                },
                navigation: {
                    keyboardNavigation:"off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation:"off",
                    onHoverStop:"off",
                    touch:{
                        touchenabled:"on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "ares",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: false,
                        tmp: '<div class="tp-title-wrap">	<span class="tp-arr-titleholder">Mowafaq</span> </div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 10,
                            v_offset: 0
                        }
                    }
                }
            });

        apiRevoSlider.bind("revolution.slide.onloaded",function (e) {
            SEMICOLON.slider.sliderParallaxDimensions();
        });

    }); //ready

</script>
<script type="text/javascript">

    $("#input-11").rating({
        starCaptions: {0: "Not Rated",1: "Very Poor", 2: "Poor", 3: "Ok", 4: "Good", 5: "Very Good"},
        starCaptionClasses: {0: "text-danger", 1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success"},
    });

    $("#input-13").on("rating.clear", function(event) {
        $('#rating-notification-message').attr('data-notify-type','error').attr('data-notify-msg', 'Your rating is reset');
        SEMICOLON.widget.notifications( jQuery('#rating-notification-message') );
    });
    $("#input-13").on("rating.change", function(event, value, caption) {
        $('#rating-notification-message').attr('data-notify-msg', 'You rated: ' + value + ' Stars');
        SEMICOLON.widget.notifications( jQuery('#rating-notification-message') );
    });

    $("#input-14").on("rating.change", function(event, value, caption) {
        $("#input-14").rating("refresh", {disabled: true, showClear: false});
    });

</script>
<script>
    jQuery(document).ready( function($){
        function pricingSwitcher( elementCheck, elementParent, elementPricing ) {
            elementParent.find('.pts-left,.pts-right').removeClass('pts-switch-active');
            elementPricing.find('.pts-switch-content-left,.pts-switch-content-right').addClass('hidden');

            if( elementCheck.filter(':checked').length > 0 ) {
                elementParent.find('.pts-right').addClass('pts-switch-active');
                elementPricing.find('.pts-switch-content-right').removeClass('hidden');
            } else {
                elementParent.find('.pts-left').addClass('pts-switch-active');
                elementPricing.find('.pts-switch-content-left').removeClass('hidden');
            }
        }

        $('.pts-switcher').each( function(){
            var element = $(this),
                elementCheck = element.find(':checkbox'),
                elementParent = $(this).parents('.pricing-tenure-switcher'),
                elementPricing = $( elementParent.attr('data-container') );

            pricingSwitcher( elementCheck, elementParent, elementPricing );

            elementCheck.on( 'change', function(){
                pricingSwitcher( elementCheck, elementParent, elementPricing );
            });
        });
    });
</script>
</body>
</html>