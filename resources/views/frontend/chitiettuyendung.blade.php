@extends('frontend.masters')
@section('main')
@section('title','Danatao | Tuyển dụng')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/gioithieu.png')!!}" alt="">
</div>
<div class="element03">
	<div class="container">
	<div class="container">
		<h1>Tuyển dụng <i class="fa fa-angle-right" aria-hidden="true"></i><span style="font-size: 14px">{{$chitiettd->tieude}}</span></h1>
		<center>
			<div class=" hinhthan"><p>Trang chủ <i class="fa fa-angle-right" aria-hidden="true"></i> tuyển dụng</p></div>
		</div>
	</center>
</div>
</section>
<section style="margin-top: -230px;">
	<div class="container ">
		<div class="row">
			<div class="col-md-9 chitiettintuc">
				<a href="#"><div class="chitiettintuc1"><img src="{!!url('img/previous.png')!!}" alt=""></div></a>
				<a href="#">  <div class="chitiettintuc2"><img src="{!!url('img/next.png')!!}" alt=""></div></a>
				<div class="chitiettintuc3">
					<img src="{!!url('img/ny.jpg')!!}" alt="">
					<h3>Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium consequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. Vivamus laoreet metus id venenatis pharetra</h3>
					<p>Proin orci purus, elementum vitae facilisis id, interdum et ante. 
					Sed faucibus fringilla sapien, quis posuere massa iaculis non. Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium consequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. Vivamus laoreet metus id venenatis pharetra. Donec elementum, lacus nec ornare aliquet, tortor ex ultricies arcu, a luctus metus urna in nisl. Cras orci libero, convallis quis nisi nec, tristique aliquet augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum mollis eros sed malesuada. Nam vitae laoreet augue, id euismod odio. Nam luctus est nec dolor placerat viverra.</p>
					<img src="{!!url('img/ny.jpg')!!}" alt="">
					<h3>Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium consequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. Vivamus laoreet metus id venenatis pharetra</h3>
					<p>Proin orci purus, elementum vitae facilisis id, interdum et ante. 
					Sed faucibus fringilla sapien, quis posuere massa iaculis non. Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium consequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. Vivamus laoreet metus id venenatis pharetra. Donec elementum, lacus nec ornare aliquet, tortor ex ultricies arcu, a luctus metus urna in nisl. Cras orci libero, convallis quis nisi nec, tristique aliquet augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vestibulum mollis eros sed malesuada. Nam vitae laoreet augue, id euismod odio. Nam luctus est nec dolor placerat viverra.</p>
				</div>
			</div>
			<div class="col-md-3 chitiettintuc4 tintuc2">
			<h3>Bài viết liên quan</h3>
				@foreach($td as $td) 
				<div class="a">
					<div style="width: 15%; float:left;margin-right: 10px;"><img style="width: 100%;border-radius: 10px;" src="{!!url('img/avatar5.png')!!}" alt=""></div>
				<div style="width: 82%;margin-left: 50px"><h5>{{$td->tieude}}</h5><br>
				<p><i style="color: blue" class="fa fa-calendar" aria-hidden="true"></i>{{$td->updated_at}}</p>	</div>
					<hr style="width: 45%;float: left;margin: 0">
				
				</div>
				@endforeach			
				
			</div>
		</div>
		
</div>
</section>
		<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@stop