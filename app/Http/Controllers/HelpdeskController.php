<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HelpdeskController extends Controller
{
    public function index(){
        $auth = Auth::user()->nama;

        $kueri = "SELECT COUNT(`nama`) as total FROM `helpdesk` WHERE `nama` = '".$auth."'";
        $getData = DB::select($kueri);

        $kueri2 = "SELECT COUNT(`nama`) as total FROM `helpdesk` WHERE `nama` = '" . $auth . "' AND `status` ='Belum Dikerjakan'";
        $getData2 = DB::select($kueri2);

        $kueri3 = "SELECT COUNT(`nama`) as total FROM `helpdesk` WHERE `nama` = '" . $auth . "' AND `status` ='Sedang Dikerjakan'";
        $getData3 = DB::select($kueri3);

        $kueri4 = "SELECT COUNT(`nama`) as total FROM `helpdesk` WHERE `nama` = '" . $auth . "' AND `status` ='Selesai Dikerjakan'";
        $getData4 = DB::select($kueri4);

        $kueri5 = "SELECT * FROM `helpdesk` WHERE `nama` = '" . $auth . "' ORDER BY `id` DESC";
        $getData5 = DB::select($kueri5);

        return view('dashboard.helpdesk.index', [
            'total' => $getData[0]->total,
            'belum_dikerjakan' => $getData2[0]->total,
            'sedang_dikerjakan' => $getData3[0]->total,
            'selesai_dikerjakan' => $getData4[0]->total,
            'data' => $getData5,
            'link' => 'Helpdesk'
        ]);
    }

    public function buattiket(){

        return view('dashboard.helpdesk.buattiket', ['link' => 'Helpdesk']);
    }

    public function prosesbuattiket(Request $request){
        $buatTiket='';

        if ($request->hasFile('bukti_foto')) {
            $validatedData = $request->validate([
                'nama',
                'email',
                'no_tiket' => 'required',
                'status' => 'required',
                'keterangan' => 'required',
                'bukti_foto',
                'created_at',
            ]);

            $validatedData['nama'] = auth()->user()->nama;
            $validatedData['email'] = auth()->user()->email;
            $validatedData['created_at'] = date('Y-m-d H:i:s');


            $file = $request->file('bukti_foto');
            $filename = $file->getClientOriginalName();

            $validatedData['no_tiket'] = 'TIC-2023-'.$validatedData['no_tiket'];
            $validatedData['bukti_foto'] = $validatedData['no_tiket'].'-'.$filename;

            $buatTiket = DB::table('helpdesk')->insert($validatedData);

            $file->storeAs('foto_helpdesk/', $filename);
        } else{
            $validatedData2 = $request->validate([
                'nama',
                'email',
                'no_tiket' => 'required',
                'status' => 'required',
                'keterangan' => 'required',
                'created_at',
            ]);

            $validatedData2['nama'] = auth()->user()->nama;
            $validatedData2['email'] = auth()->user()->email;
            $validatedData2['created_at'] = date('Y-m-d H:i:s');

            $validatedData2['no_tiket'] = 'TIC-2023-' . $validatedData2['no_tiket'];
            $buatTiket = DB::table('helpdesk')->insert($validatedData2);
        }

        if($buatTiket){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Tiket Berhasil Dibuat');window.location.href='/dashboard/helpdesk';</script>");

            // return redirect('/dashboard/helpdesk');
        }
    }

    public function lihattiket($no_tiket){
        $kueri = "SELECT * FROM `helpdesk` WHERE `no_tiket`='".$no_tiket."'";
        $getData = DB::select($kueri);

        // var_dump($getData);
        // die;

        return view('dashboard.helpdesk.lihattiket', [
            'data' => $getData[0],
            'link' => 'Helpdesk'
        ]);
    }

    public function kelolahelpdesk(){
        $kueri = "SELECT COUNT(`nama`) as total FROM `helpdesk`";
        $getData = DB::select($kueri);

        $kueri2 = "SELECT COUNT(`nama`) as total FROM `helpdesk` WHERE `status` ='Belum Dikerjakan'";
        $getData2 = DB::select($kueri2);

        $kueri3 = "SELECT COUNT(`nama`) as total FROM `helpdesk` WHERE `status` ='Sedang Dikerjakan'";
        $getData3 = DB::select($kueri3);

        $kueri4 = "SELECT COUNT(`nama`) as total FROM `helpdesk` WHERE  `status` ='Selesai Dikerjakan'";
        $getData4 = DB::select($kueri4);

        $kueri5 = "SELECT * FROM `helpdesk` ORDER BY `id` DESC";
        $getData5 = DB::select($kueri5);


        return view('dashboard.helpdesk.kelolahelpdesk', [
            'total' => $getData[0]->total,
            'belum_dikerjakan' => $getData2[0]->total,
            'sedang_dikerjakan' => $getData3[0]->total,
            'selesai_dikerjakan' => $getData4[0]->total,
            'data' => $getData5,
            'link' => 'Kelola Helpdesk'
        ]);
    }

    public function kelolatiket($no_tiket){
        $data = [
            'status' => 'Sedang Dikerjakan',
            'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('helpdesk')->where('no_tiket', $no_tiket)->update($data);

        $kueri = "SELECT * FROM `helpdesk` WHERE `no_tiket`='".$no_tiket."'";
        $getData = DB::select($kueri);


        return view('dashboard.helpdesk.kelolatiket', [
            'data' => $getData[0],
            'link' => 'Kelola Helpdesk'
        ]);
    }


    public function proseskelolatiket($no_tiket, Request $request){
        $validatedData = $request->validate([
            'status',
            'teknisi',
            'tanggapan' => 'required',
            'updated_at',
        ]);

        $validatedData['status'] = 'Selesai Dikerjakan';
        $validatedData['teknisi'] = 'Admin';
        $validatedData['updated_at'] = date('Y-m-d H:i:s');

        $update = DB::table('helpdesk')->where('no_tiket', $no_tiket)->update($validatedData);

        if($update){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/helpdesk/kelolahelpdesk';</script>");
            
            // return redirect('/dashboard/helpdesk/kelolahelpdesk');
        }
    }
}
