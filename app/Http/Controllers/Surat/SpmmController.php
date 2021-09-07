<?php

namespace App\Http\Controllers\Surat;

use App\Exports\SpmmExport;
use App\Exports\SppbjmExport;
use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Mataanggaran;
use App\SpmM;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SpmmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware(['role:admin','role:UMUM']);

        $this->middleware('permission:umum-list', ['only' => ['index']]);
        $this->middleware('permission:umum-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:umum-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:umum-delete', ['only' => ['destroy']]);
    }
    public function index()
    {

        $data_spmm = SpmM::all();
        return view('admin.surat.spmm.index', compact('data_spmm'));
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
        return view('admin.surat.spmm.create', compact('karyawan', 'mataanggaran'));
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
            'nomor_surat_spm'           => 'required',
            'tanggal_surat'             => 'required',
            'jenis_transaksi'           => 'required',
            'tahun_anggaran'            => 'required',
            'devisi'                    => 'required',
            'pembebanan_anggaran'       => 'required',

            'uraian_kegiatan'           => 'required',
            'mataanggaran_id'           => 'required',
            'permohonan_dana'           => 'required',

            'ttd1'                      => 'required',
            'ttd2'                      => 'required',
            'ttd3'                      => 'required',

        ], [
            'nomor_surat_spm.required'           => 'Nomor Surat harus diisi',
            'tanggal_surat.required'             => 'Tanggal surat harus diisi',
            'jenis_transaksi.required'           => 'Jenis Transaksi harus diisi',

            'tahun_anggaran.required'            => 'Tahun Anggaran harus diisi',
            'devisi.required'                    => 'required',
            'pembebanan_anggaran.required'       => 'Pilih Pembebanan Anggaran',

            'uraian_kegiatan.required'           => 'Uraian Kegiatan harus diisi',
            'mataanggaran_id.required'           => 'Pilih Mata Anggaran',
            'permohonan_dana.required'           => 'Permohonan Dana harus diisi',


            'ttd1.required'                      => 'General Manager harus diisi',
            'ttd2.required'                      => 'Manager SDM & Umum harus diisi',
            'ttd3.required'                      => 'Staf SDM & Umum harus diisi ',
        ]);

        $data_spmm = SpmM::create([
            'user_id'               =>  auth()->id(),
            'nomor_surat_spm'       => $request->nomor_surat_spm,
            'tanggal_surat'         => $request->tanggal_surat,
            'jenis_transaksi'       => $request->jenis_transaksi,
            'program'               => $request->program,
            'tahun_anggaran'        => $request->tahun_anggaran,
            'devisi'                => $request->devisi,
            'pembebanan_anggaran'   => $request->pembebanan_anggaran,

            'uraian_kegiatan'       => $request->uraian_kegiatan,
            'mataanggaran_id'       => $request->mataanggaran_id,
            'permohonan_dana'       => $request->permohonan_dana,
            'keterangan'            => $request->keterangan,

            'penerima_dana'         => $request->penerima_dana,
            'nomor_rekening'        => $request->nomor_rekening,
            'bank'                  => $request->bank,

            'ttd1'                  => $request->ttd1,
            'ttd2'                  => $request->ttd2,
            'ttd3'                  => $request->ttd3,
        ]);

        $data_spmm->save();


        return redirect('admin/spmm');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_spmm = SpmM::findOrFail($id);
        return view('admin.surat.spmm.show', compact('data_spmm'));
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
        $mataanggaran = Mataanggaran::all();
        $data_spmm = SpmM::find($id);
        return view('admin.surat.spmm.edit', compact('karyawan', 'mataanggaran', 'data_spmm', 'id'));
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
            'nomor_surat_spm'           => 'required',
            'tanggal_surat'             => 'required',
            'jenis_transaksi'           => 'required',
            'tahun_anggaran'            => 'required',
            'devisi'                    => 'required',
            'pembebanan_anggaran'       => 'required',

            'uraian_kegiatan'           => 'required',
            'mataanggaran_id'           => 'required',
            'permohonan_dana'           => 'required',

            'ttd1'                      => 'required',
            'ttd2'                      => 'required',
            'ttd3'                      => 'required',

        ], [
            'nomor_surat_spm.required'           => 'Nomor Surat harus diisi',
            'tanggal_surat.required'             => 'Tanggal surat harus diisi',
            'jenis_transaksi.required'           => 'Jenis Transaksi harus diisi',

            'tahun_anggaran.required'            => 'Tahun Anggaran harus diisi',
            'devisi.required'                    => 'required',
            'pembebanan_anggaran.required'       => 'Pilih Pembebanan Anggaran',

            'uraian_kegiatan.required'           => 'Uraian Kegiatan harus diisi',
            'mataanggaran_id.required'           => 'Pilih Mata Anggaran',
            'permohonan_dana.required'           => 'Permohonan Dana harus diisi',


            'ttd1.required'                      => 'General Manager harus diisi',
            'ttd2.required'                      => 'Manager SDM & Umum harus diisi',
            'ttd3.required'                      => 'Staf SDM & Umum harus diisi ',
        ]);

        $data_spmm_m = SpmM::find($id);

        $data_spmm_m->nomor_surat_spm = $request->get('nomor_surat_spm');
        $data_spmm_m->tanggal_surat = $request->get('tanggal_surat');
        $data_spmm_m->jenis_transaksi = $request->get('jenis_transaksi');
        $data_spmm_m->program = $request->get('program');
        $data_spmm_m->tahun_anggaran = $request->get('tahun_anggaran');
        $data_spmm_m->devisi = $request->get('devisi');
        $data_spmm_m->pembebanan_anggaran = $request->get('pembebanan_anggaran');

        $data_spmm_m->uraian_kegiatan = $request->get('uraian_kegiatan');
        $data_spmm_m->mataanggaran_id = $request->get('mataanggaran_id');
        $data_spmm_m->permohonan_dana = $request->get('permohonan_dana');
        $data_spmm_m->keterangan = $request->get('keterangan');

        $data_spmm_m->penerima_dana = $request->get('penerima_dana');
        $data_spmm_m->nomor_rekening = $request->get('nomor_rekening');
        $data_spmm_m->bank = $request->get('bank');

        $data_spmm_m->ttd1 = $request->get('ttd1');
        $data_spmm_m->ttd2 = $request->get('ttd2');
        $data_spmm_m->ttd3 = $request->get('ttd3');

        $data_spmm_m->save();
        return redirect('admin\spmm')->with('sukses', 'data Spm Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_spmm = SpmM::find($id);
        $data_spmm->delete();

        return redirect('admin\spmm')->with('sukses', 'data spmm berhasil dihapus');
    }
    public function fileExport()
    {
        return Excel::download(new SpmmExport, 'data-Spm.xlsx');
    }
}
