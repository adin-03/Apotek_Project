@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Data Transaksi</h3>
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

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p>Total Obat</p>
                    <p>{{ $obat }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p>Total Transaksi</p>
                    <p>{{ $transaksi }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection