@extends('dashboard.layout.pages.main')
@section('container')
    {{-- <h3>Data Akun Logistik</h3>
    <a href="/dashboard/logistik/createakunlogistik" class="btn btn-secondary my-3">Tambah Logistik</a>
    <table class="table table-striped table-sm" id="tableadminlogistik" style="width: 100%;">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Kecamatan</th>
              <th scope="col">Kabupaten/Kota</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach ($logistik as $l)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $l->nama }}</td>
          <td>{{ $l->kecamatan }}</td>
          <td>{{ $l->kabupatenkota }}</td>
          <td>
                <a href="/dashboard/logistik/showakunlogistik/{{ $l->username }}" class="btn btn-info">View</a>
                <a href="/dashboard/logistik/ubahakun/{{ $l->username }}" class="btn btn-warning">Ubah</a>
                <form action="/dashboard/logistik/hapusakun/{{ $l->username }}" method="post" class="d-inline">
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Menghapus Akun Ini?')">Hapus</button>
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Akun Logistik</p>
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Akun Aktif</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $logistik_aktif }}
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Akun Tidak Aktif</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $logistik_tidakaktif }}
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
    <h6>Data Akun Logistik</h6>
  </div>
  <div class="col-12">
    <a class="btn bg-gradient-primary mb-3" href="/dashboard/logistik/createakunlogistik"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Logistik</a>
  </div>
      <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tableshowadminlogistik"  style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nama</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Kecamatan</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Kabupaten/Kota</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Status</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($logistik as $l)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{  $l->nama }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $l->kecamatan }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $l->kabupatenkota }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if($l->is_active == 1)
                          <span class="text-success text-sm font-weight-bold">Aktif</span>
                        @else
                          <span class="text-danger text-sm font-weight-bold">Tidak Aktif</span>
                        @endif

                      </td>
                      <td class="align-middle text-center">
                        <a href="/dashboard/logistik/showakunlogistik/{{ $l->username }}" class="btn btn-info">View</a>
                        <a href="/dashboard/logistik/ubahakun/{{ $l->username }}" class="btn btn-warning">Ubah</a>
                        @if($l->is_active == 1)
                        <form action="/dashboard/logistik/hapusakun/{{ $l->username }}" method="post" class="d-inline">
                          @csrf
                          <input type="hidden" name="is_active" value="0">
                          <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ?')">Set Tidak Aktif</button>
                        </form>
                        @else
                        <form action="/dashboard/logistik/hapusakun/{{ $l->username }}" method="post" class="d-inline">
                          @csrf
                          <input type="hidden" name="is_active" value="1">
                          <button class="btn btn-success" onclick="return confirm('Apakah Anda Yakin ?')">Set Aktif</button>
                        </form>
                        @endif
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
      </div>
</div>

       
@endsection