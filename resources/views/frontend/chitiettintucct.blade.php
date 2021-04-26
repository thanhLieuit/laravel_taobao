@extends('frontend.masters')
@section('main')
@section('title','Danatao | Trang chủ')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/gioithieu.png')!!}" alt="">
</div>
<div class="element03">
	<div class="container">
		<h1>tin tức <i class="fa fa-angle-right" aria-hidden="true"></i> <span style="font-size: 20px;"> Tin tức Công ty <i class="fa fa-angle-right" aria-hidden="true"></i></span><span style="font-size: 14px">{{$laytinct->tieude}}</span></h1>
		<center>
			<div class=" hinhthan"><p>Trang chủ <i class="fa fa-angle-right" aria-hidden="true"></i> Tin tức</p></div>
		</div>
	</center>
</div>
</section>
<section style="">
	<div class="container ">
		<div class="row">
			<div class="col-md-9 chitiettintuc">
				
				<div class="chitiettintuc3" style="padding-top: 50px">
					<p style="text-align: justify;">{!!$laytinct->noidung!!}</p>
				</div>
			</div>
			<div class="col-md-3 chitiettintuc4 tintuc2">
				<h3>Bài viết liên quan</h3>
				@foreach($baiviettt as $baiviettts)
					<a class="dskd" href="{!!url('tintuc/giaidap/')!!}/{{$baiviettts->slug}}">
					<a href="">
						<div class="a">
							<div style="width: 37%; float:left;margin-right: 10px;">
								<img style="width: 100%;border-radius: 10px;" src="../../img/{{ $baiviettts->img }}" alt="">
							</div>
							<div style="width: 57%;margin-left: 110px">
								<h5>{{$baiviettts->tieude}} </h5>
								<p><i style="color: blue" class="fa fa-calendar" aria-hidden="true"></i> {{$baiviettts->created_at}}</p>	
							</div>
							<hr style="width: 45%;float: left;margin: 0">
						
						</div>
					</a>
				@endforeach
			</div>	
		</div>
		
</div>
</section>
		<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@stop
