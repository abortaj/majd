<div class="pricing-box best-price">
    <div class="pricing-price">
        {{--@if($post->user()->id=auth()->id())--}}


        {{--@endif--}}
        @if($user->avatar)
        <img src="{{asset($user->avatar)}}" class="aligncenter img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 85px;">
       @else
            <img src="{{asset('storage/users/avatar.jpg')}}" class="aligncenter img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 85px;">
        @endif
    </div>

    <div class="pricing-title">
        <h3>{{$user->first_name}} {{$user->last_name}}</h3>
        <span>{{$user->job_title}}</span>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        <i class="icon-star"></i>
        5.0 ( 23 reviews )
    </div>
    <div class="pricing-action">
        @if(Auth::user()->id == $user->id)
            {{--<a href="#" class="button button-border button-border-thin button-red" style="position: absolute; left: 20px; cursor: pointer;">Edit</a>--}}
            <a href="#" class="button button-danger  btn-block bgcolor border-color">Edit</a>
            @else
            <a href="#" class="btn btn-danger  btn-sm bgcolor border-color">Contact Me</a>
            <a href="#" class="btn btn-danger  btn-sm bgcolor border-color">Hire Me</a>
        @endif

    </div>
    <div class="container text-left">
        <p>{!! words($user->bio) !!} <a href="">more</a></p>
        <div class="pricing-features">
            <ul>
                <li><i class="icon-location"></i><strong> Saudi Arabia 3:00pm</strong></li>
                <li><i class="icon-"></i><strong>Partner Since </strong>[ {{$user->created_at->format('d-M-Y')}} ]</li>
                <li><i class="icon-money"></i>$ (<strong> {{$user->hourly_rate}} </strong>)</li>
            </ul>
        </div>
    </div>
    <div class="fancy-title title-center" style="padding-top: 10px; margin-bottom: 15px">
        <h4>Skills</h4>
    </div>
    <div class="tagcloud bottommargin container clearfix">
        @foreach($user->skills() as $skill )
            <a href="">{{$skill->name}}</a>
        @endforeach
    </div>




</div>