<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\product;
use App\ncc;
use App\User;
use App\donhang;
use App\chitietdonhang;
use  App\chitietusers;
use App\phivanchuyen;
use App\khoiluong;
use App\Paymethod;
use DateTime;
use App\thongtinkh;
use App\khieunai;
use Goutte;
use App\nhatky;
use Carbon\Carbon;
use Auth;
use App\Admin;
use App\nhavanchuyen;
use App\donvan;
use App\congtien;
use App\naptien;
use App\thongso;
use App\tuvan;

class donhangController extends Controller
{  

    public function getlistdonhang(Request $request){
         $user = User::select('donhangs.id','madonhang','hoten','email','donhangs.status','donhangs.coc','donhangs.totalqty','donhangs.created_at')
         ->join('chitietusers','users.id','=','chitietusers.userss_id')
         ->join('donhangs','donhangs.user_id','=','users.id')  
          ->where('donhangs.status','chờ xác nhận')
        ->orwhere('donhangs.status','Còn hàng')
        ->orwhere('donhangs.status','chờ mua hàng')
        ->orwhere('donhangs.status','Đang vận chuyển')
        ->orwhere('donhangs.status','Đã về kho')
        ->orwhere('donhangs.status','kết thúc đơn')
        ->orwhere('donhangs.status','Khách trả hàng')
        ->orwhere('donhangs.status','Đã xử lý')
        ->orwhere('donhangs.status','chờ đơn hàng')
        ->orwhere('donhangs.status','Nhận tại cửa hàng')
        ->orwhere('donhangs.status','Giao hàng tận nhà') 
         ->get();

     


        $usertt = thongtinkh::select('donhangs.id','madonhang','hoten','email','donhangs.status','donhangs.coc','donhangs.totalqty','donhangs.note','donhangs.created_at') 
         ->join('donhangs','donhangs.thongtinkh_id','=','thongtinkhs.id')
         ->where('donhangs.status','chờ xác nhận')
        ->orwhere('donhangs.status','Còn hàng')
        ->orwhere('donhangs.status','chờ mua hàng')
        ->orwhere('donhangs.status','Đang vận chuyển')
        ->orwhere('donhangs.status','Đã về kho')
        ->orwhere('donhangs.status','kết thúc đơn')
        ->orwhere('donhangs.status','Khách trả hàng')
        ->orwhere('donhangs.status','Đã xử lý')
        ->orwhere('donhangs.status','chờ đơn hàng')
         ->get();
    

       return View('backend.listdonhang',compact('user','usertt'));
    }

    public function getchitietdonhang($id){
     
       $chitietuser = chitietusers::select('donhangs.id','chitietusers.hoten','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.note','users.email','chitietusers.thanhpho','donhangs.status')
        ->join('users','users.id','=','chitietusers.userss_id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->where('donhangs.id',$id)->get();

        $chitietdonhang = chitietdonhang::select('chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.price','chitietdonhangs.quantity','chitietdonhangs.color','donhangs.totalqty')
        ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->get();

         $kh = 0;
         $tygia =thongso::sum('tygia');
        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');
        $giaweb = $price_product*$tygia;
        $kiemhangs = donhang::select('kiemhang')->where('id',$id)->first();
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
           
           $sum1= ($tienhang + $kh + $pdv)-$coc;

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

        $nhavanchuyen= nhavanchuyen::get();
        $donvan = donvan::select('donvans.id','donvans.created_at','donvans.yeucau','donvans.madonvan','donvans.phitravanchuyen','nhavanchuyens.tennhavanchuyen')
        ->join('nhavanchuyens','nhavanchuyens.id','=','donvans.nhavanchuyen_id')
        ->join('donhangs','donhangs.id','=','donvans.donhang_id')
        ->where('donhangs.id',$id)->get();
         
         $donvan2 = DB::table('donvans')->select('donvans.id')->join('donhangs','donhangs.id','=','donvans.donhang_id')->where('donhangs.id',$id)->first(); 
        
       
       return View('backend.chitietdonhang',compact('chitietuser','chitietdonhang','sum1','tienhang','pdv','kh','phivcnd','kltt','klqd','length','width','height','cvc','sum','coc','nhavanchuyen','donvan','donvan2'));
   }
   public function getinhoadon($id){
      $chitietuser = chitietusers::select('donhangs.id','chitietusers.hoten','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.note','users.email','chitietusers.thanhpho','donvans.madonvan')
        ->join('users','users.id','=','chitietusers.userss_id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->join('donvans','donhangs.id','=','donvans.donhang_id')
        ->where('donhangs.id',$id)->get();

        $chitietdonhang = chitietdonhang::select('chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.price','chitietdonhangs.quantity','chitietdonhangs.color','donhangs.totalqty')
        ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->get();

       $kh = 0;
         $tygia =thongso::sum('tygia');

        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');
        $giaweb = $price_product*$tygia;
        $kiemhangs = donhang::select('kiemhang')->where('id',$id)->first();
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
           
           $sum1= ($tienhang + $kh + $pdv)-$coc;

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

        $dt = Carbon::now();
        $nhatky = new nhatky();
        $nhatky->admin_id = Auth::user()->id;
        $nhatky->thoigian = $dt;
        $nhatky->thaotac = 'xác nhận in hóa đơn ';
        $nhatky->save();
      
        //dd($chitietuser);
       return View('backend.inhoadon',compact('chitietuser','chitietdonhang','sum','sum1'));
   }
    public function getduyetdon(Request $request, $id){
      $chitietdonhang = donhang::select('madonhang')  
        ->where('donhangs.id',$id)->get();
      return view('backend.chokiemtra',compact('chitietdonhang'));
    
   }
   public function postduyetdon(Request $request, $id){
      $pnd = $request->input('pnd');
      $chitiet = donhang::select('donhangs.id')
        ->where('donhangs.id',$id)->first();

      $chitiet1 = new phivanchuyen();
      $chitiet1->donhang_id = $chitiet->id;
      $chitiet1->phinoidia = $pnd;
      $chitiet1->updated_at = new DateTime();
      $chitiet1->save();

      $donhang = donhang::find($id);
        $donhang->note = $request->note;
        $donhang->status = 'Còn hàng';
        $donhang->updated_at = new DateTime();
        $donhang->save();
      $donhang1 = donhang::select('madonhang')->where('id',$id)->first();
      //dd($donhang1);
      $dt = Carbon::now();
        $nhatky = new nhatky();
        $nhatky->admin_id = Auth::user()->id;
        $nhatky->thoigian = $dt;
        $nhatky->thaotac = 'đã duyệt đơn hàng' .$donhang1->madonhang;
        $nhatky->save();
        //dd($nhatky);
      return redirect()->route('admin/donhang/list');
   }
   public function getchomuahang(Request $request , $id){

        $donhang1 = donhang::find($id);
        $donhang1->status = "Đang vận chuyển";
        $donhang1->save();

         $donhang1 = donhang::select('madonhang')->where('id',$id)->first();
      //dd($donhang1);
      $dt = Carbon::now();
        $nhatky = new nhatky();
        $nhatky->admin_id = Auth::user()->id;
        $nhatky->thoigian = $dt;
        $nhatky->thaotac = 'xác nhận mua hàng ' .$donhang1->madonhang;
        $nhatky->save();
        return redirect()->route('admin/donhang/list');
   }
   public function getnhapthongtin($id){
    $chitietdonhang = donhang::select('madonhang')  
        ->where('donhangs.id',$id)->get();
    return view('backend.nhapthongtinhang',compact('chitietdonhang'));
   }
   public function postnhapthongtin(Request $request, $id){
      $cd = $request->input('cd');
      $cr = $request->input('cr');
      $cc = $request->input('cc');
      $kl = $request->input('kltt');
      $giacuctk = ROUND(($cd*$cr*$cc)/5000);
    

      $diachi = user::select('chitietusers.diachi')
      ->join('chitietusers','chitietusers.userss_id','=','users.id')
      ->join('donhangs','donhangs.user_id','=','users.id')
      ->where('donhangs.id',$id)->first();

      if($kl < 20)
      { 
        if($diachi = "đà nẵng" ){
          if($giacuctk > $kl){
            $gc = 32000 * $giacuctk;
          }else{
            $gc = 32000;
          }
        }
        elseif($diachi = "hồ chí minh" ){
          if($giacuctk > $kl){
            $gc = 38000 * $giacuctk;
          }else{
            $gc = 38000;
          }
        }
        
      }elseif($kl >= 20 && $kl < 100){
        if($diachi = "đà nẵng" ){
          if($giacuctk > $kl){
            $gc = 30000 * $giacuctk;
          }else{
            $gc = 30000;
          }
        }
        elseif($diachi = "hồ chí minh" ){
          if($giacuctk > $kl){
            $gc = 36000 * $giacuctk;
          }else{
            $gc = 36000;
          }
        }      
      }elseif($kl >= 100 && $kl < 300){
        if($diachi = "đà nẵng" ){
          if($giacuctk > $kl){
            $gc = 28000 * $giacuctk;
          }else{
            $gc = 28000;
          }
        }
        elseif($diachi = "hồ chí minh" ){
          if($giacuctk > $kl){
            $gc = 34000 * $giacuctk;
          }else{
            $gc = 34000;
          }
        }      
      }elseif($kl >= 300 && $kl < 500){
        if($diachi = "đà nẵng" ){
          if($giacuctk > $kl){
            $gc = 25000 * $giacuctk;
          }else{
            $gc = 25000;
          }
        }
        elseif($diachi = "hồ chí minh" ){
          if($giacuctk > $kl){
            $gc = 31000 * $giacuctk;
          }else{
            $gc = 31000;
          }
        }      
      }elseif($kl >= 500 && $kl < 1000){
        if($diachi = "đà nẵng" ){
          if($giacuctk > $kl){
            $gc = 22000 * $giacuctk;
          }else{
            $gc = 22000;
          }
        }
        elseif($diachi = "hồ chí minh" ){
          if($giacuctk > $kl){
            $gc = 28000 * $giacuctk;
          }else{
            $gc = 28000;
          }
        }      
      }

      $kl1 = donhang::select('donhangs.id')
        ->where('donhangs.id',$id)->first();  
     // dd($kl1);

        $kh2 = new khoiluong();
        $kh2->donhang_id = $kl1->id;
        $kh2->length = $cd;
        $kh2->width = $cr;
        $kh2->height =$cc;
        $kh2->weight_qd = $giacuctk;
        $kh2->weight_tt = $kl;
        $kh2->save();
      

      $phivctqvn = phivanchuyen::select('phivanchuyens.id')
        ->join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')
        ->where('donhangs.id',$id)->first(); 
       // dd($phivctqvn); 
      $phivctqvn->phivc = $gc;
      $phivctqvn->save();
      
      $donhang = donhang::find($id);
      $donhang->note = $request->note;
      $donhang->status = 'Đã về kho';
      $donhang->save();
      
         $donhang1 = donhang::select('madonhang')->where('id',$id)->first();
      //dd($donhang1);
      $dt = Carbon::now();
        $nhatky = new nhatky();
        $nhatky->admin_id = Auth::user()->id;
        $nhatky->thoigian = $dt;
        $nhatky->thaotac = 'nhập thông tin đơn hàng ' .$donhang1->madonhang;
        $nhatky->save();

     return redirect()->route('admin/donhang/list');
   }

   public function getketthucdon(Request $request, $id){
    $donhang = donhang::find($id);
      $donhang->status = 'kết thúc đơn';
      $donhang->save();

        $donhang1 = donhang::select('madonhang')->where('id',$id)->first();
      //dd($donhang1);
      $dt = Carbon::now();
        $nhatky = new nhatky();
        $nhatky->admin_id = Auth::user()->id;
        $nhatky->thoigian = $dt;
        $nhatky->thaotac = 'xác nhận kết thúc đơn hàng ' .$donhang1->madonhang;
        $nhatky->save();

      return redirect()->back();
   }
   public function getlistnap(){
     $paymethod = Paymethod::select()->get();
   //  dd($paymethod);
    return view('backend.listnaptien',compact('paymethod'));
   }
   public function getxacnhan($id){
      $paymethod = Paymethod::find($id);
      $paymethod->status = "đã xác nhận";
    // dd($paymethod);
      $paymethod->save();

        $paymethod1 = Paymethod::select('ten')->where('id',$id)->first();
      //dd($donhang1);
      $dt = Carbon::now();
        $nhatky = new nhatky();
        $nhatky->admin_id = Auth::user()->id;
        $nhatky->thoigian = $dt;
        $nhatky->thaotac = 'xác nhận nạp tiền hco khách hàng tên ' .$paymethod1->ten;
        $nhatky->save();

    return redirect()->back();
   }
   public function gethuydonhang(Request $request, $id){
      $donhang = donhang::find($id);
      $donhang->status = 'đã hết hàng';
      $donhang->save();

        $donhang1 = donhang::select('madonhang')->where('id',$id)->first();
      //dd($donhang1);
      $dt = Carbon::now();
        $nhatky = new nhatky();
        $nhatky->admin_id = Auth::user()->id;
        $nhatky->thoigian = $dt;
        $nhatky->thaotac = 'xác nhận đơn hàng ' .$donhang1->madonhang .'đã hủy';
        $nhatky->save();

      return redirect()->back();
   }

   public function gettaodonhang(){
    $thongtinkh = thongtinkh::get();
    $nhanvien = Admin::where('id',Auth::user()->id)->get();
    //dd($thongtinkh);
    return view('backend.taodonhang',compact('thongtinkh','nhanvien'));
   }
  public function posttaodonhang(Request $request){
      $note = $request->input('note1');
      $price_product = $request->input('price_product');
    
      $crawler = Goutte::request('GET', $note);
        // $name_product = $crawler->filter('h3.tb-main-title')->each(function($node){
        //     return $node->text();
        // })[0];

        // $price_product = $crawler->filter('em.tb-rmb-num')->each(function($node){
        //     return $node->text();
        // })[0];

        $image = $crawler->filter('img#J_ImgBooth')->each(function($node){
            return $node->attr('src');
        })[0];

             $tygia =thongso::sum('tygia');

        $d = substr('DH000000', 2, 5);
    $n = 0;

    $quantity = $request->input('sl');
   // $price_product = $request->input('price_product');
    $tt =  $quantity * $price_product;
    $tienhang = $tt * $tygia;
   // dd($tienhang);
     if(isset($request->kh)){
         $kh1 = 1;
      }else{
         $kh1 = 0;
      }

    $admin = Admin::where('id',auth::user()->id)->first();
    $donhang = DB::table('donhangs')->select('madonhang')->get();
     if(isset($donhang)){
       $donhang1 = DB::table('donhangs')->count('madonhang');
          $donhang2 = 'DH'.$d. ($donhang1 + 1);
          $donhang = new donhang();
          $donhang->thongtinkh_id = $request->khachhang;
          $donhang->admin_id = $admin->id;
          $donhang->madonhang = $donhang2;
          $donhang->cart_item_id = null;
          $donhang->chinhanh = $request->chinhanh;
          $donhang->totalqty = $tienhang;
          $donhang->kiemhang = $kh1;
          $donhang->status = 'chờ xác nhận';
          $donhang->save();
        }else {
           $donhang2 =  'DH' . $d . $n;

        $donhang = new donhang();
        $donhang->thongtinkh_id =$request->khachhang;
        $donhang->madonhang = $donhang2;

        $donhang->cart_item_id = null;
        $donhang->totalqty = $tienhang;
        $donhang->kiemhang = $kh1;
        $donhang->status = 'chờ xác nhận';
       //dd($donhang);
        $donhang->save();
        }
    
    $chitietdonhang = new chitietdonhang();
    $chitietdonhang->donhang_id = $donhang->id;
    $chitietdonhang->name_product = $request->name_product;
    $chitietdonhang->size= $request->size;
    $chitietdonhang->color = $request->color;
    $chitietdonhang->quantity = $quantity;
    $chitietdonhang->price_product = $request->price_product;
    $chitietdonhang->price = $tt;
    $chitietdonhang->image = $image;
    $chitietdonhang->url = $note;
    $chitietdonhang->status = $request->ghichu;
    $chitietdonhang->save();
    
    $dt = Carbon::now();
    $nhatky = new nhatky();
    $nhatky->admin_id = Auth::user()->id;
    $nhatky->thoigian = $dt;
    $nhatky->thaotac = 'tạo đơn hàng '.$donhang->madonhang;
    $nhatky->save();


    return redirect()->route('admin/donhang/list');
  }
  public function getcoctien($id){
    $chitietdonhang = donhang::select('madonhang')  
        ->where('donhangs.id',$id)->get();
    return view('backend.thanhtoan',compact('chitietdonhang'));
  }
  public function postcoctien(Request $request, $id){

    $donhang = donhang::find($id);
    $donhang->coc = $request->coc;
    $donhang->status="chờ mua hàng";
    $donhang->updated_at = new DateTime();
    $donhang->save();

    $donhang1 = donhang::select('madonhang')->where('id',$id)->first();

    $dt = Carbon::now();
    $nhatky = new nhatky();
    $nhatky->admin_id = Auth::user()->id;
    $nhatky->thoigian = $dt;
    $nhatky->thaotac = 'xác nhận cọc tiền '.$donhang1->madonhang;
    $nhatky->save();

    return redirect()->route('admin/donhang/list');
  }
  public function getchitietdonhangg($id){
      $thongtinkh = thongtinkh::select('donhangs.id','thongtinkhs.hoten','thongtinkhs.sdt','thongtinkhs.diachi','donhangs.madonhang','donhangs.created_at','donhangs.note','thongtinkhs.email','thongtinkhs.thanhpho','donhangs.status','donhangs.chinhanh','admins.name')
        ->join('donhangs','donhangs.thongtinkh_id','=','thongtinkhs.id')
        
        ->join('admins','admins.id','=','donhangs.admin_id')
        ->where('donhangs.id',$id)->get();

        $chitietdonhang = chitietdonhang::select('chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.price','chitietdonhangs.quantity','chitietdonhangs.color','donhangs.totalqty','chitietdonhangs.image')
        ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')

        ->where('donhangs.id',$id)->get();

       $kh = 0;
        $tygia =thongso::sum('tygia');
        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');
        $giaweb = $price_product*$tygia;
        $kiemhangs = donhang::select('kiemhang')->where('id',$id)->first();
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

       $nhavanchuyen= nhavanchuyen::get();
        $donvan = donvan::select('donvans.id','donvans.created_at','donvans.yeucau','donvans.madonvan','donvans.phitravanchuyen','nhavanchuyens.tennhavanchuyen')
        ->join('nhavanchuyens','nhavanchuyens.id','=','donvans.nhavanchuyen_id')
        ->join('donhangs','donhangs.id','=','donvans.donhang_id')
        ->where('donhangs.id',$id)->get();
         
         $donvan2 = DB::table('donvans')->select('donvans.id')->join('donhangs','donhangs.id','=','donvans.donhang_id')->where('donhangs.id',$id)->first(); 
      
    return view('backend.chitietdonhangg',compact('thongtinkh','chitietdonhang','sum1','tienhang','pdv','kh','phivcnd','kltt','klqd','length','width','height','cvc','sum','coc','soluongsp','nhavanchuyen','donvan','donvan1','donvan2'));
  }
   public function getinhoadonn($id){
     $thongtinkh = thongtinkh::select('donhangs.id','thongtinkhs.hoten','thongtinkhs.sdt','thongtinkhs.diachi','donhangs.madonhang','donhangs.created_at','donhangs.note','thongtinkhs.email','thongtinkhs.thanhpho','donvans.madonvan')
        ->join('donhangs','donhangs.thongtinkh_id','=','thongtinkhs.id')
        ->join('donvans','donhangs.id','=','donvans.donhang_id')
        ->where('donhangs.id',$id)->get();

        $chitietdonhang = chitietdonhang::select('chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.price','chitietdonhangs.quantity','chitietdonhangs.color','donhangs.totalqty','donvans.madonvan','donvans.yeucau','donvans.note')
        ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->join('donvans','donvans.donhang_id','=','donhangs.id')
        ->where('donhangs.id',$id)->get();

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
         $kltt = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('weight_tt');
         $klqd = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('weight_qd');

         $length = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('length');
         $width = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('width');
         $height = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('height');
         $cvc = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phivc');
        $sum= $tienhang + $kh + $pdv + $phivcnd + $cvc;
        $sum1= $sum - $coc;



          $donhang1 = donhang::select('madonhang')->where('id',$id)->first();
      //dd($donhang1);
      $dt = Carbon::now();
        $nhatky = new nhatky();
        $nhatky->admin_id = Auth::user()->id;
        $nhatky->thoigian = $dt;
        $nhatky->thaotac = 'in đơn hàng ' .$donhang1->madonhang;
        $nhatky->save();
        //dd($chitietuser);
       return View('backend.inhoadonn',compact('thongtinkh','chitietdonhang','sum','sum1'));
   }
   public function getnhantaicuahang($id){
      $donhang = donhang::find($id);
      $donhang->status = "Nhận tại cửa hàng";
      $donhang->updated_at = new DateTime();
      $donhang->save();

      return redirect()->back();
   }
   public function getthanhtoantruoc($id){
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
         $kltt = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('weight_tt');
         $klqd = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('weight_qd');

         $length = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('length');
         $width = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('width');
         $height = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('height');
         $cvc = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phivc');
        $sum= $tienhang + $kh + $pdv + $phivcnd + $cvc;
       
        $donhang = donhang::find($id);
        $donhang->note = "thanh toán đủ";
        $donhang->coc = $sum;
        $donhang->totalqty = $sum;
       
        $donhang->updated_at = new DateTime();
        $donhang->save();

        return redirect()->back();
   }
   public function getthanhtoansau($id){
        $donhang = donhang::find($id);
        $donhang->note = "thanh toán sau"; 
        
        $donhang->updated_at = new DateTime();
        $donhang->save();
        return redirect()->back();
   }
   public function getkhieunai(){
    $khieunai = khieunai::select('khieunais.id','donhangs.madonhang','khieunais.created_at','khieunais.lydo','khieunais.image','khieunais.status')->join('donhangs','donhangs.id','=','khieunais.donhang_id')->get();


    return view('backend.khieunai',compact('khieunai'));
   }
   public function getxuly($id){
    $khieunai = khieunai::find($id);
    $khieunai->status = "đang xử lý";
    $khieunai->updated_at = new DateTime();
    $khieunai->save();

    
      //dd($donhang1);
      $dt = Carbon::now();
        $nhatky = new nhatky();
        $nhatky->admin_id = Auth::user()->id;
        $nhatky->thoigian = $dt;
        $nhatky->thaotac = 'giải quyết khiếu nại';
        $nhatky->save();
    return redirect()->back();
   }
   public function getdaxuly($id){
    try{  
            DB::beginTransaction();
            
            $khieunai = khieunai::find($id);
           // dd($luulink);
            $khieunai->delete($id);
            DB::commit(); 

       
            return redirect()->back();
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());

      } 
   }

   public function gettrahang($id){
        $donhang = donhang::find($id);
        $donhang->status = "Khách trả hàng"; 
        $donhang->updated_at = new DateTime();
        $donhang->save();
        return redirect()->back();

   }

   public function getlisttrahang(){
      $donhangtralai = donhang::select('donhangs.id','donhangs.madonhang','thongtinkhs.hoten','donhangs.status','donhangs.totalqty','donhangs.updated_at','donhangs.hoantien')->join('thongtinkhs','thongtinkhs.id','=','donhangs.thongtinkh_id')
      ->where('donhangs.status','Khách trả hàng')->orwhere('donhangs.status','Đã xử lý')
      ->get();
      $donhangtralai1 = donhang::select('donhangs.id','donhangs.madonhang','chitietusers.hoten','donhangs.status','donhangs.totalqty','donhangs.updated_at','donhangs.hoantien')
      ->join('users','users.id','=','donhangs.user_id')
      ->join('chitietusers','users.id','=','chitietusers.userss_id')
      ->where('donhangs.status','Khách trả hàng')->orwhere('donhangs.status','Đã xử lý')
      ->get();
     
      return view('backend.listtrahang',compact('donhangtralai','donhangtralai1'));
   }
   public function getchitiettrahang($id){
       $thongtinkh = thongtinkh::select('donhangs.id','thongtinkhs.hoten','thongtinkhs.sdt','thongtinkhs.diachi','donhangs.madonhang','donhangs.created_at','donhangs.note','thongtinkhs.email','thongtinkhs.thanhpho','donhangs.status')
        ->join('donhangs','donhangs.thongtinkh_id','=','thongtinkhs.id')
        ->where('donhangs.id',$id)->get();

        $chitietdonhang = chitietdonhang::select('chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.price','chitietdonhangs.quantity','chitietdonhangs.color','donhangs.totalqty','chitietdonhangs.image')
        ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->get();

       $kh = 0;
       $tygia =thongso::sum('tygia');
        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');
        $giaweb = $price_product*$tygia;
        $kiemhangs = donhang::select('kiemhang')->where('id',$id)->first();
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
           
           $sum1= ($tienhang + $kh + $pdv)-$coc;

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


    return view('backend.chitiettrahang',compact('thongtinkh','chitietdonhang','sum1','tienhang','pdv','kh','phivcnd','kltt','klqd','length','width','height','cvc','sum','coc','soluongsp'));

   }
   public function getchitiettrahangg($id){
       $thongtinkh = User::select('donhangs.id','chitietusers.hoten','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.note','users.email','chitietusers.thanhpho','donhangs.status')
       ->join('chitietusers','chitietusers.userss_id','=','users.id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->where('donhangs.id',$id)->get();

        $chitietdonhang = chitietdonhang::select('chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.price','chitietdonhangs.quantity','chitietdonhangs.color','donhangs.totalqty','chitietdonhangs.image')
        ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->get();

       $kh = 0;
        $tygia =thongso::sum('tygia');
        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');
        $giaweb = $price_product*$tygia;
        $kiemhangs = donhang::select('kiemhang')->where('id',$id)->first();
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
           
           $sum1= ($tienhang + $kh + $pdv)-$coc;

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


    return view('backend.chitiettrahangg',compact('thongtinkh','chitietdonhang','sum1','tienhang','pdv','kh','phivcnd','kltt','klqd','length','width','height','cvc','sum','coc','soluongsp'));

   }
   public function getxulytrahang(Request $request, $id){
      if(isset($request->vehicle1)){
         $vehicle = "Đã nhận hàng";
      }else{
         $vehicle = "chưa nhận hàng";
      }
  
      $donhang = donhang::find($id);
      $donhang->hoantien = $request->hoantien;
      $donhang->nhanlaihang = $vehicle;
      $donhang->status = "Đã xử lý";
      $donhang->save();
      return redirect()->route('admin.donhang.listtrahang');
   }
   public function getxulytrahangg(Request $request,$id){
      if(isset($request->nh)){
         $vehicle = "Đã nhận hàng";
      }else{
         $vehicle = "chưa nhận hàng";
      }
    
      $coc = donhang::where('donhangs.id',$id)->sum('coc');

      $donhang = donhang::find($id);
      $donhang->hoantien = $coc;
      $donhang->coc = null;
      $donhang->nhanlaihang = $vehicle;
      $donhang->status = "Đã xử lý";
      $donhang->save();

   

      return redirect()->route('admin.donhang.listtrahang');
   }
   public function getshipgiaohang(Request $request,$id){
      $donhang = donhang::where('id',$id)->first();
      // $d = substr('DV000000', 2, 5);
      // $n = 0;

      if(isset($request->nt1)){
         $nt = 'Shop trả';
      }elseif(isset($request->nt2)){
          $nt = 'Khách trả';
      }
        // $donvan2 = 'DT' . $d . $n;
        $donvan = new donvan();
        $donvan->donhang_id = $donhang->id;
        $donvan->nhavanchuyen_id = $request->dt;
        $donvan->madonvan = $request->mvd;
        $donvan->phitravanchuyen = $request->phi;
        $donvan->yeucau = $request->yc;
        $donvan->note = $nt;
        $donvan->status = "chờ giao hàng";
        $donvan->save();

     //  $donvan = DB::table('donvans')->select('madonvan')->get();
     //  if(isset($donvan)){
     //    $donvan1 = DB::table('donvans')->count('madonvan');
     //    $donvan2 = 'DV'.$d. ($donvan1 + 1);
     //    $donvan = new donvan();
     //    $donvan->donhang_id = $donhang->id;
     //    $donvan->nhavanchuyen_id = $request->dt;
     //    $donvan->madonvan = $donvan2;
     //    $donvan->phitravanchuyen = $request->phi;
     //    $donvan->yeucau = $request->yc;
     //    $donvan->note = $nt;
     //    $donvan->status = "chờ giao hàng";
     //    $donvan->save();
     // }else{
     //    $donvan2 = 'DT' . $d . $n;
     //    $donvan = new donvan();
     //    $donvan->donhang_id = $donhang->id;
     //    $donvan->nhavanchuyen_id = $request->dt;
     //    $donvan->madonvan = $donvan2;
     //    $donvan->phitravanchuyen = $request->phi;
     //    $donvan->yeucau = $request->yc;
     //    $donvan->note = $nt;
     //    $donvan->status = "chờ giao hàng";
     //    $donvan->save();
     // }
    return redirect()->back();
    }
 public function gethuyshipgiaohang($id){
    try{  
            DB::beginTransaction();
            
            $huydon = donvan::find($id);
           // dd($luulink);
            $huydon->delete($id);
            DB::commit(); 
            return redirect()->back();
        }catch(\Exception $exception){
        DB::rollback();
         \Log::error('loi:'.$exception->getMessage().$exception->getLine());

      } 
 }
 public function getchodonhang($id){
    $donhang = donhang::find($id);
        $donhang->status = "chờ đơn hàng"; 
        $donhang->updated_at = new DateTime();
        $donhang->save();
        return redirect()->back();
 }
 public function getlistgiaohang(){
  $donhang = donhang::select('donhangs.id','donhangs.madonhang','donvans.madonvan','donvans.status','nhavanchuyens.tennhavanchuyen','donvans.phitravanchuyen','donhangs.coc','donvans.created_at')
  ->join('donvans','donvans.donhang_id','=','donhangs.id')
  ->join('nhavanchuyens','nhavanchuyens.id','donvans.nhavanchuyen_id')
  
  ->orwhere('donhangs.thongtinkh_id' ,'<>',null)
  ->get();

   $donhang1 = DB::table('donhangs')->select('donhangs.id','donhangs.madonhang','donhangs.updated_at','khoiluongs.weight_tt')
        ->join('khoiluongs','khoiluongs.donhang_id','=','donhangs.id')
        ->join('thongtinkhs','thongtinkhs.id','=','donhangs.thongtinkh_id')
        ->where('donhangs.status','chờ đơn hàng')->get();

  $donhang2 = donhang::select('donhangs.id','donhangs.madonhang','donvans.madonvan','donvans.status','donvans.phitravanchuyen','donhangs.coc','donvans.created_at','nhavanchuyens.tennhavanchuyen','donvans.phitravanchuyen')
  ->join('donvans','donvans.donhang_id','=','donhangs.id')
  ->join('nhavanchuyens','nhavanchuyens.id','donvans.nhavanchuyen_id')
  ->orwhere('donhangs.user_id' ,'<>',null)
  
  ->get();

  $donhang4 = DB::table('donhangs')->select('donhangs.id','donhangs.madonhang','donhangs.updated_at','khoiluongs.weight_tt','chitietusers.hoten')
        ->join('khoiluongs','khoiluongs.donhang_id','=','donhangs.id')
        ->join('users','donhangs.user_id','=','users.id')
       ->join('chitietusers','chitietusers.userss_id','=','users.id')
        ->where('donhangs.status','chờ đơn hàng')->get();
    
  return view('backend.listgiaohang',compact('donhang','donhang1','donhang2','donhang4'));
 }
 public function getchitietgiaohang($id){
    $donhang = donhang::join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')->where('donhangs.id',$id)->get();
    $thongtinkh = thongtinkh::select('donhangs.id','thongtinkhs.hoten','thongtinkhs.sdt','thongtinkhs.diachi','donhangs.madonhang','donhangs.created_at','donhangs.note','thongtinkhs.email','thongtinkhs.thanhpho','donhangs.status','donhangs.chinhanh','donvans.created_at','donvans.status')
        ->join('donhangs','donhangs.thongtinkh_id','=','thongtinkhs.id')
        ->join('donvans','donhangs.id','=','donvans.donhang_id')
        ->where('donhangs.id',$id)->get();
    $donvan = donvan::select('donvans.id','donvans.madonvan','donvans.phitravanchuyen','donvans.note','donvans.yeucau','donvans.status')->join('donhangs','donhangs.id','=','donvans.donhang_id')->join('nhavanchuyens','nhavanchuyens.id','=','donvans.nhavanchuyen_id')->where('donhangs.id',$id)->get();
    $kh = 0;

       $tygia =thongso::sum('tygia');
        $qty = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('quantity');
        $price_product = chitietdonhang::join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
        ->where('donhangs.id',$id)->sum('price_product');
        $giaweb = $price_product*$tygia;
        $kiemhangs = donhang::select('kiemhang')

        ->where('id',$id)->first();
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



    return view('backend.chitietgiaohang',compact('donhang','thongtinkh','donvan','sum','coc','sum1'));
 }
  public function getchitietgiaohangg($id){
    $donhang = donhang::join('chitietdonhangs','chitietdonhangs.donhang_id','=','donhangs.id')->where('donhangs.id',$id)->get();
    $thongtinkh = User::select('donhangs.id','chitietusers.hoten','chitietusers.sodienthoai','chitietusers.diachi','donhangs.madonhang','donhangs.created_at','donhangs.note','users.email','chitietusers.thanhpho','donhangs.status','donhangs.chinhanh','donvans.created_at','donvans.status')
        ->join('chitietusers','chitietusers.userss_id','=','users.id')
        ->join('donhangs','donhangs.user_id','=','users.id')
        ->join('donvans','donhangs.id','=','donvans.donhang_id')
        ->where('donhangs.id',$id)->get();
    $donvan = donvan::select('donvans.id','donvans.madonvan','donvans.phitravanchuyen','donvans.note','donvans.yeucau','donvans.status')->join('donhangs','donhangs.id','=','donvans.donhang_id')->join('nhavanchuyens','nhavanchuyens.id','=','donvans.nhavanchuyen_id')->where('donhangs.id',$id)->get();
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
         $kltt = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('weight_tt');
         $klqd = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('weight_qd');

         $length = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('length');
         $width = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('width');
         $height = khoiluong::join('donhangs','donhangs.id','=','khoiluongs.donhang_id')->where('donhangs.id',$id)->sum('height');
         $cvc = phivanchuyen::join('donhangs','donhangs.id','=','phivanchuyens.donhang_id')->where('donhangs.id',$id)->sum('phivc');
        $sum= $tienhang + $kh + $pdv + $phivcnd + $cvc;
        
        $sum1= $sum - $coc;

        

    return view('backend.chitietgiaohangg',compact('donhang','thongtinkh','donvan','sum','coc','sum1'));
  }
 public function getxuatkho($id){
    $donvans = donvan::find($id);
    $donvans->status = 'Đang giao hàng';
    $donvans->save();

    return redirect()->back();
 }
 public function getxacnhangiaohang($id){
    $donvans = donvan::find($id);
    $donvans->status = 'Giao hàng thành công';
    $donvans->save();

    return redirect()->back();
 }
 public function getlistnaptien(){
  $congtien = congtien::select('congtiens.id','congtiens.sotien','chitietusers.hoten')
  ->join('users','users.id','=','congtiens.user_id')
  ->join('chitietusers','chitietusers.userss_id','=','users.id')
  ->get();
  $user = chitietusers::select('chitietusers.hoten','users.id')->join('users','users.id','=','chitietusers.userss_id')->get();

  return view('backend.listcongtien',compact('congtien','user'));
 }
 public function getnaptien(Request $request){


    $naptien = new congtien();
  $naptien->user_id = $request->khachhang;
  $naptien->sotien = $request->naptien;
  $naptien->save();


  $dt = Carbon::now();
  $nhatky = new nhatky();
  $nhatky->admin_id = Auth::user()->id;
  $nhatky->thoigian = $dt;
  $nhatky->thaotac = 'nap tiền cho khách hàng';
  $nhatky->save();

  return redirect()->back();
 }
 public function ajaxedittiennap(Request $request, $id){
    $ajaxcongtien = congtien::find($id);
      $ajaxcongtien->id = $id;
      $ajaxcongtien->sotien = $request->sotien;
   
      $ajaxcongtien->save();
      return redirect()->back();
 }
 public function getlisttygia(){

  $thongso = thongso::get();
 
  return view('backend.listtygia',compact('thongso'));
 }
  public function postlisttygia(Request $request){
    $thongso1 = thongso::select('id')->get();
    if($thongso1){
      $thongso1 = thongso::select('id')->delete();

      $tygia = new thongso();
      $tygia->ngaythem = $request->nt;
      $tygia->tygia = $request->tygia;
      $tygia->save();
    }
   

    $dt = Carbon::now();
    $nhatky = new nhatky();
    $nhatky->admin_id = Auth::user()->id;
    $nhatky->thoigian = $dt;
    $nhatky->thaotac = 'thêm tỷ giá';
    $nhatky->save();


    return redirect()->back();
  }
  public function getlisttuvan(){
    $tuvan = tuvan::get();
    return view('backend.tuvan',compact('tuvan'));
  }
}

