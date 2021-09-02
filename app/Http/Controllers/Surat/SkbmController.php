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
    public function __construct()
    {
        // $this->middleware(['role:admin']);

        $this->middleware('permission:umum-list', ['only' => ['index']]);
        $this->middleware('permission:umum-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:umum-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:umum-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $skbm = SkbM::all();
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
            'jumlah'                => 'required|array',
            'jumlah.*'              => 'required',
            'nama_barang'           => 'required|array',
            'nama_barang.*'         => 'required',
            'spesifikasi'           => 'required|array',
            'spesifikasi.*'         => 'required',
            'harga_satuan'          => 'required|array',
            'harga_satuan.*'        => 'required',
            'tanggal_surat'     => 'required',
            'ttd1'              => 'required',
            'ttd2'              => 'required',

        ], [
            'alamat_tujuan.required'        => 'alamat tujuan harus diisi',
            'karyawan_id.required'          => 'peminta barang harus diisi',
            'no_telp.required'              => 'nomor telpon harus diisi',
            'tanggal_surat.required'        => "tanggal surat harus diisi",
            'bulan_dibutuhkan.required'     => "Bulan dibutuhkan harus diisi",
            'jumlah.*.required'             => "jumlah barang harus diisi",
            'nama_barang.*.required'        => "nama barang harus diisi",
            'spesifikasi.*.required'        => "spesifikasi barang harus diisi",
            'harga_satuan.*.required'       => "harga satuan barang harus diisi",
            'tanggal_surat.required'        => 'tanggal surat harus diisi',
            'ttd1.required'                 => 'general manager harus diisi',
            'ttd2.required'                 => 'manager sdm & umum harus diisi',
        ]);

        $skbm = SkbM::create([
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
                'skbm_id'      => $skbm->id,
                'jumlah'        => $request->jumlah[$i],
                'satuan'        => $request->satuan[$i],
                'nama_barang'   => $request->nama_barang[$i],
                'spesifikasi'   => $request->spesifikasi[$i],
                'harga_satuan'  => $request->harga_satuan[$i]
            ]);
        }

        $skbm->save();

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
        $skbm = SkbM::findOrFail($id);

        $subtotal = $skbm->barangSkbm->map(function ($el) {
            return $el->harga_satuan * $el->jumlah;
        })->sum();

        return view('admin.surat.skbm.show', compact('skbm', 'subtotal'));
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
        $skbm = SkbM::find($id);
        return view('admin.surat.skbm.edit', compact('karyawan', 'skbm', 'id'));
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
            'alamat_tujuan'         => 'required',
            'karyawan_id'           => 'required',
            'no_telp'               => 'required|max:12',
            'tanggal_surat'         => 'required',
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

        ], [
            'alamat_tujuan.required'        => 'alamat tujuan harus diisi',
            'karyawan_id.required'          => 'peminta barang harus diisi',
            'no_telp.required'              => 'nomor telpon harus diisi',
            'tanggal_surat.required'        => "tanggal surat harus diisi",
            'jumlah.*.required'             => "jumlah barang harus diisi",
            'nama_barang.*.required'        => "nama barang harus diisi",
            'spesifikasi.*.required'        => "spesifikasi barang harus diisi",
            'harga_satuan.*.required'       => "harga satuan barang harus diisi",
            'tanggal_surat.required'        => 'tanggal surat harus diisi',
            'ttd1.required'                 => 'general manager harus diisi',
            'ttd2.required'                 => 'manager sdm & umum harus diisi',
        ]);

        $skbmm = SkbM::find($id);

        $skbmm->alamat_tujuan       = $request->get('alamat_tujuan');
        $skbmm->karyawan_id         = $request->get('karyawan_id');
        $skbmm->no_telp             = $request->get('no_telp');
        $skbmm->tanggal_surat       = $request->get('tanggal_surat');
        $skbmm->ttd1                = $request->get('ttd1');
        $skbmm->ttd2                = $request->get('ttd2');

        if (count($request->id) > 0) {
            foreach ($request->id as $key => $item) {
                $array_barang = array(
                    'jumlah' => $request->jumlah[$key],
                    'satuan' => $request->satuan[$key],
                    'nama_barang' => $request->nama_barang[$key],
                    'spesifikasi' => $request->spesifikasi[$key],
                    'harga_satuan' => $request->harga_satuan[$key]
                );
                $skbm = BarangSkbM::where('id', $item)->first();
                $skbm->update($array_barang);
            }
        }

        $skbmm->save();
        return redirect('admin\skbm')->with('sukses', 'Surat Skbm berhasil diperbarui');

        // return dd($skbmm);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skbm = SkbM::find($id);
        $skbm->delete();

        return redirect('admin/skbm')->with('sukses', 'data skbm berhasil dihapus');
    }

    public function tambahBarang(Request $request)
    {
        BarangSkbM::create($request->only([
            'skbm_id', 'jumlah', 'satuan', 'nama_barang', 'spesifikasi', 'harga_satuan'
        ]));

        return response()->json(['status' => 'sukses']);
    }

    public function hapusBarang($barang)
    {
        $barang = BarangSkbM::where('id', $barang)->delete();

        return response()->json(['status' => $barang]);
    }
}
