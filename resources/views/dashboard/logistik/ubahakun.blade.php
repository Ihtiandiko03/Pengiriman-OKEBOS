@extends('dashboard.layout.pages.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 mx-auto">Edit Akun Logistik {{ $data->nama }}</h1>
    </div>

    <div class="col-lg-7 mx-auto">
        <form method="post" action="/dashboard/logistik/prosesubahakun/{{$data->username}}" class="mb-5">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"  value="{{ old('nama', $data->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kantor_cabang" class="form-label">Kantor Cabang</label>
                <select class="form-select" name="kantor_cabang">
                @foreach ($rutes as $rute)
                    @if (old('rute', $data->kantor_cabang) == $rute->id)
                        <option value="{{ $rute->id }}" selected>{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                    @else
                        <option value="{{ $rute->id }}">{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                    @endif
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"  value="{{ old('username', $data->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value="{{ old('email', $data->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_telephone" class="form-label">No Telpon</label>
                <input type="text" class="form-control @error('no_telephone') is-invalid @enderror" id="no_telephone" name="no_telephone"  value="{{ old('no_telephone', $data->no_telephone) }}">
                @error('no_telephone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"  value="{{ old('alamat', $data->alamat) }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  value="{{ old('password', $data->password) }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kelurahan" class="form-label">Kelurahan</label>
                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan"  value="{{ old('kelurahan', $data->kelurahan) }}">
                @error('kelurahan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan"  value="{{ old('kecamatan', $data->kecamatan) }}">
                @error('kecamatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kabupatenkota" class="form-label">Kabupaten/Kota</label>
                <input type="text" class="form-control @error('kabupatenkota') is-invalid @enderror" id="kabupatenkota" name="kabupatenkota"  value="{{ old('kabupatenkota', $data->kabupatenkota) }}">
                @error('kabupatenkota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_telephone" class="form-label">Provinsi</label>
                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi"  value="{{ old('provinsi', $data->provinsi) }}">
                @error('provinsi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn bg-gradient-primary">Update Data Logistik</button>
        </form>
    </div>

@endsection