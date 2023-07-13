<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [UserController::class, 'view_user']);
Route::get('/user_detail/{id}', [UserController::class, 'view_user_detail']);

Route::get('/4dM1n', [AdminController::class, 'view_user_onadmin']);
Route::get('/delete_user/{id}', [AdminController::class, 'delete_user']);

Route::get('/4dM1n/user_detail/{id}', [AdminController::class, 'view_user_detail_onadmin']);
Route::get('/delete_data_transfer/{id}', [AdminController::class, 'delete_data_transfer']);

Route::post('/add_user', [AdminController::class, 'add_user']);
Route::post('/add_transfer', [AdminController::class, 'add_transfer']);