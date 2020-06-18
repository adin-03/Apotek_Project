<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Obat;
use App\TransaksiObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:kasir');
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
}
