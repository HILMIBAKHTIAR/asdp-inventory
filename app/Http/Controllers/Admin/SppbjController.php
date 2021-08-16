<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sppbj;
use App\Barang;
use App\Karyawan;
use App\Mataanggaran;
use App\User;
use Illuminate\Support\Facades\Auth;

class SppbjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sp2bj = Sppbj::orderBy('id', 'DESC')->first();
        $sp2bj = Sppbj::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        // return dd($sp2bj->jabatan);
        return view('admin.sp2bj.cetak', compact('sp2bj'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mataanggaran = Mataanggaran::all();
        $karyawan = Karyawan::all();
        return view('admin.sp2bj.input', compact('karyawan', 'mataanggaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request->all());
        $request->validate([
            'nama_pengadaan' => 'required',
            'tanggal_dibutuhkan' => 'required',
            // 'nomor_surat' => 'required|max:4'
        ]);

        $data_sp2bj = Sppbj::create([
            'user_id' =>  auth()->id(),
            'karyawan_id' => $request->karyawan_id,
            'ttd1' => $request->ttd1,
            'ttd2' => $request->ttd2,
            'ttd3' => $request->ttd3,
            'ttd4' => $request->ttd4,
            'mataanggaran_id' => $request->mataanggaran_id,
            'nama_pengadaan' => $request->nama_pengadaan,
            'tanggal_dibutuhkan' => $request->tanggal_dibutuhkan,
            'nomor_surat' => $request->nomor_surat,
            'catatan_peminta' => $request->catatan_peminta,
            'catatan' => $request->catatan,
            'catatan_anggaran' => $request->catatan_anggaran,
            'catatan_stok' => $request->catatan_stok,
        ]);

        // return dd($data_sp2bj);

        for ($i = 0; $i < count($request->jumlah); $i++) {
            Barang::create([
                'sppbj_id' => $data_sp2bj->id,
                'jumlah' => $request->jumlah[$i],
                'satuan' => $request->satuan[$i],
                'nama_barang' => $request->nama_barang[$i],
                'spesifikasi' => $request->spesifikasi[$i],
                'harga_satuan' => $request->harga_satuan[$i]
            ]);
        }

        $data_sp2bj->save();
        return redirect('admin/sp2bj/');
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
