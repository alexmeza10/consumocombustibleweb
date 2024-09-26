<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserController;

// Rutas Login

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('auth_login', [AuthController::class, 'authLogin'])->name('login.auth');
Route::get('logout', [AuthController::class, 'authLogout'])->name('logout');

// Rutas del dashboard
Route::get('/menu', [DashboardController::class, 'index'])->name('menu');

// Rutas de recuperación de contraseña
Route::get('/olvide-contrasena', [ForgotPasswordController::class, 'showForm'])->name('password.request');
Route::post('/olvide-contrasena', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');
Route::post('/change-password', [ForgotPasswordController::class, 'changePassword'])->name('change.password');
Route::get('/password-change', [ForgotPasswordController::class, 'passworchange'])->name('password.change');
Route::get('/valida-pin', [ForgotPasswordController::class, 'showPinForm'])->name('valida.pin');



// Rutas de control de usuarios
Route::get('/newuser', [DashboardController::class, 'newuser'])->name('user.newuser');
Route::get('/adminuser', [DashboardController::class, 'adminuser'])->name('user.adminuser');
Route::get('/recordlist', [DashboardController::class, 'recordlist'])->name('recordlist');
Route::get('/profile', [DashboardController::class, 'profile'])->name('user.profile');
Route::post('/users', [UserController::class, 'store'])->name('user.store');

// Rutas de registros
Route::get('/newrecord', [DashboardController::class, 'newrecord'])->name('newrecord');

// Rutas de búsqueda
Route::get('/search', [UserController::class, 'search'])->name('users.search');
