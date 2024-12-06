<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SalarySlipMail extends Mailable
{
    use Queueable, SerializesModels;

    public $salary_slip;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @param mixed $salary_slip
     * @param string $pdf
     * @return void
     */
    public function __construct($salary_slip, $pdf)
    {
        $this->salary_slip = $salary_slip;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.salary_slip') // Use a dedicated email view
                    ->with(['salary_slip' => $this->salary_slip])
                    ->attachData($this->pdf, 'SalarySlip.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
