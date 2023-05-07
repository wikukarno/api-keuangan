<?php

use App\Http\Controllers\Api\UangKeluarController;
use App\Http\Controllers\Api\UangMasukController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    
    Route::post('uang-keluar/store', [UangKeluarController::class, 'storeUangKeluar']);
    Route::post('uang-masuk/store', [UangMasukController::class, 'storeUangMasuk']);
    Route::post('logout', [UserController::class, 'logout']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
