<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Karyawan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    public function index()
    {
        // Get users grouped by age
        $groups = DB::table('karyawans')
            ->select('usia', DB::raw('count(*) as total'))
            ->groupBy('usia')
            ->pluck('total', 'usia')->all();
        // Generate random colours for the groups
        for ($i = 0; $i <= count($groups); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        // Prepare the data for returning with the view
        $chart = new Karyawan;
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;
        //
        $data = Karyawan::all();
        return view('admin.karyawan.index', compact('data', 'chart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Karyawan::all();
        return view('admin.karyawan.create', compact('data'));
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
            'jabatan'                   => 'required',
            'nik'                       => 'required',
            'tempat_lahir'              => 'required',
            'tanggal_lahir'             => 'required',
            'nik_ktp'                   => 'required',
            'no_bpjs_kesehatan'         => 'required',
            'no_bpjs_ketenagakerjaan'   => 'required',
            'no_npwp'                   => 'required',
            'status_keluarga'           => 'required',
            'pendidikan'                => 'required',
            'sk'                        => 'required',
            'tanggal_masuk_kerja'       => 'required',
            'tanggal_pilih_jabatan'     => 'required',
        ], [
            'nama_karyawan.required'             => 'nama karyawan harus diisi',
            'jabatan.required'                   => 'jabatan harus diisi',
            'nik.required'                       => 'NIK harus diisi',
            'tempat_lahir.required'              => 'tempat lahir harus diisi',
            'tanggal_lahir.required'             => 'tanggal lahir harus diisi',
            'nik_ktp.required'                   => 'NIK KTP harus diisi',
            'no_bpjs_kesehatan.required'         => 'nomor BPJS harus diisi',
            'no_bpjs_ketenagakerjaan.required'   => 'nomor BPJS harus diisi',
            'no_npwp.required'                   => 'nomor NPWP harus diisi',
            'status_keluarga.required'           => 'status keluarga harus diisi',
            'pendidikan.required'                => 'pendidikan harus diisi',
            'sk.required'                        => 'SK harus diisi',
            'tanggal_masuk_kerja.required'       => 'tanggal masuk kerja harus diisi',
            'tanggal_pilih_jabatan.required'     => 'tanggal dipilih jabatan harus diisi',
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
            'jabatan'                   => $request->jabatan,
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
            'sk'                        => $request->sk,
            'tanggal_masuk_kerja'       => $tanggal_masuk_kerja,
            'tanggal_pilih_jabatan'     => $tanggal_pilih_jabatan,
            'masa_kerja'                => $masa_kerja,
            'masa_jabatan'              => $masa_jabatan,

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
        //
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit', compact('karyawan', 'id'));
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
            'jabatan'                   => 'required',
            'nik'                       => 'required',
            'tempat_lahir'              => 'required',
            'tanggal_lahir'             => 'required',
            'nik_ktp'                   => 'required',
            'no_bpjs_kesehatan'         => 'required',
            'no_bpjs_ketenagakerjaan'   => 'required',
            'no_npwp'                   => 'required',
            'status_keluarga'           => 'required',
            'pendidikan'                => 'required',
            'sk'                        => 'required',
            'tanggal_masuk_kerja'       => 'required',
            'tanggal_pilih_jabatan'     => 'required',
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
        $karyawan->jabatan                  = $request->get('jabatan');
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
        $karyawan->sk                       = $request->get('sk');
        $karyawan->tanggal_masuk_kerja      = $tanggal_masuk_kerja;
        $karyawan->tanggal_pilih_jabatan    = $tanggal_pilih_jabatan;
        $karyawan->masa_kerja               = $masa_kerja;
        $karyawan->masa_jabatan             = $masa_jabatan;

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
}
