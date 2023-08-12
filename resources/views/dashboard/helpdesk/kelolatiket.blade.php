@extends('dashboard.layout.pages.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Kelola Tiket</h1>
    </div>
    <div class="col-lg-8">
    <form method="post" action="/dashboard/helpdesk/proseskelolatiket/{{ $data->no_tiket }}" class="mb-5" enctype="multipart/form-data">
        @csrf

        <input type="hidden" id="status" name="status" value="Sudah Dikerjakan">
        <input type="hidden" id="teknisi" name="teknisi" value="Admin">
        <input type="hidden" id="updated_at" name="updated_at" value="Admin">

    
      <div class="mb-3">
        <label for="no_tiket" class="form-label">Nomor Tiket</label>
        <input type="text" class="form-control @error('no_tiket') is-invalid @enderror" id="no_tiket" name="no_tiket" value="{{ $data->no_tiket }}" disabled>
        @error('no_tiket')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $data->nama }}" disabled>
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $data->email }}" disabled>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" disable>{{ $data->keterangan }}</textarea>
        @error('keterangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="bukti_foto" class="form-label">Foto</label><br>
        <img src="{{ asset('storage/foto_helpdesk/'.$data->bukti_foto) }}" style="width: 400px; height:300px">
        
      </div>

      <div class="mb-3">
        <label for="tanggapan" class="form-label">Tanggapan</label>
        <textarea type="text" class="form-control @error('tanggapan') is-invalid @enderror" id="tanggapan" name="tanggapan" value="{{ old('tanggapan') }}"></textarea>
        @error('tanggapan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <button type="submit" class="btn bg-gradient-primary">Simpan Tiket</button>
    </form>
    </div>



@endsection