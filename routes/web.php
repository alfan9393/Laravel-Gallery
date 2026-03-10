<?php

use Illuminate\Support\Facades\Route;
use App\Models\Foto;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\KomentarController;

Route::get('/', [FotoController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/upload', [FotoController::class,'uploadForm'])->name('upload');

Route::post('/tambah-foto', [FotoController::class, 'tambah'])->name('foto.tambah');

Route::get('/edit/{id}', [FotoController::class,'formEdit'])->name('foto.formEdit');

Route::put('/edit-foto/{id}', [FotoController::class, 'edit'])->name('foto.edit');

Route::delete('/hapus-foto/{id}', [FotoController::class, 'hapus'])->name('foto.hapus');

Route::post('/komentar', [KomentarController::class, 'tambah'])->name('komentar.tambah');

Route::get('/like/{id}', [LikeController::class,'like'])->name('foto.like');

Route::delete('/hapus-komentar/{id}', [KomentarController::class,'hapus'])->name('komentar.hapus');

Route::get('/admin', function () {

    $foto = Foto::orderBy('FotoID','desc')->get();

    return view('admin.dashboard', compact('foto'));

})->name('admin');

Route::get('/user', function () {
    return view('user.dashboard');
})->name('user');