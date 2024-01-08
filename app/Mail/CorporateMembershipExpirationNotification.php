<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\CorporateUser;

class CorporateMembershipExpirationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $corporateUser;

    /**
     * Create a new message instance.
     */
    public function __construct(CorporateUser $corporateUser)
    {
        $this->corporateUser = $corporateUser;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Corporate Membership Expiration Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.corporate-membership-expiration-notification', // Update this to the correct path of your Blade view
            data: ['corporateUser' => $this->corporateUser],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
