<!-- Top Bar
		============================================= -->
<div id="top-bar">

    <div class="container clearfix">

        <div class="col_full  nobottommargin" style="margin-bottom:0px !important">

            <!-- Top Links
            ============================================= -->
            <div class="top-links">
                <ul>
                    @auth
                        <li>
                            <a href="#" style="color:black">
                                <img src="{{ auth()->user()->image }}" class="user-image img-circle img-thumbnail nomargin" alt="Avatar" style="max-width: 35px;">
                            </a>
                            <ul style="display: none;">
                                <li>
                                    <a href="{{ route('profile') }}">@lang('header.profile')</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}">@lang('header.logout')</a>
                                </li>
                            </ul>
                        </li>
                    @endauth
                    @can('admin-panel')
                        <li>
                            <a href="{{ route('admin').'#/home' }}">
                                @lang('header.admin')
                            </a>
                        </li>
                    @endcan
                    @author
                        <li>
                            <a href="{{ route('author') }}">
                                @lang('header.author')
                            </a>
                        </li>
                        <li><a href="{{ route('post.create') }}">@lang('header.new_post')</a></li>
                    @endauthor
                    @guest
                        <li><a href="{{ route('login') }}">@lang('header.login')</a></li>
                        <li><a href="{{ route('register') }}">@lang('header.register')</a></li>
                    @endguest
                </ul>

            </div>
        </div>

    </div>

</div><!-- #top-bar end -->

<!-- Header
============================================= -->
<header id="header">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{ route('home') }}" class="standard-logo">
                    <img src="{{ asset('site/images/logo.png') }}">
                </a>
                <a href="{{ route('home') }}" class="retina-logo">
                    <img src="{{ asset('site/images/logo@2x.png') }}">
                </a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            {{--@include("components.primary_menu",['menu'=>isset($menus['RIGHT_HEADER'])?$menus['RIGHT_HEADER']:[]])--}}

        </div>

    </div>

</header><!-- #header end -->