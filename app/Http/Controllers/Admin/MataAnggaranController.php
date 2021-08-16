<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mataanggaran;
use Illuminate\Http\Request;

class MataAnggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Mataanggaran::all();
        return view('admin.mataanggaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.mataanggaran.create');
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
            'nomor' => 'required',
            'keterangan' => 'required',
        ]);

        $data_mataanggaran = new Mataanggaran([
            'nomor' => $request->get('nomor'),
            'keterangan' => $request->get('keterangan'),
        ]);

        $data_mataanggaran->save();
        return redirect('admin\mataanggaran');
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
        $data = Mataanggaran::find($id);

        return view('admin.mataanggaran.edit', compact('data'));
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
        $request->validate([
            'nomor' => 'required',
            'keterangan' => 'required',
        ]);

        $mataanggaran = Mataanggaran::find($id);
        $mataanggaran->nomor = $request->get('nomor');
        $mataanggaran->keterangan = $request->get('keterangan');


        $mataanggaran->save();
        return redirect('admin\mataanggaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mataanggaran = Mataanggaran::find($id);

        $mataanggaran->delete();

        return redirect('admin\mataanggaran')->with('sukses', 'FIlm berhasil dihapus');
    }
}
