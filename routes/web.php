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
Route::post('/importtamu',[GuestManagerController::class, 'fimportExcel'])->name('fimportexcel');
// edit pesan WA
Route::post('/editpesan',[GuestManagerController::class, 'editPesan'])->name('editpesan');
// edit tanggal
Route::post('/edittanggal',[GuestManagerController::class, 'editTanggal'])->name('edittanggal');
// cancel event
Route::post('/cancelevent',[GuestManagerController::class, 'cancelEvent'])->name('cancelevent');

Route::get('/charga',[GuestManagerController::class, 'cHarga'])->name('charga');


// admin
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/admin/requested',[AdminController::class, 'requestEvent'])->name('requestevent');
Route::get('/admin/mguestmanager',[AdminController::class, 'mGuestManager'])->name('mguestmanager');
Route::get('/admin/mdaftarevent',[AdminController::class, 'mDaftarEvent'])->name('mdaftarevent');

Route::post('/admin/dguestmanager',[AdminController::class, 'dGuestManager'])->name('dguestmanager');

Route::post('/admin/detailgm',[AdminController::class, 'detailGM'])->name('dGM');
Route::post('/admin/editgm',[AdminController::class, 'editGM'])->name('editGM');
Route::post('/admin/getrsvp',[AdminController::class, 'getRSVP'])->name('gRSVP');
Route::post('/admin/editrsvp',[AdminController::class, 'editRSVP'])->name('eRSVP');

Route::post('/admin/tolakrequest',[AdminController::class, 'tolakRequest'])->name('tolakrequest');
Route::post('/admin/terimarequest',[AdminController::class, 'terimaRequest'])->name('terimarequest');

// rsvp
// paket standar
Route::get('/rsvp/{detail}/{id}',[Rsvp::class, 'index'])->name('rsvp');
// paket dedicated
Route::get('/rsvp/{detail}/{paket}/{id}/{tamu}',[Rsvp::class, 'index1'])->name('rsvp1');
Route::post('/rsvp/tambahtamu',[Rsvp::class, 'tambahTamu'])->name('tambahtamursvp');
