<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ParkingSpaceController;









Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Password reset routes
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');


// Parking Spaces Management
Route::prefix('parking-spaces')->group(function () {
    Route::get('/', [ParkingSpaceController::class, 'index'])->name('parking-spaces.index');
    Route::get('/create', [ParkingSpaceController::class, 'create'])->name('parking-spaces.create');
    Route::post('/', [ParkingSpaceController::class, 'store'])->name('parking-spaces.store');
    Route::get('/{id}', [ParkingSpaceController::class, 'show'])->name('parking-spaces.show');
    Route::get('/{id}/edit', [ParkingSpaceController::class, 'edit'])->name('parking-spaces.edit');
    Route::put('/{id}', [ParkingSpaceController::class, 'update'])->name('parking-spaces.update');
    Route::delete('/{id}', [ParkingSpaceController::class, 'destroy'])->name('parking-spaces.destroy');
    Route::get('/availability', [ParkingSpaceController::class, 'availability'])->name('parking-spaces.availability');
    Route::post('/{id}/reserve', [ParkingSpaceController::class, 'reserve'])->name('parking-spaces.reserve');
    Route::post('/{id}/release', [ParkingSpaceController::class, 'release'])->name('parking-spaces.release');
});


Route::prefix('admin')->group(function () {
    Route::get('/reservations', function () {
        return view('admin.reservation-history');
    })->name('admin.reservations');
});




// For authenticated users only
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
});





