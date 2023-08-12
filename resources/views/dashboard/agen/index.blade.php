@extends('dashboard.layout.pages.main')
@section('container')

      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Pengiriman Barang</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $total }}
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
                      {{ $dibuat }}
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
                      {{ $proses }}
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pengiriman Selesai Dikerjakan</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $selesai }}
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

    <div class="card mb-4 mt-4 px-3">
            
            <div class="card-header mx-auto">
              <h6>Daftar Pengiriman Keluar</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablelistpengirimans" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nomor Resi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nama Barang</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Kota Tujuan</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Dibuat</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Status</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($pengiriman as $pengirimanku)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->nomor_resi }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->nama_barang }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->kabupatenkota_penerima }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->created_at }}</span>
                      </td>
                      <td class="align-middle text-center">
                        @if($pengirimanku->status == 'Dibuat')
                          <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->status }}</span>
                        @elseif($pengirimanku->status == 'Diproses')
                          <span class="text-warning text-sm font-weight-bold">{{ $pengirimanku->status }}</span>
                        @else
                          <span class="text-success text-sm font-weight-bold">{{ $pengirimanku->status }}</span>
                        @endif
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="/dashboard/logistik/lihatdetailpengiriman/{{ $pengirimanku->id }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">Detail</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
    </div>
@endsection