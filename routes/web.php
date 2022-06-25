<?php

use Illuminate\Support\Facades\Route;
USE App\Http\Controllers\SuratController;

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

Route::get('/', [SuratController::class, 'index']);
Route::get('/read', [SuratController::class, 'read']);
Route::get('/create', [SuratController::class, 'create']);
Route::get('/store', [SuratController::class, 'store']);
Route::get('/show/{id}', [SuratController::class, 'show']);
Route::get('/update/{id}', [SuratController::class, 'update']);
Route::get('/destroy/{id}', [SuratController::class, 'destroy']);