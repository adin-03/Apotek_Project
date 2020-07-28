<?php

namespace App\Http\Controllers\Apotek;

use App\Kasir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:apotek');
    }

    public function index()
    {
        $kasirs = Kasir::all();
        return view('pages.apotek.karyawan.index', compact('kasirs'));
    }

    public function create()
    {
        return view('pages.apotek.karyawan.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:kasirs|regex:/^[\pL\s\-]+$/u||min:5',
            'alamat' => 'required|min:10',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], [
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => ':attribute Sudah ada',
            'min'       => ':attribute minimal :min karakter',
            'email'     => ':attribute harus sesuai format email',
            'nama.regex'     => ':attribute harus huruf semua'
        ]);

        $karyawan = new Kasir();
        $karyawan->id_apotek = Auth::guard('apotek')->user()->id;
        $karyawan->nama = $request->nama;
        $karyawan->alamat = $request->alamat;
        $karyawan->email = $request->email;
        $karyawan->password = Hash::make($request->password);
        $karyawan->save();
        return redirect()->route('apotek.karyawan.index')->with('success', "Berhasil Menambahkan Data Karyawan $karyawan->nama!");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kasirs = Kasir::find($id);
        return view('pages.apotek.karyawan.edit', compact('kasirs'));
    }

    public function update(Request $request, $id)
    {

        $kasirs = Kasir::find($id);

        $this->validate($request, [
            'nama' => 'required|regex:/^[\pL\s\-]+$/u||min:5',
            'alamat' => 'required|min:10',
            'email' => 'required|unique:kasirs,email,'. $kasirs->id . ',id'

        ], [
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => ':attribute Sudah ada',
            'email'     => ':attribute harus sesuai format email',
            'name.regex'     => ':attribute harus huruf semua'
        ]);


        $kasirs->nama = $request->nama;
        $kasirs->email = $request->email;
        if ($request->password != null) {
            $kasirs->password = Hash::make($request->password);
        }
        $kasirs->save();
        return redirect()->route('apotek.karyawan.index')->with('success', "Berhasil Mengupdate Data kasir $kasirs->nama!");
    }

    public function destroy($id)
    {
        $kasirs = Kasir::find($id);
        $kasirs->delete();
        return redirect()->route('apotek.karyawan.index')->with('success', "Berhasil Menghapus Data Karyawan $kasirs->nama!");
    }
}
