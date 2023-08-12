{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    
    <title>Document</title>
</head>
<body>
    <div class="row justify-content-center">
    <div class="col-md-4">

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
        <form action="/login" method="post">
            @csrf
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
        <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
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
                        </div>
                        {{-- <button class="input" type="submit">Login</button> --}}
                    </form>
                    <!-- <form>
                        <div class="input">
                            <span>Username/Email</span>
                            <input type="text" name="">
                        </div>
                        <div class="input">
                            <span>Password</span>
                            <input type="password" name="">
                        </div>
                        <div class="remember">
                            <label><input type="checkbox" name="">Remember me</label>
                        </div>
                        <div class="input">
                            <input type="submit" value="Masuk" >
                        </div>
                        <div class="input">
                            <p>Tidak punya akun?<a href="#">Daftar</a></p>
                        </div>
                    </form> -->
                </div>
            </div>
         </section>
    </body>
</html>