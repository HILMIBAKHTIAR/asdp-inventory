<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sppbj;
use App\Barang;
use App\Karyawan;
use App\Mataanggaran;
use Illuminate\Support\Carbon;

class SppbjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            'karyawan_id'           => 'required',
            'mataanggaran_id'       => 'required',
            'nama_pengadaan'        => 'required',
            'tanggal_dibutuhkan'    => 'required',
            'jumlah'                => 'required|array',
            'jumlah.*'              => 'required',
            'nama_barang'           => 'required|array',
            'nama_barang.*'         => 'required',
            'spesifikasi'           => 'required|array',
            'spesifikasi.*'         => 'required',
            'harga_satuan'          => 'required|array',
            'harga_satuan.*'        => 'required',
            'ttd1'                  => 'required',
            'ttd2'                  => 'required',
            'ttd3'                  => 'required',
            'ttd4'                  => 'required',
        ], [
            'karyawan_id.required'          => "nama peminta harus diisi",
            'mataanggaran_id.required'      => "mataanggaran harus diisi",
            'nama_pengadaan.required'       => "nama pengadaan harus diisi",
            'tanggal_dibutuhkan.required'   => "tanggal dibutuhkan harus diisi",
            'jumlah.*.required'             => "jumlah barang harus diisi",
            'nama_barang.*.required'        => "nama barang harus diisi",
            'spesifikasi.*.required'        => "spesifikasi barang harus diisi",
            'harga_satuan.*.required'       => "harga satuan barang harus diisi",
            'ttd1.required'                 => "nama peminta barang harus diisi ",
            'ttd2.required'                 => "nama manager cabang harus diisi",
            'ttd3.required'                 => "nama manager keuangan harus diisi",
            'ttd4.required'                 => "nama manager sdm&umum harus diisi",
        ]);

        $nomorSurat = Sppbj::whereYear("created_at", Carbon::now()->year)->count();

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
            'nomor_surat' => $nomorSurat + 1,
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
