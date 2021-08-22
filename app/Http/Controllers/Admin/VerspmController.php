<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Spm;
use App\Verspm;
use App\Sppbj;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        return view('admin.verspm.cetak', compact('verspm', 'sp2bj'));
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
        return view('admin.verspm.input', compact('karyawan', 'spm'));
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
            'karyawan_id'       => 'required',
            'nama'              => 'required',
            'jenis_pekerjaan'   => 'required',
            'uraian_pekerjaan'  => 'required',
            'tahun_anggaran'    => 'required',
            'tanggal_surat'    => 'required',
            'ttd1'              => 'required',
            'ttd2'              => 'required',
        ], [
            'karyawan_id.required'       => 'nama Verifikator harus diisi',
            'nama.required'              => 'nama harus diisi',
            'jenis_pekerjaan.required'   => 'jenis pekerjaan harus diisi',
            'uraian_pekerjaan.required'  => 'uraian pekerjaan harus diisi',
            'tahun_anggaran.required'    => 'tahun anggaran harus diisi',
            'tanggal_surat.required'     => 'tanggal surat harus diisi',
            'ttd1.required'              => 'manager sdm & umum harus diisi',
            'ttd2.required'              => 'pembuat verifikator harus diisi',
        ]);

        $data_verspm = Verspm::create([
            'user_id'           => auth()->user()->id,
            'nama'              => $request->nama,
            'karyawan_id'       => $request->karyawan_id,
            'jenis_pekerjaan'   => $request->jenis_pekerjaan,
            'uraian_pekerjaan'  => $request->uraian_pekerjaan,
            'tahun_anggaran'    => $request->tahun_anggaran,
            'tanggal_surat'     => $request->tanggal_surat,
            'ttd1'              => $request->ttd1,
            'ttd2'              => $request->ttd2,
        ]);

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
