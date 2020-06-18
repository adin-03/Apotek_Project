@extends('templates.apotek')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Tambah Obat</h3>
        </div>
    </div>
    <div class="content-body"><!-- Basic Inputs start -->
        <section class="basic-inputs">
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="card-body">
                                <form action="{{route('apotek.obat.store')}}" method="post">
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
                                        <input type="text" minlength="5" class="form-control {{$errors->has('nama_produk')?'is-invalid':''}}" name="nama_produk" required>
                                        @if ($errors->has('nama_produk'))
                                            <span class="invalid-feedback" role="alert">
                                              <p><b>{{ $errors->first('nama_produk') }}</b></p>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                      <div class="col-4">
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <select class="form-control" name="satuan">
                                                <option value="Pcs">Pcs</option>
                                                <option value="Pak">Pak</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Dus">Dus</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-4">
                                          <div class="form-group">
                                              <label>Harga</label>
                                              <div class="input-group">
                            										<div class="input-group-prepend">
                            											<span class="input-group-text">Rp.</span>
                            										</div>
                            										<input type="telp" minlength="4" class="form-control" placeholder="Masukan Harga" name="harga" required>
                            									</div>
                                              @if ($errors->has('harga'))
                                                  <span class="invalid-feedback" role="alert">
                                                              <p><b>{{ $errors->first('harga') }}</b></p>
                                                          </span>
                                              @endif
                                          </div>
                                      </div>
                                      <div class="col-4">
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="number" min="1" value="1" class="form-control {{$errors->has('stok')?'is-invalid':''}}"
                                                   name="stok">
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
