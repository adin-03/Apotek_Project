@extends('templates.kasir')
@section('content')
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
        <div class="content-header-left col-md-4 col-12">
            <h2 class="content-header-title">
              <strong>Nama Kasir : {{Auth::user()->nama}}</strong>
            </h2>
        </div>
        <div class="content-header-right col-md-8 col-12">
            <div class="breadcrumbs-top float-md-right">
              <h3 class="text-white">Tanggal : {{\Carbon\Carbon::now()->format('d F Y')}}</h3>
              <h3 class="text-white">Jam : <span onload="startTime()" id="txt"></span> </h3>
            </div>
          </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-6 mb-2">
                      <select class="select2 form-control" id="data-obat">
                        <option value="" selected="selected">--PIlih Obat--</option>
                        @foreach($obats as $obat)
                        <option value="{{$obat->id}}">{{$obat->nama_produk}} / {{$obat->satuan}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col-6 mb-1">
                      <h2 class="float-right mt-1"> <strong> Total Harga : Rp. <span id="total-harga">0</span> </strong></h2>
                    </div>
                    <div class="col-12">
                      <div style="height:250px;overflow-y:scroll;" class="table-responsive">
                          <table class="table">
                            <thead class="bg-primary white">
                  							<tr>
                  								<th width="5%">No</th>
                  								<!-- <th width="5%">Kode</th> -->
                  								<th width="35%">Nama</th>
                  								<th width="20%">Merk</th>
                  								<th width="10%">Satuan</th>
                  								<th width="10%">Harga</th>
                  								<th width="20%">Qty</th>
                  								<th width="10%">Total</th>
                                  <th width="5%">Stok</th>
                  								<th width="5%"></th>
                  							</tr>
                      				</thead>
                              <tbody id="tabel-transaksi">

                              </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
// $(function(){
  const daftarObat = [];
  const tabelTransaksi = document.querySelector('#tabel-transaksi');
  const totalHarga = document.querySelector('#total-harga');
  // let tr = ``;
  $('.select2').on('select2:select', async function (e) {
    let tr = ``;
    const id = e.params.data.id;
    if(id !== ''){
    const obat = await fetch('http://localhost:8000/kasir/transaksi/obat/'+id)
                        .then(res => res.json())
                        .then(res => res);

      const filterDaftarObat = daftarObat.some(f => f.id == id);
      if(!filterDaftarObat){
        daftarObat.push({...obat,qty: 1});
        daftarObat.map((o, i) => tr += tampilDaftarObat(o,i));
        tabelTransaksi.innerHTML = tr;
      }

      if(daftarObat.length > 0){
          total();
          const qty = document.querySelectorAll('#qty');
          const subTotal = document.querySelectorAll('#sub-total');
          function calculation() {
          let qtyHarga = this.value * this.dataset.harga;
          if(+this.dataset.stok < +this.value){
              alert('Maaf stok tidak mencukupi')
              this.value = this.dataset.stok;
              qtyHarga = this.dataset.stok * this.dataset.harga;
              subTotal[this.dataset.index].innerText = rupiah(qtyHarga);
              daftarObat[this.dataset.index].qty = this.dataset.stok;
              total()
            }else {
               qtyHarga = this.value * this.dataset.harga;
               subTotal[this.dataset.index].innerText = rupiah(qtyHarga);
               daftarObat[this.dataset.index].qty = this.value;
               this.innerText = daftarObat[this.dataset.index].qty
              total();
            }
          }

          qty.forEach(q => q.addEventListener('input', calculation))
      }
    }
  });

  function hapus(i){
    let deleteRow = ``;
    daftarObat.splice(i, 1);
    // console.log(daftarObat);
    daftarObat.map((o, i) => deleteRow += tampilDaftarObat(o,i));
    tabelTransaksi.innerHTML = deleteRow;
    total();
  }

  function total(){
    const total = daftarObat.length > 0 ?
    daftarObat.map(o => +o.harga * +o.qty).reduce((a,b) => a + b) : 0
    totalHarga.innerText = rupiah(total)
  }

  function rupiah(angka){
    var reverse = angka.toString().split('').reverse().join(''),
    ribuan = reverse.match(/\d{1,3}/g);
    ribuan = ribuan.join('.').split('').reverse().join('');
    return ribuan;
  }

  function tampilDaftarObat(o, i){
    return `<tr>
          <td class="align-middle">${i+1}</td>
          <td class="align-middle">${o.nama_produk}</td>
          <td class="align-middle">${o.merk.merk}</td>
          <td class="align-middle">${o.satuan}</td>
          <td class="align-middle">${rupiah(o.harga)}</td>
          <td class="align-middle">
            <input type="number" id="qty" value="${o.qty}" data-harga="${o.harga}" data-index="${i}" data-stok="${o.stok}" class="form-control input-sm" min="1" max="${o.stok}" name="stok">
          </td>
          <td class="align-middle"> <span id="sub-total"> ${rupiah(o.harga * o.qty)} <span> </td>
          <td class="align-middle">${o.stok}</td>
          <td class="align-middle">
          <button class="btn btn-danger btn-sm" type="button" onclick="hapus(${i})" name="button">
            Hapus
          </button>
        </td>
      </tr>`
  }


</script>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
  }

  startTime()
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }
</script>
@endsection
