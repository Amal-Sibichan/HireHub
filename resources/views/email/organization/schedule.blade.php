<x-mail::message>
# Interview Invitation

Dear {{$row->users->name}},

Thank you again for your  interest in the {{ $row->jobs->name }} position at {{ $row->organizations->name }} and for taking the time to submit your application.

We are pleased to inform you that your application has been selected for the next stage of our hiring process! We would like to invite you for an interview to discuss your background and the role in more detail.

## Interview Details

**Position:** {{ $row->jobs->name }}
**Type:** {{ $record['category'] }}

| Detail | Value |
| :--- | :--- |
| **Date** | **{{ $record['date'] }}** |
| **Time** | **{{ $record['time'] }}** |

@if ($record['category'] === 'Offline')
| **Venue** | {{ $row->organizations->city }} |
@elseif ($record['category'] === 'Virtual')
| **Platform/Link** | [Click here to join the interview]({{ $record['link'] }}) |
@else
| **Call Details** | We will call you on the number provided in your application. |
@endif

@if ($record['description'] !== 'No special instructions.')
## Special Instructions
{{ $record['description'] }}
@endif

---

**Please reply to this email to confirm your availability for the scheduled time.**

We look forward to speaking with you.

Thanks,<br>
{{ $row->organizations->name }} Hiring Team
</x-mail::message>