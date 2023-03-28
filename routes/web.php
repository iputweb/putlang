<?php

use App\User;
use App\barang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\HistoriController;

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
    return view('welcome',['title' => 'Barang Lelang',
            'barangs' => barang::paginate(10)]);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/barang', function () {
    return view('barangs.list', [
            'title' => 'Barang Lelang',
            'barangs' => barang::paginate(10)
        ]);
})->name('barang');

Route::get('/blank', function () {
    return view('blank');
})->name('blank');

Route::middleware('auth')->group(function() {
    Route::resource('basic', BasicController::class);
    Route::resource('barangs', BarangController::class);
    Route::resource('lelang', LelangController::class);
    // Route::resource('detail', DetailController::class);
});

Route::get('/beranda', 'BerandaController@index')->name('beranda');
Route::get('/histori', 'HistoriController@index')->name('histori');
Route::get('/detail/{id}', 'DetailController@index')->name('detail');
Route::post('/detail/{id}', [DetailController::class, 'bid'])->name('bid');


