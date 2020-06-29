<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Obat;
use App\TransaksiObat;
use App\Transaksi;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:kasir')->except(['store']);
    }

    public function dashboard()
    {
        $obats = Obat::orderBy('nama_produk', 'ASC')->get(['nama_produk','satuan','id']);
        return view('pages.kasir.dashboard', compact('obats'));
    }

    public function search($id){
      $obat = Obat::with('merk')->where('id', $id)->first();
      return $obat;
    }

    public function store(Request $request){
      $no_transaksi = Transaksi::all();
      if(count($no_transaksi) > 0){
        $no = substr($no_transaksi->last()->no_transaksi, strpos($no_transaksi->last()->no_transaksi, "-") + 1);
        $no_transaksi = now()->format('dmY').'-'.($no+1);
      }else {
        $no_transaksi = now()->format('dmY').'-1';
      }

      $transaksi = Transaksi::create([
        'no_transaksi' => $no_transaksi,
        'nama_pembeli' => $request->nama_pembeli,
        'umur' => $request->umur,
        'id_kasir' => $request->id_kasir,
        'total_bayar' => $request->total_bayar
      ]);

      foreach ($request->obats as $obat) {
        TransaksiObat::create([
          'id_obat' => $obat['id'],
          'id_transaksi' => $transaksi->id,
          'nama_produk' => $obat['nama_produk'],
          'harga' => $obat['harga'],
          'kuantitas' => $obat['qty'],
          'total' => $obat['harga'] * $obat['qty']
        ]);

        $stokObat = Obat::find($obat['id']);
        $stokObat->update(['sisa_stok' => $stokObat->sisa_stok - $obat['qty']]);
      }

      // dd($request->all());
      // return $request->all();
      return response()->json([
        'status' => true,
      ]);
    }
}
