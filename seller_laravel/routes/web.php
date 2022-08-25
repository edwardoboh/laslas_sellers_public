<?php

use Illuminate\Support\Facades\Route;

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

//Save to Session
Route::get('/lang/{lang}', [\App\Http\Controllers\LanguageController::class, 'switchLang'])->name('switchLanguage');
Route::post('/save-to-session', [\App\Http\Controllers\Authentication\AuthenticationController::class, 'saveToSession'])->name('saveToSession');
//logout
Route::get('/logout', [\App\Http\Controllers\Authentication\AuthenticationController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['guest']], function () {
    //Login routes
    Route::get('/login', [\App\Http\Controllers\Authentication\AuthenticationController::class, 'login'])->name('login');
    Route::get('/signin', [\App\Http\Controllers\Authentication\AuthenticationController::class, 'signIn'])->name('signIn');
    //Onetime Login
    Route::post('/verify-onetime-login', [\App\Http\Controllers\Authentication\AuthenticationController::class, 'verifyOnetimeLogin'])->name('verifyOnetimeLogin');
    //Sign in with google
    Route::get('/auth/google', [\App\Http\Controllers\Authentication\AuthenticationController::class, 'googleLogin'])->name('googleLogin');
    Route::get('/auth/google/callback', [\App\Http\Controllers\Authentication\AuthenticationController::class, 'googleLoginCallback'])->name('googleLoginCallback');
    //Register
    Route::get('/register', [\App\Http\Controllers\Authentication\AuthenticationController::class, 'register'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Authentication\AuthenticationController::class, 'registerStore'])->name('registerStore');
});

Route::group(['middleware' => ['auth', 'roles'], ['roles' => ['Seller']]], function (){
    //Dashboard
    Route::get('/', [App\Http\Controllers\Dasboard\DasboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\Dasboard\DasboardController::class, 'index'])->name('dashboard');

    //My Profile
    Route::get('/profile', [App\Http\Controllers\User\UserController::class, 'myProfile'])->name('myProfile');
    Route::post('/profile', [App\Http\Controllers\User\UserController::class, 'updateProfile'])->name('updateProfile');
    //Change Password
    Route::get('/change-password', [App\Http\Controllers\User\UserController::class, 'changePassword'])->name('changePassword');
});

