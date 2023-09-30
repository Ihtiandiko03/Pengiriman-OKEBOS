@extends('dashboard.layout.pages.main')
@section('container')
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Verifikasi Barang</h1>
    </div>


    @foreach ($verifikasi as $item)
    <div class="col-lg">
    <form method="post" action="/dashboard/logistik/prosesverifikasi/{{ $item->nomor_resi }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
          <label for="jenis_pengiriman" class="form-label">Jenis Pengiriman</label>
          <select class="form-select" name="jenis_pengiriman" disabled> 
              <option value="{{ $item->jenis_pengiriman }}" selected>{{ $item->jenis_pengiriman }}</option>
              <option value="Dalam Kota">Dalam Kota</option>
              <option value="Luar Kota">Luar Kota</option>
          </select>
        </div>

        <div class="mb-3">
        <label for="rute_awal" class="form-label">Rute Awal</label>
        <select class="form-select" id="rute_awal" name="rute_awal" disabled>
            @foreach ($rutes as $rute)
                @if ($item->rute_awal == $rute->id)
                    <option value="{{ $rute->id }}" selected>{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                @else
                    <option value="{{ $rute->id }}">{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                @endif
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="rute_tujuan" class="form-label">Rute Tujuan</label>
        <select class="form-select" id="rute_tujuan" name="rute_tujuan" disabled>
            @foreach ($rutes as $rute)
                @if ($item->rute_tujuan == $rute->id)
                    <option value="{{ $rute->id }}" selected>{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                @else
                    <option value="{{ $rute->id }}">{{ $rute->kecamatan }}, {{ $rute->kabupatenkota }}</option>
                @endif
            @endforeach
        </select>
      </div>


      <div class="mb-3">
        <label for="nomor_resi" class="form-label">Nomor Resi</label>
        <input type="text" class="form-control @error('nomor_resi') is-invalid @enderror" id="nomor_resi" name="nomor_resi" value="{{ old('nomor_resi', $item->nomor_resi) }}" disabled>
        @error('nomor_resi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="jumlah_barang" class="form-label">Jumlah Barang</b></label>
        <input type="number" class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah_barang" name="jumlah_barang" value="{{ old('jumlah_barang', $item->jumlah_barang) }}" >
        @error('jumlah_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="jenis_barang" class="form-label">Jenis Barang</b></label>
        <input type="text" class="form-control @error('jenis_barang') is-invalid @enderror" id="jenis_barang" name="jenis_barang" value="{{ old('jenis_barang', $item->jenis_barang) }}" >
        @error('jenis_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="berat_barang" class="form-label">Berat Barang dalam Kg <b>(Harap Diisi !)</b></label>
        <input type="number" class="form-control @error('berat_barang') is-invalid @enderror" id="berat_barang" name="berat_barang" value="{{ old('berat_barang', $item->berat_barang) }}" onchange="functionOngkir()">
        @error('berat_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
        <select class="form-select" id="metode_pembayaran" name="metode_pembayaran" onchange="functionOngkir()">
            <option value="">Pilih</option>
            <option value="Tunai">Tunai</option>
            <option value="COD">COD</option>
            <option value="Transfer">Transfer</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Total Harga</label>
        <div class="form-group" name="total_harga" id="total_harga">
            <input type="text" class="form-control" id="harga" name="harga" disabled>
        </div>
      </div>

      <div class="mb-3">
        <label for="foto_barang" class="form-label">Foto Barang <b>(Harap Diisi !)</b></label><br>
        <input class="form-control" type="file" id="foto_barang" name="foto_barang" accept="image/png, image/jpeg, image/jpg">
      </div>

      <div class="mb-3">
        <label for="foto_bukti_pembayaran" class="form-label">Foto Bukti Pembayaran <b>(Harap Diisi !)</b></label><br>
        <input class="form-control" type="file" id="foto_bukti_pembayaran" name="foto_bukti_pembayaran" accept="image/png, image/jpeg, image/jpg">
      </div>


        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id; }}">


      {{-- Pengirim --}}
      <h4 class="my-3">Pengirim</h4>
      <div class="mb-3">
        <label for="perusahaan_pengirim" class="form-label">Perusahaan</label>
        <input type="text" class="form-control @error('perusahaan_pengirim') is-invalid @enderror" id="perusahaan_pengirim" name="perusahaan_pengirim" value="{{ old('perusahaan_pengirim',  $item->perusahaan_pengirim) }}" disabled>
        @error('perusahaan_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="nama_pengirim" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama_pengirim') is-invalid @enderror" id="nama_pengirim" name="nama_pengirim" value="{{ old('nama_pengirim', $item->nama_pengirim) }}" disabled>
        @error('nama_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="provinsi_pengirim" class="form-label">Provinsi</label>
        <input type="text" class="form-control @error('provinsi_pengirim') is-invalid @enderror" id="provinsi_pengirim" name="provinsi_pengirim" value="{{ old('provinsi_pengirim', $item->provinsi_pengirim) }}" disabled>
        @error('provinsi_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kabupatenkota_pengirim" class="form-label">Kabupaten / Kota</label>
        <input type="text" class="form-control @error('kabupatenkota_pengirim') is-invalid @enderror" id="kabupatenkota_pengirim" name="kabupatenkota_pengirim" value="{{ old('kabupatenkota_pengirim', $item->kabupatenkota_pengirim) }}" disabled>
        @error('kabupatenkota_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kecamatan_pengirim" class="form-label">Kecamatan</label>
        <input type="text" class="form-control @error('kecamatan_pengirim') is-invalid @enderror" id="kecamatan_pengirim" name="kecamatan_pengirim" value="{{ old('kecamatan_pengirim', $item->kecamatan_pengirim) }}" disabled>
        @error('kecamatan_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kelurahan_pengirim" class="form-label">Desa / Kelurahan</label>
        <input type="text" class="form-control @error('kelurahan_pengirim') is-invalid @enderror" id="kelurahan_pengirim" name="kelurahan_pengirim" value="{{ old('kelurahan_pengirim', $item->kelurahan_pengirim) }}" disabled>
        @error('kelurahan_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="alamat_pengirim" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat_pengirim') is-invalid @enderror" id="alamat_pengirim" name="alamat_pengirim" value="{{ old('alamat_pengirim', $item->alamat_pengirim) }}" disabled>
        
        @error('alamat_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorhp_pengirim" class="form-label">Nomor HP</label>
        <input type="text" class="form-control @error('nomorhp_pengirim') is-invalid @enderror" id="nomorhp_pengirim" name="nomorhp_pengirim" value="{{ old('nomorhp_pengirim', $item->nomorhp_pengirim) }}" disabled>
        @error('nomorhp_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorwa_pengirim" class="form-label">Nomor WA</label>
        <input type="text" class="form-control @error('nomorwa_pengirim') is-invalid @enderror" id="nomorwa_pengirim" name="nomorwa_pengirim" value="{{ old('nomorwa_pengirim', $item->nomorwa_pengirim) }}" disabled>
        @error('nomorwa_pengirim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <h4>Penerima</h4>

      <div class="mb-3">
        <label for="perusahaan_penerima" class="form-label">Perusahaan</label>
        <input type="text" class="form-control @error('perusahaan_penerima') is-invalid @enderror" id="perusahaan_penerima" name="perusahaan_penerima" value="{{ old('perusahaan_penerima', $item->perusahaan_penerima) }}" disabled>
        @error('perusahaan_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nama_penerima" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama_penerima') is-invalid @enderror" id="nama_penerima" name="nama_penerima" value="{{ old('nama_penerima', $item->nama_penerima) }}" disabled>
        @error('nama_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="provinsi_penerima" class="form-label">Provinsi</label>
        <input type="text" class="form-control @error('provinsi_penerima') is-invalid @enderror" id="provinsi_penerima" name="provinsi_penerima" value="{{ old('provinsi_penerima', $item->provinsi_penerima) }}" disabled>
        @error('provinsi_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kabupatenkota_penerima" class="form-label">Kabupaten / Kota</label>
        <input type="text" class="form-control @error('kabupatenkota_penerima') is-invalid @enderror" id="kabupatenkota_penerima" name="kabupatenkota_penerima" value="{{ old('kabupatenkota_penerima', $item->kabupatenkota_penerima) }}" disabled>
        @error('kabupatenkota_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kecamatan_penerima" class="form-label">Kecamatan</label>
        <input type="text" class="form-control @error('kecamatan_penerima') is-invalid @enderror" id="kecamatan_penerima" name="kecamatan_penerima" value="{{ old('kecamatan_penerima', $item->kecamatan_penerima) }}" disabled>
        @error('kecamatan_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="kelurahan_penerima" class="form-label">Desa / Kelurahan</label>
        <input type="text" class="form-control @error('kelurahan_penerima') is-invalid @enderror" id="kelurahan_penerima" name="kelurahan_penerima" value="{{ old('kelurahan_penerima', $item->kelurahan_penerima) }}" disabled>
        @error('kelurahan_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="alamat_penerima" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat_penerima') is-invalid @enderror" id="alamat_penerima" name="alamat_penerima" value="{{ old('alamat_penerima', $item->alamat_penerima) }}" disabled>
        @error('alamat_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorhp_penerima" class="form-label">Nomor HP</label>
        <input type="text" class="form-control @error('nomorhp_penerima') is-invalid @enderror" id="nomorhp_penerima" name="nomorhp_penerima" value="{{ old('nomorhp_penerima', $item->nomorhp_penerima) }}" disabled>
        @error('nomorhp_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="nomorwa_penerima" class="form-label">Nomor WA</label>
        <input type="text" class="form-control @error('nomorwa_penerima') is-invalid @enderror" id="nomorwa_penerima" name="nomorwa_penerima" value="{{ old('nomorwa_penerima', $item->nomorwa_penerima) }}" disabled>
        @error('nomorwa_penerima')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <input type="hidden" name="verifikasi_kurir_ke_agen" id="verifikasi_kurir_ke_agen" value="1">

      
      <button type="submit" class="btn bg-gradient-primary">Verifikasi</button>
    </form>
    </div>
    @endforeach



@endsection

<script type="text/javascript">
    function functionOngkir() {
        var metode_pembayaran = document.getElementById("metode_pembayaran").value;
        var berat_barang = document.getElementById("berat_barang").value;
        var rute_awal = document.getElementById("rute_awal").value;
        var rute_tujuan = document.getElementById("rute_tujuan").value;

        var formData = {
          metode_pembayaran: metode_pembayaran,
          berat_barang: berat_barang,
          rute_awal: rute_awal,
          rute_tujuan: rute_tujuan
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            data: formData,
            url: '/dashboard/logistik/metode',
            success: function(val) {
                // console.log(val);
                $('#total_harga').html(val);
            }
        });
    }
</script>