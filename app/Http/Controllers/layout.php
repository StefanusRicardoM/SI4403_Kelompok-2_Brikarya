<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class layout extends Controller
{
    public function welcome(){
        return view('layout');
    }
}
