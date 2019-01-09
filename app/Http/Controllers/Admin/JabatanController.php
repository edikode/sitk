<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;

use App\Models\Jabatan;

class JabatanController extends Controller
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
        $data = Jabatan::all();
        
        return view('admin/jabatan/home',compact('data'));
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
        $data = new Jabatan;

        $data->nama = $request->nama;
        $data->unit_kerja = $request->unit_kerja;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Jabatan Berhasil dimasukkan');

        return redirect('admin/jabatan');
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
        $data = Jabatan::findorfail($id);
        return view('admin/jabatan/update', compact('data'));
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
        $data = Jabatan::findorfail($id);

        $data->nama = $request->nama;
        $data->unit_kerja = $request->unit_kerja;
        
        $data->save();

        Session::flash('pesan_sukses', 'Data Jabatan berhasil di perbarui');

        return redirect('admin/jabatan/'.$data->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Jabatan::findorfail($id);

        $data->delete();
        Session::flash('pesan_sukses', 'Data Jabatan Berhasil Dihapus');
        
        return redirect('admin/jabatan');
    }

}
