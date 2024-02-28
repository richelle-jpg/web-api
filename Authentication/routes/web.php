<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});



Route::get('/login',[AuthManager::class, 'login'])->name('login');
Route::post('/login',[AuthManager::class,'loginPost'])->name('login.post');
Route::get('/registration',[AuthManager::class,'registration'])->name('registration');
Route::post('/registration',[AuthManager::class,'registrationPost'])->name('registration.post');
Route::get('/logout',[AuthManager::class,'logout'])->name('logout');

Route::get('/reset-request', [ResetPasswordController::class, 'showResetRequestForm'])->name('reset.request.form');
Route::post('/reset-request', [ResetPasswordController::class, 'showResetPasswordPost'])->name('reset.request.post');
Route::get('/reset-password', [ResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.form');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPasswordPost'])->name('reset.password.post');


Route::get('/home',[Controller::class, 'home'])->name('home');


Route::get('/', [HomeController::class, 'home'])->name('home');
