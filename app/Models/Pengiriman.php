<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['user', 'rute'];
    protected $fillable = [
        'perusahaan_pengirim',
        'nama_pengirim',
        'provinsi_pengirim',
        'kabupatenkota_pengirim',
        'kecamatan_pengirim',
        'kelurahan_pengirim',
        'alamat_pengirim',
        'kodepos_pengirim',
        'nomorhp_pengirim',
        'nomorwa_pengirim',
        'perusahaan_penerima',
        'nama_penerima',
        'provinsi_penerima',
        'kabupatenkota_penerima',
        'kecamatan_penerima',
        'kelurahan_penerima',
        'alamat_penerima',
        'kodepos_penerima',
        'nomorhp_penerima',
        'nomorwa_penerima',
        'jenis_pengiriman',
        'rute_awal',
        'rute_tujuan',
        'user_id',
        'nomor_resi',
        'foto_barang',
        'bukti_bayar',
        'nama_barang',
        'jumlah_barang',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rute()
    {
        return $this->belongsTo(Rute::class);
    }
}
