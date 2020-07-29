<?php

namespace App\Http\Controllers\Apotek;

use App\Http\Controllers\Controller;
use App\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
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
        $merks = Merk::all();
        return view('pages.apotek.merk.index', compact('merks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.apotek.merk.create');
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
           'merk' => 'required|unique:merks|max:30|min:5'
        ],[
            'merk.required' => 'Label Tidak Boleh Kosong',
            'merk.unique' => 'Label Sudah ada',
            'merk.min' => 'Label manimal 5 karakter',
            'merk.max' => 'Label maksimal 30 karakter'
        ]);

        $data = new Merk();
        $data->merk = $request->merk;
        $data->save();
        return redirect()->route('apotek.merk.index')->with('success', "Berhasil Menambahkan Data merk $data->merk!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merks = Merk::find($id);
        return view('pages.apotek.merk.edit', compact('merks'));
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
            'merk' => 'required|unique:merks'
        ],[
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => ':attribute Sudah ada'
        ]);


        $merks = Merk::find($id);
        $merks->merk = $request->merk;
        $merks->save();
        return redirect()->route('apotek.merk.index')->with('success', "Berhasil Mengupdate Data merk $merks->merk!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merks = Merk::find($id);
        $merks->delete();
        return redirect()->route('apotek.merk.index')->with('success', "Berhasil Menghapus Data merk $merks->merk!");
    }
}
