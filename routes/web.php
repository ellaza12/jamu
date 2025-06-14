<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DetailGaleriController;
use App\Http\Controllers\Admin\DetailProdukController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;


Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('optimize');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return '<h1>Berhasil dibersihkan</h1>';
});

Route::get('/', function () {
    return view('landingpage.index');
});

Route::get('/', [LandingPageController::class, 'index']);

Route::get('/landingpage/detailproduk/{id}', [DetailProdukController::class, 'index'])->name('landingpage.detailproduk');

Route::get('/landingpage/detailgaleri/{id}', [DetailGaleriController::class, 'index'])->name('landingpage.detailgaleri');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin/index', [HomeController::class, 'index']);
Route::get('/admin/change', [HomeController::class, 'change']);
Route::post('/admin/change_password', [HomeController::class, 'change_password']);

//Profil
Route::prefix('admin/profil')->name('admin.profil.')->middleware('cekLevel:1,2,3')->group(function () {
    Route::get('/', [ProfilController::class, 'admin'])->name('admin');
    Route::get('/add', [ProfilController::class, 'add'])->name('add');
    Route::post('/create', [ProfilController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [ProfilController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProfilController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProfilController::class, 'delete'])->name('delete');
    Route::get('/reset/{id}', [ProfilController::class, 'reset'])->name('reset');
});

//Video
Route::prefix('admin/video')->name('admin.video.')->middleware('cekLevel:1,2,3')->group(function () {
    Route::get('/', [VideoController::class, 'admin'])->name('admin');
    Route::get('/add', [VideoController::class, 'add'])->name('add');
    Route::post('/create', [VideoController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [VideoController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [VideoController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [VideoController::class, 'delete'])->name('delete');
    Route::get('/reset/{id}', [VideoController::class, 'reset'])->name('reset');
});

//About
Route::prefix('admin/about')->name('admin.about.')->middleware('cekLevel:1,2,3')->group(function () {
    Route::get('/', [AboutController::class, 'admin'])->name('admin');
    Route::get('/add', [AboutController::class, 'add'])->name('add');
    Route::post('/create', [AboutController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AboutController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [AboutController::class, 'delete'])->name('delete');
    Route::get('/reset/{id}', [AboutController::class, 'reset'])->name('reset');
});

//Produk
Route::prefix('admin/produk')->name('admin.produk.')->middleware('cekLevel:1,2,3')->group(function () {
    Route::get('/', [ProdukController::class, 'admin'])->name('admin');
    Route::get('/add', [ProdukController::class, 'add'])->name('add');
    Route::post('/create', [ProdukController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProdukController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ProdukController::class, 'delete'])->name('delete');
    Route::get('/reset/{id}', [ProdukController::class, 'reset'])->name('reset');
});

//Blog
Route::prefix('admin/blog')->name('admin.blog.')->middleware('cekLevel:1,2,3')->group(function () {
    Route::get('/', [BlogController::class, 'admin'])->name('admin');
    Route::get('/add', [BlogController::class, 'add'])->name('add');
    Route::post('/create', [BlogController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [BlogController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [BlogController::class, 'delete'])->name('delete');
    Route::get('/reset/{id}', [BlogController::class, 'reset'])->name('reset');
});

//Kontak
Route::prefix('admin/kontak')->name('admin.kontak.')->middleware('cekLevel:1,2,3')->group(function () {
    Route::get('/', [KontakController::class, 'admin'])->name('admin');
    Route::get('/add', [KontakController::class, 'add'])->name('add');
    Route::post('/create', [KontakController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [KontakController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [KontakController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [KontakController::class, 'delete'])->name('delete');
    Route::get('/reset/{id}', [KontakController::class, 'reset'])->name('reset');
});


//Galeri
Route::prefix('admin/galeri')->name('admin.galeri.')->middleware('cekLevel:1,2,3')->group(function () {
    Route::get('/', [GaleriController::class, 'admin'])->name('admin');
    Route::get('/add', [GaleriController::class, 'add'])->name('add');
    Route::post('/create', [GaleriController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [GaleriController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [GaleriController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [GaleriController::class, 'delete'])->name('delete');
    Route::get('/reset/{id}', [GaleriController::class, 'reset'])->name('reset');
});


//Kategori
Route::prefix('admin/kategori')->name('admin.kategori.')->middleware('cekLevel:1,2,3')->group(function () {
    Route::get('/', [KategoriController::class, 'admin'])->name('admin');
    Route::get('/add', [KategoriController::class, 'add'])->name('add');
    Route::post('/create', [KategoriController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [KategoriController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [KategoriController::class, 'delete'])->name('delete');
    Route::get('/reset/{id}', [KategoriController::class, 'reset'])->name('reset');
});



//Artikel
Route::prefix('admin/artikel')->name('admin.artikel.')->middleware('cekLevel:1,2,3')->group(function () {
    Route::get('/', [ArtikelController::class, 'admin'])->name('admin');
    Route::get('/add', [ArtikelController::class, 'add'])->name('add');
    Route::post('/create', [ArtikelController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [ArtikelController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ArtikelController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ArtikelController::class, 'delete'])->name('delete');
    Route::get('/reset/{id}', [ArtikelController::class, 'reset'])->name('reset');
});