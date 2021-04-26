@extends('frontend.masters')
@section('main')
@section('title','Danatao | Tuyển dụng')
<div style="	border-bottom: 1px solid #fff;" class="element02">
	<img style="width: 100%;height: 350px" src="{!!url('img/gioithieu.png')!!}" alt="">
</div>
<div class="element03">
	<div class="container">
		<h1>tuyển dụng</h1>
		<center>
			<div class=" hinhthan"><p>Trang chủ <i class="fa fa-angle-right" aria-hidden="true"></i> tuyển dụng</p></div>
		</div>
	</center>
</div>
</section>
<section id="tuyendung">
	<div class="container ">
		<div class="row">
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 ttkd">
				@foreach($td as $td)
				<a href="{!!url('tuyendung')!!}/{{$td->slug}}">
					
					<div>
					<h3 style="text-transform: capitalize">{{$td->tieude}}</h3>
					<p><i class="fa fa-calendar" aria-hidden="true"></i> {{$td->updated_at}}</p>
					<p>Suspendisse in urna risus. Vivamus consectetur augue et lectus pretium consequat. Duis pulvinar ex lorem, ut placerat erat malesuada sed. Vivamus laoreet metus id venenatis pharetra. Donec elementum, lacus nec ornare aliquet, tortor ex ultricies arcu, a luctus metus urna in nisl. Cras orci libero, ….</p>
					<hr style="width: 20%;float: left;margin: 0px">
				</div>
				</a>
				@endforeach
				

					<div class="chuyentrang" style="margin-left: 250px"><ul class="pagination modal-4">
						<li><a href="#" class="prev">
							<i class="fa fa-chevron-left"></i>
							Previous
						</a>
					</li>
					<li><a href="#">1</a></li>
					<li> <a href="#">2</a></li>
					<li> <a href="#">3</a></li>
					<li> <a href="#">4</a></li>
					<li> <a href="#" class="active">5</a></li>
					<li> <a href="#">6</a></li>
					<li> <a href="#">7</a></li>
					<li><a href="#" class="next"> Next 
						<i class="fa fa-chevron-right"></i>
					</a></li>
				</ul>
			</div>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 truyendung4 ">
			<div class="sdt">
					<h3>chăm sóc khách hàng</h3>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
					<div><p><i class="fa fa-arrow-right" aria-hidden="true"></i>  Lorem ipsum 1</p>
					<p> &nbsp; &nbsp;&nbsp;<i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 0905 xxx xxx</p></div>
				</div>
			<h3>Facebook</h3>
			<div class="tintuc3">
				<div class="fb-page" data-href="https://www.facebook.com/patict.vn/" data-tabs="timeline" data-width="300" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/patict.vn/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/patict.vn/">PAT Co.,Ltd</a></blockquote></div>
				</div>
				<h3>Thống kê truy cập</h3>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; Đang truy cập: xxxx</p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; Đang truy cập: xxxx</p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; Đang truy cập: xxxx</p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; Đang truy cập: xxxx</p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; Đang truy cập: xxxx</p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; Đang truy cập: xxxx</p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; Đang truy cập: xxxx</p>
				<p> &nbsp;<i class="fa fa-user" aria-hidden="true"></i> &nbsp; Đang truy cập: xxxx</p>
			</div>
		</div>
		
</div>
</section>
		<section style="	border-top: 5px solid #000; margin-top: 40px" id="cuoi" >
@stop