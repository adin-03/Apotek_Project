@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Edit Form Karyawan</h3>
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
                                        <label>Alamat</label>
                                        <input type="text" value="{{$kasirs -> alamat}}" class="form-control {{$errors->has('alamat')?'is-invalid':''}}"
                                               name="alamat">
                                        @if ($errors->has('alamat'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('alamat') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Hp</label>
                                        <input type="text" value="{{$kasirs -> no_hp}}" class="form-control {{$errors->has('no_hp')?'is-invalid':''}}"
                                               name="no_hp">
                                        @if ($errors->has('no_hp'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('no_hp') }}</b></p>
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
                                    </div>

                                    <div class="form-group">
                                        <label>Pasword</label>
                                        <input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}}"
                                                name="password">
                                        @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('password') }}</b></p>
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
