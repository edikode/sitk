<?php

namespace App\Http\Controllers\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pegawai');
    }
    
    public function index()
    {
        $data = DB::table('riwayat_jabatan')
        ->join('lokasi_kerja', 'riwayat_jabatan.lokasi_kerja_id', '=', 'lokasi_kerja.id')
        ->join('jabatan', 'riwayat_jabatan.jabatan_id', '=', 'jabatan.id')
        ->select('riwayat_jabatan.id','riwayat_jabatan.file','riwayat_jabatan.pegawai_id','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_sk','riwayat_jabatan.nomor_sk','riwayat_jabatan.tanggal_mulai','riwayat_jabatan.tanggal_selesai','riwayat_jabatan.status','riwayat_jabatan.satuan_kerja','jabatan.nama as jabatan','lokasi_kerja.nama as lokasi')
        ->orderby('riwayat_jabatan.id','DESC')
        ->where('riwayat_jabatan.pegawai_id',Auth::user()->pegawai_id)->first();
        
        return view('pegawai/dashboard', compact('data'));
    }
}
