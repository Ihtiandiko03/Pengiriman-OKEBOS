@extends('dashboard.layout.pages.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Ongkir</h1>
    </div>

        @foreach ($data as $item)
            
        
    <div class="col-lg-8">
    <form method="post" action="/dashboard/ongkir/prosesubahongkir/{{$item->id_ongkir}}" class="mb-5">
        @method('put')
        @csrf
      <div class="mb-3">
        <label for="harga" class="form-label">Harga Ongkir</label>
        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" autofocus value="{{ old('harga', $item->harga) }}">
        @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="promo" class="form-label">Promo</label>
        <input type="number" class="form-control @error('promo') is-invalid @enderror" id="promo" name="promo" autofocus value="{{ old('promo', $item->promo) }}">
        @error('promo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="diskon" class="form-label">Diskon</label>
        <input type="number" class="form-control @error('diskon') is-invalid @enderror" id="diskon" name="diskon" autofocus value="{{ old('diskon', $item->diskon) }}">
        @error('diskon')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>


      <button type="submit" class="btn bg-gradient-primary">Update Ongkir</button>
    </form>
    </div>
    @endforeach

@endsection