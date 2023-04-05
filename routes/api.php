<?php

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
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

Route::get('/records', 'App\Http\Controllers\Api\RecordsController@index');
Route::apiResource('customers', CustomerController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('products', ProductController::class);
Route::apiResource('orders', OrderController::class);
