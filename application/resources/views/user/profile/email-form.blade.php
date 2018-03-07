<div class="heading-block noborder">
    <span>@lang('profile.email_hint')</span>
</div>
{{ Form::open(['route'=>'email.update', 'class'=>'auto-form']) }}
    <div class="col_full">
        <label>@lang('profile.old_email')</label>
        {{ Form::email('old_email',auth()->user()->email,['class'=>'sm-form-control']) }}
    </div>
    <div class="col_full">
        <label>@lang('profile.password')</label>
        {{ Form::password('password',['class'=>'sm-form-control']) }}
    </div>
    <div class="col_full">
        <label>@lang('profile.new_email')</label>
        {{ Form::text('email',null,['class'=>'sm-form-control']) }}
    </div>
    <div class="col_full">
        <button class="button" type="submit">@lang('profile.change_email_btn')</button>
    </div>
{{ Form::close() }}