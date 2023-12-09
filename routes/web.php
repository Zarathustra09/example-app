<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\MemberController;
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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


   
    Route::get('/editor', [EditorController::class, 'index'])->name('editor')->middleware('editor');
    Route::get('/member', [MemberController::class, 'index'])->name('member')->middleware('member');

    
    Route::get('/admin', [AdminController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/approve-user/{userId}', [AdminController::class, 'approveUser']);
   