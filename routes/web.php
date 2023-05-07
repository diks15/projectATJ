<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\halamenContoller;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;

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

Route::redirect('home', 'dashboard');

Route::get('/auth', [authController::class, "index"]) -> name('login') -> middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"]) -> middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"]) -> middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);

Route::prefix('dashboard')-> middleware('auth')->group(
    function(){
        Route::get('/', [halamenContoller::class, 'index']);
        Route::resource('halaman', halamenContoller::class);
        Route::resource('experience', experienceController::class);
        Route::resource('education', educationController::class);
    }
);
