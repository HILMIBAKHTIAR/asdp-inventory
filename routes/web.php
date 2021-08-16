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
    Route::resource('/berita', 'Admin\SerahTerimaController');
    Route::resource('/skb', 'Admin\SkbController');
    Route::resource('/spm', 'Admin\SpmController');
    Route::resource('/verspm', 'Admin\VerspmController');
    Route::resource('/karyawan', 'Admin\karyawanController');
    Route::resource('/mataanggaran', 'Admin\MataAnggaranController');
    Route::resource('/roles', 'Admin\RoleController');
});
