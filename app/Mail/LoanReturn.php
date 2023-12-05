<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LoanReturn extends Mailable
{
    use Queueable, SerializesModels;

    public $loan;
    /**
     * Create a new message instance.
     */
    public function __construct($loan)
    {
        $this->loan = $loan;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Loan',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('emails.loan')
        ->with([
            'loanDate' => $this->loan->loan_date,
            'returnDate' => $this->loan->return_date,
            'equipmentName' => $this->loan->equipment->name,
        ]);
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
