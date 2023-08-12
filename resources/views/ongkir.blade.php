<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- =====BOX ICONS===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="{!! asset('css/landing_page.css') !!}">
         <link rel="icon" type="image/png" href="{{ asset('storage/okebos.png') }}">
         <style>
  /* Table container */
  .table-container {
    width: 100%;
    padding: 20px;
  }

  /* Table styles */
  .styled-table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ccc;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
  }

  .styled-table th,
  .styled-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  .styled-table th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  /* Alternate row colors */
  .styled-table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  /* Hover effect */
  .styled-table tbody tr:hover {
    background-color: #e0e0e0;
  }
</style>

        <title>OkeBos</title>
    </head>
    <body>
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

        <main class="l-main" style="margin-top: 100px; margin-right: 100px;">
            <div class="kotak" style="margin-left:10%">
                <h1 style="text-align: center; margin-bottom: 20px;">Ongkos Kirim</h1>
                <table class="styled-table">
                    <thead>
                    <tr>
                        <th>Rute Awal</th>
                        <th>Rute Tujuan</th>
                        <th>Harga per Kg</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="2" style="text-align: center;">Dalam Kota</td>
                        <td>Rp. 10.000,00 </td>
                    </tr>
                    <tr>
                        <td>Metro</td>
                        <td>Bandar Lampung</td>
                        <td>Rp. 15.000,00 </td>
                    </tr>
                    <tr>
                        <td>Metro</td>
                        <td>Kalianda</td>
                        <td>Rp. 30.000,00 </td>
                    </tr>
                    <tr>
                        <td>Bandar Lampung</td>
                        <td>Kalianda</td>
                        <td>Rp. 20.000,00 </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </main>

        <!--===== GSAP =====-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}

        <!--===== MAIN JS =====-->
        <script src="{!! asset('js/landing_page.js') !!}"></script>
    </body>
</html>