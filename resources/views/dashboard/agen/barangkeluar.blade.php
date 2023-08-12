@extends('dashboard.layout.pages.main')
@section('container')
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm" style="width: 100%;">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nomor Resi</th>
              <th scope="col">Dibuat</th>
              <th scope="col">Verifikasi Barang Baru Masuk</th>
              <th scope="col">Verifikasi Barang Masuk</th>
              <th scope="col">Verifikasi Barang Keluar</th>
              
            </tr>
          </thead>
          <tbody>
        @foreach ($pengiriman as $pengirimanku)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pengirimanku->nomor_resi }}</td>
          <td>{{ $pengirimanku->created_at }}</td>
          <td>{{ $pengirimanku->verifikasi_barang_baru_masuk ? 'Sudah' : 'Belum' }}</td>
          <td>{{ $pengirimanku->verifikasi_barang_masuk ? 'Sudah' : 'Belum' }}</td>
          <td>{{ $pengirimanku->verifikasi_barang_keluar ? 'Sudah' : 'Belum' }}</td>
          
          <td>
                <a href="/dashboard/pengiriman/{{ $pengirimanku->id }}" class="btn btn-info">View</a>
                <a href="/dashboard/pengiriman/{{ $pengirimanku->id }}/edit" class="btn btn-success">Verifikasi</a>
                
          </td>
        </tr>
        @endforeach
          </tbody>
        </table>
        
      </div>
@endsection