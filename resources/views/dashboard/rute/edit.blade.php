@extends('dashboard.layout.pages.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Rute</h1>
    </div>

        @foreach ($rute as $rute)
            
        
    <div class="col-lg-8">
    <form method="post" action="/dashboard/rute/{{$rute->id}}" class="mb-5">
        @method('put')
        @csrf
      <div class="mb-3">
        <label for="kecamatan" class="form-label">Kecamatan</label>
        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan" autofocus value="{{ old('kecamatan', $rute->kecamatan) }}">
        @error('kecamatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="kabupatenkota" class="form-label">Kabupaten/Kota</label>
        <input type="text" class="form-control @error('kabupatenkota') is-invalid @enderror" id="kabupatenkota" name="kabupatenkota" autofocus value="{{ old('kabupatenkota', $rute->kabupatenkota) }}">
        @error('kabupatenkota')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="provinsi" class="form-label">Provinsi</label>
        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi" autofocus value="{{ old('provinsi', $rute->provinsi) }}">
        @error('provinsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>


      <button type="submit" class="btn bg-gradient-primary">Update Rute</button>
    </form>
    </div>
    @endforeach

@endsection