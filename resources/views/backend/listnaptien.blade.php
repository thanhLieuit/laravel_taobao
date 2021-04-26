@extends('backend.master')
@section('main')
 <table class="table">
					<thead style="background-color: #ff7676;">
								
						<th style="color: white;font-weight: bold;">Ngày nạp</th>
						<th style="color: white;font-weight: bold;">người nạp</th>
						<th style="color: white;font-weight: bold;">hình ảnh</th>
						<th style="color: white;font-weight: bold;">số tiền nạp</th>
						<th style="color: white;font-weight: bold;">mổ tả</th>
						<th style="color: white;font-weight: bold;">Trạng thái</th>
						<th></th>
						
					</thead>
						@foreach($paymethod as $paymethod)
							<tr>
								<td>{{$paymethod->created_at}}</td>
								<td>{{$paymethod->ten}}</td>
								<td><img src="../img/{{ $paymethod->image }}" alt="" style="width: 100px"></td>
								<td>{{$paymethod->sotien}}</td>
								<td>{{$paymethod->mota}}</td>
								<td>{{$paymethod->status}}</td>
								<td>
									@if($paymethod->status == 'chờ xác nhận')
									<a href="{!!url('admin/xacnhan')!!}/{{$paymethod->id}}" class="btn btn-large btn-block btn-success">xác nhận</a>
									@else
									<a href="{!!url('admin/xacnhan')!!}/{{$paymethod->id}}" class="btn btn-large btn-block btn-success" style="display: none;">xác nhận</a>
									@endif
								</td>
							</tr>
						@endforeach
					
				</table>
@endsection