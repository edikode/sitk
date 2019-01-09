<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

use App\Models\Pegawai;

class PegawaiController extends Controller
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
        $data = Pegawai::all();
        
        return view('admin/pegawai/home',compact('data'));
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
        $data = new Pegawai;

        // $data->nama = $request->nama;
        // $data->unit_kerja = $request->unit_kerja;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Jabatan Berhasil dimasukkan');

        return redirect('admin/pegawai');
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
        $data = Pegawai::findorfail($id);
        return view('admin/pegawai/update', compact('data'));
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
        $data = Pegawai::findorfail($id);

        $this->validate($request, [
            'nip'    => 'required|unique:pegawai,nip,'.$data['id'],
            'email'    => 'required|unique:pegawai,email,'.$data['id'],
        ]);

        // dd($request);

        $data->nip = $request->nip;
        $data->nama = $request->nama;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = tgl_en($request->tanggal_lahir);
        $data->jenis_kelamin = $request->jenis_kelamin;        
        $data->alamat = $request->alamat;
        $data->agama = $request->agama;
        $data->gol_darah = $request->gol_darah;
        $data->telepon = $request->telepon;
        $data->email = $request->email;
        $data->status = "aktif";
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Pegawai berhasil di perbarui');

        return redirect('admin/pegawai/'.$data->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pegawai::findorfail($id);

        $data->delete();
        Session::flash('pesan_sukses', 'Data Jabatan Berhasil Dihapus');
        
        return redirect('admin/pegawai');
    }

}
