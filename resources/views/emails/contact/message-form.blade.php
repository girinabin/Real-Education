@component('mail::message')

# Thank u for your Message

<strong>Emailto:</strong> {{$data['emailto']}} <br>
<strong>Subject:</strong> {{$data['subject']}} <br>
<strong>Message:</strong>
{!!$data['message']!!}
@endcomponent
