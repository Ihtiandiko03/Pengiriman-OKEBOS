@extends('dashboard.layout.pages.main')
@section('container')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Penjadwalan Pengiriman Barang Dalam Kota</h1>
    </div>


    <div class="col-lg-6 mx-auto">
    <form method="post" action="/dashboard/logistik/prosespenjadwalanbarang/{{ $data }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}

      <div class="mb-3">
        <label for="nomor_resi" class="form-label">Nomor Resi</label>
        <input type="text" class="form-control @error('nomor_resi') is-invalid @enderror" id="nomor_resi" name="nomor_resi" value="{{ old('nomor_resi', $data) }}" readonly>
        @error('nomor_resi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nama_petugas" class="form-label">Kurir Antar</label>
        <select class="form-select" name="nama_petugas">
            <option value="">Pilih</option>
            @foreach ($data2 as $item)
                @if (old('nama_petugas') == $item->nama)
                    <option value="{{ $item->nama }}" selected>{{ $item->nama }}</option>
                @else
                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                @endif
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="updated_at" class="form-label">Tanggal Pengiriman</label>
        <input type="date" class="form-control @error('updated_at') is-invalid @enderror" id="updated_at" name="updated_at" >
        @error('updated_at')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <button type="submit" class="btn bg-gradient-primary">Simpan Jadwal</button>
    </form>
    </div>



@endsection