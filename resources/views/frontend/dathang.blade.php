@extends('frontend.masters')
@section('main')
@section('title','Danatao | Trang đặt hàng ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>Trang  đặt hàng</h1>
		<center>
			<div class="hinhthan hinhthan1"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i>đặt hàng</p></div>
	</div>
		</center>
</div>
<section id="giohang">
	<div class="container">
		<div class="giohang1">

			<img src="img/product.png" alt="">
									<hr>
<CENTER><div  class="giohang2"><p>1</p></div></CENTER>
			<h3>Chọn sản phẩm</h3>

		</div>
				<div class="giohang1">
			<img src="img/download.png" alt="">
									<hr>
			<CENTER><div  class="giohang2"><p>2</p></div></CENTER>
			<h3>Xác nhận địa chỉ nhận hàng</h3> 
		</div>
				<div class="giohang1">
			<img src="img/shopping-cart.png" alt="">
			<hr>
			<CENTER><div  class="giohang2"><p>3</p></div></CENTER>
			<h3>Thanh toán</h3>
		</div>
				<div class="giohang1">
			<img src="img/debit-card1.png" alt="">
			<hr>
			<CENTER><div style="background-color: #EB4D4B" class="giohang2"><p>4</p></div></CENTER>
			<h3><b>Đặt hàng</b></h3>
		</div>
				
	</div>
</section>
<section>
	<div class="container">
		<div class="dathang">
		<p>bạn đã đặt hàng thành công</p>
		
		<p>bạn phải thanh toán trước 50% giá trị của đơn hàng để đơn hàng được xác nhận</p>
		<p>Chủ tài khoản : TRẦN KHÁNH UYÊN</p>
		<p>0071001203631  Vietcombank CN TP.HCM</p>	
		<p>2016206049458 Agribank CN Chi Lăng - Đà Nẵng</p>
		<p>19035238073013 Techcombank CN Hùng Vương</p>

 
	</div>
	</div>
</section>
@endsection