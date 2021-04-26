@extends('backend.master')
@section('main')
<br>
    <center><h2 style="text-transform: uppercase;">Sản Phẩm mới thêm</h2></center>
<div classs="container-fluid">
    <table class="table" style="width: 100%">
       <thead>

        <tr class="tieude">
            <th width="5%">Id</th>
            <th width="15%">Hình ảnh</th>
            <th width="15%">Tên sản phẩm</th>
            <th width="15%">Giá</th>
            <th width="15%">Mô tả</th>
             <th width="15%">Nhà cung cấp</th>
            <th width="20%">Hành động</th>

        </tr>
        </thead>
        <tr>
            <td>{{$listsp->id}}</td>
            <td><img style="width: 100%;height: 150px" src="{!!url('up/')!!}/{{$listsp->img}}" alt=""></td>
            <td>{{$listsp->name}}</td>
            <td>{{$listsp->price}}</td>
            <td>{{$listsp->mota}}</td>
            <td>{{$listsp->id_ncc}}</td>
            <td><a  href="{!!url('admin/donhang/editlistadd')!!}/{{$listsp->id}}"><button type="button" class="btn btn-large btn-block btn-success">Sửa</button></a><br>
                <a href="{!!url('admin/donhang/deletelistadd')!!}/{{$listsp->id}}" class="btn btn-large btn-block btn-danger">Xóa</button></td></a>
        </tr>

       <thead>

        <tr class="tieude">
            <th width="5%">Id</th>
            <th width="15%">Hình ảnh</th>
            <th width="15%">Tên sản phẩm</th>
            <th width="15%">Giá</th>
            <th width="15%">Mô tả</th>
             <th width="15%">Nhà cung cấp</th>
            <th width="20%">Hành động</th>

        </tr>
        </thead>
    </table>
    <center><a href="{!!url('admin/donhang/adddonhang')!!}"><button type="button" class="btn btn-default">Thêm đơn hàng</button></a></center>
</div>

@stop