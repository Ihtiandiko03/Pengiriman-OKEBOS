<!DOCTYPE html>
<html>
<head>
    <title>OKEBOS</title>
</head>
<body>
    <h2>{{ $details['title'] }}</h2>
    <h2>BARANG ANDA {{ $details['nama_barang'] }} dengan Nomor Resi {{ $details['nomor_resi'] }} Sudah Dikirimkan</h2>
    
    <h4>Detail Penerimaan Barang</h4>
    <p>Nomor Resi : {{ $details['nomor_resi'] }}</p>
    <p>Nama Barang : {{ $details['nama_barang'] }}</p>
    <p>Nama Penerima Barang : {{ $details['nama_penerima_barang'] }}</p>

   
    <p>Terima Kasih</p>
</body>
</html>