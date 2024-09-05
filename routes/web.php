<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\TransaksiController;
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



Route::get('/', [UserController::class, 'homePengguna'])->name('homePengguna');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::middleware('auth')->get("/profil/{id}", [UserController::class, 'profil'])->name("profil");
Route::get("/profile/{id}", [UserController::class, 'profile'])->name("profile");
Route::post('postPesan', [UserController::class,'postPesan'])->name('postPesan');
Route::get('/detail/{artikel}', [UserController::class, 'detail'])->name('detailArtikel');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('postregister', [LoginController::class, 'postregister'])->name('postregister');


Route::get("/bukti/{id}", [TransaksiController::class, 'bukti'])->name("bukti");
Route::post("/bayar", [TransaksiController::class, 'bayar'])->name("bayar");
Route::get('/confirm/{pesan}',[KasirController::class,'confirm'])->name('confirm');


Route::get('/barang',[MekanikController::class,'barang'])->name('barang');

Route::middleware('auth')->get('/homeMekanik/{id}', [MekanikController::class, 'homeMekanik'])->name('homeMekanik');
Route::post('/postTambahMekanik', [AdminController::class, 'postTambahMekanik'])->name('postTambahMekanik');
Route::post('/editorder/{pesan}',[MekanikController::class,'editorder'])->name('editorder');
Route::get('/order/{pesan}',[MekanikController::class,'order'])->name('order');
Route::get('/DT/{id}',[TransaksiController::class,'DT'])->name('DT');
Route::post('/tambahDT',[TransaksiController::class,'tambahDT'])->name('tambahDT');
Route::post('/editorder/{pesan}',[MekanikController::class,'editorder'])->name('editorder');
Route::get('/MekanikDT',[TransaksiController::class,'MekanikDT'])->name('MekanikDT');



Route::middleware(['auth'])->get('/homeOwner', [AdminController::class, 'homeOwner'])->name('homeOwner');
Route::middleware('auth')->get('/homeKasir/{id}', [KasirController::class, 'homeKasir'])->name('homeKasir');
Route::post('/editconfirm/{pesan}',[KasirController::class,'editconfirm'])->name('editconfirm');
Route::get('/kelolaKasir',[AdminController::class,'kelolaKasir'])->name('kelolaKasir');

// User Crud
Route::post("/postVerify/{id}", [BookingController::class, 'postVerify'])->name("postVerify");
Route::get("/editMekanik/{User}", [AdminController::class, 'editMekanik'])->name("editMekanik");
Route::post('/postEditUser/{d}', [AdminController::class, 'postEditUser'])->name('postEditUser');
Route::get('/editPengguna/{id}', [AdminController::class, 'editPengguna'])->name('editPengguna');
Route::get('/tambahpengguna', [AdminController::class, 'tambahpengguna'])->name('tambahpengguna');
Route::post('/postTambahUser', [UserController::class, 'postTambahUser'])->name('postTambahUser');

//Admin
Route::middleware('auth')->get("/homeAdmin", [AdminController::class, 'homeAdmin'])->name("homeAdmin");
Route::get("/kelolaPengguna", [AdminController::class, 'kelolaPengguna'])->name("kelolaPengguna");
Route::get("/kelolaMekanik", [AdminController::class, 'kelolaMekanik'])->name("kelolaMekanik");
Route::get("/kelolaPesanan", [AdminController::class, 'kelolaPesanan'])->name("kelolaPesanan");
Route::get("/kelolaOwner", [AdminController::class, 'kelolaOwner'])->name("kelolaOwner");
Route::get("/detailBooking", [AdminController::class, 'detailBooking'])->name("detailBooking");

//hapus 
Route::get('/hapusPengguna/{id}', [AdminController::class, 'hapusPengguna'])->name('hapusPengguna');
// Route::get('/hapusMekanik/{id}', [AdminController::class, 'hapusMekanik'])->name('hapusMekanik');
// Route::get('/hapusPengguna/{id}', [AdminController::class, 'hapusPengguna'])->name('hapusPengguna');