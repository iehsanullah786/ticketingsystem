<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('salary_slips', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->unsignedBigInteger('payroll_period_id')->nullable();
            $table->foreign('payroll_period_id')->references('id')->on('payroll_periods')->onDelete('cascade');

            $table->decimal('base_salary', 10, 2)->nullable(); // Base salary
            $table->decimal('adjustment_amount', 10, 2)->nullable(); // Total adjustments
            $table->decimal('net_salary', 10, 2)->nullable(); // Net salary (calculated)
            $table->timestamps(); // Created at, Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_slips');
    }
};
