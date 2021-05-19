@component('mail::message')
# Hi, I am {{ $data['name'] }}

<p>{{ $data['contents'] }}</p>

<p>You can reach me via {{ $data['email'] }} OR <br> {{ $data['phone'] }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

