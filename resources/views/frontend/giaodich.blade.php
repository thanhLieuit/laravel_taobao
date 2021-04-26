@extends('frontend.masters')
@section('main')
@section('title','Danatao | Trang cá nhân ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/tải xuống.jfif')!!}" alt="">
		</div>
<div class="element03">
	<div class="container">
		<h1>Trang nap tiền</h1>
		<center>
			<div class="hinhthan hinhthan1"><p>Trang chủ <i class="fa fa-angle-right" aria-hidden="true"></i>Trang cá nhân</p></div>
	</div>
		</center>
</div>
<div class="container">
	<table class="table">
					<thead>
								
						<th>Ngày nạp</th>
						<th>người nạp</th>
						<th>số tiền nạp</th>
						<th>mổ tả</th>
						<th>Trạng thái</th>
						
					</thead>
						@foreach($paymethod as $paymethod)
							<tr>
								<td>{{$paymethod->created_at}}</td>
								<td>{{$paymethod->ten}}</td>
								<td>{{$paymethod->sotien}}</td>
								<td>{{$paymethod->mota}}</td>
								<td>{{$paymethod->status}}</td>
							</tr>
						@endforeach
					<thead>
						<th>Ngày nạp</th>
						<th>người nạp</th>
						<th>số tiền nạp</th>
						<th>mổ tả</th>
						<th>Trạng thái</th>

					</thead>
				</table>
</div>
@endsection