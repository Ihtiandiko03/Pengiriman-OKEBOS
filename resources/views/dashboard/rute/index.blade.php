@extends('dashboard.layout.pages.main')
@section('container')
    {{-- <h3 style="text-align: center;">Rute</h3>
    <a href="/dashboard/rute/create" class="btn btn-primary my-3">Buat Rute</a>

    <table class="table table-striped table-sm" id="tableRute" style="width: 100%;">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Desa/Kecamatan</th>
              <th scope="col">Kabupaten/Kota</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach ($rute as $item)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->kecamatan }}</td>
          <td>{{ $item->kabupatenkota }}</td>
          <td>
                <a href="/dashboard/rute/{{ $item->id }}/edit" class="btn btn-warning">Ubah</a>
                <form action="/dashboard/rute/{{ $item->id }}" method="post" class="d-inline">
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Rute</p>
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Rute Aktif</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $rute_aktif }}
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
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Rute Tidak Aktif</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $rute_tidakaktif }}
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
    <h6>Data Rute</h6>
  </div>
  <div class="col-12">
    <a class="btn bg-gradient-primary mb-3" href="/dashboard/rute/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Rute</a>
  </div>
      <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tableshowagen" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Desa/Kecamatan</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Kabupaten/Kota</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Provinsi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Status</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($rute as $item)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->kecamatan }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->kabupatenkota }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->provinsi }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if($item->is_active == 1)
                          <span class="text-success text-sm font-weight-bold">Aktif</span>
                        @else
                          <span class="text-danger text-sm font-weight-bold">Tidak Aktif</span>
                        @endif
                      </td>
                      <td class="align-middle text-center">
                        <a href="/dashboard/rute/{{ $item->id }}/edit" class="btn btn-warning">Ubah</a>

                        @if($item->is_active == 1)
                        <form action="/dashboard/rute/{{ $item->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <input type="hidden" name="is_active" value="0">
                          <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Set Tidak Aktif</button>
                        </form>
                        @else
                        <form action="/dashboard/rute/{{ $item->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <input type="hidden" name="is_active" value="1">
                          <button class="btn btn-success" onclick="return confirm('Apakah Anda Yakin?')">Set Aktif</button>
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