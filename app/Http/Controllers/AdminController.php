<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except'=>['index']]); //nieko nerodys neprisijungusiam vartotojui, isskyrus index
    }
    public function index(){
        return view('pages.home');
    }
    
    public function admin(){
        return view('pages.admin');
    }

    public function withdraw(){
        return view('pages.withdraw');
    }


}
