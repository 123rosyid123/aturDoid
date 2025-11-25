<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReferralInvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invitationUrl;
    public $inviterName;
    public $referralCode;

    /**
     * Create a new message instance.
     */
    public function __construct($recipientEmail, $referralCode, $inviterName)
    {
        $this->referralCode = $referralCode;
        $this->inviterName = $inviterName;
        
        // Build invitation URL with ref (referral code) and email parameters
        // Email will be auto-filled and verified, user goes directly to step 2
        $this->invitationUrl = route('register', [
            'ref' => $referralCode,
            'email' => $recipientEmail
        ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Undangan Bergabung dengan AturDOit',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.referral-invitation',
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
