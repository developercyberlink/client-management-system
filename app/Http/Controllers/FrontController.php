<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index(){
        return view('admin.index');
    }
}
