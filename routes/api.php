<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AddProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('register', '_register');
    Route::post('login', '_login');
    Route::get('user', 'index');
});

Route::controller(AddProductController::class)->group(function () {
    Route::get('addproduct', 'index');
    Route::post('addproduct/create', 'store');
    Route::get('addproduct/{addproduct}', 'show');
    Route::post('addproduct/edit/{id}', 'update');
    Route::delete('addproduct/{addproduct}', 'destroy');
});
