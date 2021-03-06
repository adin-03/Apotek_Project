<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css">
    table tr td,
    table tr th {
        font-size: 9pt;
    }
</style>
<center>
    <h5>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
        <h6><a target="_blank" href="#">Jl. Raya</a>
    </h5>
</center>

<p> Nama : Apotek Cemara</p>
<p> Tanggal : {{\Carbon\Carbon::now()->format('d-m-Y')}}</p>

<table class='table table-bordered'>
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama Produk / Kuantitas</th>
        <th>Nama Pembeli</th>
        <th>Umur</th>
        <th>Harga</th>
        <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transaksis as $transaksi)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{\Carbon\Carbon::parse($transaksi->created_at)->format('d M Y')}}</td>
            <td>
                @foreach($transaksi->transaksiobats as $transaksiobat)
                    {{$transaksiobat->obat->nama_produk}}
                    / {{$transaksiobat->kuantitas}} {{$transaksiobat->obat->satuan}}<br/>
                @endforeach
            </td>
            <td>{{$transaksi->nama_pembeli}}</td>
            <td>{{$transaksi->umur. ' Tahun'}}</td>
            <td> @foreach($transaksi->transaksiobats as $transaksiobat)
                    {{'Rp. '.number_format($transaksiobat->obat->harga)}}<br/>
                @endforeach
            </td>
            <td>{{'Rp. '.number_format($transaksi->total_harga_keseluruhan)}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
