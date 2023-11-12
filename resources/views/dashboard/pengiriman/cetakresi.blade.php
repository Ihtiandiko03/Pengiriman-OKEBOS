<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .invoice-container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #f8f8f8;
    }
    .invoice-header {
      text-align: center;
      margin-bottom: 20px;
    }
    .invoice-title {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333;
    }
    .invoice-subtitle {
      font-size: 16px;
      color: #777;
      margin-bottom: 10px;
    }
    .invoice-details {
      display: flex;
      justify-content: space-between;
      text-align: left;
      margin-bottom: 30px;
    }
    .invoice-detail {
      font-size: 14px;
      color: #555;
    }
    .invoice-table {
      width: 100%;
      border-collapse: collapse;
    }
    .invoice-table th, .invoice-table td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }
    .invoice-table th {
      background-color: #f2f2f2;
    }
    .invoice-total {
      text-align: right;
      padding-top: 10px;
      font-size: 18px;
      font-weight: bold;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="invoice-container">
    @foreach($data as $d)
    <div class="invoice-header">
    <div class="invoice-details">
        <div class="invoice-detail">
            <div class="invoice-title">Invoice</div>
            <div class="invoice-subtitle">Nomor Resi: {{ $d->nomor_resi }}</div>
            <div class="invoice-detail">Tanggal Dibuat: {{ $d->created_at }}</div>
        </div>
        <div class="invoice-detail">
            <img src="{{ asset('storage/okebos.png') }}" style="width: 100px; height:100px">
        </div>
    </div>
      
      <div class="invoice-details">
        <div class="invoice-detail">
            <p>Kota Awal: {{ $d->kabupatenkota_pengirim }}</p>
            <p>Kota Tujuan: {{ $d->kabupatenkota_penerima }}</p>
            <p>Jenis Pengiriman: {{ $d->jenis_pengiriman }}</p>
            <p>Jasa Kirim: BOS Express</p>


        </div>
        {{-- <div class="invoice-detail">
                <img src="{{ asset('storage/okebos.png') }}" style="width: 100px; height:100px">
        </div> --}}
      </div>
    </div>

    <div class="invoice-details">
        <div class="invoice-detail">
            <h3>Pengirim</h3>
            <p>Nama: {{ $d->nama_pengirim }}</p>
            <p>Alamat: {{ $d->alamat_pengirim }} , {{ $d->kelurahan_pengirim }} Kecamatan {{$d->kecamatan_pengirim }}, {{ $d->kabupatenkota_pengirim }}, Provinsi {{ $d->provinsi_pengirim }}, {{ $d->kodepos_pengirim }}</p>
            <p>Kabupaten/Kota : {{ $d->kabupatenkota_pengirim }}</p>
            <p>Telepon : {{ $d->nomorhp_pengirim }}</p>

        </div>
        <div class="invoice-detail" style="margin-left: 50px;">
            <h3>Penerima</h3>
            <p>Nama: {{ $d->nama_penerima }}</p>
            <p>Alamat: {{ $d->alamat_penerima }} , {{ $d->kelurahan_penerima }} Kecamatan {{$d->kecamatan_penerima }}, {{ $d->kabupatenkota_penerima }}, Provinsi {{ $d->provinsi_penerima }}, {{ $d->kodepos_penerima }}</p>
            <p>Kabupaten/Kota : {{ $d->kabupatenkota_penerima }}</p>
            <p>Telepon : {{ $d->nomorhp_penerima }}</p>

        </div>
    </div>

    <hr>
    <p><b>Estimasi Ongkos Kirim : </b> Rp.{{ number_format($d->harga ,2,",",".") }},- (<b>Total Berat :</b> {{ $d->berat_barang }} Kg)</p>

    <table class="invoice-table">
      <thead>
        <tr>
          <th>Nama Barang</th>
          <th>Quantity</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $d->nama_barang }}</td>
          <td>{{ $d->jumlah_barang }}</td>
          <td>Rp.{{ number_format($d->harga ,2,",",".") }}</td>
        </tr>
        
        <!-- Add more rows for additional products if needed -->
      </tbody>
    </table>

    @endforeach
  </div>
</body>
</html>