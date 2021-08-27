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
        $cetak = VerspmM::findOrFail($id);
        return view('admin.surat.verspmm.cetak', compact('cetak'));
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
        $karyawan =Karyawan::all();
        $data_verspmm = VerspmM::find($id);
        return view('admin.surat.verspmm.edit', compact('karyawan','data_verspmm'));
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

        $data_verspmm = VerspmM::find($id);
        
        $data_verspmm->karyawan_id          =     $request->get('karyawan_id');          
        $data_verspmm->verifikator          =     $request->get('verifikator');
        $data_verspmm->uraian_pekerjaan     =     $request->get('uraian_pekerjaan');
        $data_verspmm->tahun_anggaran       =     $request->get('tahun_anggaran');
        $data_verspmm->tanggal_surat        =     $request->get('tanggal_surat');
        $data_verspmm->ttd1                 =     $request->get('ttd1');
        $data_verspmm->ttd2                 =     $request->get('ttd2');
        $data_verspmm->tanggal_skb          =     $request->get('tanggal_skb');
        $data_verspmm->tanggal_sppbj        =     $request->get('tanggal_sppbj');
        $data_verspmm->tanggal_berita_acara =     $request->get('tanggal_berita_acara');
        $data_verspmm->jumlah_harga_skb     =     $request->get('jumlah_harga_skb');
        $data_verspmm->jumlah_harga_berita  =     $request->get('jumlah_harga_berita');
        $data_verspmm->jumlah_harga_sppbj   =     $request->get('jumlah_harga_sppbj');
        $data_verspmm->no_sppbj             =     $request->get('no_sppbj');
        $data_verspmm->no_berita            =     $request->get('no_berita');

        $data_verspmm ->save();
        return redirect('admin/verspmm')->with('Sukses','Data Berhasil Diupdate');
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
        $verspmm = VerspmM::find($id);
        $verspmm ->delete();
        
        return redirect()->route('verspmm.index')->with('sukses', 'surat VerSpm berhasil di hapus');
    }
}
