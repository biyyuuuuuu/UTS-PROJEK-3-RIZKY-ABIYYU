<?php

use App\Http\Controllers\siswaController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\guruController;
use App\Http\Controllers\Mata_PelajaranController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\JadwalPelajaranController;
use App\Http\Controllers\AbsensiController;
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
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


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

// Route::resource('/mata_pelajaran', Mata_Pelajaran::class);
