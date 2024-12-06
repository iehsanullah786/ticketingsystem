<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class SalarySlipMail extends Mailable
{
    use Queueable, SerializesModels;

    public $req;


    public function __construct($salary_slip)
    {
        $this->salary_slip = $salary_slip;
    }

    public function build()
    {
        return $this->view('reports.salaryinvoice')
                    ->with('salary_slip', $this->salary_slip);
    }
}















