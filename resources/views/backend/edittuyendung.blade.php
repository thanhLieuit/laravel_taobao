@extends('backend.master')
@section('main')

<div class="container-fluid">
     @foreach($errors->all() as $message)
              <div class="alert alert-danger">
                <strong><b>ERRORS!</b></strong>   {{$message}}
              </div>

              @endforeach
  <center><h2 style="text-transform: uppercase;">Thêm tin tức mới </h2></center>
  <form method="post" accept-charset="utf-8" enctype="multipart/form-data" >
    <h3>Tiêu đề :</h3>
    <input required type="text" name="tdtieude" id="input" class="form-control" value="{{$edittd->tieude}}" >
  <h3>Nội Dung</h3>
  <textarea class="ckeditor" required name="tdnoidung">{{$edittd->noidung}}</textarea>
    <script type="text/javascript">
  var editor = CKEDITOR.replace('tdnoidung',{
    language:'vi',
    filebrowserImageBrowseUrl: '{!!url('ckfinder/ckfinder.html?Type=Images')!!}',
    filebrowserFlashBrowseUrl: '{!!url('ckfinder/ckfinder.html?Type=Flash')!!}',
    filebrowserImageUploadUrl: '{!!url('/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')!!}',
    filebrowserFlashUploadUrl: '{!!url('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')!!}',
  });
</script>
  <h3>Slug :</h3>
  <input required type="text" name="tdslug" id="input" class="form-control" value="{{$edittd->slug}}">

</div>
<center><button style="margin-top: 20px;text-align: center;" name="tdsubmit" type="submit" class="btn btn-primary">Lưu lại</button></center>
{{csrf_field()}}
</form>
</div>

@stop
