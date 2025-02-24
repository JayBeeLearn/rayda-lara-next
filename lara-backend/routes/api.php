<?php

// api routes 

use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->controller(TaskController::class)->group(function(){
    Route::get('/tasks',  'index');
    Route::get('/tasks/{task}',  'getSingle');
    Route::post('/tasks',  'store');
    Route::put('/tasks/{task}',  'update');
    Route::patch('/tasks/{task}', 'updateStatus');
    Route::delete('/tasks/{task}',  'destroy');
});

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

