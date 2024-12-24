<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SalarySlipController;
use App\Http\Controllers\AdjustmentTypesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PayrollPeriodController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('auth.login');
    });

    Route::middleware(['auth', 'useractive'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('employees', EmployeeController::class);
        Route::resource('admins', UserController::class);
        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('users/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
    });


require __DIR__.'/auth.php';
