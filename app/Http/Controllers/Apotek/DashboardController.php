<?php

namespace App\Http\Controllers\Apotek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Obat;
use App\Merk;
use App\Kasir;
use App\TransaksiObat;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $obat = Obat::all()->count();
        $transaksi = TransaksiObat::all()->count();
        $kasir = Kasir::all()->count();
        $merk = Merk::all()->count();
        return view('pages.apotek.dashboard', compact('obat', 'transaksi','kasir','merk'));
    }
}
