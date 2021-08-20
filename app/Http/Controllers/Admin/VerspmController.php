<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Verspm;
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
        $verspm = Verspm::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $today = Carbon::now()->isoFormat('D MMMM Y');
        return view('admin.verspm.cetak', compact('verspm', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('admin.verspm.input', compact('karyawan'));
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
        ]);

        $data_verspm = Verspm::create([
            'user_id'           => auth()->user()->id,
            'nama'              => $request ->nama,
            'karyawan_id'       => $request ->karyawan_id,
            'jenis_anggaran'    => $request ->jenis_anggaran,
            'uraian_pekerjaan'  => $request ->uraian_pekerjaan,
            'tahun_anggaran'    => $request ->tahun_anggaran,
            'ttd1'              => $request ->ttd1,
            'ttd2'              => $request ->ttd2,
        ]);

        $data_verspm->save();
        return redirect('admin/verspm');

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
