
@component('mail::message')
# {{$subject}}

## {{__('Email Address') . ' : ['. $email . '][1]' }}

## Mensagem :

<p  align="center">
    {{$contactMessageText}}
</p>

[1]: mailto:{{$email}}
<center>
{{__('Thanks,')}} <br>
{{ config('app.name') }} - {{now()->year}}
</center>
@endcomponent
