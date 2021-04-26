@extends('backend.master')
@section('main')

            <div class="container-fluid">
              <center><h2 style="text-transform: uppercase;">Thêm Sản phẩm </h2></center>
              @foreach($errors->all() as $message)
              <div class="alert alert-danger">
                <strong><b>ERRORS!</b></strong>   Vui lòng nhập đúng định dạng hình ảnh
              </div>

              @endforeach
              <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <h3>Tên sản phẩm :</h3>
                <input required type="text" name="name" id="input" class="form-control" value="" >
                <h3>Hình ảnh</h3>
                <div class="form-group" >
                  <center>  <img id="avatar" class="thumbnail" width="500px" src="{!!url('img/avatar5.png')!!}">
                    <input required id="img" type="file" name="fileTest" class="form-control hidden" onchange="changeImg(this)"><br></center>
              </div>
              <h3>Giá:</h3>
              <input required type="text" name="gia" id="input" class="form-control" value=""><br>
              <h3>Mô tả :</h3>
              <input required type="text" name="mota" id="input" class="form-control" value=""><br>
              <h3> Nhà Cung cấp :</h3>
              <select name="ncc" style="width: 100%;
              height: 40px;
              border-radius: 4px;
              padding-left: 9px;
              font-size: 20px;
              color: #54667a;
              border: 1px solid #ced2d3;">
              @foreach($ncc as $ncc)
              <option value="{{$ncc->id}}">{{$ncc->name}}</option>
              @endforeach

          </select>
                
              </div>
              <center><button style="margin-top: 20px;text-align: center;" name="slsubmit" type="submit" class="btn btn-primary">Lưu lại</button></center><br>
                {{csrf_field()}}
              </form>
            </div>

@stop




