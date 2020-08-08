<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
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
    <h5>Laporan Penjualan Apotek Cemara</h4>
        <h6><a target="_blank" href="#">Jl.Panarukan 50 Adiwerna Kab. Tegal</a>
    </h5>
</center>

<p> Nama : Apotek Cemara</p>
<p> Tanggal : {{\Carbon\Carbon::now()->format('d-m-Y')}}</p>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Total Penjualan</th>
        <th>Total Harga PerProduk</th>
        <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
        @foreach($obats as $key => $obat)
        @if(isset($results[$key+1]) > 0)
        <tr>
            <td>{{ $no }}</td>
            <td>{{$obat->nama_produk}}</td>
            <td>{{ isset($results[$key+1]) ?  $results[$key+1] .' '. $obat->satuan : '' }}</td>
            <td>{{isset($total_harga_perproduk[$key+1]) ? 'Rp. '. number_format($total_harga_perproduk[$key+1]) : ''}}</td>
        </tr>
        <?php $no++ ?>
        @endif
    @endforeach

    </tbody>

</table>

</body>
</html>
