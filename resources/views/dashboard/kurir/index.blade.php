@extends('dashboard.layout.pages.main')
@section('container')

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
              
              
            </tr>
          </thead>
          <tbody>
        @foreach ($pengirimanDalamWilayah as $pengirimanku)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pengirimanku->nomor_resi }}</td>
          <td>{{ $pengirimanku->created_at }}</td>
          <td><a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="btn btn-info">Lihat</a></td>
          @if ($pengirimanku->nama_petugas == NULL)
              <td> <a href="/dashboard/pengiriman/{{ $pengirimanku->nomor_resi }}/edit" class="btn btn-success">Ambil</a> </td>
          @else
              <td>Sudah Diambil</td>
          @endif
        </tr>
        @endforeach
          </tbody>
        </table>
        
    </div> --}}

      <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablekurirjemputdalam" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nomor Resi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Dibuat</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Detail</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Ambil Pesanan</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Isi Form</th>
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
                      @if($pengirimanku->nama_petugas == NULL)
                        <td class="align-middle text-center">
                          <a href="/dashboard/pengiriman/{{ $pengirimanku->nomor_resi }}/edit" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Ambil
                          </a>
                        </td>
                      @else
                        <td class="align-middle text-center text-sm"><span class="text-success text-sm font-weight-bold">Sudah Diambil</span></td>
                        
                      @endif
                      @if($pengirimanku->status_pengiriman == 'Verifikasi Kurir ke Logistik')
                        <td class="align-middle text-center">
                          <a href="/dashboard/logistik/verifikasi/{{ $pengirimanku->nomor_resi }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Isi Form Pengambilan Barang
                          </a>
                        </td>  
                      @else
                        <td class="align-middle text-center text-sm"><span class="text-success text-sm font-weight-bold">Sudah</span></td>
                      @endif
                
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
      </div>

      <h3 style="text-align:center; margin-top:50px">Pengiriman Antar Kota/Kabupaten</h3>

      <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tablekurirjemputantar" style="width: 100%;">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">No</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Nomor Resi</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Dibuat</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Detail</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Ambil Pesanan</th>
                      <th class="text-center text-uppercase text-sm font-weight-bolder">Isi Form</th>

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
                      @if($pengirimanku->nama_petugas == NULL)
                        <td class="align-middle text-center">
                          <a href="/dashboard/pengiriman/{{ $pengirimanku->nomor_resi }}/edit" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Ambil
                          </a>
                        </td>
                      @else
                        <td class="align-middle text-center text-sm"><span class="text-success text-sm font-weight-bold">Sudah Diambil</span></td>
                        
                      @endif
                      @if($pengirimanku->status_pengiriman == 'Verifikasi Kurir ke Logistik')
                        <td class="align-middle text-center">
                          <a href="/dashboard/logistik/verifikasi/{{ $pengirimanku->nomor_resi }}" class="text-info font-weight-bold text-sm" data-toggle="tooltip" data-original-title="Edit user">
                           Isi Form Pengambilan Barang
                          </a>
                        </td>  
                      @else
                        <td class="align-middle text-center text-sm"><span class="text-success text-sm font-weight-bold">Sudah</span></td>
                      @endif
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
      </div>

      {{-- <div class="table-responsive col-lg">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Resi</th>
              <th scope="col">Dibuat</th>
              <th scope="col">Detail</th>
              <th scope="col">Ambil Pesanan</th>
            </tr>
          </thead>
          <tbody>
        @foreach ($pengirimanAntarWilayah as $pengirimanku)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pengirimanku->nomor_resi }}</td>
          <td>{{ $pengirimanku->created_at }}</td>
          <td><a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="btn btn-info">Lihat</a></td>
          @if ($pengirimanku->nama_petugas == NULL)
              <td> <a href="/dashboard/pengiriman/{{ $pengirimanku->nomor_resi }}/edit" class="btn btn-success">Ambil</a> </td>
          @else
              <td>Sudah Diambil</td>
          @endif
        </tr>
        @endforeach
          </tbody>
        </table>
      </div> --}}
@endsection