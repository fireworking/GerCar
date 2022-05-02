<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
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
Route::post('/register-colaborator', [ColaboratorController::class, 'store']);
Route::get('/login-company', [CompanyController::class, 'loginForm'])->middleware('guest');
Route::post('/login-company', [CompanyController::class, 'login'])->middleware('guest');
Route::get('/company-profile/mine', [CompanyController::class, 'mine'])->middleware('auth');
Route::get('/company-profile/{company}', [CompanyController::class, 'show'])->middleware('auth');
Route::get('/logout', [CompanyController::class, 'logout'])->middleware('auth');
