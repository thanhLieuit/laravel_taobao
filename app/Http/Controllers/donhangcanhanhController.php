<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\chitietdonhang;
use App\User;
use App\donhang;
use App\chitietusers;
use App\phivanchuyen;
use App\khoiluong;
use App\Paymethod;
use App\naptien;
use DateTime;
use DB;
use App\luulink;
use App\khieunai;
use App\congtien;
use App\thongso;

class donhangcanhanhController extends Controller
{
    public function gettatcadonhang(){
    	$donhang1 = DB::table('donhangs')->select('donhangs.id','donhangs.madonhang','donhangs.created_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc', DB::raw("count('chitietdonhangs.id') as soluong"),
        DB::raw('sum(donhangs.coc) as dathanhtoan'), 
        DB::raw('sum(chitietdonhangs.price) as sum'))
        ->join('users','donhangs.user_id','=','users.id')
        ->join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')
        ->where('user_id',Auth::user()->id)
        ->where('donhangs.status','chờ xác nhận')
        ->orwhere('donhangs.status','Còn hàng')
        ->groupBy('donhangs.id','donhangs.madonhang','donhangs.created_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc')
        ->get(); 
        $donhang3 = DB::table('donhangs')->select('donhangs.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc', DB::raw("count('chitietdonhangs.id') as soluong"),
        DB::raw('sum(donhangs.coc) as dathanhtoan'), 
        DB::raw('sum(chitietdonhangs.price) as sum'))
        ->join('users','donhangs.user_id','=','users.id')
        ->join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')
        ->where('user_id',Auth::user()->id)
        ->where('donhangs.status','chờ mua hàng')
        ->groupBy('donhangs.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc')
        ->get();
   
        $donhang4 = DB::table('donhangs')->select('donhangs.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc', DB::raw("count('chitietdonhangs.id') as soluong"),
        DB::raw('sum(donhangs.coc) as dathanhtoan'), 
        DB::raw('sum(chitietdonhangs.price) as sum'))
        ->join('users','donhangs.user_id','=','users.id')
        ->join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')
        ->where('user_id',Auth::user()->id)
        ->where('donhangs.status','Đang vận chuyển')
        ->groupBy('donhangs.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc')
        ->get();

        $donhang5 = DB::table('donhangs')->select('donhangs.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc', DB::raw("count('chitietdonhangs.id') as soluong"),
        DB::raw('sum(donhangs.coc) as dathanhtoan'), 
        DB::raw('sum(chitietdonhangs.price) as sum'))
        ->join('users','donhangs.user_id','=','users.id')
        ->join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')
        ->where('user_id',Auth::user()->id)
        ->where('donhangs.status','kết thúc đơn')
        ->groupBy('donhangs.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc')
        ->get();
       // dd($donhang5);
        $donhang6 = DB::table('donhangs')->select('donhangs.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc', DB::raw("count('chitietdonhangs.id') as soluong"),
        DB::raw('sum(donhangs.coc) as dathanhtoan'), 
        DB::raw('sum(chitietdonhangs.price) as sum'))
        ->join('users','donhangs.user_id','=','users.id')
        ->join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')
        ->where('user_id',Auth::user()->id)
        ->where('donhangs.status','hủy đơn hàng')
        ->orwhere('donhangs.status','đã hết hàng')
        ->groupBy('donhangs.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc')
        ->get();

        $donhang7 = DB::table('donhangs')->select('donhangs.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc', DB::raw("count('chitietdonhangs.id') as soluong"),
        DB::raw('sum(donhangs.coc) as dathanhtoan'), 
        DB::raw('sum(chitietdonhangs.price) as sum'))
        ->join('users','donhangs.user_id','=','users.id')
        ->join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')
        ->where('user_id',Auth::user()->id)
        ->where('donhangs.status','Đã về kho')
        ->orwhere('donhangs.status','Chờ giao hàng')
        ->groupBy('donhangs.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc')
        ->get();

        $donhang8 = DB::table('donhangs')->select('donhangs.id','donhangs.madonhang','donhangs.updated_at','khoiluongs.weight_tt')
        ->join('khoiluongs','khoiluongs.donhang_id','=','donhangs.id')

        ->where('donhangs.status','chờ đơn hàng')->get();
        //dd($donhang7);
        $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');
       // dd($tiennap);

        return view('frontend.donhang',compact('donhang1','donhang3','donhang4','donhang5','donhang6','donhang7','tiennap','donhang8'));
    }
    public function getchoduyet($id){
        $chitietuser = chitietusers::select('users.id','chitietusers.hoten','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.status','users.email','chitietusers.thanhpho','donhangs.note')
        ->join('users','users.id','=','chitietusers.userss_id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->where('donhangs.id',$id)->get();
       // dd($chitietuser);
        $chitietdonhang = chitietdonhang::select('donhangs.id','chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.price','chitietdonhangs.quantity','chitietdonhangs.color','donhangs.totalqty','chitietdonhangs.price_product','donhangs.status','donhangs.kiemhang','donhangs.sale')
        ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->get();
        $kh = 0;

     $tygia =thongso::sum('tygia');

        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');

        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');

        $giaweb = $price_product*$tygia;

        $kiemhangs = donhang::select('donhangs.id','kiemhang')->where('status','chờ xác nhận')->orwhere('donhangs.status','Còn hàng')->where('donhangs.id',$id)->first();

        $kiemhangss = donhang::where('status','chờ xác nhận')->orwhere('donhangs.status','Còn hàng')->where('donhangs.id',$id)->pluck('kiemhang');

        if($kiemhangs->kiemhang == 1){
          if($price_product >= 10){
            if($qty >= 1 && $qty < 10 ){
              $kh = 5000;
            }
            if($qty >= 10 && $qty < 50 ){
              $kh = 3000;
            }
            if($qty >= 50 && $qty < 100 ){
              $kh = 1500;
            }
          }else {
            if($qty >= 1 && $qty < 10 ){
              $kh = 1000;
            }
            if($qty >= 10 && $qty < 50 ){
              $kh = 800;
            }
            if($qty >= 50 && $qty < 100 ){
              $kh = 500;
            }
          }
        
        }else {
          $kh = 0;
        }
       
        $price = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
          ->where('donhangs.id',$id)->sum('price');
        $tienhang = ($price * $tygia);
        $soluongsp = donhang::join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')->where('donhangs.id',$id)->count('chitietdonhangs.id');
      
        $pdv = 0;
          if($soluongsp >= 2){
            if( $tienhang > 0 && $tienhang < 10000000) 
              {
                  $pdv = ROUND($tienhang * 0.05);
              }
              if( $tienhang > 10000000 && $tienhang < 50000000) 
              {
                  $pdv = ROUND($tienhang * 0.04);
              }
              if( $tienhang > 50000000 && $tienhang < 100000000) 
              {
                  $pdv = ROUND($tienhang * 0.03);
              }
              if( $tienhang > 100000000 && $tienhang < 200000000) 
              {
                  $pdv = ROUND($tienhang * 0.02);
              }
              if( $tienhang >= 200000000) 
              {
                  $pdv = ROUND($price * 0.01);
              }
          }else {
              $pdv = 7000;
          }
          $coc = donhang::where('donhangs.id',$id)->where('donhangs.id',$id)->sum('coc');

          $cnd = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phinoidia');
             // dd($cnd)
               $phivcnd= $cnd*$tygia;

        $sum= $tienhang + $kh + $pdv+ $cnd;
        $sumconthieu = $sum - $coc;
        $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');
        
        $getcheckkh = DB::table('donhangs')->where('id', $id)
        ->pluck('kiemhang');
        $getchecksl = DB::table('donhangs')->where('id', $id)
        ->pluck('sale');
       // dd($getchecksl);
          return view('frontend.donhangchoduyet',compact('chitietuser','chitietdonhang','pdv','kh','sum','tiennap','phivcnd','giaweb','tienhang','kiemhangss','coc','sumconthieu','getcheckkh','getchecksl'));

    }
    public function getcoctien(Request $request,$id){
      $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');

      $tongtien  = donhang::where('donhangs.id',$id)->sum('totalqty');

      $coc = round($tongtien * 0.5);
      
      if ($tiennap < $coc) {
       $loi = "bạn cần nap tiền để xác nhận đơn";
      }else{
      $sodu = $tiennap - $coc;

      $donhangs = donhang::find($id);
      $donhangs->coc = $coc;
      $donhangs->status = "chờ mua hàng";
      $donhangs->save();
      
      $pay  = congtien::select('id')->where('user_id',Auth::user()->id)->first();
      $pay->sotien = $sodu;
      $pay->save();
       //dd($pay);
      $naptiens  = new naptien();
      $naptiens->user_id = auth::user()->id;
      $naptiens->donhang_id = $id;
      $naptiens->congtien_id = $pay->id;
      $naptiens->save();
      }
      return redirect()->back();

    }
    public function getchomuahang($id){
        $chitietuser = chitietusers::select('users.id','users.email','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.status','chitietusers.hoten','donhangs.note','chitietusers.thanhpho')
        ->join('users','users.id','=','chitietusers.userss_id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->where('donhangs.id',$id)->get();
      
        $chitietdonhang = chitietdonhang::select('donhangs.id','chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.price','chitietdonhangs.quantity','chitietdonhangs.color','donhangs.totalqty','chitietdonhangs.price_product','donhangs.kiemhang','donhangs.sale')
        ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->get();
        $kh = 0;
            
   $tygia =thongso::sum('tygia');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');

        $giaweb = $price_product*$tygia;
        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');
        $kiemhangs = donhang::select('donhangs.id','kiemhang')->where('status','chờ mua hàng')->where('donhangs.id',$id)->first();
        if($kiemhangs->kiemhang == 1){
          if($price_product >= 10){
            if($qty >= 1 && $qty < 10 ){
              $kh = 5000;
            }
            if($qty >= 10 && $qty < 50 ){
              $kh = 3000;
            }
            if($qty >= 50 && $qty < 100 ){
              $kh = 1500;
            }
          }else {
            if($qty >= 1 && $qty < 10 ){
              $kh = 1000;
            }
            if($qty >= 10 && $qty < 50 ){
              $kh = 800;
            }
            if($qty >= 50 && $qty < 100 ){
              $kh = 500;
            }
          }
        
        }else {
          $kh = 0;
        }
        
        $price = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
          ->where('donhangs.id',$id)->sum('price');
        $tienhang = ($price * $tygia);
        $soluongsp = donhang::join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')->where('donhangs.id',$id)->count('chitietdonhangs.id');
        $pdv = 0;

             if($soluongsp >= 2){
            if( $tienhang > 0 && $tienhang < 10000000) 
              {
                  $pdv = ROUND($tienhang * 0.05);
              }
              if( $tienhang > 10000000 && $tienhang < 50000000) 
              {
                  $pdv = ROUND($tienhang * 0.04);
              }
              if( $tienhang > 50000000 && $tienhang < 100000000) 
              {
                  $pdv = ROUND($tienhang * 0.03);
              }
              if( $tienhang > 100000000 && $tienhang < 200000000) 
              {
                  $pdv = ROUND($tienhang * 0.02);
              }
              if( $tienhang >= 200000000) 
              {
                  $pdv = ROUND($price * 0.01);
              }
          }else {
              $pdv = 7000;
          }
        $coc = donhang::where('donhangs.id',$id)->where('donhangs.id',$id)->sum('coc');
        $sum= $tienhang + $kh + $pdv;
        $sum1= ($tienhang + $kh + $pdv)-$coc; 
        $cnd = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phinoidia');
        $phivcnd= $cnd*$tygia;
        $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');
        $getcheckkh = DB::table('donhangs')->where('id', $id)
        ->pluck('kiemhang');
        $getchecksl = DB::table('donhangs')->where('id', $id)
        ->pluck('sale');
          return view('frontend.chomuahang',compact('chitietuser','chitietdonhang','kh','kiemhangs','sum','pdv','coc','sum1','phivcnd','tiennap','giaweb','tienhang','getcheckkh','getchecksl'));
    }
    public function getdamuahang($id){
        $chitietuser = chitietusers::select('donhangs.id','users.email','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.status','chitietusers.hoten','chitietusers.thanhpho','donhangs.note')
        ->join('users','users.id','=','chitietusers.userss_id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->where('donhangs.id',$id)->get();
       

        $chitietdonhang = chitietdonhang::select('chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.price','chitietdonhangs.quantity','chitietdonhangs.color','donhangs.totalqty','chitietdonhangs.price_product','donhangs.kiemhang','donhangs.sale')
        ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->get();
        $kh = 0;
         $tygia =thongso::sum('tygia');

        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');

        $giaweb = $price_product*$tygia;
        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');
        $kiemhangs = donhang::select('kiemhang')->where('status','Đang vận chuyển')->where('id',$id)->first();
       //dd($kiemhangs);
        if($kiemhangs->kiemhang == 1){
          if($price_product >= 10){
            if($qty >= 1 && $qty < 10 ){
              $kh = 5000;
            }
            if($qty >= 10 && $qty < 50 ){
              $kh = 3000;
            }
            if($qty >= 50 && $qty < 100 ){
              $kh = 1500;
            }
          }else {
            if($qty >= 1 && $qty < 10 ){
              $kh = 1000;
            }
            if($qty >= 10 && $qty < 50 ){
              $kh = 800;
            }
            if($qty >= 50 && $qty < 100 ){
              $kh = 500;
            }
          }
        
        }else {
          $kh = 0;
        }
       
        $price = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
          ->where('donhangs.id',$id)->sum('price');
        $tienhang = ($price * $tygia);
        $soluongsp = donhang::join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')->where('donhangs.id',$id)->count('chitietdonhangs.id');
        $pdv = 0;

             if($soluongsp >= 2){
            if( $tienhang > 0 && $tienhang < 10000000) 
              {
                  $pdv = ROUND($tienhang * 0.05);
              }
              if( $tienhang > 10000000 && $tienhang < 50000000) 
              {
                  $pdv = ROUND($tienhang * 0.04);
              }
              if( $tienhang > 50000000 && $tienhang < 100000000) 
              {
                  $pdv = ROUND($tienhang * 0.03);
              }
              if( $tienhang > 100000000 && $tienhang < 200000000) 
              {
                  $pdv = ROUND($tienhang * 0.02);
              }
              if( $tienhang >= 200000000) 
              {
                  $pdv = ROUND($price * 0.01);
              }
          }else {
              $pdv = 7000;
          }
          $coc = donhang::where('donhangs.id',$id)->where('donhangs.id',$id)->sum('coc');
         
         $sum1= ($tienhang + $kh + $pdv)-$coc;

        $cnd = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phinoidia');
        $phivcnd= $cnd*$tygia;
        $kltt = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('weight_tt');
       $klqd = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('weight_qd');

       $length = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('length');
       $width = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('width');
       $height = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('height');
       $cvc = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phivc');
        $sum= $tienhang + $kh + $pdv + $cnd + $cvc;
        $sum1= $sum - $coc;
        $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');
         $getcheckkh = DB::table('donhangs')->where('id', $id)
        ->pluck('kiemhang');
        $getchecksl = DB::table('donhangs')->where('id', $id)
        ->pluck('sale');
            return view('frontend.hangvekho',compact('chitietuser','chitietdonhang','kh','kiemhangs','sum','pdv','coc','sum1','cnd','kltt','klqd','length','height','width','cvc','tiennap','giaweb','tienhang','phivcnd','getcheckkh','getchecksl'));
    }
    public function gethangdave($id){
       $chitietuser = chitietusers::select('users.id','users.email','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.status','chitietusers.thanhpho','donhangs.coc','chitietusers.hoten','donhangs.note','donhangs.kiemhang','donhangs.sale')
        ->join('users','users.id','=','chitietusers.userss_id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->where('donhangs.id',$id)->get();
       

        $chitietdonhang = chitietdonhang::select('donhangs.id','chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.price','chitietdonhangs.quantity','chitietdonhangs.color','donhangs.totalqty','chitietdonhangs.price_product','donhangs.coc','donhangs.note','donhangs.status')
        ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->get();
        //dd($chitietdonhang);
        $kh = 0;
         $tygia =thongso::sum('tygia');

        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');
        $giaweb = $price_product*$tygia;
        $kiemhangs = donhang::select('kiemhang')->where('status','Đã về kho')->orwhere('status','Chờ giao hàng')->orwhere('status','Nhận tại cửa hàng')->where('id',$id)->first();
          if($kiemhangs->kiemhang == 1){
            if($price_product >= 10){
              if($qty >= 1 && $qty < 10 ){
                $kh = 5000;
              }
              if($qty >= 10 && $qty < 50 ){
                $kh = 3000;
              }
              if($qty >= 50 && $qty < 100 ){
                $kh = 1500;
              }
            }else {
              if($qty >= 1 && $qty < 10 ){
                $kh = 1000;
              }
              if($qty >= 10 && $qty < 50 ){
                $kh = 800;
              }
              if($qty >= 50 && $qty < 100 ){
                $kh = 500;
              }
            }
          
          }else {
            $kh = 0;
          }
         
          $price = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
            ->where('donhangs.id',$id)->sum('price');
          $tienhang = ($price * $tygia);
          $soluongsp = donhang::join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')->where('donhangs.id',$id)->count('chitietdonhangs.id');
        $pdv = 0;

             if($soluongsp >= 2){
            if( $tienhang > 0 && $tienhang < 10000000) 
              {
                  $pdv = ROUND($tienhang * 0.05);
              }
              if( $tienhang > 10000000 && $tienhang < 50000000) 
              {
                  $pdv = ROUND($tienhang * 0.04);
              }
              if( $tienhang > 50000000 && $tienhang < 100000000) 
              {
                  $pdv = ROUND($tienhang * 0.03);
              }
              if( $tienhang > 100000000 && $tienhang < 200000000) 
              {
                  $pdv = ROUND($tienhang * 0.02);
              }
              if( $tienhang >= 200000000) 
              {
                  $pdv = ROUND($price * 0.01);
              }
          }else {
              $pdv = 7000;
          }
            $coc = donhang::where('donhangs.id',$id)->sum('coc');
           
          

           $cnd = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phinoidia');
            $phivcnd= $cnd*$tygia;
            
         $kltt = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('weight_tt');
         $klqd = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('weight_qd');

         $length = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('length');
         $width = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('width');
         $height = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('height');
         $cvc = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phivc');
        $sum= $tienhang + $kh + $pdv + $phivcnd + $cvc;
        $sum1= $sum - $coc;
        $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');
        $getcheckkh = DB::table('donhangs')->where('id', $id)
        ->pluck('kiemhang');
        $getchecksl = DB::table('donhangs')->where('id', $id)
        ->pluck('sale');
            return view('frontend.chogiao',compact('chitietuser','chitietdonhang','kh','kiemhangs','sum','pdv','coc','sum1','cnd','kltt','klqd','length','height','width','cvc','tiennap','giaweb','tienhang','phivcnd','soluongsp','getcheckkh','getchecksl'));
    }
    public function postxacnhangiao(Request $request,$id) {

      if(isset($request->vehicle1)){
        $vehicle ="đến tận nơi lấy";
      }elseif(isset($request->vehicle2)){
        $vehicle = "ship tận nhà";
      }
      // $donhang = donhang::find($id);
      // $donhang->xacnhandon = $vehicle;
      // $donhang->status ="Chờ giao hàng";

      // $donhang->save();

      return redirect()->back();
    }
    public function getxacnhanthanhtoan(Request $request,$id){
       $kh = 0;
        $tygia =thongso::sum('tygia');
        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');
        $giaweb = $price_product*$tygia;
        $kiemhangs = donhang::select('kiemhang')->where('status','Đã về kho')->orwhere('status','Chờ giao hàng')->where('id',$id)->first();
          if($kiemhangs->kiemhang == 1){
            if($price_product >= 10){
              if($qty >= 1 && $qty < 10 ){
                $kh = 5000;
              }
              if($qty >= 10 && $qty < 50 ){
                $kh = 3000;
              }
              if($qty >= 50 && $qty < 100 ){
                $kh = 1500;
              }
            }else {
              if($qty >= 1 && $qty < 10 ){
                $kh = 1000;
              }
              if($qty >= 10 && $qty < 50 ){
                $kh = 800;
              }
              if($qty >= 50 && $qty < 100 ){
                $kh = 500;
              }
            }
          
          }else {
            $kh = 0;
          }
         
          $price = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
            ->where('donhangs.id',$id)->sum('price');
          $tienhang = ($price * $tygia);
          $soluongsp = donhang::join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')->where('donhangs.id',$id)->count('chitietdonhangs.id');
        $pdv = 0;

             if($soluongsp >= 2){
            if( $tienhang > 0 && $tienhang < 10000000) 
              {
                  $pdv = ROUND($tienhang * 0.05);
              }
              if( $tienhang > 10000000 && $tienhang < 50000000) 
              {
                  $pdv = ROUND($tienhang * 0.04);
              }
              if( $tienhang > 50000000 && $tienhang < 100000000) 
              {
                  $pdv = ROUND($tienhang * 0.03);
              }
              if( $tienhang > 100000000 && $tienhang < 200000000) 
              {
                  $pdv = ROUND($tienhang * 0.02);
              }
              if( $tienhang >= 200000000) 
              {
                  $pdv = ROUND($price * 0.01);
              }
          }else {
              $pdv = 7000;
          }
            $coc = donhang::where('donhangs.id',$id)->sum('coc');
           
          

           $cnd = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phinoidia');
            $phivcnd= $cnd*$tygia;
        
         $cvc = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phivc');
        $sum= $tienhang + $kh + $pdv + $phivcnd + $cvc;
        $sum1= $sum - $coc;
       // dd($sum);
        $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');

        $tienconlai = $tiennap - $sum1;
        $tongtien  = $sum1 + $coc;

        if( $tongtien == $sum)
        {
          $tt = "thanh toán đủ";
        }else{
          $tt = "thanh toán sau";
        }
        $donhangs = donhang::find($id);
        $donhangs->coc = $tongtien;
        $donhangs->note = $tt;
        $donhangs->totalqty = $sum;
        $donhangs->updated_at = new DateTime();
        $donhangs->save();

        $pay  = congtien::select('id')->where('user_id',Auth::user()->id)->first();
        $pay->sotien = $tienconlai;
        $pay->save();

        return redirect()->back();
    }
    public function gethuydonhang(Request $request, $id) {
      $coc = donhang::where('donhangs.id',$id)->where('donhangs.id',$id)->sum('coc');
      $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');
      $tiennaps  = $tiennap + $coc;
      
      $paymethod = congtien::select('congtiens.id')->join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->first(); 
      $paymethod->sotien = $tiennaps;
      $paymethod->updated_at = new DateTime();
      $paymethod->save();

      $donhang = donhang::find($id);
      $donhang->coc = null;
      $donhang->note = null;
      $donhang->status = "Hủy đơn hàng";
      $donhang->updated_at = new DateTime();
      $donhang->save();

      $phivanchuyen = phivanchuyen::select('phivanchuyens.id')->join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->first();
      if(!$phivanchuyen){

        }else{
           $phivanchuyen->delete();
        }

      $naptiens = naptien::select('naptiens.id')->join('donhangs','donhangs.id','=','naptiens.donhang_id')->where('donhangs.id',$id)->first();
      if(!$naptiens){

        }else{
          $naptiens->delete();
        }

      return redirect()->route('canhan.donhang.tatcadonhang');
    }
    public function postdatlai(Request $request,$id){
        $donhang = donhang::find($id);
        $donhang->coc = null;
        // $donhang->xacnhandon = null;
        $donhang->note = null;
        $donhang->status = "chờ xác nhận";
        $donhang->updated_at = new DateTime();
        $donhang->save();

        $phivanchuyen = phivanchuyen::select('phivanchuyens.id')->join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->first();
        if(!$phivanchuyen){

        }else{
           $phivanchuyen->delete();
        }
      
        $naptiens = naptien::select('naptiens.id')->join('donhangs','donhangs.id','=','naptiens.donhang_id')->where('donhangs.id',$id)->first();
        if(!$naptiens){

        }else{
          $naptiens->delete();
        }
       
        return redirect()->route('canhan.donhang.tatcadonhang');
    }
    public function getthanhtoan($id){
      return view('frontend.thanhtoan');
    }
    public function postthanhtoan(Request $request, $id){

      if ($request->hasFile('file')){
            // L?y tên file
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName('file');
            // Luu file vào thu m?c upload v?i tên là bi?n $filename
            $file->move('img',$file_name);

            $paymethod = new Paymethod();
            $paymethod->user_id = Auth::user()->id;
            $paymethod->ten = $request->name;
            $paymethod->image = $file_name =$file->getClientOriginalName('file');
            $paymethod->mota = $request->nd;
            $paymethod->sotien= $request->st;

            $paymethod->status= 'chờ xác nhận';
            $paymethod->save();
        }
      
        return redirect()->route('canhan');
    }
    public function getgiaodich(){
      $paymethod = Paymethod::select()->where('user_id',auth::user()->id)->get();
     return view('frontend.giaodich',compact('paymethod'));
    }
    public function ajaxUpdatenote(Request $request, $id){
      $ajaxdonhang = donhang::find($id);
      $ajaxdonhang->id = $id;
      $ajaxdonhang->note = $request->note;
     // dd($ajaxdonhang);
      $ajaxdonhang->save();
      return redirect()->back();
    }
    public function gettracuu(){
      $chitietuser = chitietusers::select('donhangs.id','users.email','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.status','chitietusers.thanhpho','donhangs.coc','chitietusers.hoten','donhangs.note')
        ->join('users','users.id','=','chitietusers.userss_id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->where('donhangs.user_id',auth::user()->id)->get();
       

      $chitietdonhang = DB::table('donhangs')->select('donhangs.id','donhangs.madonhang','donhangs.created_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc', DB::raw("count('chitietdonhangs.id') as soluong"),
        DB::raw('sum(donhangs.coc) as dathanhtoan'), 
        DB::raw('sum(chitietdonhangs.price) as sum'))
        ->join('users','donhangs.user_id','=','users.id')
        ->join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')
        ->where('user_id',Auth::user()->id)
        ->groupBy('donhangs.id','donhangs.madonhang','donhangs.created_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc')
        ->get(); 

       
      $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');


      return view('frontend.tracuu',compact('chitietuser','chitietdonhang','tiennap'));
    }
    public function getluulink(){
        $chitietuser = chitietusers::select('donhangs.id','users.email','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.status','chitietusers.thanhpho','donhangs.coc','chitietusers.hoten','donhangs.note')
        ->join('users','users.id','=','chitietusers.userss_id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->where('donhangs.user_id',auth::user()->id)->get();
       
      $luulink = luulink::select('luulinks.id','luulinks.name_product','luulinks.url','luulinks.note')->join('users','users.id','=','luulinks.user_id')->where('users.id',auth::user()->id)->get();
      
    //  dd($luulink);
      $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');
      return view('frontend.luulink',compact('chitietuser','luulink','tiennap'));
    }
    public function postluulink(Request $request){
      $luulink = new luulink();
      $luulink->user_id = Auth::user()->id;
      $luulink->name_product = $request->name_product;
      $luulink->url = $request->url;
      $luulink->note = $request->note2;
      $luulink->created_at = new DateTime();
      $luulink->save();
      return redirect()->back();
    }
    public function getxoalink($id){
     try{  
            DB::beginTransaction();
            
            $luulink = luulink::find($id);
           // dd($luulink);
            $luulink->delete($id);
            DB::commit(); 

       
            return redirect()->back();
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());

      } 
    }
    public function getkhieunai($id){
      $donhang_id = donhang::select('id')->where('id',$id)->first();
      $khieunai = new khieunai();
      $khieunai->donhang_id = $donhang_id->id;
      $khieunai->save();

      return redirect()->route('canhan.donhang.bangkhieunai');
    }
    public function getbangkhieunai(){
       $chitietuser = chitietusers::select('donhangs.id','users.email','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.status','chitietusers.thanhpho','donhangs.coc','chitietusers.hoten','donhangs.note')
        ->join('users','users.id','=','chitietusers.userss_id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->where('donhangs.user_id',auth::user()->id)->get();
     
      
      $khieunai = DB::table('donhangs')->select('khieunais.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc','khieunais.lydo','khieunais.status', DB::raw("count('chitietdonhangs.id') as soluong"),
        DB::raw('sum(donhangs.coc) as dathanhtoan'), 
        DB::raw('sum(chitietdonhangs.price) as sum'))
        ->join('users','donhangs.user_id','=','users.id')
        ->join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')
        ->join('khieunais','khieunais.donhang_id','=','donhangs.id')
        ->where('user_id',Auth::user()->id)
      
        ->groupBy('khieunais.id','donhangs.madonhang','donhangs.updated_at','donhangs.totalqty','donhangs.status','donhangs.note','donhangs.coc','khieunais.lydo','khieunais.status')
        ->get(); 

    
     $tiennap = congtien::join('users','users.id','=','congtiens.user_id')->where('users.id',Auth::user()->id)->sum('sotien');
      return view('frontend.khieunai',compact('chitietuser','tiennap','khieunai'));
    }
    public function postbangkhieunaii(Request $request,$id){
      $khieunai = khieunai::find($id);
      $khieunai->lydo = 'không nhận được hàng';
      $khieunai->status = 'đơn hàng lỗi';
      //dd($khieunai);
      $khieunai->save();

      return redirect()->back(); 
    }
    public function postbangkhieunaiii(Request $request,$id){

      if(isset($request->vehicle1)){
        $vehicle ="Sai màu sắc, kich thước";
      }elseif(isset($request->vehicle2)){
        $vehicle = "Sai hoa văn, kiểu dáng";
      }elseif(isset($request->vehicle3)){
        $vehicle = "Rách, thủng";
      }elseif(isset($request->vehicle4)){
        $vehicle = "Bị móp,cong vênh";
      }elseif(isset($request->vehicle5)){
        $vehicle = "Dính bẩn không giặt được";
      }elseif(isset($request->vehicle6)){
        $vehicle = "Bị mốc";
      }elseif(isset($request->vehicle7)){
        $vehicle = "lý do khác";
      }
    
     if ($request->hasFile('file')){
            // L?y tên file
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName('file');
            // Luu file vào thu m?c upload v?i tên là bi?n $filename
            $file->move('img',$file_name);
            $khieunai = khieunai::find($id);
            $khieunai->lydo = $vehicle;
            $khieunai->image=$file_name =$file->getClientOriginalName('file');
            $khieunai->note = $request->note1;
            $khieunai->status = 'đơn hàng lỗi';
            $khieunai->save();
        }
      return redirect()->back(); 
    }
     public function getchogiaohang($id){
       $donhang = donhang::find($id);
        $donhang->status = "chờ đơn hàng"; 
        $donhang->updated_at = new DateTime();
        $donhang->save();
        return redirect()->route('canhan.donhang.tatcadonhang');
   }
   public function getgiaohangtannha($id){
       $donhang = donhang::find($id);
        $donhang->status = "Giao hàng tận nhà"; 
        $donhang->updated_at = new DateTime();
        $donhang->save();

        return redirect()->back();
   }
}
