<?php

namespace App\Library;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commond
{
    public function DataSetting($id){
        $setting = DB::table('setting_web')->where('id', $id)->first();

        return $setting;
    }

    public function ParentKategori($id){
        $parent = DB::table('kategori')->where('parent', $id)->get();

        return $parent;
    }
}
