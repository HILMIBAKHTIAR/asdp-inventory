<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'nama_karyawan'       => 'required',
            'jabatan'             => 'required',
            'nik'                 => 'required',
        ]);


        for ($i = 0; $i < count($request->nama_karyawan); $i++) {
            $data_karyawan = Karyawan::create([
                'nama_karyawan' => $request->nama_karyawan[$i],
                'jabatan'       => $request->jabatan[$i],
                'nik'           => $request->nik[$i],
            ]);
        }

        $data_karyawan->save();
        return redirect('admin\karyawan');
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
        return redirect('admin\karyawan');
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

        return redirect('admin\karyawan');
    }
}
