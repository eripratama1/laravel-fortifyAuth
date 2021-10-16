<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('auth/google',[App\Http\Controllers\Admin\SocialiteController::class,'google'])->name('google_socialite');
Route::get('auth/google/callback',[App\Http\Controllers\Admin\SocialiteController::class,'google_callback']);

    Route::prefix('admin')->middleware(['auth','verified'])->group(function () {
        Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard.index');    
        Route::get('/profile',[ProfileController::class,'index'])->name('admin.profile.index');  
        Route::resource('/role-permission', RoleController::class);
        Route::resource('/permission', PermissionController::class);
        //Route::get('/role-permission',[RoleController::class,'index'])->name('admin.role.index');
                   
});