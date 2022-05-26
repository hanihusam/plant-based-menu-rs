<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main', ['title' => 'Dapatkan Rekomendasi']);
});
Route::get('/detail', function () {
    return view('detail', ['title' => 'Detail Menu']);
});
Route::get('/result', function () {
    return view('result', ['title' => 'Hasil Rekomendasi']);
});
