<?php

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

Route::get('/', function () {
    return view('pages.test');
});

Route::prefix('/admin')->group(function (){
    Route::resource('karyawan','KaryawanController');
    Route::get('json','KaryawanController@json')->name('karyawan.json');
    Route::resource('jabatan','JabatanController');
    Route::resource('pendidikan', 'PendidikanController');
    Route::resource('status', 'StatusController');
});