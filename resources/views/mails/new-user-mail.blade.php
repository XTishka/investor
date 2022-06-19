Hello <i>{{ $userName }}</i>,
<p>Your email was registered in our system.</p>
 
<ul>
    <li><strong>Login: </strong>{{ $mailData->user_email }}</li>
    <li><strong>Password: </strong>{{ $userPassword }}</li>
    <li><strong>Link: </strong><a href="{{ route('login') }}">Login</a></li>
</ul>

<p>Or you can setup your password here: <a href="{{ route('password.request') }}">Reset password</a> </p>
 
 
Thank You,
<br/>
<i>{{ $sender }}</i>