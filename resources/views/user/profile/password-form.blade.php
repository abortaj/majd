<div class="heading-block noborder">
    <span>@lang('profile.password_hint')</span>
</div>
{{ Form::open(['route'=>'password.update', 'class'=>'auto-form']) }}

    <div class="col_full">
        <label>@lang('profile.old_password')</label>
        {{ Form::password('old_password',['class'=>'sm-form-control']) }}
    </div>
    <div class="col_full">
        <label>@lang('profile.new_password')</label>
        {{ Form::password('password',['class'=>'sm-form-control']) }}
    </div>
    <div class="col_full">
        <label>@lang('profile.new_password_confirmation')</label>
        {{ Form::password('password_confirmation',['class'=>'sm-form-control']) }}
    </div>
    <div class="col_full">
        <button class="button" type="submit">@lang('profile.change_password_btn')</button>
    </div>
{{ Form::close() }}