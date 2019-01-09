<?php

// Pegawai
Route::get('/', function(){
    return redirect('home');
});

Route::get('/login', 'Login@showLoginForm')->name('login')->middleware('guest');
Route::post('/login', 'Login@masuk')->name('login.submit');
Route::post('/logout', 'Login@keluar');
Route::get('/logout', 'Login@keluar');

Route::get('home', 'Pegawai\HomeController@index')->name('home');
Route::resource('daftar', 'Pegawai\DaftarController');
Route::resource('pendidikan-terakhir', 'Pegawai\PendidikanController');
Route::resource('riwayat-kerja', 'Pegawai\RiwayatController');

// Admin
Route::group(['prefix' => 'admin'], function () 
{
    Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
    
    Route::resource('riwayat-kerja', 'Admin\RiwayatController');
    Route::get('riwayat-kerja/cari', 'Admin\RiwayatController@pencarian');
    Route::post('riwayat-kerja/cari', 'Admin\RiwayatController@pencarian');
    Route::get('riwayat-kerja/cetak/{bulan}/{tahun}', 'Admin\RiwayatController@cetak');

    Route::resource('riwayat-kerja/pegawai', 'Admin\RiwayatDetailController');
    Route::resource('pegawai', 'Admin\PegawaiController');
    Route::resource('lokasi', 'Admin\LokasiController');
    Route::resource('jabatan', 'Admin\JabatanController');
    
});

// Superuser
Route::group(['prefix' => 'superuser'], function () 
{
	Route::get('/home', 'Superuser\HomeController@index')->name('superuser.home'); 

});






