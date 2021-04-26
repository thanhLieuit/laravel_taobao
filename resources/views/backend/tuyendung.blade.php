@extends('backend.master')
@section('main')
<br>
    <center><h2 style="text-transform: uppercase;">Danh sách tin tuyễn dụng</h2></center>
<div classs="container-fluid">

    <a href="{!!url('admin/tuyendung/add')!!}"><button style="width: 100%;margin-bottom: 30px;text-transform: uppercase;" type="button" class="btn btn-info">Thêm Tin Tức Mới</button></a>
    <table class="table" style="width: 100%">
        <tr class="tieude">
            <th width="5%">Id</th>
            <th width="20%">Tiêu đề</th>
            <th width="20%">Slug</th>
            <th width="20%">Nội dung</th>
            <th width="10%">Hành động</th>

        </tr>
        @foreach($listtd as $listtd)
        <tr>
            <td>{{$listtd->id}}</td>
            <td>{{$listtd->tieude}}</td>
            <td>{{$listtd->slug}}</td>

            <td style="  display: block; width: 200px;height: 200px; overflow: hidden;white-space: nowrap;text-overflow: ellipsis; ">
            {!!$listtd->noidung!!}
              </td>
            <td><a  href="{!!url('admin/tuyendung/edit')!!}/{{$listtd->slug}}"><button type="button" class="btn btn-large btn-block btn-success">Sửa</button></a><br>
                <a href="{!!url('admin/tuyendung/delete')!!}/{{$listtd->id}}" class="btn btn-large btn-block btn-danger">Xóa</button></td></a>
        </tr>
        @endforeach
        <tr class="tieude">
            <th width="5%">Id</th>
            <th width="20%">Tiêu đề</th>
            <th width="20%">Slug</th>
            <th width="20%">Nội dung</th>
            <th width="10%">Hành động</th>
        </tr>
    </table>
</div>

@stop
