@extends('backend.master')
@section('main')
<table class="table">
					<thead style="background-color: #ff7676;">
								
						<th style="color: white;font-weight: bold;">Họ Tên</th>
						<th style="color: white;font-weight: bold;">email</th>
						<th style="color: white;font-weight: bold;">số điện thoại</th>
						<th style="color: white;font-weight: bold;">Nội dung</th>
						

						<th></th>
						
					</thead>
						@foreach($tuvan as $tuvan)
							<tr>
								<td>{{$tuvan->hoten}}</td>
								<td>{{$tuvan->email}}</td>
								<td>{{$tuvan->sdt}}</td>
								<td>{{$tuvan->noidung}}</td>
								
								
							</tr>
						@endforeach
					
				</table>
@endsection