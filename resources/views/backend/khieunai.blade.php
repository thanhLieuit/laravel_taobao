@extends('backend.master')
@section('main')
<div class="container">
	<table class="table" >
					<thead style="background-color: #ff7676;">				
						<th style="color: white;font-weight: bold;">Mã đơn hàng</th>
						<th style="color: white;font-weight: bold;">Ngày tạo</th>
						<th style="color: white;font-weight: bold;">hình ảnh</th>
						<th style="color: white;font-weight: bold;">lý do</th>
						<th style="color: white;font-weight: bold;">Thao tác</th>
					</thead>
						@foreach($khieunai as $khieunai)
							<tr>
								<td>{{$khieunai->madonhang}}</td>
								<td>{{$khieunai->created_at}}</td>
								<td><img src="../../img/{{ $khieunai->image }}" alt="" style="width: 100px"></td>
								<td>{{$khieunai->lydo}}</td>
								<td>
									@if($khieunai->status == "đang xử lý")
									<a href="{{route('admin.donhang.huyshipgiaohang',['id'=>$khieunai->id])}}"  class="btn btn-primary">hủy</a>
									

										<a href="{{ route('admin.donhang.daxuly',['id' =>$khieunai->id]) }}" class="btn btn-success">hoàn tất</a>
									@else
										<a href="{{ route('admin.donhang.xuly',['id' =>$khieunai->id]) }}" class="btn btn-success">Xử lý</a>

									@endif
								</td>
							</tr>
						@endforeach
			
				</table>
</div>
@endsection