<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSalarySlipRequest;
use App\Http\Requests\UpdateSalarySlipRequest;
use App\Models\SalarySlip;
use App\Models\Employee;
use App\Models\PayrollPeriod;
use App\Models\AdjustmentType;

class SalarySlipController extends Controller
{
    public function index()
    {
        $salaryslips = SalarySlip::all();
        return view('salaryslips.index', compact('salaryslips'));
    }

    public function create()
    {
        $adjustmenttypes = AdjustmentType::all();
        $payrollperiods = PayrollPeriod::all();
        $employees = Employee::all();
        return view('salaryslips.create', compact('employees', 'payrollperiods','adjustmenttypes'));
    }

    public function store(StoreSalarySlipRequest $request)
    {
        SalarySlip::create($request->validated());
        return redirect()->route('salary-slips.index')->with('success', 'Salary Slip created successfully.');
    }

    public function show(string $id)
    {
        $salaryslips = SalarySlip::find($id);
        return view('salaryslips.show', compact('salaryslips'));
    }

    public function edit(string $id)
    {
        $salaryslips = SalarySlip::find($id);
        return view('salaryslips.edit', compact('salaryslips'));
    }

    public function update(UpdateSalarySlipRequest $request, string $id)
    {
        $salaryslips = SalarySlip::find($id);
        $salaryslips->update($request->validated());

        return redirect()->route('salary-slips.index')->with('success', 'Salary Slip updated successfully!');
    }

    public function destroy(string $id)
    {
        SalarySlip::destroy($id);
        return redirect()->route('salary-slips.index')->with('success', 'Salary Slip deleted successfully.');
    }
}
