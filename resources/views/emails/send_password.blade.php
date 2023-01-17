<x-mail::message>
# {{ __('Dear stockholder, ') }} <i>{{ $name }}</i>

<p>{{ __('Here is your login information for our prioritization system, where you can enter up to 20 wishes in the upcoming prioritization round.') }}</p>
<p>{{ __('You have received information about the homes in a separate email, and can also see our homes on the website.') }}</p>
<p>{{ __('You must use the email and password below when logging in.') }}</p>

<ul>
    <li><strong>{{ __('Login') }}: </strong>{{ $email }}</li>
    <li><strong>{{ __('Password') }}: </strong>{{ $password }}</li>
</ul>

<x-mail::button :url="route('login')">
    {{ __('Login') }}
</x-mail::button>

<p>{{ __('The code can be easily changed by pressing the "reset password" button.') }}</p>

<x-mail::button :url="route('password.request')">
    {{ __('Reset password') }}
</x-mail::button>

{{ __('We look forward to receiving your wishes') }},<br>
{{ config('app.name') }}
</x-mail::message>
