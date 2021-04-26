@extends('frontend.masters')
@section('main')
@section('title','Danatao | Trang cá nhân ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>Trang checkout</h1>
		<center>
			<div class="hinhthan hinhthan1"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i>Trang checkout</p></div>
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
			<img src="img/cloud-computing.png" alt="">
									<hr>
			<CENTER><div style="background-color: #EB4D4B" class="giohang2"><p>2</p></div></CENTER>
			<h3><b>Xác nhận địa chỉ nhận hàng</b></h3> 
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
		<div class="tieudee"><p>Bạn vui lòng chọn địa chỉ giao hàng có sẵn bên dưới</p>
			<br>
			<p><a href="{{ route('canhan') }}">bạn vui lòng cập nhật thông tin</a></p>
		</div>
		<div class="col-md-6">
			<?php $chitietruser = DB::table('chitietusers')
			->where('userss_id',Auth::user()->id)->get();
		  ?>
		@if( $chitietruser->userss_id = Auth::user()->id) 
			<div class="card4">
				@foreach($chitietruser as $chitietruser)
                <header class="card-header">
                    <p class="card-header-title has-text-grey">
                        {{ Auth::user()->name }}
                    </p>
                </header>
                <div class="card-content">
                    <div class="content">
                        <p><span class="has-text-grey-light">Địa chỉ:</span> {{ $chitietruser->diachi }}, {{ $chitietruser->thanhpho }}</p>
                        <p><span class="has-text-grey-light">Điện thoại:</span>{{ $chitietruser->sodienthoai }}</p>
                    </div>
                </div>
                <footer class="card-footer" style="margin-top: 10px;">
                    <a href="{{route('giaohang')}}" class="card-footer-item">Giao đến địa chỉ này</a>
                    <a href="" class="card-footer-item">Chỉnh sửa</a>
                </footer>
          		@endforeach
            </div>
        @endif
		</div>	
	</div>
	<br>
	<br>
</section>
@endsection