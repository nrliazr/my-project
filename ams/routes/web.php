<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\MyEventController;
use App\Http\Middleware\Admin;
use App\Models\Fee;
use App\Models\MyEvent;

// Welcome page
Route::get('/', function () {
    return view('auth.login'); // folder path to login file; resources > .. > auth > login.blade.php
});

// Maps /home url to home view with both auth and verified middleware applied
// Ensure user must be authenticated & verified email address to access this route
Route::get('/home', function () {
    return view('home')->with('posts', Post::orderBy('updated_at', 'DESC')->get());
})->middleware(['auth', 'verified'])->name('home');

// Group of routes that require the auth middleware to be applied
// Include /profile page, /records page, /fees page
// Ensures user must be authenticated to access these routes.
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/home-address', [ProfileController::class, 'updateHomeAddress'])->name('profile.update.home.address');
    Route::patch('/profile/student-information', [ProfileController::class, 'updateStudentInformation'])->name('profile.update.student.information');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/store-student', [ProfileController::class, 'storeStudent'])->name('profile.store.student');
    Route::get('records', [RecordController::class, 'index'])->name('records');
    Route::get('fees', [FeeController::class, 'index'])->name('fees');
    Route::get('myevents', [MyEventController::class, 'index'])->name('myevents');
});

// Add a new middleware group for admins only
Route::middleware('admin')->group(function () {
    // No changes here
});


// PHP statement that includes the auth.php file located in the same directory
require __DIR__ . '/auth.php';

// Check if user is logged in, then check the middleware (in app.php)
Route::get('/admin/home', [AdminController::class, 'index'])
    ->middleware(['auth', 'admin']) // <-- the admin here is from middleware declaration in bootstrap > app.php
    ->name('admin.home'); // route name

// Admin routes
Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports'); // route name
Route::get('/admin/records', [AdminController::class, 'records'])->name('admin.records'); // route name
Route::get('/admin/fees', [AdminController::class, 'fees'])->name('admin.fees'); // route name

Route::resource('/post', PostsController::class);
Route::resource('/record', RecordController::class);
Route::resource('/report', ReportController::class);
Route::resource('/fee', FeeController::class);
// Route::resource('/home', AttendanceController::class);
// Auth::routes();

// create a route for generating a report for an existing resource, define a custom route
Route::get('/report/{report}/create', [ReportController::class, 'create'])->name('report.create');
Route::get('/report/{report}/show', [ReportController::class, 'show'])->name('report.show');
Route::get('/post/{post}/join', [PostsController::class, 'join'])->name('post.join');
Route::post('/post/{post}/join', [AttendanceController::class, 'store'])->name('attendance.store');
Route::get('/post/{post}/attendance', [AttendanceController::class, 'index'])->name('post.attendance');
Route::get('/record/{student}/create', [RecordController::class, 'create'])->name('record.create');
Route::get('/record/{record}/show', [RecordController::class, 'show'])->name('record.show');
Route::get('/fee/{fee}/show', [FeeController::class, 'show'])->name('fee.show');
Route::get('/fee/{student}/pay', [FeeController::class, 'pay'])->name('fee.pay');
Route::get('fee/pay-all/{user_id}', [FeeController::class, 'payAll'])->name('fee.pay-all');
Route::post('fee/pay-all/confirm/{user_id}', [FeeController::class, 'payAllConfirm'])->name('fee.pay-all.confirm');
Route::post('/profile/upload-qr-code', [ProfileController::class, 'uploadQrCode'])->name('profile.upload.qr.code');
Route::get('profile/get-qr-code', [ProfileController::class, 'getQrCode'])->name('profile.get-qr-code');
Route::get('/districts/{stateId}', [RegisteredUserController::class, 'getDistricts'])->name('get-districts');
