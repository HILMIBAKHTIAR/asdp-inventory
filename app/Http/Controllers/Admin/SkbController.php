<?php

namespace App\Http\Controllers\Admin;

use App\Barang;
use App\Http\Controllers\Controller;
use App\Karyawan;
use App\Skb;
use App\Sppbj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skb = Skb::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        $sp2bj = Sppbj::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->first();
        return view('admin.skb.cetak', compact('skb', 'sp2bj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('admin.skb.input', compact('karyawan'));
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
            'alamat_tujuan' => 'required',
            'no_telp' => 'required|max:12'

        ]);

        $data_skb = Skb::create([
            'user_id' => auth()->user()->id,
            'alamat_tujuan' => $request->alamat_tujuan,
            'no_telp' => $request->no_telp,
            'ttd1' => $request->ttd1,
            'ttd2' => $request->ttd2
        ]);

        // return dd($data_skb);

        $data_skb->save();
        return redirect('admin/skb/');
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
