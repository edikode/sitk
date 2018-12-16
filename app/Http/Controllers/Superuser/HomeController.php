<?php

namespace App\Http\Controllers\Superuser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:superuser');
    }
    
    public function index()
    {
        return view('superuser/dashboard');
    }
}
