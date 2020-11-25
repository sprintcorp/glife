@component('mail::message')
# Id Card Pick up information
@component('mail::panel')
Dear Sir/Ma. Your Id-card will be ready for pickup in 2 days time<br>
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
