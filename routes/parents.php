<?php

use App\Http\Controllers\Parents\DashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['preifx' => 'parents'],function(){

    Route::group(['middleware' => 'parents'],function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('parents-dashboard');
    });

});