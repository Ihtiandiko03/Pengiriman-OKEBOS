<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function kurirAgen()
    {
        $auth = Auth::user()->kantor_cabang;

        $kueri = "SELECT `users`.*, `rutes`.`kecamatan` as kec, `rutes`.`kabupatenkota` as kabkota FROM `users` JOIN `rutes` ON `rutes`.`id`=`users`.`kantor_cabang` WHERE (`users`.`kurir_antar` = 1 OR `users`.`kurir_jemput` = 1) AND `kantor_cabang` = ".$auth." ORDER BY `rutes`.`kecamatan`,`rutes`.`kabupatenkota`";
        $getData = DB::select($kueri);

        $kueri2 = "SELECT COUNT(`id`) as total FROM `users` WHERE (`kurir_antar`= 1 OR `kurir_jemput` = 1) AND `kantor_cabang` =".$auth;
        $getData2 = DB::select($kueri2);

        $kueri3 = "SELECT COUNT(`id`) as total FROM `users` WHERE `kurir_antar`= 1 AND `kurir_jemput` = 1 AND `is_active` = 1 AND `kantor_cabang` =" . $auth;
        $getData3 = DB::select($kueri3);

        $kueri4 = "SELECT COUNT(`id`) as total FROM `users` WHERE (`kurir_antar`= 1 AND `is_active` = 1) AND NOT (`kurir_antar`= 1 AND `kurir_jemput` = 1) AND `kantor_cabang` =" . $auth;
        $getData4 = DB::select($kueri4);

        $kueri5 = "SELECT COUNT(`id`) as total FROM `users` WHERE (`kurir_jemput`= 1 AND `is_active` = 1) AND NOT (`kurir_antar`= 1 AND `kurir_jemput` = 1) AND `kantor_cabang` =" . $auth;
        $getData5 = DB::select($kueri5);

        $kueri6 = "SELECT COUNT(`id`) as total FROM `users` WHERE (`kurir_antar`= 1 OR `kurir_jemput` = 1) AND `is_active` = 1 AND `kantor_cabang` =" . $auth;
        $getData6 = DB::select($kueri6);

        $kueri7 = "SELECT COUNT(`id`) as total FROM `users` WHERE (`kurir_antar`= 1 OR `kurir_jemput` = 1) AND `is_active` = 0 AND `kantor_cabang` =" . $auth;
        $getData7 = DB::select($kueri7);

        // var_dump($kueri);
        // die;

        return view('dashboard.agen.kurirAgen', [
            'kurir' => $getData,
            'total' => $getData2[0]->total,
            'kurirantarjemput' => $getData3[0]->total,
            'kurirantar' => $getData4[0]->total,
            'kurirjemput' => $getData5[0]->total,
            'kuriraktif' => $getData6[0]->total,
            'kurirtidakaktif' => $getData7[0]->total,
            'link' => 'Kurir Agen'
        ]);

        // return view('dashboard.agen.kurirAgen', [
        //     'kurir' => User::where('kantor_cabang', '=', $auth)
        //         ->where(function ($query) {
        //             $query->where('kurir_antar', '=', 1)
        //                 ->orWhere('kurir_jemput', '=', 1);
        //         })->get(),
        //     'link' => 'Kurir Agen'
        // ]);
    }

    public function showKurir()
    {
        if (request('username')) {

            $detailKurir = User::where('username', request('username'))->get();
        }

        return view('dashboard.agen.showKurir', [
            "shows" => $detailKurir
        ]);
    }


    public function index()
    {
        $auth = Auth::user()->kantor_cabang;
        // return view('dashboard.agen.index', [
        //     'pengirimanDalamWilayah' => Pengiriman::where('rute_awal', '=', $auth)->where('jenis_pengiriman', '=', 'Dalam Kota')->get(),
        //     'pengirimanAntarWilayah' => Pengiriman::where('rute_awal', '=', $auth)->where('jenis_pengiriman', '=', 'Luar Kota')->get(),
        //     'link' => 'Daftar Pengiriman'
        // ]);

        $pengiriman = DB::table('pengirimen')->where('rute_awal', $auth)->orderBy('id', 'desc')->get();
        $kueri = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE `rute_awal` = ".$auth;
        $getData = DB::select($kueri);
        $kueri2 = "SELECT COUNT(`id`) as total FROm `pengirimen` WHERE `status` = 'Dibuat' AND `rute_awal` = ".$auth;
        $getData2 = DB::select($kueri2);
        $kueri3 = "SELECT COUNT(`id`) as total FROm `pengirimen` WHERE `status` = 'Diproses' AND `rute_awal` = " . $auth;
        $getData3 = DB::select($kueri3);
        $kueri4 = "SELECT COUNT(`id`) as total FROm `pengirimen` WHERE `status` = 'Selesai' AND `rute_awal` = " . $auth;
        $getData4 = DB::select($kueri4);


        // var_dump($pengiriman);
        // die;

        return view('dashboard.agen.index', [
            'pengiriman' => $pengiriman,
            'total' => $getData[0]->total,
            'dibuat' => $getData2[0]->total,
            'proses' => $getData3[0]->total,
            'selesai' => $getData4[0]->total,
            'link' => 'Daftar Pengiriman Keluar'
        ]);
    }

    public function pengirimanmasuk(){
        $auth = Auth::user()->kantor_cabang;
        // return view('dashboard.agen.index', [
        //     'pengirimanDalamWilayah' => Pengiriman::where('rute_awal', '=', $auth)->where('jenis_pengiriman', '=', 'Dalam Kota')->get(),
        //     'pengirimanAntarWilayah' => Pengiriman::where('rute_awal', '=', $auth)->where('jenis_pengiriman', '=', 'Luar Kota')->get(),
        //     'link' => 'Daftar Pengiriman'
        // ]);

        $pengiriman = DB::table('pengirimen')->where('rute_tujuan', $auth)->orderBy('id', 'desc')->get();
        $kueri = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE `rute_tujuan` = " . $auth;
        $getData = DB::select($kueri);
        $kueri2 = "SELECT COUNT(`id`) as total FROm `pengirimen` WHERE `status` = 'Dibuat' AND `rute_tujuan` = " . $auth;
        $getData2 = DB::select($kueri2);
        $kueri3 = "SELECT COUNT(`id`) as total FROm `pengirimen` WHERE `status` = 'Diproses' AND `rute_tujuan` = " . $auth;
        $getData3 = DB::select($kueri3);
        $kueri4 = "SELECT COUNT(`id`) as total FROm `pengirimen` WHERE `status` = 'Selesai' AND `rute_tujuan` = " . $auth;
        $getData4 = DB::select($kueri4);


        // var_dump($pengiriman);
        // die;

        return view('dashboard.agen.pengirimanmasuk', [
            'pengiriman' => $pengiriman,
            'total' => $getData[0]->total,
            'dibuat' => $getData2[0]->total,
            'proses' => $getData3[0]->total,
            'selesai' => $getData4[0]->total,
            'link' => 'Daftar Pengiriman Masuk'
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
