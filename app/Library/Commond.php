<?php

namespace App\Library;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commond
{
    public function cekRiwayat($id){
        $cek = DB::table('riwayat_jabatan')->select(DB::raw('COUNT(pegawai_id) as jumlah'))->where('pegawai_id', $id)->where('status', "aktif")->first();

        return $cek;
    }

    public function ParentKategori($id){
        $parent = DB::table('kategori')->where('parent', $id)->get();

        return $parent;
    }

    public function CekData($id){
        $data = DB::table('users')->select('id')->where('pegawai_id', $id)->where('level', 'admin')->first();
        
        return $data;
    }
}
