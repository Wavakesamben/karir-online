<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Swift_Attachment;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $detail;
    public $subject;
    public $attach;

    /**
     * Create a new message instance.
     */
    public function __construct($detail, $subject, $attach)
    {
        $this->detail = $detail;
        $this->subject = $subject;
        $this->attach = $attach;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: $this->subject,
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'template.mail',
    //         with: ['detail' => $this->details]
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [
    //         Attachment::fromStorage('app/public/document/', $this->attach),
    //     ];
    // }

    public function build()
    {
        $this->subject($this->subject)
            ->view('template.mail');

        for ($i = 0; $i < count($this->attach); $i++) {
            $attachment = Attachment::fromStorage('public/' . $this->attach[$i]);
            $this->attach($attachment)
                ->withMime('application/pdf');
        }

        return $this;
    }
}
