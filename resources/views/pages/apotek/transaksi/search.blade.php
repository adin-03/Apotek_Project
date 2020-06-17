@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Data obat</h3>
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
                                <form action="{{route('apotek.transaksi.search')}}" method="get">
                                    @csrf
                                    <p>Filter Transaksi Pertiga bulan, dimulai dari bulan :</p>
                                    <div class="row">
                                        @php($bulan = ['Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'])
                                        <select class="form-control col-md-3 mr-2 ml-3" name="search_bulan_1">
                                            @for($i = 0; $i < count($bulan); $i++)
                                                <option value="{{$i}}" {{ $search_bulan == $i ? 'selected' : '' }}>{{$bulan[$i]}}</option>
                                            @endfor
                                        </select>

                                        <button class="btn btn-primary" type="submit">search</button>

                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered dom-jQuery-events">
                                        @if($results)
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Obat</th>
                                                <th>Total Penjualan</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($obats as $key => $obat)

                                                {{--{{dd(['key' => $key, 'obat' => $obat->nama_produk], $results)}}--}}

                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$obat->nama_produk}}</td>

                                                    <td>{{isset($results[$key+1]) ? $results[$key+1] : 0}} {{$obat->satuan}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        @else
                                            <div class="d-flex justify-content-center mt-5">
                                                <h1>Tidak Ada transaksi pada bulan ini</h1>
                                            </div>
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