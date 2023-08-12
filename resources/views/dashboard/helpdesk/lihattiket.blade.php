@extends('dashboard.layout.pages.main')
@section('container')
    <h3 class="my-3">Rincian Tiket</h3>
    <div class="table-responsive col-lg mt-4">
        <table class="table table-striped table-sm">
        <tbody>
        <tr>
            <th scope="col"> Nomor Tiket</th>
            <td>{{ $data->no_tiket }}</td>
        </tr>
        <tr>
            <th scope="col">Nama</th>
            <td>{{ $data->nama}}</td>
        </tr>
        <tr>
            <th scope="col">Email</th>
            <td>{{ $data->email }}</td>
        </tr>
        <tr>
            <th scope="col">Keterangan</th>
            <td>{{ $data->keterangan }}</td>
        </tr>
        <tr>
            <th scope="col">Foto</th>
            <td>
                @if($data->bukti_foto)
                <img src="{{ asset('storage/foto_helpdesk/'.$data->bukti_foto) }}" style="width: 400px; height:300px">
                @else
                <p>Tidak Ada Foto</p>
                @endif
            </td>
        </tr>
        <tr>
            <th scope="col">Status</th>
            <td>{{ $data->status }}</td>
        </tr>
        <tr>
            <th scope="col">Teknisi</th>
            <td>{{ $data->teknisi }}</td>
        </tr>
        <tr>
            <th scope="col">Tanggapan</th>
            <td>{{ $data->tanggapan }}</td>
        </tr>
        <tr>
            <th scope="col">Tiket Dibuat</th>
            <td>{{ $data->created_at }}</td>
        </tr>
        <tr>
            <th scope="col">Tiket Dijawab</th>
            <td>{{ $data->updated_at }}</td>
        </tr>
        
          </tbody>
        </table>
        
      </div>
@endsection