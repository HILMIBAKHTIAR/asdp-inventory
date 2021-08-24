<?php

namespace App\Http\Controllers\Admin;

use App\Barang;
use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Skb;
use App\Sppbj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sp2bj = Sppbj::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $skb = Skb::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        return view('admin.skb.cetak', compact('skb', 'sp2bj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('admin.skb.input', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sp2bj = Sppbj::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $request->validate([
            'alamat_tujuan'     => 'required',
            'no_telp'           => 'required|max:12',
            'tanggal_surat'     => 'required',
            'ttd1'              => 'required',
            'ttd2'              => 'required',

        ], [
            'alamat_tujuan.required'        => 'alamat tujuan harus diisi',
            'no_telp.required'              => 'nomor telpon harus diisi',
            'tanggal_surat.required'        => 'tanggal surat harus diisi',
            'ttd1.required'                 => 'general manager harus diisi',
            'ttd2.required'                 => 'manager sdm & umum harus diisi',
        ]);



        $data_skb = Skb::create([
            'user_id' => auth()->user()->id,
            'sp2bj_id' => $sp2bj->id,
            'alamat_tujuan' => $request->alamat_tujuan,
            'no_telp' => $request->no_telp,
            'tanggal_surat' => $request->tanggal_surat,
            'ttd1' => $request->ttd1,
            'ttd2' => $request->ttd2
        ]);

        // return dd($data_skb);
        $data_skb->save();
        return redirect('admin/skb/');
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
        //
    }
}
