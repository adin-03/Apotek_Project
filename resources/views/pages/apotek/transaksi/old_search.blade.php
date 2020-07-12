@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Data Transaksi</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">

            </div>
        </div>
    </div>
    <div class="content-body"><!-- DOM - jQuery events table -->
        <section id="dom">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{route('apotek.transaksi.search')}}" method="get">
                                            @csrf
                                            <p>Filter Transaksi Pertiga bulan, dimulai dari bulan :</p>
                                            <div class="row">
                                                @php($bulan = ['Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
                                                <select class="form-control col-md-3 mr-2 ml-3" name="search_bulan_1">
                                                    @for($i = 0; $i < count($bulan); $i++)
                                                        <option value="{{$i}}" {{ $search_bulan == $i ? 'selected' : '' }}>{{$bulan[$i]}}</option>
                                                    @endfor
                                                </select>

                                                @php($tahun = ['2017', '2018', '2019', '2020', '2021', '2022'])
                                                <select name="search_tahun" class="form-control col-md-3 mr-2">
                                                    @for ($i = 0; $i < count($tahun); $i++)
                                                        <option value="{{ $tahun[$i] }}" {{ $search_tahun == $tahun[$i] ? 'selected' : '' }}>{{ $tahun[$i] }}</option>
                                                    @endfor
                                                </select>
                                                <button class="btn btn-primary" type="submit">search</button>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{ route('apotek.transaksi.cetak_pdf') }}" method="get">
                                            <input id="print-bulan" name="print_bulan" type="hidden">
                                            <input id="print-tahun" name="print_tahun" type="hidden">
                                            <button class="btn btn-primary" type="submit" target="_blank"> <i class="ft-printer"></i> Cetak</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered dom-jQuery-events">
                                        @if(count($results) > 0)
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Obat</th>
                                                <th>Total Penjualan</th>
                                                <th>Total Harga per produk</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
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
                                        @else
                                            <div class="d-flex justify-content-center mt-5">
                                                <h1>Tidak Ada transaksi pada bulan ini</h1>
                                            </div>
                                        @endif
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
