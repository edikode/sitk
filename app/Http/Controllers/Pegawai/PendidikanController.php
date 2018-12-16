<?php

namespace App\Http\Controllers\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Auth;

use App\Models\Pendidikan;

class PendidikanController extends Controller
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
        $data = Pendidikan::where('pegawai_id',Auth::user()->id)->first();
        if(!$data){
            return redirect('pendidikan-terakhir/create');
        }
        return view('pegawai/pendidikan/show',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai_id = Auth::user()->id;
        return view('pegawai/pendidikan/create',compact('pegawai_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pendidikan;

        $data->nama = $request->nama;
        $data->kota = $request->kota;
        $data->tahun_lulus = tgl_en($request->tahun_lulus);
        $data->pegawai_id = $request->pegawai_id;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Pendidikan Berhasil dimasukkan');

        return redirect('pendidikan-terakhir');
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
        $data = Pendidikan::findorfail($id);
        return view('pegawai/pendidikan/update', compact('data'));
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
        $data = Pendidikan::findorfail($id);

        $data->nama = $request->nama;
        $data->kota = $request->kota;
        $data->tahun_lulus = tgl_en($request->tahun_lulus);
        $data->pegawai_id = $request->pegawai_id;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Pendidikan berhasil di perbarui');

        return redirect('pendidikan-terakhir/'.$data->id.'/edit');
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
