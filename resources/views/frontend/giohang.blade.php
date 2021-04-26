@extends('frontend.masters')
@section('main')
@section('title','Danatao | Giỏ Hàng ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>Trang Giỏ Hàng</h1>
		<center>
			<div class="hinhthan hinhthan1"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i>Giỏ Hàng</p></div>
	</div>
		</center>
</div>
	</section>
	<section id="giohang">
	<div class="container">
		<div class="giohang1">

			<img src="img/package.png" alt="">
									<hr>
<CENTER><div style="background-color: #EB4D4B" class="giohang2"><p>1</p></div></CENTER>
			<h3><b>Chọn sản phẩm</b></h3>

		</div>
				<div class="giohang1">
			<img src="img/download.png" alt="">
									<hr>
			<CENTER><div class="giohang2"><p>2</p></div></CENTER>
			<h3>Xác nhận địa chỉ nhận hàng</h3> 
		</div>
				<div class="giohang1">
			<img src="img/shopping-cart.png" alt="">
			<hr>
			<CENTER><div class="giohang2"><p>3</p></div></CENTER>
			<h3>Thanh toán</h3>
		</div>
				<div class="giohang1">
			<img src="img/debit-card.png" alt="">
			<hr>
			<CENTER><div class="giohang2"><p>4</p></div></CENTER>
			<h3>Đặt hàng</h3>
		</div>
				
	</div>
</section>
<section>
	<div class="container">
		<div class="table-responsive">
			<form action="" enctype="multipart/form-data" method="POST" >
    		<input type="hidden" name="_token" value="{{csrf_token()}}">
				<table class="table ">
					<thead>
						<tr class="tieudebang">
							<th width="">THÔNG TIN SẢN PHẨM</th>
							<th width="">link sản phẩm</th>
							<th width="">SỐ LƯỢNG</th>
							<th width="">Tiền hàng</th>
							<th width="">THAO TÁC</th>
						</tr>
					</thead>
					<tbody>
						
						<tr class="tenshop1">
							
							<td width="">Shop Name</td>
						
						</tr>
						
							@foreach($cart as $cart)
						<tr>
						
							<td style="width: 100px;">
								<div style="width: 30%;float: left;"><img style="width: 100%" src="img/avatar.png" alt=""></div>
								<div class="tt1" style="margin-left: 115px;">
									<p style=""><b>
									{{ $cart->itemName}}</b>
								</p>
								<p style=""><b>
									Size: {{ $cart->size}} | màu: {{ $cart->color}}</b>
								</p>
								
								</div>
							</td>
							<td width="">
								{{ $cart->itemLink}}
							</td>
							<td style="width: 100px;">
								<input style="width: 50px;margin-top:30px;margin-left: 17px;padding-left: 20px;" type="text" name="num" 
								 data-id="{{$cart->id}}" class='nam_update_cart_value' 
								 data-price="{{$cart->itemPriceNDT}}" value="{{ $cart->quantity}}" >
							</td>

							<td width=""><p style="padding: 30px 0;text-align: center;"><b>{{ $cart->price}} ¥</b></p></td>
							<td width=""><a href="{{ route('huy',['id' =>$cart->id]) }}"><p style="padding: 30px 0;text-align: center;"><b>HỦY</b></p></a></td>
							
						</tr>
						@endforeach
					</tbody>
									<thead>
						<tr class="tieudebang">
							<th>
							<input type="checkbox" id="vehicle1" name="kh" value="kiểm hàng">
							<label for="vehicle1"> kiểm hàng</label>
							<input type="checkbox" id="vehicle2" name="sl" value="Sale">
							<label for="vehicle2"> Sale</label>
	  						</th>
							<th></th>
							<th></th>
							<th>TỔNG: 00</th>
						
							<th> <span style="color: red">{!! $price !!}</span></th>
								
						</tr>
						<td><button type="submit" class="btn btn-primary" >Tiến thành đặt hàng</button></td>
					</thead>

				</table>
			</form>
					<div class="table-responsive">
			<table class="table ">
				<thead>
					<tr class="tieudebang">

						<th width="100%">Sản phẩm sẽ bị hủy sau 30 ngày nếu bạn không kết đơn</th>
					
					</tr>
				</thead>
			</table>
		</div>
		</div>
	</div>
<script>
	jQuery(document).ready(function($) {
		$(".nam_update_cart_value").change(function(event) {
			$qty = $(this).val();
			$id = $(this).attr('data-id');
			$price=$(this).attr('data-price');
	
			$.ajax({
				url: 'giohang/update/'+$id+'/'+$qty,
				type: 'GET'
			})
			.done(function() {
				console.log("success");
				$(this).parent().find('.pricesssss').html($qty*$price)
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
@stop