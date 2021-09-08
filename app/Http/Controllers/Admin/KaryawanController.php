<?php

namespace App\Http\Controllers\Admin;

use App\Divisi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Karyawan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Exports\KaryawanExport;
use App\Jabatan;
use Maatwebsite\Excel\Facades\Excel;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // $this->middleware(['role:admin']);

        $this->middleware('permission:sdm-list', ['only' => ['index']]);
        $this->middleware('permission:sdm-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sdm-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:sdm-delete', ['only' => ['destroy']]);
        $this->middleware('permission:sdm-show', ['only' => ['show']]);
    }
    public function index()
    {
        // grafik usia
        $groupsUsia = [
            'Usia 17 - 25' =>  Karyawan::select('usia')
                ->where('usia', '>=', 17)
                ->where('usia', '<=', 25)
                ->count(),

            'Usia 26 - 45' => Karyawan::select('usia')
                ->where('usia', '>=', 26)
                ->where('usia', '<=', 45)
                ->count(),

            'Usia 45 keatas' => Karyawan::select('usia')
                ->where('usia', '>=', 46)
                ->count(),
        ];
        $grafikUsia = new Karyawan;
        $grafikUsia->labels = (array_keys($groupsUsia));
        $grafikUsia->dataset = (array_values($groupsUsia));

        //grafik masa kerja

        $groupsMasaKerja =
            [
                'Kurang dari 5 Tahun' =>  Karyawan::select('masa_kerja')
                    ->where('masa_kerja', '>=', 0)
                    ->where('masa_kerja', '<=', 5)
                    ->count(),

                '6 sampai 10 Tahun' => Karyawan::select('masa_kerja')
                    ->where('masa_kerja', '>=', 6)
                    ->where('masa_kerja', '<=', 10)
                    ->count(),

                'Lebih dari 11 Tahun' => Karyawan::select('masa_kerja')
                    ->where('masa_kerja', '>=', 11)
                    ->count(),
            ];

        // Prepare the data for returning with the view
        $grafikMasaKerja = new Karyawan;
        $grafikMasaKerja->labels = (array_keys($groupsMasaKerja));
        $grafikMasaKerja->dataset = (array_values($groupsMasaKerja));

        //grafik masa jabatan

        $groupsMasaJabatan =
            [
                'Kurang dari 5 Tahun' =>  Karyawan::select('masa_jabatan')
                    ->where('masa_jabatan', '>=', 0)
                    ->where('masa_jabatan', '<=', 5)
                    ->count(),

                '6 sampai 10 Tahun' => Karyawan::select('masa_jabatan')
                    ->where('masa_jabatan', '>=', 6)
                    ->where('masa_jabatan', '<=', 10)
                    ->count(),

                'Lebih dari 11 Tahun' => Karyawan::select('masa_jabatan')
                    ->where('masa_jabatan', '>=', 11)
                    ->count(),
            ];

        // Prepare the data for returning with the view
        $grafikMasaJabatan = new Karyawan;
        $grafikMasaJabatan->labels = (array_keys($groupsMasaJabatan));
        $grafikMasaJabatan->dataset = (array_values($groupsMasaJabatan));

        $data = Karyawan::all();
        return view('admin.karyawan.index', compact('data', 'grafikUsia', 'grafikMasaKerja', 'grafikMasaJabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_divisi = Divisi::all();
        $jabatan = Jabatan::all();
        $data = Karyawan::all();
        return view('admin.karyawan.create', compact('data', 'data_divisi', 'jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'nama_karyawan'             => 'required',
            'jabatan_id'                => 'required',
            'divisi_id'                 => 'required',
            'status_jabatan'            => 'required',
            'nik'                       => 'required',
            'tempat_lahir'              => 'required',
            'tanggal_lahir'             => 'required',
            'no_npwp'                   => 'required',
            'status_keluarga'           => 'required',
            'pendidikan'                => 'required',
            'tanggal_masuk_kerja'       => 'required',
            'tanggal_pilih_jabatan'     => 'required',
            'darat_laut'                => 'required',
            'jenis_kelamin'             => 'required',
            'segmen'                    => 'required',
            'no_rek'                    => 'required',
        ], [
            'nama_karyawan.required'             => 'nama karyawan harus diisi',
            'jabatan_id.required'                => 'jabatan harus diisi',
            'divisi_id.required'                 => 'sub unker harus diisi',
            'status_jabatan.required'            => 'status Jabatan harus diisi',
            'nik.required'                       => 'NIK harus diisi',
            'tempat_lahir.required'              => 'tempat lahir harus diisi',
            'tanggal_lahir.required'             => 'tanggal lahir harus diisi',
            'no_npwp.required'                   => 'nomor NPWP harus diisi',
            'status_keluarga.required'           => 'status keluarga harus diisi',
            'pendidikan.required'                => 'pendidikan harus diisi',
            'tanggal_masuk_kerja.required'       => 'tanggal masuk kerja harus diisi',
            'tanggal_pilih_jabatan.required'     => 'tanggal dipilih jabatan harus diisi',
            'darat_laut.required'                => 'darat laut harus diisi',
            'jenis_kelamin.required'             => 'jenis kelamin harus diisi',
            'segmen.required'                    => 'segmen harus diisi',
            'no_rek.required'                    => 'nomor rekening harus diisi',
        ]);

        //calculate umur
        $tanggal_lahir = Carbon::parse($request['tanggal_lahir']);
        $usia = $tanggal_lahir->age;

        //calculate masa kerja
        $tanggal_masuk_kerja = Carbon::parse($request['tanggal_masuk_kerja']);
        $masa_kerja = $tanggal_masuk_kerja->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan');
        //calculate masa jabatan
        $tanggal_pilih_jabatan = Carbon::parse($request['tanggal_pilih_jabatan']);
        $masa_jabatan = $tanggal_pilih_jabatan->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan');

        $data_karyawan = Karyawan::create([
            'nama_karyawan'             => $request->nama_karyawan,
            'jabatan_id'                => $request->jabatan_id,
            'divisi_id'                 => $request->divisi_id,
            'status_jabatan'            => $request->status_jabatan,
            'nik'                       => $request->nik,
            'tempat_lahir'              => $request->tempat_lahir,
            'tanggal_lahir'             => $tanggal_lahir,
            'usia'                      => $usia,
            'nik_ktp'                   => $request->nik_ktp,
            'no_bpjs_kesehatan'         => $request->no_bpjs_kesehatan,
            'no_bpjs_ketenagakerjaan'   => $request->no_bpjs_ketenagakerjaan,
            'no_npwp'                   => $request->no_npwp,
            'status_keluarga'           => $request->status_keluarga,
            'pendidikan'                => $request->pendidikan,
            'jurusan'                   => $request->jurusan,
            'sk'                        => $request->sk,
            'tanggal_masuk_kerja'       => $tanggal_masuk_kerja,
            'tanggal_pilih_jabatan'     => $tanggal_pilih_jabatan,
            'masa_kerja'                => $masa_kerja,
            'masa_jabatan'              => $masa_jabatan,
            'darat_laut'                => $request->darat_laut,
            'jenis_kelamin'             => $request->jenis_kelamin,
            'gol_skala_tht'             => $request->gol_skala_tht,
            'skala_tht'                 => $request->skala_tht,
            'gol_phdp'                  => $request->gol_phdp,
            'gol_skala_phdp'            => $request->gol_skala_phdp,
            'gol_gaji'                  => $request->gol_gaji,
            'gol_skala_gaji'            => $request->gol_skala_gaji,
            'no_hp'                     => $request->no_hp,
            'no_inhealth'               => $request->no_inhealth,
            'no_rek'                    => $request->no_rek,
            'email'                     => $request->email,
            'alamat'                    => $request->alamat,
            'uk_sepatu'                 => $request->uk_sepatu,
            'uk_kaos'                   => $request->uk_kaos,
            'segmen'                    => $request->segmen,

        ]);


        $data_karyawan->save();
        return redirect('admin\karyawan')->with('sukses', 'Karyawan berhasil ditambahkan');

        // return dd($data_karyawan);
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
        $model = Karyawan::findOrFail($id);
        return view('admin.karyawan.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_divisi = Divisi::all();
        $jabatan = Jabatan::all();
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit', compact('karyawan', 'id', 'jabatan', 'data_divisi'));
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
        // dd($request->all());
        $request->validate([
            'nama_karyawan'             => 'required',
            'jabatan_id'                => 'required',
            'divisi_id'                 => 'required',
            'status_jabatan'            => 'required',
            'nik'                       => 'required',
            'tempat_lahir'              => 'required',
            'tanggal_lahir'             => 'required',
            'no_npwp'                   => 'required',
            'status_keluarga'           => 'required',
            'pendidikan'                => 'required',
            'tanggal_masuk_kerja'       => 'required',
            'tanggal_pilih_jabatan'     => 'required',
            'darat_laut'                => 'required',
            'jenis_kelamin'             => 'required',
            'segmen'                    => 'required',
            'no_rek'                    => 'required',
        ]);

        //calculate umur
        $tanggal_lahir = Carbon::parse($request['tanggal_lahir']);
        $usia = $tanggal_lahir->age;

        //calculate masa kerja
        $tanggal_masuk_kerja = Carbon::parse($request['tanggal_masuk_kerja']);
        $masa_kerja = $tanggal_masuk_kerja->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan');
        //calculate masa jabatan
        $tanggal_pilih_jabatan = Carbon::parse($request['tanggal_pilih_jabatan']);
        $masa_jabatan = $tanggal_pilih_jabatan->diff(\Carbon\Carbon::now())->format('%y Tahun, %m Bulan');

        $karyawan = Karyawan::find($id);

        $karyawan->nama_karyawan            = $request->get('nama_karyawan');
        $karyawan->jabatan_id               = $request->get('jabatan_id');
        $karyawan->divisi_id                = $request->get('divisi_id');
        $karyawan->status_jabatan           = $request->get('status_jabatan');
        $karyawan->nik                      = $request->get('nik');
        $karyawan->tempat_lahir             = $request->get('tempat_lahir');
        $karyawan->tanggal_lahir            = $tanggal_lahir;
        $karyawan->usia                     = $usia;
        $karyawan->nik_ktp                  = $request->get('nik_ktp');
        $karyawan->no_bpjs_kesehatan        = $request->get('no_bpjs_kesehatan');
        $karyawan->no_bpjs_ketenagakerjaan  = $request->get('no_bpjs_ketenagakerjaan');
        $karyawan->no_npwp                  = $request->get('no_npwp');
        $karyawan->status_keluarga          = $request->get('status_keluarga');
        $karyawan->pendidikan               = $request->get('pendidikan');
        $karyawan->jurusan                  = $request->get('jurusan');
        $karyawan->sk                       = $request->get('sk');
        $karyawan->tanggal_masuk_kerja      = $tanggal_masuk_kerja;
        $karyawan->tanggal_pilih_jabatan    = $tanggal_pilih_jabatan;
        $karyawan->masa_kerja               = $masa_kerja;
        $karyawan->masa_jabatan             = $masa_jabatan;
        $karyawan->darat_laut               = $request->get('darat_laut');
        $karyawan->jenis_kelamin            = $request->get('jenis_kelamin');
        $karyawan->gol_skala_tht            = $request->get('gol_skala_tht');
        $karyawan->skala_tht                = $request->get('skala_tht');
        $karyawan->gol_phdp                 = $request->get('gol_phdp');
        $karyawan->gol_skala_phdp           = $request->get('gol_skala_phdp');
        $karyawan->gol_gaji                 = $request->get('gol_gaji');
        $karyawan->gol_skala_gaji           = $request->get('gol_skala_gaji');
        $karyawan->no_hp                    = $request->get('no_hp');
        $karyawan->no_inhealth              = $request->get('no_inhealth');
        $karyawan->no_rek                   = $request->get('no_rek');
        $karyawan->email                    = $request->get('email');
        $karyawan->alamat                   = $request->get('alamat');
        $karyawan->uk_sepatu                = $request->get('uk_sepatu');
        $karyawan->uk_kaos                  = $request->get('uk_kaos');
        $karyawan->segmen                   = $request->get('segmen');

        $karyawan->save();
        return redirect('admin\karyawan')->with('sukses', 'Karyawan berhasil diupdate');
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
        $karyawan = Karyawan::find($id);
        $karyawan->delete();

        return redirect('admin\karyawan')->with('sukses', 'Karyawan berhasil dihapus');
    }

    public function cetak()
    {
        $karyawan = Karyawan::all();
        $today = Carbon::now();

        return view('admin.karyawan.cetak', compact('karyawan', 'today'));
    }

    public function fileExport()
    {

        return Excel::download(new KaryawanExport, 'data-karyawan.xlsx');
    }
}
