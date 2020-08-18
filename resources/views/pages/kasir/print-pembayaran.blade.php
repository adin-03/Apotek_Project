<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:40px;
            width:750px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: #fff;
        }
        h4, p{
            margin:0px;
        }
    </style>
</head>
<body>
    <div class="">
        <table>
            <caption>
                Apotek Cemara
            </caption>
            <thead>
                <tr>
                    <th colspan="3">Invoice <strong>{{ $transaksi->no_transaksi }}</strong></th>
                    <th colspan="2">
                        <strong>Tanggal : {{ $transaksi->created_at->format('d-m-Y') }}</strong><br>
                        <strong>Waktu : {{ $transaksi->created_at->format('H:i:s') }}</strong>

                    </th>
                </tr>
                <tr>

                    <td colspan="5">
                        <h4>Nama : {{ $transaksi->pelanggan->nama_pelanggan }} / {{ $transaksi->pelanggan->no_pelanggan }}</h4>
                        <h4>Umur : {{ $transaksi->pelanggan->umur }} th</h4>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
                @php($totalHarga = 0)
                @foreach ($transaksi->obats as $item)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <th>{{ $item->nama_produk }}</th>
                    <th>{{ $item->kuantitas }}</th>
                    <th>Rp. {{ number_format($item->harga, 0,',','.') }}</th>
                    <th>Rp. {{ number_format($item->harga * $item->kuantitas, 0,',','.') }}</th>
                </tr>
                @php($totalHarga += $item->harga * $item->kuantitas)
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" rowspan="3"></th>
                    <th>Total Bayar</th>
                    <td>Rp. {{ number_format($transaksi->total_bayar, 0,',','.') }}</td>
                </tr>
               <tr>
                    <th>Total Harga</th>
                    <td>Rp. {{ number_format($totalHarga, 0,',','.') }}</td>
                </tr>
                 <tr>
                    <th>Kembali</th>
                    <td>Rp. {{ number_format($totalHarga - $transaksi->total_bayar, 0,',','.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
