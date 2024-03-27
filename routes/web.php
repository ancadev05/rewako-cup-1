<?php

use App\Http\Controllers\AdminKejurnasController;
use App\Http\Controllers\AtletController;
use App\Http\Controllers\Coba;
use App\Http\Controllers\DownloadBerkasController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
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

// Route Admin kejurnas
// Route::get('/admin-kejurnas', [AdminKejurnasController::class, 'index'])->name('admin-kejurnas');

// // Route Official
// Route::get('/official-kejurnas', [OfficialController::class, 'index'])->name('official-kejurnas');
// Route::resource('official-kejurnas/atlet', AtletController::class);

// #############################
// Route::get('/', function(){
//     return redirect()
// });

// route sebelum login - guest
Route::middleware(['guest'])->group(function () {
    // route saat mau login ke aplikasi pendaftaran
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
});
// route jika ada yang sudah login namun coba mengakses halaman login
// Route::get('/home', function(){

//     return redirect('/admin');
// });


// halaman yang bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    // halaman official
    Route::get('/official', [OfficialController::class, 'index'])->middleware('userAkses:official');
    Route::get('/official/atlet', [OfficialController::class, 'atlet'])->middleware('userAkses:official');
    Route::get('/official/download', [OfficialController::class, 'download'])->middleware('userAkses:official');

    // halaman admin kejurnas
    Route::get('/admin-kejurnas', [AdminKejurnasController::class, 'index'])->middleware('userAkses:admin-kejurnas');
    Route::get('/admin-kejurnas/user', [UserController::class, 'index'])->middleware('userAkses:admin-kejurnas');
    Route::post('/admin-kejurnas/user', [UserController::class, 'store'])->middleware('userAkses:admin-kejurnas');
    Route::post('/admin-kejurnas/atlet', [AdminKejurnasController::class, 'atlet'])->middleware('userAkses:admin-kejurnas');

    // ketika user logout
    Route::get('/logout', [SesiController::class, 'logout']);
});




// ##############################################
// fitur coba
// Route::get('fitur', [Coba::class, 'index']);


// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/rewako-cup', function () {
//     return view('official-kejurnas.login');
// });

// Route::get('/atlet/atlet-tambah', function () {
//     return view('official-kejurnas.atlet.atlet-tambah');
// });

// Route::get('/atlet/kategori', function () {
//     return view('official-kejurnas.atlet.kategori');
// });

// Download berkas
// Route::get('download/berkas', [DownloadBerkasController::class, 'index']);
// // Group route download berkas
// Route::controller(DownloadBerkasController::class)->group(function () {
//     Route::get('download/berkas', 'index');
//     Route::get('download/kwitansi', 'kwitansi');
//     Route::get('download/idcard', 'idcard');
//     Route::get('download/a-1', 'a1');
// });
