@extends('frontend.masters')
@section('main')
@section('title','Danatao | Liên hệ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/gioithieu.png')!!}" alt="">
</div>
<div class="element03">
	<div class="container">
		<h1>Liên hệ</h1>
		<center>
			<div class=" hinhthan"><p>Trang chủ <i class="fa fa-angle-right" aria-hidden="true"></i> tư vấn</p></div>
		</div>
	</center>
</div>
</section>

	<section style="" >
	<div class="lienhe1">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h2>Tư vấn <span style="color:#EC6563 ">khách hàng</span></h2><br>
   					<form class="dangnhap1" action=""  enctype="multipart/form-data" method="POST" accept-charset="utf-8">
   						<input type="hidden" name="_token" value="{{csrf_token()}}">
   	   					<h4 style="">Họ và Tên:</h4>
   						<input style="width: 100%;height:40px;border-radius: 20px;width:100%;padding-left: 20px;font-size: 16px " type="text" name="ht" value="" placeholder=""> <br>
   						<h4 >Email:</h4>
  						<input style="width: 100%;height:40px;border-radius: 20px;width:100%;padding-left: 20px;font-size: 16px " type="email" name="email" value="" placeholder=""> <br>
  						<h4 >Số điện thoại:</h4>
						<input style="width: 100%; height:40px;border-radius: 20px;width:100%;padding-left: 20px;font-size: 16px " type="text" name="sdt" value="" placeholder="">   <br>
						<h4 >Nội dung cần tư vấn</h4>
 						<textarea style="border-radius: 20px;width:100%;height: 300px;padding-top: 20px;padding-left: 20px;font-size: 16px " name="nd"></textarea><br><br>
						<center>  <button style="width: 50%;height: 40px;border-radius: 30px;background-color: #EB4D4B;outline-style: none;margin-top: 20px" type="submit" name=""> gửi</button></center>
  					</form>
				</div>
			</div>
		</div>
	</div>	


		<div class="lienhe2">
		<div class="container">
			<div class="row">
				<div class=" col-md-8 ">

				</div>
				<div class="col-md-4">
					<div class="lienhe3">
						<h3 style="color: red">DANATAO</h3>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<div class="lienhe8"><img src="{!!url('img/logo.png')!!}" alt=""></div>
							</div>
							<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
								<div class="lienhe9"><p>DANATAO là đơn vị order nhập hàng trọn gói, vận chuyển Trung – Việt uy tín ở Đà Nẵng. Cùng với sự phát triển của ngành Thương Mại Điện Tử ( TMĐT ) đặc biệt là các website TMĐT</p></div>
							</div>
						</div>
												<hr>
						<div class="row lienhe10">
							<!-- <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<div class="lienhe8"><img src="{!!url('img/avatar5.png')!!}" alt=""></div>
							</div> -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="lienhe9 lhp"><p>CSKH : 0702.52.5557</p></div>
							</div>
						</div>
												<hr>
						<div class="row lienhe10">
							<!-- <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<div class="lienhe8"><img src="{!!url('img/avatar5.png')!!}" alt=""></div>
							</div> -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="lienhe9 lhp"><p>Khiếu nại: 0702.51.5556</p></div>
							</div>
						</div>
												<hr>
						<div class="row lienhe10">
							<!-- <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<div class="lienhe8"><img src="{!!url('img/avatar5.png')!!}" alt=""></div>
							</div> -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="lienhe9 lhp"><p>Email: Danatao_qc@gmail.com</p></div>
							</div>
						</div>

					</div>					
					<div class="lienhe5"></div>
				</div>

			</div>
		</div>
	</div>
</div>
</section>
<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@stop