@extends('templates.apotek')
@section('content')

<div class="content-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-left">
              <div class="card-body">
                <h4 class="card-title">Nama Pelanggan : {{ $pelanggan->nama_pelanggan }}</h4>
                <p class="card-text">No Pelanggan : {{ $pelanggan->no_pelanggan }}</p>
                <p class="card-text">Umur Pelanggan : {{ $pelanggan->umur }}</p>
              </div>
            </div>
        </div>

        <h4 class="ml-2 col-md-12">Detail Obat</h4>

        @foreach ($pelanggan->transaksis as $transaksi)
        <div class="col-md-4">
            <div class="card text-left">
              <div class="card-body">
                <h4 class="card-title">{{ $transaksi->created_at->diffForHumans() }}</h4>
                @foreach ($transaksi->obats as $obat)
                <p class="card-text">Nama Obat : {{ $obat->nama_produk }}</p>
                <p class="card-text">Qty Obat : {{ $obat->kuantitas }}</p>
                @endforeach
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
