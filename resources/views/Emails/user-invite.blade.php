@component('mail::message')
Registration Invite.
{{--{{$role}}--}}
Follow the Link below to register and log-in to our website.
@component('mail::button', ['url' => 'http://139.162.161.150/nigeria/register', 'color' => 'blue'])
Register Here.

@endcomponent
Thank You.<br>
Regards,<br>
{{config('app.name')}}
@endcomponent