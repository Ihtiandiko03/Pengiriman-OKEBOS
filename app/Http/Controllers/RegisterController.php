<?php

namespace App\Http\Controllers;

use App\Notifications\ReferrerBonus;
use Illuminate\Support\Facades\Notification;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    protected $redirectTo = '/index';

    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {

        // var_dump($request['perusahaan']);
        // var_dump($request['nama']);
        // var_dump($request['username']);
        // var_dump($request['email']);
        // var_dump($request['password']);
        // var_dump($request['alamat']);
        // var_dump($request['kelurahan']);
        // var_dump($request['kecamatan']);
        // var_dump($request['kabupatenkota']);
        // var_dump($request['provinsi']);
        // var_dump($request['refferer_id']);
        // die;

        
        $validatedData = $request->validate([
            'nama' => 'required|max:200',
            'username' => ['required', 'min:8', 'max:255', 'unique:users'],
            'email' => 'required',
            'password' => 'required|min:3|max:255',
            'telepon' => 'required',
            'alamat' => 'required|min:3|max:255',
            'kelurahan' => 'required|min:3|max:255',
            'kecamatan' => 'required|min:3|max:255',
            'kabupatenkota' => 'required|min:3|max:255',
            'provinsi' => 'required|min:3|max:255',
            'referrer_id',
        ]);

        $validatedData['perusahaan'] = $request->perusahaan ? $request->perusahaan : '';

        // $validatedData['password'] = bcrypt($validatedData['password']);
        // $validatedData['password'] = Hash::make($validatedData['password']);

        // $referrer = User::whereUsername(session()->pull('referrer'))->first();
        $referrer = User::with('recursiveReferrer')->first();

        User::create([
            'nama'        => $request['nama'],
            'username'    => $request['username'],
            'perusahaan'       => $request['perusahaan'],
            'alamat'       => $request['alamat'],
            'no_telephone' => $request['telepon'],
            'email'       => $request['email'],
            'kelurahan'       => $request['kelurahan'],
            'kecamatan'       => $request['kecamatan'],
            'kabupatenkota'       => $request['kabupatenkota'],
            'provinsi'       => $request['provinsi'],
            'referrer_id' => $referrer ? $referrer->id : null,
            'password'    => Hash::make($request['password']),
        ]);

        // $request->session()->flash('success', 'Registrasi Berhasil');
        // return redirect('/login')->with('success', 'Registrasi Berhasil, Silahkan Login');
        return redirect('/email/emailpendaftaran')->with(['data' => $validatedData]);
        // echo ("<script LANGUAGE='JavaScript'>window.alert('Registrasi Berhasil, Silahkan Login');window.location.href='/login';</script>");

    }

    protected function registered(Request $request, $user)
    {
        if ($user->referrer !== null) {
            Notification::send($user->referrer, new ReferrerBonus($user));
        }

        return redirect($this->redirectPath());
    }
}
