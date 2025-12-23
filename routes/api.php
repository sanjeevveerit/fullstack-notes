<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return response()->json(['status' => 'API working in Laravel 12']);
});

// Route::get('/notes', [App\Http\Controllers\NoteController::class, 'index']);

// Route::apiResource('/notes', App\Http\Controllers\NoteController::class);

Route::post('/register', [App\Http\Controllers\AuthController::class,'register']);

Route::post('/login',[App\Http\Controllers\AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('/notes', App\Http\Controllers\NoteController::class);
    Route::post('/logout',[App\Http\Controllers\AuthController::class,'logout']);

});
