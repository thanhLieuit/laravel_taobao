@extends('backend.master')
@section('main')
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
            <td>Họ Tên người đặt:</td>
            <td>{{$chitietuser->hoten}}</td>
        </tr>
        <tr>
            <td>Ngày đặt:</td>
            <td>{{$chitietuser->created_at}}</td>
        </tr>
        <tr>
            <td>Số điện thoại:</td>
            <td>{{$chitietuser->sdt}}</td>
        </tr>
        <tr>
            <td>Địa chỉ:</td>
            <td>{{$chitietuser->diachi}}, {{$chitietuser->thanhpho}}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{$chitietuser->email}}</td>
        </tr>
        <tr>
            <td>Ghi chú :</td>
            <td>{{$chitietuser->note}}</td>
        </tr>
          @endforeach
    </table>
    <div style="height:30px "></div>
    <table class="table  table-hover">
        <thead>
        <tr>

            <th>Tên sản phẩm</th>
            <th>size</th>
            <th>color</th>
            <th>Số lượng</th>
          
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
            <div class="col-md-6">
                <form action="{!! route('admin.donhang.xulytrahang',['id' =>$chitietuser->id]) !!}" enctype="multipart/form-data" method="get" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class="control-label">Hoàn Tiền</label>
                        <input type="text" id="" class="form-control" placeholder="Hoàn Tiền" name="hoantien" value="">  
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="vehicle1" name="vehicle1" value="Đã nhận hàng">
                        <label for="vehicle1">Đã nhận hàng</label><br>
                    </div>
                    <button type="submit" class="btn btn-primary" >trả hàng</button>
                </form>
            </div>
        </div>
    </div>

    
 
</div>
@stop