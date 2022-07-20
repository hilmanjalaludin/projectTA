<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AboutController extends Controller
{

    public function ttkm()
    {
       
        return view('about.ttkm');
    }
    
    public function ktt()
    {
       
        return view('about.ktt');
    }



}
