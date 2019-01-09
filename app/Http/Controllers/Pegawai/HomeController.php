<?php

namespace App\Http\Controllers\Pegawai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:pegawai');
    }
    
    public function index()
    {
        return view('pegawai/dashboard');
    }
}
