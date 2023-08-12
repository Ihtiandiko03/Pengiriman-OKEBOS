<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Admin</title>
        <link
            rel="stylesheet"
            href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
        />
        <link rel="stylesheet" href="index.css" />
    </head>
    <body>
        <input type="checkbox" id="nav-toggle" />
        

        <div class="main-content">
            <main>
                {{-- <div class="cards">
                    <div class="card-single">
                        <div>
                            <h1>54</h1>
                            <span>Saldo Kantor Pusat</span>
                        </div>
                        <div>
                            <span class="las la-users"></span>
                        </div>
                    </div>
                    <div class="card-single">
                        <div>
                            <h1>$12</h1>
                            <span>Saldo Bonus Kantor Pusat</span>
                        </div>
                        <div>
                            <span class="lab la-google-wallet"></span>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="recent-grid">
                    <div class="projects">
                        <div class="card">
                            <div class="card-header">
                                <h3>Jumlah User</h3>

                                <button>
                                    See all
                                    <span class="las la-arrow-right"> </span>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>id</td>
                                                <td>Nama</td>
                                                <td>Asal</td>
                                                <td>Status</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>111</td>
                                                <td>Hafizh Dananjaya</td>
                                                <td>Lampung Timur</td>
                                                <td>Agen</td>
                                                <td>
                                                    <span class="status"></span>
                                                    review
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>112</td>
                                                <td>Muhammad Ihtiandiko</td>
                                                <td>Metro</td>
                                                <td>Kurir</td>
                                                <td>
                                                    <span class="status"></span>
                                                    review
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>113</td>
                                                <td>Faqih Wicaksono</td>
                                                <td>Metro</td>
                                                <td>Kurir</td>
                                                <td>
                                                    <span class="status"></span>
                                                    review
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="customers">
                        <div class="card">
                            <div class="card-header">
                                <h3>Online</h3>

                                <button>
                                    See all
                                    <span class="las la-arrow-right"> </span>
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="customer">
                                    <div class="info">
                                        <img
                                            src="img/Tes.JPG"
                                            width="40px"
                                            height="40px"
                                            alt=""
                                        />
                                    </div>
                                    <div>
                                        <h4>Hafizh Londata</h4>
                                        <small>Ceo</small>
                                    </div>
                                    <div class="contact">
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>
                                <div class="customer">
                                    <div class="info">
                                        <img
                                            src="img/Tes.JPG"
                                            width="40px"
                                            height="40px"
                                            alt=""
                                        />
                                    </div>
                                    <div>
                                        <h4>Hafizh Londata</h4>
                                        <small>online</small>
                                    </div>
                                    <div>
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>
                                <div class="customer">
                                    <div class="info">
                                        <img
                                            src="img/Tes.JPG"
                                            width="40px"
                                            height="40px"
                                            alt=""
                                        />
                                    </div>
                                    <div>
                                        <h4>Hafizh Londata</h4>
                                        <small>Ceo</small>
                                    </div>
                                    <div>
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                @include('layouts.header')

                <div class="container-fluid">
                <div class="row">
                    @include('layouts.sidebar')

                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('container')
                    </main>
                </div>
                </div>


                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

                    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
                    <script src="/js/dashboard.js"></script>
            </main>
        </div>
    </body>
</html>
