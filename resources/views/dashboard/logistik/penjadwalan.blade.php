@extends('dashboard.layout.pages.main')
@section('container')

<h2>Penjadwalan Pengiriman Barang</h2>
<hr>
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
                <th scope="col">Tanggal Pengiriman</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($pengirimanDalamWilayah as $pengirimanku)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengirimanku->nomor_resi }}</td>
                <td>{{ $pengirimanku->created_at }}</td>
                <td><a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="btn btn-info">Lihat</a></td>
                <td>
                @if ($pengirimanku->status == "Verifikasi Penjadwalan Pengiriman")
                    Pengiriman Sudah Dijadwalkan
                @else
                    <a href="/dashboard/logistik/penjadwalanbarang/{{ $pengirimanku->nomor_resi }}" class="btn btn-success">Set Tanggal Pengiriman</a>
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div> --}}

        <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablesettanggallogdalam" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nomor Resi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Dibuat</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Detail</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Tanggal Pengiriman</th>
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
                     @if ($pengirimanku->status == "Verifikasi Penjadwalan Pengiriman")
                        <td class="align-middle text-center text-sm"><span class="text-secondary text-sm font-weight-bold">Pengiriman Sudah Dijadwalkan</span></td>
                      @else
                        <td class="align-middle text-center">
                          <a href="/dashboard/logistik/penjadwalanbarang/{{ $pengirimanku->nomor_resi }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Set Tanggal Pengiriman
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
                <th scope="col">Status Barang Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengirimanAntarWilayah as $pengirimanku)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengirimanku->nomor_resi }}</td>
                <td>{{ $pengirimanku->created_at }}</td>
                <td><a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="btn btn-info">Lihat</a></td>
                <td>
                @if ($pengirimanku->status == "Verifikasi Penjadwalan Pengiriman" || $pengirimanku->status =="Verifikasi Penjadwalan Pengiriman Barang Antar Kabupaten/Kota" || $pengirimanku->status == "Verifikasi Pesanan Diterima")
                    Pengiriman Sudah Dijadwalkan
                @else
                    <a href="/dashboard/logistik/penjadwalanbarangantarkota/{{ $pengirimanku->nomor_resi }}" class="btn btn-success">Set Tanggal Pengiriman</a>
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div> --}}
        <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablesettanggallogantar" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nomor Resi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Dibuat</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Detail</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Status Barang Masuk</th>
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
                      @if ($pengirimanku->status == "Verifikasi Penjadwalan Pengiriman" || $pengirimanku->status =="Verifikasi Penjadwalan Pengiriman Barang Antar Kabupaten/Kota" || $pengirimanku->status == "Verifikasi Pesanan Diterima")
                        <td class="align-middle text-center text-sm"><span class="text-secondary text-sm font-weight-bold">Pengiriman Sudah Dijadwalkan</span></td>
                      @else
                        <td class="align-middle text-center">
                          <a href="/dashboard/logistik/penjadwalanbarangantarkota/{{ $pengirimanku->nomor_resi }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Set Tanggal Pengiriman
                          </a>
                        </td>
                      @endif
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>

<h3 style="text-align: center; margin-top:50px">Pengiriman Masuk dari Agen</h3>
{{-- <div class="table-responsive col-lg">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nomor Resi</th>
                <th scope="col">Dibuat</th>
                <th scope="col">Detail</th>
                <th scope="col">Status Barang Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengirimanDariAgen as $pengirimanku)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengirimanku->nomor_resi }}</td>
                <td>{{ $pengirimanku->created_at }}</td>
                <td><a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="btn btn-info">Lihat</a></td>
                <td>
                @if ($pengirimanku->status == "Verifikasi Logistik" || $pengirimanku->status == "Verifikasi Penjadwalan Pengiriman" || $pengirimanku->status == "Verifikasi Kurir Antar" || $pengirimanku->status == "Verifikasi Pesanan Diterima")
                    Sudah Diverifikasi
                @else
                    <a href="/dashboard/logistik/penjadwalanbarang/{{ $pengirimanku->nomor_resi }}" class="btn btn-success">Verifikasi</a>
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div> --}}
        <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablesettanggallogagen" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nomor Resi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Dibuat</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Detail</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Status Barang Masuk</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($pengirimanDariAgen as $pengirimanku)
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
                      @if ($pengirimanku->status == "Verifikasi Logistik" || $pengirimanku->status == "Verifikasi Penjadwalan Pengiriman" || $pengirimanku->status == "Verifikasi Kurir Antar" || $pengirimanku->status == "Verifikasi Pesanan Diterima")
                        <td class="align-middle text-center text-sm"><span class="text-secondary text-sm font-weight-bold">Pengiriman Sudah Dijadwalkan</span></td>
                      @else
                        <td class="align-middle text-center">
                          <a href="/dashboard/logistik/penjadwalanbarang/{{ $pengirimanku->nomor_resi }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Set Tanggal Pengiriman
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