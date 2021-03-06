<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sppbj;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SppbjExport;

class SppbjHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data_sppbj = Sppbj::all();
        return view('admin.history.sppbjhistori.index', compact('data_sppbj'));
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
        $sp2bj = Sppbj::findOrFail($id);
        $subtotal = $sp2bj
            ->barang
            ->map(function ($el) {
                return $el->harga_satuan * $el->jumlah;
            })->sum();
        return view('admin.history.sppbjhistori.showsppbj', compact('sp2bj', 'subtotal'));
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
        //
        $data_sppbj = Sppbj::find($id);
        $data_sppbj->delete();

        return redirect('admin\sppbjhistori')->with('sukses', 'data sppbj berhasil dihapus');
    }

    public function fileExport()
    {
        return Excel::download(new SppbjExport, 'data-sppbj.xlsx');
    }
}
