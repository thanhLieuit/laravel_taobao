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
			<div class="col-md-3 cn1">
				<div class="cnava">

					<center>
							<img src="{!!url('img/avatar.png')!!}" alt="">
							<h3>{{ Auth::user()->name }} </h3>
							<p></p>
							<p><i>khách Lẻ</i></p>
							<p>Số dư:
									@if(!$tiennap)
										0 VNĐ
									@else
										{{$tiennap}} VNĐ
									@endif
								
							</p>
							<a href="{{ route('thanhtoan',['id' =>Auth::user()->id]) }}" type="button" class="btn btn-success">Nạp Tiền</a>
							<br>
							<br>
						</center>
				</div>
				<div class="sidenav cn3">
					<button class="dropdown-btn">Đơn hàng
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="{{route('canhan.donhang.tatcadonhang')}}">Tất cả đơn hàng</a>
						<a href="{{route('canhan.donhang.tracuu')}}">Tra cứu nhanh</a>
						<a href="{{route('canhan.donhang.luulink')}}">Lưu link sản phẩm</a>
						<a href="{{route('canhan.donhang.bangkhieunai')}}">Khiếu nại</a>
					</div>
					<button class="dropdown-btn">Giao Dịch
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="{{route('canhan.donhang.giaodich')}}">Lịch sử giao dịch</a>

					</div>
					<button class="dropdown-btn">Tài Khoản
						<i class="fa fa-caret-down"></i>
					</button>
					<div class="dropdown-container">
						<a href="#">Thông Tin</a>
						<a href="#">Đổi mật khẩu</a>
						<a href="#">Quản Lý Địa Chỉ Nhận Hàng</a>
					</div>
				
					<a href="{{ route('user.logout') }}"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					Đăng Xuất
				</a>

				<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
				
				</div>
			</div>
			
			<div class="col-md-9 cn1">
				<form action="" enctype="multipart/form-data" method="POST" >
    				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<center><h2 style="text-transform: uppercase;">Thông tin người dùng</h2></center>
				<div class="row">
					<label for="input" class="col-md-3 control-label">EMAIL ĐĂNG NHẬP:</label>
					<div class="col-md-9">
						{{ Auth::user()->email }}
					</div>
				</div>
				<br>		
					@foreach($user as $user)
					<div class="row">	
						<label for="input" class="col-sm-3 control-label">HỌ & TÊN:</label>
						<div class="col-sm-9">
							<input type="tel" name="hovaten" id="input" class="form-control" value="{{$user->hoten}}" required="required" title="">
						</div>
					</div><br>
					<div class="row">	
						<label for="input" class="col-sm-3 control-label">GIỚI TÍNH:</label>
						<div class="col-sm-9">
							<input type="tel" name="gioitinh" id="input" class="form-control" value="{{$user->gioitinh}}" required="required" title="">
						</div>
					</div><br>
					<div class="row">	
						<label for="input" class="col-sm-3 control-label">NGÀY SINH:</label>
						<div class="col-sm-9">
							<input type="tel" name="ngaysinh" id="input" class="form-control" value="{{$user->ngaysinh}}" required="required" title="">
						</div>
					</div><br>
					<div class="row">	
						<label for="input" class="col-sm-3 control-label">FACEBOOK:</label>
						<div class="col-sm-9">
							<input type="tel" name="facebook" id="input" class="form-control" value="{{$user->facebook}}" required="required" title="">
						</div>
					</div><br>
					<div class="row">	
						<label for="input" class="col-sm-3 control-label">SỐ ĐIỆN THOẠI:</label>
						<div class="col-sm-9">
							<input type="tel" name="phone" id="input" class="form-control" value="{{$user->sodienthoai}}" required="required" title="">
						</div>
					</div><br>
					<div class="row">
						<label for="input" class="col-sm-3 control-label">Địa chỉ:</label>
						<div class="col-sm-9">
							<input type="text" name="loca" id="input" class="form-control" value="{{$user->diachi}}" required="required" title="">
						</div>
					</div><br>	
					<div class="row">
						<label for="input" class="col-sm-3 control-label">Thành Phố:</label>
						<div class="col-sm-9">
							<input type="text" name="address" id="input" class="form-control" value="{{$user->thanhpho}}" required="required" title="">
						</div>
					</div><br>
					@endforeach
						<button type="submit" class="btn btn-primary" >cập nhật</button>
				</form>
			</div>
			
		</div>
	</div>
</section>
<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
	@stop