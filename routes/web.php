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



Auth::routes();
//Auth::logout();

//Route::get('/login', function () {
//    return view('welcome');
//});

Route::get('/login', 'HomeController@index')->name('login');




Route::prefix('dosen')->group(function (){
    Route::get('/login', 'DosenAuthController@showLoginForm')->name('dosen.login');
    Route::post('/login', 'DosenAuthController@login')->name('dosen.login.post');
    Route::get('/dashboard', 'DashboardController@indexDosen')->name('dosen.dashboard');
});

Route::prefix('admin')->group(function (){
    Route::get('/login', 'AdminAuthController@showLoginForm')->name('admin.login');
    Route::post('/login', 'AdminAuthController@login')->name('admin.login.post');
    Route::get('/dashboard', 'DashboardController@indexAdmin')->name('admin.dashboard');
});

Route::post('mahasiswa-logout', 'MahasiswaAuthController@logout')->name('mahasiswa.logout');
Route::post('dosen-logout', 'DosenAuthController@logout')->name('dosen.logout');
Route::post('admin-logout', 'AdminAuthController@logout')->name('admin.logout');


Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('mahasiswa')->group(function (){
    Route::get('/login', 'MahasiswaAuthController@showLoginForm')->name('mahasiswa.login');
    Route::post('/login', 'MahasiswaAuthController@login')->name('mahasiswa.login.post');
    Route::get('/', 'DashboardController@index')->name('mahasiswa.dashboard');

//MAHASISWA

    //dashboard
    Route::get('/dashboard', 'DashboardController@indexMahasiswa')->name('mahasiswa.dashboard.index');
    Route::get('/detailProject', 'DashboardController@detailProject')->name('dashboard.detailProject');

//Route::group(['middleware'=>'mahasiswa'], function() {
//    Route::get('/teacher/home', 'Teacher\HomeController@index');

    //profile
    Route::get('/profileMahasiswa', 'ProfileController@indexMahasiswa')->name('mahasiswa.profile.index');

    //kelompok proyek
    Route::get('/proyek/kelompok', 'KelompokProyekController@indexMahasiswa')->name('mahasiswa.kelompok.proyek');
    Route::get('/proyek/kelompok/show', 'KelompokProyekController@showMahasiswa')->name('mahasiswa.kelompok.proyek.show');



        //judul
        Route::get('/proyek/judul', 'ProyekJudulController@index')->name('proyek.judul.index');

        //kelompok
//        Route::get('/proyek/kelompok', 'ProyekKelompokController@index')->name('proyek.kelompok.index');

        //undangan
        Route::get('/undangan', 'ProyekUndanganController@index')->name('proyek.undangan.index');

        //informasi
        Route::get('/proyek/informasi', 'ProyekInformasiController@index')->name('proyek.informasi.index');


    //laporan
    Route::get('/laporan', 'Laporan\LaporanController@index')->name('laporan.index');
    Route::get('/laporan/detail','Laporan\LaporanController@create')->name('laporan.tambah');

    //pencapaian
    Route::get('/pencapaian/tambah','PencapaianController@create')->name('pencapaian.tambah');
    Route::post('/pencapaian/tambah/{id}','PencapaianController@store')->name('pencapaian.store');

//});

});

// DOSEN

Route::resources([

    'proyek'            =>  'ProyekController',
    'kelompokbimbingan' =>  'KelompokBimbinganController',
    'profile'           =>  'ProfileController',



]);

Route::get('/profileDosen', 'ProfileController@indexDosen')->name('profilDosen.index');
Route::get('/proyekDosen', 'ProyekController@indexDosen')->name('proyekDosen.index');
Route::get('/laporanDosen', 'Laporan\LaporanController@indexDosen')->name('laporanDosen.index');
Route::get('/laporan/detail','Laporan\LaporanController@show')->name('laporan.show');
//Route::match(array('PUT', 'PATCH'), "/profilDosen/{edit}", array(
//    'uses' => 'ProfileController@update',
//    'as' => 'profilDosen.update'
//));


// ADMIN

Route::resources([

    'kelasproyek'       => 'KelasProyekController',
    'periode'           => 'PeriodeController',
    'dosen'             => 'DosenController',
    'mahasiswa'         => 'MahasiswaController',
    'proyek'            =>  'ProyekController',
    'admin'             =>  'AdminController',
    'usulmahasiswa'     =>  'UsulMahasiswaController',
    'mahasiswaproyek'   =>  'MahasiswaProyekController',
    'kelompokproyek'    =>  'KelompokProyekController',

]);

Route::post('/dosen/import', 'DosenController@import')->name('dosen.import');
Route::post('/mahasiswa/import', 'MahasiswaController@import')->name('mahasiswa.import');
//Route::post('/dosen/update', 'DosenController@import')->name('dosen.import');





