@extends('dashboard.layout.pages.main')
@section('container')
    {{-- <a href="/dashboard/admin/createAgen" class="btn bg-gradient-primary my-3">Tambah Agen</a> --}}


    {{-- <table class="table table-striped table-sm" id="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach ($agen as $agen)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $agen->nama }}</td>
          <td>
                <a href="/dashboard/admin/{{ $agen->username }}" class="btn btn-info">View</a>
                <a href="/dashboard/admin/{{ $agen->username }}/edit" class="btn btn-warning">Ubah</a>
                <form action="/dashboard/admin/{{ $agen->username }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                </form>
          </td>
        </tr>
        @endforeach
          </tbody>
    </table> --}}


<div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Agen</p>
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
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Agen Aktif</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $agen_aktif }}
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
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Agen Tidak Aktif</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $agen_tidakaktif }}
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

<div class="card mb-4 mt-4 px-3 py-3">
  <div class="card-header text-uppercase text-sm font-weight-bolder mx-auto">
    <h6>Data Agen</h6>
  </div>
  <div class="col-12">
    <a class="btn bg-gradient-primary mb-3" href="/dashboard/admin/createAgen"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Agen</a>
  </div>
      <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tableshowagen" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nama</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Lokasi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nomor HP</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Status</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($agen as $kantor_cabang)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $kantor_cabang->nama }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $kantor_cabang->kecamatan }}, {{ $kantor_cabang->kabupatenkota }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $kantor_cabang->no_telephone }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if($kantor_cabang->is_active == 1)
                          <span class="text-success text-sm font-weight-bold">Aktif</span>
                        @else
                          <span class="text-danger text-sm font-weight-bold">Tidak Aktif</span>
                        @endif

                      </td>
                      <td class="align-middle text-center">
                        <a href="/dashboard/admin/{{ $kantor_cabang->username }}" class="btn btn-info">Lihat</a>
                        <a href="/dashboard/admin/{{ $kantor_cabang->username }}/edit" class="btn btn-warning">Ubah</a>
                        {{-- <form action="/dashboard/admin/{{ $kantor_cabang->username }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                        </form> --}}
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
      </div>
</div>


@endsection