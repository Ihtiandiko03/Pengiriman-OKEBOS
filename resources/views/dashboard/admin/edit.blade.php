@extends('dashboard.layout.pages.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Agen</h1>
    </div>

        @foreach ($agen as $kantor_cabang)
            
        
    <div class="col-lg-8">
    <form method="post" action="/dashboard/admin/{{$kantor_cabang->username}}" class="mb-5">
        @method('put')
        @csrf
{{--       
    <div class="mb-3">
        <label for="kantor_cabang" class="form-label">Kantor Cabang</label>
        <select class="form-select" name="kantor_cabang">
         @foreach ($rutes as $rute)
            @if (old('rute', $kantor_cabang->kantor_cabang) == $rute->id)
                <option value="{{ $rute->id }}" selected>{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
            @else
                <option value="{{ $rute->id }}">{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
            @endif
        @endforeach
        </select>
    </div> --}}

      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama', $kantor_cabang->nama) }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus value="{{ old('email', $kantor_cabang->email) }}">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="no_telephone" class="form-label">No Telpon</label>
        <input type="text" class="form-control @error('no_telephone') is-invalid @enderror" id="no_telephone" name="no_telephone" autofocus value="{{ old('no_telephone', $kantor_cabang->no_telephone) }}">
        @error('no_telephone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" autofocus value="{{ old('alamat', $kantor_cabang->alamat) }}">
        @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kelurahan" class="form-label">Kelurahan</label>
        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan" autofocus value="{{ old('kelurahan', $kantor_cabang->kelurahan) }}">
        @error('kelurahan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kecamatan" class="form-label">Kecamatan</label>
        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" autofocus value="{{ old('kecamatan', $kantor_cabang->kecamatan) }}">
        @error('kecamatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kabupatenkota" class="form-label">Kabupaten/Kota</label>
        <input type="text" class="form-control @error('kabupatenkota') is-invalid @enderror" id="kabupatenkota" name="kabupatenkota" autofocus value="{{ old('kabupatenkota', $kantor_cabang->kabupatenkota) }}">
        @error('kabupatenkota')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="provinsi" class="form-label">Provinsi</label>
        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" autofocus value="{{ old('provinsi', $kantor_cabang->provinsi) }}">
        @error('provinsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="is_active" class="form-label">Status Agen</label>
        {{-- <input type="text" class="form-control @error('is_active') is-invalid @enderror" id="is_active" name="is_active" autofocus value="{{ old('is_active', $kantor_cabang->is_active) }}"> --}}

        <select class="form-select" name="is_active">
                <option value="{{ old('is_active', $kantor_cabang->is_active) }}" selected>
                    @if($kantor_cabang->is_active == 1)
                        Aktif
                    @else
                        Tidak aktif
                    @endif
                </option>
                <option value="1" class="text-success">Aktif</option>
                <option value="0" class="text-danger">Tidak Aktif</option>
        </select>
      </div>
      
      

      


      <button type="submit" class="btn bg-gradient-primary">Update Data Agen</button>
    </form>
</div>
@endforeach
@endsection