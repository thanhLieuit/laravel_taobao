@extends('backend.master')
@section('main')
<br>
    <center><h2 style="text-transform: uppercase;">Danh sách tin tức</h2></center>
<div classs="container-fluid">

    <a href="{!!url('admin/tintuc/add')!!}"><button style="width: 100%;margin-bottom: 30px;text-transform: uppercase;" type="button" class="btn btn-info">Thêm Tin Tức Mới</button></a>
    <table class="table" style="width: 100%">
       <thead>

        <tr class="tieude">
            <th width="5%">Id</th>
            <th width="15%">Hình ảnh tiêu đề </th>
            <th width="20%">Tiêu đề</th>
            <th width="20%">Slug</th>
            <th width="20%">Nội dung</th>
            <th width="10%">Thể loại</th>
            <th width="10%">Hành động</th>

        </tr>
        </thead>
        		@foreach($listnews as $listnew)
        <tr>
            <td>{{$listnew->id}}</td>

            <td><img src="../img/{{ $listnew->img }}" alt="" style="width: 100px"></td>
            <td>{{$listnew->tieude}}</td>
            <td>{{$listnew->slug}}</td>

            <td style="  display: block; width: 200px;height: 200px; overflow: hidden;white-space: nowrap;text-overflow: ellipsis; ">
            {!!$listnew->noidung!!}
              </td>
              <td>{{$listnew->id_tl}}</td>
            <td><a  href="{!!url('admin/tintuc/edit')!!}/{{$listnew->slug}}"><button type="button" class="btn btn-large btn-block btn-success">Sửa</button></a><br>
                <a href="{!!url('admin/tintuc/delete')!!}/{{$listnew->id}}" class="btn btn-large btn-block btn-danger">Xóa</button></td></a>
        </tr>
        		@endforeach
        <tr class="tieude">
            <th width="5%">Id</th>
            <th width="15%">Hình ảnh tiêu đề </th>
            <th width="20%">Tiêu đề</th>
            <th width="20%">Slug</th>
            <th width="20%">Nội dung</th>
            <th width="10%">Thể loại</th>
            <th width="10%">Hành động</th>
        </tr>
    </table>
</div>

@stop
