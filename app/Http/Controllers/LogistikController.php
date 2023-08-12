<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rute;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogistikController extends Controller
{
    public function index(){
        $auth = Auth::user()->kantor_cabang;

        $users2 = DB::table('posisi_barang')->select('nomor_resi')->distinct()->get();

        // var_dump($auth);
        // die;

        $query = 'SELECT `posisi_barang`.`nama_petugas`,`posisi_barang`.`nama_agen`,`posisi_barang`.`status`, `pengirimen`.`id`, `pengirimen`.`nomor_resi`,`pengirimen`.`created_at` FROM `posisi_barang` JOIN `pengirimen` ON `pengirimen`.`nomor_resi` = `posisi_barang`.`nomor_resi` WHERE `pengirimen`.`rute_awal`=' . $auth . ' AND `pengirimen`.`jenis_pengiriman`= "Dalam Kota" AND (`posisi_barang`.`status` <> "Pengiriman Berhasil Dibuat" AND `posisi_barang`.`status` <> "Verifikasi Kurir ke Logistik") AND ( ';
        $query2 = 'SELECT `posisi_barang`.`nama_petugas`,`posisi_barang`.`nama_agen`,`posisi_barang`.`status`, `pengirimen`.`id`, `pengirimen`.`nomor_resi`,`pengirimen`.`created_at` FROM `posisi_barang` JOIN `pengirimen` ON `pengirimen`.`nomor_resi` = `posisi_barang`.`nomor_resi` WHERE `pengirimen`.`rute_awal`=' . $auth . ' AND `pengirimen`.`jenis_pengiriman`= "Luar Kota" AND (`posisi_barang`.`status` <> "Pengiriman Berhasil Dibuat" AND `posisi_barang`.`status` <> "Verifikasi Kurir ke Logistik") AND ( ';
        $query3 = 'SELECT `posisi_barang`.`nama_petugas`,`posisi_barang`.`nama_agen`,`posisi_barang`.`status`, `pengirimen`.`id`, `pengirimen`.`nomor_resi`,`pengirimen`.`created_at` FROM `posisi_barang` JOIN `pengirimen` ON `pengirimen`.`nomor_resi` = `posisi_barang`.`nomor_resi` WHERE `pengirimen`.`rute_tujuan`=' . $auth . ' AND `pengirimen`.`jenis_pengiriman`= "Luar Kota" AND (`posisi_barang`.`status` <> "Pengiriman Berhasil Dibuat" AND `posisi_barang`.`status` <> "Verifikasi Kurir ke Logistik") AND ( ';

        foreach ($users2 as $u) {
            $query .= ' `posisi_barang`.`id`=(SELECT MAX(`posisi_barang`.`id`) FROM `posisi_barang` WHERE `posisi_barang`.`nomor_resi`=' . $u->nomor_resi . ') OR ';
            $query2 .= ' `posisi_barang`.`id`=(SELECT MAX(`posisi_barang`.`id`) FROM `posisi_barang` WHERE `posisi_barang`.`nomor_resi`=' . $u->nomor_resi . ') OR ';
            $query3 .= ' `posisi_barang`.`id`=(SELECT MAX(`posisi_barang`.`id`) FROM `posisi_barang` WHERE `posisi_barang`.`nomor_resi`=' . $u->nomor_resi . ') OR ';
            
        }

        $query = substr($query, 0, -3);
        $query2 = substr($query2, 0, -3);
        $query3 = substr($query3, 0, -3);


        $query .= ')';
        $query2 .= ')';
        $query3 .= ')';

        // var_dump($query3);
        // die;

        $getDalamKota = DB::select($query);
        $getLuarKota = DB::select($query2);
        $getDariAgen = DB::select($query3);

        // var_dump($query);
        // die;


        return view('dashboard.logistik.barangmasuk', [
            'pengirimanDalamWilayah' => $getDalamKota,
            'pengirimanAntarWilayah' => $getLuarKota,
            'pengirimanDariAgen' => $getDariAgen,
            'link' => 'Verifikasi Pengiriman Barang Masuk'
        ]);
    }

    public function createakunlogistik(){
        return view('dashboard.logistik.createakun', [
            'rutes' => Rute::all(),
            'link' => 'Logistik'
        ]);
    }

    public function createlogistik(Request $request){
        $validatedData = $request->validate([
            'kantor_cabang' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupatenkota' => 'required',
            'provinsi' => 'required',
            'no_telephone' => 'required',
            'logistik' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $createAkun = DB::table('users')->insert($validatedData);

        if($createAkun){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/admin/logistik';</script>");
            // return redirect('/dashboard/admin/logistik');
        }
    }

    public function ubahakun($username){

        $kueri = "SELECT * FROM `users` WHERE `username`= '".$username."'";
        $getData = DB::select($kueri);

        // var_dump($getData);
        // die;

        return view('dashboard.logistik.ubahakun', [
            'data' => $getData[0],
            'rutes' => Rute::all(),
            'link' => 'Logistik'
        ]);
    }

    public function prosesubahakun($username, Request $request){

        $validatedData = $request->validate([
            'kantor_cabang'=>'required',
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupatenkota' => 'required',
            'provinsi' => 'required',
            'no_telephone' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $update = DB::table('users')->where('username', $username)->update($validatedData);
        if($update){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/admin/logistik';</script>");
            // return redirect('/dashboard/admin/logistik');
        }
    }

    public function showakunlogistik($username){
        $kueri = "SELECT * FROM `users` WHERE `username` = '".$username."'";
        $hsl = DB::select($kueri);

        $getKantorCabang = $hsl[0]->kantor_cabang;
        $kueri2 = "SELECT * FROM `rutes` WHERE `id`= ".$getKantorCabang;
        $hsl2 = DB::select($kueri2);
        $str = "Agen ". $hsl2[0]->kecamatan." Kabupaten/Kota ". $hsl2[0]->kabupatenkota;

        $kueri3 = "SELECT COUNT(id) as total FROM `posisi_barang` WHERE `status` = 'Verifikasi Logistik' AND `nama_petugas`='".$hsl[0]->nama."'";
        $hsl3 = DB::select($kueri3);

        // var_dump($hsl3[0]->total);
        // die;

        return view('dashboard.logistik.showakunlogistik', [
            'data' => $hsl[0],
            'data2' => $str,
            'data3' => $hsl3[0],
            'link' => 'Logistik'
        ]);
    }

    public function hapusakun($username){
        $update = DB::table('users')->where('username', $username)->update(['is_active' => $_POST['is_active']]);
        if ($update) {
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/admin/logistik';</script>");
            // return redirect('/dashboard/admin/logistik');
        }
    }

    public function verifikasi($id){
        $query = "SELECT * FROM `pengirimen` WHERE `nomor_resi` = $id";
        $getQuery = DB::select($query);

        return view('dashboard.logistik.verifikasibarang', [
            'rutes' => Rute::all(),
            'verifikasi' => $getQuery,
            'link' => 'Barang di Jemput'
        ]);
    }

    public function prosesverifikasi($nomor_resi, Request $request){
        $validatedData = $request->validate([
            'berat_barang' => 'required',
            'harga' => 'required',
            'foto_barang' => 'required|mimes:jpeg,png,jpg',
            'foto_bukti_pembayaran' => 'required|mimes:jpeg,png,jpg',

        ]);

        if ($request->hasFile('foto_barang') && $request->hasFile('foto_bukti_pembayaran')) {
            $file = $request->file('foto_barang');
            $filename = $file->getClientOriginalName();

            $file2 = $request->file('foto_bukti_pembayaran');
            $filename2 = $file2->getClientOriginalName();

            $validatedData['foto_barang'] = $nomor_resi.'-foto_barang-'.$filename;
            $validatedData['foto_bukti_pembayaran'] = $nomor_resi . '-foto_bukti_pembayaran-'.$filename2;


            $upload = DB::table('pengirimen')
                ->where('nomor_resi', $nomor_resi)
                ->update($validatedData);

            $file->storeAs('bukti_barang/', $nomor_resi . '-foto_barang-' . $filename);
            $file2->storeAs('bukti_pembayaran/', $nomor_resi . '-foto_bukti_pembayaran-' . $filename2);


            if($upload){
                $auth = Auth::user()->nama;
                $auth2 = Auth::user()->kantor_cabang;
                $nama = DB::table('rutes')->select('kecamatan', 'kabupatenkota')->where('id', $auth2)->get();
                $nama_cabang = $nama[0]->kecamatan . ',' . $nama[0]->kabupatenkota;

                $validatedData2 = [
                    'nomor_resi' => $nomor_resi,
                    'nama_petugas' => $auth,
                    'nama_agen' => $nama_cabang,
                    'status' => 'Verifikasi Kurir Ambil Barang',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                $update2 = DB::table('posisi_barang')->insert($validatedData2);

                if($update2){
                    echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/kurir';</script>");
                    // return redirect('/dashboard/kurir');
                }
            }
        }
    }

    public function verifikasibarangditerimalogistik($nomor_resi){
        $auth = Auth::user()->nama;
        $auth2 = Auth::user()->kantor_cabang;

        $nama = DB::table('rutes')->select('kecamatan', 'kabupatenkota')->where('id', $auth2)->get();
        $nama_cabang = $nama[0]->kecamatan . ',' . $nama[0]->kabupatenkota;

        $data = [
            'nomor_resi' => $nomor_resi,
            'nama_petugas' => $auth,
            'nama_agen' => $nama_cabang,
            'status' => 'Verifikasi Logistik',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];


        $update = DB::table('posisi_barang')->insert($data);

        if ($update == true) {
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/logistik';</script>");
            // return redirect('/dashboard/logistik');
        }
    }

    public function penjadwalan(){
        $auth = Auth::user()->kantor_cabang;

        $users2 = DB::table('posisi_barang')->select('nomor_resi')->distinct()->get();

        $query = 'SELECT `posisi_barang`.`nama_petugas`,`posisi_barang`.`nama_agen`,`posisi_barang`.`status`, `pengirimen`.`id`, `pengirimen`.`nomor_resi`,`pengirimen`.`created_at` FROM `posisi_barang` JOIN `pengirimen` ON `pengirimen`.`nomor_resi` = `posisi_barang`.`nomor_resi` WHERE `pengirimen`.`rute_awal`=' . $auth . '  AND `pengirimen`.`jenis_pengiriman`= "Dalam Kota" AND ( ';
        $query2 = 'SELECT `posisi_barang`.`nama_petugas`,`posisi_barang`.`nama_agen`,`posisi_barang`.`status`, `pengirimen`.`id`, `pengirimen`.`nomor_resi`,`pengirimen`.`created_at` FROM `posisi_barang` JOIN `pengirimen` ON `pengirimen`.`nomor_resi` = `posisi_barang`.`nomor_resi` WHERE `pengirimen`.`rute_awal`=' . $auth . ' AND `pengirimen`.`jenis_pengiriman`= "Luar Kota" AND ( ';
        $query3 = 'SELECT `posisi_barang`.`nama_petugas`,`posisi_barang`.`nama_agen`,`posisi_barang`.`status`, `pengirimen`.`id`, `pengirimen`.`nomor_resi`,`pengirimen`.`created_at` FROM `posisi_barang` JOIN `pengirimen` ON `pengirimen`.`nomor_resi` = `posisi_barang`.`nomor_resi` WHERE `pengirimen`.`rute_tujuan`=' . $auth . ' AND `pengirimen`.`jenis_pengiriman`= "Luar Kota" AND ( ';


        foreach ($users2 as $u) {
            $query .= ' `posisi_barang`.`id`=(SELECT MAX(`posisi_barang`.`id`) FROM `posisi_barang` WHERE `posisi_barang`.`nomor_resi`=' . $u->nomor_resi . ') OR ';
            $query2 .= ' `posisi_barang`.`id`=(SELECT MAX(`posisi_barang`.`id`) FROM `posisi_barang` WHERE `posisi_barang`.`nomor_resi`=' . $u->nomor_resi . ') OR ';
            $query3 .= ' `posisi_barang`.`id`=(SELECT MAX(`posisi_barang`.`id`) FROM `posisi_barang` WHERE `posisi_barang`.`nomor_resi`=' . $u->nomor_resi . ') OR ';
            
        }

        $query = substr($query, 0, -3);
        $query2 = substr($query2, 0, -3);
        $query3 = substr($query3, 0, -3);

        $query .= ')   AND (`posisi_barang`.`status`="Verifikasi Logistik" OR `posisi_barang`.`status`="Verifikasi Penjadwalan Pengiriman") ';
        $query2 .= ')    ';
        $query3 .= ')   AND (`posisi_barang`.`status`="Verifikasi Logistik" OR `posisi_barang`.`status`="Verifikasi Penjadwalan Pengiriman" OR `posisi_barang`.`status`="Verifikasi Penjadwalan Pengiriman Barang Antar Kabupaten/Kota" OR `posisi_barang`.`status`="Verifikasi Pengiriman Barang dari Agen") ';

        $getDalamKota = DB::select($query);
        $getLuarKota = DB::select($query2);
        $getDariAgen = DB::select($query3);


        // var_dump($query2);
        // die;


        return view('dashboard.logistik.penjadwalan', [
            'pengirimanDalamWilayah' => $getDalamKota,
            'pengirimanAntarWilayah' => $getLuarKota,
            'pengirimanDariAgen' => $getDariAgen,
            'link' => 'Penjadwalan Pengiriman Barang'
        ]);
    }

    public function penjadwalanbarang($nomor_resi){
        $query = "SELECT * FROM `pengirimen` WHERE `nomor_resi` = $nomor_resi";
        $getQuery = DB::select($query);

        $auth = Auth::user()->kantor_cabang;
        $query2 = "SELECT * FROM users WHERE `kantor_cabang`=".$auth." AND kurir_antar=1";
        $getQuery2 = DB::select($query2);

        return view('dashboard.logistik.formpenjadwalanbarang', [
            'data' => $nomor_resi,
            'data2'=> $getQuery2,
            'link' => 'Penjadwalan Pengiriman Barang'

        ]);
    }

    public function prosespenjadwalanbarang($nomor_resi, Request $request){
        $auth2 = Auth::user()->kantor_cabang;
        $nama = DB::table('rutes')->select('kecamatan', 'kabupatenkota')->where('id', $auth2)->get();
        $nama_cabang = $nama[0]->kecamatan . ',' . $nama[0]->kabupatenkota;

        $validatedData = $request->validate([
            'nomor_resi',
            'nama_petugas' => 'required',
            'nama_agen',
            'status',
            'created_at',
            'updated_at' => 'required',
        ]);

        $validatedData['nomor_resi'] = $nomor_resi;
        $validatedData['nama_agen'] = $nama_cabang;
        $validatedData['status']= 'Verifikasi Penjadwalan Pengiriman';
        $validatedData['created_at'] = date('Y-m-d H:i:s');

        $data = [
            'nomor_resi' => $nomor_resi,
            'nama_kurir_antar' => $validatedData['nama_petugas'],
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // var_dump($data);
        // die;

        $update = DB::table('daftar_pengiriman_kurir')->where('nomor_resi', $nomor_resi)->update($data);
        $update2 = DB::table('posisi_barang')->insert($validatedData);

        if($update == true && $update2 == true){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/logistik/penjadwalan';</script>");

            // return redirect('/dashboard/logistik/penjadwalan');
        }
    }

    public function penjadwalanbarangantarkota($nomor_resi){
        $query = "SELECT * FROM `pengirimen` WHERE `nomor_resi` = $nomor_resi";
        $getQuery = DB::select($query);

        $query2 = "SELECT * FROM `rutes` WHERE `id`=". $getQuery[0]->rute_tujuan;
        $getQuery2 = DB::select($query2);

        $str = "Agen ". $getQuery2[0]->kecamatan." Kabupaten/Kota ".$getQuery2[0]->kabupatenkota;

        // var_dump($str);
        // die;

        $auth = Auth::user()->kantor_cabang;
        $query3 = "SELECT * FROM users WHERE `kantor_cabang`=" . $auth . " AND kurir_antar=1";
        $getQuery3 = DB::select($query3);

        return view('dashboard.logistik.formpenjadwalanbarangantarkota', [
            'data' => $nomor_resi,
            'data2' => $getQuery3,
            'data3' => $str,
            'link' => 'Penjadwalan Pengiriman Barang'

        ]);
    }

    public function prosespenjadwalanbarangantarkota($nomor_resi, Request $request){
        $auth2 = Auth::user()->kantor_cabang;
        $nama = DB::table('rutes')->select('kecamatan', 'kabupatenkota')->where('id', $auth2)->get();
        $nama_cabang = $nama[0]->kecamatan . ',' . $nama[0]->kabupatenkota;

        $validatedData = $request->validate([
            'nomor_resi',
            'nama_petugas' => 'required',
            'nama_agen',
            'status',
            'created_at',
            'updated_at' => 'required',
        ]);

        $validatedData['nomor_resi'] = $nomor_resi;
        $validatedData['nama_agen'] = $nama_cabang;
        $validatedData['status'] = 'Verifikasi Penjadwalan Pengiriman Barang Antar Kabupaten/Kota';
        $validatedData['created_at'] = date('Y-m-d H:i:s');

        $data = $request->validate([
            'surat_jalan' => 'required|mimes:jpeg,png,jpg,pdf',
            'updated_at'
        ]);

        $data['updated_at'] = date('Y-m-d H:i:s');

        // var_dump($data);
        // die;

        if ($request->hasFile('surat_jalan')) {
            $file = $request->file('surat_jalan');
            $filename = $file->getClientOriginalName();

            $data['surat_jalan'] = $filename;

            $update = DB::table('daftar_pengiriman_kurir')->where('nomor_resi', $nomor_resi)->update($data);
            $update2 = DB::table('posisi_barang')->insert($validatedData);

            $file->storeAs('surat_jalan/', $filename);

            if($update == true && $update2 == true){
                echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/logistik/penjadwalan';</script>");
                // return redirect('/dashboard/logistik/penjadwalan');
            }
        }

    }

    public function verifikasibarangdariagen($nomor_resi){
        $auth = Auth::user()->nama;
        $auth2 = Auth::user()->kantor_cabang;

        $nama = DB::table('rutes')->select('kecamatan', 'kabupatenkota')->where('id', $auth2)->get();
        $nama_cabang = $nama[0]->kecamatan . ',' . $nama[0]->kabupatenkota;

        $data = [
            'nomor_resi' => $nomor_resi,
            'nama_petugas' => $auth,
            'nama_agen' => $nama_cabang,
            'status' => 'Verifikasi Pengiriman Barang dari Agen',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // var_dump($data);
        // die;

        $update = DB::table('posisi_barang')->insert($data);

        if($update){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/logistik';</script>");
            // return redirect('/dashboard/logistik');
        }
    }

    public function cetakresi($nomor_resi){
        $kueri = "SELECT * FROM `pengirimen` WHERE `nomor_resi` =".$nomor_resi;
        $getData = DB::select($kueri);

        return view('dashboard.pengiriman.cetakresi', [
            'data' => $getData
        ]);
    }

    public function lihatdetailpengiriman($id){
        $usr = Pengiriman::where('id', $id)->get();
        $usr2 = DB::table('posisi_barang')->where('nomor_resi', $usr[0]->nomor_resi)->get();
        $usr3 = DB::table('daftar_pengiriman_kurir')->where('nomor_resi', $usr[0]->nomor_resi)->get();

        $penerima_barang = $usr3[0]->nama_penerima_barang ? $usr3[0]->nama_penerima_barang : 'Tidak Ada';
        $bukti_terima = $usr3[0]->foto_penerimaan_barang ? $usr3[0]->foto_penerimaan_barang : 'Tidak Ada';

        // var_dump($bukti_terima);
        // die;

        return view('dashboard.pengiriman.lihatdetailpengiriman', [
            'pengiriman' => $usr,
            'lokasi' => $usr2,
            'penerima_barang' => $penerima_barang,
            'bukti_terima' => $bukti_terima,
            'link' => 'List Pengiriman'
        ]);
    }


}
