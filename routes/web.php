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

Route::post('/tambahtamu',[GuestManagerController::class, 'tambahTamu'])->name('tambahtamu');
Route::post('/deletetamu',[GuestManagerController::class, 'deleteTamu'])->name('deletetamu');
// edit pesan WA
Route::post('/editpesan',[GuestManagerController::class, 'editPesan'])->name('editpesan');

Route::get('/charga',[GuestManagerController::class, 'cHarga'])->name('charga');


// admin
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/admin/requested',[AdminController::class, 'requestEvent'])->name('requestevent');

Route::post('/admin/tolakrequest',[AdminController::class, 'tolakRequest'])->name('tolakrequest');
Route::post('/admin/terimarequest',[AdminController::class, 'terimaRequest'])->name('terimarequest');

