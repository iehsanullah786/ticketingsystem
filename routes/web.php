<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SalarySlipController;
use App\Http\Controllers\AdjustmentTypesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayrollPeriodController;
use Illuminate\Support\Facades\Route;
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {

    Route::resource('employees' , EmployeeController::class);
    Route::resource('adjustment-types' , AdjustmentTypesController::class);
    Route::resource('payroll-periods' , PayrollPeriodController::class);
    Route::resource('salary-slips' , SalarySlipController::class);
    Route::resource('admins' , UserController::class);


    Route::get('admin/profile', action: [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/users/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');


});

require __DIR__.'/auth.php';
