@extends('dashboard.layout.pages.main')
@section('container')
    <div class="row justify-content-center">
    <div class="col-md-8">
        <main class="form-registration">
            <h1 class="h3 my-3 fw-normal text-center">Form Tambah Logistik</h1>
        <form action="/dashboard/logistik/createlogistik" method="post">
            @csrf

    
           <input type="hidden" id="agen" name="agen" value="1">


            <div class="mb-3">
                <label for="kantor_cabang" class="form-label">Kantor Cabang</label>
                <select class="form-select" name="kantor_cabang" id="kantor_cabang">
                    @foreach ($rutes as $rute)
                        @if (old('rute') == $rute->id)
                            <option value="{{ $rute->id }}" selected>{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                        @else
                            <option value="{{ $rute->id }}">{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-floating">
                <input type="text" name="nama" class="form-control rounded-top @error('nama') is-invalid @enderror" id="nama" placeholder="nama" required value="{{ old('nama') }}">
                <label for="nama">Nama</label>
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Alamat Email</label>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="alamat" class="form-control rounded-bottom @error('alamat') is-invalid @enderror" id="alamat" placeholder="alamat" required value="{{ old('alamat') }}">
                <label for="alamat">Alamat</label>
                @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="kelurahan" class="form-control rounded-bottom @error('kelurahan') is-invalid @enderror" id="kelurahan" placeholder="kelurahan" required value="{{ old('kelurahan') }}">
                <label for="kelurahan">Kelurahan</label>
                @error('kelurahan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="kecamatan" class="form-control rounded-bottom @error('kecamatan') is-invalid @enderror" id="kecamatan" placeholder="kecamatan" required value="{{ old('kecamatan') }}">
                <label for="kecamatan">Kecamatan</label>
                @error('kecamatan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="kabupatenkota" class="form-control rounded-bottom @error('kabupatenkota') is-invalid @enderror" id="kabupatenkota" placeholder="kabupatenkota" required value="{{ old('kabupatenkota') }}">
                <label for="kabupatenkota">Kabupaten/Kota</label>
                @error('kabupatenkota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="provinsi" class="form-control rounded-bottom @error('provinsi') is-invalid @enderror" id="provinsi" placeholder="provinsi" required value="{{ old('provinsi') }}">
                <label for="provinsi">Provinsi</label>
                @error('provinsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="no_telephone" class="form-control rounded-top @error('no_telephone') is-invalid @enderror" id="no_telephone" placeholder="no_telephone" required value="{{ old('no_telephone') }}">
                <label for="no_telephone">Nomor Telpon</label>
                @error('no_telephone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <input type="hidden" name="logistik" class="form-control" id="logistik" value="1">
            <button type="submit" class="btn bg-gradient-primary">Tambah Logistik</button>
        </form>
        </main>
    </div>
</div>
@endsection