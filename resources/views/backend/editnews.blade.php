@extends('backend.master')
@section('main')

            <div class="container-fluid">
               @foreach($errors->all() as $message)
              <div class="alert alert-danger">
                <strong><b>ERRORS!</b></strong>  {{$message}}
              </div>

              @endforeach
                <center><h2 style="text-transform: uppercase;">Thêm tin tức mới </h2></center>
              <form method="post"  enctype="multipart/form-data"  accept-charset="utf-8">
                <h3>Tiêu đề :</h3>
                <input required type="text" name="newtieude" id="input" class="form-control" value="{{$edittt->tieude}}" >
                 <h3>Thể loại :</h3>
                 <select name="tl" style="width: 100%;
    height: 40px;
    border-radius: 4px;
    padding-left: 9px;
    font-size: 20px;
    color: #54667a;
    border: 1px solid #ced2d3;">
                        @foreach($listtl as $tl)
    <option value="{{$tl->id}}">{{$tl->name}}</option>
    @endforeach


                 </select>
                <h3>Hình ảnh tiêu đề</h3>

                <div class="form-group" >
                    <input id="img" type="file" name="newhinhanh" class="form-control hidden" onchange="changeImg(this)">
                            <center> <img id="avatar" class="thumbnail" width="300px" src="../../../img/{{ $edittt->img }}"></center>
                  </div>

                <h3>Nội Dung</h3>
                <textarea class="ckeditor" required name="noidung">{{$edittt->noidung}}</textarea>
                  <script type="text/javascript">
  var editor = CKEDITOR.replace('noidung',{
    language:'vi',
    filebrowserImageBrowseUrl: '{!!url('ckfinder/ckfinder.html?Type=Images')!!}',
    filebrowserFlashBrowseUrl: '{!!url('ckfinder/ckfinder.html?Type=Flash')!!}',
    filebrowserImageUploadUrl: '{!!url('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')!!}',
    filebrowserFlashUploadUrl: '{!!url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')!!}',
  });
</script>
                <h3>Slug :</h3>
                <input required type="text" name="newslug" id="input" class="form-control" value="{{$edittt->slug}}">
                <h3>Nội dung tóm tắt :</h3>
                <input required type="text" name="noidungtt" id="input" class="form-control" value="{{$edittt->noidungtt}}" >
                    </div>
                <center><button style="margin-top: 20px;text-align: center;" name="newsubmit" type="submit" class="btn btn-primary">Lưu lại</button></center>
                {{csrf_field()}}
              </form>
            </div>

@stop
