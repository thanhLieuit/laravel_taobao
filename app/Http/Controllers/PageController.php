<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\User;
use Auth;
use App\bieuphiha;
use App\Cart;
use App\CartItem;
use DB;
use App\chitietusers;
use App\lienhe;
use App\thongso;
use App\tuvan;
use App\donhang;
use App\thongtinkh;
use App\chitietdonhang;
use App\phivanchuyen;
use App\khoiluong;
use App\nhavanchuyen;
use App\donvan;
use App\Truycap;
use Carbon\Carbon;

class PageController extends Controller
{
    public function getdemo(){
        $data['getslide']= slide::all();
       
        return view('frontend.demo',$data);
    }
    public function getindex(){
        $data['getslide']= slide::all();
        $data['gethabieuphi']=bieuphiha::all();
        $data['thongso'] = thongso::sum('tygia');

        return view('frontend.index',$data);
    }
   public function getcanhan(){
        //$data['as']= User::all();
        $data['user'] = chitietusers::select('name','email','sodienthoai','diachi')->join('users','users.id','=','chitietusers.userss_id')->where('users.id',Auth::user()->id)->get();
       // dd($data);

        return view('frontend.canhan',$data);
    }
    public function glienhe(){
        $data['thongso'] = thongso::sum('tygia');
        return view('frontend.lienhe',$data);
    }
    public function plienhe(Request $request){
        $lienhe = new lienhe();
        $lienhe->hoten = $request->ht;
        $lienhe->email = $request->email;
        $lienhe->tieude = $request->td;
        $lienhe->noidung = $request->nd;
       // dd($lienhe);
        $lienhe->save();

        return redirect()->back();
    }
    public function gioithieu(){
        $data['thongso'] = thongso::sum('tygia');
        return view('frontend.gioithieu',$data);
    }
    public function bieuphi(){
        $data['thongso'] = thongso::sum('tygia');
        return view('frontend.bieuphi',$data);
    }
    public function congcudathang(){
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
        return view('frontend.congcudathang',$data);
    }
    public function huongdan(){
        $data['thongso'] = thongso::sum('tygia');
        return view('frontend.huongdan',$data);
    }
    public function taotaikhoantaobao(){
        $data['thongso'] = thongso::sum('tygia');
        return view('frontend.huongdantktaobao',$data);
    }
    public function timkiemsanpham(){
        $data['thongso'] = thongso::sum('tygia');
        return view('frontend.timkiemsanpham',$data);
    }
    public function diemchatluong(){
        $data['thongso'] = thongso::sum('tygia');
        return view('frontend.xemttshop',$data);
    }
    public function gtuvan(){
        return view('frontend.tuvan');
    }
    public function ptuvan(Request $request){
        $tuvan = new tuvan();
        $tuvan->hoten = $request->ht;
        $tuvan->email = $request->email;
        $tuvan->sdt = $request->sdt;
        $tuvan->noidung = $request->nd;
       // dd($lienhe);
        $tuvan->save();

        return redirect()->back();
    }
    public function gdonhangtutao(){
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
        return view('frontend.donhangtutao',compact('usertt'));
    }
    public function gchitietdonhangtutao($id){
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
      
    return view('frontend.chitietdonhangtutao',compact('thongtinkh','chitietdonhang','sum1','tienhang','pdv','kh','phivcnd','kltt','klqd','length','width','height','cvc','sum','coc','soluongsp','nhavanchuyen','donvan','donvan1','donvan2'));
    }
}
