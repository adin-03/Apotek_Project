@extends('templates.kasir')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Edit Form Transaksi</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
                <div class="breadcrumb-wrapper mr-1">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="http://localhost:8000/admin/dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="http://localhost:8000/admin/merk">Merk</a>
                        </li>
                        <li class="breadcrumb-item"><a href="http://localhost:8000/admin/obat">Obat</a>
                        </li>
                        <li class="breadcrumb-item"><a href="http://localhost:8000/admin/transaksi">Transaksi</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body"><!-- Basic Inputs start -->
        <section class="basic-inputs">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="card-body">
                                <form action="{{route('obat.update', $obats->id)}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label>Merk</label>
                                        <select class="form-control" name="id_merk">
                                            @foreach($merks as $merk)
                                                <option value="{{ $merk->id }}" {{ $merk->id === $obats->id_merk ? "selected" : "" }} >{{ $merk->merk }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" value="{{$obats -> nama_produk}}" class="form-control" name="nama_produk">
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" value="{{$obats -> satuan}}" class="form-control" name="satuan">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" value="{{$obats -> harga}}" class="form-control" name="harga">
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" value="{{$obats -> stok}}" class="form-control" name="stok">
                                    </div>

                                    <div class="form-actions">
                                        <a href="{{route('merk.index')}}" class="btn btn-warning">Cancel</a>
                                        <button class="btn btn-success">Save</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- Basic Inputs end -->
    </div>
@endsection