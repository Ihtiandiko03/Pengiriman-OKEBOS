<!DOCTYPE html>
<html>
<head>
    <title>OKEBOS</title>
</head>
<body>
    <h2>{{ $details['title'] }}</h2>
    <h2>Anda Telah Melakukan Pemesanan Pengiriman Barang di OKEBOS dengan rincian sebagai berikut:</h2>
    
    <h3>Deskripsi</h3>
    <p>Nomor Resi : {{ $details['nomor_resi'] }}</p>
    <p>Jenis Pengiriman : {{ $details['jenis_pengiriman'] }}</p>
    <p>Rute Awal : {{ $details['rute_awal'] }}</p>
    <p>Rute Tujuan : {{ $details['rute_tujuan'] }}</p>
    <p>Nama Barang : {{ $details['nama_barang'] }}</p>

    <h3>Pengirim</h3>
    <p>Nama Pengirim : {{ $details['nama_pengirim'] }}</p>
    <p>Provinsi Pengirim : {{ $details['provinsi_pengirim'] }}</p>
    <p>Kabupaten/Kota Pengirim : {{ $details['kabupatenkota_pengirim'] }}</p>
    <p>Kecamatan Pengirim : {{ $details['kecamatan_pengirim'] }}</p>
    <p>Kelurahan Pengirim : {{ $details['kelurahan_pengirim'] }}</p>
    <p>Alamat Pengirim : {{ $details['alamat_pengirim'] }}</p>
    <p>Kodepos Pengirim : {{ $details['kodepos_pengirim'] }}</p>
    <p>Nomor HP Pengirim : {{ $details['nomorhp_pengirim'] }}</p>
    <h3>Penerima</h3>
    <p>Nama Penerima : {{ $details['nama_penerima'] }}</p>
    <p>Provinsi Penerima : {{ $details['provinsi_penerima'] }}</p>
    <p>Kabupaten/Kota Penerima : {{ $details['kabupatenkota_penerima'] }}</p>
    <p>Kecamatan Penerima : {{ $details['kecamatan_penerima'] }}</p>
    <p>Kelurahan Penerima : {{ $details['kelurahan_penerima'] }}</p>
    <p>Alamat Penerima : {{ $details['alamat_penerima'] }}</p>
    <p>Kodepos Penerima : {{ $details['kodepos_penerima'] }}</p>
    <p>Nomor HP Penerima : {{ $details['nomorhp_penerima'] }}</p>

    <p>Terima Kasih</p>
</body>
</html>