@extends('backend.master')
@section('main')
<br>
<div class="container">
	<div class="qv">
		<a href="{{route('admin/khachhang/danhsachkhachhang')}}">Danh sách khách hàng</a>
	</div>
	<div class="ten">
	 	<h3>
	 		@foreach($thongtin1 as $thongtin1)
	 		@if($thongtin1->gioitinh =="nam")
				<p>Anh {{$thongtin1->hoten}}</p>
			@elseif($thongtin1->gioitinh =="nữ")
				<p>Chị {{$thongtin1->hoten}}</p>
			@endif
			@endforeach
	 	</h3>
	</div>
	<div class="col-md-12">
		<div class="top_1">
			<div class="row">
				<div class="col-md-4">
					<p>Thông tin cá nhân</p>
				</div>
				<div class="col-md-5"></div>
				<div class="col-md-3">
					 <div class="profile-text"> 
                        <a href="index.html#" class="dropdown-toggle link u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Thao tác khác
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu animated flipInY">
                                <a href="{{ route('admin/khachhang/editkhachang',['id'=>$thongtin1->id])}}"><center>Cập nhật thông tin</center></a>
                                <a href="{{ route('admin/khachhang/deletekhachhang',['id'=>$thongtin1->id])}}"><center>xóa thông tin</center></a>                   
                        </div>
                        </div>
				</div>
			</div>
		</div>
		<div class="top_2">
			
			<div class="row">
				@foreach($thongtin as $thongtin)
				<div class="col-md 4">
					<p>Nhóm khách hàng: </p>
					<p>Số điện thoại: {{$thongtin->sdt}} </p>
					<p>Email: {{$thongtin->email}}</p>
				</div>
				<div class="col-md-4">
					<p>Giới tính: {{$thongtin->gioitinh}}</p>
					<p>Ngày sinh: {{$thongtin->ngaysinh}}</p>
					<p>Mô tả: {{$thongtin->note}}</p>			
				</div>
				<div class="col-md-4">
					<p>Người phụ trách: {{$thongtin->name}}</p>
					<p>Chiết khấu: </p>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Lịch sử mua hàng</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Lịch sử giao hàng</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Lịch sử công nợ</button>
</div>

<div id="London" class="tabcontent">
  	<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  	<table class="table" style="text-align:center">
					<thead>
								
						<th>Mã đơn hàng</th>
						<th>Trạng thái</th>
						<th>Giao hàng</th>
						<th>Thanh toán</th>
						<th>Giá trị</th>
						<th>Chi nhánh</th>
						<th>Ngày ghi nhận</th>
						<th>Cập nhật cuối</th>
					</thead>
					@foreach($donhang as $donhang)
						<tr>
							<td>{{$donhang->madonhang}}</td>
							<td>{{$donhang->status}}</td>
							<td>
								@if($donhang->status == "kết thúc đơn")
								<i class="fa fa-circle" aria-hidden="true"></i>
								
								@else
								<i class="fa fa-circle-o-notch fa-spin" ></i>
								@endif
							</td>
							<td>
								@if($donhang->coc == 0)
								<i class="fa fa-circle-o-notch fa-spin" ></i>
								@elseif($donhang->coc < $donhang->totalqty   )
								<i class="fa fa-adjust" aria-hidden="true"></i>
								@elseif($donhang->coc == $donhang->totalqty )
								<i class="fa fa-circle" aria-hidden="true"></i>
								@endif

							</td>
							<td>{{$donhang->totalqty}}</td>
							<td>chi nhánh mặc định</td>
							<td>{{$donhang->created_at}}</td>
							<td>{{$donhang->updated_at}}</td>

						</tr>
					@endforeach
					<thead>
					
						<th>Mã đơn hàng</th>
						<th>Trạng thái</th>
						<th>Giao hàng</th>
						<th>Thanh toán</th>
						<th>Giá trị</th>
						<th>Chi nhánh</th>
						<th>Ngày ghi nhận</th>
						<th>Cập nhật cuối</th>
					</thead>
	</table>
</div>

<div id="Paris" class="tabcontent">
  	<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  	<table class="table" style="text-align:center">
		<thead>
					
			<th>Mã đơn hàng</th>
			<th>Mã vận đơn</th>
			<th>Ghi chú</th>
			<th>Trạng thái</th>
			<th>Giá trị</th>
			<th>Chi nhánh</th>
			<th>Ngày ghi nhận</th>
			
		</thead>
		@foreach($giaohang as $giaohang)
			<tr>
				<td>{{$giaohang->madonhang}}</td>
				<td>{{$giaohang->madonvan}}</td>
				<td>{{$giaohang->note}}</td>
				<td>{{$giaohang->status}}</td>
				
			
				<td>{{$giaohang->totalqty}}</td>
				<td>{{$giaohang->tennhavanchuyen}}</td>
				<td>{{$giaohang->created_at}}</td>
				

			</tr>
		@endforeach
		<thead>
		
			<th>Mã đơn hàng</th>
			<th>Mã vận đơn</th>
			<th>Ghi chú</th>
			<th>Trạng thái</th>
			<th>Giá trị</th>
			<th>Chi nhánh</th>
			<th>Ngày ghi nhận</th>
		</thead>
	</table> 
</div>

<div id="Tokyo" class="tabcontent">
  	<span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
	<table class="table" style="text-align:center">
		<thead>
					
			<th>Mã đơn hàng</th>
			<th>Mã vận đơn</th>
			<th>Ghi chú</th>
			<th>Trạng thái</th>
			<th>Giá trị</th>
			<th>Ngày ghi nhận</th>
			<th>Thanh toán</th>
			
		</thead>
		@foreach($congno as $congno)
			<tr>
				<td>{{$congno->madonhang}}</td>
				<td>{{$congno->madonvan}}</td>
				<td>{{$congno->note}}</td>
				<td>{{$congno->status}}</td>
				<td>{{$congno->totalqty}}</td>		
				<td>{{$congno->created_at}}</td>
				<td>
					@if($congno->coc == 0)
					<i class="fa fa-circle-o-notch fa-spin" ></i>
					@elseif($congno->coc < $congno->totalqty   )
					<i class="fa fa-adjust" aria-hidden="true"></i>
					@elseif($congno->coc == $congno->totalqty )
					<i class="fa fa-circle" aria-hidden="true"></i>
					@endif

				</td>

			</tr>
		@endforeach
		<thead>
		
			<th>Mã đơn hàng</th>
			<th>Mã vận đơn</th>
			<th>Ghi chú</th>
			<th>Trạng thái</th>
			<th>Giá trị</th>
			<th>Ngày ghi nhận</th>
			<th>Thanh toán</th>
		</thead>
	</table>
</div>
	</div>
</div>
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
@endsection