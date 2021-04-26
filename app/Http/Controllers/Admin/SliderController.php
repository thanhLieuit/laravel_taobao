<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\slide;
use File,Input;

class SliderController extends Controller
{
    public function getslider(){
        $data['listslider']= slide::all();
        return view('backend.slider',$data);
    }
    
    public function getaddslider(){
        return view('backend.addslider');
    }
    public function postaddslider(Request $request){
        $request->validate([
           'fileTest'=>'image'
        ] );
        if ($request->hasFile('fileTest')) {
        $slider = new slide;
        $slider -> tieude = $request->sltieude;
        $file = $request->file('fileTest');
        $file_name = $file->getClientOriginalName('fileTest');
        $file->move('up',$file_name);
        $slider ->img = $file_name;
        $slider -> slug = $request->slslug;
        $slider->save();
        return redirect('admin/Slider');  
        }else{
            return redirect('admin/Slider');  
        }


    }
    public function geteditslider($id){
        $data['edits'] = slide::find($id); 
       return view('backend.editslider',$data);
    }
    public function posteditslider(Request $request, $id){
        $request->validate([
            'fileTest'=>'image'
         ] );
        $slider = slide::find($id);
        $arr['tieude'] = $request->sltieude;
        $arr['slug'] = $request->slslug;
        if ($request->hasFile('fileTest')) {
            $img= $request->fileTest->getClientOriginalName();
            $arr['img']= $img;
            $request->fileTest->move('up',$img);
        }
        $slider::where('id',$id)->update($arr );
        return redirect('admin/Slider');
    }
    public function getdeletetslider($id){
        slide::destroy($id);
        return back();
    }
}
