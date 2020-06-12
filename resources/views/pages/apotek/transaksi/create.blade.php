@extends('templates.apotek')
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
                                <form action="{{route('apotek.transaksi.store')}}" method="post">
                                    @csrf

                                    <button id="add-form" type="button" class="btn btn-success">Add</button>

                                    <button id="removebtn" type="button" class="btn btn-danger">Remove</button>

                                    <div class="form-wrapper">
                                        <div class="form-repaet">
                                            <div class="form-group row">
                                                <select id="selecttag" name="id_obat[]"
                                                        class="form-control xxx select2 input-lg col-md-6">
                                                    @foreach($obats as $obat)
                                                        <option value="{{$obat->id}}">{{$obat->nama_produk}}
                                                            / {{$obat->satuan}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="number" class="form-control kuantitas col-md-6" placeholder="Kuantitas"
                                                       name="kuantitas[]">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="line line-dashed line-lg pull-in"></div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label>Nama Pembeli</label>
                                        <input type="text"
                                               class="form-control {{$errors->has('nama_pembeli')?'is-invalid':''}}"
                                               name="nama_pembeli">
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
                                               name="umur">
                                        @if ($errors->has('umur'))
                                            <span class="invalid-feedback" role="alert">
                                                        <p><b>{{ $errors->first('umur') }}</b></p>
                                                    </span>
                                        @endif
                                    </div>

                                    <div class="form-actions">
                                        <a href="{{route('apotek.transaksi.index')}}" class="btn btn-warning">Cancel</a>
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

@section('script')

    <script>
        $('.xxx').select2();

        var counter = 1;

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

    {{--<script>
        $(function () {
            $('select').select2();
            $(document).on('click', '.btn-add', function (e) {
                const obat = {!! $obats !!}
                e.preventDefault();
                var controlForm = $('#myRepeatingFields:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);
                currentEntry.find('select').select2('destroy');
                newEntry.find('input').val('');
                //newEntry.find('span.select').select2();

                //newEntry.find('select').select2();
                /*for (key in obat) {
                    $('#obat').append('<option value="' + obat[key].id + '">' + obat[key].nama_produk + '</option>');
                }*/
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="ft ft-minus"></span>');
            }).on('click', '.btn-remove', function (e) {
                e.preventDefault();
                $(this).parents('.entry:first').remove();
                return false;
            });
        });
    </script>--}}

@endsection
