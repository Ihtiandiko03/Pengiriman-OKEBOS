@extends('dashboard.layout.pages.main')
@section('container')



<div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Tiket</p>
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Belum Dikerjakan</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $belum_dikerjakan }}
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Sedang Dikerjakan</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $sedang_dikerjakan }}
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Selesai Dikerjakan</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $selesai_dikerjakan }}
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
              <h6>Daftar Tiket</h6>
            </div>
            <div class="col-12">
                <a class="btn bg-gradient-primary mb-3" href="/dashboard/helpdesk/buattiket"><i class="fas fa-plus"></i>&nbsp;&nbsp;Buat Tiket</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablehelpdesk" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No Tiket</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Tanggal Tiket</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nama</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Teknisi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Status</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Waktu Selesai</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($data as $item)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->no_tiket }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->created_at }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->nama }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->teknisi }}</span>
                      </td>
                      <td class="align-middle text-center">
                        @if($item->status == 'Belum Dikerjakan')
                          <span class="badge bg-gradient-secondary">{{ $item->status }}</span>
                        @elseif($item->status == 'Sedang Dikerjakan')
                          <span class="badge bg-gradient-info">{{ $item->status }}</span>
                        @else
                          <span class="badge bg-gradient-success">{{ $item->status }}</span>
                        @endif
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->updated_at }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <a href="/dashboard/helpdesk/lihattiket/{{ $item->no_tiket }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                          Lihat
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
      </div>
      

@endsection