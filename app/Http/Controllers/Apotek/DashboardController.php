<?php

namespace App\Http\Controllers\Apotek;

use App\Http\Controllers\Controller;
use App\Obat;
use App\TransaksiObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('pages.apotek.dashboard', compact('obat', 'transaksi'));
    }
}
