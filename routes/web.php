<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\History\SppbjHistoryController;
use App\Http\Controllers\Surat\BeritamController;
use App\Http\Controllers\Surat\SkbmController;
use App\Http\Controllers\Surat\SpmmController;
use App\Http\Controllers\Surat\SppbjmController;
use App\Http\Controllers\Surat\VerspmmController;

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
    Route::get('/karyawan/cetak', 'Admin\KaryawanController@cetak');
    Route::resource('/karyawan', 'Admin\KaryawanController');
    Route::resource('/mataanggaran', 'Admin\MataAnggaranController');
    Route::resource('/roles', 'Admin\RoleController');
    Route::resource('/users', 'Admin\UserController');

    // Satuan, Jabatan, Divisi
    Route::resource('/satuan', 'Admin\SatuanController');
    Route::post('/satuan/tambah', 'Admin\SatuanController@tambahSatuan');
    Route::resource('/jabatan', 'Admin\JabatanController');
    Route::post('/jabatan/tambah', 'Admin\JabatanController@tambahJabatan');
    Route::resource('/divisi', 'Admin\DivisiController');
    Route::post('/divisi/tambah', 'Admin\DivisiController@tambahDivisi');
    // --

    Route::post('/berita/tambah', 'Admin\BeritaController@tambahBarang');
    Route::get('/berita/{berita}/hapus', 'Admin\BeritaController@hapusBarang');

    // Histori
    Route::resource('/sppbjhistori', 'History\SppbjHistoryController');
    Route::resource('/skbhistori', 'History\SkbHistoryController');
    Route::resource('/beritahistori', 'History\BeritaHistoryController');
    Route::resource('/spmhistori', 'History\SpmHistoryController');
    Route::resource('/verspmhistori', 'History\VerspmHistoryController');
    // --


    //  Surat Manual Route
    Route::resource('/surat', 'Surat\SuratController');
    Route::resource('/sppbjm', 'Surat\SppbjmController');
    Route::resource('/skbm', 'Surat\SkbmController');
    Route::resource('/beritam', 'Surat\BeritamController');
    Route::resource('/spmm', 'Surat\SpmmController');
    Route::resource('/verspmm', 'Surat\VerspmmController');
    // --

    // Barang sppbj manual
    Route::post('/sppbjm/tambah', 'Surat\SppbjmController@tambahBarang');
    Route::get('/sppbjm/{sppbjm}/hapus', 'Surat\SppbjmController@hapusBarang');
    // --


    // Barang berita manual
    Route::post('/beritam/tambah', 'Surat\BeritamController@tambahBarang');
    Route::get('/beritam/{beritam}/hapus', 'Surat\BeritamController@hapusBarang');
    // --

    // Barang skb manual
    Route::post('/skbm/tambah', 'Surat\SkbmController@tambahBarang');
    Route::get('/skbm/{skbm}/hapus', 'Surat\SkbmController@hapusBarang');
    // --

    //export excel
    Route::get('file-export', [KaryawanController::class, 'fileExport'])->name('file-export');
    Route::get('file-exportSppbj', [SppbjHistoryController::class, 'fileExport'])->name('file-exportSppbj');
    Route::get('file-exportVerspmM', [VerspmmController::class, 'fileExport'])->name('file-exportVerspmM');
    Route::get('file-exportSppbjM', [SppbjmController::class, 'fileExport'])->name('file-exportSppbjM');
    Route::get('file-exportSkbM', [SkbmController::class, 'fileExport'])->name('file-exportSkbM');
    Route::get('file-exportBeritaM', [BeritamController::class, 'fileExport'])->name('file-exportBeritaM');
    Route::get('file-exportSpmM', [SpmmController::class, 'fileExport'])->name('file-exportSpmM');
    // --

});
