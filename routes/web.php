<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dimasController;
use App\Http\Controllers\masyarakatController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\autenController;
use PharIo\Manifest\AuthorElementCollection;

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

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/home', [dimasController::class, 'index']);


Route::get('login', [autenController::class, 'create'])->name('login');
Route::post('login', [autenController::class, 'login']);

Route::get('petugas', [petugasController::class, 'petugas']);

//Route::post('regispetugas', [petugasController::class, 'proses']);

Route::get('/regispetugas', [petugasController::class, 'regispetugas']);

Route::get('/regispetugas', [petugasController::class, 'prosesregis']);

Route::get('/loginpetugas', [petugasController::class, 'logpetugas']);

Route::post('loginpetugas', [petugasController::class, 'proses']);

Route::get('/logout', [autenController::class, 'logout']);

Route::get('regis', [autenController::class, 'register']);

Route::post('regis', [autenController::class, 'store']);

Route::middleware(['auth'])->group(function () {
  Route::get('isi', function(){
  return view('isi');
});
  Route::get('/home', [dimasController::class, 'index']);
  Route::post('/isi', [dimasController::class, 'isi_pengaduan']);
  Route::get('/detail-pengaduan/{id}', [dimasController::class, 'detail_']);
  Route::put('/update/{id}', [dimasController::class, 'update'])->name('update');
  Route::get('/update-pengaduan/{id}', [dimasController::class, 'edit']);
  Route::get('/hapus-pengaduan/{id}', [dimasController::class, 'delete']);
  Route::get('/hapus/{id}', [dimasController::class, 'hapus']);
  Route::get('loginmasyarakat', [masyarakatController::class, 'Login']);  
  Route::get('masyarakat', [masyarakatController::class, 'rakyat']);
});

Route::middleware(['cekPetugas'])->group(function () {
  Route::get('/homepetugas', [petugasController::class, 'hom']);
  Route::get('/laporan', [petugasController::class, 'laporan']);
});

Route::get('/tanggap-pengaduan/{id}', [petugasController::class, 'tanggap']);
Route::put('/tanggap-pengaduans/{id}', [petugasController::class, 'tanggap'])->name('tanggap');

Route::get('/detail-petugas/{id}', [petugasController::class, 'detail_pengaduan']);

Route::get('/petugas/logout', [petugasController::class, 'logoutpetugas']);

//Route::get('/isi', function () {
  //  return view('isi');
//});

//Route::get('/login', function () {
  //  return view('login');
//});

