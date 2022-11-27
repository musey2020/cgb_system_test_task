<?php

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
use App\Http\Controllers\AuthController;

Route::prefix('admin')->middleware('isLogin')->group(function () {
    Route::view('login', 'back.login')->name('admin.login');
    Route::post('login', [AuthController::class, 'loginPost'])->name('admin.login.post');
});


Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::view('/', 'back.dashboard')->name('dashboard');
});
