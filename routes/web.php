<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\MediaController;
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

Route::get('/admin',[adminController::class,'index']);
Route::get('/edit',[adminController::class,'edit'])->name('edit');
Route::get('/media/uploads',[MediaController::class,'index']);
Route::post('/media/uploads',[MediaController::class,'upload']);