<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\AccountController;
//use App\Http\Controllers\AdminController;

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
Route::get('/account', [HomeController::class, 'account']);
Route::get('/report', [HomeController::class, 'report']);
Route::get('/transfer', [HomeController::class, 'transfer']);
Route::get('/transferBetween', [HomeController::class, 'transferBetween']);
Route::post('/records', [HomeController::class, 'records']);
Route::post('/store', [TransferController::class, 'store']);
Route::post('/store1', [TransferController::class, 'store1']);
Route::get('/error', [TransferController::class, 'error']);
Route::get('/cancel/{id}', [TransferController::class, 'cancel']);

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
