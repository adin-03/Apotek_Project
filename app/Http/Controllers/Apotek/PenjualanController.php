<?php

namespace App\Http\Controllers\Apotek;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Obat;
use App\TransaksiObat;
use App\Transaksi;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:apotek');
    }

    public function index()
    {
        $search_bulan = Carbon::now()->month;

        $search_tahun = Carbon::now()->year;

        $ts = TransaksiObat::whereHas('transaksi', function ($query) use ($search_bulan, $search_tahun) {
            $query->whereMonth('created_at', '>=', $search_bulan)
                ->whereMonth('created_at', '<=', $search_bulan + 2)
                ->whereYear('created_at', $search_tahun);
        })->get();

        $results = $ts->groupBy('id_obat')->map(function ($row) {
            return $row->sum('kuantitas');
        });


        $total_harga_perproduk = $ts->groupBy('id_obat')->map(function ($row) {
            return $row->sum('total');
        });
        $obats = Obat::all();

        return view(
            'pages.apotek.penjualan.index',
            compact(['obats', 'results', 'search_bulan', 'search_tahun', 'total_harga_perproduk'])
        );
    }

    public function cetak_pdf(Request $request)
    {
        // dd($request->all());

        $bulan_satu = $request->bulan;

        $transaksis = TransaksiObat::whereHas('transaksi', function ($query) use ($bulan_satu, $request) {
            $query->whereMonth('created_at', '>=', $bulan_satu)
                ->whereMonth('created_at', '<=', $bulan_satu + 2)
                ->whereYear('created_at', $request->tahun);
        })->get();

        $results = $transaksis->groupBy('id_obat')->map(function ($row) {
            return $row->sum('kuantitas');
        });


        $total = $transaksis->groupBy('id_obat')->map(function ($row) {
            return $row->sum('total');
        });

        // dd($total);

        $obats = Obat::all();

        return view('pages.apotek.penjualan.penjualan_pdf', compact('transaksis', 'total', 'obats'));

        // $pdf = PDF::loadview('pages.apotek.penjualan.transaksi_pdf', compact('transaksis', 'total'));
        // return $pdf->stream();
    }

    public function search(Request $request)
    {

        $bulan = $request->search_bulan + 1;
        $ts = TransaksiObat::whereHas('transaksi', function ($query) use ($bulan, $request) {
            $query->whereMonth('created_at', '>=', $bulan)
                ->whereMonth('created_at', '<=', $bulan + 2)
                ->whereYear('created_at', $request->search_tahun);
        })->get();

        $results = $ts->groupBy('id_obat')->map(function ($row) {
            return $row->sum('kuantitas');
        });


        $total_harga_perproduk = $ts->groupBy('id_obat')->map(function ($row) {
            return $row->sum('total');
        });
        $obats = Obat::all();

        $search_bulan = $bulan;
        $search_tahun = $request->search_tahun;
        return view('pages.apotek.penjualan.index', compact(['obats', 'results', 'search_bulan', 'search_tahun', 'total_harga_perproduk']));
    }
}
