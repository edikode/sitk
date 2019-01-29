<?php

namespace App\Http\Controllers\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Riwayat;
use App\Models\LokasiKerja;
use App\Models\Jabatan;

class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pegawai');
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
        // $data = Riwayat::where('pegawai_id',Auth::user()->id)->get();
        $data = DB::table('riwayat_jabatan')
        ->join('lokasi_kerja', 'riwayat_jabatan.lokasi_kerja_id', '=', 'lokasi_kerja.id')
        ->join('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
        ->select('riwayat_jabatan.id','riwayat_jabatan.file','riwayat_jabatan.pegawai_id','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_sk','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_mulai','riwayat_jabatan.tanggal_selesai','riwayat_jabatan.status','riwayat_jabatan.satuan_kerja','jabatan.nama as jabatan','lokasi_kerja.nama as lokasi')
        ->orderby('riwayat_jabatan.id','DESC')
        ->where('riwayat_jabatan.pegawai_id',Auth::user()->pegawai_id)->get();
        
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

        $this->validate($request, [
            'nomor_sk'    => 'required|unique:riwayat_jabatan,nomor_sk,'.$data['id'],
            'file'    => 'sometimes|max:10000|mimes:doc,docx,pdf'
        ]);

        $data->nomor_sk = $request->nomor_sk;
        $data->tanggal_sk = tgl_en($request->tanggal_sk);
        $data->tanggal_mulai = tgl_en($request->tanggal_mulai);
        $data->tanggal_selesai = tgl_en($request->tanggal_selesai);
        $data->satuan_kerja = $request->satuan_kerja;
        $data->unit_kerja = $request->unit_kerja;
        $data->status = "aktif";
        $data->pegawai_id = $request->pegawai_id;
        $data->lokasi_kerja_id = $request->lokasi;
        $data->jabatan_id = $request->jabatan;
        $data->pegawai_id = Auth::user()->pegawai_id;

        if($request->hasFile('file')) {
            $data->file = $this->UploadFile($request, $request->nomor_sk);
        }
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Riwayat Jabatan Berhasil dimasukkan');

        return redirect('riwayat-kerja');
    }

    private function UploadFile(Request $request, $link)
    {
        $file = $request->file('file');
        $ext    = $file->getClientOriginalExtension();
        // dd($request);
        
        if($request->file('file')->isValid()) {

            $nama_file = $link . ".$ext";
            $upload_path = public_path('upload/riwayat');
            $request->file('file')->move($upload_path, $nama_file);
            
            return $nama_file;
        }
        return false;
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
        return view('pegawai/riwayat/update', compact('data','jabatan','lokasi'));
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
        $data->pegawai_id = $request->pegawai_id;
        $data->lokasi_kerja_id = $request->lokasi;
        $data->jabatan_id = $request->jabatan;
        $data->pegawai_id = Auth::user()->pegawai_id;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Riwayat Kerja berhasil di perbarui');

        return redirect('riwayat-kerja/'.$data->id.'/edit');
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
        
        return redirect('riwayat-kerja');
    }

}
