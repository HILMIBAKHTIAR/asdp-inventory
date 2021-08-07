<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin;
use App\barang;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $sp2bj = DB::table('admins')->orderBy('id', 'DESC')->first();

        $sp2bj= admin::orderBy('id','DESC')->first();
        return view('admin.sp2bj.cetak', compact('sp2bj'));
    }


    // public function viewPrint(){

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sp2bj.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request->all());
        $request->validate([
            'dari' => 'required',
            'mata_anggaran' => 'required',
            'nama_pengadaan' => 'required',
            'tanggal_dibutuhkan' => 'required',
        ]);

        $data_sp2bj = admin::create([
            'dari' => $request->get('dari'),
            'mata_anggaran' => $request->get('mata_anggaran'),
            'nama_pengadaan' => $request->get('nama_pengadaan'),
            'tanggal_dibutuhkan' => $request->get('tanggal_dibutuhkan'),
        ]);

        // return dd($data_sp2bj);

        for($i=0;$i<count($request->jumlah);$i++){
            barang::create([
                'admin_id'=>$data_sp2bj->id,
                'jumlah'=> $request->jumlah[$i],
                'satuan'=> $request->satuan[$i],
                'nama_barang'=> $request->nama_barang[$i],
                'spesifikasi'=> $request->spesifikasi[$i],
                'harga_satuan'=> $request->harga_satuan[$i]
            ]);
        }

        $data_sp2bj->save();
        return redirect('admin/sp2bj/');
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
