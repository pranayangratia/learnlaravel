<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;

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

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/about', [AboutController::class , 'index'])->name('about');

Route::get('/contact', [ContactController::class , 'index'])->name('contact');

Route::get('/register',[RegisterController::class ,'index'])-> name('register');

Route::get('/login',[LoginController::class ,'index'])-> name('login');

Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/courses/{course}/enroll', [UserController::class, 'enrollcourse'])->name('enrollcourse')->middleware('auth');

Route::post('/addacourse', [UserController::class, 'addacourse'])->name('course.add');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/attendance/store', [AttendanceController::class, 'attendancestore'])->name('attendancestore')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/management', [UserController::class, 'management'])->name('management')->middleware('auth');

Route::get('/studentlist', [UserController::class, 'studentlist'])->name('studentlist')->middleware('auth');

Route::get('/course-enrolled-list', [UserController::class, 'courseenrolledlist'])->name('courseenrolledlist')->middleware('auth');

Route::get('/view-course-list', [UserController::class, 'viewcourselist'])->name('viewcourselist')->middleware('auth');

Route::get('/manageEnrollments', [UserController::class, 'manageEnrollments'])->name('manageEnrollments')->middleware('auth');

Route::get('dashboard/profile/edit', [UserController::class, 'edit'])->name('profile-edit');

Route::get('dashboard/study', [UserController::class, 'gotodesk'])->name('gotodesk');

Route::get('dashboard/attendance', [AttendanceController::class, 'attendancerecord'])->name('attendancerecord')->middleware('auth');

Route::put('/profile', [UserController::class, 'update'])->name('profile.update');


