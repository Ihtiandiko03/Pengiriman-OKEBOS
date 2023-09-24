<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kueri = "SELECT * FROM setting";
        $getData = DB::select($kueri);

        return view('dashboard.setting.index', [
            'data' => $getData,
            'link' => 'Setting'
        ]);
    }

    public function editsetting($id){
        $kueri = "SELECT * FROM setting WHERE id = $id";
        $getData = DB::select($kueri);

        return view('dashboard.setting.editsetting', [
            'data' => $getData,
            'link' => 'Setting'
        ]);
    }

    public function proseseditsetting(Request $request){
        $rules = [
            'id' => 'required',
            'nilai' => 'required'
        ];

        $validated = $request->validate($rules);

        $id = $validated['id'];

        $update = DB::table('setting')->where('id', $id)->update($validated);

        if ($update == true) {
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/setting';</script>");
        }
    }

    public function indexongkir(){
        $kueri = "SELECT a.*,  b.`kecamatan` as kecamatan_awal,  b.`kabupatenkota` as kabkota_awal, c.`kecamatan` as kecamatan_tujuan,  c.`kabupatenkota` as kabkota_tujuan 
                    FROM `ongkir` a 
                    JOIN `rutes` b ON a.`rute_awal` = b.`id` 
                    JOIN `rutes` c ON a.`rute_tujuan` = c.`id`;";
        $getData = DB::select($kueri);

        return view('dashboard.ongkir.index', [
            'data' => $getData,
            'link' => 'Ongkir'
        ]);
    }

    public function tambahongkir(){
        $kueri = "SELECT * FROM rutes";
        $rute = DB::select($kueri);

        return view('dashboard.ongkir.tambahongkir', [
            'data' => $rute,
            'link' => 'Ongkir'
        ]);
    }

    public function prosestambahongkir(Request $request){
        $data = [
            'rute_awal'     => $request['rute_awal'],
            'rute_tujuan'   => $request['rute_tujuan'],
            'harga'         => $request['harga'],
            'diskon'        => $request['diskon'],
            'promo'         => $request['promo'],
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')
        ];

        $insert = DB::table('ongkir')->insert($data);

        if($insert){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Ongkir Berhasil Ditambahkan');window.location.href='/dashboard/ongkir';</script>");
        }
    }

    public function ubahongkir($id){
        $kueri = "SELECT * FROM ongkir where id_ongkir = $id";
        $getData = DB::select($kueri);
        $kueri2 = "SELECT * FROM rutes";
        $getData2 = DB::select($kueri2);

        return view('dashboard.ongkir.ubahongkir', [
            'data' => $getData,
            'data2' => $getData2,
            'link' => 'Ongkir'
        ]);
    }

    public function prosesubahongkir(Request $request, $id){
        $data = [
            'harga'         => $request['harga'],
            'diskon'        => $request['diskon'],
            'promo'         => $request['promo'],
            'updated_at'    => date('Y-m-d H:i:s')
        ];

        $update = DB::table('ongkir')->where('id_ongkir', $id)->update($data);

        if ($update) {
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Ongkir Berhasil Disimpan');window.location.href='/dashboard/ongkir';</script>");
        }

    }

    public function hapusongkir($id){
        $deleted = DB::table('ongkir')->where('id_ongkir', $id)->delete();

        if($deleted){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Ongkir Berhasil Dihapus');window.location.href='/dashboard/ongkir';</script>");
        }
    }
}
