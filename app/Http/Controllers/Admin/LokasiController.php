<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

use App\Models\Lokasi;

class LokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lokasi::all();
        
        return view('admin/lokasi/home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Lokasi;

        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Lokasi Kerja Berhasil dimasukkan');

        return redirect('admin/lokasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Lokasi::findorfail($id);
        return view('admin/lokasi/update', compact('data'));
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
        $data = Lokasi::findorfail($id);

        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Lokasi Kerja berhasil di perbarui');

        return redirect('admin/lokasi/'.$data->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Lokasi::findorfail($id);

        $data->delete();
        Session::flash('pesan_sukses', 'Data Lokasi Kerja Berhasil Dihapus');
        
        return redirect('admin/lokasi');
    }

}
