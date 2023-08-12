@extends('dashboard.layout.pages.main')
@section('container')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Penerimaan Barang</h1>
    </div>


    <div class="col-lg-6 mx-auto">
    <form method="post" action="/dashboard/kurir/prosespenerimaanbarang/{{ $data }}" class="mb-5" enctype="multipart/form-data">
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
        <label for="nama_penerima_barang" class="form-label">Nama Penerima Barang</label>
        <input type="text" class="form-control" id="nama_penerima_barang" name="nama_penerima_barang">
      </div>

      <div class="mb-3">
        <label for="foto_penerimaan_barang" class="form-label">Bukti Penerimaan Barang <b>(Harap Diisi !)</b></label><br>
        <input class="form-control" type="file" id="foto_penerimaan_barang" name="foto_penerimaan_barang" accept="image/png, image/jpeg, image/jpg">
      </div>

      


      <button type="submit" class="btn bg-gradient-primary">Pesanan Diterima</button>
    </form>
    </div>



@endsection