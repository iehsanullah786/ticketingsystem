<?php

namespace App\Http\Controllers;
use App\Models\SalarySlip;
use App\Models\Employee;
use App\Models\PayrollPeriod;
use App\Models\AdjustmentType;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatePdf(string $salary_slip_id)
    {
        $salarySlip = SalarySlip::findOrFail($salary_slip_id); // Use findOrFail for better error handling
        $data = [
            'salaryslip' => $salarySlip
        ];

        $pdf = Pdf::loadView('reports.salaryinvoice', $data);
        return $pdf->download('invoice.pdf');
    }



}
