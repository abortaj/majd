@component('mail::message')
# Welcom To Test App

Tanks For Sing Up, **We Really appreciate ** it. Let _Know if we can_ do more to please you!,
@component('mail::button', ['url' => 'http://localhost/majd_1/public'])
View My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
