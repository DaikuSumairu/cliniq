<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SideNavController;
use App\Http\Controllers\CalendarController;

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
    return view('auth.login');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Student Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:student'])->group(function () {
    Route::get('/student/home', [HomeController::class, 'studentHome'])->name('student.home');

    //Student navigation
    Route::get('/student/appointment', [SideNavController::class, 'studentAppointment'])->name('student.appointment');
    Route::get('/student/myRecord', [SideNavController::class, 'studentRecord'])->name('student.record');
});
  
/*------------------------------------------
--------------------------------------------
All Staff Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:staff'])->group(function () {
    Route::get('/staff/home', [HomeController::class, 'staffHome'])->name('staff.home'); 

    //Staff navigation
    Route::get('/staff/appointment', [SideNavController::class, 'staffAppointment'])->name('staff.appointment');
    Route::get('/staff/myRecord', [SideNavController::class, 'staffRecord'])->name('staff.record');
});
  
/*------------------------------------------
--------------------------------------------
All Clinic Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:clinic'])->group(function () {
    Route::get('/clinic/home', [HomeController::class, 'clinicHome'])->name('clinic.home');
    
    //Clinic navigation
    Route::get('/clinic/appointment', [SideNavController::class, 'appointment'])->name('appointment');
    Route::get('/clinic/record', [SideNavController::class, 'record'])->name('record');
    Route::get('/clinic/storage', [SideNavController::class, 'storage'])->name('storage');
});

Route::get('calendar-event', [CalendarController::class, 'index']);
Route::post('calendar-crud-ajax', [CalendarController::class, 'calendarEvents']);