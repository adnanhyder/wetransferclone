@component('mail::message')


{{ $message }}

Thanks for using our service!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
