<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('/sp2bj', 'Admin\SppbjController');
    Route::resource('/berita', 'Admin\BeritaController');
    Route::resource('/skb', 'Admin\SkbController');
    Route::resource('/spm', 'Admin\SpmController');
    Route::resource('/verspm', 'Admin\VerspmController');
    Route::resource('/karyawan', 'Admin\KaryawanController');
    Route::resource('/mataanggaran', 'Admin\MataAnggaranController');
    Route::resource('/roles', 'Admin\RoleController');
    Route::resource('/users', 'Admin\UserController');

    Route::post('/berita/tambah', 'Admin\BeritaController@tambahBarang');
    Route::get('/berita/{berita}/hapus', 'Admin\BeritaController@hapusBarang');

    //  Surat Manual Route
    Route::resource('/surat', 'Surat\SuratController');
    Route::resource('/sppbjm', 'Surat\SppbjmController');
    Route::resource('/skbm', 'Surat\SkbmController');
    Route::resource('/beritam', 'Surat\BeritamController');
    Route::resource('/spmm', 'Surat\SpmmController');
    Route::resource('/verspmm', 'Surat\VerspmmController');

    // Barang sppbj manual
    Route::post('/sppbjm/tambah', 'Surat\SppbjmController@tambahBarang');
    Route::get('/sppbjm/{sppbjm}/hapus', 'Surat\SppbjmController@hapusBarang');


    // Barang berita manual
    Route::post('/beritam/tambah', 'Surat\BeritamController@tambahBarang');
    Route::get('/beritam/{beritam}/hapus', 'Surat\BeritamController@hapusBarang');

    // Barang skb manual
    Route::post('/skbm/tambah', 'Surat\SkbmController@tambahBarang');
    Route::get('/skbm/{skbm}/hapus', 'Surat\SkbmController@hapusBarang');
});
