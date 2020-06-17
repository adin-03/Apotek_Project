@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Data Merk</h3>
        </div>

        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="http://localhost:8000/apotek/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="http://localhost:8000/apotek/merk">Merk</a>
                        </li>
                        <li class="breadcrumb-item"><a href="http://localhost:8000/apotek/obat">Obat</a>
                        </li>
                        <li class="breadcrumb-item"><a href="http://localhost:8000/apotek/transaksi">Transaksi</a>
                        </li>
                    </ol>
                </div>
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
                                <a type="button" class="btn btn-primary btn-min-width mr-1 mb-1" href="{{route('apotek.merk.create')}}">
                                    <i class="ft-plus"></i>Tambah</a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered dom-jQuery-events">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Merk</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($merks as $merk)
                                            <tr>
                                                <th>{{$merk->id}}</th>
                                                <th>{{$merk->merk}}</th>
                                                <td>
                                                    <a class="btn btn-warning"
                                                       href="{{ route('apotek.merk.edit', $merk->id) }}"
                                                       class="btn btn-outline btn-circle m-b-10">Edit</a>
                                                    <a class="btn btn-danger"
                                                       href="{{ route('apotek.merk.destroy', $merk->id) }}"
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