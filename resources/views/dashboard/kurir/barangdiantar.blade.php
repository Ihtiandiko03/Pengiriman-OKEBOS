@extends('dashboard.layout.pages.main')
@section('container')
  <h2 style="text-align:center">Barang Belum Diantar</h2>
  <h3 style="text-align:center">Pengiriman Dalam Kota/Kabupaten</h3>
  <br>
    {{-- <div class="table-responsive col-lg">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Resi</th>
              <th scope="col">Dibuat</th>
              <th scope="col">Detail</th>
              <th scope="col">Ambil Pesanan</th>
              <th scope="col">Pesanan Diterima</th>

            </tr>
          </thead>
          <tbody>
        @foreach ($pengirimanDalamWilayah as $pengirimanku)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pengirimanku->nomor_resi }}</td>
          <td>{{ $pengirimanku->created_at }}</td>
          <td><a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="btn btn-info">Lihat</a></td>
          @if ($pengirimanku->status == 'Verifikasi Penjadwalan Pengiriman')
              <td> <a href="/dashboard/kurir/barangdiantar/proses/{{ $pengirimanku->nomor_resi }}" class="btn btn-success">Antar Barang</a> </td>
              <td>Belum</td>
          @elseif($pengirimanku->status == 'Verifikasi Pesanan Diterima')
              <td>Pesanan Diterima</td>
              <td>Pesanan Diterima</td>
          @else
              <td>Sedang Diantar</td>
              <td> <a href="/dashboard/kurir/pesananditerima/{{ $pengirimanku->nomor_resi }}" class="btn btn-warning">Pesanan Diterima</a> </td>
          @endif
        </tr>
        @endforeach
          </tbody>
        </table>
        
    </div> --}}

        <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablediantardalam" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nomor Resi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Dibuat</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Detail</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Ambil Pesanan</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Pesanan Diterima</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($pengirimanDalamWilayah as $pengirimanku)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->nomor_resi }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->created_at }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                          Lihat
                        </a>
                      </td>
                      @if ($pengirimanku->status == 'Verifikasi Penjadwalan Pengiriman')
                        <td class="align-middle text-center">
                          <a href="/dashboard/kurir/barangdiantar/proses/{{ $pengirimanku->nomor_resi }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Antar Barang
                          </a>
                        </td>
                        <td class="align-middle text-center text-sm"><span class="text-secondary text-sm font-weight-bold">Belum</span></td>
                      @elseif($pengirimanku->status == 'Verifikasi Pesanan Diterima')
                        <td class="align-middle text-center text-sm"><span class="text-success text-sm font-weight-bold">Pesanan Diterima</span></td>
                        <td class="align-middle text-center text-sm"><span class="text-success text-sm font-weight-bold">Pesanan Diterima</span></td>
                      @else
                        <td class="align-middle text-center text-sm"><span class="text-secondary text-sm font-weight-bold">Sedang Diantar</span></td>
                        <td class="align-middle text-center">
                          <a href="/dashboard/kurir/pesananditerima/{{ $pengirimanku->nomor_resi }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Pesanan Diterima
                          </a>
                        </td>
                      @endif
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>

  <h3 style="text-align:center; margin-top:50px">Pengiriman Antar Kota/Kabupaten</h3>
      {{-- <div class="table-responsive col-lg">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Resi</th>
              <th scope="col">Dibuat</th>
              <th scope="col">Detail</th>
              <th scope="col">Ambil Pesanan</th>
              <th scope="col">Pesanan Diterima</th>

            </tr>
          </thead>
          <tbody>
        @foreach ($pengirimanAntarWilayah as $pengirimanku)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pengirimanku->nomor_resi }}</td>
          <td>{{ $pengirimanku->created_at }}</td>
          <td><a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="btn btn-info">Lihat</a></td>
          @if ($pengirimanku->status == 'Verifikasi Penjadwalan Pengiriman')
              <td> <a href="/dashboard/kurir/barangdiantar/proses/{{ $pengirimanku->nomor_resi }}" class="btn btn-success">Antar Barang</a> </td>
              <td>Belum</td>
          @elseif($pengirimanku->status == 'Verifikasi Pesanan Diterima')
              <td>Pesanan Diterima</td>
              <td>Pesanan Diterima</td>
          @else
              <td>Sedang Diantar</td>
              <td> <a href="/dashboard/kurir/pesananditerima/{{ $pengirimanku->nomor_resi }}" class="btn btn-warning">Pesanan Diterima</a> </td>
          @endif
        </tr>
        @endforeach
          </tbody>
        </table>
        
      </div> --}}

          <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablediantarluar" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nomor Resi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Dibuat</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Detail</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Ambil Pesanan</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Pesanan Diterima</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($pengirimanAntarWilayah as $pengirimanku)
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $loop->iteration }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->nomor_resi }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-sm font-weight-bold">{{ $pengirimanku->created_at }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                          Lihat
                        </a>
                      </td>
                      @if ($pengirimanku->status == 'Verifikasi Penjadwalan Pengiriman')
                        <td class="align-middle text-center">
                          <a href="/dashboard/kurir/barangdiantar/proses/{{ $pengirimanku->nomor_resi }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Antar Barang
                          </a>
                        </td>
                        <td class="align-middle text-center text-sm"><span class="text-secondary text-sm font-weight-bold">Belum</span></td>
                      @elseif($pengirimanku->status == 'Verifikasi Pesanan Diterima')
                        <td class="align-middle text-center text-sm"><span class="text-success text-sm font-weight-bold">Pesanan Diterima</span></td>
                        <td class="align-middle text-center text-sm"><span class="text-success text-sm font-weight-bold">Pesanan Diterima</span></td>
                      @else
                        <td class="align-middle text-center text-sm"><span class="text-secondary text-sm font-weight-bold">Sedang Diantar</span></td>
                        <td class="align-middle text-center">
                          <a href="/dashboard/kurir/pesananditerima/{{ $pengirimanku->nomor_resi }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Pesanan Diterima
                          </a>
                        </td>
                      @endif
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
@endsection