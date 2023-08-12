<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- =====BOX ICONS===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
         <link rel="icon" type="image/png" href="{{ asset('storage/okebos.png') }}">

        <!-- ===== CSS ===== -->
        <!-- <link rel="stylesheet" href="assets/css/login_form.css"> -->
        <link rel="stylesheet" href="{!! asset('css/login_form.css') !!}" />

        <title>OkeBos</title>
    </head>
    <body>
         <section>
            <!--===== BOX IMAGES =====-->
            <div class="image__box">
                <!--<img src="{{ asset('storage/okebos2.png') }}" width="500" height="500" style="margin-left: 100px; margin-top:100px;">-->
            </div>
            <!--===== FORM =====-->
            <div class="box">
                <div class="form">
                    <h2>Login</h2>
                    <form action="/login" method="post">
                        @csrf
                        <div class="input">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="okebos@example.com" autofocus required value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="input">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        
                        <div class="input">
                            <input type="submit" value="Masuk" >
                        </div>
                        <div class="input">
                            <p>Tidak punya akun? <a href="/register">Daftar</a></p>
                            <p>Lupa Password? <a href="/login/lupapassword">Klik Disini</a></p>

                        </div>
                        {{-- <button class="input" type="submit">Login</button> --}}
                    </form>

                </div>
            </div>
         </section>
    </body>
</html>