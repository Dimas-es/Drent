<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;

Route::post('/users', [UserController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);

Route::get('/test', function () {
    return 'Test route';
});
