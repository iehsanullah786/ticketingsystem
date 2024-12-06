<?php
namespace App\Http\Controllers;

use App\Policies\SalarySlipPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SalarySlipMail;
use App\Models\SalarySlip;

class MailController extends Controller
{
    public function sendSalarySlip($salaryslip_id)
    {
        //access receiver employee
        $salary_slip=SalarySlip::find($salaryslip_id);
        $receiveremail=$salary_slip->employee->email;

        // Send email using Mailable class
        Mail::to($receiveremail)->send(new SalarySlipMail($salary_slip));


//we can passmore variables like var1, var. these are access directkly. but req access by $req->name in blade email file


        // Return a response (optional)
        return back()->with('success', 'Invoice Sent Successfully!');
    }
}


