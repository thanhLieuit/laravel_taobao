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
			<div class="col-md-9">
				<form action="" enctype="multipart/form-data" method="post" >
	    		<input type="hidden" name="_token" value="{{csrf_token()}}">
	    			
				        	
				        			<p>tên sp: <input type="text" name="name_product"  
										class="luulink" value=""  title="" style="border-radius: 10px;width: 50%;"> 
									</p>
									<p>link sp: <input type="text" name="url"  data-id="" 
										class="luulink" value=""  title="" style="border-radius: 10px;width: 50%;"> 
									</p>
									
				        			<p>note: <input type="text" name="note2"  data-id="" 
									class="luulink" value=""  title="" style="margin-left: 13px;border-radius: 10px;width: 50%;"></p>
								
								<button type="submit" class="btn btn-primary" >lưu link</button>
				        	
						
					</form>
					<table id="example1" class="table table-striped table-bordered" style="width:100%">
				        <thead>
				            <tr>
				                
				                <th>Sản phẩm</th>
				                <th>Ghi chú</th>
				                <th>Hành động</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@foreach($luulink as $luulink)
				        	<tr>
				        		<td>
				        			{{$luulink->name_product}}
									<br>
									<a href="{{$luulink->url}}">{{$luulink->url}}</a>
				        		</td>
				        		<td>{{$luulink->note}}</td>
								<td><a href="{{ route('canhan.donhang.xoalink',['id' =>$luulink->id]) }}">xóa link</a></td>
				        	</tr>
					        @endforeach	    			
				        </tbody>
				        <tfoot>
				            <tr>
				                
				                <th>Sản phẩm</th>
				                <th>Ghi chú</th>
				                <th>Hành động</th>
				            </tr>
				        </tfoot>
				    </table>
				
			</div>
			
			
		</div>
	</div>
</section>

@endsection