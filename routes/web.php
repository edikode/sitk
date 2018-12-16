<?php

// Pegawai
Route::get('/', function(){
    return redirect('login');
});

Route::get('/login', 'Pegawai\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Pegawai\LoginController@login')->name('login.submit');
Route::post('/logout', 'Pegawai\LoginController@logout');

Route::get('home', 'Pegawai\HomeController@index')->name('home');
Route::resource('daftar', 'Pegawai\DaftarController');
Route::resource('pendidikan-terakhir', 'Pegawai\PendidikanController');
Route::resource('tunjangan', 'Pegawai\TunjanganController');
Route::resource('riwayat-kerja', 'Pegawai\riwayatcontroller');

// Admin
Route::group(['prefix' => 'admin'], function () 
{
	Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Admin\LoginController@logout');
	
	Route::get('/home', 'Admin\HomeController@index')->name('admin.home');
    
});

// Superuser
Route::group(['prefix' => 'superuser'], function () 
{
	Route::get('/login', 'Superuser\LoginController@showLoginForm')->name('superuser.login');
    Route::post('/login', 'Superuser\LoginController@login')->name('superuser.login.submit');
    Route::post('/logout', 'Superuser\LoginController@logout');

	Route::get('/home', 'Superuser\HomeController@index')->name('superuser.home'); 

});






