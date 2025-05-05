<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth:sanctum')->get('/check-login', function () {
    return response()->json(['user' => Auth::user()]);
});
