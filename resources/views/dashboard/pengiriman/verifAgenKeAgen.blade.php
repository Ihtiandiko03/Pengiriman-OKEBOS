@extends('dashboard.layout.pages.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Verifikasi Agen ke Agen</h1>
    </div>


    @foreach ($pengiriman as $item)
    <div class="col-lg-8">
    <form method="post" action="/dashboard/pengiriman/ {{ $item->id }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
          <label for="jenis_pengiriman" class="form-label">Jenis Pengiriman</label>
          <select class="form-select" name="jenis_pengiriman" disabled> 
              <option value="Dalam Kota">Dalam Kota</option>
              <option value="Luar Kota">Luar Kota</option>
          </select>
        </div>

        <div class="mb-3">
        <label for="rute_awal" class="form-label">Rute Awal</label>
        <select class="form-select" name="rute_awal" disabled>
            @foreach ($rutes as $rute)
                @if (old('rute') == $rute->id)
                    <option value="{{ $rute->id }}" selected>{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                @else
                    <option value="{{ $rute->id }}">{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                @endif
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="rute_tujuan" class="form-label">Rute Tujuan</label>
        <select class="form-select" name="rute_tujuan" disabled>
            @foreach ($rutes as $rute)
                @if (old('rute') == $rute->id)
                    <option value="{{ $rute->id }}" selected>{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                @else
                    <option value="{{ $rute->id }}">{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                @endif
            @endforeach
        </select>
      </div>


      <div class="mb-3">
        <label for="nomor_resi" class="form-label">Nomor Resi</label>
        <input type="text" class="form-control @error('nomor_resi') is-invalid @enderror" id="nomor_resi" name="nomor_resi" value="{{ old('nomor_resi', $item->nomor_resi) }}" readonly>
        @error('nomor_resi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $item->harga) }}" readonly>
        @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="berat_barang" class="form-label">Berat Barang</label>
        <input type="text" class="form-control @error('berat_barang') is-invalid @enderror" id="berat_barang" name="berat_barang" value="{{ old('berat_barang', $item->berat_barang) }}" readonly>
        @error('berat_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>


        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id; }}">


      {{-- Pengirim --}}
      <h4 class="my-3">Pengirim</h4>
      <div class="mb-3">
        <label for="perusahaan_pengirim" class="form-label">Perusahaan</label>
        <input type="text" class="form-control @error('perusahaan_pengirim') is-invalid @enderror" id="perusahaan_pengirim" name="perusahaan_pengirim" value="{{ old('perusahaan_pengirim',  $item->perusahaan_pengirim) }}" readonly>
        @error('perusahaan_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="nama_pengirim" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama_pengirim') is-invalid @enderror" id="nama_pengirim" name="nama_pengirim" value="{{ old('nama_pengirim', $item->nama_pengirim) }}" readonly>
        @error('nama_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="provinsi_pengirim" class="form-label">Provinsi</label>
        <input type="text" class="form-control @error('provinsi_pengirim') is-invalid @enderror" id="provinsi_pengirim" name="provinsi_pengirim" value="{{ old('provinsi_pengirim', $item->provinsi_pengirim) }}" readonly>
        @error('provinsi_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kabupatenkota_pengirim" class="form-label">Kabupaten / Kota</label>
        <input type="text" class="form-control @error('kabupatenkota_pengirim') is-invalid @enderror" id="kabupatenkota_pengirim" name="kabupatenkota_pengirim" value="{{ old('kabupatenkota_pengirim', $item->kabupatenkota_pengirim) }}" readonly>
        @error('kabupatenkota_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kecamatan_pengirim" class="form-label">Kecamatan</label>
        <input type="text" class="form-control @error('kecamatan_pengirim') is-invalid @enderror" id="kecamatan_pengirim" name="kecamatan_pengirim" value="{{ old('kecamatan_pengirim', $item->kecamatan_pengirim) }}" readonly>
        @error('kecamatan_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kelurahan_pengirim" class="form-label">Desa / Kelurahan</label>
        <input type="text" class="form-control @error('kelurahan_pengirim') is-invalid @enderror" id="kelurahan_pengirim" name="kelurahan_pengirim" value="{{ old('kelurahan_pengirim', $item->kelurahan_pengirim) }}" readonly>
        @error('kelurahan_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="alamat_pengirim" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat_pengirim') is-invalid @enderror" id="alamat_pengirim" name="alamat_pengirim" value="{{ old('alamat_pengirim', $item->alamat_pengirim) }}" readonly>
        
        @error('alamat_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorhp_pengirim" class="form-label">Nomor HP</label>
        <input type="text" class="form-control @error('nomorhp_pengirim') is-invalid @enderror" id="nomorhp_pengirim" name="nomorhp_pengirim" value="{{ old('nomorhp_pengirim', $item->nomorhp_pengirim) }}" readonly>
        @error('nomorhp_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorwa_pengirim" class="form-label">Nomor WA</label>
        <input type="text" class="form-control @error('nomorwa_pengirim') is-invalid @enderror" id="nomorwa_pengirim" name="nomorwa_pengirim" value="{{ old('nomorwa_pengirim', $item->nomorwa_pengirim) }}" readonly>
        @error('nomorwa_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <h4>Penerima</h4>

      <div class="mb-3">
        <label for="perusahaan_penerima" class="form-label">Perusahaan</label>
        <input type="text" class="form-control @error('perusahaan_penerima') is-invalid @enderror" id="perusahaan_penerima" name="perusahaan_penerima" value="{{ old('perusahaan_penerima', $item->perusahaan_penerima) }}" readonly>
        @error('perusahaan_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama_penerima" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" id="nama_penerima" name="nama_penerima" value="{{ old('nama_penerima', $item->nama_penerima) }}" readonly>
        @error('nama_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="provinsi_penerima" class="form-label">Provinsi</label>
        <input type="text" class="form-control @error('provinsi_penerima') is-invalid @enderror" id="provinsi_penerima" name="provinsi_penerima" value="{{ old('provinsi_penerima', $item->provinsi_penerima) }}" readonly>
        @error('provinsi_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kabupatenkota_penerima" class="form-label">Kabupaten / Kota</label>
        <input type="text" class="form-control @error('kabupatenkota_penerima') is-invalid @enderror" id="kabupatenkota_penerima" name="kabupatenkota_penerima" value="{{ old('kabupatenkota_penerima', $item->kabupatenkota_penerima) }}" readonly>
        @error('kabupatenkota_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kecamatan_penerima" class="form-label">Kecamatan</label>
        <input type="text" class="form-control @error('kecamatan_penerima') is-invalid @enderror" id="kecamatan_penerima" name="kecamatan_penerima" value="{{ old('kecamatan_penerima', $item->kecamatan_penerima) }}" readonly>
        @error('kecamatan_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kelurahan_penerima" class="form-label">Desa / Kelurahan</label>
        <input type="text" class="form-control @error('kelurahan_penerima') is-invalid @enderror" id="kelurahan_penerima" name="kelurahan_penerima" value="{{ old('kelurahan_penerima', $item->kelurahan_penerima) }}" readonly>
        @error('kelurahan_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="alamat_penerima" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat_penerima') is-invalid @enderror" id="alamat_penerima" name="alamat_penerima" value="{{ old('alamat_penerima', $item->alamat_penerima) }}" readonly>
        @error('alamat_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorhp_penerima" class="form-label">Nomor HP</label>
        <input type="text" class="form-control @error('nomorhp_penerima') is-invalid @enderror" id="nomorhp_penerima" name="nomorhp_penerima" value="{{ old('nomorhp_penerima', $item->nomorhp_penerima) }}" readonly>
        @error('nomorhp_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorwa_penerima" class="form-label">Nomor WA</label>
        <input type="text" class="form-control @error('nomorwa_penerima') is-invalid @enderror" id="nomorwa_penerima" name="nomorwa_penerima" value="{{ old('nomorwa_penerima', $item->nomorwa_penerima) }}" readonly>
        @error('nomorwa_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <input type="hidden" name="verifikasi_agen_ke_agen" id="verifikasi_agen_ke_agen" value="1">

      
      <button type="submit" class="btn btn-success">Verifikasi</button>
    </form>
    </div>
    @endforeach




@endsection