<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\Mata_PelajaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('page-home.index');
});


Route::resource('/siswa', SiswaController::class);
Route::resource('/guru', GuruController::class);
Route::resource('/kelas', KelasController::class);
Route::resource('/mata_pelajaran', Mata_PelajaranController::class);
Route::resource('/jadwal', JadwalPelajaranController::class);
Route::resource('/nilai', NilaiController::class);
Route::resource('/absensi', AbsensiController::class);

Route::get('/', 'LoginController@login')->name('login');
Route::post('loginaksi', 'LoginController@loginaksi')->name('loginaksi');
Route::get('home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('logoutaksi', 'LoginController@logoutaksi')->name('logoutaksi')->middleware('auth');

