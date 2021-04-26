<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tuyendung;
class tuyendungController extends Controller
{
    public function gettuyendung(){
        $data['td']=tuyendung::all();
        return view('frontend.tuyendung',$data  );
    }
    public function chitiettuyendung($id){
        $data['td']=tuyendung::all();
        $data['chitiettd']=tuyendung::where('slug',$id)->first();
        return view('frontend.chitiettuyendung',$data);
    }
}
