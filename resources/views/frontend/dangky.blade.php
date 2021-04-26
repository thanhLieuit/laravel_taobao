@extends('frontend.masters')
@section('main')
@section('title','Danatao | Trang cá nhân ')
<div style="  border-bottom: 1px solid #fff;" class="element02">
  <img style="width: 100%;height: 80px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
    </div>

<section>
	  <center> 
      <div id="id01">
        <h3 style="margin-top: 100px;color: #EB4D4B;text-transform: uppercase;">Đăng ký tài khoản</h3>
   <form class="dangnhap" method="post" accept-charset="utf-8">
       <h4 style="margin-left: -530px;margin-bottom: 0px">Họ và Tên:</h4>
 <input class="nhap1" name="name" placeholder="Username" type="text" required="">
   <h4 style="margin-left: -513px;margin-bottom: 0px">Email:</h4>
 <input name="email" placeholder="Email" type="email" required="">
  <h4 style="margin-left: -485px;margin-bottom: 0px">Mật khẩu:</h4>
   <input name="password" placeholder="Password" type="password" required="">
  <h4 style="margin-left: -421px;margin-bottom: 0px">Nhập lại mật khẩu:</h4>
   <input name="" placeholder="Password" type="password" required=""><br><br>
  <input style="width: 30%;height: 40px;border-radius: 30px;background-color: #EB4D4B;outline-style: none;color: #fff" type="submit" name="" value="ĐĂNG KÝ"><br><br>
  {{ csrf_field() }}
  </form>
     <a style="color: #fff" href="dangnhap"><button style="width: 20%;height: 40px;border-radius: 30px;background-color: #EB4D4B;outline-style: none;"> ĐĂNG NHẬP</button></a>
      </div>
  </center>
</section>
	<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@stop