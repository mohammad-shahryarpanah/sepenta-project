<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('register',[\App\Http\Controllers\api\v1\AuthController::class,'register']);



Route::group(['middleware' => 'auth:api'], function() {
    // روت‌هایی که نیاز به احراز هویت دارند
});
