<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\tintuc;
use App\User;
use Auth;
use Carbon\Carbon;
use App\Truycap;
use App\thongso;

class tintucController extends Controller
{
    public function gettintuc(){
        $data['listdanhmuc1']= tintuc::where('id_tl',1)->orderBy('id','desc')->take(8)->get();
       
        $data['listdanhmuc2']= tintuc::where('id_tl',2)->orderBy('id','desc')->take(8)->get();
        $data['listdanhmuc3']= tintuc::where('id_tl',3)->orderBy('id','desc')->take(8)->get();
        $data['thongso'] = thongso::sum('tygia');
        $dt = Carbon::now()->toDateString();
        $ngayhomqua = Carbon::now()->subDay()->toDateString();
        $bayngay = Carbon::now()->subDay(7)->toDateString();
        $thang = Carbon::now()->month()->toDateString();
        $nam = Carbon::now()->subDay(365)->toDateString();

        $data['tchn'] = Truycap::select('dem')->where('ngay',$dt)->sum('dem');
        $data['tchq'] = Truycap::select('dem')->where('ngay',$ngayhomqua)->sum('dem');
        $data['tctuan'] = Truycap::select('dem')->whereBetween('ngay', array($bayngay, $dt))->sum('dem');
        $data['tcthang'] = Truycap::select('dem')->whereBetween('ngay', array($thang, $dt))->sum('dem');
        $data['tcnam'] = Truycap::select('dem')->whereBetween('ngay', array($nam, $dt))->sum('dem');

        return view('frontend.tintuc',$data);
    }
    public function getchitiettintuckinhdoanh(){
        $laykd = tintuc::where('id_tl',1)->orderBy('id','desc')->paginate(4);
        $thongso = thongso::sum('tygia');
        $dt = Carbon::now()->toDateString();
        $ngayhomqua = Carbon::now()->subDay()->toDateString();
        $bayngay = Carbon::now()->subDay(7)->toDateString();
        $thang = Carbon::now()->month()->toDateString();
        $nam = Carbon::now()->subDay(365)->toDateString();

        $tchn = Truycap::select('dem')->where('ngay',$dt)->sum('dem');
        $tchq = Truycap::select('dem')->where('ngay',$ngayhomqua)->sum('dem');
        $tctuan = Truycap::select('dem')->whereBetween('ngay', array($bayngay, $dt))->sum('dem');
        $tcthang = Truycap::select('dem')->whereBetween('ngay', array($thang, $dt))->sum('dem');
        $tcnam = Truycap::select('dem')->whereBetween('ngay', array($nam, $dt))->sum('dem');

        return view('frontend.chitiettintuckinhdoanh',compact('laykd','tchn','tchq','tctuan','tcthang','tcnam','thongso'));
    }
    public function getchitiettintucgiaidap(){
        $laygd = tintuc::where('id_tl',2)->orderBy('id','desc')->paginate(4);
        $thongso = thongso::sum('tygia');

        $dt = Carbon::now()->toDateString();
        $ngayhomqua = Carbon::now()->subDay()->toDateString();
        $bayngay = Carbon::now()->subDay(7)->toDateString();
        $thang = Carbon::now()->month()->toDateString();
        $nam = Carbon::now()->subDay(365)->toDateString();

        $tchn = Truycap::select('dem')->where('ngay',$dt)->sum('dem');
        $tchq = Truycap::select('dem')->where('ngay',$ngayhomqua)->sum('dem');
        $tctuan = Truycap::select('dem')->whereBetween('ngay', array($bayngay, $dt))->sum('dem');
        $tcthang = Truycap::select('dem')->whereBetween('ngay', array($thang, $dt))->sum('dem');
        $tcnam = Truycap::select('dem')->whereBetween('ngay', array($nam, $dt))->sum('dem');
        return view('frontend.chitiettintucgiaidap',compact('laygd','tchn','tchq','tctuan','tcthang','tcnam','thongso'));
    }
    public function getchitiettintuccongty(){
        $layct =tintuc::where('id_tl',3)->orderBy('id','desc')->paginate(4);
        $thongso = thongso::sum('tygia');
        $dt = Carbon::now()->toDateString();
        $ngayhomqua = Carbon::now()->subDay()->toDateString();
        $bayngay = Carbon::now()->subDay(7)->toDateString();
        $thang = Carbon::now()->month()->toDateString();
        $nam = Carbon::now()->subDay(365)->toDateString();

        $tchn = Truycap::select('dem')->where('ngay',$dt)->sum('dem');
        $tchq = Truycap::select('dem')->where('ngay',$ngayhomqua)->sum('dem');
        $tctuan = Truycap::select('dem')->whereBetween('ngay', array($bayngay, $dt))->sum('dem');
        $tcthang = Truycap::select('dem')->whereBetween('ngay', array($thang, $dt))->sum('dem');
        $tcnam = Truycap::select('dem')->whereBetween('ngay', array($nam, $dt))->sum('dem');


        return view('frontend.chitiettintuccongty',compact('layct','tchn','tchq','tctuan','tcthang','tcnam','thongso'));
    }
    public function getchitiettintuc($id){
        $data['laytin'] = tintuc::where('slug',$id)->first();
        $data['thongso'] = thongso::sum('tygia');
        $data['baiviettt'] = tintuc::where('id_tl',1)->orderBy('id','desc')->get();
        
        return view('frontend.chitiettintuc',$data);
    }
    public function getchitietgd($id){
        $data['laytingd']= tintuc::where('slug',$id)->first();
        $data['thongso'] = thongso::sum('tygia');
        $data['baiviettt'] = tintuc::where('id_tl',2)->orderBy('id','desc')->get();
        return view ('frontend.chitiettintucgd',$data);
    }
    public function getchitietct($id){
        $data['laytinct']= tintuc::where('slug',$id)->first();
        $data['thongso'] = thongso::sum('tygia');
        $data['baiviettt'] = tintuc::where('id_tl',3)->orderBy('id','desc')->get();
        return view ('frontend.chitiettintucct',$data);
}
}