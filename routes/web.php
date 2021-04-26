<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/redirect/{social}', 'SocialAuthController@redirect');
Route::get('/callback/{social}', 'SocialAuthController@callback');

Route::get('demo2', 'PageController@getdemo');
Route::get('gioithieu','PageController@gioithieu')->name('gioithieu');
Route::get('lienhe','PageController@glienhe')->name('lienhe');
Route::post('lienhe','PageController@plienhe')->name('lienhe');
Route::get('bieuphi', 'PageController@bieuphi')->name('bieuphi');
Route::get('congcudathang','PageController@congcudathang')->name('congcudathang');
Route::get('huongdan', 'PageController@huongdan')->name('huongdan');
Route::get('huongdan/taotaikhoantaobao', 'PageController@taotaikhoantaobao')->name('huongdan/taotaikhoantaobao');
Route::get('huongdan/timkiemsanpham', 'PageController@timkiemsanpham')->name('huongdan/timkiemsanpham');
Route::get('huongdan/diemchatluong','PageController@diemchatluong')->name('huongdan/diemchatluong');
Route::get('tuvan','PageController@gtuvan')->name('tuvan');
Route::post('tuvan','PageController@ptuvan')->name('tuvan');
Route::get('donhangtutao','PageController@gdonhangtutao')->name('donhangtutao');
Route::get('chitietdonhangtutao/{id}','PageController@gchitietdonhangtutao')->name('chitietdonhangtutao');


Route::get('/get-post-chart-data', 'ChartDataController@getMonthlyPostData');
Route::get('/get-post-chart-data1', 'ChartDataController@getDaylyPostData');
Route::get('/get-post-chart-data2', 'ChartDataController@getWeeklyPostData');






Route::get('/giohang', 'CartController@getgiohang')->name('giohang');
Route::post('/giohang', 'CartController@postgiohang')->name('giohang');
Route::get('giohang/update/{id}/{qty}','CartController@ajaxUpdateCart');
Route::get('/shipping','CartController@getdiachi')->name('shipping');
Route::get('/giaohang','CartController@getgiaohang')->name('giaohang');
Route::post('/giaohang','CartController@postgiaohang')->name('giaohang');
Route::post('/dathang','CartController@getdathang')->name('dathang');
Route::get('/huy/{id}','CartController@gethuy')->name('huy');
Route::get('/dangky','UserController@getdangky')->name('dangky');
Route::post('/dangky','UserController@postdangky')->name('dangky');
Route::get('/canhan','UserController@getcapnhat')->name('canhan');
Route::post('/canhan','UserController@postcapnhat')->name('canhan');
Route::post('capnhatthongtin/{id}','UserController@postcapnhattt')->name('capnhatthongtin');
Route::get('thanhtoan/{id}','donhangcanhanhController@getthanhtoan')->name('thanhtoan');
Route::post('thanhtoan/{id}','donhangcanhanhController@postthanhtoan')->name('thanhtoan');



Route::group(['prefix' => 'tintuc'], function () {
    Route::get('/', 'tintucController@gettintuc')->name('tintuc');
    Route::get('kinhdoanh','tintucController@getchitiettintuckinhdoanh');
    Route::get('giaidap','tintucController@getchitiettintucgiaidap');
    Route::get('congty','tintucController@getchitiettintuccongty');
    Route::get('kinhdoanh/{slug}','tintucController@getchitiettintuc');
    Route::get('giaidap/{slug}','tintucController@getchitietgd'); 
    Route::get('congty/{slug}','tintucController@getchitietct');  
});
Route::group(['prefix' => 'tuyendung'], function () {
    Route::get('/', 'tuyendungController@gettuyendung')->name('tuyendung');
    Route::get('/{slug}','tuyendungController@chitiettuyendung');
});



Auth::guard('userss')->check(); 
Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'canhan'], function () {
    //Route::get('/', 'PageController@getcanhan')->name('canhan');
    Route::group(['prefix' => 'donhang'], function () {
       Route::get('tatcadonhang','donhangcanhanhController@gettatcadonhang')->name('canhan.donhang.tatcadonhang');
       Route::get('donhanghuy','donhangcanhanhController@getdonhanghuy')->name('canhan.donhang.donhanghuy');
       Route::get('tatcadonhang/chitietdonhang/{id}','donhangcanhanhController@getchitietdonhang')->name('canhan.donhang.tatcadonhang.chitietdonhang');
       Route::post('huydonhang/{id}','donhangcanhanhController@gethuydonhang')->name('canhan.donhang.huydonhang');
       Route::get('tatcadonhang/choduyet/{id}','donhangcanhanhController@getchoduyet')->name('canhan.donhang.tatcadonhang.choduyet');
       Route::post('tatcadonhang/coctien/{id}','donhangcanhanhController@getcoctien')->name('canhan.donhang.tatcadonhang.coctien');
       Route::get('tatcadonhang/chomuahang/{id}','donhangcanhanhController@getchomuahang')->name('canhan.donhang.tatcadonhang.chomuahang');
       Route::get('tatcadonhang/damuahang/{id}','donhangcanhanhController@getdamuahang')->name('canhan.donhang.tatcadonhang.damuahang');
       Route::get('tatcadonhang/hangdave/{id}','donhangcanhanhController@gethangdave')->name('canhan.donhang.tatcadonhang.hangdave');
       Route::post('xacnhangiao/{id}','donhangcanhanhController@postxacnhangiao')->name('canhan.donhang.xacnhangiao');
       Route::get('xacnhanthanhtoan/{id}','donhangcanhanhController@getxacnhanthanhtoan')->name('canhan.donhang.xacnhanthanhtoan');
       Route::get('giaodich','donhangcanhanhController@getgiaodich')->name('canhan.donhang.giaodich');
       Route::post('datlai/{id}','donhangcanhanhController@postdatlai')->name('canhan.donhang.datlai');
       Route::get('ghichu/{id}/{note}','donhangcanhanhController@ajaxUpdatenote');
       Route::get('tracuu','donhangcanhanhController@gettracuu')->name('canhan.donhang.tracuu');
       Route::get('luulink','donhangcanhanhController@getluulink')->name('canhan.donhang.luulink');
       Route::post('luulink','donhangcanhanhController@postluulink')->name('canhan.donhang.luulink');
       Route::get('xoalink/{id}','donhangcanhanhController@getxoalink')->name('canhan.donhang.xoalink');
       Route::get('khieunai/{id}','donhangcanhanhController@getkhieunai')->name('canhan.donhang.khieunai');
       Route::get('bangkhieunai','donhangcanhanhController@getbangkhieunai')->name('canhan.donhang.bangkhieunai');
       Route::post('bangkhieunaii/{id}','donhangcanhanhController@postbangkhieunaii')->name('canhan.donhang.bangkhieunaii');
       Route::post('bangkhieunaiii/{id}','donhangcanhanhController@postbangkhieunaiii')->name('canhan.donhang.bangkhieunaiii');
       Route::get('chogiaohang/{id}','donhangcanhanhController@getchogiaohang')->name('canhan.donhang.chogiaohang');
       Route::get('giaohangtannha/{id}','donhangcanhanhController@getgiaohangtannha')->name('canhan.donhang.giaohangtannha');

      
    }); 
    });
});
Auth::routes();

Route::get('/', 'PageController@getindex')->name('/');
Route::post('/users/logout','Auth\LoginController@userLogout')->name('user.logout');

Route::group(['prefix' => 'admin'], function () {
        Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
        Route::post('/login','Auth\AdminLoginController@login')->name('admin.login');
        Route::get('/', 'AdminConTroller@index')->name('admin.dashboard');
        Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::middleware(['auth:admin'])->group(function () {
Route::group(['namespace' => 'Admin'], function () {

    Route::group(['prefix' => 'admin'], function () {
        
       
        Route::group(['prefix' => 'Slider'], function () {
            Route::get('/','SliderController@getslider');
            Route::get('add','SliderController@getaddslider');
            Route::post('add','SliderController@postaddslider');
            Route::get('edit/{id}','SliderController@geteditslider');
            Route::post('edit/{id}','SliderController@posteditslider');
            Route::get('delete/{id}','SliderController@getdeletetslider');
        });
        Route::group(['prefix' => 'bieuphi'], function () {
            Route::get('edit/{id}','bieuphiController@editbieuphi');
            Route::post('edit/{id}','bieuphiController@posteditbieuphi');
        });
        Route::group(['prefix' => 'tintuc'], function () {
            Route::get('/','TintucController@gettintuc')->name('admin.tintuc');
            Route::get('add','TintucController@addtintuc');
            Route::post('add','TintucController@postaddtintuc');
            Route::get('edit/{slug}','TintucController@edittintuc');
            Route::post('edit/{slug}','TintucController@postedittintuc');
            Route::get('delete/{id}','TintucController@deletetintuc' );
        });
        Route::group(['prefix' => 'tuyendung'], function () {
            Route::get('/','TuyendungController@gettuyendung');
            Route::get('add','TuyendungController@getaddtuyendung');
            Route::post('add','TuyendungController@postaddtuyendung');
            Route::get('edit/{slug}','TuyendungController@getedittuyendung');
            Route::post('edit/{slug}','TuyendungController@postedittuyendung');
            Route::get('delete/{id}','TuyendungController@deletetuyendung' );
        });
        Route::group(['prefix' => 'donhang'], function () {
             Route::get('/list',[
            'as' => 'admin/donhang/list',
            'uses' => 'donhangController@getlistdonhang',
            'middleware' =>'checkacl:list-donhhang'
            ]);
          
            Route::get('duyetdon/{id}','donhangController@getduyetdon');
            Route::post('duyetdon/{id}','donhangController@postduyetdon');
            Route::get('chitietdonhang/{id}','donhangController@getchitietdonhang');
            Route::get('/chomuahang/{id}','donhangController@getchomuahang');
            Route::get('/nhapthongtin/{id}','donhangController@getnhapthongtin');
            Route::post('/nhapthongtin/{id}','donhangController@postnhapthongtin');
            Route::get('/ketthucdon/{id}','donhangController@getketthucdon');
            Route::get('/chitietdonhang/inhoadon/{id}','donhangController@getinhoadon')->name('admin.donhang.chitietdonhang.inhoadon');

            Route::get('/huydonhang/{id}','donhangController@gethuydonhang')->name('admin.donhang.huydonhang');
            Route::get('/taodonhang',[
            'as' => 'admin/donhang/taodonhang',
            'uses' => 'donhangController@gettaodonhang',
            'middleware' =>'checkacl:donhhang-add'
            ]);
            Route::post('/taodonhang',[
            'as' => 'admin/donhang/taodonhang',
            'uses' => 'donhangController@posttaodonhang',
            'middleware' =>'checkacl:donhhang-add'
            ]);

            Route::get('/coctien/{id}','donhangController@getcoctien')->name('admin.donhang.coctien');
            Route::post('/coctien/{id}','donhangController@postcoctien')->name('admin.donhang.coctien');
            Route::get('chitietdonhangg/{id}','donhangController@getchitietdonhangg');
            Route::get('/chitietdonhangg/inhoadonn/{id}','donhangController@getinhoadonn')->name('admin.donhang.chitietdonhang.inhoadonn');
            Route::get('/nhantaicuahang/{id}','donhangController@getnhantaicuahang')->name('admin.donhang.nhantaicuahang');
            Route::get('/thanhtoantruoc/{id}','donhangController@getthanhtoantruoc')->name('admin.donhang.thanhtoantruoc');
            Route::get('/thanhtoansau/{id}','donhangController@getthanhtoansau')->name('admin.donhang.thanhtoansau');

          
            Route::get('/khieunai',[
            'as' => 'admin/donhang/khieunai',
            'uses' => 'donhangController@getkhieunai',
            'middleware' =>'checkacl:khieunai-list'
            ]);
            Route::get('/xuly/{id}','donhangController@getxuly')->name('admin.donhang.xuly');
            Route::get('/daxuly/{id}','donhangController@getdaxuly')->name('admin.donhang.daxuly');
            Route::get('/trahang/{id}','donhangController@gettrahang')->name('admin.donhang.trahang');

            
            Route::get('/listtrahang',[
            'as' => 'admin/donhang/listtrahang',
            'uses' => 'donhangController@getlisttrahang',
            'middleware' =>'checkacl:trahang-list'
            ]);
            Route::get('/chitiettrahang/{id}','donhangController@getchitiettrahang')->name('admin.donhang.chitiettrahang');
            Route::get('/chitiettrahangg/{id}','donhangController@getchitiettrahangg')->name('admin.donhang.chitiettrahangg');
            Route::get('/xulytrahang/{id}','donhangController@getxulytrahang')->name('admin.donhang.xulytrahang');
            Route::get('/xulytrahangg/{id}','donhangController@getxulytrahangg')->name('admin.donhang.xulytrahangg');
           Route::get('/shipgiaohang/{id}','donhangController@getshipgiaohang')->name('admin.donhang.shipgiaohang');
           Route::get('/huyshipgiaohang/{id}','donhangController@gethuyshipgiaohang')->name('admin.donhang.huyshipgiaohang');

           Route::get('/listgiaohang','donhangController@getlistgiaohang')->name('admin.donhang.listgiaohang');
           Route::get('/chitietgiaohang/{id}','donhangController@getchitietgiaohang')->name('admin.donhang.chitietgiaohang');
           Route::get('/chitietgiaohangg/{id}','donhangController@getchitietgiaohangg')->name('admin.donhang.chitietgiaohangg');
           Route::get('/xuatkho/{id}','donhangController@getxuatkho')->name('admin.donhang.xuatkho');
            Route::get('/xacnhangiaohang/{id}','donhangController@getxacnhangiaohang')->name('admin.donhang.xacnhangiaohang');

            Route::get('/chodonhang/{id}','donhangController@getchodonhang')->name('admin.donhang.chodonhang');

            Route::get('/listnaptien','donhangController@getlistnaptien')->name('admin.donhang.listnaptien');
            Route::get('/naptien','donhangController@getnaptien')->name('admin.donhang.naptien');
            Route::get('edittiennap/{id}/{sotien}','donhangController@ajaxedittiennap');
        });

        Route::get('/nhavanchuyen','VanchuyenController@getnhavanchuyen')->name('admin.nhavanchuyen');
        Route::get('nhavanchuyen/themmoidoitac','VanchuyenController@getthemmoidoitac')->name('admin.nhavanchuyen.themmoidoitac');
        Route::get('/listlienhe','khController@gelistlienhe')->name('admin.listlienhe');
        Route::get('/xulylienhe/{id}','khController@getxulylienhe')->name('admin.xulylienhe');

        Route::group(['prefix' => 'user'], function () {
            
            Route::get('/listuser',[
            'as' => 'admin/user/listuser',
            'uses' => 'UserAdminController@getListInfo',
            'middleware' =>'checkacl:user-list'
            ]);
            Route::get('/add',[
            'as' =>'admin/user/add',
            'uses' =>'UserAdminController@getadduser',
            'middleware' =>'checkacl:user-add'
            ]);
             Route::post('/add',[
            'as' =>'admin/user/add',
            'uses' =>'UserAdminController@postadduser',
            'middleware' =>'checkacl:user-add'
            ]);
            Route::get('edituser/{id}',[
            'as' =>'admin/user/edituser',  
            'uses' =>'UserAdminController@geteditinfo',
            'middleware' =>'checkacl:user-edit'     
            ]);
            Route::post('edituser/{id}',[
            'as' =>'admin/user/edituser', 
            'uses' =>'UserAdminController@posteditinfo',
            'middleware' =>'checkacl:user-edit'      
            ]);
            Route::get('deleteuser/{id}',[
             'as' =>'admin/user/deleteuser', 
            'uses' =>'UserAdminController@getdeleteinfo',
            'middleware' =>'checkacl:user-delete'
            ]);

            Route::get('/listrole',[
            'as' => 'admin/user/listrole',
            'uses' => 'RoleController@getlistrole',
            'middleware' =>'checkacl:role-list'
            ]);
            Route::get('/addrole',[
            'as' => 'admin/user/addrole',
            'uses' => 'RoleController@getaddrole',
            'middleware' =>'checkacl:role-add'
            ]);
            Route::post('/addrole',[
            'as' => 'admin/user/addrole',
            'uses' => 'RoleController@postaddrole',
            'middleware' =>'checkacl:role-add'
            ]);
            Route::get('/editrole/{id}',[
            'as' => 'admin/user/editrole',
            'uses' => 'RoleController@geteditrole',
            'middleware' =>'checkacl:role-edit'
            ]);
            Route::post('/editrole/{id}',[
            'as' => 'admin/user/editrole',
            'uses' => 'RoleController@posteditrole',
            'middleware' =>'checkacl:role-edit'
            ]);
            Route::get('/deleterole/{id}',[
            'as' => 'admin/user/deleterole',
            'uses' => 'RoleController@getdeleterole',
            'middleware' =>'checkacl:role-delete'
            ]);

            Route::get('/addpremission',[
            'as' => 'admin/user/addpremission',
            'uses' => 'RoleController@getaddpremission',
            'middleware' =>'checkacl:permission-add'
            ]);
            Route::post('/addpremission',[
            'as' => 'admin/user/addpremission',
            'uses' => 'RoleController@postaddpremission',
            'middleware' =>'checkacl:permission-add'
            ]);

        });  
     Route::get('/danhsachnap',[
        'as' => 'admin/danhsachnap',
        'uses' =>'donhangController@getlistnap',
        'middleware' =>'checkacl:list-nap'
        ]);
    Route::get('/listtygia',[
        'as' => 'admin/listtygia',
        'uses' =>'donhangController@getlisttygia',
    ]);
    Route::post('/listtygia',[
        'as' => 'admin/listtygia',
        'uses' =>'donhangController@postlisttygia',
    ]);
    Route::get('/listtuvan',[
        'as' => 'admin/listtuvan',
        'uses' =>'donhangController@getlisttuvan',
    ]);
    Route::post('/listtuvan',[
        'as' => 'admin/listtuvan',
        'uses' =>'donhangController@postlisttuvan',
    ]);
   

    Route::get('/xacnhan/{id}','donhangController@getxacnhan')->name('admin.xacnhan');

    Route::group(['prefix' => 'khachhang'], function () {
         Route::get('danhsachkhachhang',[
        'as' => 'admin/khachhang/danhsachkhachhang',
        'uses' =>'khController@getlistkh',
        'middleware' =>'checkacl:list-khachhang'
        ]);
        Route::get('themkhachhang',[
        'as' => 'admin/khachhang/themkhachhang',
        'uses' =>'khController@getthemkh',
        'middleware' =>'checkacl:khachhang-add'
        ]);
        Route::post('themkhachhang',[
        'as' => 'admin/khachhang/themkhachhang',
        'uses' =>'khController@postthemkh',
        'middleware' =>'checkacl:khachhang-add'
        ]);
        
        Route::get('thongtinchitiet/{id}',[
        'as' => 'admin/khachhang/thongtinchitiet',
        'uses' =>'khController@getthongtinkh'
        ]);
        Route::get('editkhachang/{id}',[
        'as' => 'admin/khachhang/editkhachang',
        'uses' =>'khController@geteditkhachang',
        'middleware' =>'checkacl:edit-khachhang'
        ]);
        Route::post('editkhachang/{id}',[
        'as' => 'admin/khachhang/editkhachang',
        'uses' =>'khController@posteditkhachang',
        'middleware' =>'checkacl:edit-khachhang'
        ]);
        Route::get('deletekhachhang/{id}',[
        'as' => 'admin/khachhang/deletekhachhang',
        'uses' =>'khController@getdeletekhachhang',
        'middleware' =>'checkacl:delete-khachhang'
        ]);
        Route::get('themnhomkhachhang',[
        'as' => 'admin/khachhang/themnhomkhachhang',
        'uses' =>'khController@getthemnhomkhachhang',
        'middleware' =>'checkacl:nhomkhachhang-add'
        ]);
        Route::post('themnhomkhachhang',[
        'as' => 'admin/khachhang/themnhomkhachhang',
        'uses' =>'khController@postthemnhomkhachhang',
        'middleware' =>'checkacl:nhomkhachhang-add'
        ]);
        Route::get('danhsachnhomkhachhang',[
        'as' => 'admin/khachhang/danhsachnhomkhachhang',
        'uses' =>'khController@getdanhsachnhomkhachhang',
        'middleware' =>'checkacl:list-nhomkhachhang'
        ]);
        Route::get('deletenhomkh/{id}',[
        'as' => 'admin/khachhang/deletenhomkh',
        'uses' =>'khController@getdeletenhomkh',
        'middleware' =>'checkacl:delete-khachhang'
        ]);

    });




});  
  });
});

