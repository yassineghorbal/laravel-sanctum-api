<?php

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
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

////products

//show all products
Route::get('/products', ProductController::class . '@index');

//only authenticated users can access this route
Route::middleware('auth:sanctum')->post('/products', ProductController::class . '@store');

//show a single product
Route::get('/products/{id}', ProductController::class . '@show');

//only authenticated users can access this route
Route::middleware('auth:sanctum')->put('/products/{id}', ProductController::class . '@update');

//only authenticated users can access this route
Route::middleware('auth:sanctum')->delete('/products/{id}', ProductController::class . '@destroy');

//search by name
Route::get('/products/search/{name}', ProductController::class . '@search');


////users

//register a new user
Route::post('/register', UserController::class . '@register');

//logout
Route::middleware('auth:sanctum')->post('/logout', UserController::class . '@logout');

//login
Route::post('/login', UserController::class . '@login');
