@extends('dashboard.layout.pages.main')

@section('container')
  {{-- <h3>Data Kurir</h3>
  <a href="/dashboard/admin/create" class="btn btn-primary my-3">Tambah Kurir</a>

  <table class="table table-striped table-sm" id="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama</th>
              <th scope="col">Kurir Antar</th>
              <th scope="col">Kurir Jemput</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
        @foreach ($kurir as $k)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $k->nama }}</td>
          <td>{{ $k->kurir_antar ? 'Iya' : 'Tidak' }}</td>
          <td>{{ $k->kurir_jemput ? 'Iya' : 'Tidak' }}</td>
          <td>
                <a href="/dashboard/admin/{{ $k->username }}" class="btn btn-info">View</a>
                <a href="/dashboard/ubahprofilkurir?username={{ $k->username }}" class="btn btn-warning">Ubah</a>
                <form action="/dashboard/admin/{{ $k->username }}" method="post" class="d-inline">
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
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Kurir Okebos</p>
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
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Kurir Antar Jemput</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $kurirantarjemput }}
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
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Kurir Antar</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $kurirantar }}
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
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Kurir Jemput</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $kurirjemput }}
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
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Kurir Aktif</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $kuriraktif }}
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
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Kurir Tidak Aktif</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ $kurirtidakaktif }}
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
    <h6>Data Kurir</h6>
  </div>
  <div class="col-12">
    <a class="btn bg-gradient-primary mb-3" href="/dashboard/admin/create"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Kurir</a>
  </div>
      <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tableshowkurir" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nama</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Lokasi Agen</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Kurir Antar</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Kurir Jemput</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Status</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($kurir as $k)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $k->nama }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $k->kec }}, {{ $k->kabkota }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $k->kurir_antar ? 'Iya' : 'Tidak' }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $k->kurir_jemput ? 'Iya' : 'Tidak' }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        @if($k->is_active == 1)
                          <span class="text-success text-sm font-weight-bold">Aktif</span>
                        @else
                          <span class="text-danger text-sm font-weight-bold">Tidak Aktif</span>
                        @endif

                      </td>
                      <td class="align-middle text-center">
                        <a href="/dashboard/kurir/lihatdetailkurir/{{ $k->username }}" class="btn btn-info">View</a>
                        <a href="/dashboard/ubahprofilkurir?username={{ $k->username }}" class="btn btn-warning">Ubah</a>
                        @if($k->is_active == 1)
                        <form action="/dashboard/admin/{{ $k->username }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <input type="hidden" name="is_active" value="0">
                          <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Set Tidak Aktif</button>
                        </form>
                        @else
                        <form action="/dashboard/admin/{{ $k->username }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <input type="hidden" name="is_active" value="1">
                          <button class="btn btn-success" onclick="return confirm('Apakah anda yakin?')">Set Aktif</button>
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