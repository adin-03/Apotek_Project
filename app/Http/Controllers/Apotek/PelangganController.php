<?php

namespace App\Http\Controllers\Apotek;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Obat;
use App\Pelanggan;
use App\TransaksiObat;
use Svg\Tag\Rect;

class PelangganController extends Controller
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
        $obats = Obat::all();
        $pelanggans = Pelanggan::all();
        $obat = 0;
        return view('pages.apotek.pelanggan.index', compact(['pelanggans', 'obats', 'obat']));
    }

    public function filter(Request $request)
    {
        if($request->id_obat == "0"){
            return redirect()->route('apotek.pelanggan.index');
        }
        $transaksiDetails = TransaksiObat::where('id_obat', $request->id_obat)->get();
        $pelanggans = [];
        foreach($transaksiDetails as $transaksiDetail){
            array_push($pelanggans, $transaksiDetail->transaksi->pelanggan);
        }
        $obats = Obat::all();
        $obat = Obat::where('id', $request->id_obat)->pluck('id')->first();
        return view('pages.apotek.pelanggan.index', compact(['pelanggans', 'obats', 'obat']));

    }

    public function histori($id)
    {
        $pelanggan = Pelanggan::where('id', $id)->first();
        return view('pages.apotek.pelanggan.histori', compact('pelanggan'));
    }

    public function destroy($id)
    {
        $pelanggans = Pelanggan::find($id);
        $pelanggans->delete();
        return redirect()->route('apotek.pelanggan.index')->with('success', "Berhasil Menghapus Data merk $pelanggans->nama_pelanggan!");
    }
}
