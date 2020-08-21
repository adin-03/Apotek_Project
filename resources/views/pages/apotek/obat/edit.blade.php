@extends('templates.apotek')
@section('content')
<div class="content-wrapper-before"></div>
<div class="content-header row">
    <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">Edit Form Produk</h3>
    </div>
</div>
<div class="content-body">
    <!-- Basic Inputs start -->
    <section class="basic-inputs">
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-body">
                            <form action="{{route('apotek.obat.update', $obats->id)}}" method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label>Label</label>
                                    <select class="form-control" name="id_merk">
                                        @foreach($merks as $merk)
                                        <option value="{{ $merk->id }}"
                                            {{ $merk->id === $obats->id_merk ? "selected" : "" }}>{{ $merk->merk }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" value="{{$obats -> nama_produk}}"
                                        class="form-control {{$errors->has('nama_produk')?'is-invalid':''}}"
                                        name="nama_produk" required>
                                    @if ($errors->has('nama_produk'))
                                    <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('nama_produk') }}</b></p>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" value="{{$obats -> kategori}}"
                                        class="form-control {{$errors->has('kategori')?'is-invalid':''}}"
                                        name="kategori" required>
                                    @if ($errors->has('kategori'))
                                    <span class="invalid-feedback" role="alert">
                                        <p><b>{{ $errors->first('kategori') }}</b></p>
                                    </span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <input type="text" value="{{$obats -> satuan}}"
                                                class="form-control {{$errors->has('satuan')?'is-invalid':''}}"
                                                name="satuan">
                                            @if ($errors->has('satuan'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('satuan') }}</b></p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="number" minlength="3" value="{{$obats -> harga}}"
                                                    class="form-control {{$errors->has('harga')?'is-invalid':''}}"
                                                    name="harga">
                                            </div>
                                            @if ($errors->has('satuan'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('harga') }}</b></p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="number" value="{{$obats -> stok}}" class="form-control"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="form-group">
                                            <label>Tambah Stok</label>
                                            <input type="number" value="1" min="1" max="1000"
                                                class="form-control {{$errors->has('stok')?'is-invalid':''}}"
                                                name="stok"  onkeypress="return event.charCode >= 48">
                                            @if ($errors->has('stok'))
                                            <span class="invalid-feedback" role="alert">
                                                <p><b>{{ $errors->first('stok') }}</b></p>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <a href="{{route('apotek.obat.index')}}" class="btn btn-danger">Batal</a>
                                    <button class="btn btn-success">Simpan</button>
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

@section('script')
<script>
    $(document).ready(function() {
        $("input[type=number]").on("focus", function() {
            $(this).on("keydown", function(event) {
                if (event.keyCode === 38 || event.keyCode === 40) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
@endsection
