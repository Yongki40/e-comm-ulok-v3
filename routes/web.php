<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});
Route::get('/admin/user', [UserController::class, 'index']);
Route::get('/admin/user/lihatUser', [UserController::class, 'lihatUser']);
Route::get('/admin/user/cariUser/{nama_user?}/{paginate?}', [UserController::class, 'cariUser']);

Route::get('/admin/kategori', [KategoriController::class, 'index']);
Route::get('/admin/produk', [ProdukController::class, 'index']);
Route::post('/admin/user/TambahUser', [UserController::class, 'TambahUser']);
Route::post('/admin/user/TambahKategori', [KategoriController::class, 'TambahKategori']);
