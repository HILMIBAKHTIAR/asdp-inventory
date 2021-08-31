<?php

namespace App\Http\Controllers\Admin;

use App\Barang;
use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Berita;
use App\Sppbj;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sp2bj = Sppbj::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $berita = Berita::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $subtotal = $sp2bj
            ->barang
            ->map(function ($el) {
                return $el->harga_satuan * $el->jumlah;
            })->sum();
        return view('admin.berita.cetak', compact('sp2bj', 'berita', 'subtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sp2bj = Sppbj::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $karyawan = Karyawan::all();
        return view('admin.berita.input', compact('karyawan', 'sp2bj'));
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
            'karyawan_berita_id'    => 'required',
            'ttd1'                  => 'required',
            'ttd2'                  => 'required',
            'ttd3'                  => 'required',
            'alamat_tujuan'         => 'required',
            'tanggal_surat'         => 'required',
        ], [
            'karyawan_berita_id.required'    => 'kepada yth harus diisi',
            'ttd1.required'                  => 'staf umum harus diisi',
            'ttd2.required'                  => 'manager sdm & umum harus diisi',
            'ttd3.required'                  => 'staf sdm & umum harus diisi',
            'alamat_tujuan.required'         => 'alamat tujuan harus diisi',
            'tanggal_surat.required'         => 'tanggal surat harus diisi',
        ]);

        $sppbj = Sppbj::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $data_berita = Berita::create([
            'user_id' => auth()->user()->id,
            'sppbj_id' => $sppbj->id,
            'karyawan_berita_id' => $request->karyawan_berita_id,
            'alamat_tujuan' => $request->alamat_tujuan,
            'tanggal_surat' => $request->tanggal_surat,
            'ttd1' => $request->ttd1,
            'ttd2' => $request->ttd2,
            'ttd3' => $request->ttd3,
        ]);


        // for ($i = 0; $i < count($request->jumlah); $i++) {
        //     BarangSerahTerima::create([]);
        // }


        $data_berita->save();
        return redirect('admin/berita');
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
        $data_barang = Sppbj::find($id);
        // return dd($id);
        return view('admin.berita.edit', compact('data_barang', 'id'));
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
        // return dd($request->all());

        $request->validate([

            'jumlah.*'                   => 'required',
            'nama_barang.*'               => 'required',
            'spesifikasi.*'                 => 'required',
            'harga_satuan.*'               => 'required',

        ], [
            'jumlah.*.required'                       => 'kepada yth harus diisi',
            'nama_barang.*.required'                  => 'nama barang atau alat harus diisi',
            'spesifikasi.*.required'                  => 'spesifikasi harus diisi',
            'harga_satuan.*.required'                  => 'harga satuan harus diisi',
        ]);

        if (count($request->id) > 0) {
            foreach ($request->id as $key => $item) {
                $array_barang = array(
                    'jumlah' => $request->jumlah[$key],
                    'satuan' => $request->satuan[$key],
                    'nama_barang' => $request->nama_barang[$key],
                    'spesifikasi' => $request->spesifikasi[$key],
                    'harga_satuan' => $request->harga_satuan[$key]
                );
                $data_barang = Barang::where('id', $item)->first();
                $data_barang->update($array_barang);
            }
        }
        // return dd($data_barang);
        return redirect('admin\berita\create');
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

    public function tambahBarang(Request $request)
    {
        Barang::create($request->only([
            'sppbj_id', 'jumlah', 'satuan', 'nama_barang', 'spesifikasi', 'harga_satuan'
        ]));

        return response()->json(['status' => 'sukses']);
    }

    public function hapusBarang($barang)
    {
        $barang = Barang::where('id', $barang)->delete();

        return response()->json(['status' => $barang]);
    }
}
