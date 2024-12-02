<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\StorePayrollPeriodRequest;
use App\Http\Requests\UpdatePayrollPeriodRequest;
use App\Models\PayrollPeriod;
class PayrollPeriodController extends Controller
{

    public function index()
    {
        $payrollperiods=PayrollPeriod::all();
        return view('payrollperiods.index', compact( 'payrollperiods'));
    }


    public function create()
    {
        return view('payrollperiods.create');
    }

    public function store(StorePayrollPeriodRequest $request)
    {
        PayrollPeriod::create($request->validated());
        return redirect()->route('payroll-periods.index')->with('success', value: 'Adjustment Type created successfully.');
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $payrollperiod=PayrollPeriod::find($id);
        return view('payrollperiods.edit', compact('payrollperiod'));
    }


    public function update(UpdatePayrollPeriodRequest $request, string $id)
    {
      $payrollperiod=PayrollPeriod::find($id);
      $payrollperiod->update($request->validated());

      return redirect()->route('payroll-periods.index')->with('success', 'Employee Updated successfully!');
    }


    public function destroy(string $id)
    {
        PayrollPeriod::destroy($id);
        return redirect()->route('payroll-periods.index');
    }
}
