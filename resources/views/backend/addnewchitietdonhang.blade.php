@extends('backend.master')
@section('main')

            <div class="container-fluid">
              <center><h2 style="text-transform: uppercase;">Thêm chi tiết đơn hàng </h2></center>
              @foreach($errors->all() as $message)
              <div class="alert alert-danger">
                <strong><b>ERRORS!</b></strong>   Vui lòng nhập đúng định dạng hình ảnh
              </div>

              @endforeach
              <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <h3>ID Người Đặt hàng : {{$addctdh->users_id}}</h3>
                <h3>ID đơn hàng</h3>
                <select name="iddon" style="width: 100%;
              height: 40px;
              border-radius: 4px;
              padding-left: 9px;
              font-size: 20px;
              color: #54667a;
              border: 1px solid #ced2d3;">
              <option value="{{$addctdh->id}}">{{$addctdh->id}} - {{$addctdh->madonhang}} </p></option>
          </select>
                <h3>Sản phẩm</h3>
                <select name="pro" style="width: 100%;
              height: 40px;
              border-radius: 4px;
              padding-left: 9px;
              font-size: 20px;
              color: #54667a;
              border: 1px solid #ced2d3;">
              @foreach($addctdh1 as $addctdh1)
              <option value="{{$addctdh1->id}}">{{$addctdh1->id}} - {{$addctdh1->name}}</p></option>
                @endforeach
          </select>
           <h3>Số lượng:</h3>
              <input required type="number" name="sl" id="input" class="form-control" value=""><br>
              <h3>Giá:</h3>
              <input required type="text" name="gia" id="input" class="form-control" value=""><br>
          </select>
                
              </div>
              <center><button style="margin-top: 20px;text-align: center;" name="slsubmit" type="submit" class="btn btn-primary">Lưu lại</button></center><br>
                {{csrf_field()}}
              </form>
            </div>

@stop