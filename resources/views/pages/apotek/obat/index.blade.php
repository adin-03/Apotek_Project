@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Data Produk</h3>
        </div>
    </div>
    <div class="content-body"><!-- DOM - jQuery events table -->
        <section id="dom">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                              <a type="button" class="btn btn-primary btn-min-width mr-1 mb-1" href="{{route('apotek.obat.create')}}">
                                  <i class="ft-plus"></i>Tambah</a>

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                                    aria-hidden="true">×</span> </button>
                                        <h3 class="text-success"><i class="fa fa-remove-circle"></i> </h3> {{ $message }}
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered dom-jQuery-events">
                                        <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode</td>
                                            <td>Label</td>
                                            <td>Nama Produk</td>
                                            <td>Satuan</td>
                                            <td>Harga</td>
                                            <td>Stok</td>
                                            <td>Sisa Stok</td>
                                            <td align="center">action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($obats as $obat)
                                            <tr>
                                                <th>{{$obat->id}}</th>
                                                <th>{{$obat->kode_obat}}</th>
                                                <th>{{$obat->merk->merk}}</th>
                                                <th>{{$obat->nama_produk}}</th>
                                                <th>{{$obat->satuan}}</th>
                                                <th>{{'Rp. '.number_format($obat->harga, 0,',','.')}}</th>
                                                <th>{{$obat->stok}}</th>
                                                <th>{{$obat->sisa_stok}}</th>
                                                <td width="17%">
                                                    <a class="btn btn-warning btn-sm" href="{{ route('apotek.obat.edit', $obat->id) }}">
                                                      <i class="ft-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" href="{{ route('apotek.obat.destroy', $obat->id) }}"
                                                       onclick="return confirm('Apakah Anda Akan Menghapus obat {{$obat->nama_produk}}?')"
                                                       type="button"> <i class="ft-trash-2"></i>
                                                     </a>
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
