@component('mail::message')
# Hello {{ $user->name }}

<p>A customer just sent a request on ExchangeRuler site</p>

<p>Kindly login to view details </p>


@component('mail::button', ['url' => '/login'])
Login
@endcomponent

Thanks,<br>
Support Team. <br>
{{ config('app.name') }}
@endcomponent
