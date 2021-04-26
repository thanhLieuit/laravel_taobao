
<html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<body onload="window.print();">
    <div class="container" id="print_div">
    <br>
          
    <center><h2 style="text-transform: uppercase;color:#EB4D4B ">Hóa đơn </h2></center>

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
        <tr>
            <td>Mã đơn hàng :</td>
            <td>{{$chitietuser->madonhang}}</td>
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
              
                <td>{{$chitietdonhang->name_product}}</td>
                <td>{{$chitietdonhang->size}}</td>
                <td>{{$chitietdonhang->color}}</td>
                <td>{{$chitietdonhang->quantity}}</td>
               
            </tr>
            @endforeach
        </tbody>
                <thead>
        <tr>
            <th><b>TỔNG TIỀN</b></th>
            <th></th>
            <th></th>
          
            <th style="font-weight: bold;color: #EB4D4B">{{$sum1}}</th>
        </tr>
        </thead>
      
    </table>
<hr>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="ttnh">
                <h3>Thông tin người nhận hàng</h3>
                <p>Mã vận đơn: <span>{{$chitietuser->madonvan}}</span></p>
                <p>Người nhận: <span>{{$chitietuser->hoten}}</span></p>
              
                <p>số điện thoại: <span>{{$chitietuser->sdt}}</span></p>
                <p>địa chỉ: <span>{{$chitietuser->diachi}}, {{$chitietuser->thanhpho}}</span></p>
                <p>thu hộ: <span>{{$sum1}} VND</span></p>
            </div>
        </div>

    </div>
</div>
    
</div>


</body>
  <script>
$(document).ready(function(){
  $("#id").click(function(){
    $("#print_div").printThis();
  });
});


</script>
</html>