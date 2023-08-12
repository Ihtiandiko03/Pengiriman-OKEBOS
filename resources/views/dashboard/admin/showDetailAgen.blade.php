@extends('dashboard.layout.pages.main')
@section('container')
{{-- <div class="table-responsive col-lg-8 mt-4">
    @foreach ($detailKurir as $kurir)
        <table class="table table-striped table-sm">
            <h2 style="text-align:center; margin-bottom:20px;">Akun {{ $kurir->nama }}</h2>
        <tbody>
        
        <tr>
            <th scope="col">Nama</th>
            <td>{{ $kurir->nama }}</td>
        </tr>
        <tr>
            <th scope="col">Username</th>
            <td>{{ $kurir->username }}</td>
        </tr>
        <tr>
            <th scope="col">Email</th>
            <td>{{ $kurir->email }}</td>
        </tr>
        <tr>
            <th scope="col">No Telpon</th>
            <td>{{ $kurir->no_telephone }}</td>
        </tr>
        <tr>
            <th scope="col">Kurir Antar</th>
            <td>{{ $kurir->kurir_antar ? 'Iya' : 'Tidak' }}</td>
        </tr>
        <tr>
            <th scope="col">Kurir Jemput</th>
            <td>{{ $kurir->nama ? 'Iya' : 'Tidak' }}</td>
        </tr>
        <tr>
            <th scope="col">Alamat</th>
            <td>{{ $kurir->alamat }}</td>
        </tr>
        <tr>
            <th scope="col">Kelurahan</th>
            <td>{{ $kurir->kelurahan }}</td>
        </tr>
        <tr>
            <th scope="col">Kecamatan</th>
            <td>{{ $kurir->kecamatan }}</td>
        </tr>
        <tr>
            <th scope="col">Kabupaten / Kota</th>
            <td>{{ $kurir->kabupatenkota }}</td>
        </tr>
        <tr>
            <th scope="col">Provinsi</th>
            <td>{{ $kurir->provinsi }}</td>
        </tr>
        <tr>
            <th scope="col">Saldo</th>
            <td>{{ $kurir->saldo }}</td>
        </tr>
        
          </tbody>
        </table>

        @endforeach
</div>
<a href="/dashboard/admin/driver">Kembali</a> --}}

    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                {{ $data->nama}}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                {{ $data->kecamatan }}, {{ $data->kabupatenkota }}        
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4 mx-2">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pengiriman</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $data5->total }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengiriman Baru Dibuat</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $data6->total }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengiriman Sedang Diproses</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $data7->total }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengiriman Selesai</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $data8->total }}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12 col-xl">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Data Agen</h6>
            </div>
            <div class="card-body p-3">
              
              <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <tbody>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Nama</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data->nama }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">username</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data->username }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Email</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data->email }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Nomor HP</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data->no_telephone }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Alamat</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data->alamat }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Kelurahan</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data->kelurahan }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Kecamatan</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data->kecamatan }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Kabupaten/Kota</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data->kabupatenkota }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Provinsi</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data->provinsi }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Status Agen</th>
                      <td class="align-middle text-center text-sm">
                        @if($data->is_active == 1)
                            <span class="text-success text-sm font-weight-bold">Aktif</span>
                        @else
                            <span class="text-danger text-sm font-weight-bold">Tidak Aktif</span>
                        @endif
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Total Kurir</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data2->total }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Total Kurir Aktif</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data3->total }}</span>
                      </td>              
                    </tr>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Total Kurir Tidak Aktif</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data4->total }}</span>
                      </td>              
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            </div>
          </div>
        </div>
      </div>
    </div>

@endsection