<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AturanController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\DatadiriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HimpunanController;
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

/*ada halaman home */
Route::get('/login', function () {
    return view('v_login'); 
});
/* ROUTE HOME*/
/*Route::get('/',[HomeController::class,'home']);

/* ROUTE DASHBOARD*/
Route::get('/dashboard',[DashboardController::class,'index']);

/* ROUTE DASHBOARD*/
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

//halaman akses admin
Route::group(['middleware'=>'admin'], function() {
//Route::get('/search', [MahasiswaController::class, 'search'])->name('search');

// halaman kriteria//
Route::get('/kriteria',[KriteriaController::class,'index'])->name('kriteria');
Route::get('/kriteria/detail/{id_kriteria}',[KriteriaController::class,'detail']);
Route::get('/kriteria/add/',[KriteriaController::class,'add']);
Route::post('/kriteria/insert/',[AturanController::class,'insert']);
Route::get('/kriteria/detail/{id_kriteria}',[KriteriaController::class,'detail']);

//halaman Aturan //
Route::get('/aturan',[AturanController::class,'index'])->name('aturan');
Route::get('/aturan/detail/{id_aturan}',[AturanController::class,'detail']);
Route::get('/aturan/add/',[AturanController::class,'add']);
Route::post('/aturan/insert/',[AturanController::class,'insert']);
Route::get('/aturan/edit/{id_aturan}',[AturanController::class,'edit']);
Route::post('/aturan/update/{id_aturan}',[AturanController::class,'update']);
Route::get('/aturan/delete/{id_aturan}',[AturanController::class,'delete']);

//Halaman Data Himpunan 
Route::get('/himpunan',[HimpunanController::class,'index'])->name('himpunan');
Route::get('/himpunan/detail/{id_variabel}',[HimpunanController::class,'detail']);
Route::get('/himpunan/add/',[HimpunanController::class,'add']);
Route::post('/himpunan/insert/', [HimpunanController::class,'insert']);
Route::get('/himpunan/edit/{id_variabel_himpunan}',[HimpunanController::class,'edit']);
Route::post('/himpunan/update/{id_variabel_himpunan}',[HimpunanController::class,'update']);
Route::get('/himpunan/delete/{id_variabel_himpunan}',[HimpunanController::class,'delete']);


//Halaman Pengajuan 
Route::get('/pengajuan',[PengajuanController::class,'index'])->name('pengajuan');
Route::get('/pengajuan/detail/{id_pengajuan}',[PengajuanController::class,'detail']);
Route::get('/pengajuan/add/',[PengajuanController::class,'add']);
Route::post('/pengajuan/insert/',[PengajuanController::class,'insert']);
Route::get('/pengajuan/edit/{id_pengajuan}',[PengajuanController::class,'edit']);
Route::post('/pengajuan/update/{id_pengajuan}',[PengajuanController::class,'update']);
Route::get('/pengajuan/delete/{id_pengajuan}',[PengajuanController::class,'delete']);


//HALAMAN PERHITUNGAN 
Route::get('/perhitungan',[PerhitunganController::class,'index'])->name('perhitungan');
Route::get('/perhitungan/detail/{id_perhitungan}',[PerhitunganController::class,'detail']);
Route::get('/perhitungan/add/',[PerhitunganController::class,'add']);
Route::post('/perhitungan/insert/',[PerhitunganController::class,'insert']);

});


//ROUTE USER //
Route::group(['middleware'=>'user'], function() {
//halaman user
Route::get('/user',[UserController::class,'index'])->name('user');
Route::get('/user/cari',[MahasiswaController::class,'cari']);
//halaman datadiri
});