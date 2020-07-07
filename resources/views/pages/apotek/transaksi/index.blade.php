@extends('templates.apotek')
@section('content')
<div class="content-wrapper-before"></div>
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Data Transaksi</h3>
    </div>
</div>
<div class="content-body">
    <!-- DOM - jQuery events table -->
    <section id="dom">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">

                            <div class="row">
                                <div class="col-md-7">
                                    <form action="{{route('apotek.transaksi.search')}}" method="get" class="mb-2">
                                        @csrf
                                        <p>Filter Transaksi Pertiga bulan, dimulai dari bulan :</p>
                                        <div class="row">
                                            @php($bulan = ['Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                                            'Agustus', 'September', 'Oktober', 'November', 'Desember'])
                                            <select class="form-control col-md-3 mr-2 ml-3" name="search_bulan_1" id="search-bulan">
                                                @for($i = 0; $i < count($bulan); $i++) <option value="{{$i}}"
                                                    {{  $search_bulan == $i ? 'selected' : '' }}>
                                                    {{$bulan[$i]}}</option>
                                                    @endfor
                                            </select>

                                            @php($tahun = ['2017', '2018', '2019', '2020', '2021', '2022'])
                                            <select name="search_tahun" class="form-control col-md-2 mr-2" id="search-tahun">
                                                @for ($i = 0; $i < count($tahun); $i++) <option value="{{ $tahun[$i] }}"
                                                {{ $search_tahun == $tahun[$i] ? 'selected' : ''}}>
                                                    {{ $tahun[$i] }}</option>
                                                    @endfor
                                            </select>

                                            <button class="btn btn-info" type="submit"> <i class="ft-search"></i> Cari</button>

                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <form action="{{ route('apotek.transaksi.cetak_pdf') }}" method="get">
                                        <input id="print-bulan" name="print_bulan" type="hidden">
                                        <input id="print-tahun" name="print_tahun" type="hidden">
                                        <button class="btn btn-primary" type="submit" target="_blank"> <i class="ft-printer"></i> Cetak</button>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dom-jQuery-events">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Transaksi</th>
                                            <th>Nama Kasir</th>
                                            <th>Nama Pembeli</th>
                                            <th>Umur</th>
                                            <th>Tanggal</th>
                                            <th>Total Produk</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaksis as $transaksi)
                                        <tr>
                                            <td width="1%">{{$loop->iteration}}</td>
                                            <td>{{$transaksi->no_transaksi}}</td>
                                            <td>{{$transaksi->kasir->nama}}</td>
                                            <td>{{$transaksi->nama_pembeli}}</td>
                                            <td>{{$transaksi->umur}} Th</td>
                                            <td>{{$transaksi->created_at->format('d-m-Y H:i')}}</td>
                                            <td>
                                                <button class="btn btn-info btn-sm" data-toggle="collapse"
                                                    data-target="#collapse{{$transaksi->id}}" aria-expanded="false"
                                                    aria-controls="collapseA1">
                                                    Detail ({{count($transaksi->obats)}} Produk)
                                                </button>
                                            </td>
                                            <td>{{'Rp. '.number_format($transaksi->obats->sum('total'), 0,',','.')}}
                                            </td>
                                        </tr>
                                        @foreach($transaksi->obats as $obat)
                                        <tr id="collapse{{$transaksi->id}}" class="collapse"
                                            aria-labelledby="headingAOne">
                                            <td width="1%">#</td>
                                            <td colspan="5"></td>
                                            <td>{{$obat->nama_produk}} {{number_format($obat->harga,0,',','.')}} x
                                                {{$obat->kuantitas}}</td>
                                            <td>Rp. {{number_format($obat->total,0,',','.')}}</td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- DOM - jQuery events table -->

</div>
@endsection

@section('script')
    <script>
        var searchBulan = document.querySelector('#search-bulan')
        var searchTahun = document.querySelector('#search-tahun')
        var printBulan = document.querySelector('#print-bulan')
        var printTahun = document.querySelector('#print-tahun')

        printBulan.value = searchBulan.value
        printTahun.value = searchTahun.value

        searchBulan.addEventListener('change', function(){
            printBulan.value = this.value

        })
        searchTahun.addEventListener('change', function(){
            printTahun.value = this.value
        })

    </script>
@endsection
