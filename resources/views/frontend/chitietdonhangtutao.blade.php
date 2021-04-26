@extends('frontend.masters')
@section('main')
@section('title','Danatao | Đơn hang tự tạo ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
</div>
<div class="element03">
	<div class="container">
		<h1>Trang đơn hàng</h1>
		<center>
			<div class="hinhthan hinhthan1"><p>Trang chủ  <i class="fa fa-angle-right" aria-hidden="true"></i>Trang đơn 	hàng</p>
			</div>
		</center>
	</div>
</div>
<br>
<section>
	<div class="container">
    <br>
          
    <center><h2 style="text-transform: uppercase;color:#EB4D4B ">Chi tiết đơn hàng của </h2></center>

    <table>
          @foreach($thongtinkh as $chitietuser)
        <tr>
            <th width="50%"> <b> <h4>Thông tin khách hàng</h4></b></th>
            <th width="50%"></th>
        </tr>

        <tr>
            <td>Họ Tên khách hàng:</td>
            <td>{{$chitietuser->hoten}}</td>
        </tr>
        <tr>
            <td>Ngày tạo:</td>
            <td>{{$chitietuser->created_at}}</td>
        </tr>
       
          @endforeach
    </table>
    <div style="height:30px "></div>
    <table class="table  table-hover">
        <thead>
        <tr>

            <th style="font-weight: bold;">Tên sản phẩm</th>
            <th style="font-weight: bold;">size</th>
            <th style="font-weight: bold;">color</th>
            <th style="font-weight: bold;">Số lượng</th>
          
        </tr>
        </thead>
        <tbody>
            @foreach($chitietdonhang as $chitietdonhang)
            <tr>
              
                <td><img src="{{$chitietdonhang->image}}" alt="" style="width: 100px;">{{$chitietdonhang->name_product}}</td>
                <td>{{$chitietdonhang->size}}</td>
                <td>{{$chitietdonhang->color}}</td>
                <td>{{$chitietdonhang->quantity}}</td>
               
            </tr>
            @endforeach
        </tbody>
         
      
    </table>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                    <div class="">
                        <p>Tiền hàng: {{$tienhang}} VNĐ</p>   
                        <p>Phí dịch vụ: {{$pdv}} VNĐ</p>
                        <p>Kiểm hàng: {{$kh}} VNĐ</p>
                        <p>Phí VC nội địa : {{$phivcnd}} VNĐ</p>
                        <p>Cân nặng thực tế: {{$kltt}} Kg </p>
                        <p>Cân quy đổi: {{$klqd}} Kg  <span style="margin-left: 33px;">Chiều dài: <span style="background-color: #737373;color: white;">{{$length}}</span> X Chiều rông: <span style="background-color: #737373;color: white;">{{$width}}</span> X Chiều cao: <span style="background-color: #737373;color: white;">{{$height}}</span></span></p>
                        <p>Phi vận chuyển TQ-VN: {{$cvc}} VNĐ</p>
                    <div class="tongdonhang">
                        <p>Tổng tiền hàng(Tạm tính): {{$sum}} VNĐ </p>
                        <p>Đã thanh toán: {{$coc}} VNĐ- Tiền hàng còn thiếu: {{$sum1}} VNĐ</p>
                    </div>
                    </div>
            </div>
          
            
        </div>
    </div>
    
    
 
</div>
</section>
<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" ></section>
@endsection