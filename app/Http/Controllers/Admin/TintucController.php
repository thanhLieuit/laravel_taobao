<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\theloai;
use App\tintuc;
use DB;

class TintucController extends Controller
{
    public function gettintuc(){
        $data['listnews']= tintuc::all();
        return view('backend.listnews',$data);
    }
    public function addtintuc(){
        $data['listtl']= theloai::all();
        return view('backend.addnews',$data);
    }
    public function postaddtintuc(Request $request){
      
         if ($request->hasFile('newhinhanh')){
            // L?y tên file
            $file = $request->file('newhinhanh');
            $file_name = $file->getClientOriginalName('newhinhanh');
            // Luu file vào thu m?c upload v?i tên là bi?n $filename
            $file->move('img',$file_name);

            $news = new tintuc;
            $news->tieude = $request->newtieude;
            $news->id_tl = $request->tl;
            $news->img = $file_name =$file->getClientOriginalName('newhinhanh');
            $news->noidung= $request->noidung;
            $news->slug = $request->newslug;
            $news->save();
        }
          // dd($news);

            return redirect()->route('admin.tintuc');    
    }
    public function edittintuc($id){
        $data['listtl']= theloai::all();
        $data['edittt'] = tintuc::where('slug',$id)->first();
        return view('backend.editnews',$data);
    }
    public function postedittintuc(Request $request, $id){
        $request->validate([
            'newhinhanh'=>'image',
            'noidung'=>'required'
         ] );
        $editt  = new tintuc;
        $ass['tieude'] = $request->newtieude;
        $ass['noidung']= $request->noidung;
        $ass['id_tl']= $request->tl;
        $ass['slug'] = $request->newslug;
        $ass['noidungtt'] = $request->noidungtt;
        if ($request->hasFile('newhinhanh')) {
            $img= $request->newhinhanh->getClientOriginalName();
            $ass['img']= $img;
            $request->newhinhanh->move('public/img',$img);
        }
        $editt::where('slug',$id)->update($ass );
        return redirect('admin/tintuc');

    }
    public function deletetintuc($id){
        tintuc::destroy($id);
        return back();
    }
}
