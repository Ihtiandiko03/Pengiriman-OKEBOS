<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class RegisterTest extends TestCase
{

    public function test_halaman_register()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSuccessful();
        $response->assertViewIs('register.index');
    }

    public function test_register_berhasil(){
        $data = [
            'nama' => 'Testing Unit Test',
            'username' => 'UserTestCoba12345',
            'email' => 'UserTestCoba12345@gmail.com',
            'password' => '12345',
            'telepon' => '082377102513',
            'alamat' => 'Testing Unit Test',
            'kelurahan' => 'Testing Unit Test',
            'kecamatan' => 'Testing Unit Test',
            'kabupatenkota' => 'Testing Unit Test',
            'provinsi' => 'Testing Unit Test',
            'referrer_id' => '1'
        ];

        $response = $this->post('/register', $data);
        $response->assertRedirect('/email/emailpendaftaran');
    }

    public function test_register_gagal(){
        $data = [
            'nama' => '1',
            'perusahaan' => '1',
            'username' => '1',
            'email' => '1',
            'password' => '1',
            'telepon' => '1',
            'alamat' => '1',
            'kelurahan' => '1',
            'kecamatan' => '1',
            'kabupatenkota' => '1',
            'provinsi' => '1',
            'referrer_id' => '1'
        ];
         
        $response = $this->post('/register', $data);
        $response->assertRedirect('/');
    }
}
