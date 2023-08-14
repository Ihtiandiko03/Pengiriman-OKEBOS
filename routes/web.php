<?php

use App\Models\User;
use App\Http\Middleware\Logistik;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\Email;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\LogistikController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ControllerFormPengiriman;

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

Route::get('/foo', function () {
    Artisan::call('storage:link');
});


Route::get('/email/emailpendaftaran', [Email::class, 'emailpendaftaran']);
Route::get('/email/emailpengirimanbarang', [Email::class, 'emailpengirimanbarang']);
Route::get('/email/emailpenerimaanbarang', [Email::class, 'emailpenerimaanbarang']);
Route::get('/email/resetpassword', [Email::class, 'resetpassword']);


Route::get('/', function () {
    return view('index');
});
Route::get('/ongkir', function () {
    return view('ongkir');
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/login/lupapassword', [LoginController::class, 'lupapassword']);
Route::post('/login/proseslupapassword', [LoginController::class, 'proseslupapassword']);



Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });

Route::get('/dashboard', [LoginController::class, 'setelahlogin']);

Route::resource('/dashboard/profil', DashboardUserController::class);
Route::resource('/dashboard/pengiriman', ControllerFormPengiriman::class);
Route::get('/dashboard/pengiriman/barangkeluar/index', [ControllerFormPengiriman::class, 'barangKeluar']);


Route::get('/dashboard/admin/agen', [AdminController::class, 'agen'])->middleware('admin');
Route::get('/dashboard/admin/logistik', [AdminController::class, 'logistik'])->middleware('admin');
Route::get('/dashboard/admin/createAgen', [AdminController::class, 'createAgen'])->middleware('admin');
Route::post('/dashboard/admin/createAgen', [AdminController::class, 'storeAgen'])->middleware('admin');


Route::get('/dashboard/admin/driver', [AdminController::class, 'driver'])->middleware('admin');
Route::get('/dashboard/admin/pengiriman', [AdminController::class, 'pengiriman'])->middleware('admin');
Route::resource('/dashboard/admin', AdminController::class)->middleware('admin');
Route::get('/dashboard/ubahprofilkurir', [AdminController::class, 'ubahProfilKurir'])->middleware('admin');
Route::post('/dashboard/ubahprofilkurir', [AdminController::class, 'storeProfilKurir'])->middleware('admin');




Route::resource('/dashboard/rute', RuteController::class)->middleware('admin');
// Route::resource('/dashboard/kurir', KurirController::class);
Route::get('/dashboard/kurir', [KurirController::class, 'index']);
Route::get('/dashboard/kurir/barangdiantar', [KurirController::class, 'barangdiantar']);
Route::get('/dashboard/kurir/barangdiantar/proses/{id}', [KurirController::class, 'barangdiantarproses']);
Route::get('/dashboard/kurir/pesananditerima/{id}', [KurirController::class, 'pesananditerima']);
Route::post('/dashboard/kurir/prosespenerimaanbarang/{id}', [KurirController::class, 'prosespenerimaanbarang']);
Route::get('/dashboard/kurir/lihatdetailkurir/{id}', [KurirController::class, 'lihatdetailkurir']);




Route::get('/dashboard/agen/kuriragen', [AgenController::class, 'kurirAgen'])->middleware('agen');
// Route::resource('/dashboard/agen', AgenController::class)->middleware('agen');
Route::get('/dashboard/agen', [AgenController::class, 'index'])->middleware('agen');
Route::get('/dashboard/agen/pengirimanmasuk', [AgenController::class, 'pengirimanmasuk'])->middleware('agen');
Route::get('/dashboard/agen/kuriragen/showkurir', [AgenController::class, 'showKurir'])->middleware('agen');
// Route::get('/dashboard/pengiriman/verifikasi/AgenKeAgen/', [ControllerFormPengiriman::class, 'verifAgenKeAgen'])->middleware('agen');

// Route::resource('/dashboard/logistik', LogistikController::class);
Route::get('/dashboard/logistik', [LogistikController::class, 'index']);
Route::get('/dashboard/logistik/verifikasi/{id}', [LogistikController::class, 'verifikasi']);
Route::put('/dashboard/logistik/prosesverifikasi/{id}', [LogistikController::class, 'prosesverifikasi']);
Route::get('/dashboard/logistik/penjadwalan', [LogistikController::class, 'penjadwalan']);
Route::get('/dashboard/logistik/penjadwalanbarang/{id}', [LogistikController::class, 'penjadwalanbarang']);
Route::post('/dashboard/logistik/prosespenjadwalanbarang/{id}', [LogistikController::class, 'prosespenjadwalanbarang']);
Route::get('/dashboard/logistik/penjadwalanbarangantarkota/{id}', [LogistikController::class, 'penjadwalanbarangantarkota']);
Route::post('/dashboard/logistik/prosespenjadwalanbarangantarkota/{id}', [LogistikController::class, 'prosespenjadwalanbarangantarkota']);
Route::get('/dashboard/logistik/verifikasibarangdariagen/{id}', [LogistikController::class, 'verifikasibarangdariagen']);
Route::get('/dashboard/logistik/showakunlogistik/{id}', [LogistikController::class, 'showakunlogistik']);
Route::get('/dashboard/logistik/createakunlogistik', [LogistikController::class, 'createakunlogistik'])->middleware('admin');
Route::post('/dashboard/logistik/createlogistik', [LogistikController::class, 'createlogistik'])->middleware('admin');
Route::get('/dashboard/logistik/ubahakun/{id}', [LogistikController::class, 'ubahakun'])->middleware('admin');
Route::post('/dashboard/logistik/prosesubahakun/{id}', [LogistikController::class, 'prosesubahakun'])->middleware('admin');
Route::post('/dashboard/logistik/hapusakun/{id}', [LogistikController::class, 'hapusakun'])->middleware('admin');
Route::get('/dashboard/logistik/cetak_resi/{id}', [LogistikController::class, 'cetakresi']);
Route::get('/dashboard/logistik/lihatdetailpengiriman/{id}', [LogistikController::class, 'lihatdetailpengiriman']);
Route::get('/dashboard/logistik/verifikasibarangditerimalogistik/{id}', [LogistikController::class, 'verifikasibarangditerimalogistik']);



Route::get('/dashboard/helpdesk', [HelpdeskController::class, 'index']);
Route::get('/dashboard/helpdesk/buattiket', [HelpdeskController::class, 'buattiket']);
Route::post('/dashboard/helpdesk/prosesbuattiket', [HelpdeskController::class, 'prosesbuattiket']);
Route::get('/dashboard/helpdesk/lihattiket/{id}', [HelpdeskController::class, 'lihattiket']);
Route::get('/dashboard/helpdesk/kelolahelpdesk', [HelpdeskController::class, 'kelolahelpdesk'])->middleware('admin');
Route::get('/dashboard/helpdesk/kelolatiket/{id}', [HelpdeskController::class, 'kelolatiket']);
Route::post('/dashboard/helpdesk/proseskelolatiket/{id}', [HelpdeskController::class, 'proseskelolatiket']);




Route::get('/dashboard/kurir/ambil', [KurirController::class, 'ambil']);

Route::get('/dashboard/saldo', function () {
    return view('dashboard.saldo.index');
});
