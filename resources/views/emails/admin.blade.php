@component('mail::message')
# Profile Update

The body of your message.

Email: {{$user->email}} <br>
Password: {{$user->user_password}} <br>
Username: {{$user->matric_no}}<br>


@component('mail::button', ['url' => route('login')])
 Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
