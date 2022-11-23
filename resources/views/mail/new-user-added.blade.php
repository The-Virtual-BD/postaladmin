<x-mail::message>
Hi! {{$details['name']}},
<p>{{ $details['body'] }}</p>

<p>
    <span>Your Email:</span>
    <span>{{$details['email']}}</span>
</p>
<p>
    <span>Your Passwird:</span>
    <span>{{$details['password']}}</span>
</p>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
