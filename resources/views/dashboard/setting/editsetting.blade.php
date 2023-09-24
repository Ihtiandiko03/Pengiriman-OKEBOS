@extends('dashboard.layout.pages.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Setting</h1>
    </div>

    @foreach ($data as $item)

    <div class="col-lg-8">
    <form method="post" action="/dashboard/setting/proseseditsetting/{{$item->id}}" class="mb-5">
        @method('put')
        @csrf
      <div class="mb-3">
        <label for="nama_setting" class="form-label">Nama Setting</label>
        <input type="text" class="form-control @error('nama_setting') is-invalid @enderror" id="nama_setting" name="nama_setting" autofocus value="{{ old('nama_setting', $item->nama_setting) }}" readonly>
        @error('nama_setting')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nilai" class="form-label">Nilai</label>
        <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai" name="nilai" autofocus value="{{ old('nilai', $item->nilai) }}">
        @error('nilai')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <input type="hidden" name="id" value="{{ old('id', $item->id) }}">



      <button type="submit" class="btn btn-primary">Update Setting</button>
    </form>
    </div>
    @endforeach

@endsection