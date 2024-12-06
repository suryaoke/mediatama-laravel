<?php

use App\Http\Controllers\backend\ArtikelController;
use App\Http\Controllers\backend\AuthorController;
use App\Http\Controllers\backend\KategoriController;
use App\Http\Controllers\backend\TagController;
use App\Http\Controllers\frontend\ArtikelController as FrontendArtikelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->get('admin/dashboard', function () {
    return view('backend.index');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// frontend //


Route::get('/', [FrontendArtikelController::class, 'index'])->name('home');
Route::get('/kategori', [FrontendArtikelController::class, 'kategori'])->name('kategori');
Route::get('/artikel/{id}', [FrontendArtikelController::class, 'detail'])->name('detail.kategori');






// CMS ADMIN//

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.all');
    Route::post('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::put('kategori/update/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('author', [AuthorController::class, 'index'])->name('author.all');
    Route::post('author/create', [AuthorController::class, 'create'])->name('author.create');
    Route::put('author/update/{author}', [AuthorController::class, 'update'])->name('author.update');
    Route::get('author/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('tag', [TagController::class, 'index'])->name('tag.all');
    Route::post('tag/create', [TagController::class, 'create'])->name('tag.create');
    Route::put('tag/update/{tag}', [TagController::class, 'update'])->name('tag.update');
    Route::get('tag/delete/{id}', [TagController::class, 'delete'])->name('tag.delete');
});

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('artikel', [ArtikelController::class, 'index'])->name('artikel.all');
    Route::post('artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::put('artikel/update/{artikel}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::get('artikel/delete/{id}', [ArtikelController::class, 'delete'])->name('artikel.delete');
});


require __DIR__ . '/auth.php';
