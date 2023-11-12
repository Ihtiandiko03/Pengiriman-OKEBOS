@extends('dashboard.layout.pages.main')
@section('container')
    <h3 class="my-3">Rincian Pengiriman</h3>
    <div class="table-responsive col-lg mt-4">
    @foreach ($pengiriman as $pengirimanku)
        <table class="table table-striped table-sm">
        <tbody>
        <tr>
            <th scope="col">   Cetak Resi     
                <a href="/dashboard/logistik/cetak_resi/{{ $pengirimanku->nomor_resi }}"><span class="badge bg-secondary">Cetak Resi</span></a>
            </th>
            <td>{{ $pengirimanku->nomor_resi }}</td>
        </tr>
        <tr>
            <th scope="col">Nama Barang</th>
            <td>{{ $pengirimanku->nama_barang }}</td>
        </tr>
        <tr>
            <th scope="col">Jenis Pengiriman</th>
            <td>{{ $pengirimanku->jenis_pengiriman }}</td>
        </tr>
        <tr>
            <th scope="col">Harga</th>
            <td>Rp.{{ number_format($pengirimanku->harga ,2,",",".") }}</td>
        </tr>
        <tr>
            <th scope="col">Berat Barang</th>
            <td>{{ $pengirimanku->berat_barang }} gram</td>
        </tr>
        <tr>
            <th scope="col">Jumlah Barang</th>
            <td>{{ $pengirimanku->jumlah_barang }} Buah</td>
        </tr>
        
          </tbody>
        </table>

        <h4>Pengirim</h4>

        <table class="table table-striped table-sm">
        <tbody>
        
        <tr>
            <th scope="col">Perusahaan</th>
            <td>{{ $pengirimanku->perusahaan_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Nama</th>
            <td>{{ $pengirimanku->nama_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Provinsi</th>
            <td>{{ $pengirimanku->provinsi_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Kabupaten/Kota</th>
            <td>{{ $pengirimanku->kabupatenkota_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Kecamatan</th>
            <td>{{ $pengirimanku->kecamatan_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Desa / Kelurahan</th>
            <td>{{ $pengirimanku->kelurahan_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Alamat</th>
            <td>{{ $pengirimanku->alamat_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Kode Pos Pengirim</th>
            <td>{{ $pengirimanku->kodepos_pengirim }}</td>
        </tr>
        <tr>
            <th scope="col">Nomor HP</th>
            <td>{{ $pengirimanku->nomorhp_pengirim }}</td>
        </tr>
        {{-- <tr>
            <th scope="col">Nomor WA</th>
            <td>{{ $pengirimanku->nomorwa_pengirim }}</td>
        </tr> --}}
        
          </tbody>
        </table>

        <h4>Penerima</h4>

        <table class="table table-striped table-sm">
        <tbody>
        
        <tr>
            <th scope="col">Perusahaan</th>
            <td>{{ $pengirimanku->perusahaan_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Nama</th>
            <td>{{ $pengirimanku->nama_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Provinsi</th>
            <td>{{ $pengirimanku->provinsi_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Kabupaten/Kota</th>
            <td>{{ $pengirimanku->kabupatenkota_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Kecamatan</th>
            <td>{{ $pengirimanku->kecamatan_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Desa / Kelurahan</th>
            <td>{{ $pengirimanku->kelurahan_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Alamat</th>
            <td>{{ $pengirimanku->alamat_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Kode Pos Penerima</th>
            <td>{{ $pengirimanku->kodepos_penerima }}</td>
        </tr>
        <tr>
            <th scope="col">Nomor HP</th>
            <td>{{ $pengirimanku->nomorhp_penerima }}</td>
        </tr>
        {{-- <tr>
            <th scope="col">Nomor WA</th>
            <td>{{ $pengirimanku->nomorwa_penerima }}</td>
        </tr> --}}
        <tr>
            <th scope="col">Foto Barang</th>
            <td><img src="{{ asset('storage/bukti_barang/'.$pengirimanku->foto_barang) }}" style="width: 400px; height:300px"></td>
        </tr>
        
          </tbody>
        </table>
        @endforeach

        <h4>Posisi Barang</h4>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Posisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lokasi as $l)
                <tr>
                    <td>{{ $l->created_at }}</td>

                    @if ($l->status == "Pengiriman Berhasil Dibuat")
                        <td>Pesanan Berhasil Dibuat, Tunggu Kurir Menjemput Barang</td>
                        <td>Pesanan Dibuat</td>
                    @elseif($l->status == "Verifikasi Kurir ke Logistik")
                        <td>Barang Dijemput oleh Kurir : {{ $l->nama_petugas }} dari Agen {{ $l->nama_agen }}</td>
                        <td>Diproses Kurir</td>
                    @elseif($l->status == "Verifikasi Kurir Ambil Barang")
                        <td>Barang Berhasil di Data oleh Kurir : {{ $l->nama_petugas }} dari Agen {{ $l->nama_agen }} </td>
                        <td>Diproses Kurir</td>
                    @elseif($l->status == "Verifikasi Logistik")
                        <td>Barang Berhasil di Verifikasi oleh Logistik : {{ $l->nama_petugas }} dari Agen {{ $l->nama_agen }} </td>
                        <td>Diproses Logistik</td>
                    @elseif($l->status == "Verifikasi Penjadwalan Pengiriman Barang Antar Kabupaten/Kota")
                        <td>Barang Dalam Proses Pengiriman ke : {{ $l->nama_petugas }} dari : Agen {{ $l->nama_agen }} </td>
                        <td>Dalam Perjalanan</td>
                    @elseif($l->status == "Verifikasi Pengiriman Barang dari Agen")
                        <td>Barang telah Diterima di Agen {{ $l->nama_agen }} </td>
                        <td>Dalam Perjalanan</td>
                    @elseif($l->status == "Verifikasi Penjadwalan Pengiriman")
                        <td>Barang sedang dilakukan penjadwalan pengiriman untuk kurir </td>
                        <td>Dalam Perjalanan</td>
                    @elseif($l->status == "Verifikasi Kurir Antar")
                        <td>Barang sedang Diantar oleh Kurir : {{ $l->nama_petugas }} ke alamat tujuan</td>
                        <td>Dalam Perjalanan</td>
                    @elseif($l->status == "Verifikasi Pesanan Diterima")
                        <td>Barang Sudah Diterima oleh {{ $penerima_barang }}. <a href="{{ asset('storage/bukti_penerimaan_barang/'.$bukti_terima) }}">Lihat Bukti</a>  </td>
                        <td>Barang Diterima</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

        @if ((auth()->user()->logistik) == 1)
        <h4>Surat Jalan</h4>
        <iframe src="{{ asset('storage/surat_jalan/'.$surat_jalan->surat_jalan) }}" width="80%" height="500" style="border:none;"></iframe>
        @endif
      </div>
@endsection