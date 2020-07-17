<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<style type="text/css" media="all">
    table tr td,
    table tr th {
        font-size: 9pt;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    div.total-harga {
        position: absolute;
        right: 0;
        width: 100px;
        height: 120px;
    }
</style>
<center>
    <h5>Laporan Transaksi Apotek Cemara</h4>
        <h6><a target="_blank" href="#">Jl.Panarukan 50 Adiwerna Kab. Tegal</a>
    </h5>
</center>

<p> Nama : Apotek Cemara</p>
<p> Tanggal : {{\Carbon\Carbon::now()->format('d-m-Y')}}</p>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>No Transaksi</th>
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
            <td>{{$transaksi->no_transaksi}}</td>
            <td>
                @foreach($transaksi->obats as $transaksiobat)
                    {{$transaksiobat->obat->nama_produk}}
                    / {{$transaksiobat->kuantitas}} {{$transaksiobat->obat->satuan}}<br/>
                @endforeach
            </td>
            <td>{{$transaksi->pelanggan->nama_pelanggan}}</td>
            <td>{{$transaksi->pelanggan->umur}} Th</td>
            <td>
                @foreach($transaksi->obats as $transaksiobat)
                    {{'Rp. '.number_format($transaksiobat->obat->harga,0,',','.')}}<br/>
                @endforeach
            </td>

            <td>
                @foreach($transaksi->obats as $transaksiobat)
                    {{'Rp. '.number_format($transaksiobat->total,0,',','.')}}<br/>
                @endforeach
            </td>
        </tr>
    @endforeach
        <tr>
            <td colspan="5"></td>
            <td>Jumlah</td>
            <td>{{'Rp. '.number_format($total,0,',','.')}}</td>
        </tr>
    </tbody>

</table>

</body>
</html>
