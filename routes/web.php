<?php

use App\Http\Controllers\PasswordController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PasswordController::class, 'create'])->name('create');
Route::post('/store-password', [PasswordController::class, 'store'])->name('store');
Route::get('/password/{guid}/{key}', [PasswordController::class, 'show'])->name('show');

// Route::get('/{password_id}', [PasswordController::class, 'show']);
