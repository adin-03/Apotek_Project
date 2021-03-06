@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Data Karyawan Apotek</h3>
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
                                <a type="button" class="btn btn-primary btn-min-width mr-1 mb-1" href="{{route('apotek.karyawan.create')}}">
                                    <i class="ft-user-plus"></i>Tambah</a>

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
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Nomor Hp</th>
                                            <th>Email</th>
                                            <th>action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($kasirs as $karyawan)
                                            <tr>
                                                <th>{{$karyawan->id}}</th>
                                                <th>{{$karyawan->nama}}</th>
                                                <th>{{$karyawan->alamat}}</th>
                                                <th>{{$karyawan->no_hp}}</th>
                                                <th>{{$karyawan->email}}</th>
                                                <td>
                                                    <a class="btn btn-danger"
                                                       href="{{ route('apotek.karyawan.destroy', $karyawan->id) }}"
                                                       onclick="return confirm('Apakah Anda Akan Menghapus Data Ini?')"
                                                       type="button" class="btn default btn-outline btn-circle m-b-10">Delete</a>
                                                    <a class="btn btn-warning"
                                                       href="{{ route('apotek.karyawan.edit', $karyawan->id) }}"
                                                       class="btn default btn-outline btn-circle m-b-10">Edit</a>
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
