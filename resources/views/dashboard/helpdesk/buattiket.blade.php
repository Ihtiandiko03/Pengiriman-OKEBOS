@extends('dashboard.layout.pages.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Buat Tiket</h1>
    </div>
    <div class="col-lg-8">
    <form method="post" action="/dashboard/helpdesk/prosesbuattiket" class="mb-5" enctype="multipart/form-data">
        @csrf



        <input type="hidden" id="no_tiket" name="no_tiket" value="{{mt_rand(10000000000000, 99999999999999)}}">
        <input type="hidden" id="status" name="status" value="Belum Dikerjakan">
        <input type="hidden" id="email" name="email" value="{{ Auth::user()->email; }}">
        <input type="hidden" id="created_at" name="created_at" value="{{ Auth::user()->email; }}">


    

      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ Auth::user()->nama; }}" disabled>
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}"></textarea>
        @error('keterangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="bukti_foto" class="form-label">Foto (Opsional)</label><br>
        <input class="form-control" type="file" id="bukti_foto" name="bukti_foto" accept="image/png, image/jpeg, image/jpg">
      </div>





        {{-- <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id; }}"> --}}


      


      <button type="submit" class="btn bg-gradient-primary">Buat Tiket</button>
    </form>
    </div>



@endsection