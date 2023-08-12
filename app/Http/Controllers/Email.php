<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Session;


class Email extends Controller
{
    public function emailPendaftaran(){
        $get = Session::get('data');

        // var_dump($get);
        // die;

        $details = [
            'title' => 'Pendaftaran Akun OKEBOS',
            'nama' => $get['nama'],
            'username' => $get['username'],
            'email' => $get['email'],
            'password' => $get['password'],
            'telepon' => $get['telepon'],
            'alamat' => $get['alamat'],
            'kelurahan' => $get['kelurahan'],
            'kecamatan' => $get['kecamatan'],
            'kabupatenkota' => $get['kabupatenkota'],
            'provinsi' => $get['provinsi'],
            'perusahaan' => $get['perusahaan']
        ];

        Mail::to($get['email'])->send(new \App\Mail\MyTestMail($details));

        echo ("<script LANGUAGE='JavaScript'>window.alert('Registrasi Berhasil, Silahkan Login');window.location.href='/login';</script>");
        
    }

    public function emailpengirimanbarang(){
        $auth = Auth::user()->email;
        $get = Session::get('dataPengiriman');

        // var_dump($get);
        // die;

        $details = [
            'title' => 'Pengiriman Barang OKEBOS',
            'nama_pengirim' => $get['nama_pengirim'],
            'provinsi_pengirim' => $get['provinsi_pengirim'],
            'kabupatenkota_pengirim' => $get['kabupatenkota_pengirim'],
            'kecamatan_pengirim' => $get['kecamatan_pengirim'],
            'kelurahan_pengirim' => $get['kelurahan_pengirim'],
            'alamat_pengirim' => $get['alamat_pengirim'],
            'kodepos_pengirim' => $get['kodepos_pengirim'],
            'nomorhp_pengirim' => $get['nomorhp_pengirim'],
            'nomorwa_pengirim' => $get['nomorwa_pengirim'],

            'nama_penerima' => $get['nama_penerima'],
            'provinsi_penerima' => $get['provinsi_penerima'],
            'kabupatenkota_penerima' => $get['kabupatenkota_penerima'],
            'kecamatan_penerima' => $get['kecamatan_penerima'],
            'kelurahan_penerima' => $get['kelurahan_penerima'],
            'alamat_penerima' => $get['alamat_penerima'],
            'kodepos_penerima' => $get['kodepos_penerima'],
            'nomorhp_penerima' => $get['nomorhp_penerima'],
            'nomorwa_penerima' => $get['nomorwa_penerima'],

            'jenis_pengiriman' => $get['jenis_pengiriman'],
            'rute_awal' => $get['rute_awal'],
            'rute_tujuan' => $get['rute_tujuan'],
            'nama_barang' => $get['nama_barang'],
            'jumlah_barang' => $get['jumlah_barang'],
            'nomor_resi' => $get['nomor_resi'],
        ];

        Mail::to($auth)->send(new \App\Mail\EmailPengiriman($details));
        echo ("<script LANGUAGE='JavaScript'>window.alert('Pengiriman Berhasil Dibuat. Silahkan Menunggu Kurir Menjemput Barang Anda');window.location.href='/dashboard/pengiriman';</script>");
    }

    public function emailpenerimaanbarang(){
        $get = Session::get('dataPenerimaan');

        $details = [
            'title' => 'Penerimaan Pengiriman Barang OKEBOS',
            'nomor_resi' => $get['nomor_resi'],
            'nama_barang' => $get['nama_barang'],
            'email' => $get['email'],
            'nama_penerima_barang' => $get['nama_penerima_barang']
        ];

        Mail::to($get['email'])->send(new \App\Mail\EmailPenerimaan($details));
        echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/kurir/barangdiantar';</script>");
        
    }

    public function resetpassword()
    {
        $get = Session::get('dataResetPassword');

        $details = [
            'title' => 'Reset Password Akun Pengguna OKEBOS',
            'email' => $get['email'],
            'password' => $get['password']
        ];

        Mail::to($get['email'])->send(new \App\Mail\EmailResetPassword($details));
        echo ("<script LANGUAGE='JavaScript'>window.alert('Password Baru sudah dikirim ke alamat email anda. Silahkan di cek kembali.');window.location.href='/login/';</script>");
    }
}
