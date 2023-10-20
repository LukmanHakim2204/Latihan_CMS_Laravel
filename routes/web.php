<?php

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
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

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/projectShow/{id}', [ProjectController::class, 'show'])->name('projectShow')->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->resource('manager', ManagerController::class);
Route::middleware(['auth'])->resource('project', ProjectController::class);

// Rute login dengan Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])
    ->name('google.login');

// Penanganan pemanggilan balik dari Google setelah otorisasi
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])
    ->name('google.callback');

Route::group([
    'middleware' => ['auth', 'role:admin'],
    'prefix' => 'admin',
], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('manager', ManagerController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('project', ProjectController::class);
});
