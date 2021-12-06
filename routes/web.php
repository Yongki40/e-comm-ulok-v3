<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LogindanRegisterController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishController;
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

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm']);
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm']);
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm']);
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm']);

Route::get('/shop', [ProdukController::class, 'showAll']);
Route::get('/shop/cariProduct/{nama_Product?}/{paginate?}', [ProdukController::class, 'cariProductHome']);
Route::get('/shop/detail/{id}', [ProdukController::class, 'detailProduct']);

Route::group(['middleware' => ['alreadyLogin']], function () {
    Route::get('/profile', [ProfileController::class, 'showProfile']);
    Route::post('/profile/topUp', [ProfileController::class, 'topUp']);
    Route::post('/shop/tambahkanCart', [CartController::class, 'tambahkanCart']);
    Route::get('/cart', [CartController::class, 'showCart']);
    Route::get('/cart/tambah/{id}', [CartController::class, 'plusItem']);
    Route::get('/cart/kurang/{id}', [CartController::class, 'minItem']);
    Route::get('/cart/pageCheckOut', [CartController::class, 'pageCheckOut']);
    Route::post('/cart/checkout', [CartController::class, 'checkout']);
    Route::get('/wishlist', [WishController::class, 'showWish']);
    Route::get('/wishlist/tambah/{id}', [WishController::class, 'tambahWish']);
    Route::get('/wishlist/hapus/{id}', [WishController::class, 'hapusWish']);
    Route::get('/thankYou', [CartController::class, 'thankYou']);
});

Route::get('/kategori', [KategoriController::class, 'showAll']);
Route::get('/kategori/cariKategori/{nama_Product?}/{paginate?}', [KategoriController::class, 'cariProductHome']);
Route::get('/kategori/detail/{slug}', [KategoriController::class, 'kategoriDetail']);

Route::get('/aboutUs', function () {
    return view('aboutUs');
});

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
