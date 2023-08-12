<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengiriman>
 */
class PengirimanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_pengirim' => fake()->name(),
            'perusahaan_pengirim' => fake()->name(),
            'alamat_pengirim' => fake()->address(),
            'kelurahan_pengirim' => fake()->state(),
            'kecamatan_pengirim' => fake()->cityPrefix(),
            'kabupatenkota_pengirim' => fake()->city(),
            'provinsi_pengirim' => fake()->country(),
            'nomorhp_pengirim' => fake()->phoneNumber(),
            'nomorwa_pengirim' => fake()->phoneNumber(),
            'nama_penerima' => fake()->name(),
            'perusahaan_penerima' => fake()->name(),
            'alamat_penerima' => fake()->address(),
            'kelurahan_penerima' => fake()->state(),
            'kecamatan_penerima' => fake()->cityPrefix(),
            'kabupatenkota_penerima' => fake()->city(),
            'provinsi_penerima' => fake()->country(),
            'nomorhp_penerima' => fake()->phoneNumber(),
            'nomorwa_penerima' => fake()->phoneNumber(),
            'user_id' => 1,
            'jenis_pengiriman' => 'Dalam Kota',
            'berat_barang' => mt_rand(1, 5),
            'harga' => 12000,
            'nomor_resi' => fake()->ean13(),
            'rute_awal' => 1,
            'rute_tujuan' => 2,
            'status' => 'Dibuat',
        ];
    }
}
