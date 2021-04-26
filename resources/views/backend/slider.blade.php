@extends('backend.master')
@section('main')
<br>
	<center><h2 style="text-transform: uppercase;">Danh sách Slider</h2></center>
<div classs="container-fluid">

	<a href="{!!url('admin/Slider/add')!!}"><button style="width: 100%;margin-bottom: 30px;text-transform: uppercase;" type="button" class="btn btn-info">thêm mới</button></a>
	<table class="table" style="width: 100%">
		<tr class="tieude">
			<th width="10%">Id</th>
			<th width="30%">Hình Ảnh</th>
			<th width="20%">Tiêu đề</th>
			<th width="20%">Slug</th>
			<th width="20%">Hành động</th>
		</tr>
		@foreach($listslider as $lists)
		<tr>
			<td>{{$lists->id}}</td>
			<td><img style="height: 100px;" src="{!!url('up')!!}/{{$lists->img}}" alt=""></td>
			<td>{{$lists->tieude}}</td>
			<td>{{$lists->slug}}</td>
			<td><a  href="{!!url('admin/Slider/edit')!!}/{{$lists->id}}"><button type="button" class="btn btn-large btn-block btn-success">Sửa</button></a><br>
				<a href="{!!url('admin/Slider/delete')!!}/{{$lists->id}}"><button type="button" class="btn btn-large btn-block btn-danger">Xóa</button></td></a>
		</tr>
		@endforeach
		<tr class="tieude">
			<th width="10%">Id</th>
			<th width="30%">Hình Ảnh</th>
			<th width="20%">Tiêu đề</th>
			<th width="20%">Slug</th>
			<th width="20%">Hành động</th>
		</tr>
	</table>
</div>

@stop
