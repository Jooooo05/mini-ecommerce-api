<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;

Route::get('/coba', function(){
    return 'oke';
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function (){

    Route::prefix('cart')->controller(CartController::class)->group(function () {
        Route::get('/', 'viewCart');                 // GET /cart
        Route::post('/', 'addItem');                 // POST /cart in this route i add item to cart adn update quantity if items already exists
        Route::delete('/{id}', 'removeItem');        // DELETE /cart/{id}
    });

    Route::prefix('items')->controller(ItemController::class)->group(function () {
        Route::get('/', 'viewItem');                // GET /items
        Route::post('/', 'createItem');             // POST /items
        Route::get('{id}', 'show');                 // GET /items/{id}
        Route::put('{id}', 'updateItem');         // PUT /items/{item}
        Route::delete('{id}', 'deleteItem');      // DELETE /items/{item}
    });
});