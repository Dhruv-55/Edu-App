<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\BatchSubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.Now create something great!
|
*/

Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[LoginController::class,'login'])->name('admin-login');
    Route::post('/',[LoginController::class,'login'])->name('admin-login');
    Route::get('forgot-password',[LoginController::class,'ForgotPassword'])->name('forgot-password');
    Route::post('forgot-password',[LoginController::class,'ForgotPassword'])->name('forgot-password');

    Route::get('reset/{token}',[LoginController::class,'resetPassword'])->name('reset-password');
    
    Route::post('reset-password',[LoginController::class,'resetPasswordPost'])->name('reset-password-post');

    Route::group(['middleware' => 'admin'],function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('admin-dashboard');
        Route::get('logout',[LoginController::class,'logout'])->name('admin-logout');

        Route::group(['prefix' => 'admins'],function(){
            Route::get('index',[AdminController::class,'index'])->name('admin-view');
            Route::match(['get', 'post'], 'create', [AdminController::class, 'create'])->name('admin-create');
            Route::match(['get', 'post'], 'update/{id}', [AdminController::class, 'update'])->name('admin-update');  });
        });

        Route::group(['prefix' => 'batch'],function(){
            Route::get('index',[BatchController::class,'index'])->name('batch-view');
            Route::match(['get', 'post'], 'create', [BatchController::class, 'create'])->name('batch-create');
            Route::match(['get', 'post'], 'update/{id}', [BatchController::class, 'update'])->name('batch-update');
            
            Route::group(['prefix' => 'subject'],function(){
                Route::get('index',[BatchSubjectController::class,'index'])->name('batch-subject-view');
                Route::match(['get', 'post'], 'create', [BatchSubjectController::class, 'create'])->name('batch-subject-create');
                Route::match(['get', 'post'], 'update/{id}', [BatchSubjectController::class, 'update'])->name('batch-subject-update');  
            });
        });

        Route::group(['prefix' => 'subject'],function(){
            Route::get('index',[SubjectController::class,'index'])->name('subject-view');
            Route::match(['get', 'post'], 'create', [SubjectController::class, 'create'])->name('subject-create');
            Route::match(['get', 'post'], 'update/{id}', [SubjectController::class, 'update'])->name('subject-update');  
        });
});