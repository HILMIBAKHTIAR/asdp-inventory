<?php

namespace App\Http\Controllers\Surat;

use App\BarangSkbM;
use App\Http\Controllers\Controller;
use App\Karyawan;
use App\SkbM;
use Illuminate\Http\Request;

class SkbmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skbm = SkbM::where('user_id', auth()->user()->id)->get();
        return view('admin.surat.skbm.index', compact('skbm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('admin.surat.skbm.create', compact('karyawan'));
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
            'alamat_tujuan'     => 'required',
            'karyawan_id'       => 'required',
            'no_telp'           => 'required|max:12',
            'tanggal_surat'     => 'required',
            'ttd1'              => 'required',
            'ttd2'              => 'required',

        ], [
            'alamat_tujuan.required'        => 'alamat tujuan harus diisi',
            'karyawan_id.required'          => 'peminta barang harus diisi',
            'no_telp.required'              => 'nomor telpon harus diisi',
            'tanggal_surat.required'        => 'tanggal surat harus diisi',
            'ttd1.required'                 => 'general manager harus diisi',
            'ttd2.required'                 => 'manager sdm & umum harus diisi',
        ]);

        $data_skbm = SkbM::create([
            'user_id' => auth()->user()->id,
            'karyawan_id' => $request->karyawan_id,
            'alamat_tujuan' => $request->alamat_tujuan,
            'no_telp' => $request->no_telp,
            'tanggal_surat' => $request->tanggal_surat,
            'ttd1' => $request->ttd1,
            'ttd2' => $request->ttd2
        ]);


        for ($i = 0; $i < count($request->jumlah); $i++) {
            BarangSkbM::create([
                'skbm_id'      => $data_skbm->id,
                'jumlah'        => $request->jumlah[$i],
                'satuan'        => $request->satuan[$i],
                'nama_barang'   => $request->nama_barang[$i],
                'spesifikasi'   => $request->spesifikasi[$i],
                'harga_satuan'  => $request->harga_satuan[$i]
            ]);
        }

        // return dd($data_skbm);

        $data_skbm->save();

        return redirect('admin/skbm/');
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
        $karyawan = Karyawan::all();
        $skbm = SkbM::where('user_id', auth()->user()->id)->find($id);
        return view('admin.surat.skbm.edit', compact('karyawan', 'skbm'));
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
