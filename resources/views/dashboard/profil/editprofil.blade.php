@extends('dashboard.layout.pages.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Diri</h1>
    </div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/profil/{{ $user[0]->id }}" class="mb-5">
        @method('put')
        @csrf
      <div class="mb-3">
        <label for="perusahaan" class="form-label">Perusahaan</label>
        <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan" name="perusahaan" autofocus value="{{ old('perusahaan', $user[0]->perusahaan) }}">
        @error('perusahaan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama', $user[0]->nama) }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus value="{{ old('email', $user[0]->email) }}">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="no_telephone" class="form-label">Nomor HP</label>
        <input type="no_telephone" class="form-control @error('no_telephone') is-invalid @enderror" id="no_telephone" name="no_telephone" autofocus value="{{ old('no_telephone', $user[0]->no_telephone) }}">
        @error('no_telephone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" autofocus value="{{ old('alamat', $user[0]->alamat) }}">
        @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kelurahan" class="form-label">Desa/Kelurahan</label>
        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" autofocus value="{{ old('kelurahan', $user[0]->kelurahan) }}">
        @error('kelurahan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kecamatan" class="form-label">Kecamatan</label>
        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" autofocus value="{{ old('kecamatan', $user[0]->kecamatan) }}">
        @error('kecamatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kabupatenkota" class="form-label">Kabupaten/Kota</label>
        <input type="text" class="form-control @error('kabupatenkota') is-invalid @enderror" id="kabupatenkota" name="kabupatenkota" autofocus value="{{ old('kabupatenkota', $user[0]->kabupatenkota) }}">
        @error('kabupatenkota')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="provinsi" class="form-label">Provinsi</label>
        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" autofocus value="{{ old('provinsi', $user[0]->provinsi) }}">
        @error('provinsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <button type="submit" class="btn bg-gradient-primary">Update Data Diri</button>
    </form>
</div>

<script>

</script>
@endsection