@extends('layouts.master')

@section('content')
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="clear"></div>

                <div class="col_two_fifth">
                    @include('user.components.user-left-side-info')
                </div>

                <div class="col_three_fifth col_last">
                    @include('user.components.user-right-side-info')
                </div>

                <div class="clear"></div>

            </div>

        </div>

    </section><!-- #content end -->


    {{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
    {{--<div class="col-md-8">--}}
    {{--<div class="card card-default">--}}
    {{--<div class="card-header">Dashboard</div>--}}

    {{--<div class="card-body">--}}
    {{--@if (session('status'))--}}
    {{--<div class="alert alert-success">--}}
    {{--{{ session('status') }}--}}
    {{--</div>--}}
    {{--@endif--}}

    {{--You are logged in!--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection
