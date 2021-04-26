<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bieuphiha;

class bieuphiController extends Controller
{
    public function editbieuphi(){
        $data['bieuphi']=bieuphiha::all();
        return view('backend.edithabieuphi',$data);
        
    }
    public function posteditbieuphi(Request $request,$id){
        $request->validate([
            'fileTest'=>'image'
         ] );
        $bieuphi = bieuphiha::find($id);
        $arr['tieude'] = $request->tieude;
        $arr['slug'] = $request->slug;
        if ($request->hasFile('fileTest')) {
            $img= $request->fileTest->getClientOriginalName();
            $arr['img']= $img;
            $request->fileTest->move('up',$img);
        }
        $bieuphi::where('id',$id)->update($arr );
        return redirect('admin');
    }
}
