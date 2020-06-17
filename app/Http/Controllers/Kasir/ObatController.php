<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Merk;
use App\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ObatController extends Controller
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
        $obats = Obat::all();
        return view('pages.kasir.obat.index', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Merk::all();
        return view('pages.admin.obat.create', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_produk' => 'required|unique:obats',
            'satuan' => 'string|required',
            'harga' => 'numeric|required',
            'stok' => 'numeric|required'

        ],[
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => ':attribute Sudah ada'
        ]);

        $data = new Obat();
        $data->id_merk = $request->id_merk;
        $data->kode_obat = Str::random(5);
        $data->nama_produk = $request->nama_produk;
        $data->satuan = $request->satuan;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $data->sisa_stok = $request->stok;
        $data->save();
        return redirect()->route('obat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obat = Obat::findOrFail($id);

        return $obat;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obats = Obat::find($id);
        $merks = Merk::all();
        return view('pages.admin.obat.edit', compact(['obats', 'merks']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_produk' => 'required',
            'satuan' => 'string|required',
            'harga' => 'numeric|required',
            'stok' => 'numeric|required'

        ],[
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => ':attribute Sudah ada'
        ]);


        $obats = Obat::find($id);
        $obats->nama_produk = $request->nama_produk;
        $obats->satuan = $request->satuan;
        $obats->harga = $request->harga;
        $obats->stok = $request->stok;
        $obats->save();
        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obats = Obat::find($id);
        $obats->delete();
        return redirect()->route('obat.index');
    }
}
