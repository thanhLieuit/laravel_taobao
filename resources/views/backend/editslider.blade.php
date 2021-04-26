@extends('backend.master')
@section('main')

            <div class="container-fluid">
                              @foreach($errors->all() as $message)
              <div class="alert alert-danger">
                <strong><b>ERRORS!</b></strong>{{$message}}
              </div>

              @endforeach
                <center><h2 style="text-transform: uppercase;">Chỉnh sửa Slider </h2></center>
              <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <h3>Tiêu đề :</h3>
                <input type="text" name="sltieude" id="input" class="form-control" value="{{$edits->tieude}}" required title="">
                <h3>Hình ảnh</h3>
                <div class="form-group" >
                    <input id="img" type="file" name="fileTest" class="form-control hidden" value="{!!url('up/')!!}/{{$edits->img}}" onchange="changeImg(this)"><br>
                            <center>  <img style="margin-top: 20px" id="avatar" class="thumbnail" width="500px" src="{!!url('up/')!!}/{{$edits->img}}"></center>
                  </div>
                <h3>Slug :</h3>
                <input type="text" name="slslug" id="input" class="form-control" value="{{$edits->slug}}" required  title="">

                <center><button style="margin-top: 20px;text-align: center;" type="submit" class="btn btn-primary">Lưu lại</button></center>
                	{{csrf_field()}}
              </form>
            </div>

@stop
