@extends('backend.master')
@section('main')
<table class="table">
					<thead style="background-color: #ff7676;">
								
						<th style="color: white;font-weight: bold;">Họ Tên</th>
						<th style="color: white;font-weight: bold;">email</th>
						<th style="color: white;font-weight: bold;">Tiêu đề</th>
						<th style="color: white;font-weight: bold;">Nội dung</th>
						<th style="color: white;font-weight: bold;">tác vụ</th>

						<th></th>
						
					</thead>
						@foreach($lienhe as $lienhe)
							<tr>
								<td>{{$lienhe->hoten}}</td>
								<td>{{$lienhe->email}}</td>
								<td>{{$lienhe->tieude}}</td>
								<td>{{$lienhe->noidung}}</td>
								<td>
									@if($lienhe->status)
										<p>{{$lienhe->status}}</p>
									@else
										<a href="{{route('admin.xulylienhe',['id'=>$lienhe->id])}}" class="btn btn-large btn-block btn-success">Đã trã lời email</a>
									@endif
								</td>
								
							</tr>
						@endforeach
					
				</table>
@endsection