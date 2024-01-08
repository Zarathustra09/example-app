<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\MemberController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembersCrudController;

use App\Http\Controllers\GalleryController;

use App\Http\Controllers\RegisterCorporate;
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

    Route::get('/home', [HomeController::class, 'index'])->name('index')->middleware('guest');
   


    Route::get('/register/corporate', [RegisterCorporate::class, 'showRegistrationForm'])->name('view.corporate');
    Route::post('/register/corporate', [RegisterCorporate::class, 'create'])->name('register.corporate');

    
  
   
    Route::get('/editor', [EditorController::class, 'index'])->name('editor')->middleware('editor');
    Route::get('/member', [MemberController::class, 'index'])->name('member')->middleware('member');

    Route::group(['middleware' => 'admin'], function () {

        //dashboard
        Route::get('/adminDashboard', [AdminController::class, 'index'])->name('dashboard');

        Route::get('/admin', [AdminController::class, 'showAdminDashboard'])->name('admin.dashboard.show');
        Route::any('/admin/approve-user/{userId}', [AdminController::class, 'approveUser']);
        Route::delete('/admin/delete-user/{userId}', [AdminController::class, 'deleteUser']);

        //Single Membership
        Route::get('/members', [MembersCrudController::class, 'getAllMembers'])->name('members.index');
        Route::get('/members/{id}', [MembersCrudController::class, 'getMember'])->name('members.show');
        Route::put('/members/update/{id}', [MembersCrudController::class, 'updateMember'])->name('members.update');
        Route::delete('/members/delete/{id}', [MembersCrudController::class, 'deleteMember'])->name('members.delete');
        Route::get('/members/search', [MembersCrudController::class,'searchMembers'])->name('members.search');

        //Corporate Membership Approval
        Route::get('/corporate-admin-dashboard', [AdminController::class, 'showCorporateAdminDashboard'])->name('admin.corporateDashboard');
        Route::post('/approve-corporate-user/{userId}', [AdminController::class, 'approveCorporateUser'])->name('admin.approveCorporateUser');
        Route::get('/approved-corporate-users', [AdminController::class, 'showApprovedCorporateUsers'])->name('admin.showApprovedCorporateUsers');

        Route::get('/members-corporate', [MembersCrudController::class, 'getAllCorporateMembers'])->name('corporate.index');
        Route::put('/members-corporate/update/{id}', [MembersCrudController::class, 'updateCorporateMember'])->name('corporate.update');
        Route::delete('/members-corporate/delete/{id}', [MembersCrudController::class, 'deleteCorporateMember'])->name('members.delete');


    });
   
    Route::get('/profile}', [ProfileController::class, 'showProfile'])->name('profile.show');
   


    //Auth

   
    
    Route::get('/gallery', [GalleryController::class, 'showGallery']);
  