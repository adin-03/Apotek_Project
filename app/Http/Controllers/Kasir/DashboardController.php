<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Obat;
use App\Pelanggan;
use App\TransaksiObat;
use App\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade as PDF;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:kasir')->except(['store']);
    }

    public function dashboard()
    {
        $obats = Obat::orderBy('nama_produk', 'ASC')->get(['nama_produk', 'satuan', 'id']);
        $pelanggans = Pelanggan::orderBy('nama_pelanggan', 'ASC')->get();
        return view('pages.kasir.dashboard', compact('obats', 'pelanggans'));
    }

    public function search($id)
    {
        $obat = Obat::with('merk')->where('id', $id)->first();
        return $obat;
    }

    public function store(Request $request)
    {

        $no_transaksi = Transaksi::whereDate('created_at', now())->get();
        if (count($no_transaksi) > 0) {
            $no = substr($no_transaksi->last()->no_transaksi, strpos($no_transaksi->last()->no_transaksi, "-") + 1);
            $no += 1;
            $no_transaksi = Carbon::now()->format('dmY') . '-' . $no;
        } else {
            $no_transaksi = Carbon::now()->format('dmY') . '-1';
        }

        $transaksi = Transaksi::create([
            'no_transaksi' => $no_transaksi,
            'id_pelanggan' => $request->nama_pembeli,
            //'nama_pembeli' => $request->nama_pembeli,
            //'umur' => $request->umur,
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

        // $this->print($request->obats, $request->total_harga, $request->total_bayar, $request->kembali);

        return response()->json([
            'status' => true,
            'no_transaksi' => $no_transaksi
        ]);
    }

    public function printPembayaran($no_transaksi)
    {
        $transaksi = Transaksi::where('no_transaksi', $no_transaksi)->first();
        if ($transaksi) {
            $pdf = PDF::loadview('pages.kasir.print-pembayaran',compact('transaksi'));
            return $pdf->stream();
            // return view('pages.kasir.print-pembayaran', compact('transaksi'));
        } else {
            return back();
        }
    }

    private function print($obats, $totalHarga, $totalBayar, $kembali)
    {
        //return view('pages.apotek.penjualan.kasir_pdf',compact(['obats', 'totalHarga', 'totalBayar', 'kembali']));
        $pdf = PDF::loadview('pages.apotek.penjualan.kasir_pdf', compact(['obats', 'totalHarga', 'totalBayar', 'kembali']));
        return $pdf->stream();
    }

    public function tambahPelanggan(Request $request)
    {
        $pelanggan = new Pelanggan();
        $pelanggan->no_pelanggan = rand();
        $pelanggan->nama_pelanggan = ucwords($request->tambah_nama_pelanggan);
        $pelanggan->tanggal_lahir = $request->tambah_ttl_pelanggan;
        $pelanggan->umur = Carbon::parse($request->tambah_ttl_pelanggan)->age;
        $pelanggan->save();

        return redirect()->route('apotek.dashboard');
    }

    public function ambilPelanggan($id)
    {
        $pelanggan = Pelanggan::where('id', $id)->first();

        return $pelanggan;
    }
}
