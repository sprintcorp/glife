@component('mail::message')
# Profile update by ACOED Admin

The body of your message.

Email: {{$user->email}} <br>
Password: {{$user->user_password}} <br>
Staff ID: {{$user->matric_no}}<br>
Designation: {{$user->designation}}

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
