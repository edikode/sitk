<?php

namespace App\Http\Controllers\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Image;

use App\Models\Pegawai;
use App\Models\User;

class DaftarController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai/daftar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = new Pegawai;

        $this->validate($request, [
            'nip'    => 'required|unique:pegawai,nip,'.$pegawai['id'],
            'email'    => 'required|unique:pegawai,email,'.$pegawai['nip'],
            'password'  => 'required|min:6|same:konfirmasipassword',
        ]);

        // dd($request);

        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->tanggal_lahir = tgl_en($request->tanggal_lahir);
        $pegawai->jenis_kelamin = $request->jenis_kelamin;        
        $pegawai->alamat = $request->alamat;
        $pegawai->agama = $request->agama;
        $pegawai->gol_darah = $request->gol_darah;
        $pegawai->telepon = $request->telepon;
        $pegawai->email = $request->email;
        $pegawai->status = "aktif";

        if($request->hasFile('gambar')) {
            $pegawai->gambar = $this->UploadGambar($request, $pegawai->nama);
        }

        // dd($request);
        if($pegawai->save()){
            $user = new User;
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->level = "pegawai";
            $user->status = true;
            $user->password = bcrypt($request->password);
            $user->remember_token = str_random(100);

            $user->save();

            Session::flash('pesan_sukses', 'Data Pegawai berhasil di tambah, Login untuk melengkapi');
        } else {
            dd("error");
        }

        return redirect('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paket = PaketModel::findorfail($id);
        return view('admin/paket/show', compact('paket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = KategoriModel::where('parent',0)->get();
        $paket = PaketModel::findorfail($id);
        return view('admin/paket/edit', compact('paket','kategori'));
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
        $paket = PaketModel::findorfail($id);

        $this->validate($request, [
            'nama'      => 'required',
            'harga'      => 'numeric',
            'link'      => 'unique:paket,link,'.$paket['id'],
            'gambar'    => 'sometimes|image|max:1000|mimes:jpeg,jpg,bmp,png'
        ]);

        $paket->nama = $request->nama;
        $paket->link = Str::slug($request->link);
        $paket->deskripsi = $request->deskripsi;
        $paket->harga = $request->harga;
        $paket->teks = $request->teks;
        $paket->kategori_id = $request->kategori_id;
        $paket->tampil = $request->tampil;
        if($request->hasFile('gambar')) {
            $paket->gambar = $this->UploadGambar($request, $paket->link);
        }

        $paket->save();

        Session::flash('pesan_sukses', 'Data Paket berhasil di perbarui');

        return redirect('admin/paket/'.$paket->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = PaketModel::findorfail($id);

        if($paket->gambar != ""){
            if(file_exists(public_path('upload/paket/kecil/').$paket->gambar)) {
                echo "string";
                unlink(public_path('upload/paket/kecil/').$paket->gambar);
            }
            if(file_exists(public_path('upload/paket/sedang/').$paket->gambar)) {
                unlink(public_path('upload/paket/sedang/').$paket->gambar);
            }
        }

        $paket->delete();
        Session::flash('pesan_sukses', 'Data '. $paket->nama .' Berhasil Dihapus');
        
        return redirect('admin/paket');
    }

    public function hapusgambar($id)
    {
        $paket = PaketModel::findorfail($id);

        if(file_exists(public_path('upload/paket/kecil/').$paket->gambar)) {
            unlink(public_path('upload/paket/kecil/').$paket->gambar);
        }

        if(file_exists(public_path('upload/paket/sedang/').$paket->gambar)) {
            unlink(public_path('upload/paket/sedang/').$paket->gambar);
        }

        $paket->gambar = "";
        Session::flash('pesan_sukses', 'Gambar berhasil di hapus');
        $paket->save();

        return redirect('admin/paket/' . $paket->id.'/edit');
    }

    private function UploadGambar(Request $request, $link)
    {
        $gambar = $request->file('gambar');
        $ext    = $gambar->getClientOriginalExtension();

        if($request->file('gambar')->isValid()) {

            $gambar_nama = $link . ".$ext";
            $upload_path = "upload/paket/kecil";
            $upload_path2 = "upload/paket/sedang";
            $request->file('gambar')->move($upload_path, $gambar_nama);
            
            copy($upload_path. "/" .$gambar_nama, $upload_path2. "/" .$gambar_nama);

            $imgkecil = Image::make($upload_path. "/" .$gambar_nama);
            $imgkecil->fit(400, 300);
            $imgkecil->save();

            $imgsedang = Image::make($upload_path2. "/" .$gambar_nama);
            $imgsedang->fit(700, 400);
            $imgsedang->save();

            return $gambar_nama;
        }
        return false;
    }
    
    public function cari(Request $request)
    {
        $filter = $request->filter;
        $keyword = $request->keyword;

        if($filter == ""){
            
            $paket =  PaketModel::paginate(10);
        } else {

            if($filter == "nama"){
                $paket =  PaketModel::where('nama', 'LIKE', '%' . $keyword . '%')
                                ->paginate(10);
            } elseif($filter == "alamat") {
                $paket =  PaketModel::where('alamat', 'LIKE', '%' . $keyword . '%')
                                ->paginate(10);
            }
        }

        return view('admin/paket/home', compact('paket','filter','keyword'));
    }

}
