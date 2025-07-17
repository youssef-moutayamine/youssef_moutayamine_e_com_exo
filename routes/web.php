<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('role:admin');

Route::post('/admin/users/{user}/role', [App\Http\Controllers\AdminController::class, 'updateUserRole'])
    ->name('admin.user.role')
    ->middleware('role:admin');

Route::post('/admin/update-role', [App\Http\Controllers\AdminController::class, 'updateRole'])
    ->middleware('role:admin');

Route::get('/customer', [App\Http\Controllers\AdminController::class, 'customerDashboard'])
    ->middleware('role:customer')
    ->name('customer.dashboard');

Route::get('/seller', [SellerProductController::class, 'create'])->name('seller.products.create');
Route::post('/seller', [SellerProductController::class, 'store'])->name('seller.products.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
