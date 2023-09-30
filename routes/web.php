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
use App\Http\Controllers\SettingController;

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

Route::get('/ongkir', [SettingController::class, 'ongkir']);
Route::get('/lacak', [SettingController::class, 'lacak']);



Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/login/lupapassword', [LoginController::class, 'lupapassword']);
Route::post('/login/proseslupapassword', [LoginController::class, 'proseslupapassword']);



Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// })->middleware('auth');

Route::get('/dashboard', [LoginController::class, 'setelahlogin'])->middleware('auth');

Route::resource('/dashboard/profil', DashboardUserController::class)->middleware('auth');
Route::resource('/dashboard/pengiriman', ControllerFormPengiriman::class)->middleware('auth');
Route::get('/dashboard/pengiriman/barangkeluar/index', [ControllerFormPengiriman::class, 'barangKeluar'])->middleware('auth');


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
// Route::resource('/dashboard/kurir', KurirController::class)->middleware('auth');
Route::get('/dashboard/kurir', [KurirController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kurir/barangdiantar', [KurirController::class, 'barangdiantar'])->middleware('auth');
Route::get('/dashboard/kurir/barangdiantar/proses/{id}', [KurirController::class, 'barangdiantarproses'])->middleware('auth');
Route::get('/dashboard/kurir/pesananditerima/{id}', [KurirController::class, 'pesananditerima'])->middleware('auth');
Route::post('/dashboard/kurir/prosespenerimaanbarang/{id}', [KurirController::class, 'prosespenerimaanbarang'])->middleware('auth');
Route::get('/dashboard/kurir/lihatdetailkurir/{id}', [KurirController::class, 'lihatdetailkurir'])->middleware('auth');




Route::get('/dashboard/agen/kuriragen', [AgenController::class, 'kurirAgen'])->middleware('agen');
// Route::resource('/dashboard/agen', AgenController::class)->middleware('agen');
Route::get('/dashboard/agen', [AgenController::class, 'index'])->middleware('agen');
Route::get('/dashboard/agen/pengirimanmasuk', [AgenController::class, 'pengirimanmasuk'])->middleware('agen');
Route::get('/dashboard/agen/kuriragen/showkurir', [AgenController::class, 'showKurir'])->middleware('agen');
// Route::get('/dashboard/pengiriman/verifikasi/AgenKeAgen/', [ControllerFormPengiriman::class, 'verifAgenKeAgen'])->middleware('agen');

// Route::resource('/dashboard/logistik', LogistikController::class);
Route::get('/dashboard/logistik', [LogistikController::class, 'index'])->middleware('auth');
Route::get('/dashboard/logistik/verifikasi/{id}', [LogistikController::class, 'verifikasi'])->middleware('auth');
Route::put('/dashboard/logistik/prosesverifikasi/{id}', [LogistikController::class, 'prosesverifikasi'])->middleware('auth');
Route::get('/dashboard/logistik/penjadwalan', [LogistikController::class, 'penjadwalan'])->middleware('auth');
Route::get('/dashboard/logistik/penjadwalanbarang/{id}', [LogistikController::class, 'penjadwalanbarang'])->middleware('auth');
Route::post('/dashboard/logistik/prosespenjadwalanbarang/{id}', [LogistikController::class, 'prosespenjadwalanbarang'])->middleware('auth');
Route::get('/dashboard/logistik/penjadwalanbarangantarkota/{id}', [LogistikController::class, 'penjadwalanbarangantarkota'])->middleware('auth');
Route::post('/dashboard/logistik/prosespenjadwalanbarangantarkota/{id}', [LogistikController::class, 'prosespenjadwalanbarangantarkota'])->middleware('auth');
Route::get('/dashboard/logistik/verifikasibarangdariagen/{id}', [LogistikController::class, 'verifikasibarangdariagen'])->middleware('auth');
Route::get('/dashboard/logistik/showakunlogistik/{id}', [LogistikController::class, 'showakunlogistik']);
Route::get('/dashboard/logistik/createakunlogistik', [LogistikController::class, 'createakunlogistik'])->middleware('admin');
Route::post('/dashboard/logistik/createlogistik', [LogistikController::class, 'createlogistik'])->middleware('admin');
Route::get('/dashboard/logistik/ubahakun/{id}', [LogistikController::class, 'ubahakun'])->middleware('admin');
Route::post('/dashboard/logistik/prosesubahakun/{id}', [LogistikController::class, 'prosesubahakun'])->middleware('admin');
Route::post('/dashboard/logistik/hapusakun/{id}', [LogistikController::class, 'hapusakun'])->middleware('admin');
Route::get('/dashboard/logistik/cetak_resi/{id}', [LogistikController::class, 'cetakresi'])->middleware('auth');
Route::get('/dashboard/logistik/lihatdetailpengiriman/{id}', [LogistikController::class, 'lihatdetailpengiriman'])->middleware('auth');
Route::get('/dashboard/logistik/verifikasibarangditerimalogistik/{id}', [LogistikController::class, 'verifikasibarangditerimalogistik'])->middleware('auth');
Route::post('/dashboard/logistik/getprovinsi', [LogistikController::class, 'getProvinsi']);
Route::post('/dashboard/logistik/getkabupatenkota', [LogistikController::class, 'getkabupatenkota']);
Route::post('/dashboard/logistik/getprovinsipenerima', [LogistikController::class, 'getProvinsiPenerima']);
Route::post('/dashboard/logistik/getkabupatenkotapenerima', [LogistikController::class, 'getkabupatenkotaPenerima']);
Route::post('/dashboard/logistik/metode', [LogistikController::class, 'metode']);






Route::get('/dashboard/helpdesk', [HelpdeskController::class, 'index'])->middleware('auth');
Route::get('/dashboard/helpdesk/buattiket', [HelpdeskController::class, 'buattiket'])->middleware('auth');
Route::post('/dashboard/helpdesk/prosesbuattiket', [HelpdeskController::class, 'prosesbuattiket'])->middleware('auth');
Route::get('/dashboard/helpdesk/lihattiket/{id}', [HelpdeskController::class, 'lihattiket'])->middleware('auth');
Route::get('/dashboard/helpdesk/kelolahelpdesk', [HelpdeskController::class, 'kelolahelpdesk'])->middleware('admin');
Route::get('/dashboard/helpdesk/kelolatiket/{id}', [HelpdeskController::class, 'kelolatiket'])->middleware('auth');
Route::post('/dashboard/helpdesk/proseskelolatiket/{id}', [HelpdeskController::class, 'proseskelolatiket'])->middleware('auth');

//Setting
Route::get('/dashboard/setting', [SettingController::class, 'index'])->middleware('auth');
Route::get('/dashboard/setting/edit/{id}', [SettingController::class, 'editsetting'])->middleware('auth');
Route::put('/dashboard/setting/proseseditsetting/{id}', [SettingController::class, 'proseseditsetting'])->middleware('auth');
Route::post('/dashboard/setting/lacakpengiriman', [SettingController::class, 'lacakpengiriman']);


//Ongkir
Route::get('/dashboard/ongkir', [SettingController::class, 'indexongkir'])->middleware('auth');
Route::get('/dashboard/ongkir/tambahongkir', [SettingController::class, 'tambahongkir'])->middleware('auth');
Route::post('/dashboard/ongkir/prosestambahongkir', [SettingController::class, 'prosestambahongkir'])->middleware('auth');
Route::get('/dashboard/ongkir/ubahongkir/{id}', [SettingController::class, 'ubahongkir'])->middleware('auth');
Route::put('/dashboard/ongkir/prosesubahongkir/{id}', [SettingController::class, 'prosesubahongkir'])->middleware('auth');
Route::delete('/dashboard/ongkir/hapusongkir/{id}', [SettingController::class, 'hapusongkir'])->middleware('auth');


Route::get('/dashboard/kurir/ambil', [KurirController::class, 'ambil'])->middleware('auth');

Route::get('/dashboard/saldo', function () {
    return view('dashboard.saldo.index');
})->middleware('auth');
