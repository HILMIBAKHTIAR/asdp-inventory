<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Karyawan;
use App\VerspmM;
use Illuminate\Http\Request;

class VerspmmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verspmm = VerspmM::where('user_id', auth()->user()->id)->get();
        return view('admin.surat.verspmm.index', compact('verspmm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $karyawan = Karyawan::all();
        return view('admin.surat.verspmm.create',compact('karyawan'));
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
            'karyawan_id'           => 'required',
            'verifikator'           => 'required',
            'uraian_pekerjaan'      => 'required',
            'tahun_anggaran'        => 'required',
            'tanggal_surat'         => 'required',
            'ttd1'                  => 'required',
            'ttd2'                  => 'required',
            'tanggal_sppbj'         => 'required',
            'tanggal_berita_acara'  => 'required',
            'jumlah_harga_skb'      => 'required',
            'jumlah_harga_berita'   => 'required',
            'jumlah_harga_sppbj'    => 'required',
            'no_sppbj'              => 'required',
            'no_berita'             => 'required',

        ], [
            'karyawan_id.required'       => 'nama Verifikator harus diisi',
            'uraian_pekerjaan.required'  => 'uraian pekerjaan harus diisi',
            'verifikator.required'       => 'verifikator harus diisi',
            'tahun_anggaran.required'    => 'tahun anggaran harus diisi',
            'tanggal_surat.required'     => 'tanggal surat harus diisi',
            'ttd1.required'              => 'manager sdm & umum harus diisi',
            'ttd2.required'              => 'pembuat verifikator harus diisi',

            'tanggal_sppbj.required'         => 'harus diisi',
            'tanggal_berita_acara.required'  => 'harus diisi',
            'jumlah_harga_skb.required'      => 'harus diisi',
            'jumlah_harga_berita.required'   => 'harus diisi',
            'jumlah_harga_sppbj.required'    => 'harus diisi',
            'no_sppbj.required'              => 'harus diisi',
            'no_berita.required'             => 'harus diisi',
        ]);

        $data_verspmm = VerspmM::create([
            'user_id'               => auth()->user()->id,
            'karyawan_id'           => $request->karyawan_id,
            'verifikator'           => $request->verifikator,
            'uraian_pekerjaan'      => $request->uraian_pekerjaan,
            'tahun_anggaran'        => $request->tahun_anggaran,
            'tanggal_surat'         => $request->tanggal_surat,
            'ttd1'                  => $request->ttd1,
            'ttd2'                  => $request->ttd2,
            'tanggal_skb'           => $request->tanggal_skb,
            'tanggal_sppbj'         => $request->tanggal_sppbj,
            'tanggal_berita_acara'  => $request->tanggal_berita_acara,
            'jumlah_harga_skb'      => $request->jumlah_harga_skb,
            'jumlah_harga_berita'   => $request->jumlah_harga_berita,
            'jumlah_harga_sppbj'    => $request->jumlah_harga_sppbj,
            'no_sppbj'              => $request->no_sppbj,
            'no_berita'             => $request->no_berita,

        ]);

        $data_verspmm   ->save();
        return redirect('admin/verspmm');
        // return dd($data_verspmm);

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
