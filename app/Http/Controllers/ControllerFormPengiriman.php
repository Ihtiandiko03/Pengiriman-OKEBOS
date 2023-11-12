<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ControllerFormPengiriman extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pengiriman.index', [
            'pengiriman' => Pengiriman::where('user_id', '=', auth()->user()->id)->latest()->get(),
            'link' => 'Pengiriman'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kueri = "SELECT * FROM `rutes` WHERE is_active = 1";
        $kueri2 = "SELECT `provinsi` FROM `rutes` WHERE is_active = 1 GROUP BY `provinsi`";
        $getData = DB::select($kueri);
        $getData2 = DB::select($kueri2);

        $kueri3 = "SELECT * FROM `db_province_data`";
        $getData3 = DB::select($kueri3);



        return view('dashboard.pengiriman.create', [
            'rutes' => $getData,
            'provinsi' => $getData3,
            'link' => 'Pengiriman'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($_POST);
        // die; 

        $validatedData = $request->validate([
            'nama_pengirim' => 'required|min:3|max:255',
            'provinsi_pengirim' => 'required',
            'kabupatenkota_pengirim' => 'required|min:3|max:255',
            'kecamatan_pengirim' => 'required|min:3|max:255',
            'kelurahan_pengirim' => 'required|min:3|max:255',
            'alamat_pengirim' => 'required',
            'kodepos_pengirim' => 'required',
            'nomorhp_pengirim' => 'required',

            'nama_penerima' => 'required|min:3|max:255',
            'provinsi_penerima' => 'required',
            'kabupatenkota_penerima' => 'required|min:3|max:255',
            'kecamatan_penerima' => 'required|min:3|max:255',
            'kelurahan_penerima' => 'required|min:3|max:255',
            'alamat_penerima' => 'required',
            'kodepos_penerima' => 'required',
            'nomorhp_penerima' => 'required',

            'jenis_pengiriman' => 'required',
            'rute_awal' => 'required',
            'rute_tujuan' => 'required',
            'nama_barang' => 'required',
            'user_id',
            'nomor_resi' => 'required',
            'status' => 'required',
            // 'foto_barang' => 'required|mimes:jpeg,png,jpg|max:1024',
        ]);

        $bulan = date("m");

        $kueri = "SELECT COUNT(id) as total FROM `pengirimen` WHERE MONTH(created_at)= $bulan";
        $getData = DB::select($kueri);

        $nomor_resi = date("y").date("m").sprintf("%04d", $request['rute_awal']).sprintf("%04d", $request['rute_tujuan']).sprintf("%04d", ($getData[0]->total + 1));

        $getProvPengirim = $validatedData['provinsi_pengirim'];
        $kueri = "SELECT province_name FROM db_province_data WHERE province_code = $getProvPengirim";
        $getData = DB::select($kueri);

        $getProvPenerima = $validatedData['provinsi_penerima'];
        $kueri2 = "SELECT province_name FROM db_province_data WHERE province_code = $getProvPenerima";
        $getData2 = DB::select($kueri2);

        $validatedData['provinsi_pengirim'] = $getData[0]->province_name;
        $validatedData['provinsi_penerima'] = $getData2[0]->province_name;


        // var_dump($validatedData);
        // die;

        $validatedData['nomor_resi'] = $nomor_resi;
        $validatedData['perusahaan_pengirim'] = $request->perusahaan_pengirim ? $request->perusahaan_pengirim : 'Tidak Ada';
        $validatedData['perusahaan_penerima'] = $request->perusahaan_penerima ? $request->perusahaan_penerima : 'Tidak Ada';

        $validatedData['user_id'] = auth()->user()->id;


        $validatedData2 = [
            'nomor_resi' => $validatedData['nomor_resi'],
            'status' => 'Pengiriman Berhasil Dibuat',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $validatedData3 = [
            'nomor_resi' => $validatedData['nomor_resi']
        ];

        // var_dump($validatedData2);
        // die;

        Pengiriman::create($validatedData);
        DB::table('posisi_barang')->insert($validatedData2);
        DB::table('daftar_pengiriman_kurir')->insert($validatedData3);

        // echo ("<script LANGUAGE='JavaScript'>window.alert('Pengiriman Berhasil Dibuat. Silahkan Menunggu Kurir Menjemput Barang Anda');window.location.href='/dashboard/pengiriman';</script>");
        // return redirect('dashboard/pengiriman');
        return redirect('/email/emailpengirimanbarang')->with(['dataPengiriman' => $validatedData]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usr = Pengiriman::where('id', $id)->get();
        $usr2 = DB::table('posisi_barang')->where('nomor_resi', $usr[0]->nomor_resi)->get();
        $usr3 = DB::table('daftar_pengiriman_kurir')->where('nomor_resi', $usr[0]->nomor_resi)->get();

        $penerima_barang = $usr3[0]->nama_penerima_barang? $usr3[0]->nama_penerima_barang:'Tidak Ada';
        $bukti_terima = $usr3[0]->foto_penerimaan_barang? $usr3[0]->foto_penerimaan_barang:'Tidak Ada';

        return view('dashboard.pengiriman.show', [
            'pengiriman' => $usr,
            'lokasi' => $usr2,
            'surat_jalan' => $usr3[0],
            'penerima_barang' => $penerima_barang,
            'bukti_terima' => $bukti_terima,
            'link' => ''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auth = Auth::user()->nama;
        $auth2 = Auth::user()->kantor_cabang;

        $nama = DB::table('rutes')->select('kecamatan','kabupatenkota')->where('id',$auth2)->get();
        $nama_cabang = $nama[0]->kecamatan.','.$nama[0]->kabupatenkota;

        $data = [
            'nomor_resi' => $id,
            'nama_petugas' => $auth,
            'nama_agen' => $nama_cabang,
            'status' => 'Verifikasi Kurir ke Logistik',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $data2 = [
            'nomor_resi' => $id,
            'nama_kurir_jemput' => $auth,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        // var_dump($data2);
        // die;
        
        // DB::table('posisi_barang')->where('nomor_resi', $id)->update(['nama_petugas' => $auth]);


        $update = DB::table('posisi_barang')->insert($data);
        $update2 = DB::table('daftar_pengiriman_kurir')->where('nomor_resi', $id)->update($data2);
        $update3 = DB::table('pengirimen')->where('nomor_resi', $id)->update(['status' => 'Diproses']);

        if ($update == true && $update2 == true && $update3 == true){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/kurir';</script>");
            // return redirect('/dashboard/kurir');
        }

       


        // $cekkurir = Pengiriman::where('id', $id)->get('verifikasi_kurir_ke_agen');
        // $cekagen = Pengiriman::where('id', $id)->get('verifikasi_agen_ke_agen');



        // if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == false)) {
        //     return view('dashboard.pengiriman.verifKurirKeAgen', [
        //         'pengiriman' => Pengiriman::where('id', $id)->get(),
        //         'rutes' => Rute::all()
        //     ]);
        // } else if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == true) && ($cekagen[0]["verifikasi_agen_ke_agen"] == false)) {
        //     return view('dashboard.pengiriman.verifAgenKeAgen', [
        //         'pengiriman' => Pengiriman::where('id', $id)->get(),
        //         'rutes' => Rute::all()
        //     ]);
        // } else if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == true) && ($cekagen[0]["verifikasi_agen_ke_agen"] == true)) {
        //     return view('dashboard.pengiriman.verifAgenKeKurir', [
        //         'pengiriman' => Pengiriman::where('id', $id)->get(),
        //         'rutes' => Rute::all()
        //     ]);
        // }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cekkurir = Pengiriman::where('id', $id)->get('verifikasi_kurir_ke_agen');
        $cekagen = Pengiriman::where('id', $id)->get('verifikasi_agen_ke_agen');

        if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == false)) {
            $validatedData = $request->validate([
                'foto_barang' => 'required|mimes:jpeg,png,jpg|max:1024',
            ]);

            $validatedData['foto_barang'] = $request->file('foto_barang')->store('bukti_barang');
            Pengiriman::where('id', '=', $id)->update([
                'foto_barang' => $validatedData['foto_barang'],
                'harga' => $request['harga'],
                'berat_barang' => $request['berat_barang'],
                'verifikasi_kurir_ke_agen' => $request['verifikasi_kurir_ke_agen']
            ]);
        } else if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == true) && ($cekagen[0]["verifikasi_agen_ke_agen"] == false)) {
            Pengiriman::where('id', '=', $id)->update([
                'verifikasi_agen_ke_agen' => $request['verifikasi_agen_ke_agen']
            ]);
        } else if (($cekkurir[0]["verifikasi_kurir_ke_agen"] == true) && ($cekagen[0]["verifikasi_agen_ke_agen"] == true)) {
            Pengiriman::where('id', '=', $id)->update([
                'verifikasi_agen_ke_kurir' => $request['verifikasi_agen_ke_kurir']
            ]);
        }

        if ((Auth::user()->agen) == 1) {
            return redirect('/dashboard/agen');
        } else if ((Auth::user()->kurir_antar) == 1) {
            return redirect('/dashboard/kurir');
        } else if ((Auth::user()->kurir_jemput) == 1) {
            return redirect('/dashboard/kurir');
        }
    }

    // public function verifAgenKeAgen($id)
    // {
    //     return view('dashboard.pengiriman.editpengiriman', [
    //         'pengiriman' => Pengiriman::where('id', $id)->get(),
    //         'rutes' => Rute::all()
    //     ]);;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function barangKeluar()
    {
        return view('dashboard.agen.barangkeluar', [
            'pengiriman' => Pengiriman::where('verifikasi_barang_keluar', 0)->orWhere('verifikasi_barang_keluar', 1)->get(),
            'rutes' => Rute::all(),
            'link' => 'Pengiriman'
        ]);
    }
}
