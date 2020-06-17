@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Edit Form Karyawan</h3>
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
    <div class="content-body"><!-- Basic Inputs start -->
        <section class="basic-inputs">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="card-body">
                                <form action="{{route('apotek.karyawan.update', $kasirs->id)}}" method="post">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" value="{{$kasirs -> nama}}" class="form-control {{$errors->has('nama')?'is-invalid':''}}"
                                               name="nama">
                                        @if ($errors->has('nama'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('nama') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" value="{{$kasirs -> email}}" class="form-control {{$errors->has('email')?'is-invalid':''}}"
                                               name="email">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('email') }}</b></p>
                                                    </span>
                                        @endif

                                    <div class="form-actions">
                                        <a href="{{route('apotek.karyawan.index')}}" class="btn btn-warning">Cancel</a>
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