<?php

use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\UserController;

/*------------------------------------------
--------------------------------------------
Public Routes
--------------------------------------------
--------------------------------------------*/
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/not-found', [ErrorController::class, 'notFound'])->name('not-found');
Route::get('/redirect-home', [HomeController::class, 'redirectToHome'])->name('redirect.home');

Auth::routes();

// Protected routes requiring authentication
Route::middleware(['auth'])->group(function () {

    /*------------------------------------------
    --------------------------------------------
    User Routes
    --------------------------------------------
    --------------------------------------------*/
    Route::middleware(['user-access:user'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });

    /*------------------------------------------
    --------------------------------------------
    Admin Routes
    --------------------------------------------
    --------------------------------------------*/
    Route::middleware(['user-access:admin'])->group(function () {
        Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

        /* Supplier */
        Route::prefix('admin/suppliers')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\SupplierController::class, 'index'])->name('suppliers.index');
            Route::get('/create', [App\Http\Controllers\Admin\SupplierController::class, 'create'])->name('suppliers.create');
            Route::post('/', [App\Http\Controllers\Admin\SupplierController::class, 'store'])->name('suppliers.store');
            Route::get('/{id}/show', [App\Http\Controllers\Admin\SupplierController::class, 'show'])->name('suppliers.show');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\SupplierController::class, 'edit'])->name('suppliers.edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\SupplierController::class, 'update'])->name('suppliers.update');
            Route::delete('/{id}', [App\Http\Controllers\Admin\SupplierController::class, 'destroy'])->name('suppliers.destroy');
        });

        /* Status */
        Route::prefix('admin/ternak-status')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\StatusController::class, 'index'])->name('status.index');
            Route::get('/create', [App\Http\Controllers\Admin\StatusController::class, 'create'])->name('status.create');
            Route::post('/', [App\Http\Controllers\Admin\StatusController::class, 'store'])->name('status.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\StatusController::class, 'edit'])->name('status.edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\StatusController::class, 'update'])->name('status.update');
            Route::delete('/{id}', [App\Http\Controllers\Admin\StatusController::class, 'destroy'])->name('status.destroy');
            Route::get('/excel', [App\Http\Controllers\Admin\StatusController::class, 'excel'])->name('status.excel');
        });

        /* Fisik */
        Route::prefix('admin/ternak-fisik')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\FisikController::class, 'index'])->name('fisik.index');
            Route::delete('/{id}', [App\Http\Controllers\Admin\FisikController::class, 'destroy'])->name('fisik.destroy');
        });

        /* Kondisi */
        Route::prefix('admin/ternak-kondisi')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\KondisiController::class, 'index'])->name('kondisi.index');
            Route::delete('/{id}', [App\Http\Controllers\Admin\KondisiController::class, 'destroy'])->name('kondisi.destroy');
        });

        /* Tipe */
        Route::prefix('admin/ternak-tipe')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\TipeController::class, 'index'])->name('tipe.index');
            Route::get('/create', [App\Http\Controllers\Admin\TipeController::class, 'create'])->name('tipe.create');
            Route::post('/', [App\Http\Controllers\Admin\TipeController::class, 'store'])->name('tipe.store');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\TipeController::class, 'edit'])->name('tipe.edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\TipeController::class, 'update'])->name('tipe.update');
            Route::delete('/{id}', [App\Http\Controllers\Admin\TipeController::class, 'destroy'])->name('tipe.destroy');
            Route::get('/excel', [App\Http\Controllers\Admin\TipeController::class, 'excel'])->name('tipe.excel');
        });

        /* Program */
        Route::prefix('admin/ternak-program')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ProgramController::class, 'index'])->name('program.index');
            Route::delete('/{id}', [App\Http\Controllers\Admin\ProgramController::class, 'destroy'])->name('program.destroy');
            Route::get('/excel', [App\Http\Controllers\Admin\ProgramController::class, 'excel'])->name('program.excel');
        });

        /* Kandang */
        Route::prefix('admin/kandang')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\KandangController::class, 'index'])->name('kandang.index');
            Route::delete('/{id}', [App\Http\Controllers\Admin\KandangController::class, 'destroy'])->name('kandang.destroy');
        });

        /* Reproduksi */
        Route::prefix('admin/ternak-reproduksi')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\ReproduksiController::class, 'index'])->name('reproduksi.index');
            Route::delete('/{id}', [App\Http\Controllers\Admin\ReproduksiController::class, 'destroy'])->name('reproduksi.destroy');
        });

        /* Kesehatan */
        Route::prefix('admin/ternak-kesehatan')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\KesehatanController::class, 'index'])->name('kesehatan.index');
            Route::delete('/{id}', [App\Http\Controllers\Admin\KesehatanController::class, 'destroy'])->name('kesehatan.destroy');
            Route::get('/excel', [App\Http\Controllers\Admin\KesehatanController::class, 'excel'])->name('kesehatan.excel');
        });

        /* Hewan */
        Route::prefix('admin/hewan')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\HewanController::class, 'index'])->name('hewan.index');
            Route::get('/create', [App\Http\Controllers\Admin\HewanController::class, 'create'])->name('hewan.create');
            Route::post('/', [App\Http\Controllers\Admin\HewanController::class, 'store'])->name('hewan.store');
            Route::get('/{id}/show', [App\Http\Controllers\Admin\HewanController::class, 'show'])->name('hewan.show');
            Route::get('/{id}/edit', [App\Http\Controllers\Admin\HewanController::class, 'edit'])->name('hewan.edit');
            Route::put('/{id}', [App\Http\Controllers\Admin\HewanController::class, 'update'])->name('hewan.update');
            Route::delete('/{id}', [App\Http\Controllers\Admin\HewanController::class, 'destroy'])->name('hewan.destroy');
            Route::get('/detail/{id}', [App\Http\Controllers\Admin\HewanController::class, 'getDetailData']);
            Route::get('/excel', [App\Http\Controllers\Admin\HewanController::class, 'excel'])->name('hewan.excel');
        });

        /* Download Gambar */
        Route::get('/download-image/{namafile}', [App\Http\Controllers\Admin\HewanController::class, 'downloadGambar'])->name('download.gambar');

          /* Users */
        Route::prefix('admin/users')->group(function () {
            Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
            Route::get('/users-admin', [App\Http\Controllers\Admin\UserController::class, 'adalahAdmin'])->name('users.adalahAdmin');
            Route::delete('/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy']);
        });
    });

    /*------------------------------------------
    --------------------------------------------
    Petugas Routes
    --------------------------------------------
    --------------------------------------------*/
    Route::middleware(['user-access:executive'])->group(function () {
        Route::get('/executive/home', [HomeController::class, 'executiveHome'])->name('executive.home');
    });
});