<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\BphController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['guest'])->group(function(){
//     Route::get('/', [HomeController::class, 'login']);
//     Route::post('/', [HomeController::class, 'loginSys']);
// });

Route::get('/', [HomeController::class, 'login']);
Route::post('/', [HomeController::class, 'loginSys']);

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/homebph', [HomeController::class, 'homeBph'])->name('homebph');
}); 

// DAFTAR EVENT
Route::get('/daftar-event', [HomeController::class, 'fotoDaftarEvent'])->name('daftarevent');
Route::get('/daftar-event', [HomeController::class, 'showEvent'])->name('daftarevent');
Route::post('/daftar-event/{id}', [HomeController::class, 'daftarEvent'])->name('daftarevent.store');

// DAFTAR UKM
Route::get('/riwayat-event', [HomeController::class, 'riwayatEvent'])->name('riwayatevent');

// AKUN
Route::get('/akun', [HomeController::class, 'akun'])->name('akun');
Route::put('/akun/update-password', [HomeController::class, 'updatePassword'])->name('akun.updatePassword');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// BPH SECTION
Route::get('/tambahEventBph', [BphController::class, 'tambahEvent'])->name('tambahEventBph');
Route::get('/lihatEvent', [BphController::class, 'lihatEvent'])->name('lihatEvent');

//Tambah event
Route::post('/tambahEventBph', [BphController::class, 'storeEvent'])->name('tambahEvent.store');



//admin SECTIONS
Route::get('/adminhome', [adminController::class, 'index'])->name('adminhome');

// Kelola User SECTIONS
Route::get('/kelola-user', [adminController::class, 'kelolaUser'])->name('kelolauser');
Route::get('/add-user', [adminController::class, 'addUser'])->name('adduser');
Route::post('/user/tambah', [adminController::class, 'store'])->name('adduser.store');

Route::get('/kelola-user/{id}/edit', [adminController::class, 'edit'])->name('kelolauser.edit');
Route::put('/kelola-user/{id}', [adminController::class, 'update'])->name('kelolauser.update');
Route::delete('/kelola-user/{id}', [adminController::class, 'destroy'])->name('kelolauser.destroy');

// Event SECTIONS
Route::get('/data-event', [adminController::class, 'showEvent'])->name('dataevent');

Route::get('/add-event', [adminController::class, 'addEvent'])->name('addevent');
Route::post('/add-event', [adminController::class, 'storeEvent'])->name('addevent.store');
Route::get('/data-event/{id}/edit', [adminController::class, 'editEvent'])->name('dataevent.edit');
Route::put('/data-event/{id}', [adminController::class, 'updateEvent'])->name('dataevent.update');
Route::delete('/data-event/{id}', [adminController::class, 'destroyEvent'])->name('dataevent.destroy');


// UKM SECTIONS
Route::get('/data-ukm', [adminController::class, 'showUKM'])->name('dataukm');
Route::get('/add-ukm', [adminController::class, 'addUkm'])->name('addukm');
Route::post('/add-ukm', [adminController::class, 'storeUkm'])->name('addukm.store');

Route::get('/data-ukm/{id}/edit', [adminController::class, 'editUkm'])->name('dataukm.edit');
Route::put('/data-ukm/{id}', [adminController::class, 'updateUkm'])->name('dataukm.update');
Route::delete('/data-ukm/{id}', [adminController::class, 'destroyUkm'])->name('dataukm.destroy');



