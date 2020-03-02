@component('mail::message')
# Welcome to ACOED ID Card Portal

Login details
Email: {{$user->email}}
Password: {{$user->user_password}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
