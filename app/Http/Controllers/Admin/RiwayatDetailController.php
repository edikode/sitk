<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Pegawai;
use App\Models\Riwayat;
use App\Models\LokasiKerja;
use App\Models\Jabatan;

class RiwayatDetailController extends Controller
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::findorfail($id);
        $jabatan = Jabatan::all();
        $lokasi = LokasiKerja::all();
        // $data = Riwayat::where('pegawai_id',Auth::user()->id)->get();
        $data = DB::table('riwayat_jabatan')
        ->join('lokasi_kerja', 'riwayat_jabatan.lokasi_kerja_id', '=', 'lokasi_kerja.id')
        ->join('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
        ->select('riwayat_jabatan.id','riwayat_jabatan.pegawai_id','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_sk','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_mulai','riwayat_jabatan.tanggal_selesai','riwayat_jabatan.status','riwayat_jabatan.satuan_kerja','jabatan.nama as jabatan','lokasi_kerja.nama as lokasi')
        ->orderby('riwayat_jabatan.id','DESC')
        ->where('riwayat_jabatan.pegawai_id',$id)->get();
        
        return view('admin/riwayatdetail/home',compact('data','jabatan','lokasi','pegawai'));
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
        $jabatan = Jabatan::all();
        $lokasi = LokasiKerja::all();
        return view('admin/riwayatdetail/update', compact('data','jabatan','lokasi'));
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

        $data->nomor_sk = $request->nomor_sk;
        $data->tanggal_sk = tgl_en($request->tanggal_sk);
        $data->tanggal_mulai = tgl_en($request->tanggal_mulai);
        $data->tanggal_selesai = tgl_en($request->tanggal_selesai);
        $data->satuan_kerja = $request->satuan_kerja;
        $data->unit_kerja = $request->unit_kerja;
        $data->status = $request->status;
        $data->lokasi_kerja_id = $request->lokasi;
        $data->jabatan_id = $request->jabatan;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Riwayat Kerja berhasil di perbarui');

        return redirect('admin/riwayat-kerja/pegawai/'.$data->id.'/edit');
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
        Session::flash('pesan_sukses', 'Data Riwayat Kerja Berhasil Dihapus');
        
        return redirect('admin/riwayat-kerja/pegawai/'.$data->pegawai_id);
    }

}
