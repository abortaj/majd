<div class="heading-block noborder">
    <span>@lang('profile.info_hint')</span>
</div>
{{ Form::open(['route'=>'profile.update', 'class'=>'auto-form']) }}
    <div class="col_full">
        <label>First Name:</label>
        {{ Form::text('first_name',auth()->user()->first_name,['class'=>'sm-form-control']) }}
    </div>

    <div class="col_full">
        <label>Last Name:</label>
        {{ Form::text('last_name',auth()->user()->last_name,['class'=>'sm-form-control']) }}
    </div>
    <div class="col_full">
        <label>Email:</label>
        {{ Form::text('email',auth()->user()->email,['class'=>'sm-form-control']) }}
    </div>
    <div class="col_full">
        <label>@lang('profile.bio')</label>
        {{ Form::textarea('bio',auth()->user()->bio,['class'=>'sm-form-control']) }}
    </div>
    <div class="col_full">
        <button class="button" type="submit">@lang('profile.update_profile_btn')</button>
    </div>
{{ Form::close() }}