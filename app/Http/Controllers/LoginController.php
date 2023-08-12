<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $kueri = "SELECT `is_active` FROM `users` WHERE `email` = '".$credentials['email']."'";
        $getData = DB::select($kueri);
        $aktif = $getData[0]->is_active;

        if (Auth::attempt($credentials) && $aktif == 1) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        // return back()->with('loginError', 'Login Gagal!');
        echo ("<script LANGUAGE='JavaScript'>window.alert('GAGAL LOGIN. Pastikan Email dan Password sudah terdaftar');window.location.href='/login';</script>");

    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function setelahlogin(){
        $kueri = "SELECT COUNT(`id`) as total FROM `pengirimen`";
        $getData = DB::select($kueri);

        $bulan = date("m");
        $bulan2 = date("F");

        $kueri2 = "SELECT COUNT(`id`) as total FROM `pengirimen` WHERE (SELECT MONTH(`created_at`) AS Month) = ".$bulan;
        $getData2 = DB::select($kueri2);
        $data = ($getData2[0]->total / $getData[0]->total) * 100;

        $kueri3 = "SELECT COUNT(`id`) as total FROM `users` WHERE `admin` = 0 AND `kurir_antar` = 0 AND `kurir_jemput` = 0 AND `agen` = 0 AND `logistik` = 0";
        $getData3 = DB::select($kueri3);

        $kueri4 = "SELECT COUNT(`id`) as total FROM `users` WHERE  (SELECT MONTH(`created_at`) AS Month) = " . $bulan;
        $getData4 = DB::select($kueri4);
        $data2 = ($getData4[0]->total / $getData4[0]->total) * 100;

        $kueri5 = "SELECT COUNT(`id`) as total FROM `users` WHERE `agen` = 1";
        $getData5 = DB::select($kueri5);

        $kueri6 = "SELECT COUNT(`id`) as total FROM `helpdesk`";
        $getData6 = DB::select($kueri6);

        $kueri7 = "SELECT COUNT(`id`) as total FROM `helpdesk` WHERE (SELECT MONTH(`created_at`) AS Month) = " . $bulan;
        $getData7 = DB::select($kueri7);
        if($getData6[0]->total == 0){
            $data3 = 0;
        }else{
            $data3 = ($getData7[0]->total / $getData6[0]->total) * 100;
        }

        $kueri8 = "SELECT `created_at` FROM `pengirimen`";
        $getData8 = DB::select($kueri8);

        $jan = 0; $feb = 0; $mar = 0; $apr = 0; $mei = 0; $jun = 0; $jul = 0; $agu = 0; $sep = 0; $okt = 0; $nov = 0; $des = 0;

        foreach($getData8 as $item){
            $bln = date('m', strtotime($item->created_at));
            $thn = date('Y', strtotime($item->created_at));


            if($bln == 1 && $thn == date("Y")){
                $jan++;
            }elseif ($bln == 2 && $thn == date("Y")){
                $feb++;
            }elseif ($bln == 3 && $thn == date("Y")) {
                $mar++;
            } elseif ($bln == 4 && $thn == date("Y")) {
                $apr++;
            } elseif ($bln == 5 && $thn == date("Y")) {
                $mei++;
            } elseif ($bln == 6 && $thn == date("Y")) {
                $jun++;
            } elseif ($bln == 7 && $thn == date("Y")) {
                $jul++;
            } elseif ($bln == 8 && $thn == date("Y")) {
                $agu++;
            } elseif ($bln == 9 && $thn == date("Y")) {
                $sep++;
            } elseif ($bln == 10 && $thn == date("Y")) {
                $okt++;
            } elseif ($bln == 11 && $thn == date("Y")) {
                $nov++;
            } elseif ($bln == 12 && $thn == date("Y")) {
                $des++;
            }
        }

        $month = [$jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des];
        $m = json_encode($month);

        $kueri9 = "SELECT `created_at` FROM `users` WHERE is_active = 1";
        $getData9 = DB::select($kueri9);

        $jan = 0; $feb = 0; $mar = 0;$apr = 0;$mei = 0;$jun = 0;$jul = 0;$agu = 0;$sep = 0;$okt = 0;$nov = 0;$des = 0;

        foreach ($getData9 as $item) {
            $bln = date('m', strtotime($item->created_at));
            $thn = date('Y', strtotime($item->created_at));

            if ($bln == 1 && $thn == date("Y")) {
                $jan++;
            } elseif ($bln == 2 && $thn == date("Y")) {
                $feb++;
            } elseif ($bln == 3 && $thn == date("Y")) {
                $mar++;
            } elseif ($bln == 4 && $thn == date("Y")) {
                $apr++;
            } elseif ($bln == 5 && $thn == date("Y")) {
                $mei++;
            } elseif ($bln == 6 && $thn == date("Y")) {
                $jun++;
            } elseif ($bln == 7 && $thn == date("Y")) {
                $jul++;
            } elseif ($bln == 8 && $thn == date("Y")) {
                $agu++;
            } elseif ($bln == 9 && $thn == date("Y")) {
                $sep++;
            } elseif ($bln == 10 && $thn == date("Y")) {
                $okt++;
            } elseif ($bln == 11 && $thn == date("Y")) {
                $nov++;
            } elseif ($bln == 12 && $thn == date("Y")) {
                $des++;
            }
        }

        $listPengguna = [$jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des];

        $l = json_encode($listPengguna);

        $kueri10 = "SELECT COUNT(`id`) as total FROM `users` WHERE agen = 1 AND is_active = 1";
        $getData10 = DB::select($kueri10);
        $kueri11 = "SELECT COUNT(`id`) as total FROM `users` WHERE logistik = 1 AND is_active = 1";
        $getData11 = DB::select($kueri11);
        $kueri12 = "SELECT COUNT(`id`) as total FROM `users` WHERE (kurir_antar = 1 OR kurir_jemput = 1) AND is_active = 1";
        $getData12 = DB::select($kueri12);
        $kueri13 = "SELECT COUNT(`id`) as total FROM `users` WHERE kurir_antar = 0 AND kurir_jemput = 0 AND agen = 0 AND logistik = 0 AND is_active = 1";
        $getData13 = DB::select($kueri13);
        


        return view('dashboard.index', [
            'totalPengiriman'=>$getData[0]->total,
            'totalPengirimanBulanIni' => $data,
            'totalPengguna' => $getData3[0]->total,
            'totalPenggunaBulanIni' => $data2,
            'totalAgen' => $getData5[0]->total,
            'totalHelpdesk' => $getData6[0]->total,
            'totalHelpdeskBulanIni' => $data3,
            'dataChart' => $m,
            'dataBar' => $l,
            'bulan' => $bulan2,
            'totalAgen' => $getData10[0]->total,
            'totalLogistik' => $getData11[0]->total,
            'totalKurir' => $getData12[0]->total,
            'totalUser' => $getData13[0]->total,
            'link' => 'Dashboard'
        ]);
    }

    public function lupapassword(){
        return view('login.lupapassword');
    }

    public function proseslupapassword(Request $request){

        $kueri = "SELECT COUNT(`email`) as hitung FROM `users` WHERE `email` = '".$request->email."'";
        $getData = DB::select($kueri);

        if($getData == NULL){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Email Tidak Terdaftar');window.location.href='/login/lupapassword';</script>");
        }
        else{
            $password = mt_rand(10000000000000, 99999999999999);
            $generatePassword = Hash::make($password);
            $update = DB::table('users')->where('email', $request->email)->update(['password' => $generatePassword]);
            if($update){

                $data = [
                    'email' => $request->email,
                    'password' => $password
                ];

                return redirect('/email/resetpassword')->with(['dataResetPassword' => $data]);
                // echo ("<script LANGUAGE='JavaScript'>window.alert('Password Baru sudah dikirim ke alamat email anda. Silahkan di cek kembali.');window.location.href='/login/lupapassword';</script>");
            }
        }
    }
}
