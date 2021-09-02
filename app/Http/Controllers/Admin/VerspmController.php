<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Spm;
use App\Verspm;
use App\Sppbj;
use App\Berita;
use App\Skb;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class VerspmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sp2bj = Sppbj::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $verspm = Verspm::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $spm = Spm::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $skb = Skb::where([
            ['user_id', auth()->user()->id],
            ['sp2bj_id', $sp2bj->id],
        ])->first();
        $subtotal = $sp2bj->barang->map(
            function ($el) {
                return $el->harga_satuan * $el->jumlah;
            }
        )->sum();
        // $skb = Skb::where('user_id', auth()->user()->id)->find()->get();
        $berita = Berita::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        return view('admin.verSpm.cetak', compact('verspm', 'sp2bj', 'spm', 'skb', 'berita', 'subtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        $spm = Spm::all();
        return view('admin.verSpm.input', compact('karyawan', 'spm'));
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
        $skb = Skb::where('user_id', auth()->user()->id)->first();
        $berita = Berita::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $spm = Spm::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();

        $request->validate([
            'karyawan_id'       => 'required',
            'verifikator'       => 'required',
            'skb_id'            => 'nullable',
            'uraian_pekerjaan'  => 'required',
            'tahun_anggaran'    => 'required',
            'tanggal_surat'     => 'required',
            'ttd1'              => 'required',
            'ttd2'              => 'required',
        ], [
            'karyawan_id.required'       => 'nama Verifikator harus diisi',
            'uraian_pekerjaan.required'  => 'uraian pekerjaan harus diisi',
            'verifikator.required'       => 'verifikator harus diisi',
            'tahun_anggaran.required'    => 'tahun anggaran harus diisi',
            'tanggal_surat.required'     => 'tanggal surat harus diisi',
            'ttd1.required'              => 'manager sdm & umum harus diisi',
            'ttd2.required'              => 'pembuat verifikator harus diisi',
        ]);

        if ($skb === null) {
            $data_verspm = Verspm::create([
                'user_id'           => auth()->user()->id,
                'sp2bj_id'          => $sp2bj->id,
                'berita_id'         => $berita->id,
                'spm_id'            => $spm->id,
                'karyawan_id'       => $request->karyawan_id,
                'verifikator'       => $request->verifikator,
                'uraian_pekerjaan'  => $request->uraian_pekerjaan,
                'tahun_anggaran'    => $request->tahun_anggaran,
                'tanggal_surat'     => $request->tanggal_surat,
                'ttd1'              => $request->ttd1,
                'ttd2'              => $request->ttd2,
            ]);
        } else {

            $data_verspm = Verspm::create([
                'user_id'           => auth()->user()->id,
                'sp2bj_id'          => $sp2bj->id,
                'skb_id'            => $skb->id,
                'berita_id'         => $berita->id,
                'spm_id'            => $spm->id,
                'karyawan_id'       => $request->karyawan_id,
                'verifikator'       => $request->verifikator,
                'uraian_pekerjaan'  => $request->uraian_pekerjaan,
                'tahun_anggaran'    => $request->tahun_anggaran,
                'tanggal_surat'     => $request->tanggal_surat,
                'ttd1'              => $request->ttd1,
                'ttd2'              => $request->ttd2,
            ]);
        }

        $data_verspm->save();
        return redirect('admin/verspm');
        // return dd($data_verspm);

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
        //
    }
}
