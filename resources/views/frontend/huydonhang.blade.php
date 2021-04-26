@extends('frontend.masters')
@section('main')
@section('title','Danatao | Trang cá nhân ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>Trang cá nhân</h1>
		<center>
			<div class="hinhthan hinhthan1"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i>Trang cá nhân</p></div>
	</div>
		</center>
</div>
<section id="canhan">
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 cn1">
		<div class="cnava">
							<center>
					<img src="{!!url('img/avatar.png')!!}" alt="">
					<h3>{{ Auth::user()->name }} </h3>
					<p ><i>khách Lẻ</i></p>
					<p>Số dư:  ....</p>
					<button type="button" class="btn btn-success">Nạp Tiền</button>
					<br>
					<br>
				</center>
		</div>
							<div class="sidenav cn3">
						<button class="dropdown-btn">Đơn hàng
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<a href="#">Chờ Thanh Toán</a>
							<a href="#">Đã Thanh Toán</a>
							<a href="#">Nhận Hàng</a>
							<a href="#">Hết Hàng / Hủy </a>
						</div>
						<button class="dropdown-btn">Giao Dịch
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<a href="#">Lịch sử giao dịch</a>

						</div>
						<button class="dropdown-btn">Tài Khoản
							<i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-container">
							<a href="#">Thông Tin</a>
							<a href="#">Đổi mật khẩu</a>
							<a href="#">Quản Lý Địa Chỉ Nhận Hàng</a>
						</div>
						<a href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						Đăng Xuất
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</div>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 cn1">
				<center><h2 style="text-transform: uppercase;">Đơn hàng đã thanh toán</h2></center>
				<table class="table">
					<thead>
								
						<th>Mã đơn hàng</th>
						<th>Ngày Mua</th>
						<th>Người đặt</th>
						<th>Tổng Tiền</th>
					</thead>
					@foreach($donhang as $donhang)
					<tr>
						
						<td>{{$donhang->madonhang}}</td>
						<td>{{$donhang->updated_at}}</td>
						<td>{{Auth::user()->name}}</td>
						<td>{{$donhang->totalqty}}</td>
						<td></td>
						
					</tr>
					@endforeach
					<thead>
					
						<th>Mã đơn hàng</th>
						<th>Ngày Mua</th>
						<th>Người đặt</th>
						<th>Tổng Tiền</th>
					</thead>
				</table>
			</div>
		</div>
	</div>
</section>
<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
	@stop