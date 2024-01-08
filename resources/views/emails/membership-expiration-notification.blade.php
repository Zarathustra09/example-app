@component('mail::message')
# Corporate Membership Expiration Notification

Dear {{ $corporateUser->company_name }},

We wanted to remind you that your corporate membership with us is set to expire soon. Please take a moment to review the details below:

- **Company Name:** {{ $corporateUser->company_name }}
- **Membership Expiration Date:** {{ $corporateUser->membership_expiration_date->toFormattedDateString() }}

Thank you for being a valued member of our community.

Best regards,

Your Company Name
@endcomponent
