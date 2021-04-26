@extends('backend.master')
@section('main')
<br>
    <center><h2 style="text-transform: uppercase;">Danh sách quyền</h2></center>
<div classs="container-fluid">

    <a href="{!!url('admin/user/add')!!}"><button style="width: 100%;margin-bottom: 30px;text-transform: uppercase;" type="button" class="btn btn-info">Thêm Tin quyền mới</button></a>
    <table class="table" style="width: 100%">
       <thead>

        <tr class="tieude">
            <th width="5%">Id</th>
            <th width="15%">Tên quyền</th>
            <th width="20%">Hành động</th>

        </tr>
        </thead>
        <tr>
            <td>1</td>
            <td>Admin</td>
            <td><a  href="{!!url('admin/user.edit')!!}/"><button type="button" class="btn btn-large btn-block btn-success">Sửa</button></a><br>
                <a href="{!!url('admin/user/delete')!!}/" class="btn btn-large btn-block btn-danger">Xóa</button></td></a>
        </tr>

        <tr class="tieude">
            <th width="5%">Id</th>
            <th width="15%">Tên quyền</th>
            <th width="20%">Hành động</th>

        </tr>
    </table>
</div>

@stop
