@component('mail::message')
# {{ __('mail_new_user.greeting') }} <i>{{ $userName }}</i>,

{{ __('mail_new_user.message_body') }}

<ul>
    <li><strong>{{ __('mail_new_user.login_name') }}: </strong>{{ $mailData->user_email }}</li>
    <li><strong>{{ __('mail_new_user.password') }}: </strong>{{ $userPassword }}</li>
</ul>

@component('mail::button', ['url' => route('login')])
{{ __('mail_new_user.login_button') }}
@endcomponent

{{ __('mail_new_user.reset_button_description') }}

@component('mail::button', ['url' => route('password.request')])
{{ __('mail_new_user.reset_button') }}
@endcomponent

{{ __('mail_new_user.thanks') }}<br>
{{ config('app.name') }}
@endcomponent
