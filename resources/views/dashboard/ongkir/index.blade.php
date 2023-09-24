@extends('dashboard.layout.pages.main')
@section('container')

<div class="card mb-4 mt-4 px-3 py-3">
  <div class="card-header text-uppercase text-sm font-weight-bolder mx-auto">
    <h6>Data Ongkir</h6>
  </div>
  <div class="col-12">
    <a class="btn bg-gradient-primary mb-3" href="/dashboard/ongkir/tambahongkir"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Ongkir</a>
  </div>
      <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tableshowagen" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Rute Awal</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Rute Tujuan</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Harga Ongkir</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Promo</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Diskon</th>
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
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->kecamatan_awal }}, {{ $item->kabkota_awal }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->kecamatan_tujuan }}, {{ $item->kabkota_awal }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->harga }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->promo }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $item->diskon }}</span>
                      </td>
                      
                      <td class="align-middle text-center">
                        <a href="/dashboard/ongkir/ubahongkir/{{ $item->id_ongkir }}" class="btn btn-warning">Ubah</a>
                        <form action="/dashboard/ongkir/hapusongkir/{{ $item->id_ongkir }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
      </div>
</div>

@endsection