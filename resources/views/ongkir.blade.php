<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- =====BOX ICONS===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}

        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="{!! asset('css/landing_page.css') !!}">
         <link rel="icon" type="image/png" href="{{ asset('storage/okebos.png') }}">
         <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }

            .form-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                color: #333;
            }

            form {
                display: flex;
                flex-direction: column;
            }

            label {
                margin-bottom: 8px;
                color: #555;
            }

            input {
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 16px;
            }

            button {
                padding: 10px;
                background-color: #4caf50;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            button:hover {
                background-color: #45a049;
            }

            select {
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 4px;
                font-size: 16px;
            }
         </style>

        <title>OkeBos</title>
    </head>
    <body style="font-family: Poppins">
        <!--===== HEADER =====-->
        <header class="l-header">
            <nav class="nav bd-grid">
                <div>
                    <img class="nav__logo" src="{!! asset('img/OkeBos.png') !!}">
                </div>
                
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>

                <div class="nav__menu" id="nav-menu">
                    <div class="nav__close" id="nav-close">
                        <i class='bx bx-x'></i>
                    </div>

                    <ul class="nav__list">
                        <li class="nav__item"><a href="/" class="nav__link active">Home</a></li>
                        <li class="nav__item"><a href="/login" class="nav__link">Pengiriman</a></li>
                        <li class="nav__item"><a href="/ongkir" class="nav__link">Cek Ongkir</a></li>
                        <li class="nav__item"><a href="/lacak" class="nav__link">Lacak</a></li>

                        @auth
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <a  class="login__button"></a><button class="btn btn-danger" style="background-color: #f44336; border: none; color:white; padding: 10px 20px; text-allign:center; text-decoration: none; margin 4px 2px; border-radius: 7px; font-weight: bold;" type="submit">Logout</button>
                            </form>
                        </li>
                        @else
                        <li class="nav__item"><a class="login__button" href="/login">Login</a></li>
                        @endauth
                        
                    </ul>
                </div>
            </nav>
        </header>

        <main class="l-main" style=" margin-right: 100px;">
            <div class="kotak" style="margin-left:10%">
                <h1 style="text-align: center; margin-bottom: 20px;">Cek Ongkos Kirim</h1>
                <form action="#" method="POST">
                    <label for="rute_awal">Rute Awal:</label>
                    <select id="rute_awal" name="rute_awal" onchange="functionCekOngkir()">
                        <option value="">Pilih</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->rute_awal }}">{{ $item->kecamatan_awal}}, {{ $item->kabkota_awal }}</option>
                        @endforeach
                    </select>

                    <label for="rute_tujuan">Rute Tujuan:</label>
                    <select id="rute_tujuan" name="rute_tujuan" onchange="functionCekOngkir()">
                        <option value="">Pilih</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->rute_awal }}">{{ $item->kecamatan_awal}}, {{ $item->kabkota_awal }}</option>
                        @endforeach
                    </select>

                    <label for="berat_barang">Berat Barang (Kg):</label>
                    <input type="number" id="berat_barang" name="berat_barang" required onchange="functionCekOngkir()">

                    <label for="harga" style="text-align: center;">Estimasi Biaya</label>
                    <div name="hasil" id="hasil">
                        <h1 style="text-align: center;">Rp. 0</h1>
                    </div>

                    {{-- <button type="submit">Submit</button> --}}
                </form>
            </div>
        </main>

        <!--===== GSAP =====-->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

        <!--===== MAIN JS =====-->
        <script src="{!! asset('js/landing_page.js') !!}"></script>

        
        <script type="text/javascript">
            function functionCekOngkir() {
                var berat_barang = document.getElementById("berat_barang").value;
                var rute_awal = document.getElementById("rute_awal").value;
                var rute_tujuan = document.getElementById("rute_tujuan").value;

                var formData = {
                    metode_pembayaran: 'None',
                    berat_barang: berat_barang,
                    rute_awal: rute_awal,
                    rute_tujuan: rute_tujuan
                };

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: formData,
                    url: '/dashboard/logistik/metode',
                    success: function(val) {
                        // console.log(val);
                        $('#hasil').html(val);
                    }
                });
            }
        </script>
    </body>
</html>