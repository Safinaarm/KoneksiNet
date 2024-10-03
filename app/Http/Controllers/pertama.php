<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pertama extends Controller
{
    //
    public function satu(){
        echo "tampilkan function satu";
    }
    public function dua(){
        return view('halaman');
    }
    public function tiga($id){
        echo "parameter 1". $id;
    }
}
