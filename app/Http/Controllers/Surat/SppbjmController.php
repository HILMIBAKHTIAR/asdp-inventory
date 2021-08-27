<?php

namespace App\Http\Controllers\Surat;

use App\BarangSppbjM;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mataanggaran;
use App\SppbjM;
use App\Karyawan;

class SppbjmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sppbjm = SppbjM::where('user_id', auth()->user()->id)->get();
        return view('admin.surat.sppbjm.index', compact('sppbjm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mataanggaran = Mataanggaran::all();
        $karyawan = Karyawan::all();
        return view('admin.surat.sppbjm.create', compact('mataanggaran', 'karyawan'));
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
            'mataanggaran_id'       => 'required',
            'nama_pengadaan'        => 'required',
            'tanggal_surat'         => 'required',
            'nomor_surat'           => 'required',
            'bulan_dibutuhkan'      => 'required',
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
            'tanggal_surat.required'        => "tanggal surat harus diisi",
            'nomor_surat.required'          => "nomor surat harus diisi",
            'bulan_dibutuhkan.required'     => "Bulan dibutuhkan harus diisi",
            'jumlah.*.required'             => "jumlah barang harus diisi",
            'nama_barang.*.required'        => "nama barang harus diisi",
            'spesifikasi.*.required'        => "spesifikasi barang harus diisi",
            'harga_satuan.*.required'       => "harga satuan barang harus diisi",
            'ttd1.required'                 => "nama peminta barang harus diisi ",
            'ttd2.required'                 => "nama manager cabang harus diisi",
            'ttd3.required'                 => "nama manager keuangan harus diisi",
            'ttd4.required'                 => "nama manager sdm&umum harus diisi",
        ]);

        $data_sppbjm = SppbjM::create([
            'user_id'           =>  auth()->id(),
            'karyawan_id'       => $request->karyawan_id,
            'ttd1'              => $request->ttd1,
            'ttd2'              => $request->ttd2,
            'ttd3'              => $request->ttd3,
            'ttd4'              => $request->ttd4,
            'mataanggaran_id'   => $request->mataanggaran_id,
            'nama_pengadaan'    => $request->nama_pengadaan,
            'tanggal_surat'     => $request->tanggal_surat,
            'nomor_surat'       => $request->nomor_surat,
            'bulan_dibutuhkan'  => $request->bulan_dibutuhkan,
            'catatan_peminta'   => $request->catatan_peminta,
            'catatan'           => $request->catatan,
            'catatan_anggaran'  => $request->catatan_anggaran,
            'catatan_stok'      => $request->catatan_stok,
        ]);

        for ($i = 0; $i < count($request->jumlah); $i++) {
            BarangSppbjM::create([
                'sppbjm_id'      => $data_sppbjm->id,
                'jumlah'        => $request->jumlah[$i],
                'satuan'        => $request->satuan[$i],
                'nama_barang'   => $request->nama_barang[$i],
                'spesifikasi'   => $request->spesifikasi[$i],
                'harga_satuan'  => $request->harga_satuan[$i]
            ]);
        }
        $data_sppbjm->save();
        return redirect('admin\sppbjm');
        // return dd($data_sppbjm);
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
        $data_sppbjm = SppbjM::findOrFail($id);
        $subtotal = $data_sppbjm
            ->barangSp2bj
            ->map(function ($el) {
                return $el->harga_satuan * $el->jumlah;
            })->sum();
        return view('admin.surat.sppbjm.show', compact('data_sppbjm', 'subtotal'));
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
        $karyawan = Karyawan::all();
        $mataanggaran = Mataanggaran::all();
        $data_sppbjm = SppbjM::find($id);
        return view('admin.surat.sppbjm.edit', compact('karyawan', 'mataanggaran', 'data_sppbjm', 'id'));
        // return dd($data_sppbjm);
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
            'mataanggaran_id'       => 'required',
            'nama_pengadaan'        => 'required',
            'tanggal_surat'         => 'required',
            'nomor_surat'           => 'required',
            'bulan_dibutuhkan'      => 'required',
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
            'tanggal_surat.required'        => "tanggal surat harus diisi",
            'nomor_surat.required'        => "nomor surat harus diisi",
            'bulan_dibutuhkan.required'     => "Bulan dibutuhkan harus diisi",
            'jumlah.*.required'             => "jumlah barang harus diisi",
            'nama_barang.*.required'        => "nama barang harus diisi",
            'spesifikasi.*.required'        => "spesifikasi barang harus diisi",
            'harga_satuan.*.required'       => "harga satuan barang harus diisi",
            'ttd1.required'                 => "nama peminta barang harus diisi ",
            'ttd2.required'                 => "nama manager cabang harus diisi",
            'ttd3.required'                 => "nama manager keuangan harus diisi",
            'ttd4.required'                 => "nama manager sdm&umum harus diisi",
        ]);
        $data_sppbjmm = SppbjM::find($id);

        $data_sppbjmm->karyawan_id       = $request->get('karyawan_id');
        $data_sppbjmm->mataanggaran_id   = $request->get('mataanggaran_id');
        $data_sppbjmm->nama_pengadaan    = $request->get('nama_pengadaan');
        $data_sppbjmm->tanggal_surat     = $request->get('tanggal_surat');
        $data_sppbjmm->nomor_surat       = $request->get('nomor_surat');
        $data_sppbjmm->bulan_dibutuhkan  = $request->get('bulan_dibutuhkan');
        $data_sppbjmm->catatan_peminta   = $request->get('catatan_peminta');
        $data_sppbjmm->catatan           = $request->get('catatan');
        $data_sppbjmm->catatan_anggaran  = $request->get('catatan_anggaran');
        $data_sppbjmm->catatan_stok      = $request->get('catatan_stok');
        $data_sppbjmm->ttd1              = $request->get('ttd1');
        $data_sppbjmm->ttd2              = $request->get('ttd2');
        $data_sppbjmm->ttd3              = $request->get('ttd3');
        $data_sppbjmm->ttd4              = $request->get('ttd4');

        if (count($request->id) > 0) {
            foreach ($request->id as $key => $item) {
                $array_barang = array(
                    'jumlah' => $request->jumlah[$key],
                    'satuan' => $request->satuan[$key],
                    'nama_barang' => $request->nama_barang[$key],
                    'spesifikasi' => $request->spesifikasi[$key],
                    'harga_satuan' => $request->harga_satuan[$key]
                );
                $data_sppbjm = BarangSppbjM::where('id', $item)->first();
                $data_sppbjm->update($array_barang);
            }
        }

        $data_sppbjmm->save();
        return redirect('admin\sppbjm')->with('sukses', 'data sppbj berhasil diupdate');
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
        $data_sppbjm = SppbjM::find($id);
        $data_sppbjm->delete();

        return redirect('admin\sppbjm')->with('sukses', 'data sppbj berhasil dihapus');
    }

    public function tambahBarang(Request $request)
    {
        BarangSppbjM::create($request->only([
            'sppbjm_id', 'jumlah', 'satuan', 'nama_barang', 'spesifikasi', 'harga_satuan'
        ]));

        return response()->json(['status' => 'sukses']);
    }

    public function hapusBarang($barang)
    {
        $barang = BarangSppbjM::where('id', $barang)->delete();

        return response()->json(['status' => $barang]);
    }
}
