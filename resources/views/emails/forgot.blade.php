@component('mail::message')
hello {{ $user->name}},
<p>we understand it happens.</p>
@component('mail::button' ,['url' => url('reset/'.$user->remember_token)])
Reset your password
@endcomponent
<p>if you did not request a password reset, no further action is required.</p>

thanks,<br>
{{ config('app.name') }}
@endcomponent
