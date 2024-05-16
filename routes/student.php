<?php

use App\Http\Controllers\Student\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'student'],function(){
    Route::group(['middleware' => 'student'],function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('student-dashboard');
    });
});