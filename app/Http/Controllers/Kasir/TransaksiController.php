<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Obat;
use App\Pelanggan;
use App\Transaksi;
use App\TransaksiObat;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:kasir');
    }

    public function index()
    {
        $search_bulan = 0;
        $transaksis = Transaksi::where('id_kasir', Auth::user()->id)->orderBy('id','DESC')->get();
        return view('pages.kasir.transaksi.index', compact(['transaksis', 'search_bulan']));
    }

    public function cetak_pdf()
    {
        $transaksis = Transaksi::all();
        $pdf = PDF::loadview('pages.admin.transaksi.transaksi_pdf', compact('transaksis'));
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obats = Obat::where('sisa_stok', '>', 0)->get();
        return view('pages.kasir.transaksi.create', compact('obats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pembeli' => 'required'
        ], [
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => ':attribute Sudah ada'
        ]);


        $no_transaksi = Transaksi::latest()->first();
        $transaksi = new Transaksi();
        if($no_transaksi){
            $latestTransactionNum = substr($no_transaksi->no_transaksi, 11);
            $incrementNum = ((int)$latestTransactionNum)+1;
            $transformedToNoTransaction = substr($no_transaksi->no_transaksi, 0, 11);
            $transaksi->no_transaksi = $transformedToNoTransaction.$incrementNum;
        }else{
            $transaksi->no_transaksi = date('d-m-Y').'-1';
        }
//        $no_transaksi ? $transaksi->no_transaksi =
//            date('d-m-Y').$substr+1
//            : $transaksi->no_transaksi = date('d-m-Y').'-001';
        $transaksi->nama_pembeli = $request->nama_pembeli;
        $transaksi->umur = $request->umur;
        $transaksi->total_harga_keseluruhan = 0;
        $transaksi->save();

        $id_obats = $request->id_obat;
        $kuantitas = $request->kuantitas;

        $results = [];
        foreach ($id_obats as $key => $val) {
            array_push($results, ['id_obat' => $val, 'kuantitas' => $kuantitas[$key]]);
        }


        foreach ($results as $result) {
            $obat = Obat::where('id', $result['id_obat'])->first();
            $item = [
                'id_obat' => $result['id_obat'],
                'id_transaksi' => $transaksi->id,
                'kuantitas' => $result['kuantitas'],
                'total_harga_perproduk' => $obat->harga * $result['kuantitas']
            ];
            TransaksiObat::create($item);
            $menguraing_sisa_obat = Obat::where('id', $item['id_obat'])->first();
            $menguraing_sisa_obat->sisa_stok -= $item['kuantitas'];
            $menguraing_sisa_obat->update();
        }

        $sum_total_harga_perproduk = TransaksiObat::where('id_transaksi', $transaksi->id)->get()->sum('total_harga_perproduk');

        $updateTransaksi = Transaksi::findOrFail($transaksi->id);
        $updateTransaksi->total_harga_keseluruhan = $sum_total_harga_perproduk;
        $updateTransaksi->update();

        return redirect()->route('kasir.transaksi.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksis = Transaksi::find($id);
        $obats = Obat::all();
        return view('pages.admin.transaksi.edit', compact(['transaksis', 'obats']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksis = Transaksi::find($id);
        $transaksis->delete();
        return redirect()->route('kasir.transaksi.index');
    }


    public function search(Request $request)
    {
        $bulan_satu = $request->search_bulan_1 + 1;
        $ts = TransaksiObat::whereMonth('created_at', '>=', $bulan_satu)
            ->whereMonth('created_at', '<=', $bulan_satu + 3)->get();

        $results = $ts->groupBy('id_obat')->map(function ($row){
            return $row->sum('kuantitas');
        });

        $obats = Obat::all();

        $search_bulan = $request->search_bulan_1;
        return view('pages.kasir.transaksi.search', compact(['obats', 'results', 'search_bulan']));
    }

    public function detail(Request $request)
    {
        $no_transaksi = Transaksi::latest()->first();
        $transaksi = new Transaksi();
        if($no_transaksi){
            $latestTransactionNum = substr($no_transaksi->no_transaksi, 11);
            $incrementNum = ((int)$latestTransactionNum)+1;
            $transformedToNoTransaction = substr($no_transaksi->no_transaksi, 0, 11);
            $transaksi->no_transaksi = $transformedToNoTransaction.$incrementNum;
        }else{
            $transaksi->no_transaksi = date('d-m-Y').'-1';
        }
    }

    
}
