<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = Rute::all();
        $kueri2 = "SELECT COUNT(`id`) as total FROM `rutes`";
        $getData2 = DB::select($kueri2);
        $kueri3 = "SELECT COUNT(`id`) as total FROM `rutes` WHERE `is_active` = 1";
        $getData3 = DB::select($kueri3);
        $kueri4 = "SELECT COUNT(`id`) as total FROM `rutes` WHERE `is_active` = 0";
        $getData4 = DB::select($kueri4);

        return view('dashboard.rute.index', [
            'rute' => $getData,
            'total' => $getData2[0]->total,
            'rute_aktif' => $getData3[0]->total,
            'rute_tidakaktif' => $getData4[0]->total,
            'link' => 'Rute'

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.rute.create', ['link' => 'Rute']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Rute::create([
            'kecamatan' => $request['kecamatan'],
            'kabupatenkota' => $request['kabupatenkota'],
            'provinsi' => $request['provinsi']
        ]);

        echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/rute';</script>");
        // return redirect('/dashboard/rute');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function show(Rute $rute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.rute.edit', [
            'rute' => Rute::where('id', $id)->get(),
            'link' => 'Rute'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'kecamatan' => 'min:3|max:255',
            'kabupatenkota' => 'min:3|max:255'
        ];

        $validated = $request->validate($rules);

        Rute::where('id', '=', $id)->update($validated);

        echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/rute';</script>");

        // return redirect('/dashboard/rute');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rute  $rute
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $deleted = Rute::where('id', '=', $id)->delete();

        // var_dump($_POST['is_active']);
        // die;

        Rute::where('id', '=', $id)->update(['is_active' => $_POST['is_active']]);

        echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/rute';</script>");
        // return redirect('/dashboard/rute/');

    }
}
