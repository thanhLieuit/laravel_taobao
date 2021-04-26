@extends('frontend.masters')
@section('main')
@section('title','IORDER | Trang chủ')
<div class="loader">
	<span style="color: #EB4D4B" class="fa fa-spinner xoay icon"> </span>
	<br>
	<br><p style="left: 42%;
	color: #EB4D4B;
	top: 50%;" class="icon"><img style="width: 30%" src="{!!url('img/LOGO chính thức1.png')!!}" alt=""></p>
</div>
<div class="element02">

	<div id="myCarousel" class="carousel slide sl1" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="{!!url('img/slite1.jpg')!!}" alt="Los Angeles" >
			</div>
			@foreach($getslide as $getsl)
			<div class="item ">
				<img src="{!!url('up')!!}/{{$getsl->img}}" alt="Chicago" >
			</div>
			@endforeach

		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div></div>

</section>
<section id="xemtinhtrang">
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-3">
				<div class="cheotrai"></div>
			</div>
			<div class="col-md-6">
				<div class="nuttinhtrang">
					<a href="{{ route('donhangtutao')}}"><p style="text-align: center;padding-top: 7px;display: block !important;">Xem tình trạng đơn hàng</p></a>
				</div>
				<p style="text-align: center;padding-top: 12px;font-weight: bold">Dành cho khách hàng không dùng được công cụ đặt hàng</p>

			</div>

			<div class="col-md-3">
				<div class="cheophai"></div>
			</div>
			<div class="hinhgiua"></div>
		</div>
	</div>
</section>


<section style="background: white;    margin-top: 50px;" id="camket">
	<div class="container">	
	<div class="col-md-12">
		<div class="row">
			
			<div class="col-md-7">
				<div class="khokhan1">
					<h3 style="text-align:center;font-size: 28px;font-weight: bold; color: #EB4D4B">BẠN ĐANG GẶP NHỮNG KHÓ KHĂN NÀO SAU ĐÂY?</h3><br>
					<ul>
						<li>Bạn đang cần nguồn hàng cho hoạt động kinh doanh và sản xuất của mình ?</li>
						<li>Bạn đang có ý định kinh doanh online để tăng thêm thu nhập nhưng không biết nguồn hàng ở đâu ?</li>
						<li>Bạn đã nhập hàng ở 1 vài nơi chuyên sỉ nhưng không hài lòng về chất lượng hàng hóa và giá cả?</li>
						<li>Bạn đang nhập hàng từ Quảng Châu nhưng chưa hài lòng về chi phí, chất lượng và dịch vụ của đối tác?</li>
						<li>Bạn muốn nhập hàng từ Trung Quốc nhưng không biết tiếng, không có nhiều thời gian và tiền bạc để sang tận nơi đánh hàng ?</li>
					</ul>	
				</div>
				
			</div>
			<div class="col-md-5 ">
				<div class="khokhan2">
					<img src="{!!url('img/unnamed.jpg')!!}" alt="">
				</div>
				
			</div>
		</div>
	</div>	
	

</div>
</section>
<section id="giaiquyet">
	<center>
		<h2>CHÚNG TÔI SẼ GIẢI QUYẾT VẤN ĐỀ CỦA BẠN</h2>
		<h3><i>Với các dịch vụ Order Hàng, Chuyển Hàng Ký Gửi, Thuê tài khoản ALIPAY .</i></h3>
	</center>
	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 gqh">
				<img src="{!!url('img/unnamed (2).jpg')!!}" alt="">
				<center>
					<h3>ĐẶT HÀNG TRỌN GÓI</h3>
					<p>Trực tiếp đặt hàng và theo dõi đơn hàng trên IORDER. Tiếp cận được nhiều nguồn hàng phong phú từ các trang thương mại điện tử Trung Quốc.</p>
				</center>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 gqh">
				<img src="{!!url('img/unnamed (1).jpg')!!}" alt="">
				<center>
					<h3>KÝ GỬI HÀNG</h3>
					<p>Chuyển hàng ký gửi với tốc độ ổn định, nhanh chóng. Nhận được báo cáo thường xuyên trên Website.</p>
				</center>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 gqh">
				<img src="{!!url('img/unnamed (3).jpg')!!}" alt="">
				<center>
					<h3>THUÊ TÀI KHOẢN ALIPAY</h3>
					<p>Tự chủ thanh toán và hưởng trọn khuyến mãi từ taobao.com, tmall.com, 1688.com. Tại sao không ?</p>
				</center>
			</div>
		</div>
	</div>
</section>
<section id="quytrinh">
	<h2>quy trình <span style="color:#EB4D4B "> đặt hàng </span></h2>
	<div class="container">
		<div class="noidungqt">
			<div class="hinhqt">
				<img src="{!!url('/img/qt.png')!!}" alt="" style="width: 100%">
			</div>
			<div class="chub">
				<div class="chub1">
					<h5>BƯỚC 1</h5>
					<p>Đăng ký tài khoản tại website</p>
					<a href=""><i>Hướng dẫn</i></a>
				</div>
				<div class="chub2">
					<h5>BƯỚC 2</h5>
					<p>Cài đặt tools đặt hàng vào
						Chorme, Coccoc, Firefox</p>
					<a href=""><i>Hướng dẫn</i></a>
				</div>
				<div class="chub3">
					<h5>BƯỚC 3</h5>
					<p>Chọn mua hàng tại các
  							website Trung Quốc</p>
					<a href=""><i>Hướng dẫn</i></a>
				</div>
				<div class="chub4">
					<h5>BƯỚC 4</h5>
					<p>Chuyển tiền đặt cọc
						cho chúng tôi</p>
					<a href=""><i>Hướng dẫn</i></a>
				</div>
				<div class="chub5">
					<h5>BƯỚC 5</h5>
					<p>Cuối cùng bạn chỉ cần theo dõi
						đơn hàng và nhận hàng</p>
					<a href=""><i>Hướng dẫn</i></a>
				</div>
			</div>
			
		</div>
		
	</div>
</section>
<br>
<section id="quytrinhmobi">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="hinhb1">
					<img src="{!!url('img/b111.png')!!}" alt="" style="width: 100%">
				</div>
			</div>
			<div class="col-md-6">
				<div class="chub111">
					<h5>BƯỚC 1</h5>
					<p>Đăng ký tài khoản tại website</p>
					<a href=""><i>Hướng dẫn</i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="hinhb1">
					<img src="{!!url('img/b222.png')!!}" alt="" style="width: 100%">
				</div>
			</div>
			<div class="col-md-6">
				<div class="chub111">
					<h5>BƯỚC 2</h5>
					<p>Cài đặt tools đặt hàng vào
						Chorme, Coccoc, Firefox</p>
					<a href=""><i>Hướng dẫn</i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="hinhb1">
					<img src="{!!url('img/b333.png')!!}" alt="" style="width: 100%">
				</div>
			</div>
			<div class="col-md-6">
				<div class="chub111">
					<h5>BƯỚC 3</h5>
					<p>Chọn mua hàng tại các
  							website Trung Quốc</p>
					<a href=""><i>Hướng dẫn</i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="hinhb1">
					<img src="{!!url('img/b444.png')!!}" alt="" style="width: 100%">
				</div>
			</div>
			<div class="col-md-6">
				<div class="chub111">
					<h5>BƯỚC 4</h5>
					<p>Chuyển tiền đặt cọc
						cho chúng tôi</p>
					<a href=""><i>Hướng dẫn</i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="hinhb1">
					<img src="{!!url('img/b555.png')!!}" alt="" style="width: 100%">
				</div>
			</div>
			<div class="col-md-6">
				<div class="chub111">
					<h5>BƯỚC 5</h5>
					<p>Cuối cùng bạn chỉ cần theo dõi
						đơn hàng và nhận hàng</p>
					<a href=""><i>Hướng dẫn</i></a>
				</div>
			</div>
		</div>
	</div>

</section>
<section id="bieuphi">
	<h2>biểu phí <span style="color: #EB4D4B"> dịch vụ</span></h2>
	<br>
	<div class="container">
		@foreach($gethabieuphi as $gethabieuphi)
		<img src="{!!url('up/')!!}/{{$gethabieuphi->img}}" alt="">
		@endforeach
		<br>
		<br>
		<p style="font-size: 20px;text-transform: none;">Bạn cần thêm thông tin chi tiết bản giá dịch vụ, <a href="{{ route('bieuphi') }}">XEM TẠI ĐÂY</a></p>
	</div>
</section>
<section id="danhsach">
	<h2>danh sách <span style="color: #EB4D4B "> website uy tín trung quốc</span></h2>
	<div class="container">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
	
			<ol class="carousel-indicators chamtron">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			
			<div class="carousel-inner">
				<div class="item active">
					<a href="#"> <img class="slh s1" src="{!!url('img/logo-tmall.png')!!}" alt="Los Angeles" ></a>
					<a href="#"><img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>
					<a href="#"> <img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>
					<a href="#"><img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>
					<a href="#"><img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>

				</div>

				<div class="item">
					<a href="#"> <img class="slh s1" src="{!!url('img/logo-tmall.png')!!}" alt="Los Angeles" ></a>
					<a href="#"><img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>
					<a href="#"> <img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>
					<a href="#"><img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>
					<a href="#"><img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>

				</div>

				<div class="item">
					<a href="#"> <img class="slh s1" src="{!!url('img/logo-tmall.png')!!}" alt="Los Angeles" ></a>
					<a href="#"><img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>
					<a href="#"> <img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>
					<a href="#"><img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>
					<a href="#"><img class="slh s1" src="{!!url('img/logo-amazon-cn.png')!!}" alt="Chicago"></a>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- <section id="videos">
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-5">
					<div class="videoss">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/z67k9OspXnE?start=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-md-7">
					<div class="tieudevideoss">
						<h2>VIDEO Hướng dẫn cài đặt công cụ đặt hàng và cách sử dụng</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="videoss">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/z67k9OspXnE?start=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						
					</div>
				</div>
				<div class="col-md-7">
					<div class="tieudevideoss">
						<h2>VIDEO Hướng dẫn cài đặt công cụ đặt hàng và cách sử dụng</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- <section id="nutcaidat">
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="cdungdung">
					<a href=""><p>CÀI ĐẶT CÔNG CỤ</p></a>
				</div>
			</div>
			<div class="c0l-md-3"></div>
		</div>
	</div>
</section> -->
<section id="dangkytuvan">
	<div class="container">
		<div class="row">
			<br>
			<center><h2 style="font-weight: bold;">TƯ VẤN <span style="color:#EC6563;">KHÁCH HÀNG</span></h2></center>
			<div class="col-md-6 ">
				<div class="guiiii">
					<form class="dangnhap1" action="{{route('tuvan')}}"  enctype="multipart/form-data" method="POST" accept-charset="utf-8">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
							<h4 style="">Họ và Tên:</h4>
						<input style="width: 100%;height:40px;border-radius: 20px;width:100%;padding-left: 20px;font-size: 16px;    border: 1px solid #c3c1c1; " type="text" name="ht" value="" placeholder=""> <br>
						<h4 >Email:</h4>
						<input style="width: 100%;height:40px;border-radius: 20px;width:100%;padding-left: 20px;font-size: 16px;    border: 1px solid #c3c1c1; " type="email" name="email" value="" placeholder=""> <br>
						<h4 >Số điện thoại:</h4>
					<input style="width: 100%; height:40px;border-radius: 20px;width:100%;padding-left: 20px;font-size: 16px;    border: 1px solid #c3c1c1; " type="text" name="sdt" value="" placeholder="" >   <br>
					<h4 >Nội dung cần tư vấn</h4>
						<textarea style="border-radius: 20px;width:100%;height: 200px;padding-top: 20px;padding-left: 20px;font-size: 16px;    border: 1px solid #c3c1c1; " name="nd"></textarea><br><br>
					<button style="width: 20%;height: 40px;border-radius: 30px;background-color: #EB4D4B;outline-style: none;margin-top: 20px;font-weight: bold;color: white;border: 0px;    margin-left: 436px;" type="submit" name=""> GỬI</button>
					</form>
				</div>
					
			</div>
			<div class="col-md-6">
				<div class="hinhtuvan">
					<img src="../img/2761904.png" alt="" style="width: 100%">
				</div>
			</div>
		</div>
		
	</div>
</section>
<section id="quyenloi">
	<h2>IORDER cam kết <span style="color: #EB4D4B">với khách hàng</span></h2>
	<div class="container">
		<div class="quyenloi0 wow bounceIn">
			<img class="quyenhinhanh" src="{!!url('img/Group 508.png')!!}" alt="">
		</div>
	</div>
	<div class="container ql001">
		<div class="quyenloi1">
			<div class="row">
				<div class="col-md-6 quyenloitrentrai wow animated bounceInLeft delay-1s "><p >Đặt hàng đúng link, đúng sản phẩm khách hàng đã đặt. Tuyệt đối không sử dụng sản phẩm thấy thế</p>
					<img src="{!!url('img/order.png')!!}" alt="">
				</div>

				<div class="col-md-6 quyenloitrenphai wow animated bounceInRight delay-1s">
					<p >Duyệt đơn trong vòng 24h <br> (trừ Chủ Nhật) đặt đơn ngay sau khi được tiền cọc</p>
					<img src="{!!url('img/customer-service.png')!!}" alt="">
				</div>

			</div>
			<div style="margin-top: 133px" class="row">

				<div class="col-md-6 quyenloigiuatrai wow animated bounceInLeft delay-2s">
					<img src="{!!url('img/guarantee-certificate.png')!!}" alt=""><p>Hàng hư hỏng do quá trình vận chuyển hoặc thất lạc <br> đền 100% giá trị đơn hàng </p>

				</div>
				<div class="col-md-6 quyenloigiuaphai wow animated bounceInRight delay-2s">
					<img  src="{!!url('img/checked.png')!!}" alt="">
					<p >100% hàng được kiểm tại kho Trung Quốc trước khi gửi về Việt Nam</p>

				</div>

			</div>
			<div style="margin-top: 130px" class="row">

				<div class="col-md-6 quyenloiduoitrai wow animated bounceInLeft delay-3s">
					<img src="{!!url('img/airplane.png')!!}" alt=""><p >Hàng về từ 5-7 ngày với hàng Taobao,1688. Có thể nhanh hay chậm hơn vài ngày do shop giao hàng chậm, tắt biên, thiên tai...</p>

				</div>
				<div class="col-md-6 quyenloiduoiphai wow animated bounceInRight delay-3s">
					<img src="{!!url('img/delivery-truck.png')!!}" alt="">
					<p>Hoàn hàng trong vòng 24h kể từ lúc kho IORDER tại Đà Nẵng <br> nhận được hàng</p>

				</div>

			</div>
		</div>
	</div>
</section>

<section id="dichvu">
<h2>Dịch vụ <span style="color: #EB4D4B">IORDER</span> cung cấp</h2>
<div class="container">
<div class="row">
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 dichcc">
<a class="dichvu1" href="#"><h3>Lorem Ipsum is simply dummy text of the </h3>
	<div class="gach1"></div>
	<img style="width: 100%" src="{!!url('img/avatar.png')!!}" alt=""></a>
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 dichcc">
	<a class="dichvu1" href="#"><h3>Lorem Ipsum is simply dummy text of the </h3>
		<div class="gach1"></div>
		<img style="width: 100%" src="{!!url('img/avatar.png')!!}" alt=""></a>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 dichcc">
		<a class="dichvu1" href="#"><h3>Lorem Ipsum is simply dummy text of the </h3>
			<div class="gach1"></div>
			<img style="width: 100%" src="{!!url('img/avatar.png')!!}" alt=""></a>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 dichcc">
			<a class="dichvu1" href="#"><h3>Lorem Ipsum is simply dummy text of the </h3>
				<div class="gach1"></div>
				<img style="width: 100%" src="{!!url('img/avatar.png')!!}" alt=""></a>
			</div>
		</div>
	</div>
</section>
<section id="khachhang">

<h2>khách hàng <span style="color: #EB4D4B"> nói gì về chúng tôi</span></h2>
<br><br>
<div class="container">
<div class="row">
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 kh2">
	<center><img src="{!!url('img/default-user-img.jpg')!!}" alt="">
		<h3><i>LÊ ĐÌNH THANH</i></h3>
		<p>IORDER i dờ bét</p></center>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 kh2">
		<center><img src="{!!url('img/default-user-img.jpg')!!}" alt="">
			<h3><i>TƯỞNG PHÙNG</i></h3>
			<p>Hàng về nhanh hơn người yêu cũ trở mặt</p></center>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 kh2">
			<center><img src="{!!url('img/default-user-img.jpg')!!}" alt="">
				<h3><i>HÀ THÚC KHANG</i></h3>
				<p>Nhân viên IORDER hết sức nhiệt tình. Đọc pass " VHB " để được giảm giá </p></center>
			</div>
		</div>
	</div>
</section>
							<!-- 	<section id="khachhangv2">
									<div class=" wow container noidungkhachhangv2">
										<div class="row">
											<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 khv2">
												<center> <div class="mu mun1">96.71</div></center>
												<p class="texxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
											</div>

											<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 khv2">
												<center><div class="mu mun">1054</div></center>
												<p class="texxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
											</div>
											<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 khv2">
												<center><div class="mu mun2">1054</div></center>
												<p class="texxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
											</div>
											<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 khv2">
												<center><div class="mu mun3">1054</div></center>
												<p class="texxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
											</div>
										</div>
									</section> -->

<section style="	border-top: 5px solid #000; "  id="cuoi" >
										@stop
