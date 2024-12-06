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
            'salary_slip' => $salarySlip
        ];

        $pdf = Pdf::loadView('reports.salaryinvoice', $data);
        return $pdf->download('invoice.pdf');

        try {
            $salarySlip = SalarySlip::findOrFail($salary_slip_id); // Use findOrFail for better error handling
        $data = [
            'salary_slip' => $salarySlip
        ];

        $pdf = Pdf::loadView('reports.salaryinvoice', $data);
        return $pdf->download('invoice.pdf');

            // Add success message to session
            return back()->with('success', 'Salary slip sent successfully to ' . $receiveremail);
        }

        catch (\Exception $e) {
            // Add error message to session
            return back()->with('error', 'Failed to send salary slip. ' . $e->getMessage());
        }
    }



}
