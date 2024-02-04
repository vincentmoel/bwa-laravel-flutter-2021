<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('get-auth-user', [AuthController::class, 'getAuthUser']);
});

Route::resource('products', ProductController::class)->only('index', 'show');
Route::resource('categories', ProductCategoryController::class)->only('index', 'show');
Route::post('register', [UserController::class, 'store']);
Route::post('login', [AuthController::class, 'authenticate']);