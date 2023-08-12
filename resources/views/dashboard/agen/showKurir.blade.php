@extends('dashboard.layout.pages.main')
@section('container')
    <div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          
        @foreach ($shows as $kurirku)
        <tr>
        <th>Nama</th>
          <td>{{ $kurirku->nama }}</td>
        </tr>
        <tr>
            <th>Kurir Antar</th>
            <td>{{ $kurirku->kurir_antar ? 'Ya' : 'Tidak' }}</td>
        </tr>
        <tr>
            <th>Kurir Jemput</th>
            <td>{{ $kurirku->kurir_jemput ? 'Ya' : 'Tidak' }}</td>
        </tr>
        <tr>
          <th>Username</th>
          <td>{{ $kurirku->username }}</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>{{ $kurirku->email }}</td>
        </tr>
        <tr>
          <th>No Telpon</th>
          <td>{{ $kurirku->no_telephone }}</td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td>{{ $kurirku->alamat }}</td>
        </tr>
        <tr>
          <th>Desa / Kelurahan</th>
          <td>{{ $kurirku->kelurahan }}</td>
        </tr>
        <tr>
          <th>Kecamatan</th>
          <td>{{ $kurirku->kecamatan }}</td>
        </tr>
        <tr>
          <th>Kabupaten / Kota</th>
          <td>{{ $kurirku->kabupatenkota }}</td>
        </tr>
        <tr>
          <th>Provinsi</th>
          <td>{{ $kurirku->provinsi }}</td>
        </tr>
        <tr>
          <th>Saldo</th>
          <td>{{ $kurirku->saldo }}</td>
        </tr>
        @endforeach
          
        </table>
        
      </div>
@endsection