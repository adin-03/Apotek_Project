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


//Route::group(['prefix' => 'admin'], function (){
//
//    Route::get('merk', 'MerkController@index')->name('apotek.merk.index');
//    Route::get('merk/create', 'MerkController@create')->name('apotek.merk.create');
//    Route::post('merk/create','MerkController@store')->name('apotek.merk.store');
//    Route::get('merk/{id}/edit', 'MerkController@edit')->name('apotek.merk.edit');
//    Route::patch('merk/update/{id}','MerkController@update')->name('apotek.merk.update');
//    Route::get('merk/destroy/{id}','MerkController@destroy')->name('apotek.merk.destroy');
//
//    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
//    Route::get('obat', 'ObatController@index')->name('apotek.obat.index');
//    Route::get('obat/create','ObatController@create')->name('apotek.obat.create');
//    Route::post('obat/create','ObatController@store')->name('apotek.obat.store');
//    Route::get('obat/{id}/edit', 'ObatController@edit')->name('apotek.obat.edit');
//    Route::patch('obat/update/{id}','ObatController@update')->name('apotek.obat.update');
//    Route::get('obat/destroy/{id}', 'ObatController@destroy')->name('apotek.obat.destroy');
//
//    Route::get('transaksi', 'TransaksiController@index')->name('kasir.transaksi.index');
//    Route::get('transaksi/cetak_pdf', 'TransaksiController@cetak_pdf')->name('kasir.transaksi.cetak_pdf');
//    Route::get('transaksi/create', 'TransaksiController@create')->name('kasir.transaksi.create');
//    Route::post('transaksi/create','TransaksiController@store')->name('kasir.transaksi.store');
//    Route::get('transaksi/search', 'TransaksiController@search')->name('kasir.transaksi.search');
//    Route::get('transaksi/{id}/edit', 'TransaksiController@edit')->name('kasir.transaksi.edit');
//    Route::patch('transaksi/update/{id}','TransaksiController@update')->name('kasir.transaksi.update');
//    Route::get('transaksi/destroy/{id}', 'TransaksiController@destroy')->name('kasir.transaksi.destroy');
//});


/*Route::get('', function (){
   return redirect()->route('kasir.dashboard'); 
});*/

Route::group(['prefix' => 'apotek'], function () {
    Route::get('login', 'Apotek\AuthApotekController@showLoginForm')->name('show.apotek.login');
    Route::post('login/submit', 'Apotek\AuthApotekController@login')->name('apotek.login');
    Route::get('/logout', 'Apotek\AuthApotekController@logout')->name('apotek.logout');

    Route::get('dashboard', 'Apotek\DashboardController@dashboard')->name('apotek.dashboard');

    Route::get('merk', 'Apotek\MerkController@index')->name('apotek.merk.index');
    Route::get('merk/create', 'Apotek\MerkController@create')->name('apotek.merk.create');
    Route::post('merk/create', 'Apotek\MerkController@store')->name('apotek.merk.store');
    Route::get('merk/{id}/edit', 'Apotek\MerkController@edit')->name('apotek.merk.edit');
    Route::patch('merk/update/{id}', 'Apotel\MerkController@update')->name('apotek.merk.update');
    Route::get('merk/destroy/{id}', 'Apotek\MerkController@destroy')->name('apotek.merk.destroy');

    Route::get('obat', 'Apotek\ObatController@index')->name('apotek.obat.index');
    Route::get('obat/create', 'Apotek\ObatController@create')->name('apotek.obat.create');
    Route::post('obat/create', 'Apotek\ObatController@store')->name('apotek.obat.store');
    Route::get('obat/{id}/edit', 'Apotek\ObatController@edit')->name('apotek.obat.edit');
    Route::patch('obat/update/{id}', 'Apotek\ObatController@update')->name('apotek.obat.update');
    Route::get('obat/destroy/{id}', 'Apotek\ObatController@destroy')->name('apotek.obat.destroy');

    Route::get('transaksi', 'Apotek\TransaksiController@index')->name('apotek.transaksi.index');
    Route::get('transaksi/cetak_pdf', 'Apotek\TransaksiController@cetak_pdf')->name('apotek.transaksi.cetak_pdf');
    Route::get('transaksi/search', 'Apotek\TransaksiController@search')->name('apotek.transaksi.search');
    Route::get('transaksi/destroy/{id}', 'Apotek\TransaksiController@destroy')->name('apotek.transaksi.destroy');
});

Route::group(['prefix' => 'kasir'], function () {

    Route::get('login', 'Kasir\AuthKasirController@showLoginForm')->name('show.kasir.login');
    Route::post('login/submit', 'Kasir\AuthKasirController@login')->name('kasir.login');
    Route::get('/logout', 'Kasir\AuthKasirController@logout')->name('kasir.logout');

    Route::get('dashboard', 'Kasir\DashboardController@dashboard')->name('kasir.dashboard');

    /*Route::get('merk', function (){
        return 'aaaa';
    })->name('kasir.merk.index');*/

    Route::get('merk', 'Kasir\MerkController@index')->name('kasir.merk.index');

    Route::get('obat', 'Kasir\ObatController@index')->name('kasir.obat.index');

    Route::get('transaksi', 'Kasir\TransaksiController@index')->name('kasir.transaksi.index');
    Route::get('transaksi/cetak_pdf', 'Kasir\TransaksiController@cetak_pdf')->name('kasir.transaksi.cetak_pdf');
    Route::get('transaksi/create', 'Kasir\TransaksiController@create')->name('kasir.transaksi.create');
    Route::post('transaksi/create', 'Kasir\TransaksiController@store')->name('kasir.transaksi.store');
    Route::get('transaksi/search', 'Kasir\TransaksiController@search')->name('kasir.transaksi.search');
    Route::get('transaksi/{id}/edit', 'TransaksiController@edit')->name('kasir.transaksi.edit');
    Route::patch('transaksi/update/{id}', 'TransaksiController@update')->name('kasir.transaksi.update');
    Route::get('transaksi/destroy/{id}', 'TransaksiController@destroy')->name('kasir.transaksi.destroy');
});