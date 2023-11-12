@extends('dashboard.layout.pages.main')
@section('container')
    <div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Tambah Rute</h1>
        <form action="/dashboard/rute" method="post">
            @csrf
            {{-- <div class="form-floating">
                <input type="text" name="kecamatan" class="form-control rounded-bottom @error('kecamatan') is-invalid @enderror" id="kecamatan" placeholder="kecamatan"  value="{{ old('kecamatan') }}">
                <label for="kecamatan">Desa/Kecamatan</label>
                @error('kecamatan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-floating">
                <input type="text" name="kabupatenkota" class="form-control rounded-bottom @error('kabupatenkota') is-invalid @enderror" id="kabupatenkota" placeholder="kabupatenkota"  value="{{ old('kabupatenkota') }}">
                <label for="kabupatenkota">Kabupaten/Kota</label>
                @error('kabupatenkota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="text" name="provinsi" class="form-control rounded-bottom @error('provinsi') is-invalid @enderror" id="provinsi" placeholder="provinsi"  value="{{ old('provinsi') }}">
                <label for="provinsi">Provinsi</label>
                @error('provinsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <select id="selectProvinsiAll" for="provinsi" name="provinsi" class="form-select">
                </select>
                @error('provinsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kabupatenkota" class="form-label">Kabupaten/Kota</label>
                <select id="selectkabupatenkotaAll" for="kabupatenkota" name="kabupatenkota" class="form-select">
                    <option value="">Pilih Provinsi Dahulu</option>
                </select>
                @error('kabupatenkota')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <select class="form-select" id="selectKecamatanAll" for="kecamatan" name="kecamatan">
                    <option value="">Pilih Kabupaten Kota Dahulu</option>
                </select>
                @error('kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            
            


            <button class="w-100 btn btn-lg bg-gradient-primary mt-3" type="submit">Tambah Rute</button>
        </form>
        </main>
    </div>
</div>
@endsection