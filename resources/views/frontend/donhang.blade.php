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
			<div class="col-md-2 cn1">
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
			<div class=" col-md-10 col-lg-10 cn1">
				<center><h2 style="text-transform: uppercase;">Đơn hàng</h2></center>
				<div class="tab">
				  <button class="tablinks" onclick="openCity(event, 'cd')" id="defaultOpen">Chờ duyệt</button>
				  <button class="tablinks" onclick="openCity(event, 'huy')">Hết hàng/ hủy </button>
				  <button class="tablinks" onclick="openCity(event, 'cmh')">Chờ mua hàng</button>
				  <button class="tablinks" onclick="openCity(event, 'dmh')">Đã mua hàng</button>
				  <button class="tablinks" onclick="openCity(event, 'dvk/cg')">Đã về kho/ chờ giao</button>

				  <button class="tablinks" onclick="openCity(event, 'dkt')">kết thúc </button>
				  <!-- <button class="tablinks" onclick="openCity(event, 'cdh')">Chờ đơn hàng </button>
				  -->
				</div>

				<div id="cd" class="tabcontent">
				  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
				  <div class="col-md-12">
				  	<div class="row">
				  		<h3>đơn hàng chờ duyệt</h3>
				  <table class="table" style="text-align:center">
					<thead>
								
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
						<th>Cọc tiền</th>
					</thead>
					@foreach($donhang1 as $donhang1)
					<tr>
						
						<td>{{$donhang1->madonhang}}</td>
						<td>{{$donhang1->created_at}}</td>
						<td>{{$donhang1->soluong}}</td>
						<td>
							<p>{{$donhang1->totalqty}} VNĐ
								<br>
								 <span style="font-size: 13px;">({{$donhang1->sum}} ¥)</span>
							</p>
						</td>
						<td>
							@if(!$donhang1->dathanhtoan)
								0 VNĐ
							@else
								{{$donhang1->dathanhtoan}}
							@endif
						</td>
						<td>
							<form action="
							{!! url('canhan/donhang/ghichu',['id' =>$donhang1->id,'note'=>$donhang1->note]) !!}" enctype="multipart/form-data" method="get" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">	
								<input type="text" name="note1"  data-id="{{$donhang1->id}}" 
								class="note_update" value="{{$donhang1->note}}" required="required" title="">
	             			</form>
						</td>
				
						<td><a href="{{ route('canhan.donhang.tatcadonhang.choduyet',['id' =>$donhang1->id]) }}">chi tiết</a></td>
						<td>
							@if($donhang1->status == "Còn hàng")
								@if($donhang1->coc)	
             					{{$donhang1->coc}}
	             				@else
	             				<form action="{{ route('canhan.donhang.tatcadonhang.coctien',['id' =>$donhang1->id]) }}" enctype="multipart/form-data" method="post" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">
	             				<button type="submit" class="btn btn-primary" >Đặt cọc</button>

	             				</form>
								@endif
							@else
								
							@endif
						</td>
					</tr>
					@endforeach
					<thead>
					
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>					
						<th>Thao tác</th>
						<th>Cọc tiền</th>
					</thead>
				</table>
				  	</div>
				  </div>
				</div>
				<div id="huy" class="tabcontent">
				  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
				  <h3>Hủy đơn hàng</h3>
				   <table class="table" style="text-align: center;">
					<thead>
								
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
						
					</thead>
					@foreach($donhang6 as $donhang6)
					<tr>
						
						<td>{{$donhang6->madonhang}}</td>
						<td>{{$donhang6->updated_at}}</td>
						<td>{{$donhang6->soluong}}</td>
						<td>
							<p>{{$donhang6->totalqty}} VNĐ
								<br>
								 <span style="font-size: 13px;">({{$donhang6->sum}} ¥)</span>
							</p>
						</td>
						<td>
							@if(!$donhang6->dathanhtoan)
								0 VNĐ
							@else
								{{$donhang6->dathanhtoan}}
							@endif
						</td>
						<td>
							<form action="
							{!! url('canhan/donhang/ghichu',['id' =>$donhang6->id,'note'=>$donhang6->note]) !!}" enctype="multipart/form-data" method="get" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">	
								<input type="text" name="note1"  data-id="{{$donhang6->id}}" 
								class="note_update" value="{{$donhang6->note}}" required="required" title="">
	             			</form>
						</td>
						<td>
							<form action="{{ route('canhan.donhang.datlai',['id' =>$donhang6->id]) }}" enctype="multipart/form-data" method="post" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">
	             				<button type="submit" class="btn btn-primary" >Đặt lại</button>

	             			</form>
						</td>
					
					</tr>
					@endforeach
					<thead>
					
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
						
					</thead>
				</table> 
				</div>
			
				<div id="cmh" class="tabcontent">
				  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
				  <h3>chờ mua hàng</h3>
				  <table class="table" style="text-align: center">
					<thead>			
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
					</thead>
					@foreach($donhang3 as $donhang3)
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
						<td>{{$donhang3->dathanhtoan}} VNĐ</td>
						<td>
							<form action="
							{!! url('canhan/donhang/ghichu',['id' =>$donhang3->id,'note'=>$donhang3->note]) !!}" enctype="multipart/form-data" method="get" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">	
								<input type="text" name="note1"  data-id="{{$donhang3->id}}" 
								class="note_update" value="{{$donhang3->note}}" required="required" title="">
	             			</form>
						</td>
						<td><a href="{{ route('canhan.donhang.tatcadonhang.chomuahang',['id' =>$donhang3->id]) }}">chi tiết</a></td>
					</tr>
					@endforeach
					<thead>
					
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
					</thead>
				</table> 
				</div>
				<div id="dmh" class="tabcontent">
				  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
				  <h3>Đã mua hàng</h3>
				  <table class="table" style="text-align: center;">
					<thead>		
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
					</thead>
					@foreach($donhang4 as $donhang4)
					<tr>
						
						<td>{{$donhang4->madonhang}}</td>
						<td>{{$donhang4->updated_at}}</td>
						<td>{{$donhang4->soluong}}</td>
						<td>
							<p>{{$donhang4->totalqty}} VNĐ
								<br>
								 <span style="font-size: 13px;">({{$donhang4->sum}} ¥)</span>
							</p>
						</td>
						<td>{{$donhang4->dathanhtoan}} VNĐ</td>
						
						<td>
							<form action="
							{!! url('canhan/donhang/ghichu',['id' =>$donhang4->id,'note'=>$donhang4->note]) !!}" enctype="multipart/form-data" method="get" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">	
								<input type="text" name="note1"  data-id="{{$donhang4->id}}" 
								class="note_update" value="{{$donhang4->note}}" required="required" title="">
	             			</form>
						</td>
						<td><a href="{{ route('canhan.donhang.tatcadonhang.damuahang',['id' =>$donhang4->id]) }}">chi tiết</a></td>
					</tr>
					@endforeach
					<thead>
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
					</thead>
				</table> 
				</div>
				<div id="dvk/cg" class="tabcontent">

				  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
				  <h3>hàng đã về kho</h3>
				  <table class="table" style="text-align: center;">
					<thead>
								
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
					</thead>
					@foreach($donhang7 as $donhang7)
					<tr>
						
						<td>{{$donhang7->madonhang}}</td>
						<td>{{$donhang7->updated_at}}</td>
						<td>{{$donhang7->soluong}}</td>
						<td>
							<p>{{$donhang7->totalqty}} VNĐ
								<br>
								 <span style="font-size: 13px;">({{$donhang7->sum}} ¥)</span>
							</p>
						</td>
						<td>{{$donhang7->dathanhtoan}} VNĐ</td>
						<td>
							<form action="
							{!! url('canhan/donhang/ghichu',['id' =>$donhang7->id,'note'=>$donhang7->note]) !!}" enctype="multipart/form-data" method="get" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">	
								<input type="text" name="note1"  data-id="{{$donhang7->id}}" 
								class="note_update" value="{{$donhang7->note}}" required="required" title="">
	             			</form>
	             		</td>
						<td>
							@if($donhang7->coc == "thanh toán đủ")
	               	 			<p>Đã thanh toán</p>
	               			@elseif($donhang7->coc == "không đủ số tiền thanh toán")
	               			<p>Đến tận nơi thanh toán</p>
	               			@else
	               			<a href="{{ route('canhan.donhang.xacnhanthanhtoan',['id' =>$donhang7->id]) }}" class="btn btn-success" onclick="alert('Đã thanh toán')" name="Click Me">Xác nhận</a>
	               			<br>
	               			@endif
							<a href="{{ route('canhan.donhang.tatcadonhang.hangdave',['id' =>$donhang7->id]) }}">chi tiết</a>
						</td>
					</tr>
					@endforeach
					<thead>
					
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
					</thead>
				</table> 
				</div>
				<div id="dkt" class="tabcontent">
				  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
				  <h3>đơn hàng đã giao</h3>
				  <table class="table" style="text-align: center;">
					<thead>
								
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
					</thead>
					@foreach($donhang5 as $donhang5)
					<tr>
						
						<td>{{$donhang5->madonhang}}</td>
						<td>{{$donhang5->updated_at}}</td>
						<td>{{$donhang5->soluong}}</td>
						<td>
							<p>{{$donhang5->totalqty}} VNĐ
								<br>
								 <span style="font-size: 13px;">({{$donhang5->sum}} ¥)</span>
							</p>
						</td>
						<td>{{$donhang5->dathanhtoan}} VNĐ</td>
						<td>
							<form action="
							{!! url('canhan/donhang/ghichu',['id' =>$donhang5->id,'note'=>$donhang5->note]) !!}" enctype="multipart/form-data" method="get" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">	
								<input type="text" name="note1"  data-id="{{$donhang5->id}}" 
								class="note_update" value="{{$donhang5->note}}" required="required" title="">
	             			</form>
						</td>
						<td>
							<form action="{{ route('canhan.donhang.datlai',['id' =>$donhang5->id]) }}" enctype="multipart/form-data" method="post" >
	    						<input type="hidden" name="_token" value="{{csrf_token()}}">
	             				<button type="submit" class="btn btn-primary" >Đặt lại</button>

	             			</form>
							<a href="{{ route('canhan.donhang.tatcadonhang.hangdave',['id' =>$donhang5->id]) }}">chi tiết</a>
	             			
						</td>
					</tr>
					@endforeach
					<thead>
					
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>Số lượng</th>
						<th>Tiền Hàng</th>
						<th>Đã thanh toán</th>
						<th>Ghi chú</th>
						<th>Thao tác</th>
					</thead>
				</table> 
				</div>
				<!-- <div id="cdh" class="tabcontent">
				  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
				  <h3>Chờ đơn hàng</h3>
				  <table class="table" >
					<thead>
								
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>khối lượng</th>
						
					</thead>
					@foreach($donhang8 as $donhang8)
					<tr>
						
						<td>{{$donhang8->madonhang}}</td>
						<td>{{$donhang8->updated_at}}</td>
						<td>{{$donhang8->weight_tt}}</td>
						
					</tr>
					@endforeach
					<thead>
					
						<th>Mã đơn hàng</th>
						<th>Ngày tạo</th>
						<th>khối lượng</th>
						
					</thead>
				</table> 
				</div> -->

				
			</div>
		</div>
	</div>
</section>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script>
	jQuery(document).ready(function($) {
		$(".note_update").change(function(event) {
			$note = $(this).val();
			$id = $(this).attr('data-id');
			
	
			$.ajax({
				url: 'ghichu/'+$id+'/'+$note,
				type: 'GET'
			})
			.done(function() {
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		});
	});
</script>
<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >

	@stop