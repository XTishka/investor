Hello {{ $userName }},
Your email was registered in our system.
 
* Login: {{ $mailData->user_email }}
* Password: {{ $userPassword }}
* Link: {{ route('login') }}

Or you can setup your password here: {{ route('password.request') }}
 
 
Thank You,
{{ $sender }}