<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
	return view('auth/login');
});


Auth::routes();

Route::group(['middleware' => ['auth']], function(){
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::resource('/pelanggan', 'Pelanggan');
	Route::get('/pelanggan/edit/{id}', 'Pelanggan@edit');
	Route::get('/pelanggan/delete/{id}', 'Pelanggan@destroy');
	Route::resource('/pembelian', 'Pembelian');
	Route::get('/pembelian/hapus/{id}', 'Pembelian@destroy');
	Route::get('/pembelian/edit/{id}', 'Pembelian@editBeli');
	Route::resource('/pemasok', 'Pemasok');
	Route::get('/pemasok/edit/{id}', 'Pemasok@edit');
	Route::get('/pemasok/delete/{id}', 'Pelanggan@destroy');
	Route::get('/master', 'PembelianMaster@index');
	Route::get('/master/edit/{nobuk}', 'PembelianMaster@edit');
	Route::get('/master/invoice/{nobuk}', 'PembelianMaster@invoice');
	Route::get('/master/print/{nobuk}', 'PembelianMaster@print');
});