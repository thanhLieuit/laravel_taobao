<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Cart;
use App\CartItem;
use App\Http\Resources\CartItemCollection as CartItemCollection;
use App\donhang;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\User;
use App\chitietdonhang;
use App\Transation;
use App\Paymethod;

class CartController extends Controller
{
    /**
     * Store a newly created Cart in storage and return the data to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        if (Auth::guard('api')->check()) {
            $userID = auth('api')->user()->getKey();
        }

        //$user = JWTAuth::authenticate($request->token);

        $cart = Cart::create([
            'id' => md5(uniqid(rand(), true)),
            'key' => md5(uniqid(rand(), true)),
            'user_id' => isset($userID) ? $userID : null,

        ]);
        return response()->json([
            'Message' => 'A new cart have been created for you!',
            'cartToken' => $cart->id,
            'cartKey' => $cart->key,
        ], 201);

    }

    /**
     * Display the specified Cart.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart, Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'cartKey' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'errors' => $validator->errors(),
        //     ], 400);
        // }

        // $cartKey = $request->input('cartKey');
        // if ($cart->key == $cartKey) {
            return response()->json([
                'cart' => $cart->id,
                'Items in Cart' => $cart->items,
            ], 200);

        // } else {

        //     return response()->json([
        //         'message' => 'The CarKey you provided does not match the Cart Key for this Cart.',
        //     ], 400);
        // }

    }

    /**
     * Remove the specified Cart from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cartKey' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        $cartKey = $request->input('cartKey');

        if ($cart->key == $cartKey) {
            $cart->delete();
            return response()->json(null, 204);
        } else {

            return response()->json([
                'message' => 'The CarKey you provided does not match the Cart Key for this Cart.',
            ], 400);
        }

    }

    /**
     * Adds Products to the given Cart;
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return void
     */
    public function addProducts(Cart $cart, Request $request)
    {
        $validator = Validator::make($request->all(), [
           // 'cartKey' => 'required',
            'quantity' => 'required|numeric|min:1|max:10',
            'itemName' =>'required',
            'size' => 'required',  
            'color' => 'required',
            'itemPriceNDT' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

      //  $cartKey = $request->input('cartKey');
        $quantity = $request->input('quantity');
        $itemName = $request->input('itemName');
        $size = $request->input('size');
        $color = $request->input('color');
        $itemPriceNDT = $request->input('itemPriceNDT');
        $tt =  $quantity * $itemPriceNDT;
        $aliwangwang = $request->input('aliwangwang');
        $shopId = $request->input('shopId');
        $shopName = $request->input('shopName');
        $shopLink = $request->input('shopLink');
        $website = $request->input('website');
        $itemImage = $request->input('itemImage');
        $itemLink = $request->input('itemLink');
        $saleLocation = $request->input('saleLocation');
        $stock = $request->input('stock');
      //  if ($cart->key == $cartKey) {

            //check if the the same product is already in the Cart, if true update the quantity, if not create a new one.
            

          

            $cartItem = CartItem::where([

                'cart_id' => $cart->getKey(),
                'itemName' => $itemName
            ])->first();

            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->size = $size;
                $cartItem->color = $color;
                $cartItem->itemPriceNDT = $itemPriceNDT;

                CartItem::where([
                    'cart_id' => $cart->getKey(),
                    'itemName' => $itemName,
                    'itemImage' => $itemImage,
                    'status' => 0,
                    'itemLink' => $itemLink,
                    'saleLocation'=> $saleLocation,
                    'stock'=> $stock,
                    'aliwangwang'=> $aliwangwang,
                    'shopId'=> $shopId,
                    'shopName'=> $shopName,
                    'shopLink'=> $shopLink,
                    'website'=> $website
                ])->update(['quantity' => $quantity,
                            'size' => $size,
                            'price' => $tt,
                            'color' => $color,
                            'itemPriceNDT'=> $itemPriceNDT,
                            ]);
            } else {
                CartItem::create([
                    'cart_id' => $cart->getKey(),
                    'quantity' => $quantity,
                    'itemName' => $itemName,
                    'size' => $size,
                    'price' => $tt,
                    'itemPriceNDT' => $itemPriceNDT,
                    'color' => $color,
                    'status' => 0,
                    'itemLink' => $itemLink,
                    'itemImage'=> $itemImage,
                    'saleLocation'=> $saleLocation,
                    'stock'=> $stock,
                    'aliwangwang'=> $aliwangwang,
                    'shopId'=> $shopId,
                    'shopName'=> $shopName,
                    'shopLink'=> $shopLink,
                    'website'=> $website
                ]);
            }

            $sanpham = DB::table('cart_items')->where('cart_id',$cart->id)->get();           
            $soluong =  DB::table('cart_items')->where('cart_id',$cart->id)->count('quantity');
            return response()->json([
                'message' => 'The Cart was updated with the given product information successfully',
                'thông báo' => 'có '.$soluong.' sản phẩm',
                'sản phẩm' => $sanpham,
            ], 200);

        // } else {

        //     return response()->json([
        //         'message' => 'The CarKey you provided does not match the Cart Key for this Cart.',
        //     ], 400);
        // }

    }

    /**
     * checkout the cart Items and create and order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return void
     */
    public function dathang(Request $request, CartItem $cart_id)
    {   
        $validator = Validator::make($request->all(), [
            'phivcnoidia' => 'required',
            'discount' => 'required',
            ]);

        if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 400);
            }


        if (Auth::guard('api')->check()) {
            $userID = auth('api')->user()->getKey();
        }   

        $cartKey = $request->input('cartKey');
        $phivcnoidia = $request->input('phivcnoidia');
        $discount = $request->input('discount');
            
        $d = substr('DH000000', 2, 5);
        $n =0 ;

        $price = DB::table('cart_items')->where('cart_id',$cartKey)->sum('price');
        $tygia = 3.335;

        $tienhang = round(($price * $tygia) - $discount);
        $pdv = 0;

            if( $tienhang > 0 && $tienhang < 10000000) 
            {
                $pdv = ROUND($price * 0.05);
            }
            if( $tienhang > 10000000 && $tienhang < 50000000) 
            {
                $pdv = ROUND($price * 0.04);
            }
            if( $tienhang > 50000000 && $tienhang < 100000000) 
            {
                $pdv = ROUND($price * 0.03);
            }
            if( $tienhang > 100000000 && $tienhang < 200000000) 
            {
                $pdv = ROUND($price * 0.02);
            }
            if( $tienhang >= 200000000) 
            {
                $pdv = ROUND($price * 0.01);
            }

        $qty= $tienhang + $phivcnoidia + $pdv;

         $donhang = DB::table('donhangs')->select('madonhang')->where('cart_item_id',$cart_id)->get();

        if ($donhang) {
           $donhang3 = DB::table('donhangs')->count('madonhang');

           $donhang4 = 'DH'.$d. ($donhang3 + 1);

            $donhang = donhang::create([
                    'user_id' => isset($userID) ? $userID : null,
                    'madonhang' =>$donhang4,
                    'cart_item_id' => $cartKey,
                    'locationship'=> 'null',
                    'totalqty' => $qty,
                    'status' => 'mở'
                    ]);
               
              $donhang1 = DB::table('cart_items')->select('cart_items.cart_id','cart_items.name_product','cart_items.size','cart_items.color','cart_items.price','cart_items.quantity')
              
               ->where('cart_items.cart_id',$cartKey)->get();


               foreach ($donhang1 as $donhang1) {

                $chitietdonhang = new chitietdonhang();
                $chitietdonhang->donhang_id = $donhang->id;
                $chitietdonhang->name_product = $donhang1->name_product;
                $chitietdonhang->size = $donhang1->size;
                $chitietdonhang->color = $donhang1->color;
                $chitietdonhang->price = $donhang1->price;
                $chitietdonhang->quantity = $donhang1->quantity;
                $chitietdonhang->save();
               }

            

        }else{
           $donhang4 =  'DH' . $d . $n;

           $donhang = donhang::create([
                    'user_id' => isset($userID) ? $userID : null,
                    'madonhang' =>$donhang4,
                    'cart_item_id' => $cartKey,
                    'locationship'=> 'null',
                    'totalqty' => $qty,
                    'status' => 'mở'
                    ]);
               
            $donhang1 = DB::table('cart_items')->select('cart_items.cart_id','cart_items.name_product','cart_items.size','cart_items.color','cart_items.price','cart_items.quantity')->where('cart_items.cart_id',$cartKey)->get();


               foreach ($donhang1 as $donhang1) {

                $chitietdonhang = new chitietdonhang();
                $chitietdonhang->donhang_id = $donhang->id;
                $chitietdonhang->name_product = $donhang1->name_product;
                $chitietdonhang->size = $donhang1->size;
                $chitietdonhang->color = $donhang1->color;
                $chitietdonhang->price = $donhang1->price;
                $chitietdonhang->quantity = $donhang1->quantity;
                $chitietdonhang->save();
               }

        }

            $chitietdonhang3 = DB::table('chitietdonhangs')->select('chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.color','chitietdonhangs.price','chitietdonhangs.quantity')
            ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
            ->where('donhangs.id',$donhang->id)->get();

                   
            return response()->json([
                'message' => 'Đơn hàng được tạo',
                'đơn hàng' => $donhang->madonhang,
                'chi tiết đơn hàng' => $chitietdonhang3,
                'Tông tiền ( tạm tính)' => $donhang,
            ], 200);        
                      
    }     
    public function thanhtoan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'locationship' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors(),
                ], 400);
            }
        
            $donhang1 = donhang::findOrFail($id);
            $donhang1->locationship  = $request->input('locationship');
            $donhang1->status  = 'dong';
            $donhang1->save();

            $pay_id = DB::table('paymethods')->select('id','ten','mota')->first();
            $transation = Transation::create([
                'donhang_id' => $donhang1->id,
                'pay_id' =>$pay_id->id,
                'masogiaodich' => md5(uniqid(rand(), true)),
                'token'=> null,
                'discount' => null,
                'sum' => $donhang1->totalqty,
                'status' => 'đã nhận đơn hàng'
                ]);

             $chitietdonhang3 = DB::table('chitietdonhangs')->select('chitietdonhangs.name_product','chitietdonhangs.size','chitietdonhangs.color','chitietdonhangs.price','chitietdonhangs.quantity')
            ->join('donhangs','donhangs.id','=','chitietdonhangs.donhang_id')
            ->where('donhangs.id',$donhang1->id)->get();

            return response()->json([
                
                 'sản phẩm' => $chitietdonhang3,
                 'giá' => $transation->sum,

                 'TK ngân hàng' => $pay_id->ten,
                 'số tài khoản' => $pay_id->mota,
                 'message' => 'đơn hàng của hàng đang chờ kiểm duyệt, ban có thể thanh toán để đơn hàng được xác nhận',
                ], 200);

       
    }



}