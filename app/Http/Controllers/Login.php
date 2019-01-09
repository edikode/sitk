<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Pengguna;
use Hash;
use Session;
use Auth;

class Login extends Controller
{
    public function showLoginForm()
    {
        return view('pegawai.login');
    }

    function masuk(Request $request){
        
        $data = Pengguna::where('email',$request->email)->first();

        if($data){
            if (Hash::check($request->password, $data->password)) {
            
                if($data->level == "pegawai"){
                    Auth::guard('pegawai')->LoginUsingId($data->id);
                    return redirect('home');

                } else if($data->level == "admin"){
                    Auth::guard('admin')->LoginUsingId($data->id);
                    return redirect('admin/home');

                } else if($data->level == "superuser"){
                    Auth::guard('superuser')->LoginUsingId($data->id);
                    return redirect('superuser/home');

                } else {
                    Session::flash('pesan_error', 'Tidak Terdaftar pada sistem, Masukkan Email dan Password dengan benar !!');
                    return redirect('login');
                }
                
            } else {
                Session::flash('pesan_error', 'Password Salah, Masukkan Email dan Password dengan benar !!');
                return redirect('login');
            }
        } else {
            Session::flash('pesan_error', 'Terjadi Kesalahan Pada Inputan !!');
            return redirect('login');
        }
        
    }

    function keluar(){
        if(Auth::guard('pegawai')->check()){
            Auth::guard('pegawai')->logout();
            return redirect('login');
        } else if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            return redirect('login');
        } else if(Auth::guard('superuser')->check()){
            Auth::guard('superuser')->logout();
            return redirect('login');
        } else {
            return redirect('login');
        }
    }
}