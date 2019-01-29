<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

use App\Models\User;
use App\Models\Pegawai;

class PenggunaController extends Controller
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
        $pegawai = Pegawai::all();
        $data = DB::table('users')
        ->join('pegawai', 'pegawai.id', '=', 'users.pegawai_id')
        ->select('pegawai.nama as nama_pegawai','users.*')
        ->where('users.level','admin')->get();
        
        return view('admin/pengguna/home',compact('data','pegawai'));
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
        $data = User::where('pegawai_id',$request->pegawai_id)->first();

        $data->level = $request->level;
        $data->save();

        Session::flash('pesan_sukses', 'Data Pengguna Berhasil ditambahkan');

        return redirect('admin/pengguna');
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
        $data = User::findorfail($id);

        $data->level = $request->level;
        $data->save();
        Session::flash('pesan_sukses', 'Data Pengguna Berhasil diubah');

        return redirect('admin/pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

}
