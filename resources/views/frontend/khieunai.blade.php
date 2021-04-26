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
				<center><h2 style="text-transform: uppercase;">Khiếu nại</h2></center>
					<table class="table" >
						<thead>			
							<th>Mã đơn hàng</th>
							<th>Ngày tạo</th>
							<th>Số lượng</th>
							<th>Đơn giá</th>
							<th></th>
							
						</thead>
						@foreach($khieunai as $donhang3)
						<tr>
							
							<td>{{$donhang3->madonhang}}</td>
							<td>{{$donhang3->updated_at}}</td>
							<td>{{$donhang3->soluong}}</td>
							<td>
								<p>{{$donhang3->totalqty}} VNĐ
									<br>
									 <span style="font-size: 13px;">({{$donhang3->sum}} ¥)</span>
								</p>
							</td>
							<td>
								@if($donhang3->status == "đang xử lý")
									<p style="color: red">đang xử lý</p>
								@else 
									@if($donhang3->lydo == "không nhận được hàng" || $donhang3->lydo)
										<p style="color: red">đã gửi đơn khiếu nại vui lòng chờ giải quyết</p>
									@else
									
									@endif
								@endif
									
							</td>
							
							
						</tr>
						<tr>
							<td>
								<form action="{{ route('canhan.donhang.bangkhieunaii',['id' =>$donhang3->id]) }}" enctype="multipart/form-data" method="POST" >
    								<input type="hidden" name="_token" value="{{csrf_token()}}">
    								<button type="submit" class="btn btn-primary" >Không nhân được hàng</button> 
    							</form>
    						</td>
    						<td colspan="3">
								<form action="{{ route('canhan.donhang.bangkhieunaiii',['id' =>$donhang3->id]) }}" enctype="multipart/form-data" method="POST" >
    								<input type="hidden" name="_token" value="{{csrf_token()}}">
    								<button type="submit" class="btn btn-primary" >Sản phẩm lỗi</button>
    								<br>
    								<br>
    								<p>chọn lý do</p>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-6">
												<input type="checkbox" id="vehicle1" name="vehicle1" value="Sai màu sắc, kich thước">
			  									<label for="vehicle1"> Sai màu sắc, kich thước</label><br>
											 	<input type="checkbox" id="vehicle2" name="vehicle2" value="Sai hoa văn, kiểu dáng">
											  	<label for="vehicle2"> Sai hoa văn, kiểu dáng</label><br>
											  	<input type="checkbox" id="vehicle3" name="vehicle3" value="Rách, thủng">
											  	<label for="vehicle3"> Rách, thủng</label><br>
											  	<input type="checkbox" id="vehicle4" name="vehicle4" value="Bị móp,cong vênh">
											  	<label for="vehicle4"> Bị móp,cong vênh</label><br>
											  	<input type="checkbox" id="vehicle5" name="vehicle5" value="Dính bẩn không giặt được">
											  	<label for="vehicle5"> Dính bẩn không giặt được</label><br>
											  	<input type="checkbox" id="vehicle6" name="vehicle6" value="Bị mốc">
											  	<label for="vehicle6"> Bị mốc</label><br>
											  	<input type="checkbox" id="vehicle7" name="vehicle7" value="lý do khác">
											  	<label for="vehicle7"> lý do khác</label><br>
											  	<input type="text" name="note1"  data-id="{{$donhang3->id}}" 
												class="note_update" value="" title="">
											</div>
											<div class="col-md-6">
												<legend> ảnh</legend>                       
								                <div class="form-group">
								                    <label for="">image</label>
								                    <input type="file" name="file">

								                </div>
											</div>
										</div>
									</div>
    							</form>
    						</td>
						</tr>
						@endforeach
						
					</table>
					<div class="thuchien">
						
					</div>
				
			</div>
			
		</div>
	</div>
</section>
<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
	@stop