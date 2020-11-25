@component('mail::message')
# Welcome to ACOED ID Card Portal

Login details<br>
Staff ID: {{$user->matric_no}}<br>
Password: {{$user->user_password}}<br>
Designation: {{$user->designation}}
@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
