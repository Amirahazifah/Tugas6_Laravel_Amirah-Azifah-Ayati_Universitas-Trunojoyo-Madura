<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorsController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::apiResource('books', BookController::class)->only(['index','show']);
Route::apiResource('genres', GenreController::class)->only(['index','show']);
Route::apiResource('authors', AuthorsController::class)->only(['index','show']);

Route::middleware(['auth:api'])->group(function(){
    Route::middleware(['role:admin'])->group(function(){
    Route::apiResource('books', BookController::class)->only(['store','update','destroy']);
    Route::apiResource('genres', GenreController::class)->only(['store','update','destroy']);
    Route::apiResource('authors', AuthorsController::class)->only(['store','update','destroy']);
});

    
});


