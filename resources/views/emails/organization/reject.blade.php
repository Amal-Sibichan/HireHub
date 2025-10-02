<x-mail::message>
# Hello {{$organization->name}}

we regret to inform You that your organization approvel request has been **rejected**
**Because:**
{{$reason}}
You may update the details and reapply.

<x-mail::button :url="route('master')">
Go to 
</x-mail::button>

Thanks,<br>
HireHub Team
</x-mail::message>
