<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pengiriman;
use App\Models\User;
use App\Models\Rute;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'nama' => 'Ihtiandiko Wicaksono',
            'email' => 'wihtiandiko@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'Ihtiandiko03',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => 'Indralaya Raya',
            'kecamatan' => 'Indralaya',
            'kabupatenkota' => 'Ogan Ilir',
            'provinsi' => 'Sumatera Selatan',
            'admin' => 1,
            'no_telephone' => '082377102513'
        ]);

        User::create([
            'nama' => 'Heksa Dananjaya',
            'email' => 'heksa@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'HeksaDJBanjarrejo',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => 'Indralaya Raya',
            'kecamatan' => 'Indralaya',
            'kabupatenkota' => 'Ogan Ilir',
            'provinsi' => 'Sumatera Selatan',
            'kurir_antar' => 1,
            'kurir_jemput' => 1,
            'kantor_cabang' => 1,
            'no_telephone' => '082377102513'
        ]);

        User::create([
            'nama' => 'Gilang Aja',
            'email' => 'gilang@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'gilangaja',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => 'Indralaya Raya',
            'kecamatan' => 'Indralaya',
            'kabupatenkota' => 'Ogan Ilir',
            'provinsi' => 'Sumatera Selatan',
            'kurir_antar' => 1,
            'kurir_jemput' => 1,
            'kantor_cabang' => 2,
            'no_telephone' => '082377102513'
        ]);

        User::create([
            'nama' => 'Muhammad Faqih',
            'email' => 'faqih@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'FqhSlebeww',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => 'Indralaya Raya',
            'kecamatan' => 'Indralaya',
            'kabupatenkota' => 'Ogan Ilir',
            'provinsi' => 'Sumatera Selatan',
            'kantor_cabang' => 1,

            'kurir_jemput' => 1,
            'no_telephone' => '082377102513'
        ]);

        User::create([
            'nama' => 'Ihtiandiko',
            'email' => 'ihtiandiko@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'Ihtiandiko030901',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => 'Indralaya Raya',
            'kecamatan' => 'Indralaya',
            'kabupatenkota' => 'Ogan Ilir',
            'provinsi' => 'Sumatera Selatan',
            'no_telephone' => '082377102513'
        ]);

        User::create([
            'nama' => 'Hafizh Londata',
            'email' => 'hapis@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'JadiGituPis',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => 'Indralaya Raya',
            'kecamatan' => 'Indralaya',
            'kabupatenkota' => 'Ogan Ilir',
            'provinsi' => 'Sumatera Selatan',
            'kurir_antar' => 1,
            'kantor_cabang' => 1,

            'no_telephone' => '082377102513'
        ]);

        User::create([
            'nama' => 'Agen Banjjarejo',
            'email' => 'agenbanjarrejo@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'agenBanjarrejo',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => 'Indralaya Raya',
            'kecamatan' => 'Banjarrejo',
            'kabupatenkota' => 'Metro',
            'provinsi' => 'Lampung',
            'agen' => 1,
            'kantor_cabang' => 1,

            'no_telephone' => '082377102513'
        ]);

        User::create([
            'nama' => 'Agen Sukarame',
            'email' => 'agensukarame@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'agenSukarame',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => 'Indralaya Raya',
            'kecamatan' => 'Banjarrejo',
            'kabupatenkota' => 'Metro',
            'provinsi' => 'Lampung',
            'agen' => 1,
            'kantor_cabang' => 2,

            'no_telephone' => '082377102513'
        ]);

        User::create([
            'nama' => 'Logistik Banjarrejo',
            'email' => 'logbanjarrejo@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'LogBanjarrejo',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => '38A',
            'kecamatan' => 'Banjarrejo',
            'kabupatenkota' => 'Kota Metro',
            'provinsi' => 'Lampung',
            'logistik' => 1,
            'kantor_cabang' => 1,
            'no_telephone' => '082377102513'
        ]);

        User::create([
            'nama' => 'Logistik Sukarame',
            'email' => 'logsukarame@gmail.com',
            'password' => bcrypt('12345'),
            'perusahaan' => 'OKEBOS',
            'username' => 'LogSukarame',
            'alamat' => 'Jalan nusantara',
            'kelurahan' => '38A',
            'kecamatan' => 'Banjarrejo',
            'kabupatenkota' => 'Kota Metro',
            'provinsi' => 'Lampung',
            'logistik' => 1,
            'kantor_cabang' => 2,
            'no_telephone' => '082377102513'
        ]);

        Rute::create([
            'kecamatan' => 'Yosorejo',
            'kabupatenkota' => 'Metro'
        ]);

        Rute::create([
            'kecamatan' => 'Sukarame',
            'kabupatenkota' => 'Bandar Lampung'
        ]);

        Rute::create([
            'kecamatan' => 'Indralaya',
            'kabupatenkota' => 'Ogan Ilir'
        ]);

        User::factory(5)->create();
        // Pengiriman::factory(3)->create();
    }
}
