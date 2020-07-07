@extends('templates.kasir')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Data Produk</h3>
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
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered dom-jQuery-events">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Id Label</th>
                                            <th>Nama Produk</th>
                                            <th>Satuan</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Sisa Stok</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($obats as $obat)
                                            <tr>
                                                <th>{{$obat->id}}</th>
                                                <th>{{$obat->kode_obat}}</th>
                                                <th>{{$obat->id_merk}}</th>
                                                <th>{{$obat->nama_produk}}</th>
                                                <th>{{$obat->satuan}}</th>
                                                <th>{{'Rp. '.number_format($obat->harga)}}</th>
                                                <th>{{$obat->stok}}</th>
                                                <th>{{$obat->sisa_stok}}</th>
                                                {{--<td>--}}
                                                    {{--<a class="btn btn-danger"--}}
                                                       {{--href="{{ route('obat.destroy', $obat->id) }}"--}}
                                                       {{--onclick="return confirm('Apakah Anda Akan Menghapus Data Ini?')"--}}
                                                       {{--type="button" class="btn default btn-outline btn-circle m-b-10">Delete</a>--}}
                                                    {{--<a class="btn btn-warning"--}}
                                                       {{--href="{{ route('obat.edit', $obat->id) }}"--}}
                                                       {{--class="btn default btn-outline btn-circle m-b-10">Edit</a>--}}
                                                {{--</td>--}}
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