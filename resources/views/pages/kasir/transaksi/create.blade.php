@extends('templates.kasir')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
            <h3 class="content-header-title">Tambah Data Transaksi</h3>
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
                                <form action="{{route('kasir.transaksi.store')}}" method="post">
                                    @csrf

                                    <button id="add-form" type="button" class="btn btn-success">Add</button>

                                    <button id="removebtn" type="button" class="btn btn-danger">Remove</button>

                                    <div class="form-wrapper">
                                        <div class="form-repaet">
                                            <div class="form-group row">
                                                <select id="obat" name="id_obat[]"
                                                        class="form-control xxx select2 input-lg col-md-5 obat">
                                                    @foreach($obats as $obat)
                                                        <option value="{{$obat->id}}">{{$obat->nama_produk}}
                                                            / {{$obat->satuan}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="number" class="form-control kuantitas col-md-1" placeholder="Kuantitas"
                                                       name="kuantitas[]" id="kuantitas">

                                                <input type="number" class="form-control kuantitas col-md-2" id="harga">
                                                <input type="number" class="form-control kuantitas col-md-3" id="sub_total">

                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="line line-dashed line-lg pull-in"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Pembeli</label>
                                        <input type="text"
                                               class="form-control {{$errors->has('nama_pembeli')?'is-invalid':''}}"
                                               name="nama_pembeli" id="nama_pembeli">
                                        @if ($errors->has('nama_pembeli'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('nama_pembeli') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Umur</label>
                                        <input type="text"
                                               class="form-control {{$errors->has('umur')?'is-invalid':''}}"
                                               name="umur" id="umur">
                                        @if ($errors->has('umur'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('umur') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-actions">
                                        <a href="{{route('kasir.transaksi.index')}}" class="btn btn-warning">Cancel</a>

                                        <button id="lanjutkan" type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail">
                                            Lanjutkan
                                        </button>

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


    <!-- Modal -->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('kasir.transaksi.store')}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Nomor Transaksi</label>
                                <input type="text" class="form-control" name="no_transaksi" id="detail_no_transaksi" readonly>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Nama Pembeli</label>
                                <input type="text" class="form-control" name="nama_pembeli" id="detail_nama_pembeli" readonly>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Umur</label>
                                <input type="text" class="form-control" name="umur" id="detail_umur" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">Obat</label>
                                <input type="text" class="form-control" id="detail_obat" name="obat" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Kuantitas</label>
                                <input type="text" class="form-control" id="detail_kuantitas" name="kuantitas" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Harga</label>
                                <input type="text" class="form-control" id="detail_harga" name="harga" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">Sub Total</label>
                                <input type="text" class="form-control" id="detail_sub_total" name="sub_total" readonly>
                            </div>

                        </div>

                        <div class="dropdown-divider"></div>

                        <div class="form-group ">
                            <label for="">Total Harga</label>
                            <input type="text" class="form-control" id="total_harga" name="detail_total_harga" readonly>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $('.xxx').select2();

        var counter = 1;


        $(document).ready(function(){
            $(".obat").on('change',function(e){
                if($(this).val() != ''){
                    var id = e.target.value;
                    var url = '{{ route("kasir.obat.show", ":id") }}'
                    url = url.replace(':id', id)
                    $.get(url, function(data){
                        var harga =  data.harga;
                        var kuantitas =  document.getElementById('kuantitas').value;
                        var sub_total = harga * kuantitas;

                        document.getElementById('harga').value = harga
                        document.getElementById('sub_total').value = sub_total


                    })
                }
            });
        });

        $("#add-form").click(function () {
            if (counter > 10) {
                alert("Only 10 textboxes allow");
                return false;
            }
            $(".form-repaet:last").find('.xxx').select2('destroy');
            var clone = $(".form-repaet:last").clone();
            $('.form-wrapper').append(clone);
            $('.xxx').select2();
            clone.find('.kuantitas').val('');

            $(".xxx").on('change',function(e){
                if($(this).val() != ''){
                    var id = e.target.value;
                    var url = '{{ route("kasir.obat.show", ":id") }}'
                    url = url.replace(':id', id)
                    $.get(url, function(data){
                        var harga =  data.harga;
                        var kuantitas =  document.getElementById('kuantitas').value;
                        var sub_total = harga * kuantitas;

                        document.getElementById('harga').value = harga
                        document.getElementById('sub_total').value = sub_total


                    })
                }
            });
            counter++;
        });

        $("#removebtn").click(function () {
            if (counter == 1) {
                alert("tidak bisa di hapus");
                return false;
            }
            $(".form-repaet").last().remove();
            counter--;
        });

    </script>

    <script>
        const obat = document.querySelector('#obat');
        obat.addEventListener('change', function () {

        })

        const lanjutkan = document.querySelector("#lanjutkan");
        lanjutkan.addEventListener('click', function () {
            console.log(obat.options[obat.selectedIndex].text)
        })
        $("#obat").change(function(){
            //alert(this.value)
            document.getElementById('detail_obat').value = this.value
        });

        $("#kuantitas").change(function(){
            //alert(this.value)
            document.getElementById('detail_kuantitas').value = this.value
        });
    </script>


    <script>

    </script>

@endsection
