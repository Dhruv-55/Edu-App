<?php

use App\Http\Controllers\Teacher\DashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'teacher'],function(){
    Route::group(['middleware' => 'teacher'],function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('teacher-dashboard');
    });
});