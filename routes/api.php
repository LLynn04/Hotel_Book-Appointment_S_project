<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[AuthController::class,'Register']);
Route::post('/login', [AuthController::class,'Login']);
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); 
    return response()->json([
        'message' => 'Email verified successfully'
    ]);
})->middleware(['auth:sanctum']) // Protect route
  ->name('verification.verify'); 