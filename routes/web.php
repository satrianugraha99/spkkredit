<?php

use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\LaporanController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



// Auth::routes();

// Route::get('/', function(){
//     return view('home');
// });


Route::get('/', 'AuthsController@login')->name('login');
Route::post('/postlogin', 'AuthsController@postlogin');
Route::get('/logout', 'AuthsController@logout');

Route::get('/register', 'AuthsController@register')->name('register')->middleware('guest');
Route::post('/postregister', 'AuthsController@postregister');

Route::group(['middleware' => ['auth', 'checkRole:admin,nasabah,kepalalpd']], function () {
    Route::get('/dashboard', 'DashboardController@index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/alur_pengajuan', function () {
        return view('alur_pengajuan.index');
    });
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function () {
    Route::get('/nasabah/data_nasabah', 'NasabahController@index')->name('nasabah.index');
    Route::get('/nasabah/data_nasabah/edit/{id}', 'NasabahController@edit');
    Route::post('/nasabah/data_nasabah/update/{id}', 'NasabahController@update');
    Route::get('/nasabah/status_peminjaman', 'PengajuanController@status_peminjaman');
    Route::post('/nasabah/status_peminjaman', 'PengajuanController@update_status_peminjaman')->name('update.status_peminjaman');
    Route::get('/nasabah/data_nasabah/edit/{id}', 'NasabahController@edit');
    Route::post('/nasabah/data_nasabah/update/{id}', 'NasabahController@update');
    Route::get('/kriteria', 'KriteriaController@index')->name('kriteria.index');
    Route::post('/kriteria/tambah', 'KriteriaController@create');
    Route::get('/kriteria/edit/{id}', 'KriteriaController@edit');
    Route::post('/kriteria/update/{id}', 'KriteriaController@update');
    Route::get('/kriteria/hapus/{id}', 'KriteriaController@destroy');
    Route::get('/perhitungan', 'PerhitunganController@index');
    Route::post('update-status-perhitungan', 'PerhitunganController@updateStatus')->name('update.status');
});

Route::group(['middleware' => ['auth', 'checkRole:kepalalpd']], function () {
    Route::get('/laporan_pengajuan', 'LaporanController@index');

    // Route::group('chart', function () {
    Route::get('chart/pendapatan', 'ChartController@chart_pendapatan')->name('chart.pendapatan');
    // });
});

Route::group(['middleware' => ['auth', 'checkRole:admin,kepalalpd']], function () {
    Route::get('/nasabah/status_pengajuan', 'StatusPengajuanController@index');
});

Route::group(['middleware' => ['auth', 'checkRole:nasabah']], function () {
    Route::get('/nasabah/pengajuan', 'PengajuanController@index')->name('pengajuan.index');
    Route::post('/pengajuandetail', 'PengajuanController@detail')->name('pengajuan.detail');
    Route::get('/nasabah/riwayat_pengajuan', 'PengajuanController@riwayat')->name('pengajuan.riwayat');
    Route::post('/pengajuantambah', 'PengajuanController@create');
    Route::get('/profil', 'ProfilController@index')->name('profil');
    Route::get('/profil/editBiodata/{id}', 'ProfilController@editBiodata');
    Route::post('/profil/updateBiodata/', 'ProfilController@updateBiodata');
    Route::get('/profil/editProfill/{id}', 'ProfilController@editProfil');
    Route::post('/profil/updateProfil/', 'ProfilController@updateProfil');
});
