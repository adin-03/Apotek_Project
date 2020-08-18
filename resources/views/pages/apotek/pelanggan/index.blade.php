@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Data Pelanggan</h3>
        </div>
    </div>
    <div class="content-body"><!-- DOM - jQuery events table -->
        <section id="dom">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                              {{-- <a type="button" class="btn btn-primary btn-min-width mr-1 mb-1" href="#">
                                  <i class="ft-plus"></i>Tambah</a> --}}

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                                    aria-hidden="true">×</span> </button>
                                        <h3 class="text-success"><i class="fa fa-remove-circle"></i> Error</h3> {{ $message }}
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <label for="">filter pelanggan berdasarkan obat yang di beli</label>
                                    <form action="{{ route('apotek.pelanggan.filter') }}" class="row" method="POST">
                                        @csrf
                                        <div class="form-group col-md-4">
                                            <select name="id_obat" class="form-control input-sm">
                                                <option value="0">Semua</option>
                                                @foreach ($obats as $o)
                                                    <option value="{{ $o->id }}" {{ $o->id == $obat ? "selected" : ""  }}>{{ $o->nama_produk }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="submit" class="btn btn-info btn-sm">filter</button>
                                        </div>
                                    </form>

                                    <table class="table table-striped table-bordered dom-jQuery-events">
                                        @if (count($pelanggans) < 1)
                                        <div class="d-flex justify-content-center mt-5">
                                            <h1>Tidak Ada Pelanggan</h1>
                                        </div>
                                        @else
                                        <thead>
                                        <tr>
                                            <td>No Pelanggan</td>
                                            <td>Nama Pelanggan</td>
                                            <td>Tanggal Lahir</td>
                                            <td>Umur</td>
                                            <td align="center">action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($pelanggans as $pelanggan)
                                            <tr>
                                                <th>{{$pelanggan->no_pelanggan}}</th>
                                                <th>{{$pelanggan->nama_pelanggan}}</th>
                                                <th>{{$pelanggan->tanggal_lahir}}</th>
                                                <th>{{$pelanggan->umur}}</th>
                                                <td>
                                                    <a class="btn btn-danger btn-sm" href="{{ route('apotek.pelanggan.destroy', $pelanggan->id) }}"
                                                       onclick="return confirm('Apakah Anda Akan Menghapus data ini?')"
                                                       type="button"> <i class="ft-trash-2"></i>
                                                     </a>
                                                     <a href="{{ route('apotek.pelanggan.histori', $pelanggan->id) }}" class="btn btn-info btn-sm">Histori</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
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
