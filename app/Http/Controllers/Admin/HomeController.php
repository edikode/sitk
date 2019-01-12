<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $pegawai = DB::table('pegawai')
        ->join('users', 'pegawai.id', '=', 'users.pegawai_id')
        ->select('pegawai.*')
        ->where('users.status',0)->get();

        return view('admin/dashboard',compact('pegawai'));
    }

    public function konfirmasi($id)
    {
        $pegawai = User::where('pegawai_id',$id)->first();
        $pegawai->status = 1;
        $pegawai->save();

        return redirect('admin/home');
    }
}