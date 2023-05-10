<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryBarangController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::get('/', [Home::class, 'viewHome']);
Route::get('/about-us', [Home::class, 'viewAboutUs']);

Route::get('/list-barang', [BarangController::class, 'viewlist']);
Route::get('/create-barang', [BarangController::class, 'viewcreate']);
Route::post('/create-barang', [BarangController::class, 'store']);
Route::post('/create-kategori', [CategoryBarangController::class, 'store']);

// Route::get('/create-barang', [CategoryBarangController::class, 'view']);

Route::get('/edit-barang/{id}', [BarangController::class, 'edit']);
Route::patch('/update-barang/{id}', [BarangController::class, 'update']);
Route::delete('/delete-barang/{id}', [BarangController::class, 'delete']);

