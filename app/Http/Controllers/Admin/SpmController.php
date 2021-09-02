<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sppbj;
use App\Karyawan;
use App\Mataanggaran;
use App\Spm;
use Illuminate\Support\Carbon;

class SpmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sp2bj = Sppbj::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $spm = Spm::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $subtotal = $sp2bj
            ->barang
            ->map(function ($el) {
                return $el->harga_satuan * $el->jumlah;
            })->sum();
        return view('admin.spm.cetak', compact('sp2bj', 'spm', 'subtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        $mataanggaran = Mataanggaran::all();
        return view('admin.spm.input', compact('karyawan', 'mataanggaran'));
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
            'ttd1'              => 'required',
            'ttd2'              => 'required',
            'ttd3'              => 'required',
            'devisi'            => 'required',
            'tanggal'           => 'required',
            'tahun_anggaran'    => 'required',
            'jenis_transaksi'   => 'required',
        ], [
            'ttd1.required'                 => "general manager harus diisi",
            'ttd2.required'                 => "manager sdm & umum harus diisi",
            'ttd3.required'                 => "staf sdm & umum harus diisi",
            'devisi.required'               => "penanggung jawab peminta harus diisi",
            'tanggal.required'              => "tanggal harus diisi",
            'tahun_anggaran.required'       => "tahun anggaran harus diisi",
            'jenis_transaksi.required'      => "jenis transaksi harus diisi",
        ]);

        $nomorSurat = Spm::whereYear("created_at", Carbon::now()->year)->count();

        $sp2bj = Sppbj::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();

        $data_spm = Spm::create([
            'user_id'           => auth()->id(),
            'ttd1'              => $request->ttd1,
            'ttd2'              => $request->ttd2,
            'ttd3'              => $request->ttd3,
            'devisi'            => $request->devisi,
            'tanggal'           => $request->tanggal,
            'tahun_anggaran'    => $request->tahun_anggaran,
            'jenis_transaksi'   => $request->jenis_transaksi,
            'program'           => $request->program,
            'penerima_dana'     => $request->penerima_dana,
            'nomor_rekening'    => $request->nomor_rekening,
            'bank'              => $request->bank,
            'sppbj_id'          => $sp2bj->id,
            'nomor_surat_spm'   => $nomorSurat + 1,
        ]);



        // for ($i = 0; $i < count($request->uraian_kegiatan); $i++) {
        //     ItemSpm::create([
        //         'spm_id'                => $data_spm->id,
        //         'mataanggaran_item_id'  => $request->mataanggaran_item_id[$i],
        //         'uraian_kegiatan'       => $request->uraian_kegiatan[$i],
        //         'dana'                  => $request->dana[$i],
        //         'keterangan'            => $request->keterangan[$i],
        //     ]);
        // }

        $data_spm->save();
        return redirect('admin\spm');
        // return dd($data_spm);
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
