@component('mail::message')

<strong>Dear</strong> {{$data['username']}} ,<br>


# Thank u for your Registration

<strong>Email:</strong> {{$data['email']}} <br>
<strong>Registerd Event:</strong> {{$data['event']}} <br>

@endcomponent
