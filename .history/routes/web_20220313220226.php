<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColaboratorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;

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
Route::get('/company', [CompanyController::class, 'company'])->middleware('auth');

Route::get('/register-colaborator', [ColaboratorController::class, 'create']);
Route::post('/register-colaborator', [ColaboratorController::class, 'store']);
Route::get('/colaborator', [ColaboratorController::class, 'colaborator'])->middleware('auth');
Route::get('/fill-info', [ColaboratorController::class, 'fillInfoForm'])->middleware('auth');
Route::post('/fill-info', [ColaboratorController::class, 'fillInfo'])->middleware('auth');

Route::get('/login', [UserController::class, 'loginForm'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');

Route::get('/add-vehicle', [VehicleController::class, 'create'])->middleware('auth');
Route::post('/add-vehicle', [VehicleController::class, 'store'])->middleware('auth');
