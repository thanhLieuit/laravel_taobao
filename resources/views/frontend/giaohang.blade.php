@extends('frontend.masters')
@section('main')
@section('title','Danatao | Trang thanh toán ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>Trang  payment</h1>
		<center>
			<div class="hinhthan hinhthan1"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i>payment</p></div>
	</div>
		</center>
</div>
<section id="giohang">
	<div class="container">
		<div class="giohang1">

			<img src="img/product.png" alt="">
									<hr>
<CENTER><div  class="giohang2"><p>1</p></div></CENTER>
			<h3>Chọn sản phẩm</h3>

		</div>
				<div class="giohang1">
			<img src="img/download.png" alt="">
									<hr>
			<CENTER><div  class="giohang2"><p>2</p></div></CENTER>
			<h3>Xác nhận địa chỉ nhận hàng</h3> 
		</div>
				<div class="giohang1">
			<img src="img/shopping-cart1.png" alt="">
			<hr>
			<CENTER><div style="background-color: #EB4D4B" class="giohang2"><p>3</p></div></CENTER>
			<h3><b>Thanh toán</b></h3>
		</div>
				<div class="giohang1">
			<img src="img/debit-card.png" alt="">
			<hr>
			<CENTER><div class="giohang2"><p>4</p></div></CENTER>
			<h3>Đặt Cọc</h3>
		</div>
				
	</div>
</section>
<br>
<section>
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<form action="" enctype="multipart/form-data" method="post" >
    				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<table class="table">
						<thead>		
						
							<th>Thông tin</th>
							<th>Số lượng</th>
							<th>Giá trên web</th>
							<th>Tổng tiền</th>
							<th>Tỷ giá</th>
						
						</thead>
						
						@foreach($cart as $cart)
						<tr>
						<td>
							{{ $cart->itemName }} 
							<br>
							màu: {{ $cart->color }} | Size: {{ $cart->size }}
						</td>
						<td>{{ $cart->quantity }} </td>
						<td>{{ $cart->itemPriceNDT }}  ¥</td>
						<td>{{ $cart->price }}  ¥</td>
						<td>{{$tygia}} VND</td>
						</tr>
						@endforeach
						
					</table>
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<div class="row donhang">
									<div class="col-md-6">
										
										<p>Phí dịch vụ</p>
										<p>Kiểm hàng</p>
										<p>Tổng tiền hàng(Tạm tính): </p>
									</div>
									<div class="col-md-6">
										
										<p>{{$pdv}} VND</p>
										<p>{{$kh}} VND</p>
										<p>{{ $sum }} VNĐ</p>
									</div>
								</div>
								<div class="ghichu">
									<br>
			  						<label for="vehicle1">note </label>
			  						<p>thêm nhưỡng thông tin bạn cần (săn sale || Đóng Gỗ) vào note</p>
			  						<br> 
			  						<textarea id="w3mission" rows="4" cols="50" name="note"></textarea>
			  						<br>
			  						<br>
			  					
			  					
								</div>
							</div>
							<div class="col-md-6">
								<div class="diachigiaohang">
									<br>
									<p>ĐỊA CHỈ GIAO HÀNG</p>
									<hr>
									@foreach($user as $user)
									
										<p style="font-weight: bold;">{{ Auth::user()->name }}</p>
									
										<p>{{ $user->sodienthoai }}</p>
										
										<p>{{ $user->diachi }}, {{ $user->thanhpho }}</p>
									@endforeach
								
								</div>
								<br>
								<button type="submit" class="btn btn-primary" >đặt hàng</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection

