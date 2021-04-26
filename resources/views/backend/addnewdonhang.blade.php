@extends('backend.master')
@section('main')

            <div class="container-fluid">
              <center><h2 style="text-transform: uppercase;">Thêm đơn hàng </h2></center>
              @foreach($errors->all() as $message)
              <div class="alert alert-danger">
                <strong><b>ERRORS!</b></strong>   Vui lòng nhập đúng định dạng hình ảnh
              </div>

              @endforeach
              <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <h3>Người đặt :</h3>
                 <select name="user" style="width: 100%;
              height: 40px;
              border-radius: 4px;
              padding-left: 9px;
              font-size: 20px;
              color: #54667a;
              border: 1px solid #ced2d3;">
              @foreach($nd as $nd)
              <option value="{{$nd->id}}">{{$nd->id}} - {{$nd->name}}</option>
              @endforeach

          </select>
                <h3>Mã đơn hàng:</h3>
              <input required type="text" name="madonhang" id="input" class="form-control" value=""><br>
              <h3>Số đơn hàng:</h3>
              <input required type="text" name="sodonhang" id="input" class="form-control" value=""><br>
              <h3>Tình trạng :</h3>
             <select name="trangthai" style="width: 100%;
              height: 40px;
              border-radius: 4px;
              padding-left: 9px;
              font-size: 20px;
              color: #54667a;
              border: 1px solid #ced2d3;">
              <option value="chờ thanh toán ">chờ thanh toán</option>
               <option value="Đã duyệt ">Đã duyệt</option>
          </select>
              
                
              </div>
              <center><button style="margin-top: 20px;text-align: center;" name="slsubmit" type="submit" class="btn btn-primary">Lưu lại</button></center><br>
                {{csrf_field()}}
              </form>
            </div>

@stop