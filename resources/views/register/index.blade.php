{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    
</head>
<body>
    <div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
        <form action="/register" method="post">
            @csrf
            <div class="form-floating">
                <input type="text" name="perusahaan" class="form-control rounded-top @error('perusahaan') is-invalid @enderror" id="perusahaan" placeholder="perusahaan" required value="{{ old('perusahaan') }}">
                <label for="perusahaan">Perusahaan</label>
                @error('perusahaan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="nama" class="form-control rounded-top @error('nama') is-invalid @enderror" id="nama" placeholder="nama" required value="{{ old('nama') }}">
                <label for="nama">Nama</label>
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"" id="username" placeholder="Username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Alamat Email</label>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="alamat" class="form-control rounded-bottom @error('alamat') is-invalid @enderror"" id="alamat" placeholder="alamat" required value="{{ old('alamat') }}">
                <label for="alamat">Alamat</label>
                @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="kelurahan" class="form-control rounded-bottom @error('kelurahan') is-invalid @enderror"" id="kelurahan" placeholder="kelurahan" required value="{{ old('kelurahan') }}">
                <label for="kelurahan">Kelurahan</label>
                @error('kelurahan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="kecamatan" class="form-control rounded-bottom @error('kecamatan') is-invalid @enderror"" id="kecamatan" placeholder="kecamatan" required value="{{ old('kecamatan') }}">
                <label for="kecamatan">Kecamatan</label>
                @error('kecamatan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="kabupatenkota" class="form-control rounded-bottom @error('kabupatenkota') is-invalid @enderror"" id="kabupatenkota" placeholder="kabupatenkota" required value="{{ old('kabupatenkota') }}">
                <label for="kabupatenkota">Kabupaten/Kota</label>
                @error('kabupatenkota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" name="provinsi" class="form-control rounded-bottom @error('provinsi') is-invalid @enderror"" id="provinsi" placeholder="provinsi" required value="{{ old('provinsi') }}">
                <label for="provinsi">Provinsi</label>
                @error('provinsi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="form-floating">
                <input type="text" name="kode_referal" class="form-control rounded-bottom @error('kode_referal') is-invalid @enderror"" id="kode_referal" placeholder="kode_referal" value="{{ old('kode_referal') }}">
                <label for="kode_referal">Kode Referal</label>
                @error('kode_referal')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

            {{-- <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
        </form>
        <small class="d-block text-center mt-3">Sudah mempunyai akun? <a href="/login">Login!</a></small>
        </main>
    </div>
</div>
</body>
</html> --}} 
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- =====BOX ICONS===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
         <link rel="icon" type="image/png" href="{{ asset('storage/okebos.png') }}">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="{!! asset('css/register_form.css') !!}">

        <title>Register</title>
    </head>
    <body>
         <section>
            <!--===== FORM =====-->
            <div class="box">
                <div class="form">
                    <h2>Daftar</h2>

                    <form action="/register" method="post">
                        @csrf
                        <div class="input">
                            <label for="perusahaan">Perusahaan (Optional)</label>
                            <input type="text" name="perusahaan" class="form-control rounded-top @error('perusahaan') is-invalid @enderror" id="perusahaan" placeholder="perusahaan" value="{{ old('perusahaan') }}">
                            @error('perusahaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control rounded-top @error('nama') is-invalid @enderror" id="nama" placeholder="nama" required value="{{ old('nama') }}">
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="email">Alamat Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="telepon">Telepon</label>
                            <input type="text" name="telepon" class="form-control rounded-bottom @error('telepon') is-invalid @enderror" id="telepon" placeholder="telepon" required>
                            @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control rounded-bottom @error('alamat') is-invalid @enderror" id="alamat" placeholder="alamat" required value="{{ old('alamat') }}">
                            @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="text" name="kelurahan" class="form-control rounded-bottom @error('kelurahan') is-invalid @enderror" id="kelurahan" placeholder="kelurahan" required value="{{ old('kelurahan') }}">
                            @error('kelurahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control rounded-bottom @error('kecamatan') is-invalid @enderror" id="kecamatan" placeholder="kecamatan" required value="{{ old('kecamatan') }}">
                            @error('kecamatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="kabupatenkota">Kabupaten/Kota</label>
                            <input type="text" name="kabupatenkota" class="form-control rounded-bottom @error('kabupatenkota') is-invalid @enderror" id="kabupatenkota" placeholder="kabupatenkota" required value="{{ old('kabupatenkota') }}">
                            @error('kabupatenkota')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" name="provinsi" class="form-control rounded-bottom @error('provinsi') is-invalid @enderror" id="provinsi" placeholder="provinsi" required value="{{ old('provinsi') }}">
                            @error('provinsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input">
                            <input type="submit" value="Register" >
                            {{-- <button type="submit">Daftar</button> --}}
                        </div>
                    </form>
                    <div class="input">
                        <p>Sudah punya akun?  <a href="/login">Masuk</a></p>
                    </div>
{{-- 
                    <form>
                        <div class="input">
                            <span>Username</span>
                            <input type="text" name="">
                        </div>
                        <div class="input">
                            <span>Email</span>
                            <input type="text" name="">
                        </div>
                        <div class="input">
                            <span>Password</span>
                            <input type="password" name="">
                        </div>
                        <div class="input">
                            <span>Masukan Ulang Password</span>
                            <input type="password" name="">
                        </div>
                        <div class="input">
                            <span>Nama</span>
                            <input type="text" name="">
                        </div>
                        <div class="input">
                            <span>Nomor Handphone</span>
                            <input type="text" name="">
                        </div>
                        <div class="input">
                            <input type="submit" value="Daftar" >
                        </div>
                        <div class="input">
                            <p>Sudah punya akun?<a href="#">Masuk</a></p>
                        </div>
                    </form> --}}
                </div>
            </div>
         </section>
    </body>
</html>