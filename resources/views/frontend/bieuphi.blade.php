@extends('frontend.masters')
@section('main')
@section('title','Danatao | Biểu phí')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/gioithieu.png')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>hướng dẫn</h1>
		<center>
			<div class="hinhthan"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i> Biểu phí</p></div>
	</div>
		</center>
</div>
<br>
<br>
<section id="huongdan">
		<div class="container">
			<div class="row">
				<div class="col-md-4 hd">
					<h2>Biểu Phí</h2>
					<div class="sidenav">
						<a href="">Dịch vụ đặt hàng trọn gói</a>
						<a href="">Dịch vụ ký gửi</a>
						<a href="">Dịch vụ cho thuê tài khoản alipay</a>
					</div>
				</div>
				<div class="col-md-8 hd2">
					<p>Quý khách lựa chọn danh sách menu bên trái gồm có hướng dẫn cơ bản và hướng dẫn nâng cao. <br><br>

Quý khách xem hết toàn bộ video + nghe giọng nói, cam kết sẽ đặt hàng được 100%</p>
				</div>
			</div>
		</div>
	</section>
<!-- <section id="bieuphi1">
		<div class="container">
		<div class="bieuphi1 an"> <img src="{!!url('img/avatar.png')!!}" alt=""></div>
		<div class="bieuphi1"><p>=</p><img src="{!!url('img/avatar.png')!!}" alt=""></div>
		<div class="bieuphi1"><p>+</p><img src="{!!url('img/avatar.png')!!}" alt=""></div>
		<div class="bieuphi1"><p>+</p><img src="{!!url('img/avatar.png')!!}" alt=""></div>
		<div class="bieuphi1"><p>+</p><img src="{!!url('img/avatar.png')!!}" alt=""></div>
		<div class="bieuphi2"><i class="fa fa-caret-down" aria-hidden="true"></i><br>
		<p>Lorem ipsum dolor sit ame:</p>
		</div>
		<div class="bieuphi2"><i class="fa fa-caret-down" aria-hidden="true"></i>
		<br>
		<p>Lorem ipsum dolor sit ame:</p></div>
		<div class="bieuphi2"><i class="fa fa-caret-down" aria-hidden="true"></i>
		<br>
		<p>Lorem ipsum dolor sit ame:</p></div>
		<div class="bieuphi2"><i class="fa fa-caret-down" aria-hidden="true"></i>
		<br>
		<p>Lorem ipsum dolor sit ame:</p></div>
		<div class="bieuphi2"><i class="fa fa-caret-down" aria-hidden="true"></i>
		<br>
		<p>Lorem ipsum dolor sit ame:</p></div>
		</div>
</section>
<section id="bieuphi3">
	<div class="container">
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 an2">
				<div>
					<div class="cacbuoc"><p><span>1. Lorem ipsum dolor sit ame: </span>Sit amet libero quis ligula sodales sodales nec eu libero.</p></div>
					<div class="cacbuoc"><p><span>1. Lorem ipsum dolor sit ame: </span>Sit amet libero quis ligula sodales sodales nec eu libero.</p></div>
					<div class="cacbuoc"><p><span>1. Lorem ipsum dolor sit ame: </span>Sit amet libero quis ligula sodales sodales nec eu libero.</p></div>
					<div class="cacbuoc"><p><span>1. Lorem ipsum dolor sit ame: </span>Sit amet libero quis ligula sodales sodales nec eu libero.</p></div>
					<div class="cacbuoc"><p><span>1. Lorem ipsum dolor sit ame: </span>Sit amet libero quis ligula sodales sodales nec eu libero.</p></div>
				</div>
				<div class="bieuphinoidung">
					<h3>Lorem ipsum dolor sit ame</h3>
					<p>Proin orci purus, elementum vitae facilisis id, interdum et ante. <br>
					Sed faucibus fringilla sapien, quis posuere massa iaculis non. Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium consequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. Vivamus laoreet metus id venenatis pharetra. Donec elementum, lacus nec ornare aliquet, tortor ex ultricies arcu, a luctus metus urna in nisl. Cras orci libero, convallis quis nisi nec, tristique aliquet augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum mollis eros sed malesuada. Nam vitae laoreet augue, id euismod odio. Nam luctus est nec dolor placerat viverra.</p>
					<img src="{!!url('img/dathang.jpg')!!}" alt="">
				</div>
				<div class="bieuphinoidung">
					<h3>Lorem ipsum dolor sit ame</h3>
					<p>Proin orci purus, elementum vitae facilisis id, interdum et ante. <br>
					Sed faucibus fringilla sapien, quis posuere massa iaculis non. Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium consequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. Vivamus laoreet metus id venenatis pharetra. Donec elementum, lacus nec ornare aliquet, tortor ex ultricies arcu, a luctus metus urna in nisl. Cras orci libero, convallis quis nisi nec, tristique aliquet augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum mollis eros sed malesuada. Nam vitae laoreet augue, id euismod odio. Nam luctus est nec dolor placerat viverra.</p>
					<img src="{!!url('img/dathang.jpg')!!}" alt="">
				</div>
				<div class="bieuphinoidung">
					<h3>Lorem ipsum dolor sit ame</h3>
					<p>Proin orci purus, elementum vitae facilisis id, interdum et ante. <br>
					Sed faucibus fringilla sapien, quis posuere massa iaculis non. Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium consequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. Vivamus laoreet metus id venenatis pharetra. Donec elementum, lacus nec ornare aliquet, tortor ex ultricies arcu, a luctus metus urna in nisl. Cras orci libero, convallis quis nisi nec, tristique aliquet augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum mollis eros sed malesuada. Nam vitae laoreet augue, id euismod odio. Nam luctus est nec dolor placerat viverra.</p>
					<img src="{!!url('img/dathang.jpg')!!}" alt="">
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 an3">
				<div class="sdt">
					<h3>chăm sóc khách hàng</h3>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
				</div>
			</div>

		</div>
	</div>
</section> -->
	<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@stop