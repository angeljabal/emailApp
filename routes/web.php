<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SmsController;
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


Route::get('/register', [AuthController::class, 'registrationForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);

Route::get('/', function(){
    return view('index');
});

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware('auth');

