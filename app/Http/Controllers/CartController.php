<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cart;
use App\CartItem;
use Auth;
use DB;
use DateTime;
use App\User;
use App\chitietusers;
use App\donhang;
use App\chitietdonhang;
use Goutte;
use App\thongso;

class CartController extends Controller
{
  
	public function getgiohang() {
  		$cart = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->get();
  		$price = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->sum('price');
  		//dd($price);

    	return view('frontend.giohang',compact('cart','price'));
  	}
    public function postgiohang(Request $request){
      $cart = DB::table('carts')->select('cart_id')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->first();
      $d = substr('DH000000', 2, 5);
      $n = 0;
  
      $donhang = DB::table('donhangs')->select('madonhang')
      ->where('cart_item_id',$cart->cart_id)
      ->get();
      if(isset($request->kh)){
         $kh1 = 1;
      }else{
         $kh1 = 0;
      }
       if(isset($request->sl)){
         $sl1 = 1;
      }else{
         $sl1 = 0;
      }
      if(isset($donhang)){
        $donhang4 = donhang::select('status')
          ->where('user_id',auth::user()->id)
          ->where('status','chờ duyệt đơn')
          ->first();

        if($donhang4 && $donhang4->status == "chờ duyệt đơn")
        {
          $donhang3 = donhang::select('id')
          ->where('user_id',auth::user()->id)
          ->where('status','chờ duyệt đơn')
          ->first();
           $donhang3->kiemhang = $kh1;
           $donhang3->save();
        }else{
          $donhang1 = DB::table('donhangs')->count('madonhang');
          $donhang2 = 'DH'.$d. ($donhang1 + 1);
          $donhang = new donhang();
          $donhang->user_id = Auth::user()->id;
          $donhang->madonhang = $donhang2;
          $donhang->cart_item_id = null;
          $donhang->totalqty = null;
          $donhang->kiemhang = $kh1;
          $donhang->sale = $sl1;
          $donhang->status = 'chờ duyệt đơn';
          $donhang->save();
        }
                
      }else {
      $donhang2 =  'DH' . $d . $n;

        $donhang = new donhang();
        $donhang->user_id = Auth::user()->id;
        $donhang->madonhang = $donhang2;
        $donhang->cart_item_id = null;
        $donhang->totalqty = null;
        $donhang->kiemhang = $kh1;
        $donhang->status = 'chờ duyệt đơn';
        $donhang->save();

      } 
      return view('frontend.checkout');
    }
  	public function ajaxUpdateCart(Request $request,$id) {
  		
	  		$cartajax = CartItem::find($id);
	  		$cartajax->id = $id;
	  		$cartajax->quantity = $request->qty;
	  		$cartajax->updated_at = new DateTime();
	        $cartajax->save();

	     
	        $itemPriceNDT = CartItem::where('id',$id)->sum('itemPriceNDT');
	        $quantity =  CartItem::where('id',$id)->sum('quantity');
	        $priceto = $itemPriceNDT * $quantity ;
   			  $cartajax1 = CartItem::find($id);
	        $cartajax1->price = $priceto;
	        $cartajax1->save();
	        //dd($cartajax1);
	  		return redirect()->back();
  		
  	}
    public function gethuy($id){
      $cart = CartItem::select()->where('id',$id)->delete();

      return redirect()->back();
    }
  	public function getdiachi(){

  		return view('frontend.checkout');
  	}
  	

  	public function  getgiaohang(){
  		$cart = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->get();
  		$price = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->sum('price');

      $qty = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->sum('quantity');
      // dd($qty);
      $itemPriceNDT = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->sum('itemPriceNDT');
     
  		$tygia =thongso::sum('tygia');
      $kh = 0;

      $kiemhangs = donhang::select('kiemhang')->where('status','chờ duyệt đơn')->where('user_id',Auth::user()->id)
      ->first();
      if($kiemhangs->kiemhang == 1){
        if($itemPriceNDT >= 10){
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
      $tienhang = ($price * $tygia);
      $soluongsp = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->count('cart_items.id');
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
      

  		$countcart = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->count();
  		$sum= ($price * $tygia) + $kh + $pdv;
    // dd($sum);
  		$user = chitietusers::select('name','email','sodienthoai','diachi','thanhpho')->join('users','users.id','=','chitietusers.userss_id')->where('users.id',Auth::user()->id)->get();

  		return view('frontend.giaohang',compact('cart','price','sum','countcart','user','kh','pdv','tygia'));
  	}

  	public function postgiaohang(Request $request){
  		$cart = DB::table('carts')->select('cart_id')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->first();
      
  	 	$user = chitietusers::select('diachi')->join('users','users.id','=','chitietusers.userss_id')->where('users.id',Auth::user()->id)->get();

  	 	$price = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->sum('price');
 $qty = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->sum('quantity');
     
      $itemPriceNDT = DB::table('carts')->join('cart_items','cart_items.cart_id','=','carts.id')->where('user_id',Auth::user()->id)->sum('itemPriceNDT');
     $tygia =thongso::sum('tygia');
      $kh = 0;

      $kiemhangs = donhang::select('kiemhang')->where('status','chờ duyệt đơn')->where('user_id',Auth::user()->id)
      ->first();
      if($kiemhangs->kiemhang == 1){
        if($itemPriceNDT >= 10){
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
      $tienhang = ($price * $tygia);
     // dd($tienhang);
      $pdv = 0;

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
      
     

  	 	$sum= ($price * $tygia) + $kh + $pdv;


  	 	$donhang = donhang::select('id')->where('user_id',Auth::user()->id)->where('status','chờ duyệt đơn')->first();
  			$donhang->totalqty = $sum;
        $donhang->note = $request->note;
  			$donhang->status = 'chờ xác nhận';
  			$donhang->save();
 
  			$donhang3 = DB::table('cart_items')
  			->select('cart_items.cart_id','cart_items.itemName','cart_items.size','cart_items.color','cart_items.price','cart_items.quantity','cart_items.itemPriceNDT')
               ->where('cart_items.cart_id',$cart->cart_id)->get();

               foreach ($donhang3 as $donhang3) {

                $chitietdonhang = new chitietdonhang();
                $chitietdonhang->donhang_id = $donhang->id;
                $chitietdonhang->name_product = $donhang3->itemName;
                $chitietdonhang->size = $donhang3->size;
                $chitietdonhang->color = $donhang3->color;
                $chitietdonhang->price = $donhang3->price;
                $chitietdonhang->price_product = $donhang3->itemPriceNDT;
                $chitietdonhang->quantity = $donhang3->quantity;
                //$chitietdonhang->status = $request->kh;
              	$chitietdonhang->save();
               }

  
  	
  	 	$cart1 = CartItem::select()->where('cart_id',$cart->cart_id)->delete();



  		
  		return view('frontend.dathang',compact('donhang4'));
  	}
}
