@extends('templates.kasir')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Tambah Data Produk</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">

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
                                <form action="{{route('obat.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Merk</label>
                                        <select class="form-control" name="id_merk">
                                            @foreach($datas as $data)
                                                <option value="{{$data->id}}">{{$data->merk}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" class="form-control {{$errors->has('nama_produk')?'is-invalid':''}}"
                                               name="nama_produk">
                                        @if ($errors->has('nama_produk'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('nama_produk') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input type="text" class="form-control {{$errors->has('satuan')?'is-invalid':''}}"
                                               name="satuan">
                                        @if ($errors->has('satuan'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('satuan') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" class="form-control {{$errors->has('harga')?'is-invalid':''}}"
                                               name="harga">
                                        @if ($errors->has('harga'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('harga') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Stok</label>
                                        <input type="number" class="form-control {{$errors->has('stok')?'is-invalid':''}}"
                                               name="stok">
                                        @if ($errors->has('stok'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('stok') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-actions">
                                        <a href="{{route('obat.index')}}" class="btn btn-warning">Cancel</a>
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