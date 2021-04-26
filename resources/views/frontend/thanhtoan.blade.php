@extends('frontend.masters')
@section('main')
@section('title','Danatao | Trang cá nhân ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>Trang nap tiền</h1>
		<center>
			<div class="hinhthan hinhthan1"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i>Trang cá nhân</p></div>
	</div>
		</center>
</div>
<br>
<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4">
				<div class="card3">
                    <div class="card-block">
                        <h4 class="card-title" style="text-align: center;">
                        	TRẦN KHÁNH UYÊN
							0071001203631  Vietcombank CN TP.HCM
                        </h4>
                
                            <div class="logo1" style="width: 375px;margin-left: -11px;">
                            	<img src="{!!url('img/VCB.png')!!}" alt="" style="width: 100%;">
                            </div>
          
                    </div>
                </div>
			</div>
			<div class="col-md-4">
				<div class="card3">
                    <div class="card-block">
                        <h4 class="card-title" style="text-align: center;">
                        	TRẦN KHÁNH UYÊN
							19035238073013 Techcombank CN Hùng Vương
                        </h4>
                
                            <div class="logo1" style="width: 265px;margin-left: 42px;">
                            	<img src="{!!url('img/Techcombank_logo.png')!!}" alt="" style="width: 100%;">
                            </div>
          
                    </div>
                </div>
			</div>
			<div class="col-md-4">
				<div class="card3">
                    <div class="card-block">
                        <h4 class="card-title" style="text-align: center;">
                        	TRẦN KHÁNH UYÊN
							2016206049458 Agribank CN Chi Lăng - Đà Nẵng
                        </h4>
                
                            <div class="logo1" style="width: 286px;margin-left: 33px;">
                            	<img src="{!!url('img/logo-agribank.png')!!}" alt="" style="width: 100%;">
                            </div>
          
                    </div>
                </div>
			</div>
		</div>
	</div>
	<form action="" enctype="multipart/form-data" method="POST" >
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<legend>thanh toán</legend>
				<div class="form-group">			
					<label for="">Name</label>
					<input type="text" class="form-control" id="name" placeholder="tên người nạp" name="name" >
				</div>
				<div class="form-group">
					<label for="">hình ảnh thanh toán</label>
					<input type="file" name="file" required="true">
				</div>
				<div class="form-group">
					<label for="">nôi dung</label>
					<input type="text" class="form-control" id="" placeholder="nội dung" name="nd" >
					
				</div>
				<div class="form-group">
					<label for="">Số tiền cần nạp</label>
					<input type="text" class="form-control" id="" placeholder="số tiền cần nạp" name="st" >
					
				</div>
			
				<button type="submit" class="btn btn-primary" >cập nhật</button>
			</form>
</div>
<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
	@stop