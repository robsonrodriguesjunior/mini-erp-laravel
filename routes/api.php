<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResources([
    'products' => ProductController::class,
]);

Route::post('/products/{id}/restore', [ProductController::class, 'restore']);

// Protected Routes (Require Token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/logout-other-devices', [AuthController::class, 'logoutOtherDevices']);
});
