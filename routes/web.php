<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
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
    return view('welcome');
});
Route::get('/register', function () {
    return view('register');
});

// Google URL
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

Route::get('loginUser/{id}',[GoogleController::class, 'loginUsingId']);
Route::post('/register-user',[GoogleController::class, 'register']);
Route::post('/update-user',[GoogleController::class, 'updateUser']);
Route::post('/login-user',[GoogleController::class, 'loginUsingEmail']);
Route::get('/home',[GoogleController::class, 'home'])->name('home');
Route::get('/logout',[GoogleController::class, 'logout'])->name('logout');
Route::get('/update/{id}',[GoogleController::class, 'update'])->name('update');