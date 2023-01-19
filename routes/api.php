<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);    

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('/registry')->group(function () {
        Route::post('/add/{book_store}', [BookController::class, 'newBook']);
        Route::put('/{book_registry}', [BookController::class, 'updateBook']);
        Route::delete('/{book_registry}', [BookController::class, 'deleteBook']);
        Route::get('/{book_registry}', [BookController::class, 'getBook']);
    });
});
