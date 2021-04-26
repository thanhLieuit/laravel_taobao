<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('auth/register', 'Api\MemberController@register');
Route::post('auth/login', 'Api\MemberController@login');
Route::group(['middleware' => 'auth.jwt'], function () {
  Route::get('auth', 'Api\MemberController@user');
  Route::get('logout', 'Api\MemberController@logout');
});
Route::get('user-info/{id}', 'Api\MemberController@getUserInfo');

//Route::apiResource('products', 'Api\ProductController')->except(['update', 'store', 'destroy']);
Route::apiResource('carts', 'Api\CartController')->except(['update', 'index']);
Route::apiResource('orders', 'Api\OrderController')->except(['update', 'destroy','store'])->middleware('auth:api');

Route::post('/carts/{cart}', 'Api\CartController@addProducts');
Route::post('/carts/{cart}/checkout', 'Api\CartController@checkout');
Route::post('/tienhanhdathang/{id}', 'Api\CartController@dathang');
Route::post('/thanhtoan/{id}','Api\CartController@thanhtoan');



