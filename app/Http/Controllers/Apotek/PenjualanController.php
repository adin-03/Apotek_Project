<?php

namespace App\Http\Controllers\Apotek;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Obat;
use App\TransaksiObat;
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

        $ts = TransaksiObat::whereHas('transaksi', function($query) use($search_bulan, $search_tahun){
            $query->whereMonth('created_at', '>=', $search_bulan)
            ->whereMonth('created_at', '<=', $search_bulan + 2)
            ->whereYear('created_at', $search_tahun);
        })->get();

        $results = $ts->groupBy('id_obat')->map(function ($row){
            return $row->sum('kuantitas');
        });


        $total_harga_perproduk = $ts->groupBy('id_obat')->map(function ($row){
            return $row->sum('total');
        });
        $obats = Obat::all();

        return view('pages.apotek.penjualan.index',
        compact(['obats', 'results', 'search_bulan', 'search_tahun', 'total_harga_perproduk']));
    }

    public function search(Request $request)
    {
        $bulan_satu = $request->search_bulan_1 + 1;
        $ts = TransaksiObat::whereHas('transaksi', function($query) use($bulan_satu, $request){
            $query->whereMonth('created_at', '>=', $bulan_satu)
            ->whereMonth('created_at', '<=', $bulan_satu + 2)
            ->whereYear('created_at', $request->search_tahun);
        })->get();

        $results = $ts->groupBy('id_obat')->map(function ($row){
            return $row->sum('kuantitas');
        });


        $total_harga_perproduk = $ts->groupBy('id_obat')->map(function ($row){
            return $row->sum('total');
        });
        $obats = Obat::all();

        $search_bulan = $request->search_bulan_1;
        $search_tahun = $request->search_tahun;
        return view('pages.apotek.penjualan.search', compact(['obats', 'results', 'search_bulan', 'search_tahun', 'total_harga_perproduk']));
    }

}
