<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenghitunganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuMakananController;
use App\Http\Controllers\RiwayatController;

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

// Route::get('/', function () {
//     return view('main', ['title' => 'Dapatkan Rekomendasi']);
// });
// Route::get('/detail', function () {
//     return view('detail', ['title' => 'Detail Menu']);
// });
// Route::get('/result', function () {
//     return view('result', ['title' => 'Hasil Rekomendasi']);
// });

// Route::get('penghitungan', [PenghitunganController::class, 'index'])->name('index');


// Route::get('/registration', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::post('/penghitungan', 'penghitungan')->name('dashboard.penghitungan');
        Route::get('/hasil', 'hasil')->name('dashboard.hasil');
        Route::get('/hasil-kosong', 'hasilKosong')->name('dashboard.hasilKosong');
    });
    //Data Menu Makanan Routes
    // Route::get('/data-menu', function () {
    //     return view('Pages.dataMenu.dataMenu-index');
    // })->name('dataMenu');

    Route::controller(MenuMakananController::class)->group(function () {
        Route::get('/data-menu', 'index')->name('dataMenu');
        Route::get('/data-menu/detail/{menu}', 'detail')->name('dataMenu.detail');
        Route::post('/data-menu/import_excel', 'import_excel')->name('import_excel');
    });


    Route::controller(RiwayatController::class)->group(function () {
        Route::get('/riwayat', 'index')->name('riwayat.index');
        Route::get('/{kombinasi}', 'detail')->name('riwayat.detail');
    });


    // Route::get('/coba', function () {
    //     return view('Pages.riwayat.riwayat-coba');
    // })->name('coba');
});
