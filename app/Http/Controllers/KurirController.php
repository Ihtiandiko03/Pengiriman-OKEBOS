<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KurirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user()->kantor_cabang;

        $users2 = DB::table('posisi_barang')->select('nomor_resi')->distinct()->get();

        $query = 'SELECT `posisi_barang`.`nama_petugas`,`posisi_barang`.`nama_agen`,`posisi_barang`.`status` as status_pengiriman, `pengirimen`.* FROM `posisi_barang` JOIN `pengirimen` ON `pengirimen`.`nomor_resi` = `posisi_barang`.`nomor_resi` WHERE `pengirimen`.`rute_awal`=' . $auth . ' AND `pengirimen`.`jenis_pengiriman`= "Dalam Kota" AND ( ';
        $query2 = 'SELECT `posisi_barang`.`nama_petugas`,`posisi_barang`.`nama_agen`,`posisi_barang`.`status` as status_pengiriman, `pengirimen`.* FROM `posisi_barang` JOIN `pengirimen` ON `pengirimen`.`nomor_resi` = `posisi_barang`.`nomor_resi` WHERE `pengirimen`.`rute_awal`='. $auth. ' AND `pengirimen`.`jenis_pengiriman`= "Luar Kota" AND ( ';

        foreach ($users2 as $u) {
            $query .= ' `posisi_barang`.`id`=(SELECT MAX(`posisi_barang`.`id`) FROM `posisi_barang` WHERE `posisi_barang`.`nomor_resi`=' . $u->nomor_resi . ') OR ';
            $query2 .= ' `posisi_barang`.`id`=(SELECT MAX(`posisi_barang`.`id`) FROM `posisi_barang` WHERE `posisi_barang`.`nomor_resi`='.$u->nomor_resi. ') OR ';
        }

        $query = substr($query,0,-3);
        $query2 = substr($query2,0,-3);

        $query .= ')';
        $query2.= ')';

        $getDalamKota = DB::select($query);
        $getLuarKota = DB::select($query2);

        // var_dump($getDalamKota);
        // die;


        // var_dump($getDalamKota);
        // die;

        // $getDalamKota = DB::table('pengirimen')
        //     ->join('posisi_barang', 'pengirimen.nomor_resi', '=', 'posisi_barang.nomor_resi')
        //     ->select('pengirimen.*', 'posisi_barang.*')
        //     ->where('pengirimen.rute_awal','=',$auth)
        //     ->where('pengirimen.jenis_pengiriman', '=', "'Dalam Kota'")
        //     ->groupBy('posisi_barang.nomor_resi')
        //     ->get();

        // $getLuarKota = DB::table('pengirimen')
        // ->join('posisi_barang', 'pengirimen.nomor_resi', '=', 'posisi_barang.nomor_resi')
        // ->select('pengirimen.*', 'posisi_barang.*')
        // ->where('pengirimen.rute_awal', '=', $auth)
        // ->where('pengirimen.jenis_pengiriman', '=', "'Luar Kota'")
        // ->groupBy('posisi_barang.nomor_resi')
        // ->get();


        return view('dashboard.kurir.index', [
            'pengirimanDalamWilayah' => $getDalamKota,
            'pengirimanAntarWilayah' => $getLuarKota,
            'link' => 'Barang di Jemput'
        ]);
    }



    public function barangdiantar (){
        $auth = Auth::user()->kantor_cabang;
        $auth2 = Auth::user()->nama;

        $kueri = "SELECT nomor_resi FROM `daftar_pengiriman_kurir` WHERE `nama_kurir_antar` = '".$auth2."'";
        $getKueri = DB::select($kueri);
        
        $users2 = DB::table('posisi_barang')->select('nomor_resi')->distinct()->get();

        $query = 'SELECT `posisi_barang`.`nama_petugas`,`posisi_barang`.`nama_agen`,`posisi_barang`.`status`, `pengirimen`.`id`, `pengirimen`.`nomor_resi`,`pengirimen`.`created_at` FROM `posisi_barang` JOIN `pengirimen` ON `pengirimen`.`nomor_resi` = `posisi_barang`.`nomor_resi` WHERE `pengirimen`.`rute_awal`=' . $auth . ' AND `pengirimen`.`jenis_pengiriman`= "Dalam Kota" AND ( ';
        $query2 = 'SELECT `posisi_barang`.`nama_petugas`,`posisi_barang`.`nama_agen`,`posisi_barang`.`status`, `pengirimen`.`id`, `pengirimen`.`nomor_resi`,`pengirimen`.`created_at` FROM `posisi_barang` JOIN `pengirimen` ON `pengirimen`.`nomor_resi` = `posisi_barang`.`nomor_resi` WHERE `pengirimen`.`rute_tujuan`=' . $auth . ' AND `pengirimen`.`jenis_pengiriman`= "Luar Kota" AND ( ';

        foreach ($users2 as $u) {
            $query .= ' `posisi_barang`.`id`=(SELECT MAX(`posisi_barang`.`id`) FROM `posisi_barang` WHERE `posisi_barang`.`nomor_resi`=' . $u->nomor_resi . ') OR ';
            $query2 .= ' `posisi_barang`.`id`=(SELECT MAX(`posisi_barang`.`id`) FROM `posisi_barang` WHERE `posisi_barang`.`nomor_resi`=' . $u->nomor_resi . ') OR ';
        }

        $query = substr($query, 0, -3);
        $query2 = substr($query2, 0, -3);

        $query .= ') AND (';
        $query2 .= ') AND (';

        foreach ($getKueri as $g) {
            $query .= '`pengirimen`.`nomor_resi` = '.$g->nomor_resi.' OR';
            $query2 .= '`pengirimen`.`nomor_resi` = ' . $g->nomor_resi . ' OR';
            // var_dump($g->nomor_resi);
            // die;
        }

        $query = substr($query, 0, -3);
        $query2 = substr($query2, 0, -3);
        $query .= ')';
        $query2 .= ')';

        $getDalamKota = DB::select($query);
        $getLuarKota = DB::select($query2);

        // var_dump($query2);
        // die;

        return view('dashboard.kurir.barangdiantar', [
            'pengirimanDalamWilayah' => $getDalamKota,
            'pengirimanAntarWilayah' => $getLuarKota,
            'link' => 'Barang di Antar'
        ]);
    }

    public function barangdiantarproses($nomor_resi){
        $auth = Auth::user()->nama;
        $auth2 = Auth::user()->kantor_cabang;

        $nama = DB::table('rutes')->select('kecamatan', 'kabupatenkota')->where('id', $auth2)->get();
        $nama_cabang = $nama[0]->kecamatan . ',' . $nama[0]->kabupatenkota;

        $data = [
            'nomor_resi' => $nomor_resi,
            'nama_petugas' => $auth,
            'nama_agen' => $nama_cabang,
            'status' => 'Verifikasi Kurir Antar',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $update = DB::table('posisi_barang')->insert($data);
        if ($update == true) {
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/kurir/barangdiantar';</script>");
            // return redirect('/dashboard/kurir/barangdiantar');
        }

        // var_dump($data);
        // die;
    }

    public function pesananditerima($nomor_resi){
        // $query = "SELECT * FROM `pengirimen` WHERE `nomor_resi` = $nomor_resi";
        // $getQuery = DB::select($query);

        // $auth = Auth::user()->kantor_cabang;
        // $query2 = "SELECT nama_penerima FROM pengirimen WHERE `nomor_resi`=" . $nomor_resi;
        // $getQuery2 = DB::select($query2);

        return view('dashboard.kurir.formpenerimaanbarang', [
            'data' => $nomor_resi,
            'link' => 'Barang di Antar'
        ]);
    }

    public function prosespenerimaanbarang($nomor_resi, Request $request){
        $validatedData = $request->validate([
            'nama_penerima_barang' => 'required',
            'foto_penerimaan_barang' => 'required|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('foto_penerimaan_barang')) {
            $file = $request->file('foto_penerimaan_barang');
            $filename = $file->getClientOriginalName();

            $validatedData['foto_penerimaan_barang'] = $nomor_resi.'-foto_penerimaan_barang-'.$filename;

            $upload = DB::table('daftar_pengiriman_kurir')->where('nomor_resi', $nomor_resi)->update($validatedData);

            $file->storeAs('bukti_penerimaan_barang/', $nomor_resi . '-foto_penerimaan_barang-' . $filename);

            if ($upload) {
                $auth = Auth::user()->nama;
                $auth2 = Auth::user()->kantor_cabang;
                $nama = DB::table('rutes')->select('kecamatan', 'kabupatenkota')->where('id', $auth2)->get();
                $nama_cabang = $nama[0]->kecamatan . ',' . $nama[0]->kabupatenkota;

                $validatedData2 = [
                    'nomor_resi' => $nomor_resi,
                    'nama_petugas' => $auth,
                    'nama_agen' => $nama_cabang,
                    'status' => 'Verifikasi Pesanan Diterima',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                $update2 = DB::table('posisi_barang')->insert($validatedData2);
                $update3 = DB::table('pengirimen')->where('nomor_resi', $nomor_resi)->update(['status' => 'Selesai']);


                if ($update2 == True && $update3 == True) {
                    echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/kurir/barangdiantar';</script>");
                    // return redirect('/dashboard/kurir/barangdiantar');
                }
            }
        }
    }

    public function lihatdetailkurir($username)
    {
        $getData = User::where('username', $username)->get();
        $kueri5 = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE (`rute_awal` = " . $getData[0]->kantor_cabang . " OR `rute_tujuan` = " . $getData[0]->kantor_cabang . ")";
        $getData5 = DB::select($kueri5);
        $kueri6 = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE (`rute_awal` = " . $getData[0]->kantor_cabang . " OR `rute_tujuan` = " . $getData[0]->kantor_cabang . ") AND `status` = 'Dibuat'";
        $getData6 = DB::select($kueri6);
        $kueri7 = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE (`rute_awal` = " . $getData[0]->kantor_cabang . " OR `rute_tujuan` = " . $getData[0]->kantor_cabang . ") AND `status` = 'Proses'";
        $getData7 = DB::select($kueri7);
        $kueri8 = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE (`rute_awal` = " . $getData[0]->kantor_cabang . " OR `rute_tujuan` = " . $getData[0]->kantor_cabang . ") AND `status` = 'Selesai'";
        $getData8 = DB::select($kueri8);

        // var_dump($getData5);
        // die;


        return view('dashboard.admin.lihatdetailkurir', [
            'data' => $getData[0],
            'data5' => $getData5[0],
            'data6' => $getData6[0],
            'data7' => $getData7[0],
            'data8' => $getData8[0],
            'link' => 'Kurir'
        ]);
    }


}
