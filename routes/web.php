<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Administrator\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('guest')->group( function() {
    Route::get('auth',[AuthController::class, 'index'])->name('auth');
    Route::post('login',[AuthController::class, 'login'])->name('login');
    Route::get('register',[AuthController::class, 'register'])->name('register');
    Route::post('registration',[AuthController::class, 'registration'])->name('registration');
});

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::prefix('apps')->middleware('auth')->group( function() { 
    Route::get('dashboard',[DashboardController::class, 'index'])->name('apps.dashboard')->middleware('can:read-dashboard');
    
    
    Route::get('logout',[AuthController::class, 'logout'])->name('logout');
});
