<?php

use App\Http\Controllers\AuthController;
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
Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class,'login']);
    Route::post('register', [AuthController::class,'register']);
});

Route::middleware(['auth:api'])->group(function(){
    Route::get('/user', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});


/* // Admin routes
Route::group(['middleware' => ['auth:api', 'role:admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
});

// Agent routes
Route::group(['middleware' => ['auth:api', 'role:agent']], function () {
    Route::get('/agent/tasks', [AgentController::class, 'tasks']);
});

// Customer routes
Route::group(['middleware' => ['auth:api', 'role:customer']], function () {
    Route::get('/customer/tickets', [CustomerController::class, 'tickets']);
}); */
