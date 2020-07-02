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
    Route::get('/proyek/kelompok/show/{id}', 'KelompokProyekController@showMahasiswa')->name('mahasiswa.kelompok.proyek.show');
    Route::delete('/proyek/kelompok/{id}', 'KelompokProyekController@destroy')->name('mahasiswa.kelompok.proyek.destroy');


    //Anggota Kelompok
    Route::post('/anggota', 'AnggotaKelompokController@store')->name('anggota.kelompok.store');
    Route::delete('/anggota/{id}', 'AnggotaKelompokController@destroy')->name('anggota.kelompok.destroy');
    Route::match(['put', 'patch'], '/anggota-kelompok/update/{id}','AnggotaKelompokController@update')->name('anggota.kelompok.update');

    //ProyekPilihan
    Route::post('/proyek-pilihan', 'ProyekPilihanController@store')->name('proyek.pilihan.store');
    Route::match(['put', 'patch'], '/proyek-pilihan/update/{id}','ProyekPilihanController@update')->name('proyek.pilihan.update');


        //judul
        Route::get('/proyek/judul', 'ProyekJudulController@index')->name('proyek.judul.index');

    //undangan
    Route::get('/undangan', 'UndanganController@index')->name('undangan.index');
    Route::get('/undangan/detail/{id}', 'UndanganController@show')->name('undangan.show');

        //informasi
        Route::get('/proyek/informasi', 'ProyekInformasiController@index')->name('proyek.informasi.index');


    //laporan
    Route::get('/laporan', 'LaporanController@indexMahasiswa')->name('laporan.mahasiswa.index');
    Route::get('/laporan/index/{id}', 'LaporanController@indexLaporanMahasiswa')->name('laporanindex.mahasiswa.index');
    Route::get('/laporan/detail/{id}', 'LaporanController@showMahasiswa')->name('laporandetail.mahasiswa.index');
    Route::post('/laporan', 'LaporanController@store')->name('laporan.store');
    Route::match(['put', 'patch'], '/laporan-proyek/update/{id}','LaporanController@update')->name('laporan.proyek.update');
    Route::delete('/laporan/{id}', 'LaporanController@destroy')->name('laporan.destroy');

    //pencapaian
    Route::post('/pencapaian','PencapaianController@store')->name('pencapaian.store');
    Route::match(['put', 'patch'], '/pencapaian/update/{id}','PencapaianController@update')->name('pencapaian.update');
    Route::delete('/pencapaian/{id}', 'PencapaianController@destroy')->name('pencapaian.destroy');

    //agendaselanjutnya
    Route::post('/agendaselanjutnya','AgendaSelanjutnyaController@store')->name('agendaselanjutnya.store');
    Route::match(['put', 'patch'], '/agendaselanjutnya/update/{id}','AgendaSelanjutnyaController@update')->name('agendaselanjutnya.update');
    Route::delete('/agendaselanjutnya/{id}', 'AgendaSelanjutnyaController@destroy')->name('agendaselanjutnya.destroy');

    //milestone
    Route::post('/milestone','MilestoneController@store')->name('milestone.store');
    Route::match(['put', 'patch'], '/milestone/update/{id}','MilestoneController@update')->name('milestone.update');
    Route::delete('/milestone/{id}', 'MilestoneController@destroy')->name('milestone.destroy');

    //lampiran
    // Route::get('/lampiran', 'LampiranController@upload');
    Route::post('/lampiran','LampiranController@store')->name('lampiran.store');
    Route::delete('/lampiran/{id}', 'LampiranController@destroy')->name('lampiran.destroy');



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

    'kelasproyek'       =>  'KelasProyekController',
    'periode'           =>  'PeriodeController',
    'dosen'             =>  'DosenController',
    'mahasiswa'         =>  'MahasiswaController',
    'proyek'            =>  'ProyekController',
    'admin'             =>  'AdminController',
    'usulmahasiswa'     =>  'UsulMahasiswaController',
    'mahasiswaproyek'   =>  'MahasiswaProyekController',
    'kelompokproyek'    =>  'KelompokProyekController',

]);

    //kelompokproyek
    Route::get('/kelompok/index/{idkel}/{idper}', 'KelompokProyekController@indexKelompok')->name('index.kelompok.proyek');
    Route::get('/kelompok/detail/{idkel}', 'KelompokProyekController@showAdmin')->name('admin.detail.kelompok.proyek');
    Route::match(['put', 'patch'], '/kelompok-proyek/update/{id}','KelompokProyekController@update')->name('admin.kelompok.proyek.update');


    //detailusul
    Route::get('/usul/detail/{idkel}/{idper}', 'UsulMahasiswaController@detail')->name('usul.mahasiswa.detail');
    Route::match(['put', 'patch'], '/usul-mahasiswa/update/{id}','UsulMahasiswaController@update')->name('usul.mahasiswa.update');

Route::post('/dosen/import', 'DosenController@import')->name('dosen.import');
Route::post('/mahasiswa/import', 'MahasiswaController@import')->name('mahasiswa.import');
//Route::post('/dosen/update', 'DosenController@import')->name('dosen.import');





