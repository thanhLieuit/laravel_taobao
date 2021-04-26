@extends('backend.master')
@section('main')
<div class="container">
    <br>
    <center><h2 style="text-transform: uppercase;">Danh sách người dùng</h2></center>
<div classs="container-fluid">

    <a href="{{ route('admin/user/add') }}"><button style="width: 100%;margin-bottom: 30px;text-transform: uppercase;" type="button" class="btn btn-info">Thêm Người dùng Mới</button></a>
     <table id="example" class="table table-striped table-bordered" style="width:100%">
       <thead>

        <tr class="tieude">
            <th >Id</th>
            <th >Tên</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Hành động</th>

        </tr>
        </thead>
    @foreach($list as $list)
        <tr>
            <td>{{$list->id}}</td>
            <td>{{$list->name}}</td>
            <td>{{$list->email}}</td>

            <td style="  display: block; width: 200px;height: 200px; overflow: hidden;white-space: nowrap;text-overflow: ellipsis; ">
           {{$list->role_name}}
              </td>
            <td><a  href="{{ route('admin/user/edituser',['id'=>$list->id]) }}" class="btn btn-large btn-block btn-success">Sửa </a><br>
                <a href="{{ route('admin/user/deleteuser',['id'=>$list->id]) }}" class="btn btn-large btn-block btn-danger">Xóa</a>
            </td>
    </tr>
        @endforeach
        <tr class="tieude">
            <th>Id</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Quyền</th>
            <th>Hành động</th>
        </tr>

    </table>
</div>
</div>

@stop
