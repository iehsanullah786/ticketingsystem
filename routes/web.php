<?php
use App\Http\Controllers\ProfileController;
use App\Events\Chat;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CannedReplyController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AgentTicketController;
use App\Http\Controllers\CustomerTicketController;

use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('auth.login');
    });
        //Admin login
        Route::prefix('admin')->middleware(['auth', 'useractive','admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('statuses', StatusController::class);
        Route::get('tickets/edit-details/{id}', action: [TicketController::class, 'editDetails'])->name('admin.ticket.edit-details');
        Route::POST('tickets/update-details/{id}', action: [TicketController::class, 'updateDetails'])->name('admin.ticket.update-details');
        Route::resource('priorities', PriorityController::class);
        Route::resource('canned-replies', CannedReplyController::class);
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('tickets', TicketController::class);

    });

        //Customer login
        Route::prefix('customer')->middleware(['auth', 'useractive','customer'])->group(function () {
        Route::get('tickets', action: [CustomerTicketController::class, 'index'])->name('customer.ticket.index');
        Route::get('tickets/create', [CustomerTicketController::class, 'create'])->name('customer.ticket.create');
        Route::post('tickets/store', [CustomerTicketController::class, 'store'])->name('customer.ticket.store');
        Route::get('tickets/{id}', [CustomerTicketController::class, 'show'])->name('customer.ticket.show');
        Route::get('tickets/destroy/{id}', [CustomerTicketController::class, 'destroy'])->name('customer.ticket.destroy');

    });

        //Agent login
        Route::prefix('agent')->middleware(['auth', 'useractive','agent'])->group(function () {
        Route::get('tickets/edit-details/{id}', action: [AgentTicketController::class, 'editDetails'])->name('agent.ticket.edit-details');
        Route::POST('tickets/update-details/{id}', action: [AgentTicketController::class, 'updateDetails'])->name('agent.ticket.update-details');
        Route::POST('tickets/update-details/{id}', action: [AgentTicketController::class, 'updateDetails'])->name('agent.ticket.update-details');
        Route::get('tickets', action: [AgentTicketController::class, 'index'])->name('agent.ticket.index');
        Route::get('tickets/{id}', [AgentTicketController::class, 'show'])->name('agent.ticket.show');

        });

        Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('users/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
    require __DIR__.'/auth.php';
