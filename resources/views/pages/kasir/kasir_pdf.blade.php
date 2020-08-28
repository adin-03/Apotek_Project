<!DOCTYPE html>
<html>

<head>
    <title>Struk Pembelian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css" media="all">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

        table,
        th,
        td {
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
        <h5>Struk Pembelian Apotek Cemara</h4>
            <h6><a target="_blank" href="#">Jl.Panarukan 50 Adiwerna Kab. Tegal</a>
        </h5>
    </center>


    <div class="modal-body row">
        <div class="col-8">
            <h5 id="detail-nama"></h5>
            <h5 id="detail-umur"></h5>
        </div>
        <p> Tanggal : {{\Carbon\Carbon::now()->format('d-m-Y')}}</p>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obats as $obat)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $obat['nama_produk'] }}</td>
                    <td>{{ $obat['kategori'] }}</td>
                    <td>{{ $obat['qty'] }}</td>
                    <td>{{ $obat['harga'] * $obat['qty'] }}</td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="3"></td>
                    <td>Total Harga</td>
                    <td>Rp. {{ number_format($totalHarga) }}</td>
                  </tr>
                  <tr>
                    <td colspan="3"></td>
                    <td>Total Bayar</td>
                    <td>Rp. {{ number_format($totalBayar) }}</td>
                  </tr>
                  <tr>
                    <td colspan="3"></td>
                    <td>Kembali</td>
                    <td>Rp. {{ number_format($kembali) }}</td>
                  </tr>

            </tbody>
        </table>

</body>

</html>
