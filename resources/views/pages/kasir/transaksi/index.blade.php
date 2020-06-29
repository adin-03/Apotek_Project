@extends('templates.kasir')
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


                                <form action="{{route('kasir.transaksi.search')}}" method="get">
                                    @csrf
                                    <p>Filter Transaksi Pertiga bulan, dimulai dari bulan :</p>
                                    <div class="row">
                                        @php($bulan = ['Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
                                        <select class="form-control col-md-3 mr-2 ml-3" name="search_bulan_1">
                                            @for($i = 0; $i < count($bulan); $i++)
                                                <option value="{{$i}}"{{  $search_bulan ? $search_bulan == $i ? 'selected' : '' : '' }}>{{$bulan[$i]}}</option>
                                            @endfor
                                        </select>

                                        <button class="btn btn-primary" type="submit"><i class="ft-search"> </i>search</button>

                                        {{--<div class=" ml-1"><a href="{{route('kasir.transaksi.create')}}" class="btn btn-info"><i class="ft-plus"></i>Tambah</a>--}}
                                        {{--</div>--}}

                                        <div class="ml-1">
                                            <a href="{{route('kasir.transaksi.cetak_pdf')}}" class="btn btn-primary"
                                               target="_blank"><i class="ft-printer"> </i>CETAK</a>
                                        </div>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered dom-jQuery-events">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Transaksi</th>
                                            <th>Obat / Kuantitas</th>
                                            <th>Nama Pembeli</th>
                                            <th>Umur</th>
                                            <th>Total Harga</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transaksis as $transaksi)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$transaksi->no_transaksi}}</td>
                                                <td>
                                                    @foreach($transaksi->transaksiobats as $transaksiobat)
                                                        {{$transaksiobat->obat->nama_produk}}
                                                        / {{$transaksiobat->kuantitas}} {{$transaksiobat->obat->satuan}}
                                                        <br/>
                                                    @endforeach
                                                </td>
                                                <td>{{$transaksi->nama_pembeli}}</td>
                                                <td>{{$transaksi->umur. ' Th'}}</td>h
                                                <td>{{'Rp. '.number_format($transaksi->total_harga_keseluruhan)}}</td>
                                                <td>
                                                    {{--<a class="btn btn-warning"--}}
                                                       {{--href="{{ route('transaksi.edit', $transaksi->id) }}"--}}
                                                       {{--onclick="return confirm('Apakah Anda Akan Edit Data Ini?')"--}}
                                                       {{--type="button" class="btn default btn-outline btn-circle m-b-10">Edit</a>--}}
                                                    <a class="btn btn-danger"
                                                       href="{{ route('kasir.transaksi.destroy', $transaksi->id) }}"
                                                       onclick="return confirm('Apakah Anda Akan Menghapus Data Ini?')"
                                                       type="button" class="btn default btn-outline btn-circle m-b-10">Delete</a>
                                                </td>
                                            </tr>
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