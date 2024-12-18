<?php

use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\UserController;

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');


// Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/not-found', [ErrorController::class, 'notFound'])->name('not-found');
Route::get('/redirect-home', [HomeController::class, 'redirectToHome'])->name('redirect.home');


Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');


    // Supplier
    Route::get('admin/suppliers', [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('admin/suppliers/create', [App\Http\Controllers\Admin\SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('admin/suppliers', [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('admin/suppliers/{id}/show', [App\Http\Controllers\Admin\SupplierController::class, 'show'])->name('suppliers.show');
    Route::get('admin/suppliers/{id}/edit', [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('admin/suppliers/{id}', [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('admin/suppliers/{id}', [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('suppliers.destroy');

    // status
    Route::get('admin/ternak-status', [App\Http\Controllers\Admin\StatusController::class, 'index'])->name('status.index');
    Route::get('admin/ternak-status/{id}/edit', [App\Http\Controllers\Admin\StatusController::class, 'edit'])->name('status.edit');
    Route::put('admin/ternak-status/{id}', [App\Http\Controllers\Admin\StatusController::class, 'update'])->name('status.update');
    Route::post('admin/ternak-status', [App\Http\Controllers\Admin\StatusController::class, 'store'])->name('status.store');
    Route::get('admin/ternak-status/create', [App\Http\Controllers\Admin\StatusController::class, 'create'])->name('status.create');
    Route::get('admin/ternak-status/excel', [App\Http\Controllers\Admin\StatusController::class, 'excel'])->name('status.excel');
    Route::delete('admin/ternak-status/{id}', [App\Http\Controllers\Admin\StatusController::class, 'destroy'])->name('status.destroy');

    // fisik
    Route::get('admin/ternak-fisik', [App\Http\Controllers\Admin\FisikController::class, 'index'])->name('fisik.index');
    Route::delete('admin/ternak-fisik/{id}', [App\Http\Controllers\Admin\FisikController::class, 'destroy'])->name('fisik.destroy');

    // Kondisi
    Route::get('admin/ternak-kondisi', [App\Http\Controllers\Admin\KondisiController::class, 'index'])->name('kondisi.index');
    Route::delete('admin/ternak-kondisi/{id}', [App\Http\Controllers\Admin\KondisiController::class, 'destroy'])->name('kondisi.destroy');

    // Tipe
    Route::get('admin/ternak-tipe', [App\Http\Controllers\Admin\TipeController::class, 'index'])->name('tipe.index');
    Route::get('admin/ternak-tipe/{id}/edit', [App\Http\Controllers\Admin\TipeController::class, 'edit'])->name('tipe.edit');
    Route::put('admin/ternak-tipe/{id}', [App\Http\Controllers\Admin\TipeController::class, 'update'])->name('tipe.update');
    Route::post('admin/ternak-tipe', [App\Http\Controllers\Admin\TipeController::class, 'store'])->name('tipe.store');
    Route::get('admin/ternak-tipe/create', [App\Http\Controllers\Admin\TipeController::class, 'create'])->name('tipe.create');
    Route::delete('admin/ternak-tipe/{id}', [App\Http\Controllers\Admin\TipeController::class, 'destroy'])->name('tipe.destroy');
    Route::get('admin/ternak-tipe/excel', [App\Http\Controllers\Admin\TipeController::class, 'excel'])->name('tipe.excel');

    // Program
    Route::get('admin/ternak-program', [App\Http\Controllers\Admin\ProgramController::class, 'index'])->name('program.index');
    Route::delete('admin/ternak-program/{id}', [App\Http\Controllers\Admin\ProgramController::class, 'destroy'])->name('program.destroy');
    Route::get('admin/ternak-program/excel', [App\Http\Controllers\Admin\ProgramController::class, 'excel'])->name('program.excel');

    // kandang
    Route::get('admin/kandang', [App\Http\Controllers\Admin\KandangController::class, 'index'])->name('kandang.index');
    Route::delete('admin/kandang/{id}', [App\Http\Controllers\Admin\KandangController::class, 'destroy'])->name('kandang.destroy');

    // reproduksi
    Route::get('admin/ternak-reproduksi', [App\Http\Controllers\Admin\ReproduksiController::class, 'index'])->name('reproduksi.index');
    Route::delete('admin/ternak-reproduksi/{id}', [App\Http\Controllers\Admin\ReproduksiController::class, 'destroy'])->name('reproduksi.destroy');

    // kesehatan
    Route::get('admin/ternak-kesehatan', [App\Http\Controllers\Admin\KesehatanController::class, 'index'])->name('kesehatan.index');
    Route::delete('admin/ternak-kesehatan/{id}', [App\Http\Controllers\Admin\KesehatanController::class, 'destroy'])->name('kesehatan.destroy');
    Route::get('admin/ternak-kesehatan/excel', [App\Http\Controllers\Admin\KesehatanController::class, 'excel'])->name('kesehatan.excel');

    // hewan
    Route::get('admin/hewan', [App\Http\Controllers\Admin\HewanController::class, 'index'])->name('hewan.index');
    Route::get('admin/hewan/{id}/show', [App\Http\Controllers\Admin\HewanController::class, 'show'])->name('hewan.show');
    Route::get('admin/hewan/{id}/edit', [App\Http\Controllers\Admin\StatusController::class, 'edit'])->name('hewan.edit');
    // Route::put('admin/hewan/{id}', [App\Http\Controllers\Admin\HewanController::class, 'update'])->name('hewan.update');
    Route::post('admin/hewan', [App\Http\Controllers\Admin\HewanController::class, 'store'])->name('hewan.store');
    Route::get('admin/hewan/create', [App\Http\Controllers\Admin\HewanController::class, 'create'])->name('hewan.create');
    Route::get('admin/hewan/excel', [App\Http\Controllers\Admin\HewanController::class, 'excel'])->name('hewan.excel');
    Route::delete('admin/hewan/{id}', [App\Http\Controllers\Admin\HewanController::class, 'destroy'])->name('hewan.destroy');
    Route::get('/admin/hewan/{id}', [App\Http\Controllers\Admin\HewanController::class, 'getData']);
    Route::get('/admin/hewan/detail/{id}', [App\Http\Controllers\Admin\HewanController::class, 'getDetailData']);
    Route::get('/admin/hewan/{id}/edit', [App\Http\Controllers\Admin\HewanController::class, 'edit'])->name('hewan.edit');
    Route::put('/admin/hewan/{id}', [App\Http\Controllers\Admin\HewanController::class, 'update'])->name('hewan.update');
    Route::get('admin/hewan/excel', [App\Http\Controllers\Admin\HewanController::class, 'excel'])->name('hewan.excel');
    Route::get('/download-image/{namafile}', [pp\Http\Controllers\Admin\HewanController::class, 'downloadGambar'])->name('download.gambar');
    // User List
    Route::get('admin/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);

    Route::get('admin/users/users-admin', [App\Http\Controllers\Admin\UserController::class, 'adalahAdmin'])->name('users.adalahAdmin');
    Route::delete('/users/users-admin/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:petugas'])->group(function () {

    Route::get('/petugas/home', [HomeController::class, 'petugasHome'])->name('petugas.home');
});
