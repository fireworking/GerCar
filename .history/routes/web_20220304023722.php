<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColaboratorController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/register-company', [CompanyController::class, 'create'])->middleware('guest');
Route::post('/register-company', [CompanyController::class, 'store'])->middleware('guest');
Route::get('/register-colaborator', [ColaboratorController::class, 'create']);
Route::post('/register-colaborator', [ColaboratorController::class, 'store']);
Route::get('/login', [UserController::class, 'loginForm'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::get('/profile', [CompanyController::class, 'profile'])->middleware('auth');
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
