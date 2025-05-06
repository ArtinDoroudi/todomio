<?php

use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('tags', TagController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('tasks/{task}/tags/{tag}', [TaskController::class, 'attachTag']);
    Route::delete('tasks/{task}/tags/{tag}', [TaskController::class, 'deleteTag']);

    Route::apiResource('tasks', TaskController::class);

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
