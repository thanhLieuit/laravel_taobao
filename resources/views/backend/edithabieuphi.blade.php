@extends('backend.master')
@section('main')

            <div class="container-fluid">
              <center><h2 style="text-transform: uppercase;">Sửa hình ảnh biểu phí </h2></center>
              @foreach($errors->all() as $message)
              <div class="alert alert-danger">
                <strong><b>ERROphp artisan make:model User -mRS!</b></strong>   Vui lòng nhập đúng định dạng hình ảnh
              </div>

              @endforeach
              <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                @foreach($bieuphi as $bieuphi)
                <h3>Tiêu đề :</h3>
                <input required type="text" name="tieude" id="input" class="form-control" value="{{$bieuphi->tieude}}" >
                <h3>Hình ảnh</h3>
                <div class="form-group" >
                  <input required id="img" type="file" name="fileTest" class="form-control hidden" onchange="changeImg(this)">
                  <center>  <img id="avatar" class="thumbnail" width="500px" src="{!!url('up')!!}/{{$bieuphi->img}}"></center>
                </div>
                <h3>Slug :</h3>
                <input required type="text" name="slug" id="input" class="form-control" value="{{$bieuphi->slug}}">

              </div>
              <center><button style="margin-top: 20px;text-align: center;" name="slsubmit" type="submit" class="btn btn-primary">Lưu lại</button></center>
                 @endforeach
                {{csrf_field()}}
              </form>
            </div>

@stop
