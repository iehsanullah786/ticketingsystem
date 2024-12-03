<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalarySlip;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'accountno','bank','salary' ,'address']; // Fillable attributes
    public function salarySlips()
{
    return $this->hasMany(SalarySlip::class,'employee_id');
}
}
