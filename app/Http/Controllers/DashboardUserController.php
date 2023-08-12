<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profil.index', [
            'user' => User::where('id', auth()->user()->id)->get(),
            'link' => 'Profil'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.profil.editprofil', [
            'user' => User::where('id', '=', $id)->get(),
            'link' => 'Profil'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'perusahaan' => 'required|max:200',
            'nama' => 'required|max:200',
            'alamat' => 'required|min:3|max:255',
            'no_telephone' => 'required',
            'kelurahan' => 'required|min:3|max:255',
            'kecamatan' => 'required|min:3|max:255',
            'kabupatenkota' => 'required|min:3|max:255',
            'provinsi' => 'required|min:3|max:255',
            'email'
        ];


        $validatedData = $request->validate($rules);

        if ($request['email'] != User::where('id', '=', $id)->get('email')) {
            $validatedData['email'] = $request['email'];
        }

        User::where('id', '=', $id)->update($validatedData);

        echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/profil';</script>");
        // return redirect('/dashboard/profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
