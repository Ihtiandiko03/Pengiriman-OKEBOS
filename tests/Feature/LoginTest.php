<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{

    public function test_halaman_login()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSuccessful();
        $response->assertViewIs('login.index');
    }

    public function test_login(){
        $response = $this->post('/login', [
            'email' => 'wihtiandiko@gmail.com',
            'password' => '12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_login_gagal(){
        $response = $this->from('/login')->post('/login', [
            'email' => 'cobacoba@gmail.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(500);
    }

    public function test_lupa_password(){
        $response = $this->get('/login/lupapassword');

        $response->assertStatus(200);
        $response->assertSuccessful();
        $response->assertViewIs('login.lupapassword');
    }

    public function test_lupa_password_berhasil(){
        $response = $this->post('/login/proseslupapassword', [
            'email' => 'amya18@gmail.com'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/email/resetpassword');
    }
}
