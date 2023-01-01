<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'loginStore'])->name('loginPost');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'registerStore'])->name('registerPost');

Route::middleware(['auth'])->group(function () {
    Route::get('', [ProfileController::class, 'index'])->name('profile');

    Route::post('/edit', [ProfileController::class, 'update'])->name('edit');

    Route::post('/delete', [ProfileController::class, 'destroy'])->name('delete');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
