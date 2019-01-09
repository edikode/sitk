<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Auth;
use PDF;
use Illuminate\Support\Facades\DB;

use App\Models\Riwayat;
use App\Models\LokasiKerja;
use App\Models\Jabatan;

class RiwayatController extends Controller
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
        $bulan = date('m');
        $tahun = date('Y');
        $jabatan = Jabatan::all();
        $lokasi = LokasiKerja::all();
        // $data = Riwayat::where('pegawai_id',Auth::user()->id)->get();
        $data = DB::table('riwayat_jabatan')
        ->join('lokasi_kerja', 'riwayat_jabatan.lokasi_kerja_id', '=', 'lokasi_kerja.id')
        ->join('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
        ->join('pegawai', 'riwayat_jabatan.pegawai_id', '=', 'pegawai.id')
        ->select('riwayat_jabatan.id','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_sk','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_mulai','riwayat_jabatan.tanggal_selesai','riwayat_jabatan.status','riwayat_jabatan.satuan_kerja','jabatan.nama as nama_jabatan','lokasi_kerja.nama as nama_lokasi','pegawai.nip as nip','pegawai.nama as nama_pegawai')
        ->orderby('riwayat_jabatan.id','DESC')
        // ->where('riwayat_jabatan.pegawai_id',Auth::user()->id)
        ->get();

        return view('admin/riwayat/home',compact('data','jabatan','lokasi','bulan','tahun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pencarian(Request $request)
    {
        $bulan     = $request->bulan ? $request->bulan : date('m');
        $tahun     = $request->tahun ? $request->tahun : date('Y');
        $jabatan = Jabatan::all();
        $lokasi = LokasiKerja::all();

        if($bulan == "semua"){
            $data = DB::table('riwayat_jabatan')
                    ->join('lokasi_kerja', 'riwayat_jabatan.lokasi_kerja_id', '=', 'lokasi_kerja.id')
                    ->join('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
                    ->join('pegawai', 'riwayat_jabatan.pegawai_id', '=', 'pegawai.id')
                    ->select('riwayat_jabatan.id','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_sk','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_mulai','riwayat_jabatan.tanggal_selesai','riwayat_jabatan.status','riwayat_jabatan.satuan_kerja','jabatan.nama as nama_jabatan','lokasi_kerja.nama as nama_lokasi','pegawai.nip as nip','pegawai.nama as nama_pegawai')
                    ->orderby('riwayat_jabatan.id','DESC')
                    ->whereYear('riwayat_jabatan.created_at',$tahun)->get();
        } else {
            $data = DB::table('riwayat_jabatan')
                    ->join('lokasi_kerja', 'riwayat_jabatan.lokasi_kerja_id', '=', 'lokasi_kerja.id')
                    ->join('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
                    ->join('pegawai', 'riwayat_jabatan.pegawai_id', '=', 'pegawai.id')
                    ->select('riwayat_jabatan.id','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_sk','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_mulai','riwayat_jabatan.tanggal_selesai','riwayat_jabatan.status','riwayat_jabatan.satuan_kerja','jabatan.nama as nama_jabatan','lokasi_kerja.nama as nama_lokasi','pegawai.nip as nip','pegawai.nama as nama_pegawai')
                    ->orderby('riwayat_jabatan.id','DESC')
                    ->whereMonth('riwayat_jabatan.created_at',$bulan)->whereYear('riwayat_jabatan.created_at',$tahun)->get();
        }
        return view('admin/riwayat/home',compact('data','jabatan','lokasi','bulan','tahun'));
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
        $data->status = "aktif";
        $data->lokasi_kerja_id = $request->lokasi;
        $data->jabatan_id = $request->jabatan;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Riwayat Jabatan Berhasil dimasukkan');

        return redirect('admin/riwayat-kerja');
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
        $jabatan = Jabatan::all();
        $lokasi = LokasiKerja::all();
        return view('admin/riwayat/update', compact('data','jabatan','lokasi'));
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

        return redirect('admin/riwayat-kerja/'.$data->id.'/edit');
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
        
        return redirect('admin/riwayat-kerja');
    }

    public function cetak($bulan,$tahun)
    {
        if($bulan == "semua"){
            $data = DB::table('riwayat_jabatan')
                    ->join('lokasi_kerja', 'riwayat_jabatan.lokasi_kerja_id', '=', 'lokasi_kerja.id')
                    ->join('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
                    ->join('pegawai', 'riwayat_jabatan.pegawai_id', '=', 'pegawai.id')
                    ->select('riwayat_jabatan.id','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_sk','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_mulai','riwayat_jabatan.tanggal_selesai','riwayat_jabatan.status','riwayat_jabatan.satuan_kerja','jabatan.nama as nama_jabatan','lokasi_kerja.nama as nama_lokasi','pegawai.nip as nip','pegawai.nama as nama_pegawai')
                    ->orderby('riwayat_jabatan.id','DESC')
                    ->whereYear('riwayat_jabatan.created_at',$tahun)->get();
        } else {
            $data = DB::table('riwayat_jabatan')
                    ->join('lokasi_kerja', 'riwayat_jabatan.lokasi_kerja_id', '=', 'lokasi_kerja.id')
                    ->join('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
                    ->join('pegawai', 'riwayat_jabatan.pegawai_id', '=', 'pegawai.id')
                    ->select('riwayat_jabatan.id','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_sk','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_mulai','riwayat_jabatan.tanggal_selesai','riwayat_jabatan.status','riwayat_jabatan.satuan_kerja','jabatan.nama as nama_jabatan','lokasi_kerja.nama as nama_lokasi','pegawai.nip as nip','pegawai.nama as nama_pegawai')
                    ->orderby('riwayat_jabatan.id','DESC')
                    ->whereMonth('riwayat_jabatan.created_at',$bulan)->whereYear('riwayat_jabatan.created_at',$tahun)->get();
        }
        
        $customPaper = array(0,0,609.4488,935.433);

        $pdf = PDF::loadView('pdf/riwayat-jabatan',compact('data','bulan','tahun'))
                    ->setPaper($customPaper,'landscape');

        return $pdf->stream("Riwayat Jabatan ".date("d-m-Y").".pdf", array("Attachment"=>0));
    }

}
