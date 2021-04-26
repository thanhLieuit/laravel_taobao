@extends('frontend.masters')
@section('main')
@section('title','Danatao | Trang chủ')
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
					<img src="{!!url('img/tải xuống.png')!!}" alt="Los Angeles" >
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
		<div class="tim">
			<div class="container trangchu3">
				<center>
				<form class="example dd" action="/action_page.php" style="margin:auto;">

 			 <input type="text" placeholder="   Tìm kiếm" name="search2">
  <button class="timkiennut" type="submit"><i class="fa fa-search"></i></button>
  <select class="tuychonweb">
  <option value="volvo">Taobao</option>
  <option value="saab">1688</option>
  <option value="opel">Tmall</option>
  <option value="audi">Pinduoduo</option>
    <option value="opel">JD</option>
  <option value="audi">Alibaba</option>
</select>
</form>
			</center>
			</div>
		</div>
</section>
<section class="trangchu2">
	<div class="container">
		<div class="row tren">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						<div class="cheo">

			</div>
		</div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 giua">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Etiam neque velit, pharetra eget posuere vel, accumsan eu augue.</p>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<div class="cheo2">

			</div>
		</div>
	</div>
	</div>
	</div>
<div class="container">
	<div class="row duoi  animated bounceIn delay-0.5s">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

		</div>
		<div  class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 bavuong">
			<div class="row">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 vuong">
					<a href="#"><div class="triangle1" >
						<img class="img1"  src="{!!url('img/COCCOC.png')!!}" alt="">
					</div></a>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 vuong">
					<a href="#">
						<div class="triangle" >
						<img class="img2"src="{!!url('img/CHROME.png')!!}" alt="">
					</div>
					</a>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 vuong">
					<a href="#">
						<div class="triangle2" >
						<img class="img3"  src="{!!url('img/FIREFOX.png')!!}" alt="">
					</div>
					</a>
				</div>
			</div>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

		</div>
	</div>
	<p class="chu1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In velit felis, maximus sed elementum in, laoreet eu est. Etiam neque velit, pharetra eget posuere vel, accumsan eu augue.</p>
	<center>  <button class="nut" type="submit"><span>Xem thêm</span></button></center>
</div>
</section>
<section id="quytrinh">
	<h2>quy trình <span style="color:#EB4D4B "> đặt hàng </span></h2>
	<div class="container">
		<div class="quytrinh1">

			<img src="{!!url('img/v2-commit-user.png')!!}" alt="">
									<hr>
			<a href="#"><CENTER><div class="quytrinh2"><p>1</p></div></CENTER>
			<h3>Đăng ký tài khoản <br> tại danatao.com</h3>
			<p>Hướng dẫn</p></a>

		</div>
				<div class="quytrinh1">
			<img src="{!!url('img/v2-commit-cloud.png')!!}" alt="">
									<hr>
			<a href="#">
			<CENTER><div class="quytrinh2"><p>2</p></div></CENTER>
			<h3>Cài đặt tools đặt hàng <br>  vào chorme, firefox</h3>
			<p>Hướng dẫn</p>
			</a>
		</div>
				<div class="quytrinh1">
			<img src="{!!url('img/v2-commit-cart.png')!!}" alt="">
			<hr>
			<a href="#"><CENTER><div class="quytrinh2"><p>3</p></div></CENTER>
			<h3>Chọn mua hàng <br> tại các website Trung Quốc</h3>
			<p>Hướng dẫn</p></a>
		</div>
				<div class="quytrinh1">
			<img src="{!!url('img/v2-commit-payment.png')!!}" alt="">
			<hr>
			<a href="#"><CENTER><div class="quytrinh2"><p>4</p></div></CENTER>
			<h3>Chuyển tiền <br> đặt cọc cho chúng tôi </h3>
			<p>Hướng dẫn</p></a>
		</div>
				<div class="quytrinh1">
			<img src="{!!url('img/v2-commit-tranfer.png')!!}" alt="">
			<hr>
			<a href="#"><CENTER><div class="quytrinh2"><p>5</p></div></CENTER>
			<h3>Cuối cùng <br> bạn chỉ đợi nhận hàng</h3>
			<p>Hướng dẫn</p></a>
		</div>
	</div>
</section>
<section id="bieuphi">
	<h2>biểu phí <span style="color: #EB4D4B"> dịch vụ</span></h2>
	<div class="container">
		<img src="{!!url('img/bangphi-1.png')!!}" alt="">

	</div>
</section>
<section id="camket">
	<h2>CAM KẾT <span style="color: #EB4D4B"> DỊCH VỤ ĐẶT HÀNG</span></h2>
	<div class="container">
		<div class="row ">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 camket1">
				<img src="{!!url('img/tải xuống1.png')!!}" alt="">
				<h3>Lorem ipsum dolor </h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In velit felis, maximus sed elementum in, laoreet eu est</p>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 camket1">
				<img src="{!!url('img/tải xuống1.png')!!}" alt="">
				<h3>Lorem ipsum dolor </h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In velit felis, maximus sed elementum in, laoreet eu est</p>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 camket1">
				<img src="{!!url('img/tải xuống1.png')!!}" alt="">
				<h3>Lorem ipsum dolor </h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In velit felis, maximus sed elementum in, laoreet eu est</p>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 camket1">
				<img src="{!!url('img/tải xuống1.png')!!}" alt="">
				<h3>Lorem ipsum dolor </h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In velit felis, maximus sed elementum in, laoreet eu est</p>
			</div>
		</div>
	</div>
</section>
<section id="danhsach">
	<h2>danh sách <span style="color: #EB4D4B "> website uy tín trung quốc</span></h2>
	<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators chamtron">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
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

    <!-- Left and right controls -->

  </div>
</div>
</section>
<section id="quyenloi">
		<h2>quyền lợi <span style="color: #EB4D4B">khách hàng</span></h2>
		<div class="container">
			<div class="quyenloi0 wow bounceIn">
				<img class="quyenhinhanh" src="{!!url('img/Group 508.png')!!}" alt="">
			</div>
		</div>
		<div class="container ql001">
			<div class="quyenloi1">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 quyenloitrentrai wow animated bounceInLeft delay-1s "><p >Lorem ipsum. In velit felis, maximus sed elementum in, laoreet eu est</p>
						<img src="{!!url('img/avatar5.png')!!}" alt="">
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 quyenloitrenphai wow animated bounceInRight delay-1s">
						<p >Lorem ipsum. In velit felis, maximus sed elementum in, laoreet eu est</p>
						<img src="{!!url('img/avatar5.png')!!}" alt="">
					</div>

				</div>
												<div style="margin-top: 133px" class="row">

					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 quyenloigiuatrai wow animated bounceInLeft delay-2s">
												<img src="{!!url('img/avatar5.png')!!}" alt=""><p>Lorem ipsum. In velit felis, maximus sed elementum in, laoreet eu est</p>

					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 quyenloigiuaphai wow animated bounceInRight delay-2s">
												<img  src="{!!url('img/avatar5.png')!!}" alt="">
						<p >Lorem ipsum. In velit felis, maximus sed elementum in, laoreet eu est</p>

					</div>

				</div>
								<div style="margin-top: 130px" class="row">

					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 quyenloiduoitrai wow animated bounceInLeft delay-3s">
												<img src="{!!url('img/avatar5.png')!!}" alt=""><p >Lorem ipsum. In velit felis, maximus sed elementum in, laoreet eu est</p>

					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 quyenloiduoiphai wow animated bounceInRight delay-3s">
												<img src="{!!url('img/avatar5.png')!!}" alt="">
						<p>Lorem ipsum. In velit felis, maximus sed elementum in, laoreet eu est</p>

					</div>

				</div>
			</div>
		</div>
</section>
	<section id="dichvu">
		<h2>Dịch vụ <span style="color: #EB4D4B">danatao</span> cung cấp</h2>
		<div class="container">
			<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<a class="dichvu1" href="#"><h3>Lorem Ipsum is simply dummy text of the </h3>
				<div class="gach1"></div>
				<img style="width: 100%" src="{!!url('img/avatar.png')!!}" alt=""></a>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<a class="dichvu1" href="#"><h3>Lorem Ipsum is simply dummy text of the </h3>
				<div class="gach1"></div>
				<img style="width: 100%" src="{!!url('img/avatar.png')!!}" alt=""></a>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<a class="dichvu1" href="#"><h3>Lorem Ipsum is simply dummy text of the </h3>
				<div class="gach1"></div>
				<img style="width: 100%" src="{!!url('img/avatar.png')!!}" alt=""></a>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<a class="dichvu1" href="#"><h3>Lorem Ipsum is simply dummy text of the </h3>
				<div class="gach1"></div>
				<img style="width: 100%" src="{!!url('img/avatar.png')!!}" alt=""></a>
			</div>
		</div>
		</div>
	</section>
<section id="khachhang">

	<h2>khách hàng <span style="color: #EB4D4B"> nói gì về chúng tôi</span></h2>
	<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <div class="xam">
        	<center><p style="text-transform: lowercase;margin: 20px" >Lorem ipsum dolor sit amet, consectetur adip elit. Ut a ultricies neque, quis tincidunt ligul. Lorem ipsum dol.Lorem ipsum dolor sit amet, consectetur adip elit. Ut a ultricies neque, quis tincidunt ligul.
Lorem im dol.Lorem ipsum dolor sit amet</p>
<img src="{!!url('img/avatar.png')!!}" alt="Avatar" class="avatar">
<h3><b>Dustin Atkin</b></h3>
<p style="text-transform: uppercase;">chủ shop thời trang</p>
</center>
        </div>
      </div>

      <div class="item">
         <div class="xam">
         	<center><p style="text-transform: lowercase;margin: 20px" >Lorem ipsum dolor sit amet, consectetur adip elit. Ut a ultricies neque, quis tincidunt ligul. Lorem ipsum dol.Lorem ipsum dolor sit amet, consectetur adip elit. Ut a ultricies neque, quis tincidunt ligul.
Lorem im dol.Lorem ipsum dolor sit amet</p>
<img src="{!!url('img/img_avatar2.png')!!}" alt="Avatar" class="avatar">
<h3><b>Dustin Atkin</b></h3>
<p style="text-transform: uppercase;">chủ shop thời trang</p>
</center>
         </div>
      </div>

      <div class="item">
       <div class="xam">
       	 <center><p style="text-transform: lowercase;margin: 20px" >Lorem ipsum dolor sit amet, consectetur adip elit. Ut a ultricies neque, quis tincidunt ligul. Lorem ipsum dol.Lorem ipsum dolor sit amet, consectetur adip elit. Ut a ultricies neque, quis tincidunt ligul.
Lorem im dol.Lorem ipsum dolor sit amet</p>
<img src="{!!url('img/avatar5.png')!!}" alt="Avatar" class="avatar">
<h3><b>Dustin Atkin</b></h3>
<p style="text-transform: uppercase;">chủ shop thời trang</p>
</center>
       </div>
      </div>
    </div>

    <!-- Left and right controls -->
  </div>
</div>
</section>
<section id="khachhangv2">
	<div class=" wow container noidungkhachhangv2">
		<div class="row">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 khv2">
			<center> <div class="mu mun1">96.71</div></center>
			<p class="texxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
		</div>
		<script type="text/javascript">
 $('.mun1').counterUp({delay:10,time:1000})   
</script>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 khv2">
						<center><div class="mu mun">1054</div></center>
			<p class="texxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
		</div>
		<script type="text/javascript">
 $('.mun').counterUp({delay:10,time:1000})   
</script>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 khv2">
						<center><div class="mu mun2">1054</div></center>
			<p class="texxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
		</div>
		<script type="text/javascript">
 $('.mun2').counterUp({delay:10,time:1000})   
</script>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 khv2">
						<center><div class="mu mun3">1054</div></center>
			<p class="texxt">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
		</div>
		<script type="text/javascript">
 $('.mun3').counterUp({delay:10,time:1000})   
</script>
	</div>
</section>
<section style="	border-top: 5px solid #000; "  id="cuoi" >
@stop
