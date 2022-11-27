<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/auth/login', [\App\Http\Controllers\Api\AuthController::class, 'loginUser']);
Route::get('/companies', [\App\Http\Controllers\Api\ApiController::class, 'companies']);
Route::get('/companies/from/client/{client}', [\App\Http\Controllers\Api\ApiController::class, 'get_companies_from_client']);
