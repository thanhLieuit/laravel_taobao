<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\tuyendung;
class TuyendungController extends Controller
{
    public function gettuyendung(){
        $data['listtd']=tuyendung::all();
        return view('backend.tuyendung',$data);
    }
    public function getaddtuyendung(){
        return view ('backend.addtuyendung');
        
    }
    public function postaddtuyendung(Request $request){
        $request->validate([
            'noidung'=>'required'
         ] );
        $tuyendung = new tuyendung;
        $tuyendung -> tieude = $request->tdtieude;
        $tuyendung -> noidung = $request->tdnoidung;
        $tuyendung  -> slug = $request->tdslug;
        $tuyendung->save();
        return redirect('admin/tuyendung');  
    }
    public function getedittuyendung($id){
        $data['edittd']=tuyendung::where('slug',$id)->first();
        return view ('backend.edittuyendung',$data);
    }
    public function postedittuyendung(Request $request, $id ){
        $request->validate([
            'noidung'=>'required'
         ] );
        $editd  = new tuyendung;
        $ass['tieude'] = $request->tdtieude;
        $ass['noidung']= $request->tdnoidung;
        $ass['slug'] = $request->tdslug;
        $editd::where('slug',$id)->update($ass );
        return redirect('admin/tuyendung');
    }
    public function deletetuyendung($id){
        tuyendung::destroy($id);
        return back();
    }
}
