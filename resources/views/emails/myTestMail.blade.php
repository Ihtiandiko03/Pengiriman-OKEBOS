<!DOCTYPE html>
<html>
<head>
    <title>OKEBOS</title>
</head>
<body>
    <h2>{{ $details['title'] }}</h2>
    <h2>HARAP SIMPAN BAIK BAIK DATA PENGGUNA INI. JANGAN DIBERIKAN KE SIAPA PUN</h2>
    <h4>DATA DIRI</h4>

    <p>Perusahaan : {{ $details['perusahaan'] }}</p>
    <p>Nama : {{ $details['nama'] }}</p>
    <p>Username : {{ $details['username'] }}</p>
    <p>Email : {{ $details['email'] }}</p>
    <p>Password : {{ $details['password'] }}</p>
    <p>Telepon : {{ $details['telepon'] }}</p>
    <p>Alamat : {{ $details['alamat'] }}</p>
    <p>Kelurahan : {{ $details['kelurahan'] }}</p>
    <p>Kecamatan : {{ $details['kecamatan'] }}</p>
    <p>Kabupaten/Kota : {{ $details['kabupatenkota'] }}</p>
    <p>Provinsi : {{ $details['provinsi'] }}</p>

   
    <p>Terima Kasih</p>
</body>
</html>