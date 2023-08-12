@extends('dashboard.layout.pages.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kurir</h1>
    </div>

        @foreach ($kurir as $kurir)
            
        
    <div class="col-lg-8">
    <form method="post" action="/dashboard/ubahprofilkurir?{{$kurir->username}}" class="mb-5">
        @method('put')
        @csrf

         <label>Tipe Driver</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="kurir_antar" name="kurir_antar" value="{{ old('1', $kurir->kurir_antar) }}">
                <label class="form-check-label" for="kurir_antar">Kurir Antar</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="kurir_jemput" name="kurir_jemput" value="{{ old('1', $kurir->kurir_jemput) }}">
                <label class="form-check-label" for="kurir_jemput">Kurir Jemput</label>
            </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama', $kurir->nama) }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus value="{{ old('email', $kurir->email) }}">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="no_telephone" class="form-label">No Telpon</label>
        <input type="text" class="form-control @error('no_telephone') is-invalid @enderror" id="no_telephone" name="no_telephone" autofocus value="{{ old('no_telephone', $kurir->no_telephone) }}">
        @error('no_telephone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" autofocus value="{{ old('alamat', $kurir->alamat) }}">
        @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kelurahan" class="form-label">Kelurahan</label>
        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" autofocus value="{{ old('kelurahan', $kurir->kelurahan) }}">
        @error('kelurahan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kecamatan" class="form-label">Kecamatan</label>
        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" autofocus value="{{ old('kecamatan', $kurir->kecamatan) }}">
        @error('kecamatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kabupatenkota" class="form-label">Kabupaten/Kota</label>
        <input type="text" class="form-control @error('kabupatenkota') is-invalid @enderror" id="kabupatenkota" name="kabupatenkota" autofocus value="{{ old('kabupatenkota', $kurir->kabupatenkota) }}">
        @error('kabupatenkota')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="no_telephone" class="form-label">Provinsi</label>
        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" autofocus value="{{ old('provinsi', $kurir->provinsi) }}">
        @error('provinsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      
      

      


      <button type="submit" class="btn btn-primary">Update Data Kurir</button>
    </form>
</div>
@endforeach
@endsection