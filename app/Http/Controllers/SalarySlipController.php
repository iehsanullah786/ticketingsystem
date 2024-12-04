<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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



































    public function store(Request $request)
    {
        $salary_slip = new SalarySlip;

        // Fetch the employee and assign to the salary slip
        $employee = Employee::find($request->employee_id);
        $salary_slip->employee_id = $employee->id; // Set the employee's foreign key in the salary slip

        // Fetch the payroll period and assign to the salary slip
        $payroll_period = PayrollPeriod::find($request->payroll_period_id);
        $salary_slip->payroll_period_id = $payroll_period->id; // Set the payroll period's foreign key in the salary slip

        // Fetch the adjustment type and assign to the salary slip
        $adjustment_type = AdjustmentType::find($request->adjustment_type_id);
        $salary_slip->adjustment_type_id = $adjustment_type->id; // Set the adjustment type's foreign key in the salary slip

        //save the adjustment amount
        $salary_slip->base_salary=$employee->salary;
        $salary_slip->adjustment_amount	=$request->adjustment_amount;

        // Calculate the net salary

        if ($adjustment_type->mode == '+') {
        $calcnetsal = $salary_slip->base_salary + $request->adjustment_amount;
        }

        elseif ($adjustment_type->mode == '-') {
        $calcnetsal = $salary_slip->base_salary - $request->adjustment_amount;
        }

        else {
        // If mode is not defined or recognized, default to base salary (or add handling for errors)
        $calcnetsal = $salary_slip->base_salary;
        }
        $salary_slip->net_salary = $calcnetsal;




        // Save the salary slip with all the relations
        $salary_slip->save();


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

    public function update(Request $request, string $id)
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
