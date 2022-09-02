<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('login', 'login')->name('login');
    Route::post('login/process', 'login_process')->name('login_process');
    Route::get('register', 'register')->name('register');
    Route::post('register/process', 'register_process')->name('register_process');
    Route::post('logout', 'logout')->name('logout');
});

Route::get('profile', function(){
    return view('profile');
})->middleware('auth')->name('profile');
