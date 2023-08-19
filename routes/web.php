<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\ReqVaccineController;
use App\Http\Controllers\VaccineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OpenHourController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/',function(){
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
->name('dashboard');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');

// Route::get('dropdown', [DropdownController::class, 'index']);


Route::middleware(['auth'])->group(function () {
    Route::get('/requestvaccine', [ReqVaccineController::class, 'index'])->name('requestvaccine.index');
    Route::post('/requestvaccine', [ReqVaccineController::class, 'store'])->name('requestvaccine.store');
    Route::post('api/fetch-districts', [ReqVaccineController::class, 'fetchDistricts']);
    Route::post('api/fetch-hospitals', [ReqVaccineController::class, 'fetchHospitals']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/vaccines/all', [VaccineController::class, 'allVaccines'])->name('vaccines.all');
    Route::get('/vaccines/{vaccine}', [VaccineController::class, 'show'])->name('vaccines.show');
});

Route::middleware(['auth'])->group(function () {
    // Display the appointment request form
    Route::get('/appointment/request', [AppointmentController::class, 'showRequestForm'])->name('appointment.request');

    // Handle the appointment request form submission
    Route::post('/appointment/request', [AppointmentController::class, 'store'])->name('appointment.store');

    Route::get('/appointment/success', [AppointmentController::class, 'success'])->name('appointment.success');

    Route::post('api/fetch-districts', [ReqVaccineController::class, 'fetchDistricts']);
    Route::get('api/vaccine/{vaccine}/fetch-hospitals/{district}', [AppointmentController::class, 'getHospitals']);
});




Route::get('/open_hours', [OpenHourController::class, 'index'])->name('open_hours');

// Route::get('/dbconn', function () {
//     return view('dbconn');
// });