@extends('backend.master')
@section('main')
<div class="container">
	<div class="qv">
		<a href="{{route('admin/khachhang/danhsachkhachhang')}}">Danh sách khách hàng</a>
	</div>
	<h3>danh sách nhóm khách hàng</h3>
	<a href="{!!url('admin/khachhang/themnhomkhachhang')!!}" type="button" class="btn btn-success">thêm nhóm khách hàng</a>
	<table class="table" >
					<thead>
								
						<th>Mã nhóm</th>
						<th>tên nhóm</th>
						<th>Số lượng khách hàng</th>
						<th>ngày tạo</th>
						<th>thao tác</th>
					</thead>
					@foreach($nhomkh as $nhomkh)
						<tr>
							<td>{{$nhomkh->manhom}}</td>
							<td>{{$nhomkh->tennhom}}</td>
							<td></td>
							<td>{{$nhomkh->created_at}}</td>
							<td><a href="{!!route('admin/khachhang/deletenhomkh',['id'=>$nhomkh->id])!!}" type="button" class="btn btn-success">xóa</a></td>
						</tr>
					@endforeach
					<thead>
					
						<th>Mã nhóm</th>
						<th>tên nhóm</th>
						<th>Số lượng khách hàng</th>
						<th>ngày tạo</th>
						<th>thao tác</th>
					</thead>
				</table>
</div>
@endsection