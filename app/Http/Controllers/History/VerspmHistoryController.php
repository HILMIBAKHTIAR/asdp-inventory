<?php

namespace App\Http\Controllers\History;

use App\Berita;
use App\Http\Controllers\Controller;
use App\Skb;
use App\Spm;
use App\Sppbj;
use App\Verspm;
use Illuminate\Http\Request;

class VerspmHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_verspm = Verspm::all();
        return view('admin.history.verspmhistori.index', compact('data_verspm'));
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
        $verspm = Verspm::findOrFail($id);
        $skb = Skb::find($verspm->skb_id);
        $spm = Spm::findOrFail($verspm->spm_id);
        $sp2bj = Sppbj::findOrFail($verspm->sp2bj_id);
        $berita = Berita::findOrFail($verspm->berita_id);
        $subtotal = $sp2bj->barang->map(
            function ($el) {
                return $el->harga_satuan * $el->jumlah;
            }
        )->sum();

        return view('admin.history.verspmhistori.showverspm', compact('verspm', 'spm', 'sp2bj', 'berita', 'subtotal', 'skb'));
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
