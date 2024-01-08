@component('mail::message')
# Membership Expiration Notification

Dear {{ $user->name }},

We hope this message finds you well. We would like to inform you that your membership with us is expiring soon. Please review the details below:

- **Name:** {{ $user->name }}
- **Membership Expiration Date:** {{ $user->membership_expiration_date->toFormattedDateString() }}

Renew your membership to continue enjoying our services.

Best regards,

Your Company Name
@endcomponent
