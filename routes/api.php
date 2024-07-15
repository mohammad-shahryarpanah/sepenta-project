<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register',[\App\Http\Controllers\api\v1\AuthController::class,'register']);
Route::post('login',[\App\Http\Controllers\api\v1\AuthController::class,'login']);


Route::get('index',[\App\Http\Controllers\api\v1\ProductController::class,'index']);
Route::post('store',[\App\Http\Controllers\api\v1\ProductController::class,'store']);
Route::post('update/{id}',[\App\Http\Controllers\api\v1\ProductController::class,'update']);
Route::delete('destroy/{id}',[\App\Http\Controllers\api\v1\ProductController::class,'destroy']);


Route::group(['middleware' => 'auth:api'], function() {
    // روت‌هایی که نیاز به احراز هویت دارند
});
