<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySlip extends Model
{
    /** @use HasFactory<\Database\Factories\SalarySlipFactory> */
    use HasFactory;
    protected $fillable = ['employee_id', 'payroll_period_id', 'adjustment_type_id', 'base_salary', 'adjustment_amount', 'net_salary'];
}



