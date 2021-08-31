<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Karyawan;
use Carbon\Carbon;

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
        //
        $data = Karyawan::all();
        return view('admin.karyawan.index', compact('data'));
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
        ]);
        $usia = Karyawan::where('tanggal_lahir', Carbon::parse()->diff(\Carbon\Carbon::now()))->get();
            
        $data_karyawan = Karyawan::create([
                'nama_karyawan'             => $request->nama_karyawan,
                'jabatan'                   => $request->jabatan,
                'nik'                       => $request->nik,
                'tempat_lahir'              => $request->tempat_lahir,
                'tanggal_lahir'             => $request->tanggal_lahir,
                'usia'                      => $usia,
                'nik_ktp'                   => $request->nik_ktp,
                'no_bpjs_kesehatan'         => $request->no_bpjs_kesehatan,
                'no_bpjs_ketenagakerjaan'   => $request->no_bpjs_ketenagakerjaan,
                'no_npwp'                   => $request->no_npwp,
                'status_keluarga'           => $request->status_keluarga,
                'pendidikan'                => $request->pendidikan,
                'sk'                        => $request->sk,

            ]);
        

        // $data_karyawan->save();
        // return redirect('admin\karyawan')->with('sukses', 'Karyawan berhasil ditambahkan');

        return dd($data_karyawan);
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
        $karyawan = Karyawan::find($id);
        return view('admin.karyawan.edit', compact('karyawan'));
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
            'nama_karyawan'       => 'required',
            'jabatan'             => 'required',
            'nik'                 => 'required',
        ]);

        $karyawan = Karyawan::find($id);

        $karyawan->nama_karyawan    = $request->get('nama_karyawan');
        $karyawan->jabatan          = $request->get('jabatan');
        $karyawan->nik              = $request->get('nik');

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
