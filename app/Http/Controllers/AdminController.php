<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rute;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('admin');

        return view('dashboard.admin.index');
    }

    public function driver()
    {
        $kueri = "SELECT `users`.*, `rutes`.`kecamatan` as kec, `rutes`.`kabupatenkota` as kabkota FROM `users` JOIN `rutes` ON `rutes`.`id`=`users`.`kantor_cabang` WHERE `users`.`kurir_antar` = 1 OR `users`.`kurir_jemput` = 1 ORDER BY `rutes`.`kecamatan`,`rutes`.`kabupatenkota`";
        $getData = DB::select($kueri);

        $kueri2 = "SELECT COUNT(`id`) as total FROM `users` WHERE `kurir_antar`= 1 OR `kurir_jemput` = 1";
        $getData2 = DB::select($kueri2);

        $kueri3 = "SELECT COUNT(`id`) as total FROM `users` WHERE `kurir_antar`= 1 AND `kurir_jemput` = 1 AND `is_active` = 1";
        $getData3 = DB::select($kueri3);

        $kueri4 = "SELECT COUNT(`id`) as total FROM `users` WHERE (`kurir_antar`= 1 AND `is_active` = 1) AND NOT (`kurir_antar`= 1 AND `kurir_jemput` = 1)";
        $getData4 = DB::select($kueri4);

        $kueri5 = "SELECT COUNT(`id`) as total FROM `users` WHERE (`kurir_jemput`= 1 AND `is_active` = 1) AND NOT (`kurir_antar`= 1 AND `kurir_jemput` = 1)";
        $getData5 = DB::select($kueri5);

        $kueri6 = "SELECT COUNT(`id`) as total FROM `users` WHERE (`kurir_antar`= 1 OR `kurir_jemput` = 1) AND `is_active` = 1";
        $getData6 = DB::select($kueri6);

        $kueri7 = "SELECT COUNT(`id`) as total FROM `users` WHERE (`kurir_antar`= 1 OR `kurir_jemput` = 1) AND `is_active` = 0";
        $getData7 = DB::select($kueri7);

        return view('dashboard.admin.showdriver', [
            'kurir' => $getData,
            'total' => $getData2[0]->total,
            'kurirantarjemput' => $getData3[0]->total,
            'kurirantar' => $getData4[0]->total,
            'kurirjemput' => $getData5[0]->total,
            'kuriraktif' => $getData6[0]->total,
            'kurirtidakaktif' => $getData7[0]->total,
            'link' => 'Kurir'
        ]);
    }

    public function agen()
    {

        $kueri = "SELECT `users`.`nama`,`users`.`no_telephone`, `users`.`username`,`users`.`is_active`, `rutes`.`kecamatan`,`rutes`.`kabupatenkota` FROM `users` JOIN `rutes` ON `rutes`.`id` = `users`.`kantor_cabang` WHERE `users`.`agen` = '1' ORDER BY `users`.`id` DESC";
        $getData = DB::select($kueri);
        $kueri2 = "SELECT COUNT(`nama`) as total FROM `users` WHERE `agen`='1'";
        $getData2 = DB::select($kueri2);
        $kueri3 = "SELECT COUNT(`nama`) as total FROM `users` WHERE `agen`='1' AND `is_active` = '1'";
        $getData3 = DB::select($kueri3);
        $kueri4 = "SELECT COUNT(`nama`) as total FROM `users` WHERE `agen`='1' AND `is_active` = '0'";
        $getData4 = DB::select($kueri4);

        return view('dashboard.admin.showAgen', [
            'agen' => $getData,
            'total' => $getData2[0]->total,
            'agen_aktif' => $getData3[0]->total,
            'agen_tidakaktif' => $getData4[0]->total,
            'link' => 'Agen'
        ]);
    }

    public function createAgen()
    {
        return view('dashboard.admin.createAgen', [
            'rutes' => Rute::all(),
            'link' => 'Agen'
        ]);
    }

    public function storeAgen(Request $request)
    {
        $referrer = User::with('recursiveReferrer')->first();


        User::create([
            'nama'        => $request['nama'],
            'username'    => $request['username'],
            'perusahaan'       => $request['perusahaan'],
            'alamat'       => $request['alamat'],
            'email'       => $request['email'],
            'kelurahan'       => $request['kelurahan'],
            'kecamatan'       => $request['kecamatan'],
            'kabupatenkota'     => $request['kabupatenkota'],
            'provinsi'       => $request['provinsi'],
            'referrer_id' => $referrer ? $referrer->id : null,
            'password'    => Hash::make($request['password']),
            'no_telephone' => $request['no_telephone'],
            'kantor_cabang' => $request['kantor_cabang'],
            'agen' => $request['agen'] ? $request['agen'] : 0
        ]);
        echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/admin/agen';</script>");
        // return redirect('/dashboard/admin/agen');
    }

    public function pengiriman()
    {
        $pengiriman = DB::table('pengirimen')->orderBy('id', 'desc')->get();
        $kueri = "SELECT COUNT(`id`) as total FROM `pengirimen`";
        $getData = DB::select($kueri);
        $kueri2 = "SELECT COUNT(`id`) as total FROm `pengirimen` WHERE `status` = 'Dibuat'";
        $getData2 = DB::select($kueri2);
        $kueri3 = "SELECT COUNT(`id`) as total FROm `pengirimen` WHERE `status` = 'Diproses'";
        $getData3 = DB::select($kueri3);
        $kueri4 = "SELECT COUNT(`id`) as total FROm `pengirimen` WHERE `status` = 'Selesai'";
        $getData4 = DB::select($kueri4);

        return view('dashboard.admin.pengiriman', [
            'pengiriman' => $pengiriman,
            'total' => $getData[0]->total,
            'dibuat' => $getData2[0]->total,
            'proses' => $getData3[0]->total,
            'selesai' => $getData4[0]->total,
            'link' => 'List Pengiriman'
        ]);
    }


    public function create()
    {
        return view('dashboard.admin.create', [
            'rutes' => Rute::all(),
            'link' => 'Kurir'
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

        $referrer = User::with('recursiveReferrer')->first();


        User::create([
            'nama'        => $request['nama'],
            'username'    => $request['username'],
            'perusahaan'       => $request['perusahaan'],
            'alamat'       => $request['alamat'],
            'email'       => $request['email'],
            'kelurahan'       => $request['kelurahan'],
            'kecamatan'       => $request['kecamatan'],
            'kabupatenkota'     => $request['kabupatenkota'],
            'provinsi'       => $request['provinsi'],
            'referrer_id' => $referrer ? $referrer->id : null,
            'kurir_antar' => $request['kurir_antar'] ? $request['kurir_antar'] : 0,
            'kurir_jemput' => $request['kurir_jemput'] ? $request['kurir_jemput'] : 0,
            'password'    => Hash::make($request['password']),
            'no_telephone' => $request['no_telephone'],
            'kantor_cabang' => $request['kantor_cabang']
        ]);

        echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/admin/driver';</script>");
        // return redirect('/dashboard/admin/driver');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $getData = User::where('username', $username)->get();
        $kueri2 = "SELECT COUNT(`nama`) as total FROM `users` WHERE (`kurir_antar` = 1 OR `kurir_jemput` = 1) AND `kantor_cabang`='".$getData[0]->kantor_cabang."'";
        $getData2 = DB::select($kueri2);
        $kueri3 = "SELECT COUNT(`nama`) as total FROM `users` WHERE (`kurir_antar` = 1 OR `kurir_jemput` = 1) AND `kantor_cabang`='" . $getData[0]->kantor_cabang . "' AND `is_active` = 1";
        $getData3 = DB::select($kueri3);
        $kueri4 = "SELECT COUNT(`nama`) as total FROM `users` WHERE (`kurir_antar` = 1 OR `kurir_jemput` = 1) AND `kantor_cabang`='" . $getData[0]->kantor_cabang . "' AND `is_active` = 0";
        $getData4 = DB::select($kueri4);
        $kueri5 = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE (`rute_awal` = ". $getData[0]->kantor_cabang." OR `rute_tujuan` = ". $getData[0]->kantor_cabang.")";
        $getData5 = DB::select($kueri5);
        $kueri6 = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE (`rute_awal` = " . $getData[0]->kantor_cabang . " OR `rute_tujuan` = " . $getData[0]->kantor_cabang . ") AND `status` = 'Dibuat'";
        $getData6 = DB::select($kueri6);
        $kueri7 = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE (`rute_awal` = " . $getData[0]->kantor_cabang . " OR `rute_tujuan` = " . $getData[0]->kantor_cabang . ") AND `status` = 'Proses'";
        $getData7 = DB::select($kueri7);
        $kueri8 = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE (`rute_awal` = " . $getData[0]->kantor_cabang . " OR `rute_tujuan` = " . $getData[0]->kantor_cabang . ") AND `status` = 'Selesai'";
        $getData8 = DB::select($kueri8);

        // var_dump($getData5);
        // die;
        

        return view('dashboard.admin.showDetailAgen', [
            'data' => $getData[0],
            'data2' => $getData2[0],
            'data3' => $getData3[0],
            'data4' => $getData4[0],
            'data5' => $getData5[0],
            'data6' => $getData6[0],
            'data7' => $getData7[0],
            'data8' => $getData8[0],
            'link' => 'Agen'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        return view('dashboard.admin.edit', [
            'agen' => User::where('username', $username)->get(),
            'rutes' => Rute::all(),
            'link' => 'Agen'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {

        $rules = [
            'nama' => 'min:3|max:255',
            'no_telephone' => 'min:9|max:15',
            'alamat' => 'min:3',
            'kelurahan' => 'min:3|max:255',
            'kecamatan' => 'min:3|max:255',
            'kabupatenkota' => 'min:3|max:255',
            'provinsi' => 'min:3|max:255',
            'is_active' => 'min:0',
            'email',
            'kantor_cabang'

        ];

        $validated = $request->validate($rules);

        // var_dump($validated);
        // die;

        if ($request['email'] != User::where('username', '=', $username)->get('email')) {
            $validated['email'] = $request['email'];
        }
        User::where('username', '=', $username)->update($validated);

        echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/admin/agen';</script>");
        // return redirect('/dashboard/admin/agen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $username)
    {
        // $deleted = User::where('username', '=', $username)->delete();

        User::where('username', '=', $username)->update(['is_active' => $_POST['is_active']]);

        echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/admin/driver';</script>");
        // return redirect('/dashboard/admin/driver');
    }

    public function ubahProfilKurir()
    {
        if (request('username')) {
            return view('dashboard.admin.ubahprofilkurir', [
                'kurir' => User::where('username', '=', request('username'))->get(),
                'link' => 'Kurir'
            ]);
        }
    }

    public function storeProfilKurir(Request $request, $username)
    {
        $rules = [
            'nama' => 'min:3|max:255',
            'no_telephone' => 'min:9|max:15',
            'alamat' => 'min:3',
            'kelurahan' => 'min:3|max:255',
            'kecamatan' => 'min:3|max:255',
            'kabupatenkota' => 'min:3|max:255',
            'provinsi' => 'min:3|max:255',
            'email',
            'kantor_cabang',
            'kurir_antar' => $request['kurir_antar'] ? $request['kurir_antar'] : 0,
            'kurir_jemput' => $request['kurir_jemput'] ? $request['kurir_jemput'] : 0,

        ];

        $validated = $request->validate($rules);

        if ($request['email'] != User::where('username', '=', $username)->get('email')) {
            $validated['email'] = $request['email'];
        }
        User::where('username', '=', $username)->update($validated);

        echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/admin/driver';</script>");
        // return redirect('/dashboard/admin/driver');
    }

    public function logistik(){
        $data = "SELECT `users`.`nama`,`users`.`email`,`users`.`username`,`users`.`is_active`,`rutes`.`kecamatan`,`rutes`.`kabupatenkota` FROM `users` JOIN `rutes` ON `rutes`.`id` = `users`.`kantor_cabang` WHERE `logistik` = 1 ";
        $getData = DB::select($data);
        $data2 = "SELECT COUNT(`nama`) as total FROM `users` WHERE `logistik` = '1' ";
        $getData2 = DB::select($data2);
        $data3 = "SELECT COUNT(`nama`) as total FROM `users` WHERE (`logistik` = '1' )  AND `is_active` = '1'";
        $getData3 = DB::select($data3);
        $data4 = "SELECT COUNT(`nama`) as total FROM `users` WHERE (`logistik` = '1' )  AND `is_active` = '0'";
        $getData4 = DB::select($data4);

        return view('dashboard.admin.logistik', [
            'logistik' => $getData,
            'total' => $getData2[0]->total,
            'logistik_aktif' => $getData3[0]->total,
            'logistik_tidakaktif' => $getData4[0]->total,
            'link' => 'Logistik'
        ]);
    }
}
