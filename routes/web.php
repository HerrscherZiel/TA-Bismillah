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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//MAHASISWA

    //dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/detailProject', 'DashboardController@detailProject')->name('dashboard.detailProject');

    //profile
    Route::get('/profile', 'ProfileController@index')->name('profile.index');

    //proyek

        //judul
        Route::get('/proyek/judul', 'ProyekJudulController@index')->name('proyek.judul.index');

        //kelompok
        Route::get('/proyek/kelompok', 'ProyekKelompokController@index')->name('proyek.kelompok.index');

        //undangan
        Route::get('/proyek/undangan', 'ProyekUndanganController@index')->name('proyek.undangan.index');

        //informasi
        Route::get('/proyek/informasi', 'ProyekInformasiController@index')->name('proyek.informasi.index');


    //laporan
    Route::get('/laporan', 'Laporan\LaporanController@index')->name('laporan.index');
    Route::get('/laporan/tambah','Laporan\LaporanController@create')->name('laporan.tambah');

    //pencapaian
    Route::get('/pencapaian/tambah','PencapaianController@create')->name('pencapaian.tambah');
    Route::post('/pencapaian/tambah/{id}','PencapaianController@store')->name('pencapaian.store');





// DOSEN

Route::resources([

    'kelasproyek'       => 'KelasProyekController',
    'periode'           => 'PeriodeController',
    'dosen'             => 'DosenController',
    'mahasiswa'         => 'MahasiswaController',
    'proyek'            =>  'ProyekController',

]);






