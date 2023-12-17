<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//need to fix 


    Route::get('/home', [HomeController::class, 'index'])->name('index')->middleware('guest');
   
    Route::get('/editor', [EditorController::class, 'index'])->name('editor')->middleware('editor');
    Route::get('/member', [MemberController::class, 'index'])->name('member')->middleware('member');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin', [AdminController::class, 'showAdminDashboard'])->name('admin.dashboard.show');
        Route::any('/admin/approve-user/{userId}', [AdminController::class, 'approveUser']);
        Route::delete('/admin/delete-user/{userId}', [AdminController::class, 'deleteUser']);
    });
   
    Route::get('/profile}', [ProfileController::class, 'showProfile'])->name('profile.show');


   