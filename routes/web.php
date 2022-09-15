<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'UserController@home')->name('home');
Route::get('/detail/{produk}','UserController@detail')->name('pelanggan.detail');

Route::get('/login','usercontroller@login')->name('login');
Route::post('/postlogin','usercontroller@postlogin')->name('postLogin');

Route::get('/registrasi','usercontroller@registrasi')->name('registrasi');
Route::post('/postregistrasi','usercontroller@postregistrasi')->name('postregistrasi');

Route::middleware('auth')->group(function() {
    Route::get('logout', 'UserController@logout')->name('logout');
    Route::post('/postkeranjang/{produk}','UserController@postkeranjang')->name('pelanggan.postkeranjang');
    Route::get('/keranjang','UserController@keranjang')->name('pelanggan.keranjang');
    Route::get('/bayar/{diteltransaksi}','UserController@bayar')->name('pelanggan.bayar');
    Route::post('/prosesbayar/{diteltransaksi}', 'UserController@prosesbayar')->name('pelanggan.prosesbayar');
    Route::get('/summary', 'UserController@summary')->name('pelanggan.summary');

    Route::get('admin/produk', 'AdminController@produkIndex')->name('admin.produk');
    Route::get('admin/tampiltambahproduk', 'AdminController@tampiltambahproduk')->name('admin.tampiltambahproduk');
    Route::post('admin/tambahproduk', 'AdminController@tambahproduk')->name('admin.tambahproduk');
    Route::get('admin/editproduk{produk}','AdminController@editproduk')->name('admin.editproduk');
    Route::post('admin/updateproduk/{produk}', 'AdminController@updateproduk')->name('admin.updateproduk');
    Route::get('admin/deleteProduk/{produk}', 'AdminController@deleteproduk')->name('admin.deleteproduk');

});
