<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BeritaM;
use App\Karyawan;
use App\BarangBeritaM;
use App\Satuan;

class BeritamController extends Controller
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
        $beritam = BeritaM::all();
        return view('admin.surat.beritam.index', compact('beritam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $satuan = Satuan::all();
        $karyawan = Karyawan::all();
        return view('admin.surat.beritam.create', compact('karyawan', 'satuan'));
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
            'karyawan_berita_id'    => 'required',
            'ttd1'                  => 'required',
            'ttd2'                  => 'required',
            'ttd3'                  => 'required',
            'alamat_tujuan'         => 'required',
            'tanggal_surat'         => 'required',
            'nomor_surat_berita'    => 'required',
            'jumlah'                => 'required|array',
            'jumlah.*'              => 'required',
            'satuan_id'             => 'required|array',
            'satuan_id.*'           => 'required',
            'nama_barang'           => 'required|array',
            'nama_barang.*'         => 'required',
            'spesifikasi'           => 'required|array',
            'spesifikasi.*'         => 'required',
            'harga_satuan'          => 'required|array',
            'harga_satuan.*'        => 'required',
        ], [
            'karyawan_berita_id.required'       => 'kepada yth harus diisi',
            'ttd1.required'                     => 'staf umum harus diisi',
            'ttd2.required'                     => 'manager sdm & umum harus diisi',
            'ttd3.required'                     => 'staf sdm & umum harus diisi',
            'alamat_tujuan.required'                => 'alamat tujuan harus diisi',
            'tanggal_surat.required'            => 'tanggal surat harus diisi',
            'nomor_surat_berita.required'       => 'nomor surat harus diisi',
            'jumlah.*.required'                 => "jumlah barang harus diisi",
            'satuan_id.*.required'              => "Pilih satuan barang",
            'nama_barang.*.required'            => "nama barang harus diisi",
            'spesifikasi.*.required'            => "spesifikasi barang harus diisi",
            'harga_satuan.*.required'           => "harga satuan barang harus diisi",
        ]);

        $data_beritam = BeritaM::create([
            'user_id'               => auth()->id(),
            'karyawan_berita_id'    => $request->karyawan_berita_id,
            'alamat_tujuan'         => $request->alamat_tujuan,
            'tanggal_surat'         => $request->tanggal_surat,
            'nomor_surat_berita'    => $request->nomor_surat_berita,
            'ttd1'                  => $request->ttd1,
            'ttd2'                  => $request->ttd2,
            'ttd3'                  => $request->ttd3,
        ]);

        for ($i = 0; $i < count($request->jumlah); $i++) {
            BarangBeritaM::create([
                'beritam_id'     => $data_beritam->id,
                'jumlah'        => $request->jumlah[$i],
                'satuan_id'        => $request->satuan_id[$i],
                'nama_barang'   => $request->nama_barang[$i],
                'spesifikasi'   => $request->spesifikasi[$i],
                'harga_satuan'  => $request->harga_satuan[$i]
            ]);
        }

        $data_beritam->save();
        return redirect('admin\beritam');

        // return dd($data_beritam);
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
        $data_beritam = BeritaM::findOrFail($id);
        $subtotal = $data_beritam
            ->barangBerita
            ->map(function ($el) {
                return $el->harga_satuan * $el->jumlah;
            })->sum();
        return view('admin.surat.beritam.show', compact('data_beritam', 'subtotal'));
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
        $satuan = Satuan::all();
        $karyawan = Karyawan::all();
        $data_beritam = BeritaM::find($id);
        return view('admin.surat.beritam.edit', compact('satuan', 'karyawan', 'data_beritam', 'id'));
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
            'karyawan_berita_id'    => 'required',
            'ttd1'                  => 'required',
            'ttd2'                  => 'required',
            'ttd3'                  => 'required',
            'alamat_tujuan'         => 'required',
            'tanggal_surat'         => 'required',
            'nomor_surat_berita'    => 'required',
            'jumlah'                => 'required|array',
            'jumlah.*'              => 'required',
            'satuan_id'             => 'required|array',
            'satuan_id.*'           => 'required',
            'nama_barang'           => 'required|array',
            'nama_barang.*'         => 'required',
            'spesifikasi'           => 'required|array',
            'spesifikasi.*'         => 'required',
            'harga_satuan'          => 'required|array',
            'harga_satuan.*'        => 'required',
        ], [
            'karyawan_berita_id.required'       => 'kepada yth harus diisi',
            'ttd1.required'                     => 'staf umum harus diisi',
            'ttd2.required'                     => 'manager sdm & umum harus diisi',
            'ttd3.required'                     => 'staf sdm & umum harus diisi',
            'alamat_tujuan.required'            => 'alamat tujuan harus diisi',
            'tanggal_surat.required'            => 'tanggal surat harus diisi',
            'nomor_surat_berita.required'       => 'nomor surat harus diisi',
            'jumlah.*.required'                 => "jumlah barang harus diisi",
            'satuan_id.*.required'              => "Pilih satuan barang",
            'nama_barang.*.required'            => "nama barang harus diisi",
            'spesifikasi.*.required'            => "spesifikasi barang harus diisi",
            'harga_satuan.*.required'           => "harga satuan barang harus diisi",
        ]);
        $data_beritamm = BeritaM::find($id);

        $data_beritamm->karyawan_berita_id          = $request->get('karyawan_berita_id');
        $data_beritamm->ttd1                        = $request->get('ttd1');
        $data_beritamm->ttd2                        = $request->get('ttd2');
        $data_beritamm->ttd3                        = $request->get('ttd3');
        $data_beritamm->alamat_tujuan               = $request->get('alamat_tujuan');
        $data_beritamm->tanggal_surat               = $request->get('tanggal_surat');
        $data_beritamm->nomor_surat_berita          = $request->get('nomor_surat_berita');

        if (count($request->id) > 0) {
            foreach ($request->id as $key => $item) {
                $array_barang = array(
                    'jumlah' => $request->jumlah[$key],
                    'satuan_id' => $request->satuan_id[$key],
                    'nama_barang' => $request->nama_barang[$key],
                    'spesifikasi' => $request->spesifikasi[$key],
                    'harga_satuan' => $request->harga_satuan[$key]
                );
                $data_beritam = BarangBeritaM::where('id', $item)->first();
                $data_beritam->update($array_barang);
            }
        }

        $data_beritamm->save();
        return redirect('admin\beritam')->with('sukses', 'data serah terima barang berhasil diupdate');
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
        $data_beritam = BeritaM::find($id);
        $data_beritam->delete();

        return redirect('admin\beritam')->with('sukses', 'data serah terima barang berhasil dihapus');
    }

    public function tambahBarang(Request $request)
    {
        BarangBeritaM::create($request->only([
            'beritam_id', 'jumlah', 'satuan_id', 'nama_barang', 'spesifikasi', 'harga_satuan'
        ]));

        return response()->json(['status' => 'sukses']);
    }

    public function hapusBarang($barang)
    {
        $barang = BarangBeritaM::where('id', $barang)->delete();

        return response()->json(['status' => $barang]);
    }
}
