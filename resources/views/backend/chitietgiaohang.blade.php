@extends('backend.master')
@section('main')
<br>
<div class="container">
	<div class="col-md-12">
		<a href="{{route('admin.donhang.listgiaohang')}}"> quản lý giao hàng</a>
		<div class="row">
			


			<div class="col-md-8">
				<div class="mvd" style="background-color: white;padding: 10px">
					@foreach($donvan as $donvan)
					<h3>Mã vận đơn: <span>{{$donvan->madonvan}}</span></h3> 
					@if($donvan->status == "Chờ giao hàng")
					<p style="color: red">{{$donvan->status}}</p>
					@elseif($donvan->status == "Đang giao hàng")
					<p style="color: blue">{{$donvan->status}}</p>
					@elseif($donvan->status == "Giao hàng thành công")
					<p style="color: green">{{$donvan->status}}</p>
					@endif
					@endforeach
					<hr>
					<div class="col-md-12">
						<div class="row">
							@foreach($thongtinkh as $thongtinkh)
							<div class="col-md-6">
								<p>Đơn hàng: <span>{{$thongtinkh->madonhang}}</span></p>
								<p>Người Nhận: <span>{{$thongtinkh->hoten}}</span></p>
								<p>Điện thoại: <span>{{$thongtinkh->sdt}}</span></p>
								<p>Địa chỉ nhận hàng: <span>{{$thongtinkh->diachi}}, {{$thongtinkh->thanhpho}}</span></p>
							</div>
							<div class="col-md-6">
								<p>Ngày đóng gói: {{$thongtinkh->created_at}} <span></span></p>
								
							</div>
							@endforeach
						</div>
						<a href="{{ route('admin.donhang.chitietdonhang.inhoadonn',['id' =>$thongtinkh->id]) }}" 
       					 target="_blank" id="id" ><button style="" type="button" class="btn btn-default"><i class="fa fa-print" aria-hidden="true"></i> In hóa đơn</button></a>
					</div>
				</div>
				<div class="ctpg" style="background-color: white;padding: 10px">
					<h3>Chi tiết phiếu giao hàng</h3>
					<table id="" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
	                        <thead>
	                            <tr>
	                                <th>Mã đơn hàng</th>
	                                <th>Tên sản phẩm</th>
	                                <th>Đơn giá</th>
	                                <th>Số lượng</th>
	                               
	                                
	                            </tr>
	                        </thead>
	             
	                        <tbody>
	                        	@foreach($donhang as $donhang)
	                            <tr>
	                                <td>{{$donhang->madonhang}}</td>
	                                <td>{{$donhang->name_product}}</td>
	                                <td>{{$donhang->totalqty}}</td>
	                                <td>{{$donhang->quantity}}</td>
	                              
	                                
	                            </tr>
	                            @endforeach
	                        </tbody>
	                    </table>
	                    <div class="tonng">
	                    	<p>Tổng tiền: <span>{{$sum}}</span></p>
							<p>Đã thanh toán: <span>{{$coc}}</span></p>
							<p>Tổng tiền cần thanh toán: <span>{{$sum1}}</span></p>
	                    </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="ttpgh" style="background-color: white;padding: 10px">
					<h3>Thông tin phiếu giao hàng</h3>
					<hr>
					<p>Đối tác vận chuyển: <span>{{$donvan->tennhavanchuyen}}</span></p>
					<p>Tiền thu hộ COD: <span>{{$sum1}}</span></p>
					<p>Phí trả ĐTVC: <span>{{$donvan->phitravanchuyen}}</span></p>
					<p>Người trả phí: <span>{{$donvan->note}}</span></p>
					<p>Ghi chú: <span>{{$donvan->yeucau}}</span></p>
				</div>
				<br>
				@if($donvan->status == "chờ giao hàng")
				<a href="{{route('admin.donhang.xuatkho',['id'=>$donvan->id])}}" class="btn btn-primary">xuất kho</a>
				<a href="{{route('admin.donhang.huyshipgiaohang',['id'=>$donvan->id])}}" class="btn btn-danger">Hủy giao hàng</a>
				@elseif($donvan->status == "Đang giao hàng")
				<a href="{{route('admin.donhang.xacnhangiaohang',['id'=>$donvan->id])}}" class="btn btn-primary">xác nhận
				 giao hàng thành công</a>
				 <a href="{{route('admin.donhang.huyshipgiaohang',['id'=>$donvan->id])}}" class="btn btn-danger">Hủy giao hàng</a>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection