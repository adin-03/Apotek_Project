<?php

namespace App\Http\Controllers\Apotek;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pelanggan;

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
        $pelanggans = Pelanggan::all();
        return view('pages.apotek.pelanggan.index', compact('pelanggans'));
    }

    public function histori($id)
    {
        $pelanggan = Pelanggan::where('id', $id)->first();

        return view('pages.apotek.pelanggan.histori', compact('pelanggan'));
    }

    public function destroy($id)
    {
        //
    }
}
