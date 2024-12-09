<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SalarySlip;

class AdjustmentType extends Model
{
    /** @use HasFactory<\Database\Factories\AdjustmentTypeFactory> */
    use HasFactory;
    protected $fillable = ['id','name', 'mode']; // Fillable attributes

    public function salarySlip()
    {
        return $this->belongsTo(SalarySlip::class,foreignKey: 'employee_id');
    }
}
