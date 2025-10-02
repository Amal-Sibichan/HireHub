<x-mail::message>
# Hello {{$organization->name}}

Your request for Approvel is **accepted** 
You can now login to your account and start adding jobs and services.

<x-mail::button :url="route('master')">
Start now
</x-mail::button>

Thanks,<br>
HireHub Team
</x-mail::message>
