@extends('dashboard.layout.pages.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Pengiriman</h1>
    </div>
    <div class="col-lg-8">
    <form method="post" action="/dashboard/pengiriman" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="jenis_pengiriman" class="form-label">Jenis Pengiriman</label>
          <select class="form-select" name="jenis_pengiriman">
              <option value="">Pilih</option>
              <option value="Dalam Kota">Dalam Kota</option>
              <option value="Luar Kota">Luar Kota</option>
          </select>
        </div>

        <div class="mb-3">
        <label for="rute_awal" class="form-label">Rute Awal</label>
        <select class="form-select" name="rute_awal">
            <option value="">Pilih</option>
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
        <select class="form-select" name="rute_tujuan">
            <option value="">Pilih</option>
            @foreach ($rutes as $rute)
                @if (old('rute') == $rute->id)
                    <option value="{{ $rute->id }}" selected>{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                @else
                    <option value="{{ $rute->id }}">{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                @endif
            @endforeach
        </select>
      </div>


              <input type="hidden" id="nomor_resi" name="nomor_resi" value="{{mt_rand(10000000000000, 99999999999999)}}">
              <input type="hidden" id="status" name="status" value="Dibuat">
    

      <div class="mb-3">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">
        @error('nama_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>


        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id; }}">


      {{-- Pengirim --}}
      <h4 class="my-3">Pengirim</h4>
      <div class="mb-3">
        <label for="perusahaan_pengirim" class="form-label">Perusahaan (Opsional)</label>
        <input type="text" class="form-control @error('perusahaan_pengirim') is-invalid @enderror" id="perusahaan_pengirim" name="perusahaan_pengirim" value="{{ old('perusahaan_pengirim') }}">
        @error('perusahaan_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="nama_pengirim" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama_pengirim') is-invalid @enderror" id="nama_pengirim" name="nama_pengirim" value="{{ old('nama_pengirim') }}">
        @error('nama_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="provinsi_pengirim" class="form-label">Provinsi</label>
        <select class="form-select" id="provinsi_pengirim" name="provinsi_pengirim" onchange="functionProvinsi()">
            <option value="">Pilih</option>
            @foreach ($provinsi as $rute)
                <option value="{{ $rute->provinsi }}"> {{ $rute->provinsi }}</option>
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="kabupatenkota_pengirim" class="form-label">Kabupaten / Kota</label>
        <div class="form-group" name="provinsi_get" id="provinsi_get">
            <select class="form-select" id="kabupatenkota_pengirim" name="kabupatenkota_pengirim">
                <option value="">Pilih Provinsi Dahulu</option>
            </select>
        </div>
      </div>


      <div class="mb-3">
        <label for="kecamatan_pengirim" class="form-label">Kecamatan</label>
        <div class="form-group" name="kabupatenkota_get" id="kabupatenkota_get">
            <select class="form-select" id="kecamatan_pengirim" name="kecamatan_pengirim">
                <option value="">Pilih Kabupaten Kota Dahulu</option>
            </select>
        </div>
      </div>

      <div class="mb-3">
        <label for="kelurahan_pengirim" class="form-label">Desa / Kelurahan</label>
        <input type="text" class="form-control @error('kelurahan_pengirim') is-invalid @enderror" id="kelurahan_pengirim" name="kelurahan_pengirim" value="{{ old('kelurahan_pengirim') }}">
        @error('kelurahan_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="alamat_pengirim" class="form-label">Alamat</label>
        <textarea type="text" class="form-control @error('alamat_pengirim') is-invalid @enderror" id="alamat_pengirim" name="alamat_pengirim" value="{{ old('alamat_pengirim') }}"></textarea>
        @error('alamat_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kodepos_pengirim" class="form-label">Kode Pos Pengirim</label>
        <input type="text" class="form-control @error('kodepos_pengirim') is-invalid @enderror" id="kodepos_pengirim" name="kodepos_pengirim" value="{{ old('kodepos_pengirim') }}">
        @error('kodepos_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorhp_pengirim" class="form-label">Nomor HP</label>
        <input type="text" class="form-control @error('nomorhp_pengirim') is-invalid @enderror" id="nomorhp_pengirim" name="nomorhp_pengirim" value="{{ old('nomorhp_pengirim') }}">
        @error('nomorhp_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorwa_pengirim" class="form-label">Nomor WA</label>
        <input type="text" class="form-control @error('nomorwa_pengirim') is-invalid @enderror" id="nomorwa_pengirim" name="nomorwa_pengirim" value="{{ old('nomorwa_pengirim') }}">
        @error('nomorwa_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <h4>Penerima</h4>

      <div class="mb-3">
        <label for="perusahaan_penerima" class="form-label">Perusahaan (Opsional)</label>
        <input type="text" class="form-control @error('perusahaan_penerima') is-invalid @enderror" id="perusahaan_penerima" name="perusahaan_penerima" value="{{ old('perusahaan_penerima') }}">
        @error('perusahaan_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama_penerima" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" id="nama_penerima" name="nama_penerima" value="{{ old('nama_penerima') }}">
        @error('nama_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="provinsi_penerima" class="form-label">Provinsi</label>
        <select class="form-select" id="provinsi_penerima" name="provinsi_penerima" onchange="functionProvinsiPenerima()">
            <option value="">Pilih</option>
            @foreach ($provinsi as $rute)
                <option value="{{ $rute->provinsi }}"> {{ $rute->provinsi }}</option>
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="kabupatenkota_penerima" class="form-label">Kabupaten / Kota</label>
        <div class="form-group" name="provinsipenerima_get" id="provinsipenerima_get">
            <select class="form-select" id="kabupatenkota_penerima" name="kabupatenkota_penerima">
                <option value="">Pilih Provinsi Dahulu</option>
            </select>
        </div>
      </div>

      <div class="mb-3">
        <label for="kecamatan_penerima" class="form-label">Kecamatan</label>
        <div class="form-group" name="kabupatenkotapenerima_get" id="kabupatenkotapenerima_get">
            <select class="form-select" id="kecamatan_penerima" name="kecamatan_penerima">
                <option value="">Pilih Kabupaten Kota Dahulu</option>
            </select>
        </div>
      </div>

      <div class="mb-3">
        <label for="kelurahan_penerima" class="form-label">Desa / Kelurahan</label>
        <input type="text" class="form-control @error('kelurahan_penerima') is-invalid @enderror" id="kelurahan_penerima" name="kelurahan_penerima" value="{{ old('kelurahan_penerima') }}">
        @error('kelurahan_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="alamat_penerima" class="form-label">Alamat</label>
        <textarea type="text" class="form-control @error('alamat_penerima') is-invalid @enderror" id="alamat_penerima" name="alamat_penerima" value="{{ old('alamat_penerima') }}"></textarea>
        @error('alamat_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kodepos_penerima" class="form-label">Kode Pos Penerima</label>
        <input type="text" class="form-control @error('kodepos_penerima') is-invalid @enderror" id="kodepos_penerima" name="kodepos_penerima" value="{{ old('kodepos_penerima') }}">
        @error('kodepos_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorhp_penerima" class="form-label">Nomor HP</label>
        <input type="text" class="form-control @error('nomorhp_penerima') is-invalid @enderror" id="nomorhp_penerima" name="nomorhp_penerima" value="{{ old('nomorhp_penerima') }}">
        @error('nomorhp_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorwa_penerima" class="form-label">Nomor WA</label>
        <input type="text" class="form-control @error('nomorwa_penerima') is-invalid @enderror" id="nomorwa_penerima" name="nomorwa_penerima" value="{{ old('nomorwa_penerima') }}">
        @error('nomorwa_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>


      <button type="submit" class="btn bg-gradient-primary">Buat Kiriman</button>
    </form>
    </div>
@endsection

<script type="text/javascript">
    function functionProvinsi() {
        var provinsi = document.getElementById("provinsi_pengirim").value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                    'provinsi': provinsi
                    },
            url: '/dashboard/logistik/getprovinsi',
            success: function(val) {
                // console.log(val);
                $('#provinsi_get').html(val);
            }
        });
    }

    function functionKabupaten() {
        var kabupatenkota = document.getElementById("kabupatenkota_pengirim").value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                    'kabupatenkota': kabupatenkota
                    },
            url: '/dashboard/logistik/getkabupatenkota',
            success: function(val) {
                // console.log(val);
                $('#kabupatenkota_get').html(val);
            }
        });
    }

    function functionProvinsiPenerima() {
        var provinsi = document.getElementById("provinsi_penerima").value;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                    'provinsi': provinsi
                    },
            url: '/dashboard/logistik/getprovinsipenerima',
            success: function(val) {
                // console.log(val);
                $('#provinsipenerima_get').html(val);
            }
        });
    }

    function functionKabupatenPenerima() {
        var kabupatenkota = document.getElementById("kabupatenkota_penerima").value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                    'kabupatenkota': kabupatenkota
                    },
            url: '/dashboard/logistik/getkabupatenkotapenerima',
            success: function(val) {
                // console.log(val);
                $('#kabupatenkotapenerima_get').html(val);
            }
        });
    }
</script>