<?php

use App\Http\Controllers\Cabinet\CabinetController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/install', [\App\Http\Controllers\InstallController::class, 'index'])->name('install.index');
Route::post('/install-app', [\App\Http\Controllers\InstallController::class, 'install'])->name('install.install');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/cabinet', [CabinetController::class, 'index'])->name('cabinet.index');
    Route::post('/cabinet/skin/upload', [CabinetController::class, 'skinUpload'])->name('cabinet.skin.upload');

    Route::get('/news', [PostController::class, 'index'])->name('news.index');
    Route::post('/news/{post}/add/like', [PostController::class, 'addLike'])->name('news.add.like');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
