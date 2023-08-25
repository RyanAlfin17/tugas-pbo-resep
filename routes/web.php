<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResepController;
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

// dashboard
Route::get('/', [IndexController::class, 'index'])->name('index');

// auth
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/show', [AuthController::class, 'showRegistrationForm'])->name('show');
Route::get('/showlogin', [AuthController::class, 'showlogin'])->name('showlogin');



// resep
Route::get('/indexresep', [ResepController::class, 'index'])->name('indexresep');
Route::get('/tambahresep', [ResepController::class, 'tambahresep'])->name('tambahresep');
Route::post('/store', [ResepController::class, 'store'])->name('store');
Route::get('/showresep/{id}', [ResepController::class, 'showresep'])->name('showresep');
Route::delete('/deleteresep/{id}', [ResepController::class, 'deleteresep'])->name('deleteresep');

// Edit resep
Route::get('/editresep/{id}', [ResepController::class, 'editresep'])->name('editresep');
Route::put('/updateresep/{id}', [ResepController::class, 'updateresep'])->name('updateresep');
