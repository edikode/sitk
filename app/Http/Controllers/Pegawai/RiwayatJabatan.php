<?php

namespace App\Http\Controllers\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Auth;

use App\Models\Riwayat;
use App\Models\LokasiKerja;
use App\Models\Jabatan;

class RiwayatJabatan extends Controller
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
        $jabatan = Jabatan::all();
        $lokasi = LokasiKerja::all();
        $data = Riwayat::where('pegawai_id',Auth::user()->id)->get();
        
        return view('pegawai/riwayat/home',compact('data','jabatan','lokasi'));
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
        $data = new Riwayat;

        $data->nomor_sk = $request->nomor_sk;
        $data->tanggal_sk = tgl_en($request->tanggal_sk);
        $data->tanggal_mulai = tgl_en($request->tanggal_mulai);
        $data->tanggal_selesai = tgl_en($request->tanggal_selesai);
        $data->satuan_kerja = $request->satuan_kerja;
        $data->unit_kerja = $request->unit_kerja;
        $data->pegawai_id = $request->pegawai_id;
        $data->lokasi_kerja_id = $request->lokasi_kerja_id;
        $data->jabatan_id = $request->jabatan_id;
        $data->pegawai_id = Auth::user()->id;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Riwayat Jabatan Berhasil dimasukkan');

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
        $data = Riwayat::findorfail($id);
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
        $data = Riwayat::findorfail($id);

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
        $data = Riwayat::findorfail($id);

        $data->delete();
        Session::flash('pesan_sukses', 'Data Tunjangan Berhasil Dihapus');
        
        return redirect('tunjangan');
    }

}
