<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalarySlip;

class PayrollPeriod extends Model
{
    /** @use HasFactory<\Database\Factories\PayrollPeriodFactory> */
    use HasFactory;
    protected $fillable = ['month', 'year']; // Fillable attributes

    public function salarySlips()
    {
        return $this->hasMany(SalarySlip::class,'payroll_period_id');
    }
}
