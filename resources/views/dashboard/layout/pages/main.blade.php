<!--
=========================================================
* Okebos Dashboard 
=========================================================

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  {{-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png"> --}}
  <link rel="apple-touch-icon" sizes="76x76" href="{!! asset('assets/img/apple-icon.png') !!}">
  {{-- <link rel="icon" type="image/png" href="../assets/img/favicon.png'"> --}}
  <link rel="icon" type="image/png" href="{{ asset('storage/okebos.png') }}">
  <title>
    Dashboard Okebos
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  {{-- <link href="../assets/css/nucleo-icons.css" rel="stylesheet" /> --}}
  {{-- <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}
  <link href="{!! asset('assets/css/nucleo-icons.css') !!}" rel="stylesheet" />
  <link href="{!! asset('assets/css/nucleo-svg.css') !!}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{!! asset('assets/css/nucleo-svg.css') !!}" rel="stylesheet" />
  {{-- <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <link id="pagestyle" href="{!! asset('assets/css/soft-ui-dashboard.css?v=1.0.7') !!}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  {{-- datatable --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">



</head>

<body class="g-sidenav-show  bg-gray-100">
  <?php 
    if(isset($dataBar)){
      $conf = $dataBar;
      $conf2 = $dataChart;
    } else {
      $conf = json_encode([]);
      $conf2 = json_encode([]);
    }
  ?>
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/" target="_blank">
        {{-- <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> --}}
        <img src="{{ asset('storage/okebos.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="font-weight-bold" style="color: #FFA500">OKE</span>
        <span class="font-weight-bold">BOS</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">



<!-- SIDEBARRRR -->
    @include('dashboard.layout.pages.sidebar')
<!-- END of SIDEBAR -->
  </aside>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    <!-- NAVBARRRRR -->
    @include('dashboard.layout.pages.header')
    <!-- End Navbar -->







    <div class="container-fluid py-4">
      @yield('container')




      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script> by
                <a href="https://okebos.co.id/" class="font-weight-bold" target="_blank">Okebos Bangun Indonesia</a></a>
              </div>
            </div>
            {{-- <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div> --}}
          </div>
        </div>
      </footer>
    </div>



  </main>








  {{-- <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Okebos Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        
      </div>
    </div>
  </div> --}}






  <!--   Core JS Files   -->
  {{-- <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script> --}}
  <script src="{!! asset('assets/js/core/popper.min.js') !!}"></script>
  <script src="{!! asset('assets/js/core/bootstrap.min.js') !!}"></script>
  <script src="{!! asset('assets/js/plugins/perfect-scrollbar.min.js') !!}"></script>
  <script src="{!! asset('assets/js/plugins/smooth-scrollbar.min.js') !!}"></script>
  <script src="{!! asset('assets/js/plugins/chartjs.min.js') !!}"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");
    

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
          label: "Pengguna Aktif Baru",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: JSON.parse('<?php echo $conf; ?>'),
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [{
            label: "Pengiriman",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: JSON.parse('<?php echo $conf2; ?>'),
            maxBarThickness: 6

          },
          // {
          //   label: "Websites",
          //   tension: 0.4,
          //   borderWidth: 0,
          //   pointRadius: 0,
          //   borderColor: "#3A416F",
          //   borderWidth: 3,
          //   backgroundColor: gradientStroke2,
          //   fill: true,
          //   data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
          //   maxBarThickness: 6
          // },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>


</body>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
   $(document).ready(function(){
        $('#selectProvinsiAll').select2({
            placeholder: 'Pilih Provinsi',
            ajax: {
                url: "{{ url('selectProvinsiAll') }}",
                processResults: function({data}){
                  return {
                    results: $.map(data, function(item){
                      return {
                        id: item.province_code,
                        text: item.province_name
                      }
                    })
                  }
                }
            }
        });

        $("#selectProvinsiAll").change(function(){
            let id = $('#selectProvinsiAll').val();

            $('#selectkabupatenkotaAll').select2({
                placeholder: 'Pilih Kabupaten/Kota',
                ajax: {
                    url: "{{ url('selectkabupatenkotaAll') }}/"+ id,
                    processResults: function({data}){
                      return {
                        results: $.map(data, function(item){
                          return {
                            id: item.city,
                            text: item.city
                          }
                        })
                      }
                    }
                }
            });
        });

        $("#selectkabupatenkotaAll").change(function(){
            let id = $('#selectkabupatenkotaAll').val();

            $('#selectKecamatanAll').select2({
                placeholder: 'Pilih Kecamatan',
                ajax: {
                    url: "{{ url('selectKecamatanAll') }}/"+ id,
                    processResults: function({data}){
                      return {
                        results: $.map(data, function(item){
                          return {
                            id: item.sub_district,
                            text: item.sub_district
                          }
                        })
                      }
                    }
                }
            });
        });

        $('#selectProvinsi').select2({
            placeholder: 'Pilih Provinsi',
            ajax: {
                url: "{{ route('provinsi.index') }}",
                processResults: function({data}){
                  return {
                    results: $.map(data, function(item){
                      return {
                        id: item.province_code,
                        text: item.province_name
                      }
                    })
                  }
                }
            }
        });

        $("#selectProvinsi").change(function(){
            let id = $('#selectProvinsi').val();

            $('#selectKabKota').select2({
                placeholder: 'Pilih Kabupaten/Kota',
                ajax: {
                    url: "{{ url('selectKabKota') }}/"+ id,
                    processResults: function({data}){
                      return {
                        results: $.map(data, function(item){
                          return {
                            id: item.city,
                            text: item.city
                          }
                        })
                      }
                    }
                }
            });
        });

        $("#selectKabKota").change(function(){
            let id = $('#selectKabKota').val();

            $('#selectKecamatan').select2({
                placeholder: 'Pilih Kecamatan',
                ajax: {
                    url: "{{ url('selectKecamatan') }}/"+ id,
                    processResults: function({data}){
                      return {
                        results: $.map(data, function(item){
                          return {
                            id: item.sub_district,
                            text: item.sub_district
                          }
                        })
                      }
                    }
                }
            });
        });

        $("#selectKecamatan").change(function(){
            let id = $('#selectKecamatan').val();
            let kabkota = document.getElementById('selectKabKota').value;

            $('#selectKelurahan').select2({
                placeholder: 'Pilih Kelurahan',
                ajax: {
                    url: "{{ url('selectKelurahan') }}/"+ id +"/"+ kabkota,
                    processResults: function({data}){
                      return {
                        results: $.map(data, function(item){
                          return {
                            id: item.urban,
                            text: item.urban
                          }
                        })
                      }
                    }
                }
            });
        });

        $("#selectKelurahan").change(function(){
            let kelurahan = document.getElementById('selectKelurahan').value;
            let kecamatan = document.getElementById('selectKecamatan').value;
            let kabkota = document.getElementById('selectKabKota').value;
            let prov = document.getElementById('selectProvinsi').value;


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                        'kelurahan': kelurahan,
                        'kecamatan': kecamatan,
                        'kabkota': kabkota,
                        'provinsi': prov
                      },
                url: '/getKodePos',
                success: function(val) {
                    // console.log(val);
                    $('#kodepospengirim_get').html(val);
                }
            });
        });

        $('#selectProvinsiPenerima').select2({
            placeholder: 'Pilih Provinsi Penerima',
            ajax: {
                url: "{{ url('selectProvinsi') }}",
                processResults: function({data}){
                  return {
                    results: $.map(data, function(item){
                      return {
                        id: item.province_code,
                        text: item.province_name
                      }
                    })
                  }
                }
            }
        });

        $("#selectProvinsiPenerima").change(function(){
            let id = $('#selectProvinsiPenerima').val();

            $('#selectKabKotaPenerima').select2({
                placeholder: 'Pilih Kabupaten/Kota Penerima',
                ajax: {
                    url: "{{ url('selectKabKota') }}/"+ id,
                    processResults: function({data}){
                      return {
                        results: $.map(data, function(item){
                          return {
                            id: item.city,
                            text: item.city
                          }
                        })
                      }
                    }
                }
            });
        });

        $("#selectKabKotaPenerima").change(function(){
            let id = $('#selectKabKotaPenerima').val();

            $('#selectKecamatanPenerima').select2({
                placeholder: 'Pilih Kecamatan Penerima',
                ajax: {
                    url: "{{ url('selectKecamatan') }}/"+ id,
                    processResults: function({data}){
                      return {
                        results: $.map(data, function(item){
                          return {
                            id: item.sub_district,
                            text: item.sub_district
                          }
                        })
                      }
                    }
                }
            });
        });

        $("#selectKecamatanPenerima").change(function(){
            let id = $('#selectKecamatanPenerima').val();
            let kabkota = document.getElementById('selectKabKotaPenerima').value;

            $('#selectKelurahanPenerima').select2({
                placeholder: 'Pilih Kelurahan Penerima',
                ajax: {
                    url: "{{ url('selectKelurahan') }}/"+ id +"/"+ kabkota,
                    processResults: function({data}){
                      return {
                        results: $.map(data, function(item){
                          return {
                            id: item.urban,
                            text: item.urban
                          }
                        })
                      }
                    }
                }
            });
        });

        $("#selectKelurahanPenerima").change(function(){
            let kelurahan = document.getElementById('selectKelurahanPenerima').value;
            let kecamatan = document.getElementById('selectKecamatanPenerima').value;
            let kabkota = document.getElementById('selectKabKotaPenerima').value;
            let prov = document.getElementById('selectProvinsiPenerima').value;


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                        'kelurahan': kelurahan,
                        'kecamatan': kecamatan,
                        'kabkota': kabkota,
                        'provinsi': prov
                      },
                url: '/getKodePosPenerima',
                success: function(val) {
                    // console.log(val);
                    $('#kodepospenerima_get').html(val);
                }
            });
        });

        $('#tablePengiriman').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tableadminlogistik').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablelistpengiriman').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tableRute').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablehelpdesk').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablekurirjemputdalam').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablekurirjemputantar').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tableveriflogdalam').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tableveriflogantar').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tableveriflogagen').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablesettanggallogdalam').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablesettanggallogantar').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablesettanggallogagen').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablediantardalam').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablediantarluar').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tableshowagen').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tableshowadminlogistik').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tableshowkurir').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablepengiriman').DataTable({
            scrollX: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
        });
        $('#tablelistpengirimans').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#tablerute').DataTable({
            dom: 'Bfrtip',
            scrollX: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });

</script>

</html>