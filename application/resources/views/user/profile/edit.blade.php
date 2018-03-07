@extends('layouts.master')

@section('content')

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="row clearfix">

                <div class="col-sm-10 col-md-offset-1">
                    <a href="javascript:void(0)" class="edit-action1 edit-profile-image">
                        {{--<img src="{{ auth()->user()->avatar }}" class="alignright user-image img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;">--}}
                        <i class="fa fa-pencil  user-image-icon" style="position: absolute;top: 10px;right: 10px;cursor: pointer;"></i>
                    </a>
                    <div class="heading-block noborder">
{{--                        <h3>{{ auth()->user()->name }}</h3>--}}
                        <span>@lang('profile.your_profile_bio')</span>
                    </div>

                    <div class="clear"></div>

                        <div class="tabs tabs-alt clearfix" id="tabs-profile">

                            <ul class="tab-nav clearfix">
                                <li><a href="#tab-info"><i class="icon-info"></i> @lang('profile.tab_info')</a></li>
                                <li><a href="#tab-email"><i class="icon-email"></i> @lang('profile.tab_email')</a></li>
                                <li><a href="#tab-password"><i class="icon-lock"></i> @lang('profile.tab_password')</a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tab-info">
                                    @include('user.profile.profile-form')
                                </div>

                                <div class="tab-content clearfix" id="tab-email">
                                    {{--@include('profile.email-form')--}}
                                </div>

                                <div class="tab-content clearfix" id="tab-password">
                                    {{--@include('profile.password-form')--}}
                                </div>

                            </div>

                        </div>

                    </div>


                <div class="line visible-xs-block"></div>

            </div>

        </div>

    </div>
{{--<div class="hide image-cropper-container clearfix">--}}
{{--@include("components.cropper",["label"=>false,--}}
                                {{--"url"=>auth()->user()->image,--}}
                                {{--"value"=>auth()->user()->getImageName(),--}}
                                {{--'options'=>[--}}
                                {{--"width"=>300,--}}
                                {{--"height"=>300,--}}
                                {{--"wrapper_class"=>""]])--}}
{{--</div>--}}
@endsection
@push('styles')
<style>
    .user-image-icon{
        visibility: hidden;
    }
    .user-image:hover + .user-image-icon,.user-image-icon:hover {
        visibility:visible !important;
    }
</style>
<script>PROFILE={
        EDIT_PROFILE_IMAGE:"@lang("profile.edit_my_image")",
        UPDATE:"{{route('profile.update.image')}}",
    }</script>
@endpush