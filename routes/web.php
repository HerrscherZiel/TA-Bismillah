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
//Auth::logout();

Route::prefix('mahasiswa')->group(function (){
    Route::get('/login', 'MahasiswaAuthController@showLoginForm')->name('mahasiswa.login');
    Route::post('/login', 'MahasiswaAuthController@login')->name('mahasiswa.login.post');
    Route::get('/', 'DashboardController@index')->name('mahasiswa.dashboard');
});

Route::post('mahasiswa-logout', 'MahasiswaAuthController@logout')->name('mahasiswa.logout');


Route::get('/home', 'HomeController@index')->name('home');

//MAHASISWA

    //dashboard
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/detailProject', 'DashboardController@detailProject')->name('dashboard.detailProject');

//Route::group(['middleware'=>'mahasiswa'], function() {
//    Route::get('/teacher/home', 'Teacher\HomeController@index');

    //profile
    Route::get('/profileMahasiswa', 'ProfileController@index')->name('profile.index');

    //proyek mahasiswa

        Route::resources([

            'proyekmahasiswa'       => 'ProyekMahasiswaController',

        ]);


        //judul
        Route::get('/proyek/judul', 'ProyekJudulController@index')->name('proyek.judul.index');

        //kelompok
        Route::get('/proyek/kelompok', 'ProyekKelompokController@index')->name('proyek.kelompok.index');

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



// DOSEN

Route::resources([

    'proyek'            =>  'ProyekController',
    'kelompokbimbingan' =>  'KelompokBimbinganController',



]);

Route::get('/profileDosen', 'ProfileController@indexDosen')->name('profilDosen.index');
Route::get('/proyekDosen', 'ProyekController@indexDosen')->name('proyekDosen.index');
Route::get('/laporanDosen', 'Laporan\LaporanController@indexDosen')->name('laporanDosen.index');
Route::get('/laporan/detail','Laporan\LaporanController@show')->name('laporan.show');


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





