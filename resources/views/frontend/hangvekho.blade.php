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
				<center><h2 style="text-transform: uppercase;">Chi tiết đơn hàng</h2></center>	
			<div class="card2">
				<h2 style="text-transform: uppercase;">Thông tin giao hàng</h2>
				<div class="col-md-12">
					<div class="row">
						@foreach($chitietuser as $chitietruser)
               				<form action="{{route('capnhatthongtin',['id',$chitietruser->id])}}" enctype="multipart/form-data" method="POST" >
    							<input type="hidden" name="_token" value="{{csrf_token()}}">
    							<div class="col-md-4">
				    				<div class="row">	
										<label for="input" class="col-sm-5 control-label">HỌ & TÊN:</label>
										<div class="col-sm-7">
											<input type="tel" name="hovaten" id="input" class="form-control" value="{{ $chitietruser->hoten }}" required="required" title="">
										</div>
									</div>
									<br>
									<div class="row">
										<label for="input" class="col-md-5 control-label">EMAIL:</label>
										<div class="col-md-7">
											<input type="tel" name="email" id="input" class="form-control" value="{{$chitietruser->email}}" required="required" title="">
										</div>
									</div>
									<br>		
    							</div>
    							<div class="col-md-4">
    								<div class="row">	
										<label for="input" class="col-sm-5 control-label">SỐ ĐIỆN THOẠI:</label>
										<div class="col-sm-7">
											<input type="tel" name="phone" id="input" class="form-control" value="{{$chitietruser->sodienthoai}}" required="required" title="">
										</div>
									</div><br>
									<div class="row">
										<label for="input" class="col-sm-5 control-label">Địa chỉ:</label>
										<div class="col-sm-7">
											<input type="text" name="loca" id="input" class="form-control" value="{{$chitietruser->diachi}}" required="required" title="">
										</div>
									</div><br>	
									<div class="row">
										<label for="input" class="col-sm-5 control-label">Thành Phố:</label>
										<div class="col-sm-7">
											<input type="text" name="address" id="input" class="form-control" value="{{$chitietruser->thanhpho}}" required="required" title="">
										</div>
									</div><br>
    							</div>
    							<div class="col-md-4">
    								<p>ghi chú của khách hàng</p>	
								<form action="
							{!! url('canhan/donhang/ghichu',['id' =>$chitietruser->id,'note'=>$chitietruser->note]) !!}" enctype="multipart/form-data" method="get" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">

								<input type="text" name="note1"  data-id="{{$chitietruser->id}}" 
								class="note_update1" value="{{$chitietruser->note}}" required="required" title="" style="padding-left: 10px;border-radius: 10px;height: 50px;">
	             			</form>
	             			<button type="submit" class="btn btn-default nut nut4"  style="float: right;margin-top: 70px;">Sửa Thông tin</button>
    							</div>
    							
    						</form>
          				@endforeach

					</div>
				</div>

            </div>
			<br>
			<div class="col-md-12">
				<div class="row">
					 <h3> <p><span class="has-text-grey-light">Mã đơn hàng:</span>{{ $chitietruser->madonhang }}</p></h3>
						<table class="table">
						<thead>		
						
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th>Thành tiền</th>
							<th>Thao tác</th>
						
						</thead>
								@foreach($chitietdonhang as $chitietdonhang)
							<tr>
							<td>
								link url
								<br>
								{{ $chitietdonhang->name_product }} 
								<br>
								màu: {{ $chitietdonhang->color }} | Size: {{ $chitietdonhang->size }}
							</td>
							
							<td >{{ $chitietdonhang->quantity }} </td>
						
							<td>{{$giaweb}} VNĐ
								<br>
								<span style="font-size: 12px;">({{ $chitietdonhang->price_product }}  ¥)</span>
							</td>
							<td>{{$tienhang}} VNĐ
								<br>
								<span style="font-size: 12px;">
									({{ $chitietdonhang->price_product }}  ¥ X {{$chitietdonhang->quantity}} )
								</span>
							</td>
							<td>
								vui lòng chờ
							</td>
							</tr>
							@endforeach
						
						</table>
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="ktsl">
								
									 <div class="form-check" style="margin-left: 240px">
  										<div class="col-md-3">
  											<input 
                                   				{{ $getcheckkh->contains( $chitietdonhang->kiemhang = 1 ) ? 'checked' : '' }}
                                  				type="checkbox" 
                                  				class="form-check-input" name=	"chitietdonhang" value="{{ $chitietdonhang->kiemhang }}" >
  											<label for="vehicle2"> Kiểm hàng</label><br>
  										</div>
  										<div class="col-md-3">
  											<input 
                                   				{{ $getchecksl->contains( $chitietdonhang->sale = 1 ) ? 'checked' :'' }}
                                  				type="checkbox" 
                                  				class="form-check-input" name=	"chitietdonhang" value="{{ $chitietdonhang->sale }}" >
  											<label for="vehicle3"> Săn Sale</label><br><br>
  										</div>
								</div>
									<hr>
										<div class="donhang">
												<p>Tiền hàng: {{$tienhang}} VNĐ</p>   
	                                            <p>Phí dịch vụ: {{$pdv}} VNĐ</p>
	                                            <p>Kiểm hàng: {{$kh}} VNĐ</p>
	                                            <p>Phí VC nội địa : {{$phivcnd}} VNĐ</p>
											<div class="tongdonhang">
												<p>Tổng tiền hàng(Tạm tính): {{$sum}} VNĐ </p>
												<p>Đã thanh toán: {{$coc}} VNĐ- Tiền hàng còn thiếu: {{$sum1}} VNĐ</p>
											</div>
	                                    </div>
								</div>

						

							</div>
						</div>

				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@endsection