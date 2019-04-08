<?php

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

Route::get('/', 'peminjamanController@loadIndex');
Route::get('/bukti/{id}', function () {
    return view('bukti');
});

// admin
Route::get('/admin/booking','peminjamanController@loadAdminBooking');
Route::get('/admin/peminjaman','peminjamanController@loadAdminPeminjaman');
Route::get('/admin/denda','peminjamanController@loadAdminDenda');

// peminjaman
Route::post('/booking','peminjamanController@booking');
Route::get('/admin/konfirmasi/booking/{id}','peminjamanController@konfirmasiBooking');
Route::get('/admin/konfirmasi/peminjaman/{id}','peminjamanController@konfirmasiPengembalian');
Route::get('/admin/konfirmasi/denda/{id}','peminjamanController@konfirmasiDenda');


//auth
Route::get('/admin', 'adminController@index');
Route::get('/login', 'adminController@login');
Route::post('/loginForm', 'adminController@loginForm');
Route::get('/register', 'adminController@register');
Route::post('/registerForm', 'adminController@registerForm');
Route::get('/logout', 'adminController@logout');