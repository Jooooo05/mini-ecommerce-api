<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

Route::get('/coba', function(){
    return 'oke';
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/cart', [CartController::class, 'viewCart']);
    Route::post('/cart', [CartController::class, 'addItem']);
    Route::put('/cart/{id}', [CartController::class, 'updateItem']);
    Route::delete('/cart/{id}', [CartController::class, 'removeItem']);
});