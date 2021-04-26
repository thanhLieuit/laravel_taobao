@extends('frontend.masters')
@section('main')
@section('title','Danatao | Hướng dẫn')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/gioithieu.png')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>hướng dẫn</h1>
		<center>
			<div class="hinhthan"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i> Hướng dẫn</p></div>
	</div>
		</center>
</div>
	</section>
	<section id="huongdan">
		<div class="container">
			<div class="row">
				<div class="col-md-4  hd">
					<h2>hướng dẩn</h2>
					<div class="sidenav">
						<a href="{{ route('huongdan/taotaikhoantaobao') }}">Tạo tài khoản taobao</a>
						<button class="dropdown-btn">Sản Phẩm
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<a href="{{ route('huongdan/timkiemsanpham') }}">Tìm Kiếm</a>
							<a href="{{ route('huongdan/diemchatluong') }}">Điểm Chất Lượng</a>
						</div>
						<a href="">Video</a>
					</div>
				</div>
				<div class="col-md-8 hd2">
					<p>Quý khách lựa chọn danh sách menu bên trái gồm có hướng dẫn cơ bản và hướng dẫn nâng cao. <br><br>

Quý khách xem hết toàn bộ video + nghe giọng nói, cam kết sẽ đặt hàng được 100%</p>
				</div>
			</div>
		</div>
	</section>
	<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@stop
