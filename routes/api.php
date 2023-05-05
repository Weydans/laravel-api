<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;

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

Route::post( '/v0/login', [ LoginController::class, "login" ] )->name('login');

Route::post('/v0/users', [ UserController::class, 'store' ])->name('user.store');

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('/v0/expenses', ExpenseController::class);
});
