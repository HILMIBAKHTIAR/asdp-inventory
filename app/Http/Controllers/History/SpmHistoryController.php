<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use App\Spm;
use App\Sppbj;
use Illuminate\Http\Request;

class SpmHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_spm = Spm::all();
        return view('admin.history.spmhistori.index', compact('data_spm'));
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
        $spm = Spm::findOrFail($id);
        $sp2bj = Sppbj::findOrFail($spm->sppbj_id);
        $subtotal = $sp2bj
            ->barang
            ->map(function ($el) {
                return $el->harga_satuan * $el->jumlah;
            })->sum();
        return view('admin.history.spmhistori.showspm', compact('sp2bj', 'spm', 'subtotal'));
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
    }
}
