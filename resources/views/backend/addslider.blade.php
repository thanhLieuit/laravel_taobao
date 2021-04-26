@extends('backend.master')
@section('main')

            <div class="container-fluid">
              <center><h2 style="text-transform: uppercase;">Thêm Slider mới </h2></center>
              @foreach($errors->all() as $message)
              <div class="alert alert-danger">
                <strong><b>ERRORS!</b></strong>   Vui lòng nhập đúng định dạng hình ảnh
              </div>

              @endforeach
              <form action="{!!url('admin/Slider/add')!!}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
              	<h3>Tiêu đề :</h3>
              	<input required type="text" name="sltieude" id="input" class="form-control" value="" >
              	<h3>Hình ảnh</h3>
                <div class="form-group" >
                  <input required id="img" type="file" name="fileTest" class="form-control hidden" onchange="changeImg(this)">
                  <center>  <img id="avatar" class="thumbnail" width="500px" src="{!!url('img/avatar5.png')!!}"></center>
                </div>
                <h3>Slug :</h3>
                <input required type="text" name="slslug" id="input" class="form-control" value="">

              </div>
              <center><button style="margin-top: 20px;text-align: center;" name="slsubmit" type="submit" class="btn btn-primary">Lưu lại</button></center>
              	{{csrf_field()}}
              </form>
            </div>

@stop
