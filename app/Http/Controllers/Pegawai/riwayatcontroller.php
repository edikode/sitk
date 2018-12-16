<?php

namespace App\Http\Controllers\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Auth;

use App\Models\Riwayat;

class riwayatcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Riwayat::where('pegawai_id',Auth::user()->id)->get();
        
        return view('pegawai/riwayat/home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai_id = Auth::user()->id;
        return view('pegawai/pendidikan/create',compact('pegawai_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Tunjangan;

        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tanggal_lahir = tgl_en($request->tanggal_lahir);
        $data->status = $request->status;
        $data->pegawai_id = Auth::user()->id;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Tunjangan Berhasil dimasukkan');

        return redirect('tunjangan');
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
        $data = Tunjangan::findorfail($id);
        return view('pegawai/tunjangan/update', compact('data'));
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
        $data = Tunjangan::findorfail($id);

        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->tanggal_lahir = tgl_en($request->tanggal_lahir);
        $data->status = $request->status;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Tunjangan berhasil di perbarui');

        return redirect('tunjangan/'.$data->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tunjangan::findorfail($id);

        $data->delete();
        Session::flash('pesan_sukses', 'Data Tunjangan Berhasil Dihapus');
        
        return redirect('tunjangan');
    }

}
