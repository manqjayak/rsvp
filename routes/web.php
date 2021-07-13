<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

//guest manager
Route::get('/home',[GuestManagerController::class, 'index'])->name('home');


Route::get('/order',[GuestManagerController::class, 'order'])->name('order');
Route::post('/orderevent',[GuestManagerController::class, 'orderEvent'])->name('orderevent');
Route::get('/orderlist',[GuestManagerController::class, 'orderList'])->name('orderlist');

Route::get('/charga',[GuestManagerController::class, 'cHarga'])->name('charga');

