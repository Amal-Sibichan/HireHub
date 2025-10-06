<x-mail::message>
# Reset Password

Your otp for reseting password {{$otp}}
<x-mail::button :url="''">
Reset Password
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
