<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LogindanRegisterController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/logout', [HomeController::class, 'logout']);

Route::get('/login', [LogindanRegisterController::class, 'showLogin']);
Route::post('/login', [LogindanRegisterController::class, 'login']);
Route::get('/register', [LogindanRegisterController::class, 'showRegister']);
Route::post('/register', [LogindanRegisterController::class, 'register']);

Route::group(['middleware' => ['isAdmin']], function () {
    Route::get('/admin/user', [UserController::class, 'index']);
    Route::get('/admin/user/lihatUser', [UserController::class, 'lihatUser']);
    Route::get('/admin/user/cariUser/{nama_user?}/{paginate?}', [UserController::class, 'cariUser']);
    Route::post('/admin/user/TambahUser', [UserController::class, 'TambahUser']);
    Route::post('/admin/user/editOrDelete', [UserController::class, 'editOrDelete']);
    Route::get('/admin/user/editUser/{id}', [UserController::class, 'showEdit']);
    Route::post('/admin/user/editUser', [UserController::class, 'editUser']);

    Route::get('/admin/kategori', [KategoriController::class, 'index']);
    Route::post('/admin/kategori/TambahKategori', [KategoriController::class, 'TambahKategori']);
    Route::get('/admin/kategori/lihatKategori', [KategoriController::class, 'lihatKategori']);
    Route::get('/admin/kategori/cariKategori/{nama_kategori?}/{paginate?}', [KategoriController::class, 'cariKategori']);
    Route::post('/admin/kategori/editOrDelete', [KategoriController::class, 'editOrDelete']);
    Route::get('/admin/kategori/editKategori/{id}', [KategoriController::class, 'showEdit']);
    Route::post('/admin/kategori/editKategori', [KategoriController::class, 'editKategori']);

    Route::get('/admin/produk', [ProdukController::class, 'index']);
    Route::post('/admin/produk/TambahProduct', [ProdukController::class, 'TambahProduct']);
    Route::get('/admin/produk/lihatProduct', [ProdukController::class, 'lihatProduct']);
    Route::get('/admin/produk/cariProduct/{nama_Product?}/{paginate?}', [ProdukController::class, 'cariProduct']);
    Route::post('/admin/produk/editOrDelete', [ProdukController::class, 'editOrDelete']);
    Route::get('/admin/produk/editProduct/{id}', [ProdukController::class, 'showEdit']);
    Route::post('/admin/produk/editProduct', [ProdukController::class, 'editProduct']);
});
