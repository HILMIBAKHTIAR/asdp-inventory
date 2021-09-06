<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = Satuan::all();
        return view('admin.satuan.index', compact('satuan'));
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
        //
        $request->validate([
            'nama_satuan' => 'required'
        ]);

        $data_satuan = Satuan::create([
            'nama_satuan'   => $request->nama_satuan
        ]);

        $data_satuan->save();

        return redirect('admin/satuan') - with('sukses', 'Satuan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $data_satuan = Satuan::find($id);
        $data_satuan->delete();

        return redirect('admin\satuan')->with('sukses', 'Satuan berhasil dihapus');
    }

    public function tambahSatuan(Request $request)
    {
        Satuan::create($request->only([
            'nama_satuan'
        ]));

        return response()->json(['status' => 'sukses']);
    }
}
