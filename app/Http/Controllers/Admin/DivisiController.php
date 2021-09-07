<?php

namespace App\Http\Controllers\Admin;

use App\Divisi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisi = Divisi::all();
        return view('admin.divisi.index', compact('divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required'
        ]);

        $data_divisi = Divisi::create([
            'nama_divisi'   => $request->nama_divisi
        ]);

        $data_divisi->save();

        return redirect('admin/divisi') - with('sukses', 'Divisi berhasil ditambahkan');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_divisi = Divisi::find($id);
        $data_divisi->delete();

        return redirect('admin\divisi')->with('sukses', 'Divisi berhasil dihapus');
    }

    public function tambahDivisi(Request $request)
    {
        Divisi::create($request->only([
            'nama_divisi'
        ]));

        return response()->json(['status' => 'sukses']);
    }
}
