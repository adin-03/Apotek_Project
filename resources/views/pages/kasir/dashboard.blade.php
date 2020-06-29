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
            <div class="card">
                <div class="col-md-12">
                  <div class="card-body">
                  <div class="row">
                    <div class="col-12 col-md-6 col-xs-12 mb-2">
                      <select class="select2 form-control" id="data-obat">
                        <option value="0" selected="selected">--PIlih Obat--</option>
                        @foreach($obats as $obat)
                        <option value="{{$obat->id}}">{{$obat->nama_produk}} / {{$obat->satuan}}</option>
                        @endforeach
                    </select>
                    </div>
                    <!-- <div class="col-12 col-md-6 col-xs-12 mb-1">
                    </div> -->
                    <div class="col-12">
                      <div style="height:230px;overflow-y:scroll;" class="table-responsive">
                          <table class="table">
                            <thead class="bg-primary white">
                  							<tr>
                  								<th width="5%">No</th>
                  								<!-- <th width="5%">Kode</th> -->
                  								<th width="20%">Nama</th>
                  								<th width="20%">Merk</th>
                  								<th width="10%">Satuan</th>
                  								<th width="10%">Harga</th>
                  								<th width="40%">Qty</th>
                  								<th width="5%">Total</th>
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
                <div class="card-footer text-dark mb-3 mt-1">
                  <div class="row">
                  <div class="col-md-3 mb-1">
                    <input type="text" class="form-control form-control-sm" id="nama-pembeli" name="nama" placeholder="Nama pembeli">
                  </div>

                  <div class="col-md-2 mb-1">
                    <input type="tel" class="form-control form-control-sm" name="umur" id="umur" placeholder="Umur Pembeli">
                  </div>

                  <div class="col-md-2 mb-1">
                    <input type="tel" class="form-control form-control-sm" onchange="rupiah(this.value)" id="tunai" name="total_bayar" placeholder="Total Bayar">
                  </div>
                  <div class="col-md-5 border-left">
                    <h3>
                      <strong>
                        <span>Total Harga</span> : Rp.
                        <span class="float-right mr-1" id="total-harga">0</span>
                      </strong>
                    </h3>
                  </div>
                  <div class="col-md-7"></div>
                  <div class="col-md-5 border-left">
                    <h3>
                      <strong>
                        <span style="margin-right: 6px; max-width: 6px;">Total Bayar</span> : Rp.
                        <span class="float-right mr-1" id="total-bayar">-</span>
                      </strong>
                    </h3>
                  </div>
                  <div class="col-md-7"></div>
                  <div class="col-md-5 border-left">
                    <h3>
                      <strong>
                        <span style="margin-right: 44px; max-width: 6px;">Kembali</span> : Rp.
                        <span class="float-right mr-1" id="kembali">-</span>
                      </strong>
                    </h3>
                  </div>
                  <div class="col-md-12">
                    <button type="button" data-toggle="modal" id="selesai" data-target="" class="float-right btn btn-primary btn-min-width mt-1 btn-lg">Selesai</button>
                  </div>
                  </div>
                </div>

            </div>
        </div>
    </div>

  <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel1" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success white">
				<h4 class="modal-title white" id="basicModalLabel1">Detail Pembayaran</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
          <h5 id="detail-nama"></h5>
          <h5 id="detail-umur"></h5>
          <table class="table table-borderless">
            <thead>
             <tr>
               <th scope="col">No</th>
               <th scope="col">Nama</th>
               <th scope="col">Qty</th>
               <th scope="col">Harga</th>
               <th scope="col">Total</th>
             </tr>
            </thead>
            <tbody id="detail-pembayaran">


            </tbody>
            </table>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn grey btn-danger" data-dismiss="modal">Batal</button>
				<button type="button" id="simpan" class="btn btn-success">Simpan & Cetak</button>
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
  const totalBayar = document.querySelector('#total-bayar');
  const tunai = document.querySelector('#tunai');
  const kembali = document.querySelector('#kembali');
  const detailPemabayaran = document.querySelector('#detail-pembayaran');
  const selesai = document.querySelector('#selesai');
  const namaPembeli = document.querySelector('#nama-pembeli');
  const umur = document.querySelector('#umur');
  const simpan = document.querySelector('#simpan');
  const detailNama = document.querySelector('#detail-nama');
  const detailUmur = document.querySelector('#detail-umur');
  const modalBody = document.querySelector('.modal-body');
  const modalFooter = document.querySelector('.modal-footer');
  const url = '{{config('app.url')}}';

  simpan.addEventListener('click', async function(){
    const data = {
      nama_pembeli: namaPembeli.value,
      umur : umur.value,
      total_bayar: tunai.value,
      id_kasir: '{{Auth::user()->id}}',
      obats: daftarObat
    }
    try {
      modalBody.innerHTML = `
      <div class="text-center mt-2">
        <div class="spinner-border text-success" style="width: 8rem; height: 8rem;" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <h3 class="mt-2"> Sedang Menyimpan Data </h3>
      </div>`;
      modalFooter.innerHTML = '';

      const storeData = await fetch(url+'api/kasir/dashboard', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        accept: 'application/json',
        body: JSON.stringify(data)
      }).then(res => res.json()).then(res => res);
      if(storeData.status){
        modalBody.innerHTML = `
          <div class="text-center mt-2">
          <svg viewBox="0 0 24 24" width="100" height="100" stroke="#5ed84f" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
              <h3 class="mt-2"> Success </h3>
          </svg>
          <a href="dashboard" type="button" class="btn grey btn-success mt-2">OK</a>
          </div>`
      }
    } catch (e) {
      alert('error '+e)
    }

    // setTimeout(function(){
    //
    //   modalFooter.innerHTML = `
    //
    //   `;
    // }, 2000);
  })

  $('.select2').on('select2:select', async function (e) {
    let tr = ``;
    const id = e.params.data.id;
    if(id > 0){
    const obat = await fetch(url+'kasir/transaksi/obat/'+id)
                        .then(res => res.json())
                        .then(res => res);

    const filterDaftarObat = daftarObat.some(f => f.id == id);
    if(!filterDaftarObat) {
          daftarObat.push({...obat,qty: 1});
          daftarObat.map((o, i) => tr += tampilDaftarObat(o,i));
          tabelTransaksi.innerHTML = tr;
          $(".select2").data('select2').trigger('select', { data: {"id": 0}});
        }else {
          alert(`${e.params.data.text} sudah ada dalam transaksi`)
          $(".select2").data('select2').trigger('select', { data: {"id": 0}});
        }

      if(daftarObat.length > 0) {
          total();
          const qty = document.querySelectorAll('#qty');
          const subTotal = document.querySelectorAll('#sub-total');

          if (tunai.value >= total()) {
            kembali.innerText = rupiah(total() - +tunai.value)
          }else {
            kembali.innerText = '-'
          }

          function calculation() {
          let qtyHarga = this.value * this.dataset.harga;
          if(+this.dataset.stok < +this.value){
              alert('Maaf stok tidak mencukupi')
              this.value = this.dataset.stok;
              qtyHarga = this.dataset.stok * this.dataset.harga;
              subTotal[this.dataset.index].innerText = rupiah(qtyHarga);
              daftarObat[this.dataset.index].qty = this.dataset.stok;
              total();
              if (tunai.value >= total()) {
                kembali.innerText = rupiah(total() - +tunai.value)
              }
              else {
                  kembali.innerText = '-'
              }
            }else {
               qtyHarga = this.value * this.dataset.harga;
               subTotal[this.dataset.index].innerText = rupiah(qtyHarga);
               daftarObat[this.dataset.index].qty = this.value;
               this.innerText = daftarObat[this.dataset.index].qty
                total();
                if (tunai.value >= total()) {
                  kembali.innerText = rupiah(total() - +tunai.value)
                }
                else {
                    kembali.innerText = '-'
                }
            }

          }

          qty.forEach(q => q.addEventListener('input', calculation))
      }
    }
  });

  tunai.addEventListener('input', function(){
    // console.log(total());
    if(this.value === '' || total() < 1){
      totalBayar.innerText = '-'
      kembali.innerText = '-'
    }else if (this.value >= total()) {
      totalBayar.innerText = rupiah(this.value);
      kembali.innerText = rupiah(total() - this.value);
    }else {
      totalBayar.innerText = rupiah(this.value);
      kembali.innerText = '-'
    }
  });

  selesai.addEventListener('click', function(){
    if(daftarObat.length < 1){
      alert('tidak ada transaksi');
    }else if (namaPembeli.value === '' || umur.value === '' || tunai.value === '') {
      alert('Nama pembeli, Umur & Total bayar tidak boleh kosong');
    }else if (tunai.value < total()) {
      alert('Total bayar tidak mencukupi')
    }
    else {
      let trModal = ``;
      detailNama.innerText = `Nama : ${namaPembeli.value}`
      detailUmur.innerText = `Umur : ${umur.value}`
      this.dataset.target = '#default';
      daftarObat.map((p, i) => trModal += tampilDetail(p, i));
      trModal += `<tr>
          <td colspan="3"></td>
          <td>Total Harga</td>
          <td>Rp. ${rupiah(total())}</td>
        </tr>
        <tr>
          <td colspan="3"></td>
          <td>Total Bayar</td>
          <td>Rp. ${rupiah(tunai.value)}</td>
        </tr>
        <tr>
          <td colspan="3"></td>
          <td>Kembali</td>
          <td>Rp. ${rupiah(total() - tunai.value)}</td>
        </tr>`
      detailPemabayaran.innerHTML = trModal
    }
  })

  function hapus(i){
    let deleteRow = ``;
    daftarObat.splice(i, 1);
    // console.log(daftarObat);
    daftarObat.map((o, i) => deleteRow += tampilDaftarObat(o,i));
    tabelTransaksi.innerHTML = deleteRow;
    total();
    if(total() < 1){
      totalBayar.innerText = '-'
      kembali.innerText = '-'
    }else {
      totalBayar.innerText = rupiah(tunai.value);
      kembali.innerText = rupiah(total() - +tunai.value)
    }
  }

  function total(){
    const total = daftarObat.length > 0 ?
    daftarObat.map(o => +o.harga * +o.qty).reduce((a,b) => a + b) : 0
    totalHarga.innerText = rupiah(total)
    return total
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

  function tampilDetail(p, i){
    return `
    <tr>
      <th scope="row">${i+1}</th>
      <td>${p.nama_produk}</td>
      <td>${p.qty}</td>
      <td>Rp. ${rupiah(p.harga)}</td>
      <td>Rp. ${rupiah(p.harga * p.qty)}</td>
    </tr>
    `
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
