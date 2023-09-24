@extends('dashboard.layout.pages.main')
@section('container')
    <div class="row justify-content-center">
    <div class="col-md-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Tambah Ongkir</h1>
        <form action="/dashboard/ongkir/prosestambahongkir" method="post">
            @csrf
            <div class="form-floating">
                <select class="form-select"  name="rute_awal">
                        <option selected>Pilih</option>
                     @foreach ($data as $item) :
                        <option value="{{ $item->id }}">{{ $item->kecamatan }}, {{ $item->kabupatenkota }}</option>
                     @endforeach
                </select>
                <label for="kecamatan">Rute Awal</label>
            </div>
            
            <div class="form-floating">
                <select class="form-select"  name="rute_tujuan">
                        <option selected>Pilih</option>
                     @foreach ($data as $item) :
                        <option value="{{ $item->id }}">{{ $item->kecamatan }}, {{ $item->kabupatenkota }}</option>
                     @endforeach
                </select>
                <label for="kecamatan">Rute Tujuan</label>
            </div>
            <div class="form-floating">
                <input type="number" name="harga" class="form-control rounded-bottom" id="harga" value="0">
                <label for="harga">Harga Ongkos Kirim</label>
            </div>
            <div class="form-floating">
                <input type="number" name="diskon" class="form-control rounded-bottom" id="diskon" value="0">
                <label for="diskon">Besaran Diskon (Opsional)</label>
            </div>
            <div class="form-floating">
                <input type="number" name="promo" class="form-control rounded-bottom" id="promo" value="0">
                <label for="promo">Besaran Promo (Opsional)</label>
            </div>
            


            <button class="w-100 btn btn-lg bg-gradient-primary mt-3" type="submit">Tambah Ongkir</button>
        </form>
        </main>
    </div>
</div>
@endsection