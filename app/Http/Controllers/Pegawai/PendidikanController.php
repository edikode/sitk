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
        $this->middleware('auth:pegawai');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pendidikan::where('pegawai_id',Auth::user()->pegawai_id)->first();
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
        $pegawai_id = Auth::user()->pegawai_id;
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

        $this->validate($request, [
            'file'    => 'sometimes|max:10000|mimes:doc,docx,pdf'
        ]);

        $data->nama = $request->nama;
        $data->kota = $request->kota;
        $data->tahun_lulus = tgl_en($request->tahun_lulus);
        $data->pegawai_id = $request->pegawai_id;

        if($request->hasFile('file')) {
            $data->file = $this->UploadFile($request, $request->nama);
        }
        
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

        $this->validate($request, [
            'file'    => 'sometimes|max:10000|mimes:doc,docx,pdf'
        ]);

        $data->nama = $request->nama;
        $data->kota = $request->kota;
        $data->tahun_lulus = tgl_en($request->tahun_lulus);
        $data->pegawai_id = $request->pegawai_id;
        
        if($request->hasFile('file')) {
            $data->file = $this->UploadFile($request, $request->nama);
        }
        
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

    private function UploadFile(Request $request, $link)
    {
        $file = $request->file('file');
        $ext    = $file->getClientOriginalExtension();
        // dd($request);
        
        if($request->file('file')->isValid()) {

            $nama_file = $link . ".$ext";
            $upload_path = public_path('upload/pendidikan');
            $request->file('file')->move($upload_path, $nama_file);
            
            return $nama_file;
        }
        return false;
    }

}
