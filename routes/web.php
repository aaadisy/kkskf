<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

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
Route::get('/login', function () {
    return view('welcome');
})->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/forgetpass', function () {
    return view('forget');
})->name('forgetpass');

Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware(['auth'])->group(function () {

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');


    Route::get('/adduser', [AdminController::class, 'adduser'])->name('adduser');
    Route::post('/userstore', [AdminController::class, 'userstore'])->name('userstore');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/userlist', [AdminController::class, 'userlist'])->name('userlist');


    Route::get('/enrollments', [AdminController::class, 'enrollments'])->name('enrollments');
    Route::get('/enrollmentlist', [AdminController::class, 'enrollmentlist'])->name('enrollmentlist');

    Route::get('/enrollments/{var}', [AdminController::class, 'enrollmentsWithFilter'])->name('enrollmentsWithFilter');
    
    

    Route::get('/addapplication', [DashboardController::class, 'addapplication'])->name('addapplication');
    Route::post('/applicationstore', [DashboardController::class, 'applicationstore'])->name('applicationstore');

    Route::get('/applicationdetails/{num}', [DashboardController::class, 'applicationdetails'])->name('applicationdetails');
    Route::put('/update-application/{id}', [AdminController::class, 'updateApplication'])->name('update-application');


    Route::get('/report', [AdminController::class, 'report'])->name('report');
    
    Route::post('/downloadreport', [AdminController::class, 'downloadReport'])->name('downloadreport');


    // Add other protected routes here
});