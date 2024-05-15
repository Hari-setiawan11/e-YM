<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataDonasiController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\JenisArsipController;
use App\Http\Controllers\BuktiDonasiController;
use App\Http\Controllers\KontenProgramController;
use App\Http\Controllers\DistribusiBarangController;
use App\Http\Controllers\KontenPenyaluranController;
use App\Http\Controllers\Administrator\Dashboard\DashboardController;

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


Route::middleware('guest')->group( function() {
    Route::get('auth',[AuthController::class, 'index'])->name('auth');
    Route::post('login',[AuthController::class, 'login'])->name('login');
    Route::get('register',[AuthController::class, 'register'])->name('register');
    Route::post('registration',[AuthController::class, 'registration'])->name('registration');
});

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::prefix('apps')->middleware('auth')->group( function() {
    Route::get('dashboard',[DashboardController::class, 'index'])->name('apps.dashboard')->middleware('can:read-dashboard');

    //manajemen distribusi
    Route::get('/distribusi/view',[DistribusiController::class, 'index'])->name('index.view.distribusi');
    Route::get('/distribusi/create',[DistribusiController::class, 'create'])->name('index.create.distribusi');
    Route::post('/distribusi/store',[DistribusiController::class, 'store'])->name('index.store.distribusi');
    Route::get('/distribusi/{id_distribusi}/edit',[DistribusiController::class, 'edit'])->name('index.edit.distribusi');
    Route::put('/distribusi/{id_distribusi}/update',[DistribusiController::class, 'update'])->name('index.update.distribusi');
    Route::get('/distribusi/{id_distribusi}/destroy',[DistribusiController::class, 'destroy'])->name('index.destroy.distribusi');

    //manajemen distribusi_barang
    Route::get('/distribusi_barang/view/{id_distribusi}',[DistribusiBarangController::class, 'index'])->name('index.view.distribusibarang');
    Route::get('/distribusi_barang/create/{id_distribusi}',[DistribusiBarangController::class, 'create'])->name('index.create.distribusibarang');
    Route::post('/distribusi_barang/store/{id_distribusi}',[DistribusiBarangController::class, 'store'])->name('index.store.distribusibarang');
    Route::get('/distribusi_barang/destroy/{id_distribusi}',[DistribusiBarangController::class, 'destroy'])->name('index.destroy.distribusibarang');

    //manajemen program
    Route::get('/program/view',[ProgramController::class, 'index'])->name('index.view.program');
    Route::get('/program/create',[ProgramController::class, 'create'])->name('index.create.program');
    Route::post('/program/store',[ProgramController::class, 'store'])->name('index.store.program');
    Route::get('/program/{id_program}/edit',[ProgramController::class, 'edit'])->name('index.edit.program');
    Route::put('/program/{id_program}/update',[ProgramController::class, 'update'])->name('index.update.program');
    Route::get('/program/{id_program}/destroy',[ProgramController::class, 'destroy'])->name('index.destroy.program');

    //manajemen arsip
    Route::get('/arsip/view',[ArsipController::class, 'index'])->name('index.view.arsip');
    Route::get('/arsip/create',[ArsipController::class, 'create'])->name('index.create.arsip');
    Route::post('/arsip/store',[ArsipController::class, 'store'])->name('index.store.arsip');
    Route::get('/arsip/{id}/edit',[ArsipController::class, 'edit'])->name('index.edit.arsip');
    Route::put('/arsip/{id}/update',[ArsipController::class, 'update'])->name('index.update.arsip');
    Route::get('/arsip/{id}/destroy',[ArsipController::class, 'destroy'])->name('index.destroy.arsip');

    //form data donasi(guest)
    Route::get('/donasi/form',[DonasiController::class, 'index'])->name('form.view.donasi');

    //manaemen data_donasi
    Route::get('/data_donasi/view',[DataDonasiController::class, 'index'])->name('index.view.datadonasi');
    Route::get('/data_donasi/create',[DataDonasiController::class, 'create'])->name('index.create.datadonasi');
    Route::post('/data_donasi/store',[DataDonasiController::class, 'store'])->name('index.store.datadonasi');
    Route::get('/data_donasi/{id}/edit',[DataDonasiController::class, 'edit'])->name('index.edit.datadonasi');
    Route::put('/data_donasi/{id}/update',[DataDonasiController::class, 'update'])->name('index.update.datadonasi');
    Route::delete('/data_donasi/{id}/destroy',[DataDonasiController::class, 'destroy'])->name('index.destroy.datadonasi');

    // Route::get('/datadonasi/{id}/destroy', [DataDonasiController::class, 'destroy'])->name('destroy.datadonasi');

    //manajemen bukti_donasi
    Route::get('/bukti_donasi/view',[BuktiDonasiController::class, 'index'])->name('index.view.bukti');
    Route::get('/bukti_donasi/create',[BuktiDonasiController::class, 'create'])->name('index.create.bukti');
    Route::post('/bukti_donasi/store',[BuktiDonasiController::class, 'store'])->name('index.store.bukti');

    //profile
    Route::get('/profile/view',[ProfileController::class, 'index'])->name('index.view.profile');

    //manajemen jenis arsip
    Route::get('/jenis_arsip/index',[JenisArsipController::class, 'index'])->name('index.view');
    Route::get('/jenis_arsip/create',[JenisArsipController::class, 'create'])->name('index.create');
    Route::post('/jenis_arsip/store',[JenisArsipController::class, 'store'])->name('index.store');
    Route::get('/jenis_arsip/{id_jenisArsip}/edit',[JenisArsipController::class, 'edit'])->name('index.edit');
    Route::put('/jenis_arsip/{id_jenisArsip}/update',[JenisArsipController::class, 'update'])->name('index.update');
    Route::get('/jenis_arsip/{id_jenisArsip}/destroy',[JenisArsipController::class, 'destroy'])->name('index.destroy');

    //manajemen data_barang
    Route::get('/data_barang/index',[DataBarangController::class, 'index'])->name('index.view.databarang');
    Route::get('/data_barang/create',[DataBarangController::class, 'create'])->name('index.create.databarang');
    Route::post('/data_barang/store',[DataBarangController::class, 'store'])->name('index.store.databarang');
    Route::get('/data_barang/{id_dataBarang}/edit',[DataBarangController::class, 'edit'])->name('index.edit.databarang');
    Route::put('/data_barang/{id_dataBarang}/update',[DataBarangController::class, 'update'])->name('index.update.databarang');
    Route::get('/data_barang/{id_dataBarang}/destroy',[DataBarangController::class, 'destroy'])->name('index.destroy.databarang');

    //cetak lpj
    Route::get('/cetak/{distribusi_id}', [DistribusiBarangController::class, 'cetakPDF'])->name('cetak.pdf');

    //konten penyaluran
    Route::get('/konten_penyaluran/index',[KontenPenyaluranController::class, 'index'])->name('index.view.penyaluran');
    Route::get('/konten_penyaluran/create',[KontenPenyaluranController::class, 'create'])->name('index.create.penyaluran');
    Route::post('/konten_penyaluran/store',[KontenPenyaluranController::class, 'store'])->name('index.store.penyaluran');
    Route::get('/konten_penyaluran/{id}/edit',[KontenPenyaluranController::class, 'edit'])->name('index.edit.penyaluran');
    Route::put('/konten_penyaluran/{id}/update',[KontenPenyaluranController::class, 'update'])->name('index.update.penyaluran');
    Route::get('/konten_penyaluran/{id}/destroy',[KontenPenyaluranController::class, 'destroy'])->name('index.destroy.penyaluran');

    //konten program
    Route::get('/konten_program/index',[KontenProgramController::class, 'index'])->name('index.view.kprogram');
    Route::get('/konten_program/create',[KontenProgramController::class, 'create'])->name('index.create.kprogram');
    Route::post('/konten_program/store',[KontenProgramController::class, 'store'])->name('index.store.kprogram');
    Route::get('/konten_program/{id}/edit',[KontenProgramController::class, 'edit'])->name('index.edit.kprogram');
    Route::put('/konten_program/{id}/update',[KontenProgramController::class, 'update'])->name('index.update.kprogram');
    Route::get('/konten_program/{id}/destroy',[KontenProgramController::class, 'destroy'])->name('index.destroy.kprogram');

    //logout
    Route::get('logout',[AuthController::class, 'logout'])->name('logout');
});