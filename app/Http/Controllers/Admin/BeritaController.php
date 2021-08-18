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
        return view('admin.berita.cetak', compact('sp2bj', 'berita'));
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
        $data_berita = Berita::create([
            'user_id' => auth()->id(),
            'karyawan_berita_id' => $request->karyawan_berita_id,
            'alamat_tujuan' => $request->alamat_tujuan,
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
        return view('admin.berita.edit', compact('data_barang'));
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

        $request->validate([

            'jumlah'             => 'required',
            'nama_barang'        => 'required',
            'spesifikasi'        => 'required',
            'harga_satuan'       => 'required',
        ]);

        if (count($request->id) > 0) {
            foreach ($request->id as $item) {
                $array_barang = array(
                    'jumlah' => $request->jumlah[$item],
                    'satuan' => $request->satuan[$item],
                    'nama_barang' => $request->nama_barang[$item],
                    'spesifikasi' => $request->spesifikasi[$item],
                    'harga_satuan' => $request->harga_satuan[$item]
                );
                $data_barang = Barang::where('id', $request->id[$item])->first();
                $data_barang->update($array_barang);
            }
        }
        return dd($data_barang);
        // return redirect('admin\berita');
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
