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

                          <div class="table-responsive mt-3">
                           <table class="table table-striped table-bordered dom-jQuery-events">
                               <thead>
                                   <tr>
                                     <th>No</th>
                                     <th>No Transaksi</th>
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
                                         <td>{{$loop->iteration}}</td>
                                         <td>{{$transaksi->no_transaksi}}</td>
                                         <td>{{$transaksi->nama_pembeli}}</td>
                                         <td>{{$transaksi->umur}} Th</td>
                                         <td>{{$transaksi->created_at->format('d m Y H:i')}}</td>
                                         <td>
                                           <button class="btn btn-info btn-sm" data-toggle="collapse"
                                                   data-target="#collapse{{$transaksi->id}}" aria-expanded="false"
                                                   aria-controls="collapseA1">
										                            Detail ({{count($transaksi->obats)}} Produk)
									                          </button>
                                         </td>
                                         <td>{{'Rp. '.number_format($transaksi->obats->sum('total'), 0,',','.')}}</td>
                                     </tr>
                                     @foreach($transaksi->obats as $obat)
                                     <tr id="collapse{{$transaksi->id}}" class="collapse" aria-labelledby="headingAOne">
                                            <td>#</td>
                                            <td colspan="4"></td>
                                            <td>{{$obat->nama_produk}} {{number_format($obat->harga,0,',','.')}} x {{$obat->kuantitas}}</td>
                                            <td>Rp. {{number_format($obat->total,0,',','.')}}</td>
                                     </tr>
                                     @endforeach
                                 @endforeach

                               </tbody>

                           </table>

                                <!-- <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Transaksi</th>
                                            <th>Obat / Kuantitas</th>
                                            <th>Nama Pembeli</th>
                                            <th>Umur</th>
                                            <th>Total Harga</th>
                                            <th>Total Produk</th>
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
                                                        / {{$transaksiobat->kuantitas}} {{$transaksiobat->obat->satuan}}
                                                        <br/>
                                                    @endforeach
                                                </td>
                                                <td>{{$transaksi->nama_pembeli}}</td>
                                                <td>{{$transaksi->umur. ' Th'}}</td>h
                                                <td>{{'Rp. '.number_format($transaksi->obats->sum('total'))}}</td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- DOM - jQuery events table -->

    </div>
@endsection
