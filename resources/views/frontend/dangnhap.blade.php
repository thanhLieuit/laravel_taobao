@extends('frontend.masters')
@section('main')
@section('title','Danatao | Trang cá nhân ')
<div style="  border-bottom: 1px solid #fff;" class="element02">
  <img style="width: 100%;height: 80px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
    </div>

<section>
	 <center>
 	<br>
 <div id="id01" class="login1">
 	<h3 style="color: #EB4D4B;margin-top: 60px;text-transform: uppercase;">Đăng nhập</h3>
  <form class="dangnhap" method="post" accept-charset="utf-8">
  	<h4 style="margin-left: -530px;margin-bottom: 0px">Tên:</h4>
       <input name="email" placeholder="Username" type="email" required="">
         <h4 style="margin-left: -485px;margin-bottom: 0px">Mật khẩu:</h4>
  <input name="password" placeholder="Password" type="password" required=""><br><br>
  <input style="width: 30%;height: 40px;border-radius: 30px;background-color: #EB4D4B;outline-style: none;color: #fff" type="submit" name="" value="ĐĂNG NHẬP"><br><br>
   {{ csrf_field() }}
  </form>
   <a style="color: #fff" href="dangky"><button style="width: 20%;height: 40px;border-radius: 30px;background-color: #EB4D4B;outline-style: none;"> ĐĂNG KÝ</button></a>
   <h3>Đăng nhập nhanh với tài khoản:</h3>
          <div class="dnn">
             <a href="redirect/facebook"><button  id="face1" type="button"> <i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;&nbsp;Facebook</button></a>
              <a href="redirect/google"><button  id="gmail1" type="button"> <i class="fa fa-google" aria-hidden="true"></i>&nbsp;&nbsp;Gmail</button></a>
             <br>	
 </div>
</div>
 </center>
</section>
	<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@stop