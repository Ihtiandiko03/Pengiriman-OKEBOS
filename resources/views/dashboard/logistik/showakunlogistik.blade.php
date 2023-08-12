@extends('dashboard.layout.pages.main')
@section('container')
    {{-- <a href="/dashboard/admin/logistik">Kembali</a>

    <div class="table-responsive col-lg mt-4">
        <table class="table table-striped table-sm">
            <h2 style="text-align:center; margin-bottom:20px;">Akun {{ $data->nama }}</h2>
        <tbody>
        
        <tr>
            <th scope="col">Nama</th>
            <td>{{ $data->nama }}</td>
        </tr>
        <tr>
            <th scope="col">Lokasi Agen</th>
            <td>{{ $data2 }}</td>
        </tr>
        <tr>
            <th scope="col">Username</th>
            <td>{{ $data->username }}</td>
        </tr>
        <tr>
            <th scope="col">Email</th>
            <td>{{ $data->email }}</td>
        </tr>
        <tr>
            <th scope="col">No Telpon</th>
            <td>{{ $data->no_telephone }}</td>
        </tr>
        <tr>
            <th scope="col">Alamat</th>
            <td>{{ $data->alamat }}</td>
        </tr>
        <tr>
            <th scope="col">Kelurahan</th>
            <td>{{ $data->kelurahan }}</td>
        </tr>
        <tr>
            <th scope="col">Kecamatan</th>
            <td>{{ $data->kecamatan }}</td>
        </tr>
        <tr>
            <th scope="col">Kabupaten / Kota</th>
            <td>{{ $data->kabupatenkota }}</td>
        </tr>
        <tr>
            <th scope="col">Provinsi</th>
            <td>{{ $data->provinsi }}</td>
        </tr>
        
          </tbody>
        </table>

    </div> --}}

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
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Lokasi Agen</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data2 }}</span>
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
                      <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Total Pesanan yang Sudah Diproses</th>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $data3->total }}</span>
                      </td>              
                    </tr>
                    <tr>
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