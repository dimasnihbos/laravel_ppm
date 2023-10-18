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

Route::get('isi', function(){
  return view('isi');
});

Route::post('/isi', [dimasController::class, 'isi_pengaduan']);

Route::get('masyarakat', [masyarakatController::class, 'rakyat']);

Route::get('petugas', [petugasController::class, 'petugas']);

Route::get('loginmasyarakat', [masyarakatController::class, 'Login']);

Route::get('logpetugas', [petugasController::class, 'loginpetugas']);

Route::get('/hapus/{id}', [dimasController::class, 'hapus']);

Route::get('/detail-pengaduan/{id}', [dimasController::class, 'detail_']);

Route::put('/update/{id}', [dimasController::class, 'update'])->name('update');

Route::get('/update-pengaduan/{id}', [dimasController::class, 'edit']);

Route::get('/hapus-pengaduan/{id}', [dimasController::class, 'delete']);

Route::get('login', [autenController::class, 'create']);

Route::post('login', [autenController::class, 'login']);

Route::get('logout', [autenController::class, 'logout']);

//Route::middleware(['auth'])->group(function (){
  Route::get('/home', [dimasController::class, 'index']);
//});

Route::get('regis', [autenController::class, 'register']);

Route::post('regis', [autenController::class, 'store']);
//Route::get('/isi', function () {
  //  return view('isi');
//});

//Route::get('/login', function () {
  //  return view('login');
//});

